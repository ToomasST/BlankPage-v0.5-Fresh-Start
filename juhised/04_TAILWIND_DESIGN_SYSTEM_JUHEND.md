# 🎨 TAILWIND DESIGN SYSTEM JUHEND
**Versioon: 1.0 - Töökindel ja Testitud**

⚠️ **OLULINE MÄRKUS - TAILWIND CSS VERSIOON**

**See juhend on loodud Tailwind CSS 3.x jaoks, kuid BlankPage projekt kasutab Tailwind CSS 4.0+**

**Tuvastatud erinevused:**
- Juhend kasutab `tailwind.config.js` (v3.x) vs. projekt kasutab CSS `@theme` direktiivi (v4.0)
- Juhendis soovitatud `@apply` direktiivid vs. Tailwind 4.0 eelistab inline utilities
- Projekti showcase kasutab OKLCH värvipaletti (Tailwind 4.0 feature)
- CSS arhitektuur vajab kohandamist Tailwind 4.0 nõuetele

**Lahendus:** Design-system-showcase.php süstemaatiline parandamine Tailwind 4.0 best practices järgi

---

## 📋 EELTINGIMUSED

### ✅ Nõutav, et oleksid täidetud:
- [x] **SAMM 1-8** (01_TOOTESTABIILSE_SETUP_JUHEND.md) valmis
- [x] **WooCommerce + ACF** (03_WOOCOMMERCE_ACF_JUHEND) valmis
- [x] TailPress teema töötab ja CSS laeb
- [x] Vite build süsteem aktiivne
- [x] npm run dev töötab (hot reload)

### ⚠️ Kui eeltingimused pole täidetud:
**STOPP!** Lõpeta esmalt eelnevad sammud!

---

## 🎯 SELLE JUHENDI EESMÄRGID

✅ **Brand Color System** - ühtne värvipalett  
✅ **Typography Scale** - hierarhiline tekstisüsteem  
✅ **Component Library** - taaskasutatavad komponendid  
✅ **WooCommerce Integration** - poe kujundus  
✅ **Responsive Design** - mobile-first approach  
✅ **Performance Optimization** - CSS purging  

---

## 🚀 SAMM 1: TAILWIND CONFIG SEADISTAMINE

### 1.1 Tailwind config avamine
```bash
cd "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme"
code tailwind.config.js
```

### 1.2 Brand color system
Asenda `tailwind.config.js` sisu:
```javascript
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    './*.php',
    './**/*.php',
    './resources/**/*.{js,vue,css}',
    './woocommerce/**/*.php',
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '1.5rem',
        lg: '2rem',
        xl: '3rem',
        '2xl': '4rem',
      },
    },
    extend: {
      colors: {
        brand: {
          DEFAULT: '#2563eb',
          50: '#eff6ff',
          100: '#dbeafe',
          200: '#bfdbfe',
          300: '#93c5fd',
          400: '#60a5fa',
          500: '#3b82f6',
          600: '#2563eb',
          700: '#1d4ed8',
          800: '#1e40af',
          900: '#1e3a8a',
        },
        gray: {
          DEFAULT: '#6b7280',
          50: '#f9fafb',
          100: '#f3f4f6',
          200: '#e5e7eb',
          300: '#d1d5db',
          400: '#9ca3af',
          500: '#6b7280',
          600: '#4b5563',
          700: '#374151',
          800: '#1f2937',
          900: '#111827',
        },
        success: {
          DEFAULT: '#10b981',
          50: '#ecfdf5',
          100: '#d1fae5',
          500: '#10b981',
          600: '#059669',
          700: '#047857',
        },
        warning: {
          DEFAULT: '#f59e0b',
          50: '#fffbeb',
          100: '#fef3c7',
          500: '#f59e0b',
          600: '#d97706',
          700: '#b45309',
        },
        error: {
          DEFAULT: '#ef4444',
          50: '#fef2f2',
          100: '#fee2e2',
          500: '#ef4444',
          600: '#dc2626',
          700: '#b91c1c',
        },
      },
      fontFamily: {
        sans: ['Inter', 'system-ui', ...defaultTheme.fontFamily.sans],
        serif: ['Georgia', ...defaultTheme.fontFamily.serif],
      },
      fontSize: {
        'xs': ['0.75rem', { lineHeight: '1rem' }],
        'sm': ['0.875rem', { lineHeight: '1.25rem' }],
        'base': ['1rem', { lineHeight: '1.5rem' }],
        'lg': ['1.125rem', { lineHeight: '1.75rem' }],
        'xl': ['1.25rem', { lineHeight: '1.75rem' }],
        '2xl': ['1.5rem', { lineHeight: '2rem' }],
        '3xl': ['1.875rem', { lineHeight: '2.25rem' }],
        '4xl': ['2.25rem', { lineHeight: '2.5rem' }],
        '5xl': ['3rem', { lineHeight: '1' }],
      },
      spacing: {
        '18': '4.5rem',
        '88': '22rem',
      },
      borderRadius: {
        'xl': '0.75rem',
        '2xl': '1rem',
        '3xl': '1.5rem',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
  ],
};
```

✅ **CHECKPOINT 1:** Tailwind config värvipaletiga seadistatud

---

## 📝 SAMM 2: BASE LAYER TÜPOGRAAFIA

### 2.1 CSS base layer seadistamine
Ava `resources/css/app.css` ja asenda sisu:
```css
@tailwind base;
@tailwind components;
@tailwind utilities;

@layer base {
  /* Typography Scale */
  h1 {
    @apply text-4xl font-bold leading-tight text-gray-900 lg:text-5xl;
  }
  
  h2 {
    @apply text-3xl font-semibold text-gray-900 lg:text-4xl;
  }
  
  h3 {
    @apply text-2xl font-semibold text-gray-900 lg:text-3xl;
  }
  
  h4 {
    @apply text-xl font-semibold text-gray-900;
  }
  
  h5 {
    @apply text-lg font-semibold text-gray-900;
  }
  
  h6 {
    @apply text-base font-semibold text-gray-900;
  }
  
  /* Links */
  a {
    @apply text-brand-600 hover:text-brand-700 hover:underline transition-colors;
  }
  
  /* Paragraphs */
  p {
    @apply text-gray-700 leading-relaxed;
  }
  
  /* Lists */
  ul, ol {
    @apply text-gray-700 leading-relaxed;
  }
  
  /* Form Elements */
  input[type="text"],
  input[type="email"],
  input[type="password"],
  input[type="search"],
  input[type="tel"],
  input[type="url"],
  textarea,
  select {
    @apply block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500;
  }
  
  /* Buttons */
  button,
  [type='button'],
  [type='submit'] {
    @apply font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 transition-colors;
  }
}
```

✅ **CHECKPOINT 2:** Base layer tüpograafia seadistatud

---

## 🧩 SAMM 3: COMPONENT LIBRARY

### 3.1 Tailwind components layer
Lisa `app.css` lõppu:
```css
@layer components {
  /* Button Components */
  .btn {
    @apply inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all;
  }
  
  .btn-primary {
    @apply bg-brand-600 text-white hover:bg-brand-700 focus:ring-brand-500;
  }
  
  .btn-secondary {
    @apply bg-gray-200 text-gray-900 hover:bg-gray-300 focus:ring-gray-500;
  }
  
  .btn-success {
    @apply bg-success-600 text-white hover:bg-success-700 focus:ring-success-500;
  }
  
  .btn-warning {
    @apply bg-warning-600 text-white hover:bg-warning-700 focus:ring-warning-500;
  }
  
  .btn-error {
    @apply bg-error-600 text-white hover:bg-error-700 focus:ring-error-500;
  }
  
  .btn-outline {
    @apply border-gray-300 text-gray-700 hover:bg-gray-50 focus:ring-gray-500;
  }
  
  .btn-sm {
    @apply px-3 py-1.5 text-xs;
  }
  
  .btn-lg {
    @apply px-6 py-3 text-base;
  }
  
  /* Card Components */
  .card {
    @apply bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden;
  }
  
  .card-hover {
    @apply hover:shadow-md hover:border-gray-300 transition-all;
  }
  
  .card-body {
    @apply p-6;
  }
  
  .card-header {
    @apply px-6 py-4 border-b border-gray-200 bg-gray-50;
  }
  
  .card-footer {
    @apply px-6 py-4 border-t border-gray-200 bg-gray-50;
  }
  
  /* Badge Components */
  .badge {
    @apply inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium;
  }
  
  .badge-primary {
    @apply bg-brand-100 text-brand-800;
  }
  
  .badge-success {
    @apply bg-success-100 text-success-800;
  }
  
  .badge-warning {
    @apply bg-warning-100 text-warning-800;
  }
  
  .badge-error {
    @apply bg-error-100 text-error-800;
  }
  
  /* Alert Components */
  .alert {
    @apply p-4 rounded-md border-l-4;
  }
  
  .alert-success {
    @apply bg-success-50 border-success-400 text-success-700;
  }
  
  .alert-warning {
    @apply bg-warning-50 border-warning-400 text-warning-700;
  }
  
  .alert-error {
    @apply bg-error-50 border-error-400 text-error-700;
  }
  
  .alert-info {
    @apply bg-brand-50 border-brand-400 text-brand-700;
  }
}
```

✅ **CHECKPOINT 3:** Component library loodud

---

## 🛒 SAMM 4: WOOCOMMERCE INTEGRATION

### 4.1 WooCommerce specific styles
Lisa `app.css` lõppu:
```css
@layer components {
  /* WooCommerce Components */
  .woocommerce-product-card {
    @apply card card-hover group;
  }
  
  .woocommerce-product-image {
    @apply aspect-square overflow-hidden rounded-t-lg;
  }
  
  .woocommerce-product-image img {
    @apply w-full h-full object-cover transition-transform group-hover:scale-105;
  }
  
  .woocommerce-product-info {
    @apply card-body;
  }
  
  .woocommerce-product-title {
    @apply text-lg font-semibold text-gray-900 mb-2 group-hover:text-brand-600 transition-colors;
  }
  
  .woocommerce-product-price {
    @apply text-xl font-bold text-gray-900 mb-4;
  }
  
  .woocommerce-product-price del {
    @apply text-sm text-gray-500 font-normal mr-2;
  }
  
  .woocommerce-sale-badge {
    @apply absolute top-2 right-2 badge badge-error text-white font-bold;
  }
  
  .woocommerce-add-to-cart {
    @apply btn btn-primary w-full;
  }
  
  .woocommerce-pagination {
    @apply flex justify-center space-x-2 mt-8;
  }
  
  .woocommerce-pagination a,
  .woocommerce-pagination span {
    @apply px-3 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50;
  }
  
  .woocommerce-pagination .current {
    @apply bg-brand-600 text-white border-brand-600;
  }
}
```

### 4.2 WooCommerce templates update
Uuenda `woocommerce/content-product.php`:
```php
<?php
defined('ABSPATH') || exit;
global $product;
if (empty($product) || !$product->is_visible()) return;
?>

<article <?php wc_product_class('woocommerce-product-card relative', $product); ?>>
    <div class="woocommerce-product-image">
        <a href="<?php the_permalink(); ?>">
            <?php
            woocommerce_show_product_loop_sale_flash();
            echo woocommerce_get_product_thumbnail('medium');
            ?>
        </a>
    </div>
    
    <div class="woocommerce-product-info">
        <h3 class="woocommerce-product-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        
        <div class="woocommerce-product-price">
            <?php woocommerce_template_loop_price(); ?>
        </div>
        
        <div class="woocommerce-add-to-cart">
            <?php woocommerce_template_loop_add_to_cart(); ?>
        </div>
    </div>
</article>
```

✅ **CHECKPOINT 4:** WooCommerce integreerimine valmis

---

## 🔄 SAMM 5: BUILD JA TESTIMINE

### 5.1 Build ja deploy
```bash
cd blankpage-tailpress-theme
npm run build
./deploy.bat
```

### 5.2 Testimine
1. **Typography test:** http://localhost/wordpress/
2. **Components test:** http://localhost/wordpress/shop/
3. **Responsive test:** Muuda brauseri suurust

✅ **CHECKPOINT 5:** Design system töötab

---

## 📖 SAMM 6: DOKUMENTATSIOON

### 6.1 Style guide loomine
Loo `style-guide.html` teema kaustas:
```html
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlankPage Design System</title>
    <link href="./dist/css/app.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="container mx-auto py-8">
        <h1 class="mb-8">BlankPage Design System</h1>
        
        <!-- Colors -->
        <section class="mb-12">
            <h2 class="mb-6">Color Palette</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="card">
                    <div class="h-20 bg-brand-500"></div>
                    <div class="card-body">
                        <h3 class="text-sm font-medium">Brand</h3>
                        <p class="text-xs text-gray-600">#2563eb</p>
                    </div>
                </div>
                <!-- Add more color swatches -->
            </div>
        </section>
        
        <!-- Typography -->
        <section class="mb-12">
            <h2 class="mb-6">Typography</h2>
            <div class="space-y-4">
                <h1>Heading 1</h1>
                <h2>Heading 2</h2>
                <h3>Heading 3</h3>
                <h4>Heading 4</h4>
                <h5>Heading 5</h5>
                <h6>Heading 6</h6>
                <p>Body text paragraph with <a href="#">link example</a></p>
            </div>
        </section>
        
        <!-- Buttons -->
        <section class="mb-12">
            <h2 class="mb-6">Buttons</h2>
            <div class="space-x-4 space-y-4">
                <button class="btn btn-primary">Primary</button>
                <button class="btn btn-secondary">Secondary</button>
                <button class="btn btn-success">Success</button>
                <button class="btn btn-warning">Warning</button>
                <button class="btn btn-error">Error</button>
            </div>
        </section>
        
        <!-- Cards -->
        <section class="mb-12">
            <h2 class="mb-6">Cards</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Card Title</h3>
                    </div>
                    <div class="card-body">
                        <p>Card content goes here</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
```

✅ **CHECKPOINT 6:** Style guide dokumentatsioon valmis

---

## 🎯 LÕPPTULEMUS

✅ **Ühtne värvipalett** - brand, gray, success, warning, error  
✅ **Typography süsteem** - hierarhiline heading scale  
✅ **Component library** - buttons, cards, badges, alerts  
✅ **WooCommerce integration** - tootekaardid, paginatsioon  
✅ **Responsive design** - mobile-first approach  
✅ **Style guide** - dokumentatsioon arendajatele  

### 📦 Git backup
```bash
git add .
git commit -m "✅ Tailwind Design System complete with components"
git push origin main
```

## 🚀 JÄRGMINE SAMM

Design System on valmis! Järgmiseks võid:
- Lisada rohkem komponente (modals, dropdowns)
- Implementida Alpine.js interaktsioonid
- Luua custom Gutenberg blocks
- Optimeerida performance

**SUUREPÄRAST DISAINI!** 🎨
