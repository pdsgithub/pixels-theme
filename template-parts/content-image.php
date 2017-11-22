<?php
/*

@package pixelstheme
-- Standard Post Format
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('pixels-format-image'); ?>>

  <?php

  $featured_image= pixels_get_attachment();

     ?>

	<header class="entry-header text-center background-image" style="background-image: url(<?php echo $featured_image;?>);">


		<?php the_title( '<h1 class="entry-title"><a href="'.esc_url( get_permalink()).'" rel="bookmark">', '</a></h1>'); ?>

		<div class="entry-meta">
			<?php echo pixels_posted_meta(); ?>
		</div>
    <div class="entry-excerpt Image-caption">
      <?php the_excerpt(); ?>
    </div>

	</header>


	<footer class="entry-footer">
		<?php  echo pixels_posted_footer(); ?>
	</footer>

</article>
