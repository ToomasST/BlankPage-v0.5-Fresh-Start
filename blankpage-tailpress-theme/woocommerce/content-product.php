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

<article <?php wc_product_class('group bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 flex flex-col h-full hover:shadow-xl hover:-translate-y-0.5', $product); ?> aria-labelledby="product-<?php the_ID(); ?>-title">
    
    <!-- Product Image -->
    <div class="relative aspect-square overflow-hidden">
        <a href="<?php the_permalink(); ?>" class="block w-full h-full no-underline">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('woocommerce_single', array('class' => 'w-full h-full object-cover transition-transform duration-300 group-hover:scale-105')); ?>
            <?php else : ?>
                <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 text-sm">
                    <span>Pilt puudub</span>
                </div>
            <?php endif; ?>
        </a>
        
        <?php if ($product->is_on_sale()) : ?>
            <span class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                <?php
                $regular_price = (float) $product->get_regular_price();
                $sale_price = (float) $product->get_sale_price();
                if ($regular_price > 0) {
                    $percentage = round((($regular_price - $sale_price) / $regular_price) * 100);
                    echo "-{$percentage}%";
                }
                ?>
            </span>
        <?php endif; ?>
        
        <?php if (!$product->is_in_stock()) : ?>
            <span class="absolute top-2 right-2 bg-gray-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                Pole saadaval
            </span>
        <?php endif; ?>
    </div>
    
    <!-- Product Content -->
    <div class="p-4 flex flex-col flex-1">
        <h3 class="text-base font-semibold text-gray-900 mb-2 leading-tight line-clamp-2" id="product-<?php the_ID(); ?>-title">
            <a href="<?php the_permalink(); ?>" class="text-gray-900 no-underline transition-colors duration-150 hover:text-brand-600"><?php the_title(); ?></a>
        </h3>
        
        <div class="flex items-center justify-between mb-3 gap-2">
            <?php if ($product->is_on_sale()) : ?>
                <div class="flex items-center gap-2">
                    <span class="text-lg font-bold text-red-600"><?php echo wc_price($product->get_sale_price()); ?></span>
                    <span class="text-sm font-normal text-gray-500 line-through"><?php echo wc_price($product->get_regular_price()); ?></span>
                </div>
            <?php else : ?>
                <div class="text-lg font-bold text-gray-900">
                    <span><?php echo wc_price($product->get_price()); ?></span>
                </div>
            <?php endif; ?>
            
            <?php if (wc_review_ratings_enabled()) : ?>
                <?php
                $average_rating = $product->get_average_rating();
                $rating_count = $product->get_rating_count();
                
                if ($average_rating > 0) :
                ?>
                    <div class="flex items-center gap-1 text-warning-500 text-sm">
                        <div class="flex gap-px">
                            <?php
                            $stars = '';
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $average_rating) {
                                    $stars .= '★';
                                } else {
                                    $stars .= '☆';
                                }
                            }
                            echo '<span class="text-warning-500">' . $stars . '</span>';
                            ?>
                        </div>
                        <?php if ($rating_count > 0) : ?>
                            <span class="text-xs text-gray-500">(<?php echo $rating_count; ?>)</span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        
        <!-- Product Actions -->
        <?php if ($product->is_purchasable() && $product->is_in_stock()) : ?>
            <div class="mt-auto flex items-center justify-center gap-0 border-t border-gray-200 pt-2 px-2 transition-colors duration-150  relative">
                <a href="<?php echo esc_url(wc_get_cart_url() . '?add-to-cart=' . $product->get_id()); ?>" class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-xs font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Lisa ostukorvi" data-product_id="<?php echo $product->get_id(); ?>">
                    <svg class="w-6 h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    <span class="action-text">Lisa korvi</span>
                </a>
                <div class="w-px h-8 bg-gray-300 mx-1 flex-shrink-0 transition-colors duration-150 hover:bg-brand-400"></div>
                <a href="<?php the_permalink(); ?>" class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-xs font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Vaata toodet">
                    <span class="action-text">Vaata toodet</span>
                    <svg class="w-6 h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            </div>
        <?php else : ?>
            <div class="mt-auto flex items-center justify-center gap-0 border-t border-gray-200 pt-2 px-2">
                <button disabled class="flex-1 flex flex-row items-center justify-center gap-2 p-2 bg-gray-400 text-white cursor-not-allowed text-xs font-medium uppercase rounded" title="Pole saadaval">
                    <svg class="w-6 h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                    <span class="action-text">Pole saadaval</span>
                </button>
            </div>
        <?php endif; ?>
    </div>
</article>
