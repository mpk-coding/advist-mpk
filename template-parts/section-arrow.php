<?php
/**
 * Template part for a styled section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package advist-mpk
 */

?>
<?php
  $section = get_field('sekcja_ze_strzalka');
  
  $header = $section['naglowek'];
  $content = $section['zawartosc'];
  $img = $section['obraz'];
  
  ?>
<section class="arrow col-12">
  <picture class="arrow__img">
    <!-- mobile -->
    <source srcset='<?php echo($img['sizes']['medium_large']); ?>'
      media='(max-width: <?php echo($img['sizes']['medium_large-width']); ?>px)'>
    <!-- large -->
    <source srcset='<?php echo($img['sizes']['2048x2048']); ?>'
      media='(min-width: <?php echo($img['sizes']['large-width']); ?>px)'>
    <img src="<?php echo($img['sizes']['2048x2048']); ?>" alt="<?php echo($img['alt']); ?>">
  </picture>
  <div class="arrow__content">
    <h2 class="arrow__heading section__heading">
      <?php echo($header)?>
    </h2>
    <p class="arrow__text section__text">
      <?php echo($content)?>
    </p>
  </div>
</section>