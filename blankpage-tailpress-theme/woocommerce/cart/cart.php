<?php
/**
 * Cart Page Template - Modern Design
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'woocommerce_before_cart' ); ?>

<!-- Debug marker -->
<div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 px-6 py-4 mb-8 rounded-r-lg shadow-sm">
    <div class="flex items-center">
        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
        </svg>
        <p class="font-medium">🛒 BlankPage Custom Cart Template - Sa näed kohandatud ostukorvi!</p>
    </div>
</div>

<div class="min-h-screen bg-gray-50">
    <div class="w-full px-6 sm:px-8 lg:px-16 xl:px-24 py-12">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Ostukorv</h1>
            <div class="w-24 h-1 bg-gradient-to-r from-green-500 to-blue-600 mx-auto rounded-full"></div>
        </div>

        <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
            <?php do_action( 'woocommerce_before_cart_table' ); ?>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="bg-gradient-to-r from-green-50 to-blue-50 px-8 py-6 border-b">
                            <h2 class="text-2xl font-semibold text-gray-900 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                                Sinu tooted
                            </h2>
                        </div>
                        <div class="p-8">
                            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents w-full">
                                <thead class="border-b border-gray-200">
                                    <tr class="text-left">
                                        <th class="product-remove py-4">&nbsp;</th>
                                        <th class="product-thumbnail py-4">&nbsp;</th>
                                        <th class="product-name py-4 font-semibold text-gray-900">Toode</th>
                                        <th class="product-price py-4 font-semibold text-gray-900">Hind</th>
                                        <th class="product-quantity py-4 font-semibold text-gray-900">Kogus</th>
                                        <th class="product-subtotal py-4 font-semibold text-gray-900">Kokku</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                                    <?php
                                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                            ?>
                                            <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?> border-b border-gray-100 hover:bg-gray-50 transition-colors">

                                                <td class="product-remove py-6">
                                                    <?php
                                                    echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                        'woocommerce_cart_item_remove_link',
                                                        sprintf(
                                                            '<a href="%s" class="remove bg-red-100 hover:bg-red-200 text-red-600 rounded-full p-2 transition-colors" aria-label="%s" data-product_id="%s" data-product_sku="%s">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                                </svg>
                                                            </a>',
                                                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                            esc_html__( 'Remove this item', 'woocommerce' ),
                                                            esc_attr( $product_id ),
                                                            esc_attr( $_product->get_sku() )
                                                        ),
                                                        $cart_item_key
                                                    );
                                                    ?>
                                                </td>

                                                <td class="product-thumbnail py-6">
                                                    <?php
                                                    $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( 'woocommerce_thumbnail' ), $cart_item, $cart_item_key );

                                                    if ( ! $product_permalink ) {
                                                        echo '<div class="w-16 h-16 rounded-lg overflow-hidden border border-gray-200">' . $thumbnail . '</div>'; // PHPCS: XSS ok.
                                                    } else {
                                                        printf( '<a href="%s" class="block w-16 h-16 rounded-lg overflow-hidden border border-gray-200 hover:border-gray-300 transition-colors">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                                                    }
                                                    ?>
                                                </td>

                                                <td class="product-name py-6" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                                                    <?php
                                                    if ( ! $product_permalink ) {
                                                        echo '<span class="font-medium text-gray-900">' . wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' ) . '</span>';
                                                    } else {
                                                        echo '<a href="' . esc_url( $product_permalink ) . '" class="font-medium text-gray-900 hover:text-blue-600 transition-colors">' . wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' ) . '</a>';
                                                    }

                                                    do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                                    // Meta data.
                                                    echo '<div class="text-sm text-gray-500 mt-1">' . wc_get_formatted_cart_item_data( $cart_item ) . '</div>'; // PHPCS: XSS ok.

                                                    // Backorder notification.
                                                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                                        echo '<p class="backorder_notification text-sm text-orange-600 mt-1">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
                                                    }
                                                    ?>
                                                </td>

                                                <td class="product-price py-6 font-semibold text-gray-900" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                                                    <?php
                                                        echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                                    ?>
                                                </td>

                                                <td class="product-quantity py-6" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                                                    <?php
                                                    if ( $_product->is_sold_individually() ) {
                                                        $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                                    } else {
                                                        $product_quantity = woocommerce_quantity_input(
                                                            array(
                                                                'input_name'   => "cart[{$cart_item_key}][qty]",
                                                                'input_value'  => $cart_item['quantity'],
                                                                'max_value'    => $_product->get_max_purchase_quantity(),
                                                                'min_value'    => '0',
                                                                'product_name' => $_product->get_name(),
                                                            ),
                                                            $_product,
                                                            false
                                                        );
                                                    }

                                                    echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                                                    ?>
                                                </td>

                                                <td class="product-subtotal py-6 font-bold text-lg text-gray-900" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
                                                    <?php
                                                        echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <?php do_action( 'woocommerce_cart_contents' ); ?>

                                    <tr>
                                        <td colspan="6" class="actions py-6">
                                            <div class="flex justify-between items-center">
                                                <input type="submit" class="button bg-gradient-to-r from-green-600 to-blue-600 text-white font-semibold py-3 px-6 rounded-xl hover:from-green-700 hover:to-blue-700 transition-all duration-200" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>" />
                                                <?php do_action( 'woocommerce_cart_actions' ); ?>
                                                <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                                </tbody>
                            </table>
                            <?php do_action( 'woocommerce_after_cart_table' ); ?>
                        </div>
                    </div>
                </div>

                <!-- Cart Totals -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden sticky top-8">
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-4 border-b">
                            <h3 class="text-xl font-semibold text-gray-900">Kokkuvõte</h3>
                        </div>
                        <div class="p-6">
                            <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
                            <div class="cart-collaterals">
                                <?php
                                    /**
                                     * Cart collaterals hook.
                                     *
                                     * @hooked woocommerce_cart_totals - 10
                                     * @hooked woocommerce_shipping_calculator - 20
                                     */
                                    do_action( 'woocommerce_cart_collaterals' );
                                ?>
                            </div>
                            <?php do_action( 'woocommerce_after_cart_collaterals' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
.woocommerce-cart .button {
    @apply bg-gradient-to-r from-green-600 to-blue-600 text-white font-semibold py-3 px-6 rounded-xl hover:from-green-700 hover:to-blue-700 transition-all duration-200 shadow-lg;
}

.woocommerce-cart .quantity input {
    @apply w-20 px-3 py-2 border border-gray-300 rounded-lg text-center;
}

.cart_totals .shop_table th,
.cart_totals .shop_table td {
    @apply py-3 px-0 border-b border-gray-200;
}

.cart_totals .order-total th,
.cart_totals .order-total td {
    @apply font-bold text-lg;
}

/* Override WordPress global styles and container restrictions */
.entry-content {
    max-width: none !important;
}

.container {
    max-width: none !important;
}

/* Override WordPress global content-size restrictions */
.is-layout-constrained > :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
    max-width: none !important;
}

/* Custom WooCommerce form styling */
.woocommerce-cart-form .form-control {
    @apply w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200;
}
</style>

<?php do_action( 'woocommerce_after_cart' ); ?>
