<?php
function firstTheme(){ // add style file into the theme;
  wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'firstTheme');


// Get top ancestor id

function get_top_ancestor_id(){
  global $post;
  if($post->post_parent){
    $ancestors = array_reverse(get_post_ancestors($post->ID));
      return $ancestors[0];
  }
  return $post->ID;
}

// check page has children
function has_children(){
  global $post;
  $pages = get_pages('child_of=' .$post->ID);
    return count($pages);
}

//customize excerpt
function custom_excerpt_length(){
  return 30;
}
add_filter('excerpt_length', 'custom_excerpt_length'); // add a hook


//theme setup, add features to theme;
function WP_theme_setup(){
  // Navigation Menus (to register menus locations);
  // then we can control from WP admin;
  register_nav_menus(array(
    'primary' => __('Primary Menu'),
    'footer' => __('Footer Menu'),
  ));

  // add feature image support
  add_theme_support('post-thumbnails');
  add_image_size('small-thumbnail', 180, 120, true); // set feature image size;
  add_image_size('banner-image', 920, 210, array('left', 'top')); // set feature image size;

  // add post format support
  add_theme_support('post-formats', array('aside', 'gallery', 'link'));

}
add_action('after_setup_theme', 'WP_theme_setup');

// register widget
function arphabet_widgets_init() {

	register_sidebar( array( // register sidebar widget location
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

  register_sidebar( array(
    'name' => 'Footer Area1',
    'id' => 'footer-area-1',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ) );
  register_sidebar( array(
    'name' => 'Footer Area2',
    'id' => 'footer-area-2',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ) );
  register_sidebar( array(
    'name' => 'Footer Area3',
    'id' => 'footer-area-3',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ) );
  register_sidebar( array(
    'name' => 'Footer Area4',
    'id' => 'footer-area-4',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

//customize appearance options stars here ***
function customize_options_register($wp_customize){
  $wp_customize->add_setting('wp_link_color', array(
    'default' => '#006ec3',
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('wp_btn_color', array(
    'default' => '#006ec3',
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('wp_btn_hover_color', array(
    'default' => '#258ad7',
    'transport' => 'refresh',
  ));
  $wp_customize->add_section('wp_standard_color', array(
    'title' => __('Standard Colors', 'myFirstTheme'),
    'priorty' => 30,
  ));
  $wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'wp_link_color_control', array(
    'label' => __('Link Color', 'myFirstTheme'),
    'section' => 'wp_standard_color',
    'settings' => 'wp_link_color',
  )));
  $wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'wp_btn_color_control', array(
    'label' => __('Button Color', 'myFirstTheme'),
    'section' => 'wp_standard_color',
    'settings' => 'wp_btn_color',
  )));
  $wp_customize->add_control(new WP_Customize_Color_control($wp_customize, 'wp_btn_hover_color_control', array(
    'label' => __('Button Hover Color', 'myFirstTheme'),
    'section' => 'wp_standard_color',
    'settings' => 'wp_btn_hover_color',
  )));
}
add_action('customize_register', 'customize_options_register');

//ouptput customize css on Dashoboard Appearance Customize
function customizeCSS(){ ?>
  <style type='text/css'>
  a:link,
  a:visited{
    color: <?php echo get_theme_mod('wp_link_color'); ?>;
  }

  .site-header nav ul li.current-menu-item a:link,
  .site-header nav ul li.current-menu-item a:visited,
  .site-header nav ul li.current-page-ancestor a:link,
  .site-header nav ul li.current-page-ancestor a:visited {
    background: <?php echo get_theme_mod('wp_link_color'); ?>;
  }

   .btn {
    background: <?php echo get_theme_mod('wp_btn_color'); ?>;
  }

  .btn:hover {
   background: <?php echo get_theme_mod('wp_btn_hover_color'); ?>;
 }

  </style>
<?php }
add_action('wp_head', 'customizeCSS');
//customize appearance options finish here ***

 ?>
