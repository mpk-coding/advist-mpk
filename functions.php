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

  //  glider.js
  wp_enqueue_style( 'glider-style', get_stylesheet_directory_uri() . '/src/vendors/css/glide.core.css');
  wp_enqueue_script( 'glider-script', get_stylesheet_directory_uri() . '/src/vendors/js/glide.min.js', array(), '1.0.0', true);
}
//  make sure child style and scripts are loaded as the last
//  prevents specificity issues with css
add_action( 'wp_enqueue_scripts', 'advist_scripts', 99 );

//  fn to accommodate the ACF image in menu items
function display_menu_image( $title, $item ) {
	if( is_object( $item ) && isset( $item->ID ) ) {
    //  the ACF field used to assign images to menu items
		$menu_image = get_field('menu_image', $item);
    $alt_attribute = get_field('alt_attribute', $item);
    $data_attribute = get_field('data_attribute', $item);
    $id_attribute = get_field('id_attribute', $item);
    
		if ( ! empty( $menu_image ) ) {
      //  change HTML output if image is set
			$title = "<img src='".$menu_image['url']."' ";
      
      if ( ! empty( $id_attribute)) {
        $title .= "id='".$id_attribute."' ";
      }

      if ( ! empty( $alt_attribute ) ) {
        //  add alt attribute
        $title .= "alt='".$alt_attribute."' ";      
      }
  
      if ( ! empty( $data_attribute ) ) {
        //  add data attribute
      	$title .= $data_attribute;      
      }
  
      $title .= "/>";
		}
	}
	return $title;
}

add_filter( 'nav_menu_item_title', 'display_menu_image', 10, 2 );

//  hide editor

function advist_editor_hide() {
	// Get the Post ID.
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	if( !isset( $post_id ) ) return;
  
  //  could possibly get them all from a specific folder on the server instead of having to manually update the array
  $advist_templates = ['landing-page.php'];
  
	// Get the name of the Page Template file.
	$template_file = get_post_meta($post_id, '_wp_page_template', true);

    if( in_array($template_file, $advist_templates) ) {
    	remove_post_type_support('page', 'editor');
    }
}

add_action( 'admin_init', 'advist_editor_hide' );

//  fn to render responsive pictures
//  $classes = STRING
//  $img_array = img array returned from ACF
function advist_render_picture($classes, $img_array) {
  get_template_part('template-parts/render', 'picture', array('classes' => $classes, 'img_array' => $img_array));
}

//  extending widget template
function register_widget_areas() {

  register_sidebar( array(
    'name'          => 'AdVIST Footer 4',
    'id'            => 'advist-footer-4',
    'description'   => 'This widget area discription',
    'before_widget' => '<section class="footer-area advist-footer-4">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));

  register_sidebar( array(
    'name'          => 'AdVIST Footer 5',
    'id'            => 'advist-footer-5',
    'description'   => 'This widget area discription',
    'before_widget' => '<section class="footer-area advist-footer-4">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));

}

add_action( 'widgets_init', 'register_widget_areas', 999 );