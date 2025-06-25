# 🧩 WOOCOMMERCE + ACF JUHEND - OSA 2
**Advanced Custom Fields integreerimine WooCommerce-ga**

---

## 📋 EELTINGIMUS

✅ **OSA 1 peab olema täidetud** (03_WOOCOMMERCE_ACF_JUHEND_OSA1.md)

---

## 🚀 SAMM 4: ACF PLUGIN INSTALL

### 4.1 ACF Plugin install
```bash
# WordPress admin kaudu:
# 1. Ava: http://localhost/wordpress/wp-admin/
# 2. Plugins → Add New
# 3. Otsi: "Advanced Custom Fields"
# 4. Install and Activate

# VÕI WP-CLI kaudu:
cd "C:\xampp\htdocs\wordpress"
wp plugin install advanced-custom-fields --activate
```

### 4.2 ACF local JSON konfigureerimine
```bash
# Loo ACF JSON kaust teemas
cd "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme"
mkdir acf-json
```

### 4.3 ACF local JSON functions.php-s
Lisa `functions.php`:
```php
/**
 * ACF Local JSON - Save and Load from theme
 */
function acf_json_save_point($path) {
    return get_stylesheet_directory() . '/acf-json';
}
add_filter('acf/settings/save_json', 'acf_json_save_point');

function acf_json_load_point($paths) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}
add_filter('acf/settings/load_json', 'acf_json_load_point');
```

✅ **CHECKPOINT 5:** ACF installitud ja JSON konfigureeritud

---

## 📝 SAMM 5: TOOTE METAVÄLJAD

### 5.1 Product SEO field group loomine
WordPress admin → Custom Fields → Field Groups → Add New:

**Field Group Name:** Product SEO & Schema
**Location:** Show if → Post Type is equal to Product

### 5.2 Väljade lisamine:
1. **SEO Title**
   - Field Label: SEO Title
   - Field Name: seo_title
   - Field Type: Text
   - Instructions: Override default page title for SEO

2. **SEO Description**
   - Field Label: SEO Description  
   - Field Name: seo_description
   - Field Type: Textarea
   - Instructions: Meta description for search engines
   - Character Limit: 160

3. **Product Brand**
   - Field Label: Brand
   - Field Name: product_brand
   - Field Type: Text
   - Instructions: Product brand name for schema markup

4. **Product GTIN**
   - Field Label: GTIN/Barcode
   - Field Name: product_gtin
   - Field Type: Text
   - Instructions: Global Trade Item Number

### 5.3 Field group salvestamine
**Publish** → ACF-json fail peaks tekkima automaatselt

✅ **CHECKPOINT 6:** Product metaväljad loodud

---

## 🔍 SAMM 6: SEO META TAGS OUTPUTIMINE

### 6.1 SEO meta functions.php-s
Lisa `functions.php`:
```php
/**
 * Custom SEO meta tags for WooCommerce products
 */
function custom_product_seo_meta() {
    if (!is_product()) return;
    
    global $post;
    
    // Get ACF values
    $seo_title = get_field('seo_title', $post->ID);
    $seo_description = get_field('seo_description', $post->ID);
    
    // SEO Title
    if ($seo_title) {
        echo '<title>' . esc_html($seo_title) . '</title>' . "\n";
        // Remove default WordPress title
        add_filter('wp_title', '__return_empty_string', 999);
        add_filter('pre_get_document_title', '__return_empty_string', 999);
    }
    
    // SEO Description
    if ($seo_description) {
        echo '<meta name="description" content="' . esc_attr($seo_description) . '">' . "\n";
    }
}
add_action('wp_head', 'custom_product_seo_meta', 1);
```

### 6.2 JSON-LD Schema markup
Lisa `functions.php`:
```php
/**
 * Product JSON-LD Schema with ACF data
 */
function product_json_ld_schema() {
    if (!is_product()) return;
    
    global $post, $product;
    
    // Get ACF values
    $brand = get_field('product_brand', $post->ID);
    $gtin = get_field('product_gtin', $post->ID);
    
    // Build schema array
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        'name' => get_the_title(),
        'description' => wp_strip_all_tags(get_the_excerpt()),
        'url' => get_permalink(),
        'image' => wp_get_attachment_image_url(get_post_thumbnail_id(), 'large'),
        'offers' => array(
            '@type' => 'Offer',
            'price' => $product->get_price(),
            'priceCurrency' => get_woocommerce_currency(),
            'availability' => $product->is_in_stock() ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
            'url' => get_permalink()
        )
    );
    
    // Add brand if exists
    if ($brand) {
        $schema['brand'] = array(
            '@type' => 'Brand',
            'name' => $brand
        );
    }
    
    // Add GTIN if exists
    if ($gtin) {
        $schema['gtin'] = $gtin;
    }
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
}
add_action('wp_head', 'product_json_ld_schema');
```

✅ **CHECKPOINT 7:** SEO ja Schema markup töötab

---

## 🎨 SAMM 7: ACF VÄLJADE KUVAMINE FRONTENDIS

### 7.1 Single product template kohandamine
Kohandada `woocommerce/single-product.php` (lisa pärast toote nime):
```php
<?php
// Custom ACF fields display
$brand = get_field('product_brand');
$gtin = get_field('product_gtin');

if ($brand || $gtin): ?>
<div class="product-meta-custom bg-gray-50 p-4 rounded-lg mb-6">
    <h4 class="text-sm font-semibold text-gray-700 mb-2">Product Information</h4>
    
    <?php if ($brand): ?>
    <div class="flex items-center mb-1">
        <span class="text-sm text-gray-600 w-16">Brand:</span>
        <span class="text-sm font-medium"><?php echo esc_html($brand); ?></span>
    </div>
    <?php endif; ?>
    
    <?php if ($gtin): ?>
    <div class="flex items-center">
        <span class="text-sm text-gray-600 w-16">GTIN:</span>
        <span class="text-sm font-mono text-gray-800"><?php echo esc_html($gtin); ?></span>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>
```

### 7.2 Admin väljade stiilimine (valikuline)
Lisa ACF admin CSS `functions.php`:
```php
/**
 * ACF Admin styling
 */
function acf_admin_styles() {
    ?>
    <style>
    .acf-field[data-name="seo_title"] .acf-label label::after {
        content: " (SEO)";
        color: #0073aa;
        font-weight: normal;
    }
    .acf-field[data-name="product_gtin"] .acf-input input {
        font-family: monospace;
    }
    </style>
    <?php
}
add_action('admin_head', 'acf_admin_styles');
```

✅ **CHECKPOINT 8:** ACF väljad kuvatakse frontendis

---

## 🧪 SAMM 8: TESTIMINE JA DEPLOY

### 8.1 Build ja deploy
```bash
cd blankpage-tailpress-theme
npm run build
./deploy.bat
```

### 8.2 Detailne testimine

#### Test 1: ACF väljad adminis
1. **Ava:** http://localhost/wordpress/wp-admin/
2. **Products → All Products → Edit** (test toode)
3. **Kontrolli:** "Product SEO & Schema" väljad on nähtavad
4. **Lisa testdata:**
   - SEO Title: "Premium Test Product - Best Quality"
   - SEO Description: "High-quality test product with amazing features. Perfect for testing."
   - Brand: "TestBrand"
   - GTIN: "1234567890123"
5. **Update Product**

#### Test 2: JSON-LD schema
1. **Ava:** http://localhost/wordpress/product/test-product/
2. **View Page Source**
3. **Otsi:** `<script type="application/ld+json">`
4. **Kontrolli:** Schema sisaldab brand ja GTIN välja

#### Test 3: SEO meta tags
1. **Same toote leht**
2. **View Page Source**
3. **Kontrolli:** Custom title ja description meta tags

#### Test 4: Frontend kuvamine
1. **Kontrolli:** Brand ja GTIN info kuvatakse toote lehel
2. **Kontrolli:** Stiilimine on korrektne

✅ **CHECKPOINT 9:** Kõik testid mööduvad

---

## 🔧 TROUBLESHOOTING

### Probleem: ACF väljad ei ilmu
**Lahendus:** 
- Kontrolli field group location rules
- Veendu, et post type on "Product"

### Probleem: JSON fail ei teki
**Lahendus:**
```bash
# Anna kirjutamisõigused
icacls "acf-json" /grant %USERNAME%:F
```

### Probleem: Schema ei kuva
**Lahendus:**
- Kontrolli, kas WordPress head hook töötab
- Kasuta Google Rich Results Test

### Probleem: SEO meta ei override
**Lahendus:**
- Kontrolli wp_head priority (kasuta 1)
- Veendu, et SEO plugin pole aktiivne

---

## 🎯 LÕPPTULEMUS

✅ **WooCommerce templates** Tailwind CSS-ga  
✅ **ACF metaväljad** (SEO title, description, brand, GTIN)  
✅ **JSON-LD schema** structured data  
✅ **Custom SEO meta tags**  
✅ **Frontend kuvamine** stiilitud väljadega  
✅ **Local JSON** version control jaoks  

### 📦 Git backup
```bash
git add .
git commit -m "✅ WooCommerce + ACF integration complete"
git push origin main
```

## 🚀 JÄRGMINE SAMM

Kõik valmis arendamiseks! Järgmiseks võid:
- Lisada rohkem custom ACF field groups
- Implementida WooCommerce checkout kohandused  
- Lisada product filters ja search
- Integreerida muid e-commerce funktsioone

**EDUKAT ARENDAMIST!** 🎉
