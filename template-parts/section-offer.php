<?php
/**
 * Template part for a section dispaying the offer
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package advist-mpk
 */

?>

<section class="offer col-12 px-0">
  <div class="container">
    <h2 class="section__heading">Oferta</h2>
    <div class="offer__items">
      <div class="glide glide--offer">
        <div class="glide__track offer__track" data-glide-el="track">
          <ul class="glide__slides offer__slides">

            <?php if (! empty(get_field('sekcja_oferta'))) {
              $sekcja = get_field('sekcja_oferta');
              
              foreach($sekcja['pozycje'] as $index => $item) {
                $img = $item['obraz'];
                $caption = $item['podpis'];
                ?>

            <li class="glide__slide offer__slide">
              <div class="offer__single">
                <?php advist_render_picture('offer__img', $img); ?>
                <h3 class="offer__title">
                  <?php echo($caption)?>
                </h3>
              </div>
            </li>
            <?php } ?>
            <?php } ?>
          </ul>
        </div>

        <div class="glide__arrows offer__arrows" data-glide-el="controls">
          <button class="glide__arrow glide__arrow--left  offer__arrow offer__arrow--left" data-glide-dir="<"><i
              class="fas fa-chevron-left"></i></button>
          <button class="glide__arrow glide__arrow--right offer__arrow offer__arrow--right" data-glide-dir=">"><i
              class="fas fa-chevron-right"></i></button>
        </div>
      </div>

    </div>
  </div>
</section>
<?php if (! empty(get_field('sekcja_oferta'))) {
        $img = get_field('sekcja_oferta')['obraz_pod_pozycjami'];
        
        advist_render_picture('offer__background col-12 p-0', $img);
} ?>