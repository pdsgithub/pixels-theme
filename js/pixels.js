jQuery(document).ready(function($) {

   var carousel = ".pixels-carousel-thumb";

   pixels_get_bs_thumbs(carousel);

   function pixels_get_bs_thumbs(carousel) {

      $(carousel).on({

         mouseenter: function() {
            var id = $("#" + $(this).attr("id"));
            var nextThumb = $(id).find(".item.active").find(".next-image-preview").data("image");
            var prevThumb = $(id).find(".item.active").find(".prev-image-preview").data("image");
            $(id).find(".right.carousel-control").find(".thumbnail-container").css({"background-image" : "url("+ nextThumb +")"});
            $(id).find(".left.carousel-control").find(".thumbnail-container").css({"background-image" : "url("+ prevThumb +")"});
         },

         click: function() {
            var id = $("#" + $(this).attr("id"));
            $(id).on('slid.bs.carousel', function () {
               var nextThumb = $(id).find(".item.active").find(".next-image-preview").data("image");
               var prevThumb = $(id).find(".item.active").find(".prev-image-preview").data("image");
               $(id).find(".right.carousel-control").find(".thumbnail-container").css({"background-image" : "url("+ nextThumb +")"});
               $(id).find(".left.carousel-control").find(".thumbnail-container").css({"background-image" : "url("+ prevThumb +")"});
            });
         }

      });
   }

});jQuery(document).ready( function($){
	//custom pixels scripts

	var carousel = '.pixels-carousel-thumb';

	pixels_get_bs_thumbs(carousel);

	$(carousel).on('slid.bs.carousel', function(){
		pixels_get_bs_thumbs(carousel);
	});

	function pixels_get_bs_thumbs( carousel ){
		var nextThumb = $('.item.active').find('.next-image-preview').data('image');
		var prevThumb = $('.item.active').find('.prev-image-preview').data('image');
		$(carousel).find('.carousel-control.right').find('.thumbnail-container').css({ 'background-image' : 'url('+nextThumb+')' });
		$(carousel).find('.carousel-control.left').find('.thumbnail-container').css({ 'background-image' : 'url('+prevThumb+')' });
	}

});
