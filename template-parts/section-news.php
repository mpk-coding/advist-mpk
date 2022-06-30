<?php
/**
 * Template part to render blog on the landing-page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package advist-mpk
 */

?>

<section class="news col-12 px-0">
  <div class="container d-flex flex-column">
    <h2 class="section__heading">Aktualności</h2>
    <div class="news__items row mx-0">
      <?php

      $args = array(
        'post_type' => 'post',
        'post_count' => '4',
        'paged' => 1);
      $news = new WP_Query($args);

      if($news->have_posts()) {
        while ($news->have_posts()) : $news->the_post();
            //print_r($post);
            // $news->the_post();
            $thumb = get_the_post_thumbnail(null, 'medium');
            //  this could just be the excerpt or any ACF field assigned to a post type
            $caption = wp_trim_words(apply_filters('the-content',get_the_content( '', false)), 13, '...');
            //  adding ellipsis here, instead of fiddling with css
            //  so at values like 140 things I don't uderstand happen and the whole loop goes bad
            //  also, the reading is innaccurate, when set to 86 it trims to shorter lengths than that
      ?>

      <div class="news__single">
        <div class="news__thumb">
          <?php if ($thumb) { 
            echo($thumb);
            } ?>
        </div>
        <div class='news__caption'>
          <?php if ($caption){
            echo($caption);
          } ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="btn btn--solid news__link">Czytaj więcej</a>

      </div>

      <?php endwhile; ?>
    </div>
    <?php } else { ?>

    <div class="news__items">
      <span class="news__error">Przepraszamy, nie udało się znaleźć żadnych wpisów.</span>
    </div>

    <?php } ?>
    <a href="" class="btn btn--shrink news__more">Pokaż więcej</a>
  </div>
</section>