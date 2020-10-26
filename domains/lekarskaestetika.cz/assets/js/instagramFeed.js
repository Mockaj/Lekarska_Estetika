(function ($) {
	"use strict";
    $.fn.instagramFeed = function (options) {
        var instagramImages = $('#instagramImages');
        var settings = $.extend({
            isMobile: /iPhone|iPad|iPod|Android/i.test(navigator.userAgent)
        }, options);

        return this.each(function () {
            instagramImages.css('width', settings.pluginWidth + '%');

            var getID = settings.accessToken;
            getID = getID.substring(0, getID.indexOf('.'));

            setTimeout(function (ins_id, ins_token) {
                instagram_feed(
                    ins_id = getID,
                    ins_token = settings.accessToken
                );
            });

            var instagram_feed = function (ins_id, ins_token) {
                var loadmore = 'default';
                var noLoadMore = 'true';

                instagram_feed_recent(ins_id, ins_token);

                function instagram_feed_recent(ins_id, ins_token) {
                    $.ajax({
                        url: 'https://api.instagram.com/v1/users/' + ins_id + '/media/recent/?count=' + settings.postsQuantity + '&access_token=' + ins_token,
                        crossDomain: true,
                        dataType: 'jsonp',
                        success: function (data) {
                            var html = '';
                            $.each(data.data, function (i) {
                                html += '<div class="instaWrap">' +
                                    '<a href="' + data.data[i].link + '" target="' + settings.openLinks + '">' +
                                    '<div class="instaOverlay">' +
                                    '<div align="center" class="instaInfo">' +
                                    '<div class="instaDi"><div class="instaLikes">' +
                                    '<i class="fa fa-heart" style="font-size: calc(0.8vw + 0.8vh + 0.8vmin); line-height: inherit;"></i>&nbsp;' +
                                    '<div class="instaNumL">' + data.data[i].likes.count + '</div></div></div>' +
                                    '<div class="instaGapI"></div>' +
                                    '<div class="instaDi"><div class="instaComment">' +
                                    '<i class="fa fa-comments-o" aria-hidden="true" style="font-size: calc(1vw + 1vh + 1vmin); line-height: inherit;"></i>&nbsp;' +
                                    '<div class="instaNumR">' + data.data[i].comments.count + '</div></div></div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="instaImgBgr" style="background-image:url(' + data.data[i].images.low_resolution.url + ')"></div>' +
                                    '</a>' +
                                    '</div>';
                            });

                            if (loadmore == 'default' && noLoadMore != settings.loadmoreBtnHide) {
                                html += '<div class="insta_load_more">' + settings.loadmoreBtnText + '</div>';
                            }

                            var sbi = settings.spaceBetweenImages;
                            if (sbi > 3) sbi = 3;

                            instagramImages.append(html).css({
                                'padding-top': 'calc(' + sbi + '% / 2)',
                                'padding-right': 'calc(' + sbi + '% / 2)',
                                'margin-left': 'calc(' + -sbi + '% / 2)'
                            });
							
							var instaWrap = $('.instaWrap');
                            var btn_LM = $('.insta_load_more');
                            var plugW = instagramImages.width();

                            if (settings.columnsQuantity480 == '2' && plugW < 480) {
                                instaWrap.removeClass('col' + settings.columnsQuantity).addClass('col2');
                            } else {
                                instaWrap.removeClass('col2').addClass('col' + settings.columnsQuantity);
                            }
							
							if(settings.isMobile) {
                                instaWrap.removeClass('col' + settings.columnsQuantity).addClass('col2');
                                setTimeout(function () {
                                    instaWrap.css({ 'width': 'calc(49.99% - ' + sbi + '%)' });
                                    var colWM = $('.col2').css('width');
                                    $('.col2').css('height', colWM);
                                }, 50);
							}
                          
                            instaWrap.css({
                                'margin-bottom': sbi + '%',
                                'margin-left': sbi + '%',
                                'border-radius': settings.borderRadius + '%'
                            });

                            $('.col2').css({ 'width': 'calc(49.99% - ' + sbi + '%)' });
                            $('.col3').css({ 'width': 'calc(33.33% - ' + sbi + '%)' });

                            $('.instaLikes').css('color', settings.likesColor);
                            $('.instaComment').css('color', settings.commentsColor);
                            $('#instagramImages .fa').css('color', settings.iconsColor);

                            btn_LM.css({
                                'background-color': settings.loadmoreBtnBackground,
                                'color': settings.loadmoreBtnTextColor,
                                'width': settings.loadmoreBtnWidth,
                                'height': settings.loadmoreBtnHeight,
                                'line-height': settings.loadmoreBtnHeight,
                                'font-size': settings.loadmoreBtnTextSize,
                                'border-radius': settings.loadmoreBtnBorderRadius,
                                'font-family': settings.loadmoreBtnFontFamily
                            });

                            btn_LM.on('mouseenter', function () {
                                $(this).css({ 'color': settings.loadmoreBtnTextOnHover, 'background-color': settings.loadmoreBtnBackgroundOnHover });
                            }).on('mouseleave', function () {
                                $(this).css({ 'color': settings.loadmoreBtnTextColor, 'background-color': settings.loadmoreBtnBackground });
                            });

                            $('.instaOverlay').css({ 'background-color': settings.overlayColor, 'border-radius': settings.borderRadius + '%' });
                            $('.instaOverlay').on('mouseenter', function () {
                                $(this).css({ 'opacity': settings.overlayOpacity });
                            }).on('mouseleave', function () {
                                $(this).css({ 'opacity': 0 });
                            });

                            if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                                var colW = $('.col' + settings.columnsQuantity).css('width');
                                $('.col' + settings.columnsQuantity).css('height', colW);
                                setTimeout(function () {
                                    var colW = instaWrap.css('width');
                                    instaWrap.css('height', colW);
                                }, 500);
                            }

                            if (typeof data.pagination.next_url !== 'undefined') {
                                btn_LM.unbind('click').on('click', function () {
                                    instagram_feed_recent(ins_id, ins_token + '&max_id=' + data.pagination.next_max_id);
                                    if (loadmore == 'default') {
                                        btn_LM.css('display', 'none');
                                    }
                                    return false;
                                });
                            } else {
                                btn_LM.css('display', 'none');
                            }

                            if(settings.isMobile) {
                                instagramImages.css({'width': '100%', 'padding': 0, 'margin-left': '-1%'});
                                btn_LM.css({
                                    'font-size': '14px', 
                                    'height': 'inherit', 
                                    'width': '90%',
                                    'line-height': 'calc(' + settings.loadmoreBtnHeight + ' / 1.5)'
                                });
                            }

                            var i = instagramImages.width();
                            if(i < 170) {
                                btn_LM.css({
                                    'font-size': '80%', 
                                    'height': 'inherit', 
                                    'width': '90%',
                                    'line-height': 'calc(' + settings.loadmoreBtnHeight + ' / 1.5)',
                                    'margin': '10px auto 5px auto'
                                });
                            } else {
                                btn_LM.css({
                                    'width': settings.loadmoreBtnWidth,
                                    'height': settings.loadmoreBtnHeight,
                                    'line-height': settings.loadmoreBtnHeight,
                                    'font-size': settings.loadmoreBtnTextSize,
                                    'margin': '20px auto 5px auto'
                                });
                            } 

                            var plugW = instagramImages.width();
                            if (settings.columnsQuantity480 == '2' && plugW < 480) {
                                instaWrap.removeClass('col' + settings.columnsQuantity).addClass('col2');
                                var colWM = $('.col2').css('width');
                                $('.col2').css('height', colWM);
                                instaWrap.css({ 'width': 'calc(49.99% - ' + sbi + '%)' });
                            } else {
                                if (settings.columnsQuantity == '2') {
                                    instaWrap.removeClass('col' + settings.columnsQuantity).addClass('col2');
                                    var colWM = $('.col2').css('width');
                                    $('.col2').css('height', colWM);
                                    instaWrap.css({ 'width': 'calc(49.99% - ' + sbi + '%)' });
                                } else {
                                    if (!settings.isMobile) {
                                        instaWrap.removeClass('col2').addClass('col' + settings.columnsQuantity);
                                        var colW = $('.col' + settings.columnsQuantity).css('width');
                                        $('.col' + settings.columnsQuantity).css('height', colW);
                                        instaWrap.css({ 'width': 'calc(33.33% - ' + sbi + '%)' });
                                    } else {
                                        instaWrap.css({ 'width': 'calc(49.99% - ' + sbi + '%)' });
                                        var colWM = $('.col2').css('width');
                                        $('.col2').css('height', colWM);
                                    }
                                }
                            }
                            
                            $(window).on('resize', function () {
                                var plugW = instagramImages.width();
                                if (settings.columnsQuantity480 == '2' && plugW < 480) {
                                    instaWrap.removeClass('col' + settings.columnsQuantity).addClass('col2');
                                    var colWM = $('.col2').css('width');
                                    $('.col2').css('height', colWM);
                                    instaWrap.css({ 'width': 'calc(49.99% - ' + sbi + '%)' });
                                } else {
                                    if (settings.columnsQuantity == '2') {
                                        instaWrap.removeClass('col' + settings.columnsQuantity).addClass('col2');
                                        var colWM = $('.col2').css('width');
                                        $('.col2').css('height', colWM);
                                        instaWrap.css({ 'width': 'calc(49.99% - ' + sbi + '%)' });
                                    } else {
                                        if (!settings.isMobile) {
                                            instaWrap.removeClass('col2').addClass('col' + settings.columnsQuantity);
                                            var colW = $('.col' + settings.columnsQuantity).css('width');
                                            $('.col' + settings.columnsQuantity).css('height', colW);
                                            instaWrap.css({ 'width': 'calc(33.33% - ' + sbi + '%)' });
                                        } else {
                                            instaWrap.css({ 'width': 'calc(49.99% - ' + sbi + '%)' });
                                            var colWM = $('.col2').css('width');
                                            $('.col2').css('height', colWM);
                                        }
                                    }
                                }

                                var i = instagramImages.width();
                                if(i < 170) {
                                    btn_LM.css({
                                        'font-size': '80%', 
                                        'height': 'inherit', 
                                        'width': '90%',
                                        'line-height': 'calc(' + settings.loadmoreBtnHeight + ' / 1.5)',
                                        'margin': '10px auto 5px auto'
                                    });
                                } else {
                                    btn_LM.css({
                                        'width': settings.loadmoreBtnWidth,
                                        'height': settings.loadmoreBtnHeight,
                                        'line-height': settings.loadmoreBtnHeight,
                                        'font-size': settings.loadmoreBtnTextSize,
                                        'margin': '20px auto 5px auto'
                                    });
                                }
                            });
                        }
                    });
                }
            }
        });
    }
}(jQuery));