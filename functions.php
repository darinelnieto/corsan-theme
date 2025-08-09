<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Theme Scripts
 * https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 */
function ditto_scripts() {
  wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/css/main.bundle.css' );
  wp_enqueue_style('bootstrap.css', get_template_directory_uri() . '/css/bootstrap.min.css');
  wp_enqueue_style('owl-carousel.css', get_template_directory_uri() . '/css/owl.carousel.min.css');
  wp_enqueue_style('font-awesome.css', get_template_directory_uri() . '/css/font-awesome.css');
  wp_enqueue_style('aos.css', get_template_directory_uri() . '/css/aos.css');

  wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/js/main.bundle.js', array( 'jquery' ), '', true );
  wp_enqueue_script('jquery.js', get_template_directory_uri() . '/js/jquery-3.5.1.min.js', true);
  wp_enqueue_script('bootstrap.js',  get_template_directory_uri() . '/js/bootstrap.min.js');
  wp_enqueue_script('owl-carousel.js', get_template_directory_uri() . '/js/owl.carousel.min.js');
  wp_enqueue_script('font-awesome.js', get_template_directory_uri() . '/js/font-awesome.js');
  wp_enqueue_script('aos.js', get_template_directory_uri() . '/js/aos.js');
  wp_register_script('custom.js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1', true);
  wp_enqueue_script('custom.js');
  wp_register_script('new-custom.js', get_template_directory_uri() . '/js/new-custom.js', array('jquery'), '1', true);
  wp_enqueue_script('new-custom.js');
}
add_action( 'wp_enqueue_scripts', 'ditto_scripts');

/**
 * Register Navigation Menus
 * https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
function ditto_navigation_menus() {
  $locations = array(
    'main_menu' => __( 'Main Menu', 'text_domain' )
  );
  register_nav_menus( $locations );
}
add_action( 'init', 'ditto_navigation_menus' );

/**
 * Theme support
 * https://developer.wordpress.org/reference/functions/add_theme_support/
 */
add_theme_support( 'custom-logo' );

/**
 * Login Styles
 */
function ditto_login_styles() { ?>
  <style type="text/css">
    body {
      background-color: #222 !important;
    }
    #login h1 a, .login h1 a {
      display: none;
    }
    #login h1 img {
      width: 100%;
      max-width: 240px;
      max-height: 180px;
    }
  </style>
  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) { 
      let loginImg = document.createElement("img");
        loginImg.src = "<?= get_template_directory_uri() ?>/images/pipe-code-logo.svg";
        loginImg.alt = "WordPress login image";
        document.querySelector('#login h1').appendChild(loginImg);
    });
  </script>
<?php }
add_action( 'login_enqueue_scripts', 'ditto_login_styles' );

/**
 * Install latest jQuery version 3.5.1
 */
if (!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"), false);
	wp_enqueue_script('jquery');
}

/**
 * Disable Gutenberg
 */
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);
/*========= Search form =========*/
function wpdocs_my_search_form($form)
{
  $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '" >
	<input type="text" value="' . get_search_query() . '" name="s" id="s" class="input-search" placeholder="Búsqueda..."/>
	<button id="searchsubmit" class="searchsubmit"><i class="fas fa-search"></i></button>
	</form>';

  return $form;
}
add_filter('get_search_form', 'wpdocs_my_search_form');
/*
*  Options
*/
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
	  'page_title'    => 'Options theme',
	  'menu_title'    => 'Options theme',
	  'menu_slug'     => 'theme-settings',
	  'capability'    => 'edit_posts',
	  'redirect'      =>  true
	));
  acf_add_options_sub_page(array(
    'page_title'     => 'Footer',
    'menu_title'     => 'Footer',
    'parent_slug'   => 'theme-settings',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Header',
    'menu_title'     => 'Header',
    'parent_slug'   => 'theme-settings',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Contact',
    'menu_title'     => 'Contact',
    'parent_slug'   => 'theme-settings',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Communities',
    'menu_title'     => 'Communities',
    'parent_slug'   => 'theme-settings',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Quote form',
    'menu_title'     => 'Quote form',
    'parent_slug'   => 'theme-settings',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Solutions nav',
    'menu_title'     => 'Solutions nav',
    'parent_slug'   => 'theme-settings',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => '404 page',
    'menu_title'     => '404 page',
    'parent_slug'   => 'theme-settings',
  ));
}
/*=========== Detección de dispositivo ===========*/
function definir_dispositivo_global() {
    global $es_movil;
    $es_movil = wp_is_mobile();
}
add_action('init', 'definir_dispositivo_global');
/*======== Products post type ========*/
add_theme_support('post-thumbnails');
add_post_type_support( 'products', 'thumbnail' );
function products_post()
{
  /*====== Argument post type =====*/
  $products = array(
    'public' => true,
    'has_archive' => true,
    'label'  => 'products',
    'menu_icon' => 'dashicons-products',
    'supports' => ['title', 'editor', 'thumbnail']
  );
  /*============ Register post type ============*/
  register_post_type('products', $products);
  /*============ Register taxonomy of products ============*/
   /*============ Argument taxonimy ============*/
   $labels = array(
    'name' => _x('Products category', 'taxonomy general name'),
    'singular_name' => _x('Products category', 'taxonomy singular name'),
    'search_items' =>  __('Search Products category'),
    'all_items' => __('All Products category'),
    'parent_item' => __('Parent Products category'),
    'parent_item_colon' => __('Parent Products category:'),
    'edit_item' => __('Edit Products category'),
    'update_item' => __('Update Products category'),
    'add_new_item' => __('Add New Products category'),
    'new_item_name' => __('New Products category Name'),
    'menu_name' => __('Products category'),
  );
  /*========== Register taxonomi ==========*/
  register_taxonomy('product_cat', array('products'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'product_cat'),
  ));
  /*============= Solutions cat filter =============*/
  /*============ Argument taxonimy ============*/
  $labels = array(
    'name' => _x('Solutions category', 'taxonomy general name'),
    'singular_name' => _x('Solutions category', 'taxonomy singular name'),
    'search_items' =>  __('Search Solutions category'),
    'all_items' => __('All Solutions category'),
    'parent_item' => __('Parent Solutions category'),
    'parent_item_colon' => __('Parent Solutions category:'),
    'edit_item' => __('Edit Solutions category'),
    'update_item' => __('Update Solutions category'),
    'add_new_item' => __('Add New Solutions category'),
    'new_item_name' => __('New Solutions category Name'),
    'menu_name' => __('Solutions category'),
  );
  /*========== Register taxonomi ==========*/
  register_taxonomy('solutions_cat', array('products'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'solutions_cat'),
  ));
};
add_action('init', 'products_post', 3);
/*============ Suports ===========*/
add_post_type_support( 'products', 'thumbnail' );
function suport_post(){
/*====== Argument post type =====*/
  $products = array(
    'public' => true,
    'has_archive' => true,
    'label'  => 'Soporte',
    'menu_icon' => 'dashicons-embed-post',
    'supports' => ['title', 'editor', 'thumbnail']
  );
  /*============ Register post type ============*/
  register_post_type('soporte', $products);
}
add_action('init', 'suport_post', 3);
/*============ Creating filter API by product category ============*/
add_action( 'rest_api_init', function () {
  register_rest_route( 'product', '/search', array(
      array(
          'methods'               => WP_REST_Server::READABLE,
          'callback'              => 'products_list_handler',
          'permission_callback'   => '__return_true',          
      )
  ));
});
function products_list_handler( $request ){
  $params = $request->get_params();
  /*========== Query parameters ==========*/
  $query = [
    'post_type'         => 'products',
    's'                 => $params['name'],
    'post_status'       => 'publish',
  ];
  /*========== Query =========*/
  $news = new WP_Query($query); 
  /*========== Response order ==========*/
  $products = array();
  while ($news->have_posts()) {
    $news->the_post();
    array_push($products, array(
      'title'         => get_the_title(get_the_id()),
      "thumbnail"     => get_the_post_thumbnail_url(get_the_id()),
      'permalink'     => get_permalink(get_the_id()),
    ));
    wp_reset_postdata();
  }
  return $products;
}
/*========= Community custo post tyoe =========*/
add_theme_support('post-thumbnails');
add_post_type_support( 'communities', 'thumbnail' );
function community_post(){
  /*====== Argument post type =====*/
  $community = [
    'public' => true,
    'has_archive' => true,
    'label'  => 'community',
    'menu_icon' => 'dashicons-groups',
    'supports' => ['title', 'editor', 'thumbnail']
  ];
  /*============ Register post type ============*/
  register_post_type('communities', $community);
  /*============ Argument taxonimy ============*/
  $labels = [
    'name' => _x('Comunity category', 'taxonomy general name'),
    'singular_name' => _x('Comunity category', 'taxonomy singular name'),
    'search_items' =>  __('Search Comunity category'),
    'all_items' => __('All Comunity category'),
    'parent_item' => __('Parent Comunity category'),
    'parent_item_colon' => __('Parent Comunity category:'),
    'edit_item' => __('Edit Comunity category'),
    'update_item' => __('Update Comunity category'),
    'add_new_item' => __('Add New Comunity category'),
    'new_item_name' => __('New Comunity category Name'),
    'menu_name' => __('Comunity category'),
  ];
  /*========== Register taxonomi ==========*/
  register_taxonomy('community_cat', array('communities'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'community_cat'),
  ));
}
add_action('init', 'community_post', 4);
// Custom table to save sync logs
function likes_custom_table() {
  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();
  $table_name = $wpdb->prefix . 'likes_counter';
  $sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    ip_user LONGTEXT NOT NULL,
    post_id mediumint(9) NOT NULL,
    UNIQUE KEY id (id)
  ) $charset_collate";
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta( $sql );
}
add_action('init', 'likes_custom_table');
// Endpoints likes
add_action('rest_api_init', 'likes');
function likes(){
  register_rest_route('/get', '/likes', array(
    'methods' => 'GET',
    'callback' => 'get_likes'
  ));
  register_rest_route('/post', '/likes', array(
    'methods' => 'POST',
    'callback' => 'post_likes'
  ));
}
function get_likes($data){
  global $wpdb;
  $post_id = $data['post_id'];
  $likes = $wpdb->prefix . 'likes_counter';
  $result = $wpdb->get_results( "SELECT * FROM $likes WHERE `post_id` =  $post_id" );
  return $result;
}
// Post like
function post_likes($data){
  global $wpdb;
  $table_name = $wpdb->prefix . 'likes_counter';
  $post_id = $data['post_id'];
  $ip_user = $data['ip_user'];
  $validate = $wpdb->get_results( "SELECT * FROM $table_name WHERE `ip_user` =  '$ip_user' AND `post_id` =  $post_id" );
  if(!$validate){
    $wpdb->insert($table_name, array('ip_user' => $ip_user, 'post_id' => $post_id));
    $result = $wpdb->get_results( "SELECT * FROM $table_name WHERE `post_id` =  $post_id" );
    return $result;
  }else{
    return new WP_REST_Response( '', 403 );
  }
}