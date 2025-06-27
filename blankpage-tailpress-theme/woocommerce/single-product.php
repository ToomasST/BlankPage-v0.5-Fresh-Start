<?php
/**
 * The Template for displaying all single products
 *
 * @package BlankPage_Tailpress
 */

defined('ABSPATH') || exit;

get_header('shop'); ?>

<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <?php global $product; ?>

            <!-- Custom Breadcrumb -->
            <nav class="mb-6" aria-label="Breadcrumb">
                <div class="text-sm text-gray-500">
                    <?php woocommerce_breadcrumb([
                        'delimiter'   => ' › ',
                        'wrap_before' => '<nav class="woocommerce-breadcrumb">',
                        'wrap_after'  => '</nav>',
                        'before'      => '',
                        'after'       => '',
                        'home'        => _x('Avaleht', 'breadcrumb', 'woocommerce'),
                    ]); ?>
                </div>
            </nav>

            <!-- Main Product Section -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-12">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">
                    
                    <!-- Images container: Custom Gallery Implementation -->
                    <div class="gallery-container">
                        <?php
                        // Custom Gallery Implementation following the guide
                        global $product;
                        $main_id = $product->get_image_id();
                        $gallery_ids = $product->get_gallery_image_ids();
                        array_unshift($gallery_ids, $main_id); // pane põhifoto esimeseks
                        
                        // SAFE JSON encoding for HTML attributes
                        $image_urls = array_map('wp_get_attachment_url', $gallery_ids);
                        $json_data = htmlspecialchars(json_encode($image_urls), ENT_QUOTES, 'UTF-8');
                        ?>
                        
                        <div
                            x-data="{ 
                                active: 0, 
                                images: <?php echo $json_data; ?>,
                                topOpacity: 0, 
                                bottomOpacity: 0,
                                fadeDistance: 80
                            }"
                            class="flex flex-col md:flex-row gap-4"
                        >
                            <!-- THUMBS -->
                            <div class="relative w-full md:w-24 flex-shrink-0">
                                <div 
                                    class="flex md:flex-col gap-2 md:overflow-y-auto overflow-x-auto md:h-full p-1 max-h-[464px] scrollbar-hide"
                                    x-ref="scrollContainer"
                                    @scroll="
                                        const el = $refs.scrollContainer;
                                        const fade = fadeDistance;
                                        
                                        // Calculate top gradient opacity (0px = 0, 80px+ = 1)
                                        topOpacity = Math.min(el.scrollTop / fade, 1);
                                        
                                        // Calculate bottom gradient opacity
                                        const scrollBottom = el.scrollTop + el.clientHeight;
                                        const distanceFromBottom = el.scrollHeight - scrollBottom;
                                        bottomOpacity = el.scrollHeight > el.clientHeight ? Math.min(distanceFromBottom / fade, 1) : 0;
                                    "
                                    x-init="
                                        $nextTick(() => {
                                            const el = $refs.scrollContainer;
                                            topOpacity = 0;
                                            bottomOpacity = el.scrollHeight > el.clientHeight ? 1 : 0;
                                        });
                                    "
                                >
                                    <?php foreach ($gallery_ids as $index => $id) : ?>
                                        <button
                                            @click="active = <?php echo $index; ?>"
                                            :class="{'ring-2 ring-blue-500': active === <?php echo $index; ?> }"
                                            class="aspect-square w-24 md:w-full flex-shrink-0 rounded overflow-hidden focus:outline-none"
                                        >
                                            <img src="<?php echo wp_get_attachment_image_url($id, 'woocommerce_thumbnail'); ?>" class="w-full h-full object-cover" />
                                        </button>
                                    <?php endforeach; ?>
                                    
                                    <!-- Progressive gradient fade - Final clean version -->
                                    <!-- Top gradient -->
                                    <div 
                                        x-show="topOpacity > 0" 
                                        :style="{ opacity: topOpacity }"
                                        x-transition:enter="transition-opacity duration-250 ease-out" 
                                        x-transition:leave="transition-opacity duration-250 ease-in"
                                        class="absolute top-0 left-0 right-0 h-8 bg-gradient-to-b from-white via-white/70 to-transparent pointer-events-none hidden md:block z-10"
                                    ></div>
                                    
                                    <!-- Bottom gradient -->
                                    <div 
                                        x-show="bottomOpacity > 0" 
                                        :style="{ opacity: bottomOpacity }"
                                        x-transition:enter="transition-opacity duration-250 ease-out" 
                                        x-transition:leave="transition-opacity duration-250 ease-in"
                                        class="absolute bottom-0 left-0 right-0 h-8 bg-gradient-to-t from-white via-white/70 to-transparent pointer-events-none hidden md:block z-10"
                                    ></div>
                                </div>
                            </div>

                            <!-- MAIN IMAGE (1:1) -->
                            <div class="relative flex-1 aspect-square">
                                <!-- Fancybox Gallery - Main Visible Image -->
                                <a
                                    :href="images[active]"                      
                                    class="block w-full h-full"
                                    data-fancybox="product-gallery"
                                    :data-caption="'Product image ' + (active + 1)"
                                >
                                    <img
                                        :src="images[active]"
                                        :alt="'Product image'"
                                        class="w-full h-full object-contain"
                                        loading="lazy"
                                    >

                                    <!-- Zoom/Lightbox-trigger -->
                                    <span class="absolute top-2 right-2 p-1 bg-white/80 rounded-full shadow cursor-zoom-in" aria-label="Open image gallery">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                                        </svg>
                                    </span>
                                </a>
                                
                                <!-- Hidden Gallery Links for Fancybox Navigation -->
                                <div class="hidden">
                                    <?php foreach ($gallery_ids as $index => $id) : ?>
                                        <a
                                            href="<?php echo wp_get_attachment_url($id); ?>"
                                            data-fancybox="product-gallery"
                                            data-caption="Product image <?php echo $index + 1; ?>"
                                        ></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Fancybox Initialization Script -->
                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Initialize Fancybox with custom options
                            Fancybox.bind('[data-fancybox="product-gallery"]', {
                                infinite: true,
                                keyboard: true,
                                wheel: false,
                                touch: {
                    vertical: true,
                    momentum: true
                },
                buttons: [
                    "zoom",
                    "slideShow", 
                    "fullScreen",
                    "download",
                    "thumbs",
                    "close"
                ],
                Toolbar: {
                    display: {
                        left: ["infobar"],
                        middle: [
                            "zoomIn",
                            "zoomOut", 
                            "toggle1to1",
                            "rotateCCW",
                            "rotateCW",
                            "flipX",
                            "flipY"
                        ],
                        right: ["slideshow", "thumbs", "close"]
                    }
                }
            });
        });
        </script>
                    </div>

                    <!-- Product Details - Right Side -->
                    <div class="order-2 space-y-6">
                        
                        <!-- Product Title & Rating -->
                        <div class="space-y-3">
                            <h1 class="text-2xl font-bold text-gray-900"><?php the_title(); ?></h1>
                            
                            <?php if ($product->get_short_description()) : ?>
                                <p class="text-gray-600 text-base leading-relaxed"><?php echo $product->get_short_description(); ?></p>
                            <?php endif; ?>
                            
                            <!-- Rating - Match Product Card Style -->
                            <?php if (wc_review_ratings_enabled()) : ?>
                                <div class="flex items-center space-x-2">
                                    <?php
                                    $average_rating = $product->get_average_rating();
                                    $rating_count = $product->get_rating_count();
                                    if ($average_rating > 0) :
                                    ?>
                                        <div class="flex items-center">
                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                <svg class="w-4 h-4 <?php echo $i <= $average_rating ? 'text-yellow-400' : 'text-gray-300'; ?>" 
                                                     fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.95-.69l1.07-3.292z" />
                                                </svg>
                                            <?php endfor; ?>
                                            <span class="text-sm text-gray-600 ml-2"><?php echo number_format($average_rating, 1); ?></span>
                                        </div>
                                        <span class="text-sm text-gray-500">
                                            (<?php echo $rating_count; ?> hinnangut)
                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Price -->
                        <div class="space-y-2">
                            <?php if ($product->is_on_sale()) : ?>
                                <?php 
                                $regular_price = $product->get_regular_price();
                                $sale_price = $product->get_sale_price();
                                if ($regular_price && $sale_price) :
                                ?>
                                    <div class="flex items-baseline space-x-3">
                                        <span class="text-sm text-gray-400 line-through">
                                            <?php echo number_format((float)$regular_price, 2, ',', ' ') . ' €'; ?>
                                        </span>
                                        <span class="text-3xl font-bold text-green-600">
                                            <?php echo number_format((float)$sale_price, 2, ',', ' ') . ' €'; ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                            <?php else : ?>
                                <div class="text-3xl font-bold text-gray-900">
                                    <?php echo number_format((float)$product->get_price(), 2, ',', ' ') . ' €'; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Product Categories -->
                        <?php 
                        $product_categories = get_the_terms($product->get_id(), 'product_cat');
                        if ($product_categories && !is_wp_error($product_categories)) :
                        ?>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach (array_slice($product_categories, 0, 3) as $category) : ?>
                                    <a href="<?php echo get_term_link($category); ?>" 
                                       class="inline-block bg-gray-100 text-gray-600 hover:bg-blue-100 hover:text-blue-600 text-sm px-3 py-1 rounded-full transition-colors no-underline hover:no-underline">
                                        <?php echo esc_html($category->name); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Add to Cart Form -->
                        <?php if ($product->is_purchasable() && $product->is_in_stock()) : ?>
                            <form class="cart space-y-4" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
                                
                                <!-- Variable Product Attributes -->
                                <?php if ($product->is_type('variable')) : ?>
                                    <div class="space-y-4">
                                        <?php foreach ($product->get_variation_attributes() as $attribute_name => $options) : ?>
                                            <div>
                                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                                    <?php echo wc_attribute_label($attribute_name); ?>
                                                </label>
                                                <select name="attribute_<?php echo sanitize_title($attribute_name); ?>" 
                                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                                    <option value="">Vali <?php echo wc_attribute_label($attribute_name); ?></option>
                                                    <?php foreach ($options as $option) : ?>
                                                        <option value="<?php echo esc_attr($option); ?>"><?php echo esc_html($option); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Quantity Selector -->
                                <div class="flex items-center space-x-4">
                                    <label class="text-sm font-semibold text-gray-700">Kogus:</label>
                                    <div class="flex items-center border border-gray-300 rounded-lg">
                                        <button type="button" class="px-3 py-2 text-gray-600 hover:text-gray-800 quantity-minus">−</button>
                                        <input type="number" 
                                               name="quantity" 
                                               value="<?php echo esc_attr(isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : 1); ?>" 
                                               min="1" 
                                               max="<?php echo esc_attr(0 < $product->get_max_purchase_quantity() ? $product->get_max_purchase_quantity() : ''); ?>"
                                               class="w-16 text-center border-0 focus:ring-0 quantity-input">
                                        <button type="button" class="px-3 py-2 text-gray-600 hover:text-gray-800 quantity-plus">+</button>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                                    <!-- Add to Cart Button -->
                                    <button type="submit" 
                                            name="add-to-cart" 
                                            value="<?php echo esc_attr($product->get_id()); ?>" 
                                            class="flex-1 flex items-center justify-center bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 no-underline hover:no-underline whitespace-nowrap">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2 flex-shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12 1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        Lisa korvi
                                    </button>

                                    <!-- Buy Now Button (instead of wishlist) -->
                                    <button type="button" 
                                            onclick="buyNow(this)"
                                            class="flex-1 flex items-center justify-center bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 no-underline hover:no-underline whitespace-nowrap">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2 flex-shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                                        </svg>
                                        Osta kohe
                                    </button>
                                </div>
                            </form>
                        <?php else : ?>
                            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                                <p class="text-red-600 font-semibold">Toode pole hetkel saadaval</p>
                            </div>
                        <?php endif; ?>

                        <!-- Product Meta -->
                        <div class="pt-6 border-t border-gray-200 space-y-2 text-sm text-gray-600">
                            <?php if ($product->get_sku()) : ?>
                                <div><span class="font-semibold">Tootekood:</span> <?php echo $product->get_sku(); ?></div>
                            <?php endif; ?>
                            
                            <?php 
                            $product_tags = get_the_terms($product->get_id(), 'product_tag');
                            if ($product_tags && !is_wp_error($product_tags)) :
                            ?>
                                <div>
                                    <span class="font-semibold">Märksõnad:</span>
                                    <?php 
                                    $tag_names = array_map(function($tag) {
                                        return '<a href="' . get_term_link($tag) . '" class="text-blue-600 hover:text-blue-800 no-underline hover:underline">' . $tag->name . '</a>';
                                    }, array_slice($product_tags, 0, 3));
                                    echo implode(', ', $tag_names);
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Data Tabs -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-12">
                <div class="p-8">
                    <?php woocommerce_output_product_data_tabs(); ?>
                </div>
            </div>

            <!-- Related Products -->
            <?php woocommerce_output_related_products(); ?>

        <?php endwhile; ?>

    </div>

    <?php do_action('woocommerce_after_main_content'); ?>
</div>

<style>
/* WordPress 6.6.0 underline bug fix */
:root :where(a:where(:not(.wp-element-button))) {
    text-decoration: none;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Quantity controls
    const quantityInput = document.querySelector('.quantity-input');
    const minusBtn = document.querySelector('.quantity-minus');
    const plusBtn = document.querySelector('.quantity-plus');
    
    if (quantityInput && minusBtn && plusBtn) {
        minusBtn.addEventListener('click', function() {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });
        
        plusBtn.addEventListener('click', function() {
            const currentValue = parseInt(quantityInput.value);
            const maxValue = parseInt(quantityInput.getAttribute('max'));
            if (!maxValue || currentValue < maxValue) {
                quantityInput.value = currentValue + 1;
            }
        });
    }
});

// Buy Now functionality - Add to cart and redirect to checkout
function buyNow(button) {
    const form = button.closest('form.cart');
    if (!form) return;
    
    // Show loading state
    const originalText = button.innerHTML;
    button.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Lisa korvi...';
    button.disabled = true;
    
    // Create FormData from the form
    const formData = new FormData(form);
    
    // Add AJAX parameters
    formData.append('action', 'woocommerce_add_to_cart');
    
    // Send AJAX request
    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert('Viga: ' + data.error);
            button.innerHTML = originalText;
            button.disabled = false;
        } else {
            // Success - redirect to checkout
            window.location.href = '<?php echo wc_get_checkout_url(); ?>';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Viga toote lisamisel. Palun proovige uuesti.');
        button.innerHTML = originalText;
        button.disabled = false;
    });
}
</script>

<?php get_footer('shop'); ?>
