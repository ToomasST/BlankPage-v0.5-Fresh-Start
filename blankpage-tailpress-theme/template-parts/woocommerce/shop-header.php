<?php
/**
 * Shop Header Template Part
 * Custom shop page header for BlankPage TailPress theme
 *
 * @package BlankPage_Tailpress
 */
?>

<div class="shop-header bg-white border-b border-gray-200 mb-8">
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            
            <!-- Page Title -->
            <div>
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">
                    <?php 
                    if (is_shop()) {
                        echo 'Pood';
                    } else {
                        woocommerce_page_title();
                    }
                    ?>
                </h1>
                
                <?php if (is_product_category() || is_product_tag()) : ?>
                    <div class="text-gray-600">
                        <?php echo term_description(); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Results Count & Sorting -->
            <div class="flex flex-col sm:flex-row gap-4 lg:items-center">
                <div class="text-sm text-gray-600">
                    <?php woocommerce_result_count(); ?>
                </div>
                
                <div class="woocommerce-ordering">
                    <?php woocommerce_catalog_ordering(); ?>
                </div>
            </div>
        </div>
        
        <!-- Category Filter (if needed) -->
        <?php if (is_shop() && !is_search()) : ?>
            <div class="mt-6 border-t border-gray-100 pt-6">
                <div class="flex flex-wrap gap-2">
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => true,
                        'parent' => 0
                    ));
                    
                    if ($categories && !is_wp_error($categories)) :
                        foreach ($categories as $category) :
                    ?>
                        <a href="<?php echo get_term_link($category); ?>" 
                           class="inline-block px-4 py-2 text-sm bg-gray-100 hover:bg-blue-500 hover:text-white rounded-full transition-colors duration-200">
                            <?php echo $category->name; ?>
                        </a>
                    <?php 
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
