<?php
/**
 * WooCommerce Template Debug
 * 
 * Add to URL: ?debug_templates=1
 */

if (isset($_GET['debug_templates'])) {
    echo '<div style="background: #f0f0f0; padding: 20px; margin: 20px; border: 2px solid #333;">';
    echo '<h2>WooCommerce Template Debug Info</h2>';
    
    // Check WooCommerce support
    echo '<h3>1. Theme Support:</h3>';
    if (current_theme_supports('woocommerce')) {
        echo '✅ WooCommerce support: YES<br>';
    } else {
        echo '❌ WooCommerce support: NO<br>';
    }
    
    // Check current template
    echo '<h3>2. Current Template:</h3>';
    global $woocommerce, $wp_query;
    if (function_exists('wc_get_template_part')) {
        echo 'WooCommerce is active<br>';
    }
    
    // Check if we're on cart/checkout page
    echo '<h3>3. Current Page:</h3>';
    if (is_cart()) {
        echo '🛒 CART PAGE detected<br>';
        echo 'Cart template should be: woocommerce/cart/cart.php<br>';
        
        // Check if our template exists
        $theme_file = get_template_directory() . '/woocommerce/cart/cart.php';
        if (file_exists($theme_file)) {
            echo '✅ Our cart template EXISTS: ' . $theme_file . '<br>';
            echo 'File size: ' . filesize($theme_file) . ' bytes<br>';
            echo 'Last modified: ' . date('Y-m-d H:i:s', filemtime($theme_file)) . '<br>';
        } else {
            echo '❌ Our cart template NOT FOUND: ' . $theme_file . '<br>';
        }
    }
    
    if (is_checkout()) {
        echo '💳 CHECKOUT PAGE detected<br>';
        echo 'Checkout template should be: woocommerce/checkout/form-checkout.php<br>';
        
        // Check if our template exists
        $theme_file = get_template_directory() . '/woocommerce/checkout/form-checkout.php';
        if (file_exists($theme_file)) {
            echo '✅ Our checkout template EXISTS: ' . $theme_file . '<br>';
            echo 'File size: ' . filesize($theme_file) . ' bytes<br>';
            echo 'Last modified: ' . date('Y-m-d H:i:s', filemtime($theme_file)) . '<br>';
        } else {
            echo '❌ Our checkout template NOT FOUND: ' . $theme_file . '<br>';
        }
    }
    
    echo '<h3>4. Template Directory:</h3>';
    echo 'Theme directory: ' . get_template_directory() . '<br>';
    echo 'WooCommerce template path: ' . get_template_directory() . '/woocommerce/<br>';
    
    echo '</div>';
}
?>
