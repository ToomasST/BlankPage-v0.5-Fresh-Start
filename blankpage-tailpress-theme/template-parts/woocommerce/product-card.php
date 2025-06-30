<?php
/**
 * Product Card Template Part
 * Custom product display for BlankPage TailPress theme with Design System Components
 *
 * @package BlankPage_Tailpress
 */

global $product;

if (!$product) {
    return;
}
?>

<div class="product-card">
    <div class="product-card__image">
        <a href="<?php echo get_permalink(); ?>" class="block">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium', array('class' => '')); ?>
            <?php else : ?>
                <div class="product-card__image-placeholder">
                    <span>Pilt puudub</span>
                </div>
            <?php endif; ?>
        </a>
        
        <?php if ($product->is_on_sale()) : ?>
            <span class="product-card__badge product-card__badge--sale">
                Soodustus
            </span>
        <?php endif; ?>
        
        <?php if ($product->is_featured()) : ?>
            <span class="product-card__badge product-card__badge--featured" style="top: <?php echo $product->is_on_sale() ? '3rem' : 'var(--spacing-2)'; ?>">
                Soovitatud
            </span>
        <?php endif; ?>
    </div>
    
    <div class="product-card__content">
        <h3 class="product-card__title">
            <a href="<?php echo get_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        
        <div class="product-card__meta">
            <div class="product-card__price<?php echo $product->is_on_sale() ? ' product-card__price--on-sale' : ''; ?>">
                <?php if ($product->is_on_sale()) : ?>
                    <span class="price-sale"><?php echo wc_price($product->get_sale_price()); ?></span>
                    <span class="price-original"><?php echo wc_price($product->get_regular_price()); ?></span>
                <?php else : ?>
                    <?php echo $product->get_price_html(); ?>
                <?php endif; ?>
            </div>
            
            <?php if ($product->get_average_rating()) : ?>
                <div class="product-card__rating">
                    <div class="product-card__rating-stars">
                        <?php echo wc_get_rating_html($product->get_average_rating()); ?>
                    </div>
                    <span class="product-card__rating-count">
                        (<?php echo $product->get_review_count(); ?>)
                    </span>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="product-card__actions">
            <?php if ($product->is_purchasable() && $product->is_in_stock()) : ?>
                <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" 
                   class="product-card__add-to-cart" 
                   data-quantity="1" 
                   data-product_id="<?php echo $product->get_id(); ?>" 
                   data-product_sku="<?php echo esc_attr($product->get_sku()); ?>">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    <?php echo esc_html($product->add_to_cart_text()); ?>
                </a>
            <?php else : ?>
                <span class="product-card__add-to-cart" style="background-color: var(--color-gray-400); cursor: not-allowed;">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                    Pole saadaval
                </span>
            <?php endif; ?>
        </div>
    </div>
</div>
