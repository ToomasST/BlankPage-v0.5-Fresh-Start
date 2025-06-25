<?php
/**
 * My Account Page
 * 
 * @package BlankPage_Tailpress
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_account_navigation');
?>

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <div class="grid grid-cols-1 lg:grid-cols-4">
        
        <!-- Account Navigation -->
        <div class="lg:col-span-1 bg-gray-50 border-r border-gray-200">
            <nav class="woocommerce-MyAccount-navigation p-6">
                <h2 class="text-lg font-semibold mb-4">Minu konto</h2>
                <ul class="space-y-2">
                    <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--<?php echo esc_attr($endpoint); ?>">
                            <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>" 
                               class="block px-4 py-2 text-gray-700 hover:bg-white hover:text-blue-600 rounded transition-colors <?php echo wc_get_account_menu_item_classes($endpoint); ?>">
                                <?php echo esc_html($label); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>

        <!-- Account Content -->
        <div class="lg:col-span-3 p-6">
            <div class="woocommerce-MyAccount-content">
                <?php
                /**
                 * My Account content.
                 *
                 * @hooked woocommerce_account_content - 10
                 */
                do_action('woocommerce_account_content');
                ?>
            </div>
        </div>
    </div>
</div>

<?php do_action('woocommerce_after_account_navigation'); ?>
