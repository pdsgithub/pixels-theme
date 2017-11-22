<?php

/*

@package pixels theme
============================
         ADMIN ENQUEUE FUNCTIONS
============================
*/

function pixels_load_admin_scripts($hook){
  //echo $hook;
  if( 'toplevel_page_pds_pixels' == $hook){

  wp_register_style('pixels_admin', get_template_directory_uri() . '/css/pixels.admin.css', array(), '1.0.0', 'all' );
  wp_enqueue_style('pixels_admin');

  wp_enqueue_media();

  wp_register_script('pixels-admin-script', get_template_directory_uri().'/js/pixels.admin.js',array('jquery'), '1.0.0', true);
  wp_enqueue_script('pixels-admin-script');
} else if('pixels_page_pds_pixels_css'== $hook){
     wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/pixels.ace.css', array(), '1.0.0', 'all' );

     wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.1', true );
     wp_enqueue_script( 'pixels-custom-css-script', get_template_directory_uri() . '/js/pixels.custom_css.js', array('jquery'), '1.0.0', true );

} else {return;}
}
add_action('admin_enqueue_scripts','pixels_load_admin_scripts');


/*

@package pixels theme
============================
         FRONT-END ENQUEUE FUNCTIONS
============================
*/

function pixels_load_scripts(){
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all' );
  wp_enqueue_style( 'pixels', get_template_directory_uri() . '/css/pixels.css', array(), '1.0.0', 'all' );
  wp_enqueue_style('raleway','https://fonts.googleapis.com/css?family=Raleway:200,300,500');

  wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri().'/js/jquery.js',false,'1.11.3', true);
  wp_enqueue_script('jquery');
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
  wp_enqueue_script( 'pixels', get_template_directory_uri() . '/js/pixels.js', array('jquery'), '1.0.0', true );
}
add_action('wp_enqueue_scripts','pixels_load_scripts');
