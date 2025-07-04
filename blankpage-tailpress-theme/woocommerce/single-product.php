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
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-4 lg:p-8">
                    
                    <!-- Images container: Custom Gallery Implementation -->
                    <div class="gallery-container">
                        <?php
                        // Custom Gallery Implementation following the guide
                        global $product;
                        $main_id = $product->get_image_id();
                        $gallery_ids = $product->get_gallery_image_ids();
                        array_unshift($gallery_ids, $main_id); // pane põhifoto esimeseks
                        
                        // Display images: woocommerce_single size for performance
                        $display_image_urls = array_map(function($id) {
                            return wp_get_attachment_image_url($id, 'woocommerce_single');
                        }, $gallery_ids);
                        $display_json_data = htmlspecialchars(json_encode($display_image_urls), ENT_QUOTES, 'UTF-8');
                        
                        // Lightbox images: full size for quality
                        $lightbox_image_urls = array_map('wp_get_attachment_url', $gallery_ids);
                        $lightbox_json_data = htmlspecialchars(json_encode($lightbox_image_urls), ENT_QUOTES, 'UTF-8');
                        ?>
                        
                        <div
                            x-data="{ 
                                active: 0, 
                                displayImages: <?php echo $display_json_data; ?>,
                                lightboxImages: <?php echo $lightbox_json_data; ?>,
                                topOpacity: 0, 
                                bottomOpacity: 0,
                                leftOpacity: 0,
                                rightOpacity: 0,
                                fadeDistance: 80,
                                imageLoaded: true
                            }"
                            class="flex flex-col lg:flex-row gap-4"
                        >
                            <!-- THUMBS - First on desktop (left side), second on mobile (below) -->
                            <div class="relative w-full lg:w-24 flex-shrink-0 order-2 lg:order-1">
                                <div 
                                    class="flex lg:flex-col gap-4 overflow-x-auto lg:overflow-y-auto lg:overflow-x-visible lg:h-full p-1 lg:max-h-[464px] scrollbar-hide"
                                    x-ref="scrollContainer"
                                    @wheel="
                                        const el = $refs.scrollContainer;
                                        // Only handle horizontal scroll on smaller screens
                                        if (window.innerWidth < 1024) {
                                            $event.preventDefault();
                                            // Smooth scroll by reducing the increment
                                            el.scrollLeft += $event.deltaY * 0.5;
                                        }
                                        // On desktop, let normal vertical scroll work (no preventDefault)
                                    "
                                    @scroll="
                                        const el = $refs.scrollContainer;
                                        const fade = fadeDistance;
                                        
                                        // Desktop: vertical scroll gradients
                                        if (window.innerWidth >= 1024) {
                                            topOpacity = Math.min(el.scrollTop / fade, 1);
                                            const scrollBottom = el.scrollTop + el.clientHeight;
                                            const distanceFromBottom = el.scrollHeight - scrollBottom;
                                            bottomOpacity = el.scrollHeight > el.clientHeight ? Math.min(distanceFromBottom / fade, 1) : 0;
                                            leftOpacity = 0;
                                            rightOpacity = 0;
                                        } 
                                        // Mobile: horizontal scroll gradients
                                        else {
                                            leftOpacity = Math.min(el.scrollLeft / fade, 1);
                                            const scrollRight = el.scrollLeft + el.clientWidth;
                                            const distanceFromRight = el.scrollWidth - scrollRight;
                                            rightOpacity = el.scrollWidth > el.clientWidth ? Math.min(distanceFromRight / fade, 1) : 0;
                                            topOpacity = 0;
                                            bottomOpacity = 0;
                                        }
                                    "
                                    x-init="
                                        $nextTick(() => {
                                            const el = $refs.scrollContainer;
                                            if (window.innerWidth >= 1024) {
                                                // Desktop: vertical gradients
                                                topOpacity = 0;
                                                bottomOpacity = el.scrollHeight > el.clientHeight ? 1 : 0;
                                                leftOpacity = 0;
                                                rightOpacity = 0;
                                            } else {
                                                // Mobile: horizontal gradients
                                                leftOpacity = 0;
                                                rightOpacity = el.scrollWidth > el.clientWidth ? 1 : 0;
                                                topOpacity = 0;
                                                bottomOpacity = 0;
                                            }
                                        });
                                    "
                                >
                                    <?php foreach ($gallery_ids as $index => $id) : ?>
                                        <button
                                            @click="
                                                imageLoaded = false; 
                                                setTimeout(() => { 
                                                    active = <?php echo $index; ?>; 
                                                    imageLoaded = true; 
                                                }, 150);
                                            "
                                            :class="{'shadow-xl scale-105': active === <?php echo $index; ?> }"
                                            class="aspect-square w-24 lg:w-full flex-shrink-0 rounded overflow-hidden focus:outline-none transform transition-all duration-300 cursor-pointer"
                                        >
                                            <img src="<?php echo wp_get_attachment_image_url($id, 'woocommerce_thumbnail'); ?>" class="w-full h-full object-cover" />
                                        </button>
                                    <?php endforeach; ?>
                                    
                                    <!-- Vertical gradients (desktop only) -->
                                    <!-- Top gradient -->
                                    <div 
                                        x-show="topOpacity > 0" 
                                        :style="{ opacity: topOpacity }"
                                        x-transition:enter="transition-opacity duration-250 ease-out" 
                                        x-transition:leave="transition-opacity duration-250 ease-in"
                                        class="absolute top-0 left-0 right-0 h-8 bg-gradient-to-b from-white via-white/70 to-transparent pointer-events-none hidden lg:block z-10"
                                    ></div>
                                    
                                    <!-- Bottom gradient -->
                                    <div 
                                        x-show="bottomOpacity > 0" 
                                        :style="{ opacity: bottomOpacity }"
                                        x-transition:enter="transition-opacity duration-250 ease-out" 
                                        x-transition:leave="transition-opacity duration-250 ease-in"
                                        class="absolute bottom-0 left-0 right-0 h-8 bg-gradient-to-t from-white via-white/70 to-transparent pointer-events-none hidden lg:block z-10"
                                    ></div>
                                    
                                    <!-- Horizontal gradients (mobile only) -->
                                    <!-- Left gradient -->
                                    <div 
                                        x-show="leftOpacity > 0" 
                                        :style="{ opacity: leftOpacity }"
                                        x-transition:enter="transition-opacity duration-250 ease-out" 
                                        x-transition:leave="transition-opacity duration-250 ease-in"
                                        class="absolute top-0 bottom-0 left-0 w-8 bg-gradient-to-r from-white via-white/70 to-transparent pointer-events-none block lg:hidden z-10"
                                    ></div>
                                    
                                    <!-- Right gradient -->
                                    <div 
                                        x-show="rightOpacity > 0" 
                                        :style="{ opacity: rightOpacity }"
                                        x-transition:enter="transition-opacity duration-250 ease-out" 
                                        x-transition:leave="transition-opacity duration-250 ease-in"
                                        class="absolute top-0 bottom-0 right-0 w-8 bg-gradient-to-l from-white via-white/70 to-transparent pointer-events-none block lg:hidden z-10"
                                    ></div>
                                </div>
                            </div>

                            <!-- MAIN IMAGE (1:1) - First on mobile, second on desktop -->
                            <div class="relative flex-1 aspect-square order-1 lg:order-2">
                                <!-- Fancybox Gallery - Main Visible Image -->
                                <a
                                    href="#"
                                    @click.prevent="document.querySelectorAll('[data-fancybox=product-gallery]')[active].click()"
                                    class="block w-full h-full rounded-lg overflow-hidden bg-gray-50 border border-gray-200 transition-all duration-500 ease-out cursor-pointer"
                                    :class="imageLoaded ? 'opacity-100 scale-100' : 'opacity-0 scale-95'"
                                >
                                    <img
                                        :src="displayImages[active]"
                                        :alt="'Product image'"
                                        class="w-full h-full object-contain"
                                        loading="lazy"
                                        @load="imageLoaded = true"
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
                                            data-index="<?php echo $index; ?>"
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
                    <div class="order-2 space-y-3">
                        
                        <!-- 1. Product Title with Brand Logo -->
                        <div class="flex items-start justify-between gap-4 mb-1">
                            <h1 class="text-xl font-bold text-gray-900 flex-1 mb-0"><?php the_title(); ?></h1>
                            
                            <?php 
                            // Display brand logo if available
                            $brand_terms = get_the_terms($product->get_id(), 'product_brand');
                            if (!empty($brand_terms) && !is_wp_error($brand_terms)) {
                                $brand = $brand_terms[0]; // Get first brand
                                $brand_image_id = get_term_meta($brand->term_id, 'thumbnail_id', true);
                                
                                if ($brand_image_id) {
                                    $brand_image = wp_get_attachment_image($brand_image_id, 'thumbnail', false, [
                                        'class' => 'max-h-16 max-w-[150px] w-auto object-contain transition-opacity duration-200 hover:opacity-80',
                                        'style' => 'max-height: 64px; max-width: 150px;',
                                        'alt' => esc_attr($brand->name . ' logo')
                                    ]);
                                    
                                    $brand_archive_url = get_term_link($brand, 'product_brand');
                                    
                                    if (!is_wp_error($brand_archive_url)) {
                                        echo '<a href="' . esc_url($brand_archive_url) . '" class="flex-shrink-0 hover:no-underline" title="Vaata kõiki ' . esc_attr($brand->name) . ' tooteid">';
                                        echo $brand_image;
                                        echo '</a>';
                                    }
                                }
                            }
                            ?>
                        </div>
                        
                        <!-- 2. Rating -->
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
                                                 fill="currentColor" viewBox="0 0 20 20" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.95-.69l1.07-3.292z" />
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
                        
                        <!-- 3. Short Description -->
                        <?php if ($product->get_short_description()) : ?>
                            <div>
                                <p class="text-gray-600 text-sm leading-tight"><?php echo $product->get_short_description(); ?></p>
                            </div>
                        <?php endif; ?>

                        <!-- 4. Price -->
                        <div>
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
                        
                        <!-- 5. Tarneaeg + Saadavus Row -->
                        <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-6">
                            <!-- Delivery Time -->
                            <?php 
                            $tarneaeg_min = get_post_meta($product->get_id(), '_blankpage_tarneaeg_min', true);
                            $tarneaeg_max = get_post_meta($product->get_id(), '_blankpage_tarneaeg_max', true);
                            if ($tarneaeg_min && $tarneaeg_max) : 
                            ?>
                                <div class="flex items-center space-x-2 text-sm">
                                    <span class="font-semibold text-gray-700">Tarneaeg:</span>
                                    <span class="text-gray-600"><?php echo esc_html($tarneaeg_min); ?> - <?php echo esc_html($tarneaeg_max); ?> tööpäeva</span>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Availability Info -->
                            <div class="flex items-center space-x-2 text-sm">
                                <span class="font-semibold text-gray-700">Saadavus:</span>
                                <?php 
                                // Determine availability status
                                if ($product->is_in_stock()) {
                                    if ($product->get_stock_status() === 'onbackorder') {
                                        $status = 'Järeltellimisel';
                                        $status_class = 'text-yellow-600 font-bold';
                                    } else {
                                        $status = 'Saadaval';
                                        $status_class = 'text-green-600 font-bold';
                                    }
                                } else {
                                    $status = 'Laost otsas';
                                    $status_class = 'text-red-600 font-bold';
                                }
                                ?>
                                <span class="<?php echo $status_class; ?>"><?php echo $status; ?></span>
                                
                                <?php 
                                // Add smart quantity info if available
                                if ($product->managing_stock() && $product->is_in_stock()) {
                                    $stock_quantity = $product->get_stock_quantity();
                                    if ($stock_quantity !== null && $stock_quantity > 0) {
                                        // Smart quantity display: show "5+ tk" if > 5, else show real number
                                        $display_quantity = $stock_quantity > 5 ? '5+' : $stock_quantity;
                                        echo ' <span class="text-gray-500">|</span> <span class="text-gray-600 font-semibold">' . esc_html($display_quantity) . 'tk laos</span>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        
                        <!-- Add to Cart Form -->
                        <?php if ($product->is_purchasable() && $product->is_in_stock()) : ?>
                        <form class="cart space-y-3" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
                            
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

                            <!-- Separator Line -->
                            <div class="border-t border-gray-200 pt-0"></div>

                            <!-- Quantity + Buttons Row (Design System Showcase Match) -->
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                <!-- Quantity Selector -->
                                <div class="flex items-center space-x-3">
                                    <label class="text-sm font-semibold text-gray-700">Kogus:</label>
                                    <div class="flex items-center border border-gray-300 rounded-lg">
                                        <button type="button" class="px-2 py-2 text-gray-600 hover:text-gray-800 cursor-pointer quantity-minus">−</button>
                                        <input type="number" 
                                               name="quantity" 
                                               value="<?php echo esc_attr(isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : 1); ?>" 
                                               min="1" 
                                               max="<?php echo esc_attr(0 < $product->get_max_purchase_quantity() ? $product->get_max_purchase_quantity() : ''); ?>"
                                               class="w-12 py-2 text-center border-0 focus:ring-0 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                                        <button type="button" class="px-2 py-2 text-gray-600 hover:text-gray-800 cursor-pointer quantity-plus">+</button>
                                    </div>
                                </div>
                                <!-- Action Buttons -->
                                <div class="flex gap-3 flex-1">
                                    <!-- Add to Cart Button (Showcase Design) -->
                                    <button type="submit" 
                                            name="add-to-cart" 
                                            value="<?php echo esc_attr($product->get_id()); ?>" 
                                            class="flex-1 inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-md shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        Lisa korvi
                                    </button>

                                    <!-- Buy Now Button (Showcase Design) -->
                                    <button type="button" 
                                            onclick="buyNow(this)"
                                            class="flex-1 inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-white bg-gradient-to-r from-green-600 to-emerald-600 rounded-md shadow-sm hover:from-green-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200">
                                        Osta kohe
                                        <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?php else : ?>
                            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                                <p class="text-red-600 font-semibold">Toode pole hetkel saadaval</p>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Product Meta Information (Showcase Design) -->
                        <div class="border-t border-gray-200 pt-4">
                            <?php 
                            // Gather meta information using project-specific approach
                            $brand_terms = get_the_terms($product->get_id(), 'product_brand');
                            $product_categories = get_the_terms($product->get_id(), 'product_cat');
                            $sku = $product->get_sku();
                            $ean = get_post_meta($product->get_id(), '_global_unique_id', true);
                            
                            $meta_items = [];
                            
                            // Collect available meta items (Showcase Logic)
                            if (!empty($brand_terms) && !is_wp_error($brand_terms)) {
                                $brand_names = wp_list_pluck($brand_terms, 'name');
                                $first_brand = $brand_terms[0];
                                $brand_link = get_term_link($first_brand, 'product_brand');
                                
                                $meta_items[] = [
                                    'label' => 'Bränd',
                                    'value' => implode(', ', $brand_names),
                                    'link' => !is_wp_error($brand_link) ? $brand_link : '',
                                    'clickable' => !is_wp_error($brand_link)
                                ];
                            }
                            
                            if (!empty($product_categories) && !is_wp_error($product_categories)) {
                                $category_names = array_map(function($category) {
                                    return $category->name;
                                }, array_slice($product_categories, 0, 3)); // Limit to first 3
                                $first_category = $product_categories[0];
                                $category_link = get_term_link($first_category, 'product_cat');
                                
                                $meta_items[] = [
                                    'label' => 'Kategooriad',
                                    'value' => implode(', ', $category_names),
                                    'link' => !is_wp_error($category_link) ? $category_link : '',
                                    'clickable' => !is_wp_error($category_link)
                                ];
                            }
                            
                            if (!empty($sku)) {
                                $meta_items[] = [
                                    'label' => 'Tootekood',
                                    'value' => $sku,
                                    'clickable' => false
                                ];
                            }
                            
                            if (!empty($ean)) {
                                $meta_items[] = [
                                    'label' => 'EAN',
                                    'value' => $ean,
                                    'clickable' => false
                                ];
                            }
                            
                            // Render meta items if any exist
                            if (!empty($meta_items)) :
                            ?>
                                <div class="flex items-center">
                                    <?php 
                                    // Render meta items with conditional dividers (Showcase Pattern)
                                    foreach ($meta_items as $index => $item) {
                                        echo '<div class="rounded-lg p-1 min-w-20">';
                                        echo '    <div class="text-2xs text-gray-400 uppercase tracking-wide leading-tight">' . esc_html($item['label']) . '</div>';
                                        
                                        // Render value as link if clickable
                                        if (!empty($item['clickable']) && $item['clickable']) {
                                            echo '    <div class="text-xs font-medium"><a href="' . esc_url($item['link']) . '" class="text-gray-900 hover:text-blue-600">' . esc_html($item['value']) . '</a></div>';
                                        } else {
                                            echo '    <div class="text-xs font-medium text-gray-900">' . esc_html($item['value']) . '</div>';
                                        }
                                        
                                        echo '</div>';
                                        
                                        // Add divider if not the last item (Smart Divider Logic)
                                        if ($index < count($meta_items) - 1) {
                                            echo '<div class="h-8 w-px bg-gray-200 mx-2"></div>';
                                        }
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div> <!-- Close meta info section -->
                    </div>
                </div>
            </div>

            <?php 
            // Related Products Block - Only show if kokkusobivad SKUs exist
            $kokkusobivad_skus = get_post_meta(get_the_ID(), '_blankpage_kokkusobivad_sku', true);
            
            if (!empty($kokkusobivad_skus)) :
                // Clean and split SKUs
                $skus_array = array_filter(array_map('trim', explode(',', $kokkusobivad_skus)));
                
                if (!empty($skus_array)) :
                    // Fetch related products by SKU
                    $related_products = array();
                    foreach ($skus_array as $sku) {
                        $product_id = wc_get_product_id_by_sku($sku);
                        if ($product_id && $product_id != get_the_ID()) {
                            $product = wc_get_product($product_id);
                            if ($product && $product->is_visible()) {
                                $related_products[] = $product;
                            }
                        }
                    }
                    
                    if (!empty($related_products)) :
            ?>
            
            <!-- Kokkusobivad tooted Section -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-400 mb-6 px-4">Kokkusobivad tooted</h3>
                
                <!-- Horizontal Scroll Container -->
                <div class="relative" x-data="{ leftOpacity: 0, rightOpacity: 0, fadeDistance: 50 }">
                    
                    <div 
                        class="flex gap-4 overflow-x-auto pb-4 px-4 scroll-smooth" 
                        id="horizontal-scroll-container"
                        x-ref="relatedContainer"
                        @scroll="
                            const el = $refs.relatedContainer;
                            const fade = fadeDistance;
                            
                            // Calculate left and right gradient opacities
                            leftOpacity = Math.min(el.scrollLeft / fade, 1);
                            const scrollRight = el.scrollLeft + el.clientWidth;
                            const distanceFromRight = el.scrollWidth - scrollRight;
                            rightOpacity = el.scrollWidth > el.clientWidth ? Math.min(distanceFromRight / fade, 1) : 0;
                        "
                        x-init="
                            $nextTick(() => {
                                const el = $refs.relatedContainer;
                                // Initialize right gradient if content overflows
                                leftOpacity = 0;
                                rightOpacity = el.scrollWidth > el.clientWidth ? 1 : 0;
                            });
                        ">
                        
                        <?php foreach ($related_products as $related_product) : 
                            $product_id = $related_product->get_id();
                            $product_name = $related_product->get_name();
                            $product_url = get_permalink($product_id);
                            $product_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'woocommerce_thumbnail');
                            $product_image_url = $product_image ? $product_image[0] : wc_placeholder_img_src();
                            $product_price = $related_product->get_price_html();
                            $product_rating = $related_product->get_average_rating();
                            $product_review_count = $related_product->get_review_count();
                            $is_on_sale = $related_product->is_on_sale();
                            $is_new = (strtotime($related_product->get_date_created()) > strtotime('-30 days'));
                        ?>
                        
                        <!-- Related Product -->
                        <div class="flex-shrink-0 w-[75%] sm:w-[480px] lg:w-[40%]">
                            <div class="group bg-white rounded-lg border border-gray-100 shadow-sm overflow-hidden transition-all duration-300 flex flex-row h-full hover:shadow-lg hover:-translate-y-0.5">
                                <div class="relative w-32 lg:w-48 flex-shrink-0 overflow-hidden">
                                    <a href="<?php echo esc_url($product_url); ?>" class="block w-full h-full no-underline">
                                        <img src="<?php echo esc_url($product_image_url); ?>" alt="<?php echo esc_attr($product_name); ?>" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" />
                                    </a>
                                    <?php if ($is_new) : ?>
                                    <span class="absolute top-2 left-2 z-10 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gradient-to-r from-green-500 to-green-600 text-white">
                                        Uus
                                    </span>
                                    <?php elseif ($is_on_sale) : ?>
                                    <span class="absolute top-2 left-2 z-10 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gradient-to-r from-red-500 to-red-600 text-white">
                                        Soodustus
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <!-- Product Info - Always visible -->
                                <div class="flex p-3 lg:p-4 flex-col flex-1 justify-between">
                                    <div>
                                        <h4 class="text-xs lg:text-base font-semibold text-gray-900 mb-2 lg:mb-3 leading-tight line-clamp-2">
                                            <a href="<?php echo esc_url($product_url); ?>" class="text-gray-900 no-underline transition-colors duration-150 hover:text-brand-600"><?php echo esc_html($product_name); ?></a>
                                        </h4>
                                        <div class="flex items-center justify-between mb-2 lg:mb-4 gap-2">
                                            <div class="flex items-center gap-1 lg:gap-2 text-sm lg:text-lg font-bold">
                                                <?php echo $product_price; ?>
                                            </div>
                                            <?php if ($product_rating > 0) : ?>
                                            <div class="flex items-center gap-1">
                                                <div class="text-yellow-400 text-sm">
                                                    <?php 
                                                    $stars = '';
                                                    $full_stars = floor($product_rating);
                                                    $half_star = ($product_rating - $full_stars) >= 0.5;
                                                    
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        if ($i <= $full_stars) {
                                                            $stars .= '★';
                                                        } elseif ($i == $full_stars + 1 && $half_star) {
                                                            $stars .= '☆';
                                                        } else {
                                                            $stars .= '☆';
                                                        }
                                                    }
                                                    echo '<span>' . $stars . '</span>';
                                                    ?>
                                                </div>
                                                <span class="text-xs text-gray-500">(<?php echo $product_review_count; ?>)</span>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center gap-0 border-t border-gray-200 pt-1 transition-colors duration-150 relative">
                                        <?php if ($related_product->is_purchasable() && $related_product->is_in_stock()) : ?>
                                        <a href="<?php echo esc_url('?add-to-cart=' . $product_id); ?>" class="flex-1 flex flex-row items-center justify-center gap-1 lg:gap-2 p-1 lg:p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-xs font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Lisa ostukorvi">
                                            <svg class="w-4 h-4 lg:w-6 lg:h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                            </svg>
                                            <span class="action-text hidden lg:inline">Lisa korvi</span>
                                        </a>
                                        <?php else : ?>
                                        <span class="flex-1 flex flex-row items-center justify-center gap-1 lg:gap-2 p-1 lg:p-2 text-gray-400 text-xs font-medium uppercase">
                                            <span class="action-text hidden lg:inline">Pole saadaval</span>
                                        </span>
                                        <?php endif; ?>
                                        <div class="w-px h-6 lg:h-8 bg-gray-300 mx-1 flex-shrink-0 transition-colors duration-150 hover:bg-brand-400"></div>
                                        <a href="<?php echo esc_url($product_url); ?>" class="flex-1 flex flex-row items-center justify-center gap-1 lg:gap-2 p-1 lg:p-2 bg-transparent border-none text-gray-600 no-underline cursor-pointer text-xs font-medium uppercase transition-colors duration-150 hover:text-brand-600" title="Vaata toodet">
                                            <span class="action-text hidden lg:inline">Vaata</span>
                                            <svg class="w-4 h-4 lg:w-6 lg:h-6 stroke-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php endforeach; ?>
                        
                    </div>
                    
                    <!-- Left Gradient Overlay -->
                    <div 
                        x-show="leftOpacity > 0" 
                        :style="{ opacity: leftOpacity }"
                        x-transition:enter="transition-opacity duration-250 ease-out" 
                        x-transition:leave="transition-opacity duration-250 ease-in"
                        class="absolute top-0 bottom-4 left-0 w-8 bg-gradient-to-r from-gray-50 via-gray-50/70 to-transparent pointer-events-none z-10"
                    ></div>
                    
                    <!-- Right Gradient Overlay -->
                    <div 
                        x-show="rightOpacity > 0" 
                        :style="{ opacity: rightOpacity }"
                        x-transition:enter="transition-opacity duration-250 ease-out" 
                        x-transition:leave="transition-opacity duration-250 ease-in"
                        class="absolute top-0 bottom-4 right-0 w-8 bg-gradient-to-l from-gray-50 via-gray-50/70 to-transparent pointer-events-none z-10"
                    ></div>
                    
                    <script>
                    // Horizontal scroll with mouse wheel for related products
                    document.addEventListener('DOMContentLoaded', function() {
                        const scrollContainer = document.getElementById('horizontal-scroll-container');
                        if (scrollContainer) {
                            scrollContainer.addEventListener('wheel', function(e) {
                                if (e.deltaY !== 0) {
                                    e.preventDefault();
                                    const scrollAmount = e.deltaY * 1.2;
                                    scrollContainer.scrollBy({
                                        left: scrollAmount,
                                        behavior: 'smooth'
                                    });
                                }
                            });
                        }
                    });
                    </script>
                </div>
            </div>
            
            <?php 
                    endif; // End if related products found
                endif; // End if skus_array not empty
            endif; // End if variatsiooni_skus not empty
            ?>

            <div x-data="{ openAccordion: null }">
                <!-- Single Container: Description + Accordion -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-8">
                    <!-- Product Description -->
                    <div class="p-6 border-b border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Toote kirjeldus</h4>
                        <div class="prose max-w-none">
                            <?php 
                            // Get product description
                            $product_description = get_the_content();
                            if (!empty($product_description)) :
                                echo apply_filters('the_content', $product_description);
                            else :
                                echo '<p class="text-gray-500 italic">Toote kirjeldus pole saadaval.</p>';
                            endif;
                            ?>
                        </div>
                    </div>
                            
                            <!-- Accordion -->
                            <!-- Lisainfo Accordion Item -->
                            <div class="border-b border-gray-200 last:border-b-0">
                                <button 
                                    @click="openAccordion = openAccordion === 'additional' ? null : 'additional'"
                                    class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-200"
                                >
                                    <span class="font-medium text-gray-900">Lisainfo</span>
                                    <svg 
                                        :class="openAccordion === 'additional' ? 'rotate-180' : ''"
                                        class="w-5 h-5 text-gray-500 transition-transform duration-200"
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke-width="1.5" 
                                        stroke="currentColor"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                                <div 
                                    x-show="openAccordion === 'additional'" 
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-96"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 max-h-96"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="px-6 pb-4 overflow-hidden"
                                >
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <?php
                                        // Get product attributes and meta data
                                        global $product;
                                        $attributes = $product->get_attributes();
                                        $product_id = $product->get_id();
                                        
                                        // Collect all product info
                                        $product_info = [];
                                        
                                        // Add product attributes
                                        if (!empty($attributes)) {
                                            foreach ($attributes as $attribute) {
                                                if ($attribute->get_visible()) {
                                                    $name = wc_attribute_label($attribute->get_name());
                                                    $values = array();
                                                    if ($attribute->is_taxonomy()) {
                                                        $attribute_taxonomy = $attribute->get_taxonomy_object();
                                                        $attribute_values = wc_get_product_terms($product_id, $attribute->get_name(), array('fields' => 'names'));
                                                        foreach ($attribute_values as $attribute_value) {
                                                            $values[] = esc_html($attribute_value);
                                                        }
                                                    } else {
                                                        $values = $attribute->get_options();
                                                        foreach ($values as &$value) {
                                                            $value = make_clickable(esc_html($value));
                                                        }
                                                    }
                                                    $product_info[$name] = implode(', ', $values);
                                                }
                                            }
                                        }
                                        
                                        // Add standard product data
                                        if ($product->has_weight()) {
                                            $product_info['Kaal'] = wc_format_weight($product->get_weight());
                                        }
                                        if ($product->has_dimensions()) {
                                            $product_info['Mõõdud'] = wc_format_dimensions($product->get_dimensions(false));
                                        }
                                        
                                        // Add SKU if available
                                        if ($product->get_sku()) {
                                            $product_info['SKU'] = $product->get_sku();
                                        }
                                        
                                        // Add custom meta fields
                                        $custom_fields = [
                                            '_blankpage_ean' => 'EAN',
                                            '_blankpage_brand' => 'Bränd',
                                            '_blankpage_material' => 'Materjal',
                                            '_blankpage_color' => 'Värv',
                                            '_blankpage_origin' => 'Päritolumaa',
                                            '_blankpage_warranty' => 'Garantii',
                                            '_blankpage_care' => 'Hooldus'
                                        ];
                                        
                                        foreach ($custom_fields as $meta_key => $label) {
                                            $meta_value = get_post_meta($product_id, $meta_key, true);
                                            if (!empty($meta_value)) {
                                                $product_info[$label] = esc_html($meta_value);
                                            }
                                        }
                                        
                                        if (!empty($product_info)) :
                                            // Split into two columns
                                            $info_items = array_chunk($product_info, ceil(count($product_info) / 2), true);
                                        ?>
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <?php foreach ($info_items as $column_items) : ?>
                                            <div class="space-y-3">
                                                <?php foreach ($column_items as $label => $value) : ?>
                                                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                                    <span class="font-medium text-gray-700"><?php echo esc_html($label); ?>:</span>
                                                    <span class="text-gray-600"><?php echo wp_kses_post($value); ?></span>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php else : ?>
                                        <p class="text-gray-500 italic">Lisainfo pole saadaval.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            

                            
                            <!-- Tarneinfo Accordion Item -->
                            <div class="border-b border-gray-200 last:border-b-0">
                                <button 
                                    @click="openAccordion = openAccordion === 'shipping' ? null : 'shipping'"
                                    class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-200"
                                >
                                    <span class="font-medium text-gray-900">Tarneinfo</span>
                                    <svg 
                                        :class="openAccordion === 'shipping' ? 'rotate-180' : ''"
                                        class="w-5 h-5 text-gray-500 transition-transform duration-200"
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke-width="1.5" 
                                        stroke="currentColor"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                                <div 
                                    x-show="openAccordion === 'shipping'" 
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-96"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 max-h-96"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="px-6 pb-4 overflow-hidden"
                                >
                                    <div class="grid md:grid-cols-2 gap-8">
                                        <div>
                                            <h5 class="font-semibold text-gray-900 mb-3">📦 Tarneviisid</h5>
                                            <div class="space-y-3">
                                                <?php
                                                // Get shipping methods for current product
                                                $shipping_zones = WC_Shipping_Zones::get_zones();
                                                $shipping_methods_found = false;
                                                
                                                foreach ($shipping_zones as $zone) {
                                                    $zone_obj = new WC_Shipping_Zone($zone['zone_id']);
                                                    $shipping_methods = $zone_obj->get_shipping_methods(true);
                                                    
                                                    foreach ($shipping_methods as $method) {
                                                        if ($method->enabled === 'yes') {
                                                            $shipping_methods_found = true;
                                                            $cost = $method->get_option('cost', '');
                                                            $free_shipping_min = $method->get_option('min_amount', '');
                                                            
                                                            // Determine background color based on cost
                                                            $bg_class = 'bg-gray-50';
                                                            $text_class = 'text-gray-900';
                                                            if ($cost == '0' || empty($cost)) {
                                                                $bg_class = 'bg-green-50';
                                                                $text_class = 'text-green-600';
                                                            }
                                                            
                                                            echo '<div class="flex justify-between items-center p-3 ' . $bg_class . ' rounded-md">';
                                                            echo '<span class="text-gray-700">' . esc_html($method->get_title()) . '</span>';
                                                            
                                                            if (!empty($free_shipping_min) && $cost == '0') {
                                                                echo '<span class="font-medium ' . $text_class . '">Tasuta (üle ' . wc_price($free_shipping_min) . ')</span>';
                                                            } elseif (!empty($cost) && $cost !== '0') {
                                                                echo '<span class="font-medium ' . $text_class . '">' . wc_price($cost) . '</span>';
                                                            } else {
                                                                echo '<span class="font-medium ' . $text_class . '">Tasuta</span>';
                                                            }
                                                            echo '</div>';
                                                        }
                                                    }
                                                }
                                                
                                                if (!$shipping_methods_found) {
                                                    echo '<div class="flex justify-between items-center p-3 bg-gray-50 rounded-md">';
                                                    echo '<span class="text-gray-700">Tarne</span>';
                                                    echo '<span class="font-medium text-gray-900">Hinnakirja järgi</span>';
                                                    echo '</div>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="font-semibold text-gray-900 mb-3">🔄 Tagastamine</h5>
                                            <div class="space-y-2 text-gray-700">
                                                <?php
                                                // Get return policy from options or use defaults
                                                $return_policy = get_option('blankpage_return_policy', '');
                                                if (!empty($return_policy)) {
                                                    echo wpautop(esc_html($return_policy));
                                                } else {
                                                    // Default return policy
                                                    echo '<p>• 14-päevane tagastusõigus</p>';
                                                    echo '<p>• Toode peab olema kasutamata</p>';
                                                    echo '<p>• Originaalpakend vajalik</p>';
                                                    echo '<p>• Tagastuskulud ostja kanda</p>';
                                                    echo '<p>• Raha tagasi 3-5 tööpäeva jooksul</p>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Separate Reviews Block -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6" x-data="{ 
                            showReviewModal: false,
                            leftOpacity: 0,
                            rightOpacity: 0,
                            fadeDistance: 80
                        }">
                            <div class="flex items-center justify-between mb-6">
                                <?php
                                global $product;
                                $review_count = $product->get_review_count();
                                ?>
                                <h4 class="text-lg font-semibold text-gray-900">Klientide arvustused (<?php echo $review_count; ?>)</h4>
                                <button 
                                    @click="showReviewModal = true"
                                    class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200"
                                >
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Lisa arvustus
                                </button>
                            </div>
                            
                            <!-- Horizontal Reviews Cards with Overflow Scroll and Progressive Gradients -->
                            <div class="relative -mx-2">
                                <div 
                                    class="flex gap-6 overflow-x-auto pb-4 px-2"
                                    x-ref="reviewsContainer"
                                    @wheel="
                                        const el = $refs.reviewsContainer;
                                        $event.preventDefault();
                                        // Smooth horizontal scroll with mouse wheel
                                        const scrollAmount = $event.deltaY * 1.2;
                                        el.scrollBy({
                                            left: scrollAmount,
                                            behavior: 'smooth'
                                        });
                                    "
                                    @scroll="
                                        const el = $refs.reviewsContainer;
                                        const fade = fadeDistance;
                                        
                                        // Calculate left and right gradient opacities
                                        leftOpacity = Math.min(el.scrollLeft / fade, 1);
                                        const scrollRight = el.scrollLeft + el.clientWidth;
                                        const distanceFromRight = el.scrollWidth - scrollRight;
                                        rightOpacity = el.scrollWidth > el.clientWidth ? Math.min(distanceFromRight / fade, 1) : 0;
                                    "
                                    x-init="
                                        $nextTick(() => {
                                            const el = $refs.reviewsContainer;
                                            // Initialize right gradient if content overflows
                                            leftOpacity = 0;
                                            rightOpacity = el.scrollWidth > el.clientWidth ? 1 : 0;
                                        });
                                    "
                                >
                                <?php
                                // Get WooCommerce reviews for this product
                                $comments = get_comments(array(
                                    'post_id' => $product->get_id(),
                                    'status' => 'approve',
                                    'type' => 'review',
                                    'number' => 10, // Limit to 10 reviews
                                    'orderby' => 'comment_date',
                                    'order' => 'DESC'
                                ));
                                
                                $gradient_colors = [
                                    'from-blue-500 to-purple-500',
                                    'from-green-500 to-emerald-500', 
                                    'from-pink-500 to-rose-500',
                                    'from-indigo-500 to-blue-500',
                                    'from-orange-500 to-red-500',
                                    'from-purple-500 to-pink-500',
                                    'from-teal-500 to-cyan-500',
                                    'from-red-500 to-orange-500',
                                    'from-yellow-500 to-orange-500',
                                    'from-emerald-500 to-teal-500'
                                ];
                                
                                if (!empty($comments)) :
                                    foreach ($comments as $index => $comment) :
                                        $rating = get_comment_meta($comment->comment_ID, 'rating', true);
                                        $author_name = $comment->comment_author;
                                        $comment_date = mysql2date('j. F Y', $comment->comment_date);
                                        $comment_content = $comment->comment_content;
                                        
                                        // Generate initials
                                        $name_parts = explode(' ', $author_name);
                                        $initials = '';
                                        foreach ($name_parts as $part) {
                                            if (!empty($part)) {
                                                $initials .= strtoupper(substr($part, 0, 1));
                                                if (strlen($initials) >= 2) break;
                                            }
                                        }
                                        if (strlen($initials) < 2 && strlen($author_name) > 0) {
                                            $initials = strtoupper(substr($author_name, 0, 2));
                                        }
                                        
                                        // Get gradient color for this review
                                        $gradient = $gradient_colors[$index % count($gradient_colors)];
                                        
                                        // Generate stars
                                        $stars = '';
                                        for ($i = 1; $i <= 5; $i++) {
                                            $stars .= ($i <= $rating) ? '★' : '☆';
                                        }
                                ?>
                                <!-- Review Card -->
                                <div class="bg-gray-50 rounded-lg p-6 w-[60%] md:w-[40%] flex-shrink-0 border border-gray-200">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-12 h-12 bg-gradient-to-r <?php echo $gradient; ?> rounded-full flex items-center justify-center text-white font-semibold">
                                            <?php echo esc_html($initials); ?>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900"><?php echo esc_html($author_name); ?></div>
                                            <div class="flex items-center gap-2">
                                                <div class="flex text-yellow-400">
                                                    <span><?php echo $stars; ?></span>
                                                </div>
                                                <span class="text-sm text-gray-500"><?php echo esc_html($comment_date); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-gray-700 leading-relaxed">"<?php echo esc_html($comment_content); ?>"</p>
                                </div>
                                <?php 
                                    endforeach;
                                else :
                                ?>
                                <!-- No Reviews Message -->
                                <div class="bg-gray-50 rounded-lg p-6 w-full text-center border border-gray-200">
                                    <p class="text-gray-500 italic">Selle toote kohta pole veel ühtegi arvustust.</p>
                                    <p class="text-sm text-gray-400 mt-2">Ole esimene, kes jagab oma kogemust!</p>
                                </div>
                                <?php endif; ?>
                                </div>
                                
                                <!-- Left Gradient Overlay -->
                                <div 
                                    x-show="leftOpacity > 0" 
                                    :style="{ opacity: leftOpacity }"
                                    x-transition:enter="transition-opacity duration-250 ease-out" 
                                    x-transition:leave="transition-opacity duration-250 ease-in"
                                    class="absolute top-0 bottom-4 left-0 w-8 bg-gradient-to-r from-white via-white/70 to-transparent pointer-events-none z-10"
                                ></div>
                                
                                <!-- Right Gradient Overlay -->
                                <div 
                                    x-show="rightOpacity > 0" 
                                    :style="{ opacity: rightOpacity }"
                                    x-transition:enter="transition-opacity duration-250 ease-out" 
                                    x-transition:leave="transition-opacity duration-250 ease-in"
                                    class="absolute top-0 bottom-4 right-0 w-8 bg-gradient-to-l from-white via-white/70 to-transparent pointer-events-none z-10"
                                ></div>
                            </div>
                            
                            <!-- Scroll Indicator -->
                            <div class="flex justify-center mt-4">
                                <div class="text-sm text-gray-500 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l3-3m0 0l3 3m-3-3v12" transform="rotate(90)"></path>
                                    </svg>
                                    Keri horisontaalselt, et näha kõiki arvustusi
                                </div>
                            </div>
                            
                            <!-- Review Modal -->
                            <div 
                                x-show="showReviewModal"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="fixed inset-0 z-50 overflow-y-auto"
                                @click.away="showReviewModal = false"
                                style="display: none;"
                            >
                                <!-- Modal Background -->
                                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                    <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
                                    
                                    <!-- Modal Content -->
                                    <div 
                                        x-show="showReviewModal"
                                        x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="transition ease-in duration-200"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="inline-block w-full max-w-lg p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl"
                                    >
                                        <!-- Modal Header -->
                                        <div class="flex items-center justify-between mb-6">
                                            <h3 class="text-lg font-semibold text-gray-900">Lisa oma arvustus</h3>
                                            <button 
                                                @click="showReviewModal = false"
                                                class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors duration-200"
                                            >
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        
                                        <!-- Modal Form -->
                                        <form @submit.prevent="console.log('Review submitted')" class="space-y-6">
                                            <!-- Name Field -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Nimi</label>
                                                <input 
                                                    type="text" 
                                                    placeholder="Sinu nimi"
                                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                                    required
                                                >
                                            </div>
                                            
                                            <!-- Rating Field -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Hinnang</label>
                                                <div class="flex items-center gap-2" x-data="{ rating: 5 }">
                                                    <template x-for="star in 5">
                                                        <button 
                                                            type="button"
                                                            @click="rating = star"
                                                            :class="star <= rating ? 'text-yellow-400' : 'text-gray-300'"
                                                            class="text-2xl hover:text-yellow-400 transition-colors duration-200"
                                                        >
                                                            ★
                                                        </button>
                                                    </template>
                                                    <span class="ml-2 text-sm text-gray-600" x-text="rating + '/5 tähte'"></span>
                                                </div>
                                            </div>
                                            
                                            <!-- Review Text -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Arvustus</label>
                                                <textarea 
                                                    rows="4"
                                                    placeholder="Kirjuta oma arvustus siia..."
                                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 resize-none"
                                                    required
                                                ></textarea>
                                            </div>
                                            
                                            <!-- Modal Actions -->
                                            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200">
                                                <button 
                                                    type="button"
                                                    @click="showReviewModal = false"
                                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200"
                                                >
                                                    Tühista
                                                </button>
                                                <button 
                                                    type="submit"
                                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200"
                                                >
                                                    Lisa arvustus
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            <div class="container mx-auto px-4 max-w-7xl">
                <?php woocommerce_output_related_products(); ?>
            </div>

        <?php endwhile; ?>

    </div>

    <?php do_action('woocommerce_after_main_content'); ?>
</div>

<style>
/* WordPress 6.6.0 underline bug fix */
:root :where(a:where(:not(.wp-element-button))) {
    text-decoration: none;
}

/* Remove white background from WooCommerce related products */
.related.products {
    background: none !important;
}

.related.products .products {
    background: none !important;
}

.single-product .related.products {
    background: transparent !important;
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
