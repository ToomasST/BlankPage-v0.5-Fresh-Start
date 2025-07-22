<?php
/**
 * The template for displaying WooCommerce pages
 *
 * @package BlankPage_Tailpress
 */

get_header(); ?>

<div class="bg-gray-50 min-h-screen">
    <?php if ( is_cart() ) : ?>
        <main id="primary" class="site-main">
    <?php else : ?>
        <div class="container mx-auto px-4 py-8">
            <main id="primary" class="site-main">
            
            <?php
            /**
             * Hook: woocommerce_before_main_content
             */
            do_action('woocommerce_before_main_content');
            ?>

            <div class="woocommerce-content">
                <?php
                if (function_exists('woocommerce_content')) {
                    woocommerce_content();
                }
                ?>
            </div>

            <?php
            /**
             * Hook: woocommerce_after_main_content
             */
            do_action('woocommerce_after_main_content');
            ?>

        </main><!-- #main -->
    <?php if ( !is_cart() ) : ?>
        </div>
    <?php endif; ?>
</div>

<?php
/**
 * Hook: woocommerce_sidebar
 */
do_action('woocommerce_sidebar');

get_footer();
