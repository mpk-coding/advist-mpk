<?php
/**
 * Template Name: landing-page
 */

get_header();?>

<div class="col-12 p-0">
  <section class='m-0 p-0'>
    <?php if (! empty (get_field('slider')) ) {
      get_template_part('template-parts/slider', 'landing'); 
    }
    ?>
  </section>
</div>

<div class="col">
  <section id='o-nas'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga minima eveniet velit aliquid, alias
    cumque
    blanditiis vitae dignissimos deleniti nesciunt inventore non voluptatibus, numquam maxime eligendi harum ducimus
    animi
    molestiae.</section>
  <section>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta dolores nihil ducimus enim autem ut iusto
    numquam corporis neque, sint perferendis voluptate. Consequuntur alias suscipit officia odio incidunt quis tenetur!
  </section>
  <section>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus nam laudantium, inventore hic dolores
    obcaecati tempora cupiditate atque numquam, officia adipisci enim natus aliquid! Aliquam sit omnis dignissimos
    voluptatum facere.</section>
</div>

<?php
get_footer();