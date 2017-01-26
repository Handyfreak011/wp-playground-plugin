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

  $args = array('public' => true, 'label' => 'Job List');
  register_post_type('job', $args);
}
add_action('init', 'iddt_register_post_type');


?>
