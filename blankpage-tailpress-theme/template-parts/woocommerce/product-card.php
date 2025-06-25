<?php
/**
 * Product Card Template Part
 * Custom product display for BlankPage TailPress theme
 *
 * @package BlankPage_Tailpress
 */

global $product;

if (!$product) {
    return;
}
?>

<div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
    <div class="relative">
        <a href="<?php echo get_permalink(); ?>" class="block">
            <?php if (has_post_thumbnail()) : ?>
                <div class="aspect-square overflow-hidden">
                    <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300')); ?>
                </div>
            <?php else : ?>
                <div class="aspect-square bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400 text-sm">Pilt puudub</span>
                </div>
            <?php endif; ?>
        </a>
        
        <?php if ($product->is_on_sale()) : ?>
            <span class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 text-xs rounded-full">
                SOODUSTUS
            </span>
        <?php endif; ?>
    </div>
    
    <div class="p-4">
        <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2">
            <a href="<?php echo get_permalink(); ?>" class="hover:text-blue-600 transition-colors">
                <?php the_title(); ?>
            </a>
        </h3>
        
        <div class="flex items-center justify-between mb-3">
            <div class="text-lg font-bold text-gray-900">
                <?php echo $product->get_price_html(); ?>
            </div>
            
            <?php if ($product->get_average_rating()) : ?>
                <div class="flex items-center">
                    <div class="text-yellow-400 text-sm">
                        <?php echo wc_get_rating_html($product->get_average_rating()); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="mt-auto">
            <?php
            woocommerce_template_loop_add_to_cart();
            ?>
        </div>
    </div>
</div>
