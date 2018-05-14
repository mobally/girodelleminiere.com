/**
 * Cards Gallery shortcode
 */
(function($) {
    'use strict';

    $(window).load(function(){
        mkdfCardsGallery();
    });


/**
 * Cards Gallery shortcode
 */


function mkdfCardsGallery() {
    if ($('.mkdf-cards-gallery-holder').length) {
        $('.mkdf-cards-gallery-holder').each(function () {
            var gallery = $(this);
            var cards = gallery.find('.card');
            cards.each(function () {
                var card = $(this);
                console.log('card');
                card.click(function () {
                    if (!cards.last().is(card)) {
                        card.addClass('out animating').siblings().addClass('animating-siblings');
                        card.detach();
                        card.insertAfter(cards.last());
                        setTimeout(function () {
                            card.removeClass('out');
                        }, 200);
                        setTimeout(function () {
                            card.removeClass('animating').siblings().removeClass('animating-siblings');
                        }, 1200);
                        cards = gallery.find('.card');
                        return false;
                    }
                });
            });

            if (gallery.hasClass('mkdf-bundle-animation') && !mkdf.htmlEl.hasClass('touch')) {
                gallery.appear(function () {
                    gallery.addClass('mkdf-appeared');
                    gallery.find('img').one('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function () {
                        $(this).addClass('mkdf-animation-done');
                    });
                }, {accX: 0, accY: mkdfGlobalVars.vars.mkdfElementAppearAmount});
            }
        });
    }
}

})(jQuery);