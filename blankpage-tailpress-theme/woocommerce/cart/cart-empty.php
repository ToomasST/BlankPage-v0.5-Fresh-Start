<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * CRITICAL: This template overrides WooCommerce's default cart-empty.php
 * to completely remove the "Return to Shop" button and ensure our custom
 * empty cart message from functions.php is the only thing displayed.
 */

// Only display our custom empty cart message via the hook
// This prevents any default WooCommerce empty cart content
do_action( 'woocommerce_cart_is_empty' );

// DO NOT include any default "return to shop" button or other WooCommerce content here
// Our custom message in functions.php handles everything
