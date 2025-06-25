<?php
/**
 * Checkout Form Template - Modern Design
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<!-- Debug marker (temporary) -->
<div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 px-6 py-4 mb-8 rounded-r-lg shadow-sm">
    <div class="flex items-center">
        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
        </svg>
        <p class="font-medium">💳 BlankPage Custom Checkout Template - Sa näed kohandatud kassateema!</p>
    </div>
</div>

<div class="min-h-screen bg-gray-50">
    <div class="w-full px-6 sm:px-8 lg:px-16 xl:px-24 py-12">
        
        <!-- Our Custom Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Kassa</h1>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto rounded-full"></div>
            <p class="text-gray-600 mt-4 text-lg">Viimistleme sinu tellimuse</p>
        </div>

        <?php
        do_action( 'woocommerce_before_checkout_form', $checkout );

        // If checkout registration is disabled and not logged in, the user cannot checkout.
        if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
            echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
            return;
        }
        ?>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Left Column - Billing/Shipping Forms -->
            <div class="space-y-8">
                <form name="checkout" method="post" class="checkout woocommerce-checkout space-y-8" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

                    <?php if ( $checkout->get_checkout_fields() ) : ?>

                        <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                        <!-- Billing Details -->
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-8 py-6 border-b border-gray-100">
                                <h2 class="text-2xl font-semibold text-gray-900 flex items-center">
                                    <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                    Arveandmed
                                </h2>
                            </div>
                            <div class="p-8">
                                <div class="space-y-4">
                                    <?php do_action( 'woocommerce_checkout_billing' ); ?>
                                </div>
                            </div>
                        </div>

                        <?php if ( $checkout->get_checkout_fields( 'shipping' ) ) : ?>
                            <!-- Shipping Details -->
                            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                                <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-8 py-6 border-b border-gray-100">
                                    <h3 class="text-2xl font-semibold text-gray-900 flex items-center">
                                        <svg class="w-6 h-6 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        Tarneandmed
                                    </h3>
                                </div>
                                <div class="p-8">
                                    <div class="space-y-4">
                                        <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                    <?php endif; ?>

                    <!-- Additional Fields -->
                    <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

                </form>
            </div>

            <!-- Right Column - Order Review -->
            <div class="lg:sticky lg:top-8 space-y-6">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-8 py-6 border-b border-gray-100">
                        <h3 class="text-2xl font-semibold text-gray-900 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Sinu tellimus
                        </h3>
                    </div>
                    <div class="p-8">
                        <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                        </div>

                        <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
                    </div>
                </div>

                <!-- Trust Signals -->
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6">
                    <div class="grid grid-cols-2 gap-4 text-center">
                        <div class="flex flex-col items-center space-y-2">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-700">Turvaline makse</span>
                        </div>
                        <div class="flex flex-col items-center space-y-2">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-700">Kiire tarne</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
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
    .woocommerce-checkout .form-control {
        @apply w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200;
    }

    .woocommerce-checkout .form-control:focus {
        @apply shadow-lg ring-blue-500 border-blue-500;
    }

    .woocommerce-checkout label {
        @apply block text-sm font-semibold text-gray-700 mb-2;
    }

    .woocommerce-checkout .button {
        @apply bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-4 px-8 rounded-xl hover:from-blue-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-200 shadow-lg;
    }

    .woocommerce-checkout select {
        @apply w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent;
    }

    .woocommerce-checkout-review-order-table th,
    .woocommerce-checkout-review-order-table td {
        @apply py-4 px-0 border-b border-gray-200;
    }

    .woocommerce-checkout-review-order-table .product-name {
        @apply font-semibold text-gray-900;
    }

    .woocommerce-checkout-review-order-table .product-total {
        @apply text-right font-semibold;
    }

    /* Beautiful Place Order Button */
    #place_order {
        @apply w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold py-4 px-8 rounded-xl hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition-all duration-300 shadow-xl text-lg;
        border: none !important;
        margin-top: 20px;
    }
    
    #place_order:hover {
        @apply shadow-2xl;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04), 0 0 30px rgba(147, 51, 234, 0.3);
    }
    </style>

    <?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
