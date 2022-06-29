<?php
/**
 * Template part for a fullwidth slider with glide.js
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package advist-mpk
 */

?>

<div class="glide glide--landing glide--fullwidth glide--fullheight">
  <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides">
      <?php
      //  now here a repeater field should possibly be used, for the end-user to add in as many slides as they wish
      //  if none, test before outputting anything from this template and abort
      //  right now it's being tested in the template displaying the part

      $slider = get_field('slider');

      foreach($slider as $index => $slide) {
        $heading = $slide['naglowek'];
        $content = $slide['zawartosc'];
        $btn = $slide['przycisk'];
        $img = $slide['obraz'];
        ?>

      <li class="glide__slide">
        <div class="slide">
          <h3 class="slide__heading"><?php echo($heading)?></h3>
          <p class="slide__content"><?php echo($content)?></p>
          <a href="<?php echo($btn['url'])?>" class="slide__link"><?php echo($btn['tekst']) ?></a>
        </div>
        <picture class="slide__img">
          <!-- mobile -->
          <source srcset='<?php echo($img['sizes']['medium_large']); ?>'
            media='(max-width: <?php echo($img['sizes']['medium_large-width']); ?>px)'>
          <!-- large -->
          <source srcset='<?php echo($img['sizes']['2048x2048']); ?>'
            media='(min-width: <?php echo($img['sizes']['large-width']); ?>px)'>
          <img src="<?php echo($img['sizes']['2048x2048']); ?>" alt="<?php echo($img['alt']); ?>">
        </picture>
      </li>

      <?php } ?>

    </ul>
  </div>

  <div class=" glide__bullets" data-glide-el="controls[nav]">

    <?php if ($slides = get_field('slider')) {
      for($i = 0; $i < sizeof($slides); $i++) { ?>

    <button class="glide__bullet" data-glide-dir="=<?php echo($i);?>"></button>

    <?php } ?>
    <?php } ?>

  </div>

  <?php if (! empty(get_field('socials'))) {
  
    $socials = get_field('socials');
    
    $instagram = $socials['instagram'];
    $twitter = $socials['twitter'];
    $facebook = $socials['facebook'];
    $www = $socials['www'];
    ?>

  <div class="glide__socials">

    <?php if ($instagram) { ?>
    <a href="<?php echo($instagram);?>" class="social__icon"><i class="fab fa-instagram"></i>
    </a>
    <?php } ?>

    <?php if ($twitter) { ?>
    <a href="<?php echo($twitter);?>" class="social__icon"><i class="fab fa-twitter"></i>
    </a>
    <?php } ?>

    <?php if ($facebook) { ?>
    <a href="<?php echo($instagram);?>" class="social__icon"><i class="fab fa-facebook-f"></i>
    </a>
    <?php } ?>

    <?php if ($www) { ?>
    <a href="<?php echo($www);?>" class="social__icon"><i class="fas fa-globe-americas"></i>
    </a>
    <?php } ?>
  </div>

  <?php } ?>

  <a href="#o-nas" class="scroll-down"><i class="fas fa-chevron-down"></i></a>

</div>