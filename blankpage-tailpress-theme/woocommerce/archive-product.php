<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 * 
 * @package BlankPage_Tailpress
 */

defined('ABSPATH') || exit;

get_header('shop'); 
?>

<div class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <main id="primary" class="site-main">
            
            <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
                <h1 class="woocommerce-products-header__title page-title text-3xl font-bold mb-8"><?php woocommerce_page_title(); ?></h1>
            <?php endif; ?>

            <?php
            /**
             * Hook: woocommerce_archive_description.
             */
            do_action('woocommerce_archive_description');
            ?>

            <?php if (woocommerce_product_loop()) : ?>
                
                <!-- Shop Controls -->
                <div class="flex flex-col lg:flex-row justify-between items-center mb-8 bg-white rounded-lg p-6 shadow-sm border">
                    <div class="flex items-center mb-4 lg:mb-0">
                        <span class="text-gray-600 font-medium">
                            <?php
                            // Custom Estonian result count
                            global $wp_query;
                            $total = $wp_query->found_posts;
                            $per_page = $wp_query->get('posts_per_page');
                            $current_page = max(1, $wp_query->get('paged'));
                            $first = ($per_page * ($current_page - 1)) + 1;
                            $last = min($total, $wp_query->get('posts_per_page') * $current_page);
                            
                            if ($total <= $per_page || -1 === $per_page) {
                                echo "Näitan kõiki {$total} tulemust";
                            } else {
                                echo "Näitan {$first}&ndash;{$last} {$total} tulemusest";
                            }
                            ?>
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-end lg:justify-start">
                        <?php woocommerce_catalog_ordering(); ?>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12 mt-8">
                    <?php
                    // Remove default hooks that create UL structure
                    remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
                    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
                    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
                    
                    while (have_posts()) {
                        the_post();

                        /**
                         * Hook: woocommerce_shop_loop.
                         */
                        do_action('woocommerce_shop_loop');

                        wc_get_template_part('content', 'product');
                    }
                    ?>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center">
                    <?php
                    /**
                     * Hook: woocommerce_after_shop_loop.
                     */
                    do_action('woocommerce_after_shop_loop');
                    ?>
                </div>

            <?php else : ?>
                <?php
                /**
                 * Hook: woocommerce_no_products_found.
                 */
                do_action('woocommerce_no_products_found');
                ?>
            <?php endif; ?>

        </main><!-- #main -->
    </div>
</div>

<?php
get_footer('shop');
