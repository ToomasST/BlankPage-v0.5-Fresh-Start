<?php
/**
 * The template for displaying product content within loops
 *
 * @package BlankPage_Tailpress
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>

<article <?php wc_product_class('group border border-gray-200 rounded-xl overflow-hidden hover:shadow-xl hover:border-gray-300 transition-all duration-300 flex flex-col h-full bg-white', $product); ?> 
         aria-labelledby="product-<?php the_ID(); ?>-title">
    
    <!-- Product Image - Edge to Edge -->
    <div class="relative aspect-square overflow-hidden group-hover:scale-[1.02] transition-transform duration-300">
        <a href="<?php the_permalink(); ?>" class="block h-full">
            <?php
            /**
             * Hook: woocommerce_before_shop_loop_item_title.
             */
            do_action('woocommerce_before_shop_loop_item_title');
            ?>
        </a>
        
        <!-- Sale Badge -->
        <?php if ($product->is_on_sale()) : ?>
            <div class="absolute top-3 left-3 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg z-10">
                <?php
                if ($product->get_type() === 'variable') {
                    echo 'Allahindlus!';
                } else {
                    $percentage = round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100);
                    echo '-' . $percentage . '%';
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
    
    <!-- Product Content with Padding -->
    <div class="flex-grow flex flex-col p-6">
        <!-- Product Title -->
        <h2 class="text-lg font-semibold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2" id="product-<?php the_ID(); ?>-title">
            <a href="<?php the_permalink(); ?>" class="text-inherit no-underline hover:no-underline">
                <?php the_title(); ?>
            </a>
        </h2>
        
        <!-- Product Rating -->
        <?php if (wc_review_ratings_enabled()) : ?>
            <div class="mb-3">
                <?php echo wc_get_rating_html($product->get_average_rating()); ?>
                <?php if ($product->get_rating_count() > 0) : ?>
                    <span class="text-sm text-gray-500 ml-2">
                        (<?php echo $product->get_rating_count(); ?>)
                    </span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <!-- Product Price -->
        <div class="mb-4 flex-grow">
            <?php
            /**
             * Hook: woocommerce_after_shop_loop_item_title.
             */
            do_action('woocommerce_after_shop_loop_item_title');
            ?>
        </div>
        
        <!-- Product Categories -->
        <?php
        $product_categories = get_the_terms($product->get_id(), 'product_cat');
        if ($product_categories && !is_wp_error($product_categories)) :
            ?>
            <div class="mb-6">
                <?php foreach (array_slice($product_categories, 0, 2) as $category) : ?>
                    <span class="inline-block bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full mr-2">
                        <?php echo esc_html($category->name); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <!-- Action Buttons -->
        <div class="mt-auto space-y-3">
            <!-- View Product Button -->
            <a href="<?php the_permalink(); ?>" class="flex items-center justify-between w-full bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-3 px-4 rounded-lg transition-colors duration-200 no-underline hover:no-underline">
                <span>Vaata toodet</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2 opacity-70">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </a>
            
            <!-- Add to Cart Button -->
            <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" 
               data-quantity="1" 
               data-product_id="<?php echo esc_attr($product->get_id()); ?>" 
               data-product_sku="<?php echo esc_attr($product->get_sku()); ?>"
               class="flex items-center justify-between w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 no-underline hover:no-underline add_to_cart_button ajax_add_to_cart">
                <span>Lisa korvi</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2 opacity-70">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
            </a>
        </div>
    </div>
</article>
