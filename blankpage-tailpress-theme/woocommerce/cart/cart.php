<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php if ( WC()->cart->is_empty() ) : ?>
		<?php do_action( 'woocommerce_cart_is_empty' ); ?>
	<?php else : ?>
		<?php do_action( 'woocommerce_before_cart_table' ); ?>
		<div class="py-8">
			<div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
				<!-- Cart Table -->
				<div class="xl:col-span-2">
					<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
				<div class="overflow-x-auto">
					<table class="w-full text-sm">
						<thead class="bg-gray-50 border-b border-gray-200">
							<tr>
								<th class="text-left py-3 px-4 font-semibold text-gray-700">Toode</th>
								<th class="text-center py-3 px-4 font-semibold text-gray-700">Hind</th>
								<th class="text-center py-3 px-4 font-semibold text-gray-700">Kogus</th>
								<th class="text-center py-3 px-4 font-semibold text-gray-700">Kokku</th>
								<th class="w-8"></th>
							</tr>
						</thead>
						<tbody class="divide-y divide-gray-200">
							<?php do_action( 'woocommerce_before_cart_contents' ); ?>
							<?php
							foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
								$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
								$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                                ?>
                                                <tr class="hover:bg-gray-50 transition-colors">
                                                    <td class="py-4 px-4">
                                                        <div class="flex items-center gap-4">
                                                            <?php
                                                            $image_url = wp_get_attachment_image_url( $_product->get_image_id(), 'woocommerce_thumbnail' );
                                                            if ( ! $product_permalink ) {
                                                                echo '<div class="w-16 h-16 rounded overflow-hidden bg-gray-100 flex-shrink-0"><img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $_product->get_name() ) . '" class="w-full h-full object-contain"></div>';
                                                            } else {
                                                                printf( '<a href="%s" class="w-16 h-16 rounded overflow-hidden bg-gray-100 flex-shrink-0 block"><img src="%s" alt="%s" class="w-full h-full object-contain"></a>', esc_url( $product_permalink ), esc_url( $image_url ), esc_attr( $_product->get_name() ) );
                                                            }
                                                            ?>
                                                            <div>
                                                                <h4 class="font-medium text-gray-900 text-sm">
                                                                    <?php
                                                                    if ( ! $product_permalink ) {
                                                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) );
                                                                    } else {
                                                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s" class="text-gray-900 hover:text-blue-600 transition-colors no-underline focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-sm">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                                                    }
                                                                    ?>
                                                                </h4>
                                                                <?php
                                                                // Meta data
                                                                $item_data = wc_get_formatted_cart_item_data( $cart_item );
                                                                if ( $item_data ) {
                                                                    echo '<p class="text-gray-500 text-sm">' . $item_data . '</p>';
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center py-4 px-4 font-medium text-gray-900 w-24">
                                                        <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
                                                    </td>
                                                    <td class="text-center py-4 px-4 w-24">
                                                        <?php if ( $_product->is_sold_individually() ) : ?>
                                                            <span class="text-gray-900 font-medium">1</span>
                                                            <input type="hidden" name="cart[<?php echo $cart_item_key; ?>][qty]" value="1" />
                                                        <?php else : ?>
                                                            <div class="inline-flex items-center border border-gray-300 rounded-md" x-data="{ quantity: <?php echo $cart_item['quantity']; ?> }">
                                                                <button type="button" @click="quantity = Math.max(1, quantity - 1); $refs.quantityInput.value = quantity; $refs.quantityInput.dispatchEvent(new Event('change'));" class="px-2 py-1 text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition-colors">−</button>
                                                                <input 
                                                                    type="number" 
                                                                    name="cart[<?php echo $cart_item_key; ?>][qty]" 
                                                                    value="<?php echo $cart_item['quantity']; ?>"
                                                                    x-ref="quantityInput"
                                                                    x-model="quantity"
                                                                    min="1" 
                                                                    max="<?php echo $_product->get_max_purchase_quantity(); ?>"
                                                                    class="w-12 text-center py-1 border-0 focus:ring-0 text-sm [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                                                >
                                                                <button type="button" @click="quantity = quantity + 1; $refs.quantityInput.value = quantity; $refs.quantityInput.dispatchEvent(new Event('change'));" class="px-2 py-1 text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition-colors">+</button>
                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-center py-4 px-4 font-semibold text-gray-900">
                                                        <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
                                                    </td>
                                                    <td class="text-center py-4 px-4">
                                                        <?php
                                                        echo apply_filters(
                                                            'woocommerce_cart_item_remove_link',
                                                            sprintf(
                                                                '<a href="%s" class="inline-flex items-center justify-center w-8 h-8 text-red-500 hover:text-red-700 hover:bg-red-50 focus:text-red-700 focus:bg-red-50 rounded-full transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50" title="%s" data-product_id="%s" data-product_sku="%s"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></a>',
                                                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                                esc_attr__( 'Eemalda ostukorvist', 'woocommerce' ),
                                                                esc_attr( $product_id ),
                                                                esc_attr( $_product->get_sku() )
                                                            ),
                                                            $cart_item_key
                                                        );
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php do_action( 'woocommerce_cart_contents' ); ?>
                                    </tbody>
                                </table>
                                <div class="bg-gray-50 px-4 py-3 border-t border-gray-200 flex justify-between items-center">
                                    <button type="submit" name="update_cart" value="<?php esc_attr_e( 'Uuenda ostukorv', 'woocommerce' ); ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                                        Uuenda ostukorv
                                    </button>
                                    <div class="text-right">
                                        <p class="text-lg font-semibold text-gray-900">Kokku: <?php echo WC()->cart->get_total(); ?></p>
                                        <p class="text-sm text-gray-500">KM sisaldub</p>
                                    </div>
                                    								<?php do_action( 'woocommerce_cart_actions' ); ?>
								<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
							</div>
							<?php do_action( 'woocommerce_after_cart_table' ); ?>
						</div>
					</div>
				</div>
				
				<!-- Order Summary -->
				<div class="xl:col-span-1">
					<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
				<h4 class="text-lg font-semibold text-gray-900 mb-4">Tellimuse kokkuvõte</h4>
				<div class="space-y-3 mb-4">
					<div class="flex justify-between items-center">
						<span class="text-gray-600">Vahesumma</span>
						<span class="font-medium"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
					</div>
					<?php if ( WC()->cart->get_shipping_total() > 0 ) : ?>
					<div class="flex justify-between items-center text-sm">
						<span class="text-gray-600">Transport</span>
						<span class="font-medium"><?php echo WC()->cart->get_cart_shipping_total(); ?></span>
					</div>
					<?php endif; ?>
					<?php if ( WC()->cart->get_taxes_total() > 0 ) : ?>
					<div class="flex justify-between items-center text-sm">
						<span class="text-gray-600">Maksud</span>
						<span class="font-medium"><?php echo WC()->cart->get_taxes_total(); ?></span>
					</div>
					<?php endif; ?>
					<div class="border-t border-gray-200 pt-3">
						<div class="flex justify-between items-center text-lg font-semibold">
							<span>Kokku</span>
							<span><?php echo WC()->cart->get_total(); ?></span>
						</div>
					</div>
				</div>
				
					<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 px-4 rounded-md font-semibold hover:from-blue-700 hover:to-blue-800 transition-all duration-200 inline-block text-center">
						Vormista tellimus
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</form>

<?php do_action( 'woocommerce_after_cart' ); ?>
