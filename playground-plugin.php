<?php
/**
* Plugin Name: Playground Plugin
* Description: Just to try things
* Author: Sebastian Schaefer
* Version: 0.0.1
* License: GLPv2
*/


//Exit if accessed directly
if( !defined('ABSPATH')){
  exit;
}


// Removing the wordpress news on the dashboard
function iddt_remove_dashboard_widget() {
  remove_meta_box('dashboard_primary','dashboard','postbox');
}

add_action('admin_init','iddt_remove_dashboard_widget');


//adding google analytics to top bar
function iddt_add_google_analytics(){

  global $wp_admin_bar;
  $wp_admin_bar->add_menu( array(
    'id' => 'google_analytics',
    'title' => 'Google Analytics',
    'href' => 'https://www.google.de/intl/de/analytics/'
  ));

}
add_action('wp_before_admin_bar_render','iddt_add_google_analytics');


//Adding costum post type
function iddt_register_post_type(){

  $singular = 'Job Listin';
  $plural = 'Job Listins';

  $labels = array(
    'name'               => $plural,
    'singular_name'      => $singular,
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New ' . $singular,
    'edit'               => 'Edit',
    'edit_item'          => 'Edit ' . $singular,
    'new_item'           => 'New ' . $singular,
    'view'               => 'View ' . $singular,
    'view_item'          => 'View ' . $singular,
    'search_term'        => 'Search ' . $plural,
    'parent'             => 'Parent ' . $singular,
    'not_found'          => 'No ' . $plural .' found',
    'not_found_in_trash' => 'No ' . $plural .' in Trash'
  );

  $args = array(
  		'labels'              => $labels,
  	        'public'              => true,
  	        'publicly_queryable'  => true,
  	        'exclude_from_search' => false,
  	        'show_in_nav_menus'   => true,
  	        'show_ui'             => true,
  	        'show_in_menu'        => true,
  	        'show_in_admin_bar'   => true,
  	        'menu_position'       => 10,
  	        'menu_icon'           => 'dashicons-businessman',
  	        'can_export'          => true,
  	        'delete_with_user'    => false,
  	        'hierarchical'        => false,
  	        'has_archive'         => true,
  	        'query_var'           => true,
  	        'capability_type'     => 'post',
  	        'map_meta_cap'        => true,
  	        // 'capabilities' => array(),
  	        'rewrite'             => array(
  	        	'slug' => $slug,
  	        	'with_front' => true,
  	        	'pages' => true,
  	        	'feeds' => true,
  	        ),
  	        'supports'            => array(
  	        	'title',
  	        	'editor',
  	        	'author',
  	        	'custom-fields'
  	        )
  	);

  register_post_type('job', $args);
}
add_action('init', 'iddt_register_post_type');


?>
