<h1>Pixels Theme Support</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php"  class="pixels-general-form">
    <?php settings_fields('pixels-theme-support'); ?>
    <?php do_settings_sections('pds_pixels_theme'); ?>
    <?php submit_button(); ?>
</form>
