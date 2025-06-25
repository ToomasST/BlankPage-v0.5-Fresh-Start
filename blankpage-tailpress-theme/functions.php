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
    return $template;
}
add_filter('template_include', 'blankpage_woocommerce_template_loader', 99);

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
