<?php
/**
 * Template part to render picture elements
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package advist-mpk
 */

?>

<?php if($args) {
  $classes = $args['classes'];
  $img_array = $args['img_array'];
}?>
<picture class="<?php echo($classes); ?>">
  <!-- mobile -->
  <source srcset='<?php echo($img_array['sizes']['medium_large']); ?>'
    media='(max-width: <?php echo($img_array['sizes']['medium_large-width']); ?>px)'>
  <!-- large -->
  <source srcset='<?php echo($img_array['sizes']['2048x2048']); ?>'
    media='(min-width: <?php echo($img_array['sizes']['large-width']); ?>px)'>
  <img src=" <?php echo($img_array['sizes']['2048x2048']); ?>" alt="<?php echo($img_array['alt']); ?>">
</picture>