jQuery(document).ready( function($){
	//custom pixels scripts

	/* init functions */
	revealPosts();

	/* variable declaration */
	var carousel = '.pixels-carousel-thumb';
	var last_scroll = 0;

	/* carousel function */
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

						setTimeout(function(){

						that.data('page', newPage);
						$('.pixels-posts-container').append( response );


						that.removeClass('loading').find('.text').slideDown(320);
						that.find('.pixels-icon').removeClass('spin');

						revealPosts();

				},1000);



			}

		});

	});

	/* scroll function */
	$(window).scroll(function(){

		var scroll = $(window).scrollTop();

		if(Math.abs( scroll - last_scroll ) > $(window).height()*0.1){
			last_scroll = scroll;

			$('.page-limit').each(function(index){
					if(inVisible( $(this))){
							history.replaceState( null, null , $(this).attr("data-page"));
							return(false);
					}
			});

		}

	});

	/* Helper Function */
	function revealPosts(){

		var posts = $('article:not(.reveal)');
		var i = 0;

		setInterval(function(){

			if(i >= posts.length) return false;

			var el = posts[i];
			$(el).addClass('reveal').find('.pixels-carousel-thumb').carousel();

			i++

		}, 200 );

	}

	function inVisible(element){
		var scroll_pos = $(window).scrollTop();
		var window_height = $(window).height();
		var el_top = $(element).offset().top;
		var el_height = $(element).height();
		var el_bottom = el_top + el_height;
		return(( el_bottom - el_height*0.25 > scroll_pos) && (el_top < (scroll_pos+0.5*window_height)));
	}

});
