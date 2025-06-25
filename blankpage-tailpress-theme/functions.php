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
        
        error_log('BLANKPAGE: WooCommerce support added successfully via plugins_loaded hook');
    } else {
        error_log('BLANKPAGE: WooCommerce class does NOT exist at plugins_loaded');
    }
}
add_action('plugins_loaded', 'blankpage_woocommerce_setup');

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
        error_log("BLANKPAGE WP_LOADED: WooCommerce support = $support_check");
    }
}
add_action('wp_loaded', 'blankpage_debug_woocommerce_support');

// Include WooCommerce template debug
include_once get_template_directory() . '/debug-templates.php';
