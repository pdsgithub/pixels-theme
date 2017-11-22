<h1>Pixels Contact Form</h1>
<?php settings_errors(); ?>


<form method="post" action="options.php"  class="pixels-general-form">
    <?php settings_fields('pixels-contact-options'); ?>
    <?php do_settings_sections('pds_pixels_theme_contact'); ?>
    <?php submit_button(); ?>
</form>
