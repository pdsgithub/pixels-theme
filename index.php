<?php /*

@package pixelstheme
*/
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container pixels-posts-container">

						<?php

							if( have_posts() ):

								while( have_posts() ): the_post();

									get_template_part( 'template-parts/content', get_post_format() );

								endwhile;

							endif;

						?>


			</div><!-- .container -->

			<div class="container text-center">
				<a class="btn-pixels-load pixels-load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
						<span class="pixels-icon pixels-loading"></span>
						<span class="text">Load More</span>
				</a>
			</div><!-- .container -->

			</main>
	</div><!-- #primary -->

<?php get_footer(); ?>
