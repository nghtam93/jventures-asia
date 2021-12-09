$(document).ready(function(){

     new WOW().init();

    // Sticky navbar
    // =========================

    // Custom function which toggles between sticky class (is-sticky)
    var stickyToggle = function (sticky, stickyWrapper, scrollElement,stickyHeight) {
        var stickyTop = stickyWrapper.offset().top;
        if (scrollElement.scrollTop() >= stickyTop ) {
            stickyWrapper.height(stickyHeight);
            sticky.addClass("is-sticky");
        }
        else {
            sticky.removeClass("is-sticky");
            stickyWrapper.height('auto');
        }
    };

    $('[data-toggle="sticky-onscroll"]').each(function () {
        var sticky = $(this);
        var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
        sticky.before(stickyWrapper);
        sticky.addClass('sticky');
        var stickyHeight = sticky.outerHeight();
        // Scroll & resize events
        $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function () {
            stickyToggle(sticky, stickyWrapper, $(this),stickyHeight);
        });

        // On page load
        stickyToggle(sticky, stickyWrapper, $(window),stickyHeight);
        // Check scroll top
        var winSt_t = 0;
        $(window).scroll(function() {
            var winSt = $(window).scrollTop();
            if (winSt >= winSt_t) {
                sticky.removeClass("top_show")
            } else {
                sticky.addClass("top_show")
            }
            winSt_t = winSt
        });
    });


    //-------------------------------------------------
    // Header Search
    //-------------------------------------------------
    var $headerSearch = $('.header__search .search-form');
    var $headerSearchToggle = $('.header__search .search-submit');


    $headerSearchToggle.click(function(e){
        if($(".header__search .search-field").val().length == 0){
          e.preventDefault();
          e.stopPropagation()
        }
    })

    $headerSearchToggle.on('click', function(e) {

        var $this = $(this);
        var $header = $(this).closest('.header__search');
        var $this_parent = $(this).closest('.main__nav');
        if(!$header.hasClass('open-search')) {
            $header.addClass('open-search');
            $this_parent.addClass('is-hide');

        } else {
            $header.removeClass('open-search');
            $this_parent.removeClass('is-hide');
        }
    });
    $('.header__search').mousedown(function(e){ e.stopPropagation(); });
    $(document).mousedown(function(e){
        $('.header__search').removeClass('open-search');
        $('.main__nav').removeClass('is-hide');
    });


    /*----Languages---*/
    $('.languages__label').click(function() {
        $(this).closest('.languages').toggleClass('is-active');
        $(this).next().toggleClass('dropdown-languages');
        isClicked = true;
    });
    $('.languages ul li').click(function() {
        var $liIndex = $(this).index() + 1;
        $('.languages ul li').removeClass('active');
        $('.languages ul li:nth-child('+$liIndex+')').addClass('active');
        var $getLang = $(this).html();
        $('.languages__label').html($getLang);

        $('.languages__content').removeClass('dropdown-languages')
    });

    $('.languages').mousedown(function(e){ e.stopPropagation(); });
    $(document).mousedown(function(e){ $('.languages__content').removeClass('dropdown-languages'); });


    /*----Get Header Height ---*/
    function get_header_height() {
        var header_sticky=$("header").outerHeight()
        $('body').css("--header-height",header_sticky+'px')
    }

    setTimeout(function(){
        get_header_height()
    }, 500);

    $( window ).resize(function() {
      get_header_height()
    });

    //-------------------------------------------------
    // Menu
    //-------------------------------------------------
    $('.nav__mobile--close').click(function(e){
        $('.nav__mobile').removeClass('active')
        $('body').removeClass('modal-open')
    });
    $('.menu-mb__btn').click(function(e){
        e.preventDefault()
        if($('body').hasClass('modal-open')){
            $('.menu-mb__btn').removeClass('active')
            $('.nav__mobile').removeClass('active')
            $('body').removeClass('modal-open')
        }else{
            $('.menu-mb__btn').addClass('active')
            $('body').addClass('modal-open')
            $('.nav__mobile').addClass('active')
        }
    });

    //back to top
    var back_to_top=$(".back-to-top"),offset=220,duration=500;
    $(document).on("click",".back-to-top",function(o){
        return o.preventDefault(),$("html, body").animate({scrollTop:0},duration),!1
    });

    //check home
    if($('body').hasClass( "home" )){

        $('.js-slick__news1').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            dots: true,
            responsive: [
                {
                  breakpoint: 1199,
                  settings: {
                    slidesToShow: 2,
                  }
                },
                {
                  breakpoint: 575,
                  settings: {
                    arrows: false,
                    slidesToShow: 1,
                  }
                }
            ]
        });

        $('.js-slick__news2').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            responsive: [
                {
                  breakpoint: 991,
                  settings: {
                    slidesToShow: 2,
                  }
                },
                {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 2,
                  }
                },
                {
                  breakpoint: 575,
                  settings: {
                    variableWidth: true,
                    centerMode: true,
                    slidesToShow: 1,
                  }
                }
            ]
        });



    }
    if($('body').hasClass( "single" )){
        $('.related__slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            responsive: [
                {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 2,
                  }
                },
                {
                  breakpoint: 575,
                  settings: {
                    centerMode: true,
                    variableWidth: true,
                    slidesToShow: 1,
                  }
                }
            ]
        });

        Fancybox.bind("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']", {
          groupAttr: false,
        });

    }

});


