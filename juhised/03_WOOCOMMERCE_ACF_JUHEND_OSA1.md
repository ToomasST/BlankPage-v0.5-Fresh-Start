# 🛒 WOOCOMMERCE + ACF JUHEND - OSA 1
**Töökindlad WooCommerce template failide seadistus**

---

## 🚀 SAMM 1: WOOCOMMERCE TEMPLATE FAILIDE KOPEERIMINE

### 1.1 Vajalike template failide tuvastamine
```bash
# Kontrolli WooCommerce plugin template kausta
dir "C:\xampp\htdocs\wordpress\wp-content\plugins\woocommerce\templates"
```

### 1.2 Template failide kopeerimine teema kausta
```bash
cd "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme"

# Loo woocommerce kaust
mkdir woocommerce
mkdir woocommerce\cart
mkdir woocommerce\checkout
mkdir woocommerce\myaccount
mkdir woocommerce\single-product
mkdir woocommerce\archive

# Kopeeri põhilised template failid
copy "C:\xampp\htdocs\wordpress\wp-content\plugins\woocommerce\templates\archive-product.php" "woocommerce\"
copy "C:\xampp\htdocs\wordpress\wp-content\plugins\woocommerce\templates\single-product.php" "woocommerce\"
copy "C:\xampp\htdocs\wordpress\wp-content\plugins\woocommerce\templates\content-product.php" "woocommerce\"
copy "C:\xampp\htdocs\wordpress\wp-content\plugins\woocommerce\templates\cart\cart.php" "woocommerce\cart\"
```

### 1.3 Põhi woocommerce.php faili loomine
Loo `woocommerce.php`:
```php
<?php
/**
 * WooCommerce Template Override
 * Theme: BlankPage TailPress
 */

get_header(); ?>

<main class="container mx-auto px-4 py-8">
    <?php woocommerce_content(); ?>
</main>

<?php get_footer(); ?>
```

✅ **CHECKPOINT 1:** WooCommerce template failid kopeeritud

---

## 🎨 SAMM 2: TOOTEKAARTIDE TAILWIND KUJUNDUS

### 2.1 content-product.php kohandamine
Asenda `woocommerce/content-product.php`:
```php
<?php
/**
 * Product Card Template with Tailwind CSS
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility
if (empty($product) || !$product->is_visible()) {
    return;
}
?>

<article <?php wc_product_class('group border border-gray-200 rounded-lg p-4 hover:shadow-lg hover:border-gray-300 transition-all duration-200 flex flex-col h-full', $product); ?> 
         aria-labelledby="product-<?php the_ID(); ?>-title">
    
    <div class="relative aspect-square overflow-hidden rounded-md mb-4">
        <a href="<?php the_permalink(); ?>" class="block h-full">
            <?php
            // Sale flash
            woocommerce_show_product_loop_sale_flash();
            
            // Product thumbnail
            echo woocommerce_get_product_thumbnail('medium');
            ?>
        </a>
    </div>
    
    <div class="flex flex-col flex-grow">
        <h3 id="product-<?php the_ID(); ?>-title" class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        
        <div class="mb-3 flex-grow">
            <?php woocommerce_template_loop_price(); ?>
        </div>
        
        <div class="mt-auto">
            <?php woocommerce_template_loop_add_to_cart(); ?>
        </div>
    </div>
</article>
```

### 2.2 Archive-product.php grid layout
Kohandada `woocommerce/archive-product.php` grid jaoks (lisa pärast product loop alustamist):
```php
<!-- Lisa see enne product loop -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
<!-- Lisa see pärast product loop -->
</div>
```

✅ **CHECKPOINT 2:** Tootekaardid kujundatud

---

## 🧹 SAMM 3: STYLE PUHASTAMINE

### 3.1 WooCommerce vaikestiilide keelamine
Lisa `functions.php`:
```php
/**
 * Disable WooCommerce default styles
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Remove unnecessary WooCommerce scripts
 */
function remove_woo_scripts() {
    if (!is_woocommerce() && !is_cart() && !is_checkout()) {
        wp_dequeue_script('wc-cart-fragments');
        wp_dequeue_script('woocommerce');
    }
}
add_action('wp_enqueue_scripts', 'remove_woo_scripts', 20);
```

### 3.2 Custom Tailwind WooCommerce styles
Lisa `resources/css/components/woocommerce.css`:
```css
/* WooCommerce Tailwind Components */
.woocommerce .button {
    @apply bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors;
}

.woocommerce .button.alt {
    @apply bg-green-600 hover:bg-green-700;
}

.woocommerce .price {
    @apply text-lg font-bold text-gray-900;
}

.woocommerce .price del {
    @apply text-sm text-gray-500 font-normal;
}

.woocommerce .onsale {
    @apply absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded;
}
```

Impordi app.css-sse:
```css
@import './components/woocommerce.css';
```

✅ **CHECKPOINT 3:** Stiilid puhastatud ja kohandatud

---

## 🔄 BUILD JA DEPLOY

### 3.1 Build uued stiilid
```bash
cd blankpage-tailpress-theme
npm run build
```

### 3.2 Deploy teema kaustas
```bash
./deploy.bat
```

### 3.3 Testida tulemus
1. **Ava:** http://localhost/wordpress/shop/
2. **Kontrolli:** Tootekaardid on grid layout
3. **Kontrolli:** Hover efektid töötavad
4. **Kontrolli:** Tailwind klassid rakenduvad

✅ **CHECKPOINT 4:** WooCommerce kujundus töötab

---

## 📝 JÄRGMINE OSA

Jätka ACF integreerimisega failis `03_WOOCOMMERCE_ACF_JUHEND_OSA2.md`
