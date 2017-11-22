<?php

/*

@package pixels theme
============================
         ADMIN PAGE
============================
*/

function pixels_add_admin_page(){
  //Generate Pixels Admin Page
  add_menu_page('Pixels Theme Options','Pixels','manage_options','pds_pixels','pixels_theme_create_page', 'dashicons-admin-users',110);

  //Generate Pixels Sub-Menu Page
  add_submenu_page('pds_pixels','Pixels Sidebar Options','Sidebar','manage_options','pds_pixels','pixels_theme_create_page');
  add_submenu_page('pds_pixels','Pixels Theme Options','Theme Options','manage_options','pds_pixels_theme','pixels_theme_support_page');
  add_submenu_page( 'pds_pixels', 'pixels Contact Form', 'Contact Form', 'manage_options', 'pds_pixels_theme_contact', 'pixels_contact_form_page' );
  add_submenu_page('pds_pixels','Pixels CSS Options','Custom CSS','manage_options','pds_pixels_css','pixels_theme_setting_page');

}

// Activate custo Settings
  add_action('admin_init','pixels_custom_settings');

add_action('admin_menu','pixels_add_admin_page');

function pixels_custom_settings(){
  //Sidebar Options
   register_setting('pixels-settings-group','profile_picture');
   register_setting('pixels-settings-group','first_name');
   register_setting('pixels-settings-group','last_name');
   register_setting('pixels-settings-group','user_description');
   register_setting('pixels-settings-group','twitter_handler','pixels_sanitize_twitter_handler');
   register_setting('pixels-settings-group','facebook_handler');
   register_setting('pixels-settings-group','gplus_handler');

   add_settings_section('pixels-sidebar-options','Sidebar Option','pixels_sidebar_options','pds_pixels');


   add_settings_field('sidebar-profile-picture','Profile Picture','pixels_sidebar_profile','pds_pixels','pixels-sidebar-options');
   add_settings_field('sidebar-name','Full Name','pixels_sidebar_name','pds_pixels','pixels-sidebar-options');
   add_settings_field('sidebar-description','Description','pixels_sidebar_description','pds_pixels','pixels-sidebar-options');
   add_settings_field('sidebar-twitter','Twitter Handler','pixels_sidebar_twitter','pds_pixels','pixels-sidebar-options');
   add_settings_field('sidebar-facebook','Facebook Handler','pixels_sidebar_facebook','pds_pixels','pixels-sidebar-options');
   add_settings_field('sidebar-gplus','Google+ Handler','pixels_sidebar_gplus','pds_pixels','pixels-sidebar-options');

   //Theme Support Options
 	register_setting( 'pixels-theme-support', 'post_formats' );
 	register_setting( 'pixels-theme-support', 'custom_header' );
 	register_setting( 'pixels-theme-support', 'custom_background' );

 	add_settings_section( 'pixels-theme-options', 'Theme Options', 'pixels_theme_options', 'pds_pixels_theme' );

 	add_settings_field( 'post-formats', 'Post Formats', 'pixels_post_formats', 'pds_pixels_theme', 'pixels-theme-options' );
 	add_settings_field( 'custom-header', 'Custom Header', 'pixels_custom_header', 'pds_pixels_theme', 'pixels-theme-options' );
 	add_settings_field( 'custom-background', 'Custom Background', 'pixels_custom_background', 'pds_pixels_theme', 'pixels-theme-options' );


  //Contact Form Options
  	register_setting( 'pixels-contact-options', 'activate_contact' );

  	add_settings_section( 'pixels-contact-section', 'Contact Form', 'pixels_contact_section', 'pds_pixels_theme_contact');

  	add_settings_field( 'activate-form', 'Activate Contact Form', 'pixels_activate_contact', 'pds_pixels_theme_contact', 'pixels-contact-section' );

    //Custom CSS Options
	register_setting( 'pixels-custom-css-options', 'pixels_css', 'pixels_sanitize_custom_css' );

	add_settings_section( 'pixels-custom-css-section', 'Custom CSS', 'pixels_custom_css_section_callback', 'pds_pixels_css' );

	add_settings_field( 'custom-css', 'Insert your Custom CSS', 'pixels_custom_css_callback', 'pds_pixels_css', 'pixels-custom-css-section' );


 }

 function pixels_custom_css_section_callback() {
	echo 'Customize Pixels Theme with your own CSS';
}

function pixels_custom_css_callback() {
	$css = get_option( 'pixels_css' );
	$css = ( empty($css) ? '/* pixels Theme Custom CSS */' : $css );
	echo '<div id="customCss">'.$css.'</div><textarea id="pixels_css" name="pixels_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}

 function pixels_contact_section(){
   echo 'Activate and Deactivate the Built-in Contact Form';
 }

 function pixels_activate_contact() {
  $options = get_option( 'activate_contact' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '.$checked.' /></label>';
  }


 function pixels_theme_options() {
 	echo 'Activate and Deactivate specific Theme Support Options';
 }
 function pixels_post_formats() {
 	$options = get_option( 'post_formats' );
 	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
 	$output = '';
 	foreach ( $formats as $format ){
 		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
 		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
 	}
 	echo $output;
 }

 function pixels_custom_header() {
  $options = get_option( 'custom_header' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' />Activate the Custom Header</label>';
  }

  function pixels_custom_background() {
   $options = get_option( 'custom_background' );
     $checked = ( @$options == 1 ? 'checked' : '' );
     echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' />Activate the Custom Background</label>';
   }

//Sidebar Options Functions
function pixels_sidebar_options(){
  echo 'Customize your sidebar information';
}

function pixels_sidebar_profile(){
   $picture= esc_attr(get_option('profile_picture'));
   if(empty($picture)){
echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value=""/>';
   } else {
echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'"/><input type="button" class="button button-secondary" value="Remove" id="remove-picture"';
   }

}

function pixels_sidebar_name(){
  $firstName= esc_attr(get_option('first_name'));
  $lastName= esc_attr(get_option('last_name'));
  echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="last Name" />';
}

function pixels_sidebar_description(){
  $description= esc_attr(get_option('user_description'));
  echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /><p class="description">Write something smart.</p>';
}

function pixels_sidebar_twitter(){
  $twitter= esc_attr( get_option('twitter_handler'));
  echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
}

function pixels_sidebar_facebook(){
  $facebook= esc_attr(get_option('facebook_handler'));
  echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook Handler" />';
}

function pixels_sidebar_gplus(){
  $gplus= esc_attr(get_option('gplus_handler'));
  echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google Handler" />';
}

//Sanitization Settings
function pixels_sanitize_twitter_handler($input){
  $output= sanitize_text_field($input);
  $output= str_replace('@','',$output);
  return $output;
}

function pixels_sanitize_custom_css($input){
  $output= esc_textarea($input);
  return $output;
}

//CONTACT FORM Functions

function pixels_contact_form_page(){
  require_once(get_template_directory().'/inc/templates/pixels-contact-form.php');
}


//Template Submenu Function
function pixels_theme_create_page(){
  require_once( get_template_directory() . '/inc/templates/pixels-admin.php');
}

function pixels_theme_support_page(){
  require_once(get_template_directory().'/inc/templates/pixels-theme-support.php');
}

function pixels_theme_setting_page(){
  require_once(get_template_directory().'/inc/templates/pixels-custom-css.php');
}
