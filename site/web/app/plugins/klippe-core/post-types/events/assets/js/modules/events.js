(function($) {
    'use strict';

    var events = {};
    mkdf.modules.events = events;

    events.mkdfOnDocumentReady = mkdfOnDocumentReady;

    $(document).ready(mkdfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdfOnDocumentReady() {
        mkdfInitEventsLoadMore();
    }

    /**
     * Initializes events load more function
     */
    function mkdfInitEventsLoadMore(){
        var eventList = $('.mkdf-event-list-holder.mkdf-event-list-show-more');

        if(eventList.length){

            eventList.each(function(){

                var thisEventList = $(this);
                var thisEventListInner = thisEventList.find('.mkdf-event-list-holder-inner');
                var nextPage;
                var maxNumPages;
                var loadMoreButton = thisEventList.find('.mkdf-el-list-load-more a');
                var buttonText = loadMoreButton.children(".mkdf-btn-text");

                if (typeof thisEventList.data('max-num-pages') !== 'undefined' && thisEventList.data('max-num-pages') !== false) {
                    maxNumPages = thisEventList.data('max-num-pages');
                }

                if (thisEventList.hasClass('mkdf-event-list-load-button')) {

                    loadMoreButton.on('click', function (e) {
                        var loadMoreDatta = mkdfGetEventAjaxData(thisEventList);
                        nextPage = loadMoreDatta.nextPage;
                        e.preventDefault();
                        e.stopPropagation();
                        if (nextPage <= maxNumPages) {
                            var ajaxData = mkdfSetEventAjaxData(loadMoreDatta);
                            buttonText.text(mkdfGlobalVars.vars.mkdfLoadingMoreText);
                            $.ajax({
                                type: 'POST',
                                data: ajaxData,
                                url: mkdfGlobalVars.vars.mkdfAjaxUrl,
                                success: function (data) {
                                    nextPage++;
                                    thisEventList.data('next-page', nextPage);
                                    var response = $.parseJSON(data);
                                    var responseHtml = mkdfConvertHTML(response.html); //convert response html into jQuery collection that Mixitup can work with
                                    thisEventList.waitForImages(function () {
                                        thisEventListInner.append(responseHtml);

                                        buttonText.text(mkdfGlobalVars.vars.mkdfLoadMoreText);

                                        if(nextPage > maxNumPages){
                                            loadMoreButton.hide();
                                        }
                                    });
                                }
                            });
                        }
                    });

                }

            });
        }
    }

    function mkdfConvertHTML ( html ) {
        var newHtml = $.trim( html ),
            $html = $(newHtml ),
            $empty = $();

        $html.each(function ( index, value ) {
            if ( value.nodeType === 1) {
                $empty = $empty.add ( this );
            }
        });

        return $empty;
    }

    /**
     * Initializes events load more data params
     * @param event list container with defined data params
     * return array
     */
    function mkdfGetEventAjaxData(container){
        var returnValue = {};

        returnValue.type = '';
        returnValue.columns = '';
        returnValue.orderBy = '';
        returnValue.order = '';
        returnValue.eventStatus = '';
        returnValue.number = '';
        returnValue.category = '';
        returnValue.selectedProjectes = '';
        returnValue.showMore = '';
        returnValue.titleTag = '';
        returnValue.titleSize = '';
        returnValue.paddingTopBottom = '';
        returnValue.parallax = '';
        returnValue.appearFx = '';
        returnValue.nextPage = '';
        returnValue.maxNumPages = '';

        if (typeof container.data('type') !== 'undefined' && container.data('type') !== false) {
            returnValue.type = container.data('type');
        }
        if (typeof container.data('columns') !== 'undefined' && container.data('columns') !== false) {
            returnValue.columns = container.data('columns');
        }
        if (typeof container.data('order-by') !== 'undefined' && container.data('order-by') !== false) {
            returnValue.orderBy = container.data('order-by');
        }
        if (typeof container.data('order') !== 'undefined' && container.data('order') !== false) {
            returnValue.order = container.data('order');
        }
        if (typeof container.data('event-status') !== 'undefined' && container.data('event-status') !== false) {
            returnValue.eventStatus = container.data('event-status');
        }
        if (typeof container.data('number') !== 'undefined' && container.data('number') !== false) {
            returnValue.number = container.data('number');
        }
        if (typeof container.data('category') !== 'undefined' && container.data('category') !== false) {
            returnValue.category = container.data('category');
        }
        if (typeof container.data('selected-projects') !== 'undefined' && container.data('selected-projects') !== false) {
            returnValue.selectedProjectes = container.data('selected-projects');
        }
        if (typeof container.data('show-more') !== 'undefined' && container.data('show-more') !== false) {
            returnValue.showMore = container.data('show-more');
        }
        if (typeof container.data('title-tag') !== 'undefined' && container.data('title-tag') !== false) {
            returnValue.titleTag = container.data('title-tag');
        }
        if (typeof container.data('parallax') !== 'undefined' && container.data('parallax') !== false) {
            returnValue.parallax = container.data('parallax');
        }
        if (typeof container.data('appear-fx') !== 'undefined' && container.data('appear-fx') !== false) {
            returnValue.appearFx = container.data('appear-fx');
        }
        if (typeof container.data('title-size') !== 'undefined' && container.data('title-size') !== false) {
            returnValue.titleSize = container.data('title-size');
        }
        if (typeof container.data('padding-top-bottom') !== 'undefined' && container.data('padding-top-bottom') !== false) {
            returnValue.paddingTopBottom = container.data('padding-top-bottom');
        }
        if (typeof container.data('next-page') !== 'undefined' && container.data('next-page') !== false) {
            returnValue.nextPage = container.data('next-page');
        }
        if (typeof container.data('max-num-pages') !== 'undefined' && container.data('max-num-pages') !== false) {
            returnValue.maxNumPages = container.data('max-num-pages');
        }
        return returnValue;
    }

    /**
     * Sets events load more data params for ajax function
     * @param event list container with defined data params
     * return array
     */
    function mkdfSetEventAjaxData(container){
        var returnValue = {
            action: 'klippe_core_event_ajax_load_more',
            type: container.type,
            columns: container.columns,
            orderBy: container.orderBy,
            order: container.order,
            eventStatus: container.eventStatus,
            number: container.number,
            category: container.category,
            selectedProjectes: container.selectedProjectes,
            showMore: container.showMore,
            titleTag: container.titleTag,
            titleSize: container.titleSize,
            paddingTopBottom: container.paddingTopBottom,
            parallax: container.parallax,
            appearFx: container.appearFx,
            nextPage: container.nextPage
        };
        return returnValue;
    }

})(jQuery);