# 🎨 TAILWIND CSS 4.0 BEST PRACTICES
**BlankPage v0.5 Projekti Juhend**

## ⚠️ KRIITILINE PROJEKTI REEGEL

### **ALATI TAILWIND CSS FIRST + ALPINE.JS FIRST**

**See on projekti põhiline filosoofia ja kohustuslik lähenemine:**

1. **TAILWIND CSS FIRST** - Kõik disain, layout, spacing, värvid, tüpograafia PEAB kasutama Tailwind utility klasse enne custom CSS-i kirjutamist
2. **ALPINE.JS FIRST** - Kõik interaktiivsus ja dünaamiline käitumine PEAB kasutama Alpine.js direktiive enne custom JavaScript'i
3. **UURI ALATI SÜNTAKSIT** - Kui Tailwind/Alpine süntaks pole teada, uuri interneti kaudu enne custom lahenduse tegemist
4. **Custom CSS ainult viimase võimalusena** - Ainult väga spetsiifiliste komponentide jaoks, mida Tailwind utilities ei kata

**Implementeerimise järjekord:**
- ✅ **1. Esmalt:** Kas saab Tailwind utilities'ga? (padding, margin, flexbox, grid, colors, typography)
- ✅ **2. Teiseks:** Kas saab Alpine.js'iga? (x-data, x-show, x-on, transitions)
- ❌ **3. Viimane võimalus:** Custom CSS/JS ainult kui absoluutselt vajalik

---

## 🚀 TAILWIND CSS 4.0 - PARIMAD PRAKTIKAD JA UUED FUNKTSIONAALSUSED
**Versioon: 1.0 - BlankPage Projektile Kohandatud**
**Kuupäev: 30. Juuni 2025**

---

## 🎯 KRIITILISED MUUDATUSED v4.0-s

### ⚡ **OXIDE ENGINE - Revolutsiooniline Performance**
- **3.5x kiiremad** täisehitused
- **8x kiiremad** inkrementaalsed ehitused  
- **100x kiiremad** cache hit'id (mikrosekundites!)
- Rust + Lightning CSS tehnoloogia

### 🔧 **CSS-FIRST KONFIGURATSIOONI**
❌ **VANA MEETOD (v3.x):**
```javascript
// tailwind.config.js
module.exports = {
  theme: {
    colors: {
      brand: '#2563eb'
    }
  }
}
```

✅ **UUS MEETOD (v4.0):**
```css
/* resources/css/app.css */
@import "tailwindcss";

@theme {
  --color-brand-500: oklch(0.5 0.2 250);
  --color-brand-600: oklch(0.45 0.25 250);
  --font-display: "Inter", sans-serif;
  --breakpoint-3xl: 1920px;
}
```

### 🎨 **AUTOMAATNE SISUTUVASUTUS**
❌ **VANA:** `content: ['./src/**/*.{js,ts,jsx,tsx}']`
✅ **UUS:** Automaatne tuvastus (.gitignore respekteerimine)

---

## 🛠️ BLANKPAGE PROJEKTI SETUP

### **1. Vite Plugin Installation (Soovitatav)**
```bash
npm uninstall @tailwindcss/postcss
npm install tailwindcss @tailwindcss/vite
```

### **2. Vite Config Update**
```javascript
// vite.config.mjs
import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
  plugins: [tailwindcss()]
})
```

### **3. CSS Structure**
```css
/* resources/css/app.css */
@import "tailwindcss";

@theme {
  /* BlankPage Estonian Brand Colors */
  --color-brand-50: oklch(0.98 0.02 250);
  --color-brand-500: oklch(0.5 0.2 250);
  --color-brand-600: oklch(0.45 0.25 250);
  --color-brand-900: oklch(0.2 0.3 250);
  
  /* WooCommerce Specific */
  --color-success-500: oklch(0.6 0.15 140);
  --color-error-500: oklch(0.55 0.22 25);
  
  /* Typography */
  --font-display: "Inter", sans-serif;
  --font-body: "Inter", sans-serif;
}

@layer base {
  /* Global typography */
}

@layer components {
  /* WooCommerce components (.btn, .card) */
}

@layer utilities {
  /* Custom utilities */
}
```

---

## 🎨 UUED VÕIMSAD FUNKTSIONAALSUSED

### **Dynamic Utilities - Konfiguratsioonivaba**
```html
<!-- Iga grid-cols arv töötab -->
<div class="grid grid-cols-15">

<!-- Iga data atribuut töötab -->
<div data-current class="data-current:opacity-100">

<!-- Iga spacing väärtus töötab -->
<div class="mt-17 w-29 px-23">
```

### **Container Queries - Sisseehitatud**
```html
<div class="@container">
  <div class="grid-cols-1 @sm:grid-cols-3 @lg:grid-cols-4">
    <!-- Responsive based on container, not viewport -->
  </div>
</div>

<!-- Max-width queries -->
<div class="@container">
  <div class="grid-cols-3 @max-md:grid-cols-1">
  </div>
</div>
```

### **3D Transforms**
```html
<div class="perspective-1000 rotate-x-45 rotate-y-30 transform-3d">
  <!-- Full 3D support -->
</div>
```

### **Advanced Gradients**
```html
<!-- Angle gradients -->
<div class="bg-linear-45 from-blue-500 to-red-500">

<!-- Color interpolation -->
<div class="bg-linear-to-r/oklch from-blue-500 to-red-500">

<!-- Conic gradients -->
<div class="bg-conic from-red-500 via-yellow-500 to-red-500">

<!-- Radial gradients -->
<div class="bg-radial-[at_25%_25%] from-white to-black">
```

---

## ⚠️ BREAKING CHANGES

### **Eemaldatud Utilities**
```html
<!-- VANA v3.x -->
<div class="text-opacity-50">           ❌
<div class="flex-grow">                 ❌
<div class="decoration-slice">          ❌

<!-- UUS v4.0 -->
<div class="text-black/50">             ✅
<div class="grow">                      ✅
<div class="box-decoration-slice">      ✅
```

### **Ring Defaults**
- Default ring: 3px → 1px
- No default border color

---

## 🎯 BLANKPAGE MIGRATSIOONIPLAAN

### **SAMM 1: Tehnilised Muudatused**
- [ ] Update Vite config @tailwindcss/vite-ga
- [ ] Convert tailwind.config.js → CSS @theme
- [ ] Update app.css struktuuri

### **SAMM 2: WooCommerce Components Audit**
- [ ] Review kõik product card'id → dynamic utilities
- [ ] Update button components → uued gradient APIs
- [ ] Implement container queries responsive design'ile

### **SAMM 3: Performance Optimization**
- [ ] Leverage automatic content detection
- [ ] Utilize CSS variables süsteemi
- [ ] Test build speed improvements

### **SAMM 4: Design System Enhancement**
- [ ] OKLCH colors Estonian brand'ile
- [ ] 3D transforms product gallery'le
- [ ] Advanced gradients CTA buttons'tele

---

## 📚 VÄÄRTUSLIKUD VIITED

- **Ametlik Blog:** https://tailwindcss.com/blog/tailwindcss-v4
- **Theme Documentation:** https://tailwindcss.com/docs/theme
- **Container Queries:** https://tailwindcss.com/docs/responsive-design
- **Migration Guide:** https://tailwindcss.com/docs/upgrade-guide
- **Vite Plugin:** https://tailwindcss.com/docs/installation/using-vite

---

## 🚨 OLULISED MÄRKUSED

### **BLANKPAGE PROJEKTILE:**
1. **Kasuta ALATI Vite plugin'i** - meil on juba Vite setup
2. **CSS-first konfiguratsiooni** - enam mitte JS config faile
3. **Estonian brand colors OKLCH formaadis** - laiem värvigamm
4. **Container queries WooCommerce responsive design'ile**
5. **Dynamic utilities kõikjal võimalik** - vähenda custom CSS

### **JÄRGMISED SAMMUD:**
1. ✅ Dokumentatsioon loodud
2. 🔄 Project overview uuendamine (järgmine)
3. 📋 Existing design audit planeerimine
4. 🚀 Implementation v4.0 best practices'iga

---

**Viimati uuendatud:** 30. Juuni 2025  
**Staatus:** ✅ Production Ready Guidelines  
**Autor:** Cascade AI (BlankPage v0.5 projekt)
