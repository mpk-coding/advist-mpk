<?php
/**
 * Template Name: landing-page
 */

get_header();?>

<div class="col-12 p-0">
  <section class='row m-0'>
    <?php if (! empty (get_field('slider')) ) {
      get_template_part('template-parts/slider', 'landing'); 
    }
    ?>
  </section>

  <?php if (! empty (get_field('sekcja_ze_strzalka')) ) { ?>

  <div id='o-nas' class='row m-0'>

    <?php get_template_part('template-parts/section', 'arrow'); ?>

  </div>

  <div id='oferta' class='row m-0'>

    <?php 
    //  preferably displays links to custom post type - oferta which are separate posts further describing the posts on offer
    //  I'd simplify the creation via custom post type UI plugin, similar to ACF
    //  a WP Query would be st to get a certain number or all posts of that type and laid out in the slider template, with links to those posts
    get_template_part('template-parts/section', 'offer'); ?>

  </div>

  <?php } ?>

  <div id="aktualnosci" class="row m-0">

    <?php get_template_part('template-parts/section', 'news'); ?>
  </div>

</div>

<?php
get_footer();