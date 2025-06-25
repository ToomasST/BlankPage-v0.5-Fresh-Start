# 🎯 TÖÖPEALNE TAILPRESS + WORDPRESS SETUP JUHEND
**Versioon: 1.0 - Testitud ja Tööpealne**

---

## 📋 EELTINGIMUSED

### ✅ Kontrolli enne alustamist:
- [ ] Windows 10/11
- [ ] Internetiühendus 
- [ ] Administraatori õigused
- [ ] Vähemalt 2GB vaba ruumi

---

## 🚀 SAMM 1: XAMPP KONTROLL JA SEADISTUS

### 1.1 Kontrolli XAMPP olukorda
```powershell
# Kontrolli kas XAMPP on olemas
Test-Path "C:\xampp"
```

**Kui TRUE:** Jätka sammuga 1.2  
**Kui FALSE:** Lae alla ja installi XAMPP 8.2+ versioon

### 1.2 XAMPP testimine
1. **Käivita:** `C:\xampp\xampp-control.exe`
2. **Start:** Apache ja MySQL
3. **Kontrolli:** http://localhost/ (peaks näitama XAMPP welcomet)

✅ **CHECKPOINT 1:** XAMPP töötab

---

## 🌐 SAMM 2: WORDPRESS FRESH INSTALL

### 2.1 WordPress allalaadimine
1. **Mine:** https://wordpress.org/download/
2. **Lae alla:** Viimane versioon (ZIP)
3. **Paki lahti:** `C:\xampp\htdocs\wordpress`

### 2.2 Andmebaasi loomine
1. **Ava:** http://localhost/phpmyadmin/
2. **Kliki:** "New" (vasakul üleval)
3. **Database name:** `blankpage_wp`
4. **Kliki:** "Create"

### 2.3 WordPress setup
1. **Ava:** http://localhost/wordpress/
2. **Vali keel:** English või Estonian
3. **Database details:**
   - Database name: `blankpage_wp`
   - Username: `root`
   - Password: (jäta tühjaks)
   - Database Host: `localhost`
   - Table Prefix: `wp_`
4. **Jätka läbi setup**

### 2.4 WordPress admin seadistus
- Site Title: `BlankPage Test Site`
- Username: `admin`
- Password: (turvaline parool)
- Email: `test@blankpage.ee`

✅ **CHECKPOINT 2:** WordPress töötab ja admin kättesaadav

### 2.5 Git backup (Punkt 1)
```bash
cd "C:\Users\tooma\OneDrive\Desktop\web scraping\BlankPage v0.3 windsurf"
git add .
git commit -m "✅ CHECKPOINT 2: WordPress fresh install working"
git push origin main
```

---

## 🛠️ SAMM 3: PHP/COMPOSER CLI SEADISTUS

### 3.1 PHP PATH
```powershell
# Lisa PHP PATH-i
setx PATH "%PATH%;C:\xampp\php"
```

### 3.2 Composer install
```bash
cd C:\xampp\php
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

### 3.3 Composer.bat loomine
Loo `C:\xampp\php\composer.bat`:
```batch
@echo off
php "%~dp0composer.phar" %*
```

### 3.4 Testimine (UUS TERMINAL!)
```bash
php --version    # Peaks näitama PHP 8.2+
composer --version  # Peaks näitama Composer versiooni
```

✅ **CHECKPOINT 3:** PHP ja Composer töötavad

---

## 🎨 SAMM 4: TAILPRESS CLI INSTALL

### 4.1 TailPress CLI global install
```bash
composer global require tailpress/cli
```

### 4.2 TailPress CLI testimine
```bash
# Kasuta täisteed kui 'tailpress' ei tööta
C:\Users\tooma\AppData\Roaming\Composer\vendor\bin\tailpress.bat --version
```

✅ **CHECKPOINT 4:** TailPress CLI töötab

---

## 🏗️ SAMM 5: TAILPRESS TEEMA LOOMINE

### 5.1 Teema loomine arenduskaustas
```bash
cd "C:\Users\tooma\OneDrive\Desktop\web scraping\BlankPage v0.3 windsurf"

# TailPress teema loomine (AINULT TEEMA, MITTE WORDPRESS!)
C:\Users\tooma\AppData\Roaming\Composer\vendor\bin\tailpress.bat new blankpage-tailpress-theme
```

**Vastused:**
- Theme name: `BlankPage v0.4 WS TailPress`
- Author: `BlankPage`
- Email: `info@blankpage.ee`
- Local URL: `http://localhost/wordpress/`
- **Install WordPress?: NO** ❌

### 5.2 Node.js sõltuvused
```bash
cd blankpage-tailpress-theme
npm install
```

### 5.3 Esimene build test
```bash
npm run build
```

**Kontrolli et tekib:** `dist/` kaust manifest.json failiga

✅ **CHECKPOINT 5:** TailPress teema loodud ja buildib

### 5.4 Git backup (Punkt 2)
```bash
git add .
git commit -m "✅ CHECKPOINT 5: TailPress theme created and building"
git push origin main
```

---

## 📦 SAMM 6: TEEMA DEPLOY XAMPP-I

### 6.1 Teema kopeerimine WordPressi
```bash
# Kopeeri kogu blankpage-tailpress-theme kaust WordPressi themes kausta
xcopy "blankpage-tailpress-theme" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme" /E /I
```

### 6.2 WordPressis teema aktiveerimine
1. **WordPress admin:** http://localhost/wordpress/wp-admin/
2. **Appearance → Themes**
3. **Aktiveeri:** "BlankPage v0.4 WS TailPress"

### 6.3 Frontend testimine
1. **Ava:** http://localhost/wordpress/
2. **Kontrolli:** Tailwind CSS laeb (inspekti Elements)
3. **Kontrolli:** Konsool ei näita vigu

✅ **CHECKPOINT 6:** TailPress teema töötab WordPressis

---

## 🛒 SAMM 7: WOOCOMMERCE LISAMINE

### 7.1 WooCommerce install
1. **WordPress admin:** Plugins → Add New
2. **Otsi:** "WooCommerce"
3. **Installi ja aktiveeri**
4. **Setup wizard:** Jäta vaikimisi seaded

### 7.2 WooCommerce templates TailPress-is
Loo failid teema kaustas:
- `woocommerce.php`
- `template-parts/woocommerce/`

### 7.3 Test WooCommerce
1. **Loo test toode:** Products → Add New
2. **Kontrolli shop:** http://localhost/wordpress/shop/

✅ **CHECKPOINT 7:** WooCommerce töötab TailPress-iga

### 7.4 Git backup (Punkt 3)
```bash
git add .
git commit -m "✅ CHECKPOINT 7: WooCommerce integrated with TailPress"
git push origin main
```

---

## 🔄 SAMM 8: ARENDUS WORKFLOW

### 8.1 Build ja Deploy script
Loo `deploy.bat` arenduskaustas:
```batch
@echo off
echo Building theme...
npm run build

echo Copying to WordPress...
xcopy "dist" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\dist" /E /Y
xcopy "*.php" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\" /Y
xcopy "style.css" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\" /Y

echo Deploy complete!
```

### 8.2 Dev workflow test
```bash
# Tee CSS muudatus resources/css/app.css
# Käivita deploy
./deploy.bat
# Kontrolli muudatust brauseris
```

✅ **CHECKPOINT 8:** Arendus workflow töötab

---

## 📊 SAMM 9: PROJEKT OVERVIEW UPDATE

### 9.1 Uuenda dokumentatsiooni
- [ ] `project overview/project_overview.md`
- [ ] `project overview/changelog.md`
- [ ] `project overview/todo.md`
- [ ] `project overview/troubleshoot.md`

### 9.2 Final Git backup
```bash
git add .
git commit -m "🎉 FINAL: Complete TailPress + WordPress + WooCommerce setup working"
git push origin main
```

✅ **PROJEKT VALMIS!** 🎉

---

## 🆘 TROUBLESHOOTING

### WordPress ei lae
- Kontrolli andmebaasi nime wp-config.php-s
- Kontrolli MySQL kas töötab XAMPP-is

### TailPress CLI ei tööta
- Kontrolli PHP PATH-i (ava UUS terminal)
- Kasuta täisteed: `C:\Users\...\tailpress.bat`

### Build ebaõnnestub
- Kontrolli Node.js versioon (16+)
- Kustuta node_modules ja `npm install` uuesti

### CSS ei laadi WordPressis
- Kontrolli dist/manifest.json eksisteerib
- Kontrolli functions.php enqueue loogika

---

## 🎯 EDUKUSE MÄRGID

✅ http://localhost/wordpress/ - WordPress töötab  
✅ http://localhost/wordpress/wp-admin/ - Admin töötab  
✅ http://localhost/wordpress/shop/ - WooCommerce töötab  
✅ Tailwind CSS laeb (inspect elements)  
✅ Build ja deploy töötab  
✅ Git backup tehtud  

**KUI KÕIK MÄRGID ✅ - OLED VALMIS ARENDAMA!** 🚀
