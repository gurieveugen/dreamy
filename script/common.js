jQuery(function(){
    var opts = {
    lines: 9, // The number of lines to draw
    length: 6, // The length of each line
    width: 2, // The line thickness
    radius: 5, // The radius of the inner circle
    corners: 0.4, // Corner roundness (0..1)
    rotate: 0, // The rotation offset
    color: '#FFF', // #rgb or #rrggbb
    speed: 1, // Rounds per second
    trail: 60, // Afterglow percentage
    shadow: true, // Whether to render a shadow
    hwaccel: false, // Whether to use hardware acceleration
    className: 'spinner', // The CSS class to assign to the spinner
    zIndex: 2e9, // The z-index (defaults to 2000000000)
    top: 'auto', // Top position relative to parent in px
    left: 'auto' // Left position relative to parent in px
  };
  var target = document.getElementById('portfolio-loader');
  var spinner = new Spinner(opts).spin(target);
  var target2 = document.getElementById('portfolio-loader2');
  var spinner2 = new Spinner(opts).spin(target2);
  var target3 = document.getElementById('slider-loader');
  var spinner3 = new Spinner(opts).spin(target3);
})


jQuery(document).ready(function($){


    jQuery('.slides').hover(function(){
        
       jQuery('.hover-slider',this).stop().animate({opacity:1},500);
       jQuery('a', this).stop().animate({
           marginTop: '0px'
       }, 100)
    },function(){
       jQuery('.hover-slider',this).stop().animate({opacity:0},300);
      jQuery('a', this).stop().animate({
           marginTop: '-80px'
       }, 100)
    });


$(".fancybox").fancybox({
    helpers:  {
        title:  null
    }
});

jQuery(".video").click(function() {
    jQuery.fancybox({
        'padding' : 0,
        'autoScale' : false,
        'transitionIn': 'none',
        'transitionOut' : 'none',
        'title' : this.title,
        'width' : 680,
        'height' : 495,
        'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
        'type': 'swf',
        'swf': {
            'wmode': 'transparent',
            'allowfullscreen': 'true'
            }
        });

	return false;
});

    jQuery(".vimeo").click(function() {
        jQuery.fancybox({
            'padding': 0,
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut'	: 'none',
            'title':  this.title,
            'width': 520,
            'height': 300,
            'href': this.href.replace(new RegExp("([0-9])","i"),'moogaloop.swf?clip_id=$1'),
            'type': 'swf'
        });

        return false;
    });



    jQuery('.parallax-layer').parallax({
      mouseport: jQuery(".header"),
      yparallax: false,
      xparallax: '70px' ,    // Blue layer options
      width: 1024
       
    });

    jQuery(".sf-menu ul li:first-child").before('<li class="sub-menu-top"></li>');
    jQuery(".sf-menu ul li:last-child").after('<li class="sub-menu-bottom"></li>');


    //MENU
    jQuery('ul.sf-menu').superfish({
        delay:       0,
        animation:   {opacity:'show',height:'show'}
    });

    jQuery("#cat-nav").superfish();

    //LOAD ISOTOPE
    var container = jQuery('.gallery-home-content');
    jQuery(container).imagesLoaded(function(){
        jQuery('.portfolio-loader').attr('style', 'display:none');
        jQuery(container).show().animate({opacity:1},1000);
        jQuery('.project-home-content').show();
        jQuery(container).isotope({
            layoutMode : 'fitRows' ,
            itemSelector: '.gallery-home-one',
            isAnimated: true,
            animationEngine : 'jquery',
            animationOptions: {
                duration: 800,
                easing: 'easeOutCubic',
                queue: false
            }
        });
    });

    jQuery('.gallery-filter-link ul li a').click(function(){
        var selector = jQuery(this).attr('data-filter');
        jQuery(container).isotope({filter: selector});
        return false;
    });

    jQuery(container).imagesLoaded(function(){
        jQuery('#portfolio-loader2').attr('style', 'display:none');
        jQuery('.gallery-single-images img').attr('style', 'display:inline-block');
    });





    jQuery('.breadcrumbs-content ul li:last').attr('style', 'background:none');
    jQuery('.breadcrumbs-content ul li:last a').attr('style', 'color: #A4D2F7;');

    //MENU
    jQuery('ul.sf-menu').superfish({
            animation:   {opacity:'show',height:'show'}
    });



    //JCARUSEL
    jQuery('#mycarousel').jcarousel({
        wrap: 'circular',
        vertical: true,
        scroll: 1,
        animSpeed: "slow",
        itemFallbackDimension:50
    });


jQuery('.footer-soc-icons li').hover(function(){
    jQuery('.tooltip', this).attr('style', 'display:block;');
    jQuery('.tooltip', this).stop().animate({
      opacity: 1,
      marginTop:-30
    }, 200);

}, function(){

    jQuery('.tooltip', this).stop().animate({
      opacity: 0,
      marginTop:-80
    }, 100);
});


    //AUDIO
    jQuery("#jquery_jplayer_1").jPlayer({
        ready: function (event) {
                jQuery(this).jPlayer("setMedia", {
                        m4a:"http://www.jplayer.org/audio/m4a/TSP-01-Cro_magnon_man.m4a",
                        oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg"
                });
        },
        swfPath: "js",
        supplied: "m4a, oga",
        wmode: "window"
    });




    // HOVER-IMAGES
    jQuery('.gallery-home-images').hover(function(){
       jQuery('a',this).stop().animate({
           opacity:1           
       },500);
    },function(){
       jQuery('a',this).stop().animate({opacity:0},300);
    });



    // HOVER-IMAGES
    jQuery('.for-image').hover(function(){
       jQuery('a',this).stop().animate({
           opacity:1
       },500);
    },function(){
       jQuery('a',this).stop().animate({opacity:0},300);
    });

    jQuery('.for-image').hover(function(){
       jQuery('.blog-hover',this).stop().animate({opacity:1},500);
       jQuery('a', this).stop().animate({
           marginTop: '0px'
       }, 100)
    },function(){
       jQuery('.blog-hover',this).stop().animate({opacity:0},300);
      jQuery('a', this).stop().animate({
           marginTop: '-80px'
       }, 100)
    });





    jQuery('.gallery-single-images').hover(function(){
       jQuery('.gallery-single-hover',this).stop().animate({opacity:1},500);
    },function(){
       jQuery('.gallery-single-hover',this).stop().animate({opacity:0},300);
    });


});



jQuery(function() {


    jQuery("<select />").appendTo(".bg-menu nav");

    // Create default option "Go to..."
    jQuery("<option />", {
     "selected": "selected",
     "value"   : "",
     "text"    : "Go to..."
    }).appendTo("nav select");

    // Populate dropdown with menu items
    jQuery(".bg-menu nav a").each(function() {
    var el = jQuery(this);
    jQuery("<option />", {
       "value"   : el.attr("href"),
       "text"    : el.text()
    }).appendTo(".bg-menu nav select");
    });

       // To make dropdown actually work
       // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
    jQuery(".bg-menu nav select").change(function() {
    window.location = jQuery(this).find("option:selected").val();
    });

});


jQuery(function() {


    jQuery("<select />").appendTo(".gallery-filter-link nav");

    // Create default option "Go to..."
    jQuery("<option />", {
     "selected": "selected",
     "value"   : "",
     "text"    : "Go to..."
    }).appendTo("nav select");

    // Populate dropdown with menu items
    jQuery(".gallery-filter-link nav a").each(function() {
    var el = jQuery(this);
    jQuery("<option />", {
       "value"   : el.attr("href"),
       "data-filter"   : el.attr("data-filter"),
       "text"    : el.text()
    }).appendTo(".gallery-filter-link nav select");
    });
    
      // To make dropdown actually work
       // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
    jQuery(".gallery-filter-link nav select").change(function() {
        var container = jQuery('.gallery-home-content');
        var selector = jQuery(this).find("option:selected").attr('data-filter');
        jQuery(container).isotope({filter: selector});
        return false;
    });


jQuery('.gallery-filter-link li a').each(function(){
    jQuery(this).click(function(){       
       jQuery('.gallery-filter-link li a').each(function(){ 
         jQuery(this).removeClass('active');
   });
        jQuery(this).addClass('active');
    });
});



});