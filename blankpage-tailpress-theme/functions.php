<?php

if (is_file(__DIR__.'/vendor/autoload_packages.php')) {
    require_once __DIR__.'/vendor/autoload_packages.php';
}

/**
 * Load WooCommerce support after plugins are loaded
 * This ensures WooCommerce is fully initialized before we register theme support
 */
function blankpage_woocommerce_setup() {
    if (class_exists('WooCommerce')) {
        // Clear WordPress theme support cache
        wp_cache_delete('theme_support_woocommerce', 'theme_support');
        
        // CRITICAL: WooCommerce gallery support - enables PhotoSwipe, FlexSlider, and zoom
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        
        // Disable WooCommerce blocks for cart and checkout
        add_filter('woocommerce_blocks_enable_cart', '__return_false');
        add_filter('woocommerce_blocks_enable_checkout', '__return_false');
    } else {
    }
}
add_action('plugins_loaded', 'blankpage_woocommerce_setup');

/**
 * Estonian translations for WooCommerce
 */
function blankpage_woocommerce_translations() {
    // Translation for sorting dropdown options (these work)
    add_filter('gettext', function($translated, $untranslated, $domain) {
        if (!is_admin() && 'woocommerce' === $domain) {
            switch ($untranslated) {
                case 'Default sorting':
                    $translated = 'Vaikimisi järjestus';
                    break;
                case 'Sort by popularity':
                    $translated = 'Järjesta populaarsuse alusel';
                    break;
                case 'Sort by average rating':
                    $translated = 'Järjesta keskmise hinnangu järgi';
                    break;
                case 'Sort by latest':
                    $translated = 'Järjesta uudsuse alusel';
                    break;
                case 'Sort by price: low to high':
                    $translated = 'Järjesta hinna alusel: odavamast kallimani';
                    break;
                case 'Sort by price: high to low':
                    $translated = 'Järjesta hinna alusel: kallimast odavamani';
                    break;
            }
        }
        return $translated;
    }, 999, 3);
}
add_action('plugins_loaded', 'blankpage_woocommerce_translations', 1);

/**
 * Force WooCommerce to use our custom templates
 */
function blankpage_woocommerce_locate_template($template, $template_name, $template_path) {
    global $woocommerce;
    
    $_template = $template;
    
    if (!$template_path) $template_path = $woocommerce->template_url;
    
    $plugin_path = untrailingslashit(plugin_dir_path(__FILE__)) . '/woocommerce/';
    
    // Look within passed path within the theme - this is priority
    $template = locate_template(
        array(
            $template_path . $template_name,
            $template_name
        )
    );
    
    if (!$template && file_exists($plugin_path . $template_name))
        $template = $plugin_path . $template_name;
    
    if (!$template)
        $template = $_template;
    
    return $template;
}
add_filter('woocommerce_locate_template', 'blankpage_woocommerce_locate_template', 10, 3);

/**
 * Override WooCommerce template loading completely
 */
function blankpage_woocommerce_template_loader($template) {
    if (is_shop() || is_product_category() || is_product_tag()) {
        $template = get_template_directory() . '/woocommerce/archive-product.php';
        if (file_exists($template)) {
            return $template;
        }
    }
    
    // Handle single product pages
    if (is_product()) {
        $template = get_template_directory() . '/woocommerce/single-product.php';
        if (file_exists($template)) {
            return $template;
        }
    }
    
    return $template;
}
add_filter('template_include', 'blankpage_woocommerce_template_loader', 99);

/**
 * Override WooCommerce product loop image size
 * Use 'medium' or 'large' instead of tiny 'woocommerce_thumbnail'
 */
function blankpage_override_product_image_size() {
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
    add_action('woocommerce_before_shop_loop_item_title', 'blankpage_custom_product_thumbnail', 10);
}
add_action('init', 'blankpage_override_product_image_size');

function blankpage_custom_product_thumbnail() {
    global $product;
    
    if (!$product || !has_post_thumbnail($product->get_id())) {
        echo '<div class="aspect-square bg-gray-200 flex items-center justify-center">';
        echo '<span class="text-gray-400">Pilt puudub</span>';
        echo '</div>';
        return;
    }
    
    // Use 'woocommerce_single' for better quality (600x600px)
    echo get_the_post_thumbnail(
        $product->get_id(), 
        'woocommerce_single',
        array(
            'class' => 'w-full h-full object-cover object-center',
            'alt' => get_the_title($product->get_id())
        )
    );
}

/**
 * Theme setup
 */
function tailpress(): TailPress\Framework\Theme
{
    return TailPress\Framework\Theme::instance()
        ->assets(fn($manager) => $manager
            ->withCompiler(new TailPress\Framework\Assets\ViteCompiler, fn($compiler) => $compiler
                ->registerAsset('resources/css/app.css')
                ->registerAsset('resources/js/app.js')
                ->editorStyleFile('resources/css/editor-style.css')
            )
            ->enqueueAssets()
        )
        ->features(fn($manager) => $manager->add(TailPress\Framework\Features\MenuOptions::class))
        ->menus(fn($manager) => $manager->add('primary', __( 'Primary Menu', 'tailpress')))
        ->themeSupport(fn($manager) => $manager->add([
            'title-tag',
            'custom-logo',
            'post-thumbnails',
            'align-wide',
            'wp-block-styles',
            'responsive-embeds',
            'woocommerce',
            'wc-product-gallery-zoom',
            'wc-product-gallery-lightbox',
            'wc-product-gallery-slider',
            'html5' => [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ]
        ]));
}

tailpress();

// Better debug timing - check at wp_loaded instead of wp_head
function blankpage_debug_woocommerce_support() {
    if (isset($_GET['debug_templates'])) {
        $support_check = current_theme_supports('woocommerce') ? 'YES' : 'NO';
    }
}
add_action('wp_loaded', 'blankpage_debug_woocommerce_support');

// Include WooCommerce template debug
include_once get_template_directory() . '/debug-templates.php';

/**
 * Remove all WooCommerce default CSS files
 * Since we're designing everything custom with Tailwind, we don't need WC styles
 */
function blankpage_remove_woocommerce_styles() {
    // Remove WooCommerce default stylesheets
    wp_dequeue_style('woocommerce-layout');
    wp_dequeue_style('woocommerce-smallscreen');
    wp_dequeue_style('woocommerce-general');
    wp_dequeue_style('wc-blocks-style');
    wp_dequeue_style('brands-styles');
    
    // Remove WooCommerce inline styles
    wp_dequeue_style('woocommerce-inline');
    
    // Remove any block-related styles if present
    wp_dequeue_style('wc-blocks-vendors-style');
    wp_dequeue_style('wc-blocks-style');
    
    // Remove WooCommerce cart fragments styles
    wp_dequeue_style('wc-cart-fragments');
}

// Hook to remove styles after WooCommerce loads them
add_action('wp_enqueue_scripts', 'blankpage_remove_woocommerce_styles', 100);

// Also remove on WooCommerce-specific hooks
add_action('woocommerce_enqueue_styles', 'blankpage_remove_woocommerce_styles', 99);

/**
 * Disable WooCommerce default stylesheet enqueuing entirely
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Remove WooCommerce generator tag and version info
 */
remove_action('wp_head', 'wc_generator_tag');

/**
 * GUARANTEED FIX: Remove WooCommerce default sale badge completely
 */
function blankpage_remove_sale_badge() {
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
    remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
}
add_action('init', 'blankpage_remove_sale_badge');

/**
 * FORCE: Hide sale badge with CSS as backup
 */
function blankpage_force_hide_sale_badge() {
    echo '<style>
    .woocommerce span.onsale, 
    .woocommerce .onsale,
    span.onsale,
    .onsale {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
    }
    
    .woocommerce ul.products li.product .button,
    .woocommerce .button {
        width: 100% !important;
        display: block !important;
        box-sizing: border-box !important;
    }
    </style>';
}
add_action('wp_head', 'blankpage_force_hide_sale_badge');

/**
 * IMAGE SIZE OPTIMIZATION - DYNAMIC
 * Read admin tool settings and disable selected image sizes accordingly
 * This allows users to control which image sizes are generated via the admin interface
 */
function blankpage_disable_unnecessary_image_sizes() {
    // Get disabled sizes from admin tool settings
    $disabled_sizes = get_option('blankpage_disabled_image_sizes', []);
    
    // Always disable woocommerce_gallery_thumbnail by default (we don't use it)
    if (!in_array('woocommerce_gallery_thumbnail', $disabled_sizes)) {
        $disabled_sizes[] = 'woocommerce_gallery_thumbnail';
    }
    
    // Remove each disabled size
    foreach ($disabled_sizes as $size) {
        remove_image_size($size);
    }
    
    // Debug info (only visible with ?debug_image_sizes parameter)
    if (isset($_GET['debug_image_sizes'])) {
        echo "<!-- BlankPage Debug: Disabled sizes: " . implode(', ', $disabled_sizes) . " -->";
    }
}
add_action('init', 'blankpage_disable_unnecessary_image_sizes');

/**
 * Prevent generation of scaled images (WordPress 5.3+)
 * This stops WordPress from creating -scaled versions of large images
 */
function blankpage_disable_scaled_images($threshold) {
    // Return false to disable the scaled image feature
    // This prevents WordPress from creating additional -scaled versions
    return false;
}
add_filter('big_image_size_threshold', 'blankpage_disable_scaled_images');

/**
 * Clean up image sizes based on admin tool settings
 * This function respects user choices from the admin interface
 */
function blankpage_cleanup_intermediate_image_sizes($sizes) {
    // Get disabled sizes from admin tool settings
    $disabled_sizes = get_option('blankpage_disabled_image_sizes', []);
    
    // Always disable woocommerce_gallery_thumbnail (we don't use it)
    if (!in_array('woocommerce_gallery_thumbnail', $disabled_sizes)) {
        $disabled_sizes[] = 'woocommerce_gallery_thumbnail';
    }
    
    // Auto-generated sizes (1536x1536, 2048x2048) are now controlled by admin tool
    // No hardcoded removal - let admin settings decide
    
    // Remove sizes disabled by admin tool
    foreach ($disabled_sizes as $size) {
        if (isset($sizes[$size])) {
            unset($sizes[$size]);
        }
    }
    
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'blankpage_cleanup_intermediate_image_sizes');

/**
 * AJAX handler for analyzing cleanup files - detects ALL image size variants
 */
function blankpage_analyze_cleanup() {
    // Security check
    if (!wp_verify_nonce($_POST['nonce'], 'blankpage_cleanup_nonce')) {
        wp_die(json_encode(['success' => false, 'data' => ['message' => 'Turvalisuse kontroll ebaõnnestus']]));
    }
    
    if (!current_user_can('manage_options')) {
        wp_die(json_encode(['success' => false, 'data' => ['message' => 'Puuduvad õigused']]));
    }
    
    try {
        // Get currently enabled sizes for comparison
        $disabled_sizes = get_option('blankpage_disabled_image_sizes', []);
        $enabled_sizes = blankpage_get_enabled_image_sizes();
        
        // Get all attachments (limit to first 100 for analysis to avoid timeout)
        $attachments = get_posts([
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'posts_per_page' => 100,
            'post_status' => 'inherit',
            'fields' => 'ids'
        ]);
        
        $found_variants = [];
        $total_files = 0;
        $total_size = 0;
        
        foreach ($attachments as $attachment_id) {
            $variants = blankpage_scan_attachment_variants($attachment_id, $enabled_sizes);
            
            foreach ($variants as $variant) {
                $key = $variant['dimensions']; // e.g., "150x150", "666x666"
                
                if (!isset($found_variants[$key])) {
                    $found_variants[$key] = [
                        'dimensions' => $variant['dimensions'],
                        'description' => $variant['description'],
                        'file_count' => 0,
                        'total_size' => 0,
                        'is_enabled' => $variant['is_enabled'],
                        'is_original' => $variant['is_original']
                    ];
                }
                
                $found_variants[$key]['file_count']++;
                $found_variants[$key]['total_size'] += $variant['file_size'];
                $total_files++;
                $total_size += $variant['file_size'];
            }
        }
        
        // Sort by file count (most common first)
        uasort($found_variants, function($a, $b) {
            return $b['file_count'] - $a['file_count'];
        });
        
        wp_send_json_success([
            'total_files' => $total_files,
            'total_size' => blankpage_format_bytes($total_size),
            'found_variants' => array_values($found_variants)
        ]);
        
    } catch (Exception $e) {
        wp_send_json_error(['message' => 'Viga analüüsimisel: ' . $e->getMessage()]);
    }
}
add_action('wp_ajax_blankpage_analyze_cleanup', 'blankpage_analyze_cleanup');

/**
 * AJAX handler for processing cleanup in batches - handles user-selected variants
 */
function blankpage_process_cleanup() {
    // Security check
    if (!wp_verify_nonce($_POST['nonce'], 'blankpage_cleanup_nonce')) {
        wp_die(json_encode(['success' => false, 'data' => ['message' => 'Turvalisuse kontroll ebaõnnestus']]));
    }
    
    if (!current_user_can('manage_options')) {
        wp_die(json_encode(['success' => false, 'data' => ['message' => 'Puuduvad õigused']]));
    }
    
    try {
        $batch = intval($_POST['batch'] ?? 0);
        $batch_size = 50; // Process 50 attachments per batch
        $selected_variants = json_decode(stripslashes($_POST['selected_variants'] ?? '[]'), true);
        
        if (empty($selected_variants)) {
            wp_send_json_success([
                'completed' => true,
                'message' => 'Midagi pole valitud kustutamiseks',
                'batch' => $batch,
                'deleted_count' => 0,
                'freed_space' => '0 B'
            ]);
            return;
        }
        
        // Get all attachments
        $attachments = get_posts([
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'posts_per_page' => $batch_size,
            'offset' => $batch * $batch_size,
            'post_status' => 'inherit',
            'fields' => 'ids'
        ]);
        
        $deleted_count = 0;
        $freed_space = 0;
        $log_messages = [];
        
        foreach ($attachments as $attachment_id) {
            $variants = blankpage_scan_attachment_variants($attachment_id, []);
            
            foreach ($variants as $variant) {
                // Skip originals - never delete those
                if ($variant['is_original']) {
                    continue;
                }
                
                // Check if this variant dimension is selected for deletion
                if (in_array($variant['dimensions'], $selected_variants)) {
                    $file_path = $variant['file_path'];
                    
                    if (file_exists($file_path)) {
                        $file_size = filesize($file_path);
                        if (unlink($file_path)) {
                            $deleted_count++;
                            $freed_space += $file_size;
                            $filename = basename($file_path);
                            $log_messages[] = "Kustutatud ({$variant['dimensions']}): $filename";
                        } else {
                            $log_messages[] = "VIGA kustutamisel: " . basename($file_path);
                        }
                    }
                }
            }
        }
        
        // Check if we're done
        $completed = count($attachments) < $batch_size;
        
        wp_send_json_success([
            'completed' => $completed,
            'batch' => $batch + 1,
            'deleted_count' => $deleted_count,
            'freed_space' => blankpage_format_bytes($freed_space),
            'log_messages' => $log_messages,
            'message' => $completed ? 'Puhastamine lõpetatud!' : 'Jätkame...'
        ]);
        
    } catch (Exception $e) {
        wp_send_json_error(['message' => 'Viga töötlemisel: ' . $e->getMessage()]);
    }
}
add_action('wp_ajax_blankpage_process_cleanup', 'blankpage_process_cleanup');

/**
 * Get list of currently enabled image sizes
 */
function blankpage_get_enabled_image_sizes() {
    $disabled_sizes = get_option('blankpage_disabled_image_sizes', []);
    $all_sizes = [
        'thumbnail', 'medium', 'medium_large', 'large', '1536x1536', '2048x2048',
        'woocommerce_thumbnail', 'woocommerce_single', 'woocommerce_gallery_thumbnail'
    ];
    
    return array_diff($all_sizes, $disabled_sizes);
}

/**
 * Scan an attachment for all image size variants in filesystem
 */
function blankpage_scan_attachment_variants($attachment_id, $enabled_sizes) {
    $variants = [];
    $file_path = get_attached_file($attachment_id);
    
    if (!$file_path || !file_exists($file_path)) {
        return $variants;
    }
    
    $metadata = wp_get_attachment_metadata($attachment_id);
    if (!$metadata) {
        return $variants;
    }
    
    $base_dir = dirname($file_path);
    $filename_info = pathinfo($file_path);
    $base_name = $filename_info['filename'];
    $extension = $filename_info['extension'];
    
    // Add original file
    if (isset($metadata['width']) && isset($metadata['height'])) {
        $variants[] = [
            'dimensions' => $metadata['width'] . 'x' . $metadata['height'],
            'description' => 'Originaal (' . $metadata['width'] . 'x' . $metadata['height'] . ')',
            'file_size' => file_exists($file_path) ? filesize($file_path) : 0,
            'is_enabled' => true, // Original is always "enabled"
            'is_original' => true,
            'file_path' => $file_path
        ];
    }
    
    // Scan actual files in directory matching this image
    $pattern = $base_dir . '/' . $base_name . '-*.' . $extension;
    $variant_files = glob($pattern);
    
    foreach ($variant_files as $variant_file) {
        if (!file_exists($variant_file)) continue;
        
        // Extract dimensions from filename (e.g., image-150x150.jpg)
        $variant_basename = basename($variant_file, '.' . $extension);
        if (preg_match('/-([0-9]+)x([0-9]+)$/', $variant_basename, $matches)) {
            $width = intval($matches[1]);
            $height = intval($matches[2]);
            $dimensions = $width . 'x' . $height;
            
            // Try to identify the size name
            $size_name = blankpage_identify_size_name($width, $height, $metadata);
            $is_enabled = in_array($size_name, $enabled_sizes) || $size_name === 'unknown';
            
            $description = $size_name !== 'unknown' 
                ? "$size_name ($dimensions)"
                : "Tundmatu suurus ($dimensions)";
            
            if (!$is_enabled && $size_name !== 'unknown') {
                $description .= ' - KEELATUD';
            } elseif ($size_name === 'unknown') {
                $description .= ' - LEGACY/VARASEM [DEBUG: Checking why this is unknown]';
            }
            
            $variants[] = [
                'dimensions' => $dimensions,
                'description' => $description,
                'file_size' => filesize($variant_file),
                'is_enabled' => $is_enabled,
                'is_original' => false,
                'file_path' => $variant_file,
                'size_name' => $size_name
            ];
        }
    }
    
    return $variants;
}

/**
 * Dynamic Image Size Usage Detection System
 * Scans theme templates to find actual image size usage
 */
function blankpage_get_core_image_usage($size) {
    $core_usages = [
        // WordPress Core
        'thumbnail' => 'WP Admin, widgets, fallbacks',
        'medium' => 'Content areas, featured images', 
        'large' => 'Hero images, single posts',
        'medium_large' => 'Responsive auto-generation (768px)',
        '1536x1536' => 'WordPress auto (2x large)',
        '2048x2048' => 'WordPress auto (max size)',
        
        // WooCommerce Core (from official docs)
        'woocommerce_thumbnail' => 'Shop loops, product archives',
        'woocommerce_single' => 'Single product main image',
        'woocommerce_gallery_thumbnail' => 'Product gallery thumbnails'
    ];
    
    return isset($core_usages[$size]) ? $core_usages[$size] : '';
}

function blankpage_scan_theme_image_usage() {
    $theme_dir = get_template_directory();
    $usage_map = [];
    
    // Scan all PHP files recursively
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($theme_dir, RecursiveDirectoryIterator::SKIP_DOTS)
    );
    
    foreach ($iterator as $file) {
        if ($file->getExtension() !== 'php') continue;
        
        $content = file_get_contents($file->getPathname());
        $relative_path = str_replace($theme_dir . DIRECTORY_SEPARATOR, '', $file->getPathname());
        
        // Find image size usage patterns
        $patterns = [
            // get_the_post_thumbnail patterns
            "/get_the_post_thumbnail\s*\([^,)]*,\s*['\"]([^'\"]+)['\"]/",
            "/the_post_thumbnail\s*\(['\"]([^'\"]+)['\"]/",
            // wp_get_attachment_image patterns  
            "/wp_get_attachment_image(?:_url)?\s*\([^,)]*,\s*['\"]([^'\"]+)['\"]/",
            // WooCommerce specific patterns
            "/->get_image\s*\(['\"]([^'\"]+)['\"]/"
        ];
        
        foreach ($patterns as $pattern) {
            if (preg_match_all($pattern, $content, $matches)) {
                foreach ($matches[1] as $size) {
                    if (!isset($usage_map[$size])) {
                        $usage_map[$size] = [];
                    }
                    if (!in_array($relative_path, $usage_map[$size])) {
                        $usage_map[$size][] = $relative_path;
                    }
                }
            }
        }
    }
    
    return $usage_map;
}

function blankpage_get_combined_usage($size) {
    static $theme_usage_cache = null;
    
    // Cache theme usage scan (expensive operation)
    if ($theme_usage_cache === null) {
        $theme_usage_cache = blankpage_scan_theme_image_usage();
    }
    
    $core_usage = blankpage_get_core_image_usage($size);
    $theme_files = isset($theme_usage_cache[$size]) ? $theme_usage_cache[$size] : [];
    
    $usage_lines = [];
    
    // Core usage (WordPress/WooCommerce)
    if ($core_usage) {
        $usage_lines[] = "Core: " . $core_usage;
    }
    
    // BlankPage theme usage
    if (!empty($theme_files)) {
        $file_list = implode(', ', array_map('basename', array_slice($theme_files, 0, 3)));
        if (count($theme_files) > 3) {
            $file_list .= ' +' . (count($theme_files) - 3) . ' more';
        }
        $usage_lines[] = "BlankPage theme: " . $file_list;
    } else {
        $usage_lines[] = "BlankPage theme: Ei kasutata";
    }
    
    if (empty($usage_lines)) {
        return 'Ei kasutata';
    }
    
    // Join with line breaks for multi-line display
    return implode("\n", $usage_lines);
}

/**
 * Try to identify size name from dimensions - SIMPLE & RELIABLE VERSION
 */
function blankpage_identify_size_name($width, $height, $metadata) {
    // STEP 1: Get WordPress built-in sizes with current settings
    $sizes_to_check = [];
    
    // WordPress built-in sizes
    $sizes_to_check['thumbnail'] = [
        'width' => intval(get_option('thumbnail_size_w', 150)),
        'height' => intval(get_option('thumbnail_size_h', 150)), 
        'crop' => get_option('thumbnail_crop', 1) ? true : false
    ];
    
    $sizes_to_check['medium'] = [
        'width' => intval(get_option('medium_size_w', 300)),
        'height' => intval(get_option('medium_size_h', 300)),
        'crop' => false // Medium is never cropped in WordPress
    ];
    
    $sizes_to_check['medium_large'] = [
        'width' => intval(get_option('medium_large_size_w', 768)),
        'height' => intval(get_option('medium_large_size_h', 0)),
        'crop' => false // medium_large is always uncropped
    ];
    
    $sizes_to_check['large'] = [
        'width' => intval(get_option('large_size_w', 1024)),
        'height' => intval(get_option('large_size_h', 1024)),
        'crop' => false // Large is never cropped in WordPress
    ];
    
    // WordPress auto-generated sizes
    $sizes_to_check['1536x1536'] = ['width' => 1536, 'height' => 1536, 'crop' => false];
    $sizes_to_check['2048x2048'] = ['width' => 2048, 'height' => 2048, 'crop' => false];
    
    // STEP 2: Add WooCommerce sizes if available
    if (class_exists('WooCommerce')) {
        $wc_thumb_width = intval(get_option('woocommerce_thumbnail_image_width', 150));
        $wc_thumb_height = intval(get_option('woocommerce_thumbnail_image_height', 150));
        $wc_thumb_crop = get_option('woocommerce_thumbnail_cropping', '1:1');
        
        $wc_single_width = intval(get_option('woocommerce_single_image_width', 600));
        $wc_single_height = intval(get_option('woocommerce_single_image_height', 600));
        $wc_single_crop = get_option('woocommerce_single_image_cropping', '1:1');
        
        // WooCommerce uses 'uncropped' string for uncropped, anything else is cropped
        $sizes_to_check['woocommerce_thumbnail'] = [
            'width' => $wc_thumb_width,
            'height' => $wc_thumb_height,
            'crop' => ($wc_thumb_crop === 'uncropped') ? false : true
        ];
        
        $sizes_to_check['woocommerce_single'] = [
            'width' => $wc_single_width,
            'height' => $wc_single_height,
            'crop' => ($wc_single_crop === 'uncropped') ? false : true
        ];
        
        $sizes_to_check['woocommerce_gallery_thumbnail'] = [
            'width' => 100,
            'height' => 100,
            'crop' => true
        ];
    }
    
    // STEP 3: Check each size configuration
    foreach ($sizes_to_check as $size_name => $config) {
        $target_width = $config['width'];
        $target_height = $config['height'];
        $is_cropped = $config['crop'];
        
        // CROPPED: Must match exact dimensions
        if ($is_cropped) {
            if ($width == $target_width && $height == $target_height) {
                return $size_name;
            }
        }
        // UNCROPPED: Width-constrained resize
        else {
            if ($width == $target_width) {
                // For uncropped, any height is valid for this width
                return $size_name;
            }
        }
    }
    
    // If no match found, it's unknown/legacy
    return 'unknown';
}

/**
 * Get files to delete for a specific attachment
 */
function blankpage_get_attachment_cleanup_files($attachment_id, $disabled_sizes) {
    $files_to_delete = [];
    $file_path = get_attached_file($attachment_id);
    
    if (!$file_path || !file_exists($file_path)) {
        return $files_to_delete;
    }
    
    $metadata = wp_get_attachment_metadata($attachment_id);
    if (!$metadata || !isset($metadata['sizes'])) {
        return $files_to_delete;
    }
    
    $upload_dir = wp_upload_dir();
    $base_dir = dirname($file_path);
    
    // Check each size variant
    foreach ($metadata['sizes'] as $size_name => $size_data) {
        if (in_array($size_name, $disabled_sizes)) {
            $size_file = $base_dir . '/' . $size_data['file'];
            if (file_exists($size_file)) {
                $files_to_delete[] = $size_file;
            }
        }
    }
    
    return $files_to_delete;
}

/**
 * Format bytes to human readable format
 */
function blankpage_format_bytes($bytes, $precision = 2) {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    
    for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
        $bytes /= 1024;
    }
    
    return round($bytes, $precision) . ' ' . $units[$i];
}

/**
 * IMAGE SIZE ADMIN PANEL
 * WordPress admin interface for managing image size generation
 */

// Add admin menu item to main menu
function blankpage_add_admin_menu() {
    add_menu_page(
        'BlankPage Töölaud',
        'BlankPage Töölaud', 
        'manage_options',
        'blankpage-dashboard',
        'blankpage_image_admin_page',
        'dashicons-admin-tools',
        30
    );
}
add_action('admin_menu', 'blankpage_add_admin_menu');

// Enqueue admin styles
function blankpage_enqueue_admin_styles($hook) {
    // Only load on our admin page (correct hook name for main menu)
    if ($hook !== 'toplevel_page_blankpage-dashboard') {
        return;
    }
    
    wp_enqueue_style(
        'blankpage-admin-image-tool',
        get_template_directory_uri() . '/resources/css/admin-image-tool.css',
        [],
        '1.0.0'
    );
}
add_action('admin_enqueue_scripts', 'blankpage_enqueue_admin_styles');

// Handle form submissions
function blankpage_handle_image_settings() {
    // Handle form submission with proper validation
    if (isset($_POST['save_settings'])) {
        // Verify nonce for security
        if (!wp_verify_nonce($_POST['blankpage_image_settings_nonce'], 'blankpage_image_settings')) {
            wp_die(__('Turvalisuse kontroll ebaõnnestus. Palun proovige uuesti.', 'textdomain'));
        }
        
        // Check user permissions
        if (!current_user_can('manage_options')) {
            wp_die(__('Teil pole piisavalt õigusi selle toimingu teostamiseks.', 'textdomain'));
        }
        
        // Sanitize and validate input data
        $disabled_sizes = isset($_POST['disabled_sizes']) ? $_POST['disabled_sizes'] : [];
        $valid_sizes = ['thumbnail', 'medium', 'medium_large', 'large', '1536x1536', '2048x2048', 'woocommerce_thumbnail', 'woocommerce_single', 'woocommerce_gallery_thumbnail'];
        $sanitized_disabled_sizes = [];
        
        // Validate each selected size
        foreach ($disabled_sizes as $size) {
            $clean_size = sanitize_text_field($size);
            if (in_array($clean_size, $valid_sizes)) {
                $sanitized_disabled_sizes[] = $clean_size;
            }
        }
        
        // Save sanitized data
        $result = update_option('blankpage_disabled_image_sizes', $sanitized_disabled_sizes);
        
        if ($result !== false) {
            echo '<div class="notice notice-success is-dismissible"><p><strong>Edukalt salvestatud!</strong> Pildisuuruste seaded on uuendatud.</p></div>';
        } else {
            echo '<div class="notice notice-error is-dismissible"><p><strong>Viga!</strong> Seadete salvestamine ebaõnnestus. Palun proovige uuesti.</p></div>';
        }
    }
}
add_action('admin_init', 'blankpage_handle_image_settings');

// Admin page content with improved error handling
function blankpage_image_admin_page() {
    try {
        global $_wp_additional_image_sizes;
        $disabled_sizes = get_option('blankpage_disabled_image_sizes', []);
        
        // Validate that disabled_sizes is an array
        if (!is_array($disabled_sizes)) {
            $disabled_sizes = [];
        }
        
        ?>
        <div class="wrap blankpage-admin-wrap">
            <!-- Header -->
            <div class="blankpage-admin-header">
                <h1 class="blankpage-admin-title">
                    Pildisuuruste Haldur
                </h1>
                <?php
                // Calculate dynamic stats with error handling
                try {
                    // Count active sizes
                    $active_count = 0;
                    
                    // WordPress built-in sizes
                    $wp_builtin_sizes = ['thumbnail', 'medium', 'medium_large', 'large', '1536x1536', '2048x2048'];
                    foreach ($wp_builtin_sizes as $size) {
                        if (!in_array($size, $disabled_sizes)) $active_count++;
                    }
                    
                    // WooCommerce sizes (now all user-controllable)
                    $wc_sizes = ['woocommerce_thumbnail', 'woocommerce_single', 'woocommerce_gallery_thumbnail'];
                    foreach ($wc_sizes as $size) {
                        if (!in_array($size, $disabled_sizes)) $active_count++;
                    }
                    
                    // Always add original
                    $active_count++;
                    
                    // Collect dimension data first, then calculate consolidation
                $size_dimensions = [];
                $debug_info = [];
                
                // Manually collect dimension data for consolidation calculation
                // WordPress sizes
                $builtin_sizes = [
                    'thumbnail' => 'Pisipilt',
                    'medium' => 'Keskmine',
                    'medium_large' => 'Keskmiselt suur', 
                    'large' => 'Suur',
                    '1536x1536' => '1536x1536 (automaatne)',
                    '2048x2048' => '2048x2048 (automaatne)'
                ];
                
                foreach ($builtin_sizes as $size => $description) {
                    if ($size === '1536x1536') {
                        $size_dimensions[$size] = ['width' => 1536, 'height' => 1536, 'crop' => false];
                    } elseif ($size === '2048x2048') {
                        $size_dimensions[$size] = ['width' => 2048, 'height' => 2048, 'crop' => false];
                    } else {
                        $width = (int)(get_option($size . '_size_w') ?: '0');
                        $height = (int)(get_option($size . '_size_h') ?: '0');
                        $crop = get_option($size . '_crop');
                        $size_dimensions[$size] = ['width' => $width, 'height' => $height, 'crop' => $crop];
                    }
                }
                
                // WooCommerce sizes
                if (class_exists('WooCommerce')) {
                    $size_dimensions['woocommerce_thumbnail'] = [
                        'width' => (int)get_option('woocommerce_thumbnail_image_width', 150),
                        'height' => (int)get_option('woocommerce_thumbnail_image_height', 150),
                        'crop' => (get_option('woocommerce_thumbnail_cropping', '1:1') !== 'uncropped')
                    ];
                    
                    $size_dimensions['woocommerce_single'] = [
                        'width' => (int)get_option('woocommerce_single_image_width', 600),
                        'height' => (int)get_option('woocommerce_single_image_height', 600),
                        'crop' => false
                    ];
                    
                    $size_dimensions['woocommerce_gallery_thumbnail'] = [
                        'width' => 100,
                        'height' => 100,
                        'crop' => true
                    ];
                }
                
                // Calculate savings with smart consolidation
                $total_possible_files = 9; // WP: 6 + WC: 3 = 9 total image sizes
                $disabled_count = count($disabled_sizes);
                
                // Calculate smart consolidation savings
                $consolidation_savings = 0;
                
                // Check thumbnail consolidation using table display logic
                if (isset($size_dimensions['thumbnail']) && isset($size_dimensions['woocommerce_thumbnail'])) {
                    $wp_thumb = $size_dimensions['thumbnail'];
                    $wc_thumb = $size_dimensions['woocommerce_thumbnail'];
                    
                    // Use same display logic as table: show 'auto' height for uncropped images
                    $wp_display_height = $wp_thumb['crop'] ? $wp_thumb['height'] : 'auto';
                    $wc_display_height = $wc_thumb['crop'] ? $wc_thumb['height'] : 'auto';
                    
                    $debug_info[] = "WP Thumb: {$wp_thumb['width']}x{$wp_display_height} (crop: " . ($wp_thumb['crop'] ? 'yes' : 'no') . ")";
                    $debug_info[] = "WC Thumb: {$wc_thumb['width']}x{$wc_display_height} (crop: " . ($wc_thumb['crop'] ? 'yes' : 'no') . ")";
                    
                    // Match logic: if both uncropped, only width needs to match
                    $thumb_match = false;
                    if ($wp_thumb['crop'] && $wc_thumb['crop']) {
                        // Both cropped - exact dimensions must match
                        $thumb_match = ($wp_thumb['width'] === $wc_thumb['width'] && $wp_thumb['height'] === $wc_thumb['height']);
                    } elseif (!$wp_thumb['crop'] && !$wc_thumb['crop']) {
                        // Both uncropped - only width needs to match (height is 'auto')
                        $thumb_match = ($wp_thumb['width'] === $wc_thumb['width']);
                    } elseif ($wp_thumb['crop'] && !$wc_thumb['crop']) {
                        // WP cropped, WC uncropped - width must match
                        $thumb_match = ($wp_thumb['width'] === $wc_thumb['width']);
                    } elseif (!$wp_thumb['crop'] && $wc_thumb['crop']) {
                        // WP uncropped, WC cropped - width must match
                        $thumb_match = ($wp_thumb['width'] === $wc_thumb['width']);
                    }
                    
                    $thumb_both_enabled = !in_array('thumbnail', $disabled_sizes) && !in_array('woocommerce_thumbnail', $disabled_sizes);
                    
                    if ($thumb_match && $thumb_both_enabled) {
                        $consolidation_savings++;
                        $debug_info[] = "✅ Thumb consolidation detected! ({$wp_thumb['width']}x{$wp_display_height} = {$wc_thumb['width']}x{$wc_display_height})";
                    } else {
                        $debug_info[] = "❌ Thumb consolidation failed: match=" . ($thumb_match ? 'yes' : 'no') . ", both_enabled=" . ($thumb_both_enabled ? 'yes' : 'no');
                    }
                }
                
                // Check medium/single consolidation using table display logic
                if (isset($size_dimensions['medium']) && isset($size_dimensions['woocommerce_single'])) {
                    $wp_medium = $size_dimensions['medium'];
                    $wc_single = $size_dimensions['woocommerce_single'];
                    
                    // Use same display logic as table: show 'auto' height for uncropped images
                    $wp_display_height = $wp_medium['crop'] ? $wp_medium['height'] : 'auto';
                    $wc_display_height = $wc_single['crop'] ? $wc_single['height'] : 'auto';
                    
                    $debug_info[] = "WP Medium: {$wp_medium['width']}x{$wp_display_height} (crop: " . ($wp_medium['crop'] ? 'yes' : 'no') . ")";
                    $debug_info[] = "WC Single: {$wc_single['width']}x{$wc_display_height} (crop: " . ($wc_single['crop'] ? 'yes' : 'no') . ")";
                    
                    // Match logic: if both uncropped, only width needs to match
                    $medium_match = false;
                    if ($wp_medium['crop'] && $wc_single['crop']) {
                        // Both cropped - exact dimensions must match
                        $medium_match = ($wp_medium['width'] === $wc_single['width'] && $wp_medium['height'] === $wc_single['height']);
                    } elseif (!$wp_medium['crop'] && !$wc_single['crop']) {
                        // Both uncropped - only width needs to match (height is 'auto')
                        $medium_match = ($wp_medium['width'] === $wc_single['width']);
                    } elseif ($wp_medium['crop'] && !$wc_single['crop']) {
                        // WP cropped, WC uncropped - width must match
                        $medium_match = ($wp_medium['width'] === $wc_single['width']);
                    } elseif (!$wp_medium['crop'] && $wc_single['crop']) {
                        // WP uncropped, WC cropped - width must match
                        $medium_match = ($wp_medium['width'] === $wc_single['width']);
                    }
                    
                    $medium_both_enabled = !in_array('medium', $disabled_sizes) && !in_array('woocommerce_single', $disabled_sizes);
                    
                    if ($medium_match && $medium_both_enabled) {
                        $consolidation_savings++;
                        $debug_info[] = "✅ Medium consolidation detected! ({$wp_medium['width']}x{$wp_display_height} = {$wc_single['width']}x{$wc_display_height})";
                    } else {
                        $debug_info[] = "❌ Medium consolidation failed: match=" . ($medium_match ? 'yes' : 'no') . ", both_enabled=" . ($medium_both_enabled ? 'yes' : 'no');
                    }
                }
                
                $debug_info[] = "Consolidation savings: {$consolidation_savings}";
                
                $total_savings = $disabled_count + $consolidation_savings;
                $savings_percent = round(($total_savings / $total_possible_files) * 100);
                
            } catch (Exception $e) {
                // Fallback values if calculation fails
                $active_count = 1;
                $savings_percent = 0;
                $disabled_count = 0;
                $consolidation_savings = 0;
                $debug_info = ['Error: ' . $e->getMessage()];
                error_log('BlankPage Admin Tool: Error calculating stats - ' . $e->getMessage());
            }
                ?>
                <?php
                // Calculate actual generated file count (active sizes minus consolidation)
                $actual_generated_files = $active_count - $consolidation_savings;
                ?>
                <p class="blankpage-admin-description">
                    Halda, milliseid pildisuurusi luuakse piltide üleslaadimise käigus. Lubatud on 
                    <span class="blankpage-highlight"><?php echo esc_html($active_count); ?> suurust</span>, kuid 
                    tänu konsolideerimisele genereeritakse tegelikult 
                    <span class="blankpage-highlight"><?php echo esc_html($actual_generated_files); ?> erinevat faili</span>.
                </p>

            </div>
        
        <!-- Statistics Cards -->
        <div class="blankpage-admin-stats">
            <div class="blankpage-stats-grid">
                <?php
                // Recalculate savings percentage based on actual generated files
                $max_possible_files = 9; // Total available sizes (WP: 6 + WC: 3)
                $files_not_generated = $disabled_count + $consolidation_savings; // Disabled + consolidated
                $correct_savings_percent = round(($files_not_generated / $max_possible_files) * 100);
                ?>
                <div class="blankpage-stat-card">
                    <div class="blankpage-stat-label">Aktiivseid suurusi</div>
                    <div class="blankpage-stat-value"><?php echo esc_html($active_count); ?></div>
                </div>
                <div class="blankpage-stat-card">
                    <div class="blankpage-stat-label">Genereerituid faile</div>
                    <div class="blankpage-stat-value"><?php echo esc_html($actual_generated_files); ?></div>
                </div>
                <div class="blankpage-stat-card">
                    <div class="blankpage-stat-label">Ruumi säästetud</div>
                    <div class="blankpage-stat-value"><?php echo esc_html($correct_savings_percent); ?>%</div>
                </div>
            </div>
            
            <!-- Active Sizes Block -->
            <div class="blankpage-active-sizes-block">
                <?php
                // Show active sizes with error handling
                try {
                    $active_sizes = [];
                    
                    // WooCommerce sizes with validation using same display logic as table
                    if (!in_array('woocommerce_thumbnail', $disabled_sizes)) {
                        $width = get_option('woocommerce_thumbnail_image_width', 150);
                        $crop_setting = get_option('woocommerce_thumbnail_cropping', '1:1');
                        $crop = ($crop_setting !== 'uncropped');
                        
                        // Use table display logic: show 'auto' height for uncropped images
                        $display_height = $crop ? get_option('woocommerce_thumbnail_image_height', 150) : 'auto';
                        $active_sizes[] = "woocommerce_thumbnail ({$width}x{$display_height})";
                    }
                    if (!in_array('woocommerce_single', $disabled_sizes)) {
                        $width = get_option('woocommerce_single_image_width', 600);
                        // WooCommerce single is always uncropped
                        $active_sizes[] = "woocommerce_single ({$width}xauto)";
                    }
                    if (!in_array('woocommerce_gallery_thumbnail', $disabled_sizes)) {
                        // Gallery thumbnail is always 100x100 cropped
                        $active_sizes[] = "woocommerce_gallery_thumbnail (100x100)";
                    }
                    
                    // WordPress built-in sizes with validation using same display logic as table
                    $builtin_sizes = ['thumbnail', 'medium', 'medium_large', 'large'];
                    foreach ($builtin_sizes as $size) {
                        if (!in_array($size, $disabled_sizes)) {
                            $width = get_option($size . '_size_w') ?: '0';
                            $height = get_option($size . '_size_h') ?: '0';
                            $crop = get_option($size . '_crop');
                            
                            if ($width) {
                                // Use table display logic: show 'auto' height for uncropped images
                                $display_height = $crop ? $height : 'auto';
                                $active_sizes[] = "$size ({$width}x{$display_height})";
                            }
                        }
                    }
                    
                    // Auto-generated sizes (always uncropped)
                    if (!in_array('1536x1536', $disabled_sizes)) {
                        $active_sizes[] = "1536x1536 (1536xauto)";
                    }
                    if (!in_array('2048x2048', $disabled_sizes)) {
                        $active_sizes[] = "2048x2048 (2048xauto)";
                    }
                    
                    // Original is always active
                    $active_sizes[] = "originaal";
                } catch (Exception $e) {
                    $active_sizes = ['originaal'];
                    error_log('BlankPage Admin Tool: Error getting active sizes - ' . $e->getMessage());
                }
                ?>
                <div class="blankpage-active-sizes-display">
                    <div class="blankpage-stat-label">Aktiivsed suurused</div>
                    <div class="blankpage-active-sizes-text"><?php echo esc_html(implode(', ', $active_sizes)); ?></div>
                </div>
            </div>
        </div>
        
        <form method="post" action="">
            <?php wp_nonce_field('blankpage_image_settings', 'blankpage_image_settings_nonce'); ?>
            
            <!-- Table Section -->
            <div class="blankpage-settings-table">
                <div class="blankpage-table-header">
                    <h2 class="blankpage-table-title">Pildisuuruste Olek</h2>
                </div>
                <div class="blankpage-table-content">
                    <table class="blankpage-table">
                        <thead>
                            <tr>
                                <th class="blankpage-th">Suuruse Nimi</th>
                                <th class="blankpage-th">Mõõdud</th>
                                <th class="blankpage-th">Olek</th>
                                <th class="blankpage-th">Kasutus</th>
                                <th class="blankpage-th">Keela/Luba</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            try {
                                // WordPress built-in sizes (original order)
                                $builtin_sizes = [
                                    'thumbnail' => 'WordPressi vaikimisi pisipilt',
                                    'medium' => 'WordPressi vaikimisi keskmine', 
                                    'medium_large' => 'WordPressi vaikimisi keskmine-suur',
                                    'large' => 'WordPressi vaikimisi suur',
                                    '1536x1536' => 'WordPress auto-genereeritud (2x large)',
                                    '2048x2048' => 'WordPress auto-genereeritud (suur)'
                                ];
                                
                                foreach ($builtin_sizes as $size => $description) {
                                    // Handle auto-generated sizes with dimensions in name
                                    if ($size === '1536x1536') {
                                        $width = '1536';
                                        $height = '1536';
                                        $crop = false;
                                    } elseif ($size === '2048x2048') {
                                        $width = '2048';
                                        $height = '2048';
                                        $crop = false;
                                    } else {
                                        // Regular WordPress sizes - debug actual values
                                        $width = get_option($size . '_size_w') ?: '0';
                                        $height = get_option($size . '_size_h') ?: '0';
                                        $crop = get_option($size . '_crop');
                                        
                                        // Debug: uncomment to see raw values
                                        // error_log("Size: $size, Width: $width, Height: $height, Crop: " . var_export($crop, true));
                                    }
                                    
                                    // Store dimension data for smart consolidation calculation
                                    $size_dimensions[$size] = [
                                        'width' => (int)$width,
                                        'height' => (int)$height,
                                        'crop' => $crop
                                    ];
                                    
                                    $is_disabled = in_array($size, $disabled_sizes);
                                    $status = $is_disabled ? 'Keelatud' : 'Lubatud';
                                    $status_class = $is_disabled ? 'blankpage-status-disabled' : 'blankpage-status-active';
                                    
                                    // Dynamic usage detection
                                    $usage = blankpage_get_combined_usage($size);
                                    
                                    // User-friendly display: show 'auto' height for uncropped images
                                    $display_height = $crop ? $height : 'auto';
                                    
                                    echo '<tr class="blankpage-tr">';
                                    echo '<td class="blankpage-td"><div class="blankpage-size-name">' . esc_html($size) . '</div><div class="blankpage-size-description">' . esc_html($description) . '</div></td>';
                                    echo '<td class="blankpage-td blankpage-td-mono">' . esc_html($width) . 'x' . esc_html($display_height) . ($crop ? ' <span class="blankpage-crop-note">(lõigatud)</span>' : ' <span class="blankpage-crop-note">(mitte lõigatud)</span>') . '</td>';
                                    echo '<td class="blankpage-td"><span class="blankpage-status-badge ' . $status_class . '">' . esc_html($status) . '</span></td>';
                                    echo '<td class="blankpage-td blankpage-usage">' . esc_html($usage) . '</td>';
                                    echo '<td class="blankpage-td blankpage-td-center"><input type="checkbox" name="disabled_sizes[]" value="' . esc_attr($size) . '"' . ($is_disabled ? ' checked' : '') . ' class="blankpage-checkbox"></td>';
                                    echo '</tr>';
                                }
                                
                                // WooCommerce sizes after WordPress (original order)
                                if (class_exists('WooCommerce')) {
                                    $wc_sizes = [
                                        'woocommerce_thumbnail' => '',
                                        'woocommerce_single' => '', 
                                        'woocommerce_gallery_thumbnail' => ''
                                    ];
                                    
                                    foreach ($wc_sizes as $size => $usage_description) {
                                        // Get actual dimensions from WooCommerce settings
                                        if ($size === 'woocommerce_thumbnail') {
                                            $width = get_option('woocommerce_thumbnail_image_width', 150);
                                            $crop_setting = get_option('woocommerce_thumbnail_cropping', '1:1');
                                            $crop = ($crop_setting !== 'uncropped');
                                            
                                            // For uncropped images, height is not fixed
                                            if ($crop) {
                                                $height = get_option('woocommerce_thumbnail_image_height', 150);
                                            } else {
                                                $height = 'auto'; // Height adjusts to maintain aspect ratio
                                            }
                                        } elseif ($size === 'woocommerce_single') {
                                            $width = get_option('woocommerce_single_image_width', 600);
                                            $height = get_option('woocommerce_single_image_height', 600);
                                            $crop = false;
                                        } elseif ($size === 'woocommerce_gallery_thumbnail') {
                                            $width = 100;
                                            $height = 100;
                                            $crop = true;
                                        }
                                        
                                        // Store WooCommerce dimension data for smart consolidation calculation
                                        $size_dimensions[$size] = [
                                            'width' => (int)$width,
                                            'height' => (int)$height,
                                            'crop' => $crop
                                        ];
                                        
                                        $is_disabled = in_array($size, $disabled_sizes);
                                        $status = $is_disabled ? 'Keelatud' : 'Lubatud';
                                        $status_class = $is_disabled ? 'blankpage-status-disabled' : 'blankpage-status-active';
                                        
                                        // Dynamic usage detection
                                        $usage = blankpage_get_combined_usage($size);
                                        
                                        // User-friendly display: show 'auto' height for uncropped images
                                        $display_height = $crop ? $height : 'auto';
                                        
                                        echo '<tr class="blankpage-tr">';
                                        echo '<td class="blankpage-td"><div class="blankpage-size-name">' . esc_html($size) . '</div><div class="blankpage-size-description">WooCommerce suurus</div></td>';
                                        echo '<td class="blankpage-td blankpage-td-mono">' . esc_html($width) . 'x' . esc_html($display_height) . ($crop ? ' <span class="blankpage-crop-note">(lõigatud)</span>' : ' <span class="blankpage-crop-note">(mitte lõigatud)</span>') . '</td>';
                                        echo '<td class="blankpage-td"><span class="blankpage-status-badge ' . $status_class . '">' . esc_html($status) . '</span></td>';
                                        echo '<td class="blankpage-td blankpage-usage">' . esc_html($usage) . '</td>';
                                        echo '<td class="blankpage-td blankpage-td-center"><input type="checkbox" name="disabled_sizes[]" value="' . esc_attr($size) . '"' . ($is_disabled ? ' checked' : '') . ' class="blankpage-checkbox"></td>';
                                        echo '</tr>';
                                    }
                                }
                            } catch (Exception $e) {
                                echo '<tr><td colspan="5" class="blankpage-error">Viga andmete laadimisel: ' . esc_html($e->getMessage()) . '</td></tr>';
                                error_log('BlankPage Admin Tool: Error loading size data - ' . $e->getMessage());
                            }
                            
                            // Now calculate smart consolidation using collected dimension data
                            $debug_info = [];
                            
                            // Check for dimension matches between WP and WC sizes
                            if (isset($size_dimensions['thumbnail']) && isset($size_dimensions['woocommerce_thumbnail'])) {
                                $wp_thumb = $size_dimensions['thumbnail'];
                                $wc_thumb = $size_dimensions['woocommerce_thumbnail'];
                                
                                $debug_info[] = "WP Thumb: {$wp_thumb['width']}x{$wp_thumb['height']} (crop: " . ($wp_thumb['crop'] ? 'yes' : 'no') . ")";
                                $debug_info[] = "WC Thumb: {$wc_thumb['width']}x{$wc_thumb['height']} (crop: " . ($wc_thumb['crop'] ? 'yes' : 'no') . ")";
                                
                                // For cropped sizes, both width and height must match
                                // For uncropped sizes, only width needs to match (height varies)
                                $thumb_match = false;
                                if ($wp_thumb['crop'] && $wc_thumb['crop']) {
                                    // Both cropped - exact match required
                                    $thumb_match = ($wp_thumb['width'] === $wc_thumb['width'] && $wp_thumb['height'] === $wc_thumb['height']);
                                } elseif (!$wp_thumb['crop'] && !$wc_thumb['crop']) {
                                    // Both uncropped - width match sufficient
                                    $thumb_match = ($wp_thumb['width'] === $wc_thumb['width']);
                                } elseif ($wp_thumb['crop'] && !$wc_thumb['crop']) {
                                    // WP cropped, WC uncropped - width match
                                    $thumb_match = ($wp_thumb['width'] === $wc_thumb['width']);
                                } elseif (!$wp_thumb['crop'] && $wc_thumb['crop']) {
                                    // WP uncropped, WC cropped - width match  
                                    $thumb_match = ($wp_thumb['width'] === $wc_thumb['width']);
                                }
                                
                                $thumb_both_enabled = !in_array('thumbnail', $disabled_sizes) && !in_array('woocommerce_thumbnail', $disabled_sizes);
                                
                                if ($thumb_match && $thumb_both_enabled) {
                                    $consolidation_savings++;
                                    $debug_info[] = "✅ Thumb consolidation: WP+WC thumbnails share same file!";
                                } else {
                                    $debug_info[] = "❌ Thumb consolidation failed: match=" . ($thumb_match ? 'yes' : 'no') . ", both_enabled=" . ($thumb_both_enabled ? 'yes' : 'no');
                                }
                            }
                            
                            // Check medium vs woocommerce_single
                            if (isset($size_dimensions['medium']) && isset($size_dimensions['woocommerce_single'])) {
                                $wp_medium = $size_dimensions['medium'];
                                $wc_single = $size_dimensions['woocommerce_single'];
                                
                                $debug_info[] = "WP Medium: {$wp_medium['width']}x{$wp_medium['height']} (crop: " . ($wp_medium['crop'] ? 'yes' : 'no') . ")";
                                $debug_info[] = "WC Single: {$wc_single['width']}x{$wc_single['height']} (crop: " . ($wc_single['crop'] ? 'yes' : 'no') . ")";
                                
                                $medium_match = false;
                                if ($wp_medium['crop'] && $wc_single['crop']) {
                                    $medium_match = ($wp_medium['width'] === $wc_single['width'] && $wp_medium['height'] === $wc_single['height']);
                                } elseif (!$wp_medium['crop'] && !$wc_single['crop']) {
                                    $medium_match = ($wp_medium['width'] === $wc_single['width']);
                                } elseif ($wp_medium['crop'] && !$wc_single['crop']) {
                                    $medium_match = ($wp_medium['width'] === $wc_single['width']);
                                } elseif (!$wp_medium['crop'] && $wc_single['crop']) {
                                    $medium_match = ($wp_medium['width'] === $wc_single['width']);
                                }
                                
                                $medium_both_enabled = !in_array('medium', $disabled_sizes) && !in_array('woocommerce_single', $disabled_sizes);
                                
                                if ($medium_match && $medium_both_enabled) {
                                    $consolidation_savings++;
                                    $debug_info[] = "✅ Medium consolidation: WP medium + WC single share same file!";
                                } else {
                                    $debug_info[] = "❌ Medium consolidation failed: match=" . ($medium_match ? 'yes' : 'no') . ", both_enabled=" . ($medium_both_enabled ? 'yes' : 'no');
                                }
                            }
                            
                            // Update total savings with consolidation
                            $total_savings = $disabled_count + $consolidation_savings;
                            $savings_percent = round(($total_savings / $total_possible_files) * 100);
                            
                            $debug_info[] = "Total consolidation savings: {$consolidation_savings}";
                            $debug_info[] = "Updated total savings: {$total_savings} / {$total_possible_files} = {$savings_percent}%";
                            
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Cleanup Section -->
            <div class="blankpage-cleanup-section">
                <div class="blankpage-cleanup-header">
                    <h2 class="blankpage-cleanup-title">Puhasta Keelatud Suurused</h2>
                    <p class="blankpage-cleanup-description">
                        Kustuta keelatud pildisuuruste failid serverist ruumi vabastamiseks. 
                        <strong>Ohutu:</strong> säilitame alati originaalpildi.
                    </p>
                </div>
                
                <div class="blankpage-cleanup-stats">
                    <div class="blankpage-cleanup-stat-card">
                        <div class="blankpage-stat-number" id="cleanup-total-files">...</div>
                        <div class="blankpage-stat-label">Kokku leitud variante</div>
                    </div>
                    <div class="blankpage-cleanup-stat-card">
                        <div class="blankpage-stat-number" id="cleanup-total-size">...</div>
                        <div class="blankpage-stat-label">Kokku failide suurus</div>
                    </div>
                </div>
                
                <div class="blankpage-variants-selection" id="variants-selection" style="display: none;">
                    <h4>Leitud Pildisuurused:</h4>
                    <p class="blankpage-selection-hint">
                        Vali, millised suurused kustutada. 🟢 = Lubatud, 🔴 = Keelatud, 🟡 = Legacy/Varasem
                    </p>
                    <div class="blankpage-variants-table" id="variants-table">
                        <!-- Variants will be populated here -->
                    </div>
                    <div class="blankpage-selection-summary">
                        <span id="selected-count">0</span> varianti valitud kustutamiseks, 
                        <span id="selected-size">0 B</span> vabaneb ruumi
                    </div>
                </div>
                
                <div class="blankpage-cleanup-actions">
                    <button type="button" id="analyze-cleanup" class="blankpage-button blankpage-button-secondary">
                        🔍 Analüüsi Failid
                    </button>
                    <button type="button" id="start-cleanup" class="blankpage-button blankpage-button-danger" disabled>
                        🗑️ Alusta Puhastamist
                    </button>
                </div>
                
                <div class="blankpage-cleanup-progress" id="cleanup-progress" style="display: none;">
                    <div class="blankpage-progress-bar">
                        <div class="blankpage-progress-fill" id="progress-fill"></div>
                    </div>
                    <div class="blankpage-progress-text" id="progress-text">Alustamine...</div>
                </div>
                
                <div class="blankpage-cleanup-log" id="cleanup-log" style="display: none;">
                    <h4>Puhastamise Logi:</h4>
                    <div class="blankpage-log-content" id="log-content"></div>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="blankpage-submit-container">
                <input type="submit" name="save_settings" value="Salvesta Seaded" class="blankpage-submit-button">
            </div>
        </form>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        // Analyze button click handler
        $('#analyze-cleanup').click(function() {
            $(this).prop('disabled', true).text('\ud83d\udd0d Anal\u00fc\u00fcsin...');
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'blankpage_analyze_cleanup',
                    nonce: '<?php echo wp_create_nonce('blankpage_cleanup_nonce'); ?>'
                },
                success: function(response) {
                    if (response.success) {
                        $('#cleanup-total-files').text(response.data.total_files.toLocaleString());
                        $('#cleanup-total-size').text(response.data.total_size);
                        
                        // Show variants selection
                        displayVariantsSelection(response.data.found_variants);
                        $('#variants-selection').show();
                        
                        if (response.data.total_files === 0) {
                            $('#start-cleanup').text('\u2705 Midagi pole kustutada');
                        }
                    } else {
                        alert('Viga anal\u00fc\u00fcsimisel: ' + response.data.message);
                    }
                },
                error: function() {
                    alert('AJAX viga anal\u00fc\u00fcsimisel');
                },
                complete: function() {
                    $('#analyze-cleanup').prop('disabled', false).text('\ud83d\udd0d Anal\u00fc\u00fcsi Failid');
                }
            });
        });
        
        // Cleanup button click handler
        $('#start-cleanup').click(function() {
            // Get selected variants
            let selectedVariants = [];
            $('.variant-checkbox:checked').each(function() {
                let index = $(this).data('index');
                if (window.variantsData && window.variantsData[index]) {
                    selectedVariants.push(window.variantsData[index].dimensions);
                }
            });
            
            if (selectedVariants.length === 0) {
                alert('Palun vali v\u00e4hemalt \u00fcks variant kustutamiseks!');
                return;
            }
            
            if (confirm(`Kas oled kindel, et tahad kustutada ${selectedVariants.length} pildivariant(i)? Seda toimingut ei saa tagasi v\u00f5tta!\n\nKustatavad suurused: ${selectedVariants.join(', ')}`)) {
                processCleanup(0, selectedVariants);
            }
        });
        
        function processCleanup(batch, selectedVariants) {
            $('#cleanup-progress').show();
            $('#cleanup-log').show();
            $('#start-cleanup').prop('disabled', true).text('Kustutan...');
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'blankpage_process_cleanup',
                    nonce: '<?php echo wp_create_nonce('blankpage_cleanup_nonce'); ?>',
                    batch: batch,
                    selected_variants: JSON.stringify(selectedVariants)
                },
                success: function(response) {
                    if (response.success) {
                        // Update log
                        if (response.data.log_messages && response.data.log_messages.length > 0) {
                            $('#log-content').append(response.data.log_messages.join('<br>') + '<br>');
                            $('#log-content').scrollTop($('#log-content')[0].scrollHeight);
                        }
                        
                        // Update progress message
                        $('#progress-text').text(response.data.message);
                        
                        // Continue if not complete
                        if (!response.data.completed) {
                            setTimeout(function() {
                                processCleanup(response.data.batch, selectedVariants);
                            }, 500);
                        } else {
                            $('#start-cleanup').text('\u2705 Puhastamine l\u00f5petatud!').prop('disabled', false);
                            $('#progress-text').text(`\u2705 Valmis! Kustutatud ${response.data.deleted_count} faili, vabanes ${response.data.freed_space}`);
                            
                            // Refresh analysis
                            setTimeout(function() {
                                $('#analyze-cleanup').click();
                            }, 1000);
                        }
                    } else {
                        alert('Viga puhastamisel: ' + response.data.message);
                        $('#start-cleanup').prop('disabled', false).text('Alusta Puhastamist');
                    }
                },
                error: function() {
                    alert('AJAX viga puhastamisel');
                    $('#start-cleanup').prop('disabled', false).text('Alusta Puhastamist');
                }
            });
        }
        
        function startCleanupProcess() {
            $('#cleanup-progress').show();
            $('#cleanup-log').show();
            $('#start-cleanup').prop('disabled', true);
            
            processCleanupBatch(0);
        }
        
        function processCleanupBatch(offset) {
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'blankpage_process_cleanup',
                    nonce: '<?php echo wp_create_nonce('blankpage_cleanup_nonce'); ?>',
                    offset: offset
                },
                success: function(response) {
                    if (response.success) {
                        // Update progress
                        const progress = response.data.progress;
                        $('#progress-fill').css('width', progress + '%');
                        $('#progress-text').text(response.data.message);
                        
                        // Add log entry
                        $('#log-content').append(response.data.log + '<br>');
                        $('#log-content').scrollTop($('#log-content')[0].scrollHeight);
                        
                        // Continue if not complete
                        if (!response.data.complete) {
                            setTimeout(function() {
                                processCleanupBatch(response.data.next_offset);
                            }, 500); // Small delay to prevent overwhelming
                        } else {
                            $('#progress-text').text('\u2705 Puhastamine l\u00f5petatud!');
                            $('#start-cleanup').text('\u2705 Valmis').prop('disabled', false);
                            analyzeCleanupFiles(); // Refresh stats
                        }
                    } else {
                        alert('Viga puhastamisel: ' + response.data.message);
                        $('#start-cleanup').prop('disabled', false);
                    }
                },
                error: function() {
                    alert('AJAX viga puhastamisel');
                    $('#start-cleanup').prop('disabled', false);
                }
            });
        }
        
        function displayVariantsSelection(variants) {
            let html = '';
            
            variants.forEach(function(variant, index) {
                let statusIcon = '\ud83d\udfe2'; // Green - enabled
                let canDelete = !variant.is_original;
                
                if (variant.is_original) {
                    statusIcon = '\ud83d\udd35'; // Blue - original
                    canDelete = false;
                } else if (!variant.is_enabled) {
                    statusIcon = '\ud83d\udd34'; // Red - disabled  
                } else if (variant.description.includes('LEGACY')) {
                    statusIcon = '\ud83d\udfe1'; // Yellow - legacy
                }
                
                let checkboxHtml = canDelete 
                    ? `<input type="checkbox" class="variant-checkbox" data-index="${index}" data-size="${variant.total_size}" ${!variant.is_enabled || variant.description.includes('LEGACY') ? 'checked' : ''}>`
                    : '<span class="no-delete">-</span>';
                
                html += `
                    <div class="blankpage-variant-row">
                        <div class="variant-checkbox-col">${checkboxHtml}</div>
                        <div class="variant-status">${statusIcon}</div>
                        <div class="variant-dimensions">${variant.dimensions}</div>
                        <div class="variant-description">${variant.description}</div>
                        <div class="variant-count">${variant.file_count.toLocaleString()}</div>
                        <div class="variant-size">${formatBytes(variant.total_size)}</div>
                    </div>
                `;
            });
            
            // Add header
            const headerHtml = `
                <div class="blankpage-variant-header">
                    <div class="variant-checkbox-col">Kustuta</div>
                    <div class="variant-status">Olek</div>
                    <div class="variant-dimensions">M\u00f5\u00f5dud</div>
                    <div class="variant-description">Kirjeldus</div>
                    <div class="variant-count">Failide arv</div>
                    <div class="variant-size">Suurus</div>
                </div>
            `;
            
            $('#variants-table').html(headerHtml + html);
            
            // Store variants data globally for processing
            window.variantsData = variants;
            
            // Add event listeners
            $('.variant-checkbox').on('change', updateSelectionSummary);
            
            // Initial summary calculation
            updateSelectionSummary();
        }
        
        function updateSelectionSummary() {
            let selectedCount = 0;
            let selectedSize = 0;
            
            $('.variant-checkbox:checked').each(function() {
                selectedCount++;
                selectedSize += parseInt($(this).data('size'));
            });
            
            $('#selected-count').text(selectedCount);
            $('#selected-size').text(formatBytes(selectedSize));
            
            // Enable/disable cleanup button
            $('#start-cleanup').prop('disabled', selectedCount === 0);
        }
        
        function formatBytes(bytes) {
            const units = ['B', 'KB', 'MB', 'GB'];
            let size = bytes;
            let unitIndex = 0;
            
            while (size >= 1024 && unitIndex < units.length - 1) {
                size /= 1024;
                unitIndex++;
            }
            
            return Math.round(size * 100) / 100 + ' ' + units[unitIndex];
        }
    });
    </script>
    
    <?php
    } catch (Exception $e) {
        echo '<div class="blankpage-notice blankpage-notice-error">Kriitiline viga: ' . esc_html($e->getMessage()) . '</div>';
        error_log('BlankPage Admin Tool: Critical error - ' . $e->getMessage());
    }
}
