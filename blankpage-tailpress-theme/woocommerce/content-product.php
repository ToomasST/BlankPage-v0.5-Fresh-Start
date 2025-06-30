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

<article <?php wc_product_class('product-card', $product); ?> aria-labelledby="product-<?php the_ID(); ?>-title">
    
    <!-- Product Image -->
    <div class="product-card__image">
        <a href="<?php the_permalink(); ?>" class="block">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('woocommerce_thumbnail', array('class' => '')); ?>
            <?php else : ?>
                <div class="product-card__image-placeholder">
                    <span>Pilt puudub</span>
                </div>
            <?php endif; ?>
        </a>
        
        <?php if ($product->is_on_sale()) : ?>
            <span class="product-card__badge product-card__badge--sale">
                <?php
                $percentage = round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100);
                echo "-{$percentage}%";
                ?>
            </span>
        <?php endif; ?>
        
        <?php if (!$product->is_in_stock()) : ?>
            <span class="product-card__badge product-card__badge--out-of-stock">
                Pole saadaval
            </span>
        <?php endif; ?>
    </div>
    
    <!-- Product Content -->
    <div class="product-card__content">
        <h3 class="product-card__title" id="product-<?php the_ID(); ?>-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        
        <div class="product-card__meta">
            <?php
            $product_cats = wp_get_post_terms(get_the_ID(), 'product_cat');
            if (!empty($product_cats)) {
                echo '<div class="product-card__category">' . esc_html($product_cats[0]->name) . '</div>';
            }
            ?>
        </div>
        
        <?php if (wc_review_ratings_enabled()) : ?>
            <?php
            $average_rating = $product->get_average_rating();
            $rating_count = $product->get_rating_count();
            
            if ($average_rating > 0) :
            ?>
                <div class="product-card__rating">
                    <div class="product-card__stars">
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $average_rating) {
                                echo '<span class="text-warning-500">★</span>';
                            } else {
                                echo '<span class="text-gray-300">★</span>';
                            }
                        }
                        ?>
                    </div>
                    <?php if ($rating_count > 0) : ?>
                        <span class="product-card__rating-count">(<?php echo $rating_count; ?>)</span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        
        <div class="product-card__price">
            <?php if ($product->is_on_sale()) : ?>
                <div class="product-card__price product-card__price--on-sale">
                    <span class="price-sale"><?php echo $product->get_sale_price(); ?> €</span>
                    <span class="price-regular"><?php echo $product->get_regular_price(); ?> €</span>
                </div>
            <?php else : ?>
                <span class="price-current"><?php echo $product->get_price(); ?> €</span>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Product Actions -->
    <?php if ($product->is_purchasable() && $product->is_in_stock()) : ?>
        <div class="product-card__actions">
            <a href="<?php echo esc_url(wc_get_cart_url() . '?add-to-cart=' . $product->get_id()); ?>" class="product-card__action-btn" title="Lisa ostukorvi" data-product_id="<?php echo $product->get_id(); ?>">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                <span class="action-text">Lisa korvi</span>
            </a>
            <div class="product-card__action-divider"></div>
            <a href="<?php the_permalink(); ?>" class="product-card__action-btn" title="Vaata toodet">
                <span class="action-text">Vaata toodet</span>
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </a>
        </div>
    <?php else : ?>
        <div class="product-card__actions">
            <button disabled class="product-card__action-btn product-card__action-btn--disabled" title="Pole saadaval">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
                <span class="action-text">Pole saadaval</span>
            </button>
        </div>
    <?php endif; ?>
    </div>
</article>
