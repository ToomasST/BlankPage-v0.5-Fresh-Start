<?php
/**
 * The Template for displaying all single products
 *
 * @package BlankPage_Tailpress
 */

defined('ABSPATH') || exit;

get_header('shop'); ?>

<div class="min-h-screen bg-gray-50">
    <?php
    /**
     * Hook: woocommerce_before_main_content.
     */
    do_action('woocommerce_before_main_content');
    ?>

    <div class="container mx-auto px-4 py-8">
        
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <!-- Breadcrumb -->
            <nav class="mb-8" aria-label="Breadcrumb">
                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary.
                 * Contains breadcrumb
                 */
                do_action('woocommerce_before_single_product_summary');
                ?>
            </nav>

            <!-- Product Details -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-12">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">
                    
                    <!-- Product Images -->
                    <div class="space-y-4">
                        <?php
                        /**
                         * Hook: woocommerce_before_single_product_summary.
                         * Contains product images and gallery
                         */
                        do_action('woocommerce_before_single_product_summary');
                        ?>
                    </div>

                    <!-- Product Summary -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 pb-6">
                            <?php
                            /**
                             * Hook: woocommerce_single_product_summary.
                             * Contains title, price, excerpt, add to cart, meta
                             */
                            do_action('woocommerce_single_product_summary');
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Data Tabs -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-12">
                <?php
                /**
                 * Hook: woocommerce_after_single_product_summary.
                 * Contains product data tabs
                 */
                do_action('woocommerce_after_single_product_summary');
                ?>
            </div>

            <!-- Related Products -->
            <div class="mb-12">
                <?php
                /**
                 * Hook: woocommerce_output_related_products.
                 * Contains related products
                 */
                woocommerce_output_related_products();
                ?>
            </div>

        <?php endwhile; // end of the loop. ?>

    </div>

    <?php
    /**
     * Hook: woocommerce_after_main_content.
     */
    do_action('woocommerce_after_main_content');
    ?>

    <?php
    /**
     * Hook: woocommerce_sidebar.
     */
    do_action('woocommerce_sidebar');
    ?>

</div>

<style>
/* Custom styles for single product page */
.woocommerce div.product .woocommerce-product-gallery {
    @apply w-full;
}

.woocommerce div.product .woocommerce-product-gallery__wrapper {
    @apply rounded-lg overflow-hidden;
}

.woocommerce div.product .woocommerce-product-gallery__image {
    @apply block;
}

.woocommerce div.product p.price {
    @apply text-3xl font-bold text-gray-900 mb-4;
}

.woocommerce div.product p.price del {
    @apply text-xl text-gray-500 font-normal mr-3;
}

.woocommerce div.product p.price ins {
    @apply text-green-600 no-underline;
}

.woocommerce div.product .product_title {
    @apply text-3xl font-bold text-gray-900 mb-4;
}

.woocommerce div.product .woocommerce-product-details__short-description {
    @apply text-gray-600 mb-6 leading-relaxed;
}

.woocommerce div.product form.cart {
    @apply space-y-4 mb-8;
}

.woocommerce div.product form.cart .button {
    @apply w-full lg:w-auto bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-4 px-8 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl;
}

.woocommerce div.product .woocommerce-tabs {
    @apply mt-8;
}

.woocommerce div.product .woocommerce-tabs ul.tabs {
    @apply flex border-b border-gray-200 mb-6 overflow-x-auto;
}

.woocommerce div.product .woocommerce-tabs ul.tabs li {
    @apply mr-8 mb-0;
}

.woocommerce div.product .woocommerce-tabs ul.tabs li a {
    @apply block py-4 px-2 text-gray-600 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition-colors font-medium whitespace-nowrap;
}

.woocommerce div.product .woocommerce-tabs ul.tabs li.active a {
    @apply text-blue-600 border-blue-600;
}

.woocommerce div.product .woocommerce-tabs .panel {
    @apply p-6;
}

.woocommerce div.product .product_meta {
    @apply text-sm text-gray-600 space-y-2 mt-6 pt-6 border-t border-gray-200;
}

.woocommerce div.product .product_meta span {
    @apply block;
}

.woocommerce .star-rating {
    @apply text-yellow-400 mb-4;
}

.woocommerce #reviews #comments {
    @apply space-y-6;
}

.woocommerce #reviews #comments .comment_container {
    @apply bg-gray-50 p-6 rounded-lg;
}
</style>

<?php get_footer('shop'); ?>
