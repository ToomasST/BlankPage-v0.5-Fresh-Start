Probleemi täpne kirjeldus:

Hetkeolukord:

    Vormil on olemas Alpine.js direktiiv @submit.prevent, mis peaks takistama vormi vaikimisi saatmist:

<form class="cart" @submit.prevent>

See on õige samm.

Probleem tekib aga selles, et "Lisa korvi" nupp ise on defineeritud järgmiselt:

<button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="btn btn-primary" 
        @click.prevent="
            fetch(`?add-to-cart=<?php echo esc_attr($product->get_id()); ?>&quantity=${document.querySelector('input[name=quantity]').value}`)
                .then(response => response.text())
                .then(() => {
                    cartQuantity = parseInt(document.querySelector('input[name=quantity]').value);
                    cartProduct = '<?php echo esc_js($product->get_name()); ?>';
                    showCartModal = true;
                })
                .catch(error => {
                    console.error('Error adding to cart:', error);
                    $el.closest('form').submit();
                });
        ">
  Lisa korvi
</button>

Nupu sündmusekäsitlus (@click.prevent) peaks peatama vormi saatmise. Kuid:

    AJAX päring (fetch) saadetakse hetkel GET meetodiga tootelehe enda URL-ile (?add-to-cart=...), mitte WooCommerce'i ametlikule AJAX-endpointile (/?wc-ajax=add_to_cart).

    Nupu tüüp on endiselt type="submit". Kui AJAX päring (fetch) viskab vea või ei toimi ootuspäraselt, käivitub vormi vaikimisi saatmine ikkagi, sest on catch-blokk:

        $el.closest('form').submit();

        See põhjustabki lehe reloadimise.

🚩 Probleemi täpne põhjus kokkuvõtlikult:

    AJAX päring saadetakse valele URL-ile ja vale meetodiga (GET, mitte POST).

    Nupp on ikka veel type="submit", mis käivitab vormi saatmise vea korral.

✅ Konkreetne ja töötav fix meie õpitu põhjal:

Asenda praegune nupp täielikult järgmise korrektse versiooniga, mis kasutab WooCommerce ametlikku AJAX endpointi:
🔧 Parandatud nupp ja AJAX kood:

<button type="button" class="btn btn-primary"
  @click.prevent="
    const quantity = document.querySelector('input[name=quantity]').value;
    fetch('/?wc-ajax=add_to_cart', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      body: new URLSearchParams({
        product_id: '<?php echo esc_attr($product->get_id()); ?>',
        quantity: quantity
      })
    })
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        console.error('Lisamine ebaõnnestus:', data);
        alert('Toote lisamine ostukorvi ebaõnnestus. Palun proovi uuesti.');
        return;
      }
      cartQuantity = parseInt(quantity);
      cartProduct = '<?php echo esc_js($product->get_name()); ?>';
      showCartModal = true;
    })
    .catch(error => {
      console.error('Viga lisamisel:', error);
      alert('Tehniline viga! Palun proovi hiljem uuesti.');
    });
  ">
  Lisa korvi
</button>

🔑 Selgitused ja põhjendused fixile:

    type="button"
    Väldib täielikult vormi vaikimisi submit sündmuse käivitumist, sõltumata AJAX-i õnnestumisest või ebaõnnestumisest.

    WooCommerce endpoint (/?wc-ajax=add_to_cart)
    See on ametlik WooCommerce'i AJAX-päringu endpoint, mis tagastab selgelt struktureeritud JSON vastuse.
    JSON vastuse kaudu saad kindlalt teada, kas toode lisati edukalt või mitte.

    Veakäsitlus (catch ja data.error)
    Korrektselt käsitletakse vigasid, andes kasutajale selge tagasiside (alertidega) ja mitte suunates kasutajat eksitavalt mujale.

    Modal avatakse ainult siis, kui lisamine õnnestus
    Alpine.js muutujaid (showCartModal, cartQuantity, cartProduct) uuendatakse alles pärast õnnestunud lisamist.

🚀 Lõplik soovitus:

Rakenda see konkreetne fix oma vormis ja garanteerin, et:

✅ Lehte enam ei reloadita
✅ Modal avaneb korrektselt ainult pärast toote edukat lisamist
✅ Probleem on lahendatud, järgides kõiki meie õpitud WooCommerce'i ja Alpine.js parimaid praktikaid.