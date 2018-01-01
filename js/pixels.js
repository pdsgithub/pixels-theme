jQuery(document).ready( function($){
	//custom pixels scripts

	var carousel = '.pixels-carousel-thumb';

	pixels_get_bs_thumbs(carousel);

	$(carousel).on('slid.bs.carousel', function(){
		pixels_get_bs_thumbs(carousel);
	});

	function pixels_get_bs_thumbs( carousel ){

		$(carousel).each(function(){

			var nextThumb = $(this).find('.item.active').find('.next-image-preview').data('image');
			var prevThumb = $(this).find('.item.active').find('.prev-image-preview').data('image');
			$(this).find('.carousel-control.right').find('.thumbnail-container').css({ 'background-image' : 'url('+nextThumb+')' });
			$(this).find('.carousel-control.left').find('.thumbnail-container').css({ 'background-image' : 'url('+prevThumb+')' });

		});

	}

	/* Ajax functions */
	$(document).on('click','.pixels-load-more:not(.loading)', function(){

		var that = $(this);
		var page = $(this).data('page');
		var newPage = page+1;
		var ajaxurl = that.data('url');

		that.addClass('loading').find('.text').slideUp(320);
		that.find('.pixels-icon').addClass('spin');

		$.ajax({

			url : ajaxurl,
			type : 'post',
			data : {

				page : page,
				action: 'pixels_load_more'

			},
			error : function( response ){
				console.log(response);
			},
			success : function( response ){

				that.data('page', newPage);
				$('.pixels-posts-container').append( response );

				setTimeout(function(){
					that.removeClass('loading').find('.text').slideDown(320);
					that.find('.pixels-icon').removeClass('spin');
				},1000);



			}

		});

	});

});
