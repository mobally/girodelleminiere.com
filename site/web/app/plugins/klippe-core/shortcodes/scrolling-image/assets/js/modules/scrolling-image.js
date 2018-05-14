(function($) {
	'use strict';
	
	var scrollingImage = {};
	mkdf.modules.scrollingImage = scrollingImage;
	
	scrollingImage.mkdfScrollingImage = mkdfScrollingImage;
	
	scrollingImage.mkdfOnDocumentReady = mkdfOnDocumentReady;
	
	$(document).ready(mkdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function mkdfOnDocumentReady() {
		mkdfScrollingImage();
	}
	
	/**
	 * Button object that initializes whole button functionality
	 * @type {Function}
	 */
    function mkdfScrollingImage() {
        var scrollingImageShortcodes = $('.mkdf-scrolling-image');

        if (scrollingImageShortcodes.length) {
            scrollingImageShortcodes.each(function(){
                var scrollingImageShortcode = $(this),
                    scrollingImageHeight,
                    showcaseImage = scrollingImageShortcode.find('.mkdf-scrolling-img'),
                    showcaseImageHeight,
                    delta,
                    timing,
                    scroll = false;

                var scrollAnimation = function() {
                    //scroll animation
                    scrollingImageShortcode.mouseenter(function(){
                        scrollingImageHeight = scrollingImageShortcode.find('.mkdf-image-frame').height();
                        showcaseImageHeight = showcaseImage.height();

                        if (showcaseImageHeight > scrollingImageHeight) { 
                            scroll = true;
                            delta = Math.round(showcaseImageHeight - scrollingImageHeight);
                            timing = Math.round(showcaseImageHeight/scrollingImageHeight);
                            showcaseImage.css('transition-duration',timing+'s'); //transition duration set in relation to image height
                            showcaseImage.css('transform', 'translate3d(0px, -'+delta+'px, 0px)');
                        }
                    });

                    scrollingImageShortcode.mouseleave(function(){
                        if (scroll) {
                            showcaseImage.css('transition-duration',timing+'s');
                            showcaseImage.css('transform', 'translate3d(0px, 0px, 0px)');
                        }
                    });
                };

                scrollAnimation();

                scrollingImageShortcode.appear(function(){
                    $(this).find('.mkdf-image-holder-inner').addClass('mkdf-appeared');
                },{accX: 0, accY: mkdfGlobalVars.vars.mkdfElementAppearAmount});
            });
        }
    }
	
})(jQuery);