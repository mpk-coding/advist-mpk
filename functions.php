<?php
function parent_style() {
  //  load parent style.css
  wp_enqueue_style( "parent-style" , get_template_directory_uri() . "/style.css" );  
}
//  enqueque parent theme's css
add_action( 'wp_enqueue_scripts', 'parent_style' );

function advist_scripts() {
  //  load custom style and script
  wp_enqueue_style( 'app-style',  get_stylesheet_directory_uri() . '/dist/app.css', 99 );
  wp_enqueue_script( 'app-script', get_stylesheet_directory_uri() . '/dist/app.js', array(), '1.0.0', true);
}
//  make sure child style and scripts are loaded as the last
//  prevents specificity issues with css
add_action( 'wp_enqueue_scripts', 'advist_scripts', 99 );