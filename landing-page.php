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

</div>

<div class="col">
  <section>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta dolores nihil ducimus enim autem ut iusto
    numquam corporis neque, sint perferendis voluptate. Consequuntur alias suscipit officia odio incidunt quis
    tenetur!
  </section>
  <section>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus nam laudantium, inventore hic dolores
    obcaecati tempora cupiditate atque numquam, officia adipisci enim natus aliquid! Aliquam sit omnis dignissimos
    voluptatum facere.</section>
</div>

<?php
get_footer();