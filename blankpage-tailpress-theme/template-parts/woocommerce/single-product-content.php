<?php
/**
 * Single Product Content Template Part
 * Custom single product layout for BlankPage TailPress theme
 *
 * @package BlankPage_Tailpress
 */

global $product;

if (!$product) {
    return;
}
?>

<div class="single-product-content bg-white">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            
            <!-- Product Images -->
            <div class="product-images">
                <div class="product-gallery">
                    <?php
                    /**
                     * Hook: woocommerce_before_single_product_summary
                     * 
                     * @hooked woocommerce_show_product_sale_flash - 10
                     * @hooked woocommerce_show_product_images - 20
                     */
                    do_action('woocommerce_before_single_product_summary');
                    ?>
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="product-info">
                <div class="product-summary entry-summary">
                    <?php
                    /**
                     * Hook: woocommerce_single_product_summary
                     * 
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     */
                    do_action('woocommerce_single_product_summary');
                    ?>
                </div>
            </div>
        </div>
        
        <!-- Product Tabs -->
        <div class="product-tabs mt-12">
            <?php
            /**
             * Hook: woocommerce_after_single_product_summary
             * 
             * @hooked woocommerce_output_product_data_tabs - 10
             * @hooked woocommerce_upsell_display - 15
             * @hooked woocommerce_output_related_products - 20
             */
            do_action('woocommerce_after_single_product_summary');
            ?>
        </div>
    </div>
</div>
