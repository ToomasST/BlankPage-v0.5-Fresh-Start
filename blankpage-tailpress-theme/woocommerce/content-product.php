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
    
    <!-- Product Image - Edge to Edge with Sale Badge -->
    <div class="relative aspect-square overflow-hidden group-hover:scale-[1.02] transition-transform duration-300">
        <a href="<?php the_permalink(); ?>" class="block h-full">
            <?php
            /**
             * Hook: woocommerce_before_shop_loop_item_title.
             */
            do_action('woocommerce_before_shop_loop_item_title');
            ?>
        </a>
        
        <!-- Sale Badge (top-left corner like Image 2) -->
        <?php if ($product->is_on_sale()) : ?>
            <div class="absolute top-3 left-3 z-10">
                <?php
                $regular_price = $product->get_regular_price();
                $sale_price = $product->get_sale_price();
                if ($regular_price && $sale_price) {
                    $discount_amount = round((($regular_price - $sale_price) / $regular_price) * 100);
                    echo '<span class="bg-black text-white text-xs font-bold px-2 py-1 rounded">-' . $discount_amount . '%</span>';
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
    
    <!-- Product Content with Padding -->
    <div class="flex-grow flex flex-col p-6">
        <!-- Product Title (bolder) -->
        <h2 class="text-sm font-semibold text-gray-900 mb-2" id="product-<?php the_ID(); ?>-title">
            <a href="<?php the_permalink(); ?>" class="text-inherit no-underline hover:no-underline hover:text-blue-600 transition-colors">
                <?php the_title(); ?>
            </a>
        </h2>
        
        <!-- Price and Rating on same row -->
        <div class="flex items-start justify-between mb-4">
            <!-- Product Price -->
            <div class="flex-grow pr-4">
                <?php if ($product->is_on_sale()) : ?>
                    <?php
                    $regular_price = $product->get_regular_price();
                    $sale_price = $product->get_sale_price();
                    if ($regular_price && $sale_price) :
                        ?>
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-400 line-through mb-1"><?php echo number_format($regular_price, 2, ',', ' ') . ' €'; ?></span>
                            <span class="text-lg font-bold text-green-600"><?php echo number_format($sale_price, 2, ',', ' ') . ' €'; ?></span>
                        </div>
                    <?php else : ?>
                        <div class="text-lg font-bold text-gray-900"><?php echo $product->get_price_html(); ?></div>
                    <?php endif; ?>
                <?php else : ?>
                    <div class="text-lg font-bold text-gray-900"><?php echo $product->get_price_html(); ?></div>
                <?php endif; ?>
            </div>
            
            <!-- Rating -->
            <?php if (wc_review_ratings_enabled() && $product->get_rating_count() > 0) : ?>
                <div class="flex items-center gap-1 flex-shrink-0">
                    <?php
                    $rating = $product->get_average_rating();
                    $rating_count = $product->get_rating_count();
                    
                    // Display filled stars
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rating) {
                            echo '<svg class="w-3 h-3 text-yellow-400 fill-current" viewBox="0 0 20 20">';
                            echo '<path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>';
                            echo '</svg>';
                        } else {
                            echo '<svg class="w-3 h-3 text-gray-300 fill-current" viewBox="0 0 20 20">';
                            echo '<path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>';
                            echo '</svg>';
                        }
                    }
                    ?>
                    <span class="text-xs text-gray-500 ml-1"><?php echo number_format($rating, 1); ?></span>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Product Categories (moved to correct position: below price, above buttons) -->
        <?php
        $product_categories = get_the_terms($product->get_id(), 'product_cat');
        if ($product_categories && !is_wp_error($product_categories)) :
            ?>
            <div class="mb-4">
                <?php foreach (array_slice($product_categories, 0, 2) as $category) : ?>
                    <a href="<?php echo get_term_link($category); ?>" class="inline-block bg-gray-100 text-gray-600 hover:bg-blue-100 hover:text-blue-600 text-xs px-2 py-1 rounded-full mr-2 no-underline hover:no-underline transition-colors">
                        <?php echo esc_html($category->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <!-- Action Buttons (keep double buttons as requested) -->
        <div class="mt-auto space-y-2">
            <!-- View Product Button -->
            <a href="<?php the_permalink(); ?>" class="flex items-center justify-between w-full bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2.5 px-4 rounded-lg transition-colors duration-200 no-underline hover:no-underline">
                <span>Vaata toodet</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 opacity-70">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </a>
            
            <!-- Add to Cart Button (RESTORED: gradient + text left, icon right) -->
            <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" 
               data-quantity="1" 
               data-product_id="<?php echo esc_attr($product->get_id()); ?>" 
               data-product_sku="<?php echo esc_attr($product->get_sku()); ?>"
               class="flex items-center justify-between w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-medium py-2.5 px-4 rounded-lg transition-all duration-200 no-underline hover:no-underline add_to_cart_button ajax_add_to_cart">
                <span>Lisa korvi</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 opacity-70">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
            </a>
        </div>
    </div>
</article>
