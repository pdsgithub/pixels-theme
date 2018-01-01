<?php /*

@package pixelstheme
======================
AJAX FUNCTIONS
======================
*/

add_action('wp_ajax_nopriv_pixels_load_more', 'pixels_load_more');
add_action('wp_ajax_pixels_load_more', 'pixels_load_more');

function pixels_load_more(){

    $paged = $_POST["page"]+1;

    $query = new WP_Query( array(
        'post_type' => 'post',
        'paged' => $paged

    ));

    if( $query->have_posts() ):

      while( $query->have_posts() ): $query->the_post();

        get_template_part( 'template-parts/content', get_post_format() );

      endwhile;

    endif;

    wp_reset_postdata();

    die();

}
