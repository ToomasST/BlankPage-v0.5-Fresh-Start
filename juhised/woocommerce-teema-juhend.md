
# WooCommerce-toega kohandatud WordPressi teema seadistamine

WooCommerce’i lisamine oma WordPressi teemale võimaldab luua e-poe funktsionaalsuse koos ostukorvi ja kassaga. Oma custom-teemasse WooCommerce toe lisamiseks tuleb teemas teha mõned eriseadistused ning järgida kindlat struktuuri. Alljärgnevas õpetuses selgitame samm-sammult, kuidas registreerida teemas WooCommerce tugi, kuidas ülekirjutada WooCommerce’i mallifaile (sh ostukorvi ja kassa lehti) ning kuidas vältida levinud vigu. Lisaks toome välja näidisfailide struktuuri ja parimad praktikad, et hoida teema ühilduvana WooCommerce’i uuendustega. Õpetus on mõeldud arendajale, kes loob nullist WooCommerce’iga ühilduvat kohandatud teemat.

## WooCommerce toe registreerimine teema functions.php failis

Ennekõike peab teema **deklareerima WooCommerce toe**, et WooCommerce teaks kasutada teema kohandatud malle. Seda tehakse `functions.php` failis WordPressi teema seadistamisel. Lisage teema `functions.php` faili järgmine kood: 

```php
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
```

Ülaltoodud kood registreerib teema WooCommerce’i toetuse kohe pärast teema seadistamist. Oluline on kasutada `after_setup_theme` hook’i, mitte `init` hook’i, tagamaks, et teema tugi registreeritakse õigel ajal. Pärast selle lisamist hakkab WooCommerce kontrollima teie teemas spetsiaalset `woocommerce` kausta ning eeldab, et teema on e-poe funktsioonide jaoks valmis.

**Lisaks**: Võimalik on teema toe deklareerimisel määrata ka WooCommerce’i pildisuurused ja tooteteema paigutuse seaded. Näiteks saab `add_theme_support('woocommerce', {...})` teisele parameetrile anda massiivi kohandustega (nt `thumbnail_image_width`, `product_grid` jms). Samuti, alates WooCommerce 3.0+ versioonidest on võimalik eraldi deklareerida tugi tootegaleriide funktsioonidele (zoom, lightbox, slider).

```php
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
```

Need pole kohustuslikud, kuid lubavad teema puhul kasutada WooCommerce’i zoom’i, modaalakna ja liuguri funktsioone tootepiltidel, hoides skriptid laadimata, kui toe deklareerimata jätate.

## WooCommerce mallifailid ja ülekirjutatavad mallid

WooCommerce kasutab oma **mallifaile** (template files) veebipoe erinevate osade kuvamiseks – tootelehed, poesektsioonid, ostukorv, kassa, kasutajakonto lehed, e-kirjad jpm. Kõik need mallid asuvad WooCommerce’i plugina kaustas: `wp-content/plugins/woocommerce/templates/`. Näiteks: 

- **Toodete arhiiv (pood)** – mallifail **archive-product.php**
- **Toote üksikleht** – mall **single-product.php**
- **Ostukorvi leht** – mall **cart.php** (asub alamkaustas `templates/cart/cart.php`)
- **Kassa (checkout) leht** – põhimalle on **form-checkout.php** (asub `templates/checkout/form-checkout.php`)
- **Kasutaja konto lehed** – alamkaustas `templates/myaccount/`
- **E-kirjade mallid** – alamkaustas `templates/emails/`

Kõiki WooCommerce’i mallifaile saab ülekirjutada. Selleks looge oma teema sisse kaust **woocommerce** ja kopeerige sinna vajalik mall (sama kataloogistruktuuriga) – WooCommerce eelistab teie faili plugina omale.

> Näide: ostukorvi malli kohandamiseks kopeerige  
> `wp-content/plugins/woocommerce/templates/cart/cart.php`  
> oma teema kataloogi  
> `wp-content/themes/TeemaNimi/woocommerce/cart/cart.php`

WooCommerce’i süsteemiraport hoiatab, kui mõni ülekirjutatud mall on vananenud (core versioon uuem). Sel juhul võrrelge uusimat WooCommerce’i malli oma versiooniga ja tehke vajalikud muudatused.

## Kohandatud WooCommerce mallide lisamine teema kausta

1. Loo teema juurkausta **woocommerce** alamkaust.
2. Kopeeri mall plugina `templates` kaustast teema **woocommerce** kausta, säilitades alamkaustad.
3. Muuda kopeeritud faili vastavalt vajadusele.  
   *Jälgi, et ei eemalda WooCommerce’i hook’e (nt `do_action()` või `woocommerce_*` funktsioone), kui pole kindel, mida need teevad!* 

## Näidisstruktuur teema kaustale

```
mytheme/
├── functions.php
├── style.css
├── header.php
├── footer.php
├── ...
└── woocommerce/
    ├── cart/
    │   └── cart.php
    ├── checkout/
    │   └── form-checkout.php
    ├── archive-product.php
    └── single-product.php
```

## Kontrollnimekiri levinud vigadest

- [ ] **WooCommerce tugi registreerimata** functions.php failis  
- [ ] **Vale kaust/tee** (peab olema `woocommerce/…`)  
- [ ] **Plokk-ostukorv/kassa aktiivne**, kuid muudate klassikalisi malle  
      - Keelake blokid filtritega `woocommerce_blocks_enable_cart` ja `woocommerce_blocks_enable_checkout`, kui soovite kasutada shortcode-põhist lahendust.  
- [ ] **Hook’ide eemaldamine** mallidest (nt `woocommerce_checkout_order_review`)  
- [ ] **Vanad mallid** pärast WooCommerce’i uuendust (kontrolli System Status)  
- [ ] **Child-teema** puudub 3. osapoole teema kohandamisel  
- [ ] **`the_content()` puudu** page/index mallides, mistõttu WooCommerce sisu ei kuvata  

## Parimad praktikad

1. **Eelista hook’e ja filtreid** – kopeeri malli vaid siis, kui struktuuri pole muud moodi võimalik muuta.  
2. **Kopeeri ainult vajalikud mallid** – hoiab hoolduse minimaalne.  
3. **Hoia end kursis** WooCommerce’i release note’idega – värskenda vananenud malle.  
4. **Modulaarne kood** – paiguta WooCommerce-spetsiifilised funktsioonid eraldi faili.  
5. **Testi ostuprotsessi** – kontrolli sõnumeid, kogusummasid, kuvatavaid veateateid.  
6. **Stiilide haldus** – vajadusel keela WooCommerce’i default CSS filtriga  
   `add_filter( 'woocommerce_enqueue_styles', '__return_false' );`  

## Näited: ostukorvi ja kassa malli kohandamine

### Ostukorvi lehel sõnumi lisamine

Teie teemas `woocommerce/cart/cart.php`:

```php
<!-- Ostukorvi tabel lõpp -->
</table>

<div class="cart-custom-message">
    <p>Tere tulemast meie poodi! Täname, et sirvite meie tootevalikut.</p>
</div>

<?php do_action( 'woocommerce_after_cart_table' ); ?>
```

### Kassa lehel juhis enne vormi

Teemas `woocommerce/checkout/form-checkout.php`:

```php
<?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>

<div class="checkout-note">
    <p>Palun veendu, et kontakt- ja tarneandmed on õiged enne tellimuse vormistamist.</p>
</div>

<form name="checkout" method="post" class="checkout woocommerce-checkout"
      action="<?php echo esc_url( wc_get_checkout_url() ); ?>"
      enctype="multipart/form-data">
```

## Kokkuvõte

WooCommerce’i toega custom-teema loomisel:

1. **Registreeri tugi** `add_theme_support( 'woocommerce' )` abil.  
2. **Loo `woocommerce` kaust** teemas ja kopeeri ainult vajalikke malle.  
3. **Ära eemalda hook’e**, kasuta neid maksimaalselt ära.  
4. **Testi** ostukorvi ja kassa lehti põhjalikult.  
5. **Hoiad teema ajakohasena**, jälgides WooCommerce’i mallide muutusi.

Edukat arendamist!
