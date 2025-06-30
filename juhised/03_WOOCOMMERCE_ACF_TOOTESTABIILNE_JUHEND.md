# 🛒 WOOCOMMERCE + ACF TÖÖPEALNE JUHEND
**Versioon: 1.0 - Testitud ja Tööpealne**

---

## 📋 EELTINGIMUSED

### ✅ Nõutav, et oleksid täidetud:
- [x] **SAMM 1-8** (01_TOOTESTABIILSE_SETUP_JUHEND.md) täielikult valmis
- [x] WordPress töötab: http://localhost/wordpress/
- [x] TailPress teema aktiivne ja CSS laeb
- [x] WooCommerce plugin installitud ja seadistatud
- [x] Vähemalt 1 test toode olemas

### ⚠️ Kui eeltingimused pole täidetud:
**STOPP!** Mine tagasi ja lõpeta esmalt põhisetup!

---

## 🎯 SELLE JUHENDI EESMÄRGID

✅ **WooCommerce templates** teema kaustas ja kohandatud  
✅ **Semantiline HTML5** + Tailwind CSS  
✅ **Advanced Custom Fields (ACF)** integreerimine  
✅ **Toote metaväljad** (SEO, Brand, GTIN)  
✅ **JSON-LD Schema** structured data  
✅ **Performance optimizations**  

---

## 🚀 SAMM 1: WOOCOMMERCE MALLIDE KOPEERIMINE

### 1.1 WooCommerce template failide tuvastamine
Esmalt kontrollime, millised template failid on vajalikud:

<function_calls>
<invoke name="run_command">
<parameter name="CommandLine">dir "C:\xampp\htdocs\wordpress\wp-content\plugins\woocommerce\templates" /B
