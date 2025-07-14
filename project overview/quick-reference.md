BlankPage v0.5 Theme — Windsurf IDE Reference
Project Purpose and Core Principles

    BlankPage v0.5 is a performance-optimized, plugin-free WordPress theme designed as a WooCommerce-first template. It avoids heavy page builders or extra plugins to ensure fast load times and minimal overhead.

    The theme uses Tailwind CSS 4.0+ (Oxide engine) and Alpine.js 3.x for all styling and interactivity
    daily.dev
    . This modern stack enables utility-first styling and lightweight JavaScript without jQuery.

    Core principles: minimalism, speed, consistency, and developer efficiency. All code must follow a consistent design system and theme conventions (see Design System Workflow below).

Technology Stack

    WordPress 6.x – latest stable (e.g. WP 6.8 released April 2025)
    wordpress.org
    .

    WooCommerce 9.x – latest (e.g. WC 9.9, final release June 9, 2025)
    developer.woocommerce.com
    , ensuring full compatibility.

    PHP 8.x – use PHP 8.3 or higher (active support through 2025–2026)
    php.net
    .

    Tailwind CSS 4.0+ – with the new Oxide engine for maximum build performance and modern features
    daily.dev
    .

    Alpine.js 3.x – for frontend interactivity (latest 3.x series).

    TailPress v5.x – the Tailwind-based WP theme boilerplate (uses Vite by default)
    tailpress.io
    .

    Vite 6.x – build tool (Vite 6.0 released Nov 2024
    vite.dev
    ) to compile assets and support hot reloading.

    Git – for version control (standard git workflow).

    Node.js & npm – latest LTS for building the theme (via npm install, etc.).

    XAMPP (or equivalent) – local development environment (Apache/MySQL) for WordPress.

Design System Workflow (CRITICAL)

    Prototype in showcase first: All new UI components or flows must be developed in design-system-showcase.php first, before integrating into templates. This is mandatory to ensure consistency and reusability.

    The showcase file serves as the single source of truth for design tokens and component examples. Do not skip this step. Only once a design is finalized in the showcase should it be moved into the theme’s PHP templates or blocks.

Build & Deployment Workflow

    Local Environment Setup: Install XAMPP (or equivalent) and start Apache/MySQL. Create a new MySQL database and install WordPress in htdocs/ (e.g. at http://localhost/mysite).

    Create TailPress Theme: Install the TailPress installer and scaffold the theme:

        Run composer global require tailpress/installer
        tailpress.io
        .

        Then tailpress new your-theme-folder
        tailpress.io
        . This creates a new TailPress-based theme in that folder. Copy or activate this theme in your local WordPress setup.

    Install Dependencies: In the theme folder, run npm install to install all Node dependencies. (If required, run composer install as well for PHP packages.)

    Development Mode: Run npm run dev (Vite development server) to compile assets on save and enable hot reload. Visit your local site to test changes live.

    Production Build: When ready to deploy, run npm run build to compile and minify assets for production
    tailpress.io
    . This generates optimized CSS/JS. Ensure you remove or ignore node_modules and other dev files (see TailPress Release guidelines
    tailpress.io
    ).

    Deploy (deploy.bat): Run the provided deploy.bat script (e.g. by double-clicking on Windows) to automate deployment steps. This typically uploads or activates the updated theme on the target environment and clears caches. (The exact behavior of deploy.bat depends on the project setup; treat it as the one-click deployment tool.)

    Test URLs: After deployment, verify the site at the expected URL (e.g. http://localhost/mysite/ for local, or the staging/production URL). Ensure all pages and WooCommerce flows load correctly.

    Git Workflow: Use Git for source control at every step. Commit only the theme files (exclude build artifacts like node_modules). Use clear, descriptive commit messages for each logical change. Push branches to remote and merge according to project policies. Tag releases with v0.5.x when cutting a new version.

## Enforced Development Rules

    Tailwind-first CSS: Use Tailwind utility classes for all styling. Avoid custom CSS files or inline styles unless absolutely necessary. Rely on Tailwind v4 features (e.g. new cascade layers)
    daily.dev
    .

## 🔥 CRITICAL: Alpine.js Modal Scoping Rules

**MANDATORY PATTERNS** (learned from v0.5.6 crisis):

### ✅ Modal Structure Requirements
```php
// CORRECT: Modal as direct child of x-data scope
<div x-data="{ showModal: false, modalData: null }">
    <div x-show="showModal" x-cloak>...</div>  <!-- Direct child -->
    <div x-data="{ localVar: 0 }">...</div>   <!-- Other nested scopes -->
</div>
```

### ❌ NEVER DO THIS
```php
// WRONG: Modal in nested scope
<div x-data="{ showModal: false }">
    <div x-data="{ other: 0 }">
        <div x-show="showModal">...</div>  <!-- showModal undefined -->
    </div>
</div>
```

### 🛠️ Required Global CSS
```css
/* MANDATORY: Add to prevent FOUC */
[x-cloak] { display: none !important; }
```

### 🚀 WooCommerce AJAX Pattern
```javascript
// Standard pattern for both "Lisa korvi" and "Osta kohe"
fetch('/wordpress/?wc-ajax=add_to_cart', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
    body: new URLSearchParams({ product_id: id, quantity: qty })
})
.then(response => response.json())
.then(data => {
    if (data.error) { alert('Error'); return; }
    // Success: either show modal or redirect
});
```

### 🎯 Testing Checklist
- [ ] Modal hidden on page load (`showModal: false`)
- [ ] Modal variables accessible in scope
- [ ] Modal dismissible (button + backdrop)
- [ ] No console errors about undefined variables
- [ ] x-cloak prevents flash of unstyled content

    Alpine-first JS: Use Alpine.js (v3.x) for dynamic behavior. Do not use jQuery, heavy libraries, or raw <script> code unless no alternative. Use Alpine components and directives for interactivity.

    Semantic HTML: Always use proper HTML5 structure (<header>, <nav>, <main>, <section>, <article>, <footer>, etc.) for content. Do not use non-semantic <div> or <span> tags where a semantic element applies.

    Centralized Design Tokens/Components: Define reusable design tokens (colors, spacing, typography) and common components in one place (the showcase or a centralized CSS). Do not duplicate styling across components. Reuse classes or variables wherever possible.

    No Page Builders/Plugins: Prohibited: Elementor, ACF, other visual builders or heavy plugins. The theme must rely only on WordPress core, WooCommerce, and the specified stack (Tailwind, Alpine, etc.). No additional frameworks.

    Showcase for New Flows: All new UI flows or patterns must begin in design-system-showcase.php (see above). This rule is non-negotiable for consistency.

Common Pitfalls to Avoid

    Outdated Tailwind Syntax: Forgetting that Tailwind 4.0 changed syntax (e.g. removed deprecated utilities). Always use the new 4.0 classes and configuration
    daily.dev
    . Do not mix Tailwind v3.x class names.

    Duplicated Styles: Copying the same styles (cards, buttons, etc.) into multiple places. Instead, create a single shared component or utility and reuse it. Duplicate styling leads to inconsistency and is harder to maintain.

    Skipping the Showcase: Bypassing the design-system prototype phase. Never implement a new UI pattern directly in the live theme without first finalizing it in the showcase.

    Default Woo Classes: Leaving default WooCommerce markup/classes unstyled. Always override or remove Woo’s default classes (e.g. legacy grid or button classes) with Tailwind utilities to ensure consistent design.

    Using Disallowed Plugins: Relying on Elementor, ACF, or similar tools. These violate the plugin-free policy. Do not use them even for convenience.

    Non-semantic HTML: Using <div>/<span> indiscriminately. Always choose the appropriate semantic tag.

Versioning Context

    Project Version: BlankPage Theme v0.5.8 (as of July 2025). All development aligns with this version.

    Tailwind 4.0 (Oxide): The theme is based on Tailwind CSS 4.0’s Oxide engine
    daily.dev
    . All styling must conform to Tailwind 4.0 conventions and take advantage of its performance and features.

    Baseline Versions: WordPress 6.8 (released April 2025)
    wordpress.org
    and WooCommerce 9.9 (released June 2025)
    developer.woocommerce.com
    are the minimum supported versions. PHP 8.3+ is required
    php.net
    .

    Compatibility: Ensure all new code and integrations are compatible with the above versions. Regularly update and test against the current stack. All new code must conform to these version baselines and the rules outlined above.

WooCommerce Integration

    Meta Keys (Project-Specific): This project uses custom meta key configurations:
        - SKU: `_sku` (standard WooCommerce)
        - EAN/GTIN: `_global_unique_id` (custom, NOT the standard `_wc_gtin`)
        - Use: `get_post_meta($product_id, '_global_unique_id', true)` for EAN codes

    Brands System: Uses taxonomy, not meta fields:
        - Taxonomy name: `product_brand` (requires WooCommerce Brands plugin)
        - Implementation: `get_the_terms($product->get_id(), 'product_brand')`
        - Automatic Schema markup for SEO benefits
        - Admin: WooCommerce > Products > Brands

    Gallery Implementation:
        - Uses Alpine.js + Fancybox v5 for lightbox
        - Custom navigation with hidden gallery links
        - No default WooCommerce gallery styles

    Template Overrides: All WooCommerce templates are fully overridden in theme folder
        - Location: `woocommerce/` folder in theme
        - Custom cart, checkout, single-product templates
        - Remove default WooCommerce classes, use Tailwind utilities

Project Structure & Key Files

    Theme Development:
        - Main theme: `blankpage-tailpress-theme/`
        - Showcase: `design-system-showcase.php` (component development lab)
        - Deploy script: `deploy.bat` (includes npm build + file copying)
        - Build config: `vite.config.mjs`, `package.json`

    Documentation:
        - This file: `project overview/quick-reference.md` (primary reference)
        - Setup guides: `juhised/` folder
        - Troubleshooting: See "Common Issues" section below

    URLs & Links:
        - Local development: `http://localhost/wordpress/`
        - GitHub repository: `https://github.com/ToomasST/BlankPage-v0.5-Fresh-Start.git`
        - TailPress docs: `https://tailpress.io`
        - Tailwind CSS 4.0: `https://tailwindcss.com/blog/tailwindcss-v4`

    Deploy Workflow:
        1. Edit files in `blankpage-tailpress-theme/`
        2. Run `deploy.bat` (automatically runs `npm run build`)
        3. Files copied to WordPress theme directory
        4. Test at `http://localhost/wordpress/`
        5. Commit changes to Git

Common Issues & Solutions

    WordPress 6.6.0 Underline Bug:
        - Problem: WordPress adds `text-decoration: underline` to all links globally
        - Symptoms: Unwanted underlines on buttons, navigation, etc.
        - Fix: Add this CSS rule to override:
        ```css
        :root :where(a:where(:not(.wp-element-button))) {
            text-decoration: none;
        }
        ```

    Tailwind CSS 4.0 Build Errors:
        - Problem: "Cannot apply unknown utility class: group"
        - Cause: Using `group` or `group-hover` classes in `@apply` directives
        - Fix: Remove group classes from CSS `@apply`, use directly in HTML templates
        - Location: Check `resources/css/components/woocommerce.css`

    WooCommerce Button Styling Conflicts:
        - Problem: Default WooCommerce classes override custom Tailwind styling
        - Symptoms: Text wrapping, icon positioning issues
        - Classes to remove: `single_add_to_cart_button`, `button`, `alt`
        - Fix: Keep only required attributes (type, name, value), use pure Tailwind classes

    Alpine.js Animation Issues:
        - Problem: Throttle settings affecting smooth animations
        - Symptoms: Jerky fade effects, delayed interactions
        - Fix: Adjust throttle timing in Alpine directives
        - Example: Use `x-transition` instead of custom fade implementations

    Fancybox Lightbox Navigation:
        - Problem: Gallery navigation not working properly
        - Cause: Missing hidden gallery links for navigation
        - Fix: Ensure all gallery images have corresponding hidden `<a>` tags
        - Structure: Visible thumbnails + hidden full-size links

    Incorrect Meta Keys:
        - Problem: Using standard WooCommerce meta keys instead of project-specific ones
        - Common mistake: Using `_wc_gtin` instead of `_global_unique_id` for EAN
        - Fix: Always use project-specific meta keys documented above

    WooCommerce Template Alignment Issues:
        - Problem: WooCommerce functions like `woocommerce_output_related_products()` generate content outside intended containers
        - Symptoms: Full-width sections that don't align with main content, white backgrounds spanning entire screen
        - Root cause: WooCommerce default functions ignore parent container constraints
        - Fix: Wrap WooCommerce functions in manual container divs
        - Example: `<div class="container mx-auto px-4 max-w-7xl"><?php woocommerce_output_related_products(); ?></div>`
        - CSS Override: Use `!important` declarations to override WooCommerce default styles when needed
        - Verify: Check data import scripts and existing product data

    Design System Bypass:
        - Problem: Creating components directly in templates without showcase testing
        - Consequence: Inconsistent styling, duplicated code
        - Fix: ALWAYS develop in `design-system-showcase.php` first
        - Workflow: Showcase → Perfect → Extract to templates
