<h1>Pixels Sidebar Options</h1>
<?php settings_errors(); ?>

<?php
$picture= esc_attr(get_option('profile_picture'));
$firstName= esc_attr(get_option('first_name'));
$lastName= esc_attr(get_option('last_name'));
$fullName= $firstName .' '. $lastName;
$description= esc_attr(get_option('user_description'));
 ?>

<div class="pixels-sidebar-preview">
  <div class="pixels-sidebar">
    <div class="image-container">
      <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
    </div>
    <h1 class="pixels-username"><?php print $fullName; ?></h1>
    <h2 class="pixels-description"><?php print $description; ?></h2>
    <div class="icon-wrapper">
    </div>
  </div>
</div>

<form method="post" action="options.php"  class="pixels-general-form">
    <?php settings_fields('pixels-settings-group'); ?>
    <?php do_settings_sections('pds_pixels'); ?>
    <?php submit_button('Save Changes','primary','btnSubmit'); ?>
</form>
