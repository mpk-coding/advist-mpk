<?php
function parent_style() {
  //  load parent style.css
  wp_enqueue_style( "parent-style" , get_template_directory_uri() . "/style.css" );  
}
//  enqueque parent theme's css
add_action( 'wp_enqueue_scripts', 'parent_style' );

function advist_scripts() {
  //  load custom style and script
  wp_enqueue_style( 'app-style',  get_stylesheet_directory_uri() . '/dist/app.css');
  wp_enqueue_script( 'app-script', get_stylesheet_directory_uri() . '/dist/app.js', array(), '1.0.0', true);
}
//  make sure child style and scripts are loaded as the last
//  prevents specificity issues with css
add_action( 'wp_enqueue_scripts', 'advist_scripts', 99 );

//  fn to accommodate the ACF image in menu items
function display_menu_image( $title, $item ) {
	if( is_object( $item ) && isset( $item->ID ) ) {
    //  the ACF field used to assign images to menu items
		$menu_image = get_field('menu_image', $item);
		if ( ! empty( $menu_image ) ) {
      if (in_array('menu__popup-toggle', $item->classes)) {
        $attribute = "data-popup='nav'";
      }
      //  change HTML output if image is set
			$title = "<img src='".$menu_image['url']."'".$attribute.">";
		}
	}
	return $title;
}

add_filter( 'nav_menu_item_title', 'display_menu_image', 10, 2 );