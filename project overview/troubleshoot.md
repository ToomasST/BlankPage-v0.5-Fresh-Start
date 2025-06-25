# 🆘 TROUBLESHOOTING - BlankPage v0.5 Windsurf

## Quick Solutions

### 🚨 CRITICAL ISSUES

#### WordPress ei lae / 500 Error
```bash
# 1. Kontrolli XAMPP teenused
# Apache ja MySQL peavad töötama

# 2. Kontrolli andmebaasi ühendust
# phpMyAdmin: http://localhost/phpmyadmin/
# Andmebaas: blankpage_wp peab eksisteerima

# 3. Kontrolli wp-config.php
# Database name: blankpage_wp
# Username: root
# Password: (tühi)
```

#### TailPress Build ebaõnnestub
```bash
# 1. Kontrolli Node.js versiooni
node --version  # Peab olema 16+

# 2. Puhasta ja reinstalli
rm -rf node_modules
rm package-lock.json
npm install

# 3. Kontrolli PATH-i
# PHP peab olema PATH-is: C:\xampp\php
```

#### Deploy script ei tööta
```bash
# 1. Peab olema õiges kaustas
cd blankpage-tailpress-theme

# 2. Käivita sammhaaval
npm run build
# Siis deploy.bat
```

---

## Common Problems & Solutions

### 🔧 DEVELOPMENT ISSUES

#### **CSS muudatused ei ilmu**
**Symptom:** CSS failid ei uuene brauseris  
**Solutions:**
1. **Hard refresh:** Ctrl+F5 brauseris
2. **Deploy uuesti:** `.\deploy.bat`
3. **Kontrolli build:** Kas `dist/` kaust uuenes?
4. **Brauseri cache:** Puhasta brauseri cache

#### **WooCommerce templates ei tööta**
**Symptom:** Kasutab default WooCommerce templatet  
**Solutions:**
1. **Kontrolli template nimesid:**
   ```
   woocommerce/cart/cart.php ✅
   woocommerce/checkout/form-checkout.php ✅
   ```
2. **Kontrolli WooCommerce support:**
   ```php
   // functions.php-s peab olema:
   add_theme_support('woocommerce');
   ```
3. **Clear cache:** WordPress + WooCommerce cache
4. **Reactivate theme:** Deactivate ja activate uuesti

#### **Responsive design katki**
**Symptom:** Mobile-s layout katki  
**Solutions:**
1. **Kontrolli viewport meta:**
   ```html
   <meta name="viewport" content="width=device-width, initial-scale=1">
   ```
2. **Tailwind breakpoints:** Kasuta `sm:`, `md:`, `lg:` klassid
3. **Test mobile:** Chrome DevTools mobile view
4. **Flexbox issues:** Kontrolli flex klassid

### 💾 DATABASE ISSUES

#### **Database connection error**
**Error:** `Error establishing a database connection`  
**Solutions:**
1. **MySQL status:** XAMPP-is MySQL peab olema RUNNING
2. **Database exists:** `blankpage_wp` peab eksisteerima
3. **Credentials:** wp-config.php kontrolli andmed
4. **Port conflicts:** Muuda MySQL port 3306 → 3307

#### **Tables not found**
**Error:** `Table 'blankpage_wp.wp_posts' doesn't exist`  
**Solutions:**
1. **Fresh install:** WordPress setup wizard uuesti
2. **Import backup:** Kui on varukoopia
3. **Permissions:** MySQL user õigused
4. **Reinstall:** WordPress täielik reinstall

### 🎨 DESIGN & STYLING

#### **Tailwind classes ei tööta**
**Symptom:** CSS klassid ei rakendu  
**Solutions:**
1. **Build process:** `npm run build` käivitatud?
2. **CSS import:** Kontrolli templates CSS import
3. **Purge settings:** tailwind.config.js content paths
4. **Cache clear:** Browser + WordPress cache

#### **Fonts ei lae**
**Symptom:** Default fonts kasutusel  
**Solutions:**
1. **Font files:** Kontrolli font failide olemasolu
2. **CSS imports:** @import statements õigeks
3. **Network tab:** Brauseri DevTools network errors
4. **CDN links:** Google Fonts lingid töötavad?

#### **Gradient backgrounds katki**
**Symptom:** Solid värvid gradientide asemel  
**Solutions:**
1. **Browser support:** Vanad brauserid ei toeta
2. **CSS syntax:** `bg-gradient-to-r from-blue-500 to-purple-600`
3. **Tailwind version:** Uuenda Tailwind CSS
4. **Fallback colors:** Lisa solid color fallback

### 🛒 WOOCOMMERCE SPECIFIC

#### **Checkout process katki**
**Symptom:** Ei saa tellimust esitada  
**Solutions:**
1. **Payment methods:** Vähemalt üks peab olema enabled
2. **Required fields:** Kõik required väljad täidetud
3. **JavaScript errors:** Brauseri console errors
4. **WooCommerce settings:** Checkout seaded korras

#### **Cart empty after add**
**Symptom:** Tooted ei jää korvii  
**Solutions:**
1. **Sessions:** PHP sessions töötavad?
2. **Cookies:** Brauseris cookies enabled
3. **Cache conflicts:** Caching plugin conflicts
4. **Database:** wp_woocommerce_sessions tabel

#### **Product images missing**
**Symptom:** Placeholder images  
**Solutions:**
1. **Upload directory:** wp-content/uploads permissions
2. **Image sizes:** WordPress regenerate thumbnails
3. **CDN issues:** Image CDN seaded
4. **File paths:** Relative vs absolute paths

---

## Performance Issues

### 🐌 SLOW LOADING

#### **Page load slow**
**Symptoms:** 3+ seconds loading time  
**Investigation:**
1. **Network tab:** DevTools performance
2. **Database queries:** Plugin query monitoring
3. **Image sizes:** Large unoptimized images
4. **Plugin conflicts:** Deactivate plugins one by one

**Solutions:**
1. **Image optimization:** WebP format, compression
2. **Caching:** Install caching plugin
3. **CSS minification:** Production build
4. **Database cleanup:** Remove unused plugins/themes

#### **JavaScript errors**
**Symptoms:** Console errors, functionality broken  
**Investigation:**
1. **Console tab:** JavaScript error messages
2. **Network failures:** Failed script loads
3. **Plugin conflicts:** Third-party scripts
4. **Version conflicts:** jQuery version issues

---

## Development Workflow Issues

### 📁 FILE PERMISSIONS

#### **Cannot write files**
**Error:** Permission denied errors  
**Solutions:**
1. **Windows permissions:** Right-click → Properties → Security
2. **XAMPP folders:** Full control permissions
3. **Run as administrator:** Command prompt
4. **Antivirus:** Exclude project folders

### 🔄 GIT ISSUES

#### **Git push fails**
**Error:** Authentication or network errors  
**Solutions:**
1. **GitHub credentials:** Token authentication
2. **Remote URL:** Check GitHub repository URL
3. **Branch exists:** Create branch first
4. **File size limits:** Large files (.git/objects)

#### **Merge conflicts**
**Error:** Conflicting changes  
**Solutions:**
1. **Manual resolution:** Edit conflicted files
2. **Reset hard:** `git reset --hard origin/main` (loses changes)
3. **Stash changes:** `git stash` before pull
4. **Separate branches:** Feature branches for development

---

## Emergency Procedures

### 🚨 COMPLETE RESET

If everything breaks and you need to start fresh:

```bash
# 1. Backup important files
copy "blankpage-tailpress-theme" "backup-theme"

# 2. Fresh WordPress install
# Delete C:\xampp\htdocs\wordpress
# Download fresh WordPress
# Extract to C:\xampp\htdocs\wordpress

# 3. Database reset
# phpMyAdmin → Drop database blankpage_wp
# Create new database blankpage_wp

# 4. WordPress setup
# Run setup wizard: http://localhost/wordpress/

# 5. Restore theme
copy "backup-theme" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme"

# 6. Reactivate everything
# Theme activation, WooCommerce install, etc.
```

### 🔧 PARTIAL RESET

For theme-only issues:

```bash
# 1. Backup current theme
copy "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme" "backup"

# 2. Fresh deploy
cd blankpage-tailpress-theme
.\deploy.bat

# 3. Test functionality
# If broken, restore backup
```

---

## Getting Help

### 📞 SUPPORT RESOURCES

1. **WordPress Documentation:** https://wordpress.org/support/
2. **WooCommerce Docs:** https://woocommerce.com/documentation/
3. **TailPress GitHub:** https://github.com/jeffreyvr/tailpress
4. **Tailwind CSS Docs:** https://tailwindcss.com/docs

### 🔍 DEBUGGING TOOLS

1. **WordPress Debug Mode:**
   ```php
   // wp-config.php
   define('WP_DEBUG', true);
   define('WP_DEBUG_LOG', true);
   ```

2. **Browser DevTools:**
   - Console tab for JavaScript errors
   - Network tab for loading issues
   - Elements tab for CSS debugging

3. **WordPress Plugins:**
   - Query Monitor (database queries)
   - Debug Bar (WordPress debugging)
   - Health Check (plugin conflicts)

---

**Last Updated:** 2025-06-25  
**Emergency Contact:** Check project documentation  
**Backup Strategy:** Regular Git commits + manual backups
