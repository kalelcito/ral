$(document).ready(function(){
    //menu stick
    $(window).scroll(function() {
        var m = $(".navbar");
        var h = $(".header");
        var windowpos = $(window).scrollTop();
        if(windowpos > h.height()){
            m.addClass("navbar-fixed-top");
            m.css("margin-top","0px");
            m.css("border-radius","0px");
        } else {
            m.removeClass("navbar-fixed-top");
            m.css("margin-top","20px");
            m.css("border-radius","5px");
        }
      });
    //var functions
    var width = $(window).width();
    if(width<768){
    }else{
        $('.dropdown').hover(function(){
            $(this).addClass('open');
            var width = $(window).width();
            if(width<1200 && width>1023){
                var menuWidth = $(this).find('.dropdown-menu').width();
                var space = (width-menuWidth)/2;
                $('#national').css('left',-space);
            }else if(width<1024 && width>767){
                var menuWidth = $(this).find('.dropdown-menu').width();
                var spaceN = (menuWidth)/2;
                var space = (width-menuWidth)/2;
                $('#national').css('left',-spaceN);
                $('#inter').css('left',0);
                $('#other').css('left',0);
            }
        });
        $('.dropdown').mouseleave(function(){
            $(this).removeClass('open');
            $('#national').css('left','auto');
            $('#inter').css('left','auto');
            $('#other').css('left','auto');
        });
        $('#carousel-1').hover(function(){
            $('.carousel-control.left, .carousel-control.right').css('opacity','0.3');
        });
        $('#carousel-1').mouseleave(function(){
            $('.carousel-control.left, .carousel-control.right').css('opacity','0');
        });
    }
    var i=1;
    $('#carousel-1 .carousel-indicators').find('li').map(function(){
        $(this).html(i);
        i++;
    });

    $('#article-photo-carousel').carousel({
        interval: 3000
    });
    var widthA = $('#article-photo-carousel').width();
    var indicator = $('.article-slide .carousel-indicators').width();
    var spaceA = (widthA-indicator)/2;
    $('.article-slide .carousel-indicators').css('margin-left',spaceA+'px');
    $(window).resize(function () {
        var ventana = $(window).width();
        widthA = $('#article-photo-carousel').width();
        indicator = $('.article-slide .carousel-indicators').width();
        spaceA = (widthA-indicator)/2;
        $('.article-slide .carousel-indicators').css('margin-left',spaceA+'px');
        if(ventana<768){
            var n = $('.article-slide .carousel-indicators').find('li').length;
            var t = (widthA-100)/n;
            $('.article-slide .carousel-indicators').find('li').map(function(){
                $(this).css('width',t+'px');
            });
            $('.article-slide .carousel-indicators').find('img').map(function(){
                $(this).css('width',t+'px');
            });
        }else if(ventana>767){
            $('.article-slide .carousel-indicators').find('li').map(function(){
                $(this).css('width','100px');
            });
            $('.article-slide .carousel-indicators').find('img').map(function(){
                $(this).css('width','100px');
            });
        }
    });

    if(width>992){
        var maxDiv = Math.max.apply( null, $('.temas-text').map( function () {
            return $( this ).height();
        }).get() );
        $('.temas-text').height(maxDiv);
    }else{
        $('.temas-text').height('100%');
    }
    $(window).resize(function(){
        width = $(window).width();
        if(width>992){
            var maxDiv = Math.max.apply( null, $('.temas-text').map( function () {
                return $( this ).height();
            }).get() );
            $('.temas-text').height(maxDiv);
        }else{
            $('.temas-text').height('100%');
        }
        if(width<768){
        }else{
            $('.dropdown').hover(function(){
                $(this).addClass('open');
                var width = $(window).width();
                if(width<1200 && width>1023){
                    var menuWidth = $(this).find('.dropdown-menu').width();
                    var space = (width-menuWidth)/2;
                    $('#national').css('left',-space);
                }else if(width<1024 && width>767){
                    var menuWidth = $(this).find('.dropdown-menu').width();
                    var spaceN = (menuWidth)/2;
                    var space = (width-menuWidth)/2;
                    $('#national').css('left',-spaceN);
                    $('#inter').css('left',0);
                    $('#other').css('left',0);
                }
            });
            $('.dropdown').mouseleave(function(){
                $(this).removeClass('open');
                $('#national').css('left','auto');
                $('#inter').css('left','auto');
                $('#other').css('left','auto');
            });
            $('#carousel-1').hover(function(){
                $('.carousel-control.left, .carousel-control.right').css('opacity','0.3');
            });
            $('#carousel-1').mouseleave(function(){
                $('.carousel-control.left, .carousel-control.right').css('opacity','0');
            });
        }
    });
    $(".collapse").on('shown.bs.collapse', function(){
        var t = $(this).parent();
        t.find('.panel-title a').toggleClass('special');
    });
    $(".collapse").on('hidden.bs.collapse', function(){
        var t = $(this).parent();
        t.find('.panel-title a').removeClass('special');
    });
});