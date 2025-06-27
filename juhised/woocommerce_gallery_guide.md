# WooCommerce’i tootegalerii – **täpne rakendusjuhend** (Tailwind CSS v3)

💡 *Eesmärk:* ehitada ruudukujulise põhipildiga, keritavate pisipiltidega ja WooCommerce’i sisseehitatud PhotoSwipe‑lightboxiga galerii, mis töötab 100 % mobiilis ja desktopis.

---

## 1 · Aktiveeri galeriiskriptid teema `functions.php`‑is

```php
add_action( 'after_setup_theme', function () {
    // Woo 3.0+ sisseehitatud tugi
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
});
```

> Ilma nendeta **ei laeta** `photoswipe`, `flexslider` ega `zoom` JS‑i – lightbox ja thumb‑→ main‑switch **ei tööta**.

### 1.1 Eemalda Woo default layout (soovi korral)

```php
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
add_action( 'woocommerce_before_single_product_summary', 'mytheme_product_gallery', 20 );
```

---

## 2 · Kohandatud galerii markup (PHP + Tailwind)

```php
function mytheme_product_gallery() {
  global $product;
  $main_id      = $product->get_image_id();
  $gallery_ids  = $product->get_gallery_image_ids();
  array_unshift( $gallery_ids, $main_id ); // pane põhifoto esimeseks
?>
<div
  x-data="{ active: 0, images: <?php echo wp_json_encode( array_map( 'wp_get_attachment_url', $gallery_ids ) ); ?> }"
  class="flex flex-col md:flex-row gap-4"
>
  <!-- THUMBS -->
  <div class="flex md:flex-col gap-2 md:overflow-y-auto overflow-x-auto md:h-full flex-shrink-0 w-full md:w-24 scrollbar-hide">
    <?php foreach ( $gallery_ids as $index => $id ) :
      // WooCommerce'i utiliit säilitab data‑atribuidid (thumb, full, srcset)
      echo wc_get_gallery_image_html( $id, true );
    endforeach; ?>
  </div>

  <!-- MAIN IMAGE (1 : 1) -->
  <div class="relative flex-1 aspect-square">
    <a
      :href="images[active]"                      
      data-fancybox="gallery"                   
      class="block w-full h-full woocommerce-product-gallery__image"
    >
      <img
        :src="images[active]"
        :alt="$el.nextElementSibling?.alt || 'Product image'"
        class="w-full h-full object-contain"
      >

      <!-- Zoom/Lightbox‑trigger -->
      <span class="absolute top-2 right-2 p-1 bg-white/80 rounded-full shadow cursor-zoom-in">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m2.35-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </span>
    </a>
  </div>
</div>
<?php } ?>
```

### Miks `wc_get_gallery_image_html()`?

- Lisab ``** lingi** (täissuur pilt), `data-thumb`, `data-large_image`, `data-rel` jm → Woo JS oskab lightboxi käivitada.
- Tagab responsiivsed `srcset`‑id / `loading="lazy"`.

---

## 3 · Thumbnail → põhifoto vahetus (Alpine .js 3)

WooCommerce’i enda skript teeb seda klassi *`woocommerce-product-gallery__image`* järgi. Kuna kirjutasime oma markup’i, juhime aktiivset pilti Alpine’iga.

```html
<!-- thumbi HTML‑is -->
<button
  @click="active = <?php echo $index; ?>"
  :class="{'ring-2 ring-primary': active === <?php echo $index; ?> }"
  class="aspect-square w-24 md:w-full flex-shrink-0 rounded overflow-hidden focus:outline-none"
>
  <img src="<?php echo wp_get_attachment_image_url( $id, 'woocommerce_thumbnail' ); ?>" class="w-full h-full object-cover" />
</button>
```

---

## 4 · Tailwind utiliidid ja pluginad

| Tarve                            | Utiliidid / plugin                   |
| -------------------------------- | ------------------------------------ |
| Ruudusuhtega konteiner           | `aspect-square` (built‑in v3)        |
| Pildi paigutus kasti             | `object-contain` (`object-cover`)    |
| Flex – mobiil veerg / desk rida  | `flex flex-col md:flex-row`          |
| Scroll vert (desk) / horiz (mob) | `md:overflow-y-auto overflow-x-auto` |
| Thumbide mõõdud                  | `w-24 md:w-full aspect-square`       |
| Peidetud kerimisriba (ilus UI)   | `` plugin                            |
| Aktiivne thumb highlight         | `ring-2 ring-primary/60`             |

#### 4.1 Pluginid paika

```bash
npm i -D tailwind-scrollbar-hide
```

`tailwind.config.js`:

```js
module.exports = {
  plugins: [
    require('tailwind-scrollbar-hide')
  ],
}
```

---

## 5 · Accessibility + UX

1. **Keyboard‑nav:** `tabindex="0"` pisipiltidel → Space/Enter peaks vahetama pildi (lisa `@keyup.enter`).
2. **SR‑tekstid:** Lisa `aria-label="Open image gallery"` zoom‑ikoonile.
3. **Lazy‑loading:** WooCommerce lisab `loading="lazy"`; ruudu “skeleton” võid teha `bg-neutral-100 animate-pulse` klassidega.
4. **Focus‑rõngad:** Tailwind `focus-visible:ring` hoiab WCAG 2.1‐AA.

---

## 6 · Testi kontrollnimekiri

-

---

## 7 · Kasulikud Woo hook’id ja filtrid

| Hook / filter                                     | Mida teeb                             |
| ------------------------------------------------- | ------------------------------------- |
| `woocommerce_before_single_product_summary`       | Standard galerii; siia riputasime oma |
| `woocommerce_single_product_image_thumbnail_html` | Muuda thumbi HTML ühekaupa            |
| `woocommerce_product_get_image`                   | Põhifoto fallback, suuruse muutmine   |

---

## 8 · Viited ja taustmaterjal

- **WooCommerce Docs:** *Product gallery, zoom & lightbox* (Photoswipe / Flexslider)
- **Tailwind CSS 3.4:** `aspect-ratio`, `scrollbar-hide`, `object-fit`, `flex` utiliidid
- **Alpine.js 3:** väike reaktiivne JS raamatukogu `<6 kB` gzip

> **Valmis!** Kopeeri kood, kompileeri Tailwind, veendu et `wc-product-gallery*.js` laaditakse, ja sul on nutiseadmetele optimeeritud galerii, mis näeb välja tipptasemel.

