# 🎯 BlankPage v0.5 Windsurf - Project Overview

## 🎯 PÕHIEESMÄRGID JA ARHITEKTUURI NÕUDED

### 1. Kerge ja pluginavaba struktuur
- **Eesmärk:** Vältida liigseid pluginaid ja visuaalseid leheehitajaid (nt Elementor)
- **Põhjendus:** Leheehitajad ja kümned pluginad võivad drastiliselt aeglustada WooCommerce saiti
- **Lahendus:** Koodipõhine funktsioonide arendamine TailPress baasil
- **Staatus:** ✅ TailPress framework valitud, koodipõhine arendus, WooCommerce täielikult custom template'idega

### 2. Core Web Vitals 100/100
- **Eesmärk:** Perfektne PageSpeed Insights skoor nii mobiilis kui desktopis
- **Kriteeriumid:**
  - Kiire esmajoonistus (Largest Contentful Paint)
  - Minimaalne hüplemine (Cumulative Layout Shift)  
  - Kiire interaktiivsus (First Input Delay/Total Blocking Time)
- **Meetmed:** Caching, ressursside optimeerimine, JavaScript/CSS optimeerimine
- **Staatus:** 🔄 Arenduses - WooCommerce CSS konfliktid lahendatud, performance optimeerimine planeeritud

### 3. Semantiline ja ligipääsetav HTML
- **Nõuded:** HTML5 semantilised elemendid (`<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<aside>`, `<footer>`)
- **Ligipääsetavus:** 
  - ARIA-rollid vajadusel
  - Alt-tekstid kõigil piltidel
  - Heading'id hierarhia järjekorras (H1 → H2 → H3)
- **Eesmärk:** SEO ja ligipääsetavuse tagamine
- **Staatus:** ✅ WooCommerce product card'id implementeeritud semantilise HTML-iga ja SVG ikoonidega

### 4. AI/SEO sõbralik struktuur
- **Eesmärk:** Struktureeritud ja puhas HTML AI-tööriistadele ja SEO-crawler'itele
- **Kriteeriumid:**
  - Semantiline markup
  - Schema.org mikroandmed
  - Puhas URL-struktuuur
  - Optimeeritud meta-andmed
- **Staatus:** 📋 Planeeritud - SEO foundation järgmises sprindis

### 5. Mitmekeelne tugi
- **Nõuded:** 
  - Kõik tekstid `__()` või `_e()` funktsioonide kaudu
  - Eesti keele tugi (prioriteet)
  - Inglise keele tugi (default)
- **Staatus:** ✅ Eesti keele tugi implementeeritud WooCommerce elementides

## ⚠️ KRIITILINE PROJEKTI FILOSOOFIA

### **ALATI TAILWIND CSS FIRST + ALPINE.JS FIRST**

**See on projekti põhiline arhitektuuriline nõue ja kohustuslik lähenemine:**

#### 🎯 Implementeerimise hierarhia:
1. **✅ ESMALT: Tailwind CSS utilities** - Kõik layout, spacing, colors, typography
2. **✅ TEISEKS: Alpine.js direktiivid** - Kõik interaktiivsus ja dünaamiline käitumine  
3. **❌ VIIMANE VÕIMALUS: Custom CSS/JS** - Ainult kui Tailwind/Alpine ei kata vajadust

#### 📋 Praktiline rakendamine:
- **Layout:** `flex`, `grid`, `space-x-4` mitte custom CSS
- **Spacing:** `p-4`, `mb-6`, `gap-2` mitte custom margins/paddings
- **Colors:** `bg-blue-500`, `text-gray-900` mitte custom color values
- **Typography:** `text-lg`, `font-bold` mitte custom font rules
- **Transitions:** `transition-all`, `hover:scale-105` mitte custom animations
- **Interactivity:** `x-show`, `x-on:click` mitte custom JavaScript

#### 🚫 Keelatud praktikad:
- Custom CSS utilities'te jaoks, mida Tailwind juba pakub
- Custom JavaScript Alpine.js'i asemel
- Tailwind süntaksi "äraarvamine" - alati uuri dokumentatsiooni

#### 📚 Ressursid süntaksi uurimiseks:
- `juhised/TAILWIND_CSS_4.0_BEST_PRACTICES.md`
- https://tailwindcss.com/docs
- https://alpinejs.dev/start-here

---

## 🚀 Project Status (v0.5.8 - July 2025)

### ⭐ LATEST MAJOR ACHIEVEMENT: WooCommerce Design System Integration ✅
**Successfully integrated Tailwind CSS 4.0 design system with WooCommerce, replacing all default product cards with custom-designed components**

#### 🔥 WooCommerce Product Card Integration (v0.5.8 - July 1, 2025)
- **Complete Template Override:** Custom `woocommerce/content-product.php` template with design system styling
- **Advanced Action Row:** Two-button system with "Lisa korvi" and "Vaata toodet" actions
- **Dynamic Pricing Display:** Sale price handling with percentage discount badges
- **Smart Stock Management:** Out-of-stock overlays and disabled states
- **Icon System Integration:** SVG icons with consistent stroke width (1px) and hover effects
- **Responsive Design:** Mobile-first approach with card layout optimization
- **Estonian Localization:** Full Estonian language support in product templates
- **Design System Showcase:** Living component library at `/design-system-showcase.php`

#### 🎨 Previous Achievement: Smart Consolidation System (v0.5.7 - June 30, 2025)
- **Smart Consolidation Detection:** Automatically detects when WordPress and WooCommerce image sizes share identical dimensions
- **Accurate File Count Display:** Shows both active size count (6) and actual generated file count (4) considering consolidation
- **Real Savings Calculation:** Percentage reflects actual disk space saved from disabled sizes + smart file sharing
- **Unified Display Logic:** All UI elements use consistent dimension format (`180xauto` for uncropped, `180x180` for cropped)
- **Dynamic Statistics:** Updated summary cards show "Genereerituid faile" reflecting true file system state
- **Enhanced Active Sizes Block:** Displays real dimensions matching admin table logic
- **Production-Ready Interface:** Removed all debug output for clean professional UI

#### 🏧 ARCHITECTURAL DECISION: Programmatic Custom Fields (v0.5.7 - June 30, 2025)
**STRATEGIC CHOICE: Native WordPress Custom Fields instead of ACF Plugin**

- **Decision Rationale:** Performance, security, and integration benefits over ACF plugin approach
- **Implementation:** Uses native WordPress `meta_box` API and `wp_postmeta` for all custom field requirements
- **Performance Gain:** ~200KB reduction by avoiding ACF plugin overhead
- **Security Advantage:** Full control, no third-party dependencies, avoids ACF/WordPress.org conflicts
- **Integration Benefit:** Perfect fit with TailPress theme architecture and Tailwind CSS styling
- **Scope Fit:** Optimal for small custom field requirements (SEO title, description, meta data)
- **Maintenance:** Zero plugin dependencies, no update conflicts, version control friendly

**JUHISED ADAPTATION RULE:** All guide steps mentioning ACF are implemented programmatically:
- `ACF plugin install` → `add_meta_box()` API
- `ACF field groups` → Custom meta boxes with Tailwind CSS styling
- `get_field()` → `get_post_meta()` with custom validation
- `ACF JSON export` → Version control in functions.php

#### 🧠 Smart Consolidation Logic
- **Cropped Size Matching:** Exact width AND height must match for consolidation
- **Uncropped Size Matching:** Only width needs to match (height is 'auto' and varies)
- **Mixed Crop Matching:** Width-based comparison for different crop settings
- **Real-Time Updates:** All calculations based on actual WordPress/WooCommerce settings
- **Performance Optimized:** Reuses table dimension data for consolidation calculations

#### 🛠️ Previous Admin Tool Features (v0.5.7 - June 28, 2025)
- **Smart Image Size Control:** Custom WordPress admin interface "BlankPage töölaud" in main admin menu
- **Complete Image Management:** Toggle controls for ALL image sizes including WordPress auto-generated (1536x1536, 2048x2048)
- **Proper Table Layout:** HTML table structure with headers, aligned columns, and intuitive checkbox positioning
- **Storage Optimization:** Automatic calculation of space savings (up to 57% storage reduction)
- **Professional UI:** Minimal business dashboard design with Estonian localization
- **CSS Architecture:** Separated stylesheets loaded via wp_enqueue_style (no inline CSS)
- **WooCommerce Integration:** Shows actual dimensions and crop settings from real admin settings
- **Critical Bug Fixes:** Removed hardcoded size removal - admin checkboxes now properly control ALL image generation
- **Security Features:** Proper nonce verification, capability checks, input sanitization
- **WordPress Best Practices:** Complete audit and compliance with official coding standards

### 🎯 PREVIOUS ACHIEVEMENT: Modern Gallery UX & Responsive Enhancements ✅
**Successfully upgraded the WooCommerce product gallery with professional transitions, smooth scrolling, and enhanced user experience across all devices**

#### 🔥 Latest Gallery Improvements (v0.5.6 - June 27, 2025)

**Modern Image Transition System:**
- **Fade + Scale Effect**: Professional image switching with smooth container transitions
- **Timing Perfection**: 500ms ease-out transitions with 150ms delay for natural feel
- **Load State Management**: Reactive Alpine.js state (`imageLoaded`) for seamless switching
- **Container-Based Transitions**: Entire gallery element transitions (background + border + image)

**Advanced Scroll System:**
- **Desktop Mouse Wheel Support**: Horizontal scrolling with mouse wheel for thumbnails
- **Smooth Physics**: Reduced scroll increment (`deltaY * 0.5`) for fluid experience  
- **Smart Event Handling**: Conditional preventDefault - horizontal on mobile, vertical on desktop
- **Cross-Device Compatibility**: Native touch scroll + responsive gradient fades

**Responsive & UX Improvements:**
- **Mobile Container Padding**: Optimized spacing `p-4 lg:p-8` for better mobile experience
- **Interactive Cursors**: `cursor-pointer` on all clickable elements (thumbnails, buttons, links)
- **Framework Compliance**: Verified compatibility with Tailwind CSS v4.0 Beta and Alpine.js latest

#### 🏆 Previous Major Achievement: WooCommerce Product Gallery + Progressive Fade Gradients Complete ✅
**Successfully implemented a fully functional WooCommerce product gallery with Alpine.js, Fancybox lightbox, AND progressive fade scroll indicators**

#### 🔥 Critical Gallery Implementation Details
- **Problem:** Previous gallery was documented as "fixed" but was completely non-functional
- **Solution:** Custom implementation with Alpine.js + Fancybox v5 + Progressive fade gradients
- **Architecture:** 
  - **Alpine.js (CDN):** Reactive thumbnail switching and gallery state management
  - **Fancybox v5 (CDN):** Professional lightbox with full gallery navigation
  - **Custom PHP markup:** Clean integration with WooCommerce product data
  - **JSON encoding fix:** Safe HTML attribute embedding for Alpine.js
  - **Progressive gradients:** Dynamic scroll indicators with 80px fade zones
- **Key Technical Breakthrough:** Hidden gallery links for Fancybox navigation support

#### ✅ Gallery Features Implemented
- **Responsive Layout:** 75% main image + 25% vertical thumbnails (desktop), horizontal thumbnails (mobile)
- **Interactive Thumbnails:** Click to switch main image with Alpine.js reactivity
- **Professional Lightbox:** Fancybox with zoom, slideshow, keyboard navigation, download
- **Gallery Navigation:** Full next/prev support in lightbox with all product images
- **Progressive Fade Gradients:** 80px fade zones indicating scrollable content above/below
- **Hidden Scrollbars:** Clean UI with `scrollbar-hide` utility
- **Modern UI:** Fullscreen expand icon, smooth transitions, proper spacing
- **Mobile Optimized:** Touch-friendly with scrollable thumbnail strip

#### 🎨 Progressive Fade Gradient System (v0.5.5)
**Advanced UX feature: Dynamic gradients that appear/disappear based on scroll proximity**

**Technical Implementation:**
- **80px fade zones:** Progressive opacity 0.0 → 1.0 over 80 pixels of scroll distance
- **Real-time calculations:** `Math.min(scrollTop / 80, 1)` for immediate response
- **Object style binding:** Alpine.js best practice `{ opacity: value }`
- **No throttling:** Immediate scroll response for smooth UX (throttle caused laggy gradients)

**Gradient Behavior:**
- **Top gradient:** Appears when scrolled down from top, fades based on distance
- **Bottom gradient:** Appears when content below, disappears when at bottom
- **Smart initialization:** Gradients only appear when container is actually scrollable

#### 🚨 CRITICAL Alpine.js Throttle Issue Resolved
**Major Discovery:** Alpine.js `@scroll.throttle` breaks progressive fade UX

**Problem Identified:**
- Alpine.js throttle uses "leading edge" - only fires on FIRST scroll event
- 250ms gaps between events caused choppy, unresponsive gradients
- Progressive fade requires every pixel to be smooth

**Solution Applied:**
- **Removed throttle:** Use `@scroll` instead of `@scroll.throttle`
- **Lightweight calculations:** Simple math operations handle unthrottled events efficiently
- **Modern browser performance:** Can handle real-time scroll events without issues
- **UX priority:** Smooth progressive fade more important than micro-optimizations

#### 🚨 CRITICAL DEVELOPMENT NOTE
**DO NOT MODIFY THE GALLERY IMPLEMENTATION** - This solution took 2 days of intensive troubleshooting to achieve. The Alpine.js + Fancybox integration is delicate and any changes risk breaking functionality.

**DO NOT ADD THROTTLE BACK** - Progressive fade requires immediate scroll response for smooth UX.

**Files Modified:**
- `header.php`: Alpine.js and Fancybox CDN links
- `single-product.php`: Complete gallery markup with progressive fade implementation
- `functions.php`: WooCommerce gallery theme support
- `utilities.css`: Tailwind scrollbar-hide utility
- `troubleshoot.md`: Detailed documentation of throttle issue and resolution

### Previous Achievement: Complete Product Card Redesign ✅
**Successfully completed comprehensive WooCommerce product card redesign inspired by modern e-commerce layouts**

#### Key Visual Improvements
- **Modern sale badge**: Clean black "-45%" style (removed "OFF" text)
- **Enhanced product images**: Upgraded from small thumbnails to medium-size images with perfect 1:1 aspect ratio
- **Optimized grid layout**: Reduced from 4 columns to 3 columns max for wider, more spacious cards
- **Perfect layout hierarchy**: Product name → Price+Rating → Categories → Action buttons

#### Smart Features Implemented
- **Interactive categories**: Clickable category badges with smooth hover effects that link to category pages
- **Intelligent price display**: Sale prices shown prominently in green, regular prices small and gray above
- **Maintained functionality**: All WooCommerce AJAX add-to-cart functionality preserved
- **Estonian formatting**: Proper number formatting (54,00 €) throughout

### Technical Architecture
- **WordPress:** 6.8.1 + Latest security updates
- **WooCommerce:** 9.9.5 + Custom templates + Native gallery integration
- **Theme Framework:** TailPress (modern WordPress development)
- **CSS Framework:** Tailwind CSS v4.0 + Oxide Engine + CSS-First Configuration
- **Build System:** Vite 6.3.3 + @tailwindcss/vite plugin (612ms build time)
- **Version Control:** Git + GitHub repository

### 🚀 TAILWIND CSS 4.0 REQUIREMENTS (MANDATORY)
**All new design work must follow Tailwind CSS 4.0 best practices:**
- ✅ **CSS-First Configuration:** Use `@theme` directive instead of `tailwind.config.js`
- ✅ **Vite Plugin:** Use `@tailwindcss/vite` for optimal performance
- ✅ **Modern CSS Features:** Leverage cascade layers, OKLCH colors, container queries
- ✅ **Dynamic Utilities:** Use built-in dynamic grid-cols-*, data-*, spacing utilities
- ✅ **No Legacy Syntax:** Avoid `text-opacity-*`, use `text-black/50` instead
- ✅ **Performance First:** Utilize automatic content detection and CSS variables

**📋 Required Reading:** `juhised/TAILWIND_CSS_4.0_BEST_PRACTICES.md`

### 🚨 CSS ORGANIZATION & DRY PRINCIPLE (CRITICAL)
**⚠️ MANDATORY: Prevent CSS duplication mistakes**

#### CSS Source of Truth:
- **🎯 Product Cards CSS:** `resources/css/app.css` (lines 644+)
  - Already includes: 1:1 aspect ratio, object-cover, hover effects
  - Used by BOTH design system showcase AND WooCommerce shop
  - ❌ **NEVER duplicate in woocommerce.css**

- **🎯 Icon Sizing CSS:** `resources/css/app.css` (lines 529+)
  - Includes: `.icon`, `.icon-xs`, `.icon-sm`, `.icon-lg`, etc.
  - ❌ **NEVER duplicate in woocommerce.css**

#### File-Specific Rules:
- **`app.css`:** Main design system components (product cards, icons, buttons)
- **`woocommerce.css`:** Only WooCommerce-specific fixes and overrides
- **Design System Showcase:** Uses same CSS classes as shop - changes auto-apply

#### Before Adding CSS:
1. ✅ Check if styles already exist in `app.css`
2. ✅ Search codebase: `grep -r "class-name" resources/css/`
3. ✅ Only add to `woocommerce.css` if WooCommerce-specific
4. ❌ Never duplicate existing styles

**📍 Documentation:** See red warning box in design system showcase for details

## 📊 CURRENT PROJECT STATUS (v0.5.6 - 2025-06-27)

### ✅ COMPLETED FEATURES
- **WordPress 6.8.1 Compatibility:** Fixed critical underline bug affecting all themes
- **WooCommerce Gallery:** Complete implementation with Alpine.js and Fancybox lightbox
- **Product Gallery Features:**
  - 75% main image + 25% vertical thumbnails (desktop)
  - Interactive thumbnails with Alpine.js reactivity
  - Professional Fancybox lightbox with full gallery navigation
  - Responsive mobile layout (horizontal thumbnails)
  - Styled scrollbars and smooth interactions
- **WooCommerce Integration:** Fully custom product cards with gradient buttons and SVG icons
- **Estonian Localization:** Complete WooCommerce shop translation
- **Custom Templates:** Archive-product.php, content-product.php, and single-product.php fully customized
- **CSS Architecture:** Component-based structure with proper inheritance and Business Bloomer patterns
- **Button Design:** Consistent gradient buttons with elegant SVG icons
- **Product Card Redesign:** Modern, interactive, and visually appealing design

### 🔄 IN PROGRESS
- **Mobile Responsiveness:** Testing and optimization needed
- **Cross-browser Compatibility:** Verification of recent fixes required
- **Performance Optimization:** CSS bundle optimization planned

### 📋 NEXT PRIORITIES
- **SEO Foundation:** Meta tags, schema markup, heading structure
- **Performance:** Core Web Vitals optimization
- **Testing:** Cross-device and cross-browser validation

## 🛠️ TECHNICAL STACK

### Core Technologies
- **WordPress:** 6.8.1 + Latest security updates
- **WooCommerce:** 9.9.5 + Custom templates
- **Theme Framework:** TailPress (modern WordPress development)
- **CSS Framework:** Tailwind CSS v4.0 + Custom components
- **Build System:** Vite 6.3.3 + npm scripts
- **Version Control:** Git + GitHub repository

### Development Environment
- **Local Server:** XAMPP (Apache + MySQL + PHP 8.2.12)
- **Database:** MySQL 8.0+ (blankpage_wp)
- **Local URL:** http://localhost/wordpress/
- **Shop URL:** http://localhost/wordpress/pood/

### File Structure
```
blankpage-tailpress-theme/
├── woocommerce/           # Custom WooCommerce templates
│   ├── archive-product.php
│   ├── content-product.php
│   └── single-product.php
├── resources/
│   ├── css/
│   │   └── components/
│   │       └── woocommerce.css
│   └── js/
├── functions.php          # Theme functionality
├── deploy.bat            # Build and deployment script
└── dist/                 # Compiled assets
```

## 🚨 KNOWN ISSUES & FIXES

### 🔍 DESIGN AUDIT REQUIRED (v0.5.7+)
**CRITICAL:** All existing design components need review for Tailwind CSS 4.0 compatibility
- ⚠️ **WooCommerce Components:** Product cards, buttons, forms may use legacy syntax
- ⚠️ **Current CSS:** May contain `text-opacity-*`, `flex-grow`, old gradient syntax
- ⚠️ **Configuration:** `tailwind.config.js` needs conversion to CSS `@theme`
- ⚠️ **Performance:** Missing v4.0 optimizations (dynamic utilities, container queries)

**Action Required:** Systematic audit of all templates and CSS files before next major release

### WordPress 6.6.0 Underline Bug
**Issue:** WordPress core CSS adds unwanted underlines to all links
**Fix Applied:** CSS specificity override in woocommerce.css
```css
:root :where(a:where(:not(.wp-element-button))) {
    text-decoration: none;
}
```

### WooCommerce CSS Conflicts
**Issue:** Default WooCommerce styles override theme styling  
**Fix Applied:** Removed default WooCommerce CSS in functions.php
**Method:** Custom template approach instead of hooks

## 🔧 DEVELOPMENT WORKFLOW

### Daily Development Process
1. **Edit theme files** in `blankpage-tailpress-theme/`
2. **Run build command:** `./deploy.bat` (builds + deploys)
3. **Test changes** at http://localhost/wordpress/
4. **Commit changes** to Git repository

### Git Workflow
```bash
# Regular development
git add .
git commit -m "feature: description"
git push origin main

# Major milestones
git commit -m "✅ CHECKPOINT X: milestone description"
```

---

## 📂 PROJECT STRUCTURE

```
BlankPage v0.5 windsurf/
├── blankpage-tailpress-theme/          # Main theme development
│   ├── resources/                      # Source files (CSS, JS)
│   │   ├── css/
│   │   │   ├── app.css                # Main Tailwind entry point
│   │   │   └── components/
│   │   │       └── woocommerce.css    # WooCommerce-specific styles
│   │   └── js/
│   ├── template-parts/                 # Theme components
│   │   └── woocommerce/               # WooCommerce component templates
│   ├── woocommerce/                    # WooCommerce templates
│   │   ├── single-product.php         # Product page (with gallery)
│   │   ├── archive-product.php        # Shop page
│   │   ├── content-product.php        # Product card template
│   │   ├── cart/                      # Cart templates
│   │   ├── checkout/                  # Checkout templates
│   │   └── myaccount/                 # Account templates
│   ├── functions.php                  # Theme functionality
│   ├── deploy.bat                     # Deployment script
│   ├── vite.config.mjs               # Vite build configuration
│   ├── package.json                  # Node.js dependencies
│   └── dist/                         # Built assets
├── juhised/                          # Documentation (Estonian)
│   ├── 00_MEIE_TEEKOND_KOKKUVOTTE.md # Lessons learned
│   ├── 01_TOOTESTABIILSE_SETUP_JUHEND.md # Setup guide
│   └── woocommerce-teema-juhend.md    # WooCommerce guide
└── project overview/                  # Project documentation
    ├── project_overview.md            # This file
    ├── changelog.md                   # Version history
    ├── todo.md                        # Task tracking
    └── troubleshoot.md                # Common issues
```

---

## 🚀 DEVELOPMENT WORKFLOW

### Deploy Script Functionality
```bash
.\deploy.bat
```

**What it does:**
1. **Build Phase**: Runs `npm run build` (Vite compilation with Tailwind CSS processing)
2. **Asset Copy**: Copies compiled CSS/JS from `dist/` to WordPress theme directory
3. **Template Copy**: Syncs all PHP templates and theme files
4. **Live Update**: Changes are immediately available at http://localhost/wordpress/

**Output Example:**
```
========================================
  BlankPage TailPress Deploy Script
========================================

[1/4] Building theme with npm...
✓ 3 modules transformed.                       
dist/assets/app-BkQEJLbf.css           62.65 kB │ gzip: 9.75 kB
✓ built in 612ms

[2/4] Copying dist files...
[3/4] Copying PHP template files...
[4/4] Copying theme assets...

Deploy Complete!
```

### Local Environment Setup
1. **XAMPP Server**: Apache + MySQL running
2. **WordPress**: http://localhost/wordpress/
3. **Shop**: http://localhost/wordpress/pood/
4. **Development**: Edit files in `blankpage-tailpress-theme/`
5. **Build & Deploy**: Run `deploy.bat` script
6. **Testing**: View changes immediately

### Build System (Vite + Tailwind CSS v4.0)

**Key Configuration Files:**
```javascript
// vite.config.mjs
import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
  plugins: [tailwindcss()],
  // ... build configuration
})
```

```css
/* resources/css/app.css */
@import "tailwindcss";
/* Custom components and overrides */
```

**Dependencies (package.json):**
```json
{
  "devDependencies": {
    "@tailwindcss/vite": "^4.0.0",
    "tailwindcss": "^4.0.0", 
    "vite": "^6.3.3"
  }
}
```

---

## 🚨 KNOWN ISSUES & FIXES

### WordPress 6.8.1 Underline Bug
**Issue:** WordPress core CSS adds unwanted underlines to all links
**Fix Applied:** CSS specificity override in single-product.php
```css
:root :where(a:where(:not(.wp-element-button))) {
    text-decoration: none;
}
```

### WooCommerce Gallery CSS Targeting (RESOLVED v0.5.5)
**Issue:** Multiple failed attempts at gallery layout due to incorrect CSS selectors
**Root Cause:** Targeting wrong DOM elements (`.woocommerce-product-gallery-wrapper` vs actual structure)
**Solution:** Applied Business Bloomer modern CSS with correct selectors
**Documentation:** Comprehensive troubleshooting added to prevent future issues

### WooCommerce Button Class Conflicts
**Issue:** Default WooCommerce button classes (`single_add_to_cart_button`, `button`, `alt`) override custom styling
**Fix Applied:** Remove WooCommerce default classes, keep only required attributes, use pure Tailwind classes
**Documentation:** Added to troubleshoot.md v0.5.3 section

### Tailwind CSS v4.0 Group Classes in @apply
**Issue:** Build fails with "Cannot apply unknown utility class: group"
**Root Cause:** Using 'group' and 'group-hover' classes in @apply directives
**Solution:** Removed group classes from @apply, implement directly in HTML templates
**Prevention:** Document @apply limitations for v4.0

---

## 📋 PROJECT DETAILS

**Project Name:** BlankPage v0.5 Windsurf  
**Version:** 0.5.6  
**Created:** 2025-06-25  
**Status:** ✅ ACTIVE DEVELOPMENT  
**Repository:** https://github.com/ToomasST/BlankPage-v0.5-Fresh-Start.git

**Development Environment:**
- **OS:** Windows with XAMPP
- **Server:** Apache + MySQL 8.0+
- **PHP:** 8.2.12  
- **WordPress:** 6.8.1
- **WooCommerce:** 9.9.5

**Key URLs:**
- **Local Site:** http://localhost/wordpress/
- **Shop:** http://localhost/wordpress/pood/
- **Admin:** http://localhost/wordpress/wp-admin/

---

## 🎯 PROJECT GOALS & SUCCESS METRICS

### Primary Objectives
- [x] Create modern, responsive WordPress theme with TailPress + Tailwind CSS v4.0
- [x] Implement full WooCommerce functionality with custom templates
- [x] Design modern product cards with interactive elements
- [x] **NEW**: Resolve WooCommerce product gallery layout with modern 2025 patterns
- [x] Custom cart and checkout design with gradient styling
- [ ] Complete responsive design testing for all devices
- [ ] Performance optimization (Core Web Vitals 100/100)
- [ ] SEO optimization with structured data

### Target Audience
- Estonian e-commerce businesses seeking modern, fast themes
- Mobile-first shoppers expecting smooth user experience
- Performance-conscious users demanding fast load times

### Success Metrics
- **Build Performance**: ✅ 612ms build time maintained
- **CSS Bundle**: ✅ 62.65 kB optimized output
- **Gallery Functionality**: ✅ Modern layout with responsive behavior
- **Cross-Browser**: ⏳ Testing in progress
- **Mobile UX**: ⏳ Refinement needed

---

## 🔧 DEVELOPMENT WORKFLOW & TOOLS

### 📦 Build Process
**Primary Build Tool: Vite + TailPress Framework**

#### Development Commands
```bash
# Development mode with hot reload
npm run dev

# Production build
npm run build

# Watch mode for development
npm run watch
```

### 🚀 Deployment Workflow
**Primary Deployment: deploy.bat Script**

#### deploy.bat Functionality
- Executes `npm run build` for production assets
- Vite compiles Tailwind CSS and processes all assets
- Built files output to `dist/` directory
- WordPress automatically serves optimized assets
- Test at http://localhost/wordpress/

### 🔍 Code Quality Tools
- **ESLint:** JavaScript linting with WordPress standards
- **Prettier:** Code formatting for JS, CSS, PHP
- **Husky + lint-staged:** Pre-commit hooks for quality checks

### 📋 Git Workflow
- **Repository:** https://github.com/ToomasST/BlankPage-v0.5-Fresh-Start.git
- **Main Branch:** `main` (production-ready)
- **Feature Branches:** `feature/description`

### 🧪 Testing Environment
- **XAMPP:** Apache + MySQL 8.0+ + PHP 8.2.12
- **WordPress:** 6.8.1 + WooCommerce 9.9.5
- **URLs:** http://localhost/wordpress/ (home), /pood/ (shop), /wp-admin/ (admin)

---

**Last Updated:** 2025-07-01  
**Document Version:** 1.8
