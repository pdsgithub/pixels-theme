<?php
/*

@package pixelstheme

	========================
		AJAX FUNCTIONS
	========================
*/
// add_action( 'wp_ajax_nopriv_pixels_load_more', 'pixels_load_more' );
// add_action( 'wp_ajax_pixels_load_more', 'pixels_load_more' );
// function pixels_load_more() {
//
// 	$paged = $_POST["page"]+1;
//
// 	$query = new WP_Query( array(
// 		'post_type' => 'post',
// 		'post_status' => 'publish',
// 		'paged' => $paged
// 	) );
//
// 	if( $query->have_posts() ):
//
// 		echo '<div class="page-limit" data-page="/pixels/page/' . $paged . '">';
//
// 		while( $query->have_posts() ): $query->the_post();
//
// 			get_template_part( 'template-parts/content', get_post_format() );
//
// 		endwhile;
//
// 		echo '</div>';
//
// 	else:
//
// 		echo 0;
//
// 	endif;
//
// 	wp_reset_postdata();
//
// 	die();
//
// }
// function pixels_check_paged( $num = null ){
//
// 	$output = '';
//
// 	if( is_paged() ){ $output = 'page/' . get_query_var( 'paged' ); }
//
// 	if( $num == 1 ){
// 		$paged = ( get_query_var( 'paged' ) == 0 ? 1 : get_query_var( 'paged' ) );
// 		return $paged;
// 	} else {
// 		return $output;
// 	}
//
// }
