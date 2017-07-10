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
    var rnd = Math.floor(Math.random() * 4);
    var advice = [
        "Verifique el sistema de enfriamiento, también los niveles de anticongelante, y ten en reserva una cantidad de líquido por si se necesitara en el transcurso del viaje.",
        "Revisa que estén en buen estado las bandas y mangueras del motor, en caso de que se note desgaste es mejor cambiarlas para evitar accidentes.",
        "Afina el motor de tu auto bajo los periodos establecidos por el fabricante. Un periodo normal es cada 10,000 kilometros o 6 meses, lo que ocurra primero.",
        "Revisar los frenos, limpiarlos y ajustarlos antes de salir de viaje y por periodo de 4 meses.",
        "Antes de salir a carretera revisa los niveles de aceite de tu vehículo para que tu motor funcione adecuadamente.",
        "Revisa el buen funcionamiento de los focos, luces, direccionales, limpiaparabrisas."
    ];
    $('#advice').html(advice[rnd]);
    $(".collapse").on('shown.bs.collapse', function(){
        var t = $(this).parent();
        t.find('.panel-title a').toggleClass('special');
    });
    $(".collapse").on('hidden.bs.collapse', function(){
        var t = $(this).parent();
        t.find('.panel-title a').removeClass('special');
    });
    
    //whatsapp detector
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };
    $('.whatsapp').click(function(){
        var msg = $(this).attr('data-text');
        var phone = $(this).attr('data-phone');
        var check = $(this).attr('data-type');
        var whatsapp = "https://api.whatsapp.com/send?phone="+phone+"&text="+msg;
        var call = "tel:"+phone;
        if(isMobile.any()){
            if(check=='call'){
                window.location=call;
            }else if(check=='whatsapp'){
                window.location=whatsapp;
            }
        }else{
            window.location=call;
        }
    });
});