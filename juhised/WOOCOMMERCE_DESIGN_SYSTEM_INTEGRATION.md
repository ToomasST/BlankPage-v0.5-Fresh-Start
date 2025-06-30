# WooCommerce Design System Integration Guide

## 🎯 Overview
This guide documents the complete integration of Tailwind CSS 4.0 design system with WooCommerce, focusing on the Product Card component implementation.

## 📦 Product Card Component

### Template Structure
```php
// File: woocommerce/content-product.php
<article <?php wc_product_class('product-card', $product); ?>>
    <!-- Product Image with badges -->
    <!-- Product Content -->
    <!-- Product Actions -->
</article>
```

### Key Features Implemented

#### 🏷️ Dynamic Sale Badge
- Automatic percentage calculation: `round((($regular_price - $sale_price) / $regular_price) * 100)`
- Displays format: "-25%" instead of generic "Soodustus"
- Positioned absolutely over product image

#### 🛒 Two-Button Action System
1. **Add to Cart Button**
   - Shopping cart icon (stroke-width: 1)
   - Text: "Lisa korvi"
   - Links to WooCommerce cart with product ID
   
2. **View Product Button**
   - Continue arrow icon (stroke-width: 1)
   - Text: "Vaata toodet"
   - Links to product permalink

#### 📱 Responsive Design
- Mobile-first approach
- Compact variants hide button text
- Icon-only display on smaller screens
- Flexible card height with `height: 100%`

#### 🎨 Visual Effects
- Hover effects on dividers (gray → brand-400)
- No transitions on images/buttons (per UX requirements)
- Protective padding on dividers (prevent disappearing lines)
- Bottom-aligned action buttons

## 🔧 CSS Implementation

### Component Classes
```css
@layer components {
  .product-card {
    background-color: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    display: flex;
    flex-direction: column;
    height: 100%;
  }
  
  .product-card__actions {
    margin-top: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    border-top: 1px solid var(--color-gray-200);
    transition: border-color 150ms cubic-bezier(0.4, 0, 0.2, 1);
  }
  
  .product-card:hover .product-card__actions {
    border-top-color: var(--color-brand-400);
  }
}
```

### Icon System
- **Size**: 1.5rem (xl)
- **Stroke Width**: 1px (consistent across all icons) 
- **Colors**: Inherit from parent text color
- **Hover**: No individual icon transitions

## 📋 Integration Checklist

### ✅ Completed Tasks
- [x] Replace default WooCommerce product card template
- [x] Implement design system classes and styling
- [x] Add dynamic sale badge with percentage calculation
- [x] Create two-button action row with icons
- [x] Integrate WooCommerce hooks and functions
- [x] Add out-of-stock overlay and disabled states
- [x] Implement responsive design with mobile variants
- [x] Add Estonian localization support
- [x] Create design system showcase documentation
- [x] Fix hover effects and divider stability
- [x] Ensure semantic HTML structure
- [x] Test with real WordPress product data

### 🔄 Next Components (Planned)
- [ ] Product Grid Layout
- [ ] Cart Item Component
- [ ] Quantity Selector
- [ ] Product Filter System
- [ ] Breadcrumb Navigation
- [ ] Pagination Component

## 🛠️ Development Workflow

### File Locations
```
blankpage-tailpress-theme/
├── woocommerce/
│   └── content-product.php          # Custom product card template
├── resources/css/
│   └── app.css                      # Design system components
├── design-system-showcase.php       # Component documentation
└── functions.php                    # WooCommerce customizations
```

### Build Process
```bash
# Development with file watching
npm run watch

# Production build
npm run build

# Deploy to WordPress
.\deploy.bat
```

### Testing URLs
- **Shop Page**: `http://localhost/wordpress/pood/`
- **Design System**: `http://localhost/wordpress/design-system-showcase/`
- **Single Product**: `http://localhost/wordpress/toode/[product-slug]/`

## 📊 Performance Considerations

### CSS Optimization
- Component-based CSS structure
- Minimal JavaScript requirements
- Tailwind CSS 4.0 purging for production
- OKLCH color space for modern browsers

### WooCommerce Integration
- Native WooCommerce hooks (no plugin dependencies)
- Lightweight template overrides
- Semantic HTML for SEO optimization
- Estonian language optimization

## 🔍 Debugging Guide

### Common Issues
1. **Missing Vertical Divider**: Check `.product-card__action-divider` CSS
2. **Button Alignment**: Verify `margin-top: auto` on actions container
3. **Hover Effects**: Ensure proper CSS selectors for `.product-card:hover`
4. **Icon Consistency**: Verify `stroke-width="1"` on all SVG icons

### Browser Testing
- Chrome/Edge: Full CSS 4.0 support
- Firefox: OKLCH color fallbacks may be needed
- Safari: Container query support varies
- Mobile: Touch interaction testing required

## 📝 Documentation Standards

### Code Comments
```php
<?php
// WooCommerce Product Card - Design System Integration
// Implements custom product display with Tailwind CSS 4.0 components
?>
```

### CSS Organization
```css
/* Product Card Component */
/* Implements design system card layout with WooCommerce integration */
@layer components {
  /* Base card structure */
  .product-card { }
  
  /* Card sections */
  .product-card__image { }
  .product-card__content { }
  .product-card__actions { }
}
```

This integration serves as the foundation for expanding the design system across all WooCommerce components, ensuring consistent visual design and user experience throughout the e-commerce functionality.
