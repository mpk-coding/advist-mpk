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
  <?php advist_render_picture('arrow__img', $img); ?>
  <div class="arrow__content container">
    <h2 class="arrow__heading section__heading">
      <?php echo($header)?>
    </h2>
    <p class="arrow__text section__text">
      <?php echo($content)?>
    </p>
  </div>
</section>