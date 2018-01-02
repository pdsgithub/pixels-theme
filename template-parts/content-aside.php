<?php
/*

@package pixelstheme
-- Aside Post Format
*/
?>



<article id="post-<?php the_ID(); ?>" <?php post_class('pixels-format-aside'); ?>>
<div class="aside-container">
<div class="row">
    <div class="col-xs-12 col-sm-3 col-md-2 text-center">

		<?php if( pixels_get_attachment() ):?>


		     <div class="aside-featured background-image" style="background-image: url(<?php echo pixels_get_attachment();?>);"></div>
		  </a>

	 <?php endif; ?>
 </div><!-- .col-md-3 -->
   <div class="col-xs-12 col-sm-9 col-md-10">
		 <header class="entry-header">

			 <div class="entry-meta">
				 <?php echo pixels_posted_meta(); ?>
			 </div>

		 </header>

		 <div class="entry-content">
			 <div class="entry-excerpt">
				 <?php the_content(); ?>
			 </div>


		 </div><!-- ..entry-content -->
		</div><!-- .col-md-9 -->
</div><!-- .row -->



	<footer class="entry-footer">
    <div class="row">
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<?php  echo pixels_posted_footer(); ?>
  </div><!-- .col-offset-2 -->
    </div><!-- .row -->
	</footer>
</div> <!-- .aside-container -->
</article>
