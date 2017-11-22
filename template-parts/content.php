<?php
/*

@package pixelstheme
-- Standard Post Format
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header text-center">

		<?php the_title( '<h1 class="entry-title"><a href="'.esc_url( get_permalink()).'" rel="bookmark">', '</a></h1>'); ?>

		<div class="entry-meta">
			<?php echo pixels_posted_meta(); ?>
		</div>

	</header>

	<div class="entry-content">

		<?php if( pixels_get_attachment() ):
            $featured_image= wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
			 ?>
      <a class=" standard-featured-link" href="<?php the_permalink(); ?>">
			<div class="standard-featured background-image" style="background-image: url(<?php echo pixels_get_attachment();?>);"></div>

		<?php endif; ?>

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<div class="button-container text-center">
			<a href="<?php the_permalink(); ?>" class="btn btn-pixels"><?php  _e( 'Read More' ); ?></a>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php  echo pixels_posted_footer(); ?>
	</footer>

</article>
