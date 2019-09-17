jQuery(document).ready(function(jQuery){


/* ========================================================================= */
/*  Portfolio filter js
/* ========================================================================= */ 

      if(jQuery('.border').length){
        //portfolio filter
        jQuery(window).load(function(){
             jQueryportfolio_selectors = jQuery('.border>li>a');
             jQueryportfolio_selectors.on('click', function(){
                 var selector = jQuery(this).attr('data-filter');
                 return false;
             });
        });
      };

      if(jQuery('.slash').length){
        //portfolio filter
        jQuery(window).load(function(){
             jQueryportfolio_selectors = jQuery('.slash>li>a');
             jQueryportfolio_selectors.on('click', function(){
                 var selector = jQuery(this).attr('data-filter');
                 return false;
             });
        });
      };

      if(jQuery('.round').length){
        //portfolio filter
        jQuery(window).load(function(){
             jQueryportfolio_selectors = jQuery('.round>li>a');
             jQueryportfolio_selectors.on('click', function(){
                 var selector = jQuery(this).attr('data-filter');
                 return false;
             });
        });
      };



      [1,2,3,4].forEach(function(i) {
        if(jQuery('.hover-' + i).length){
          jQuery('.hover-'+ i).mixItUp({
          });
        }
      });

      
/* ========================================================================= */
/*  Portfilo hoverdir js and light case
/* ========================================================================= */

    jQuery(document).ready(function(){
      jQuery('#hover-1 .portfolio-item').each( function() { jQuery(this).hoverdir(); } );
    });

    // jQuery(document).ready(function(){
    //     jQuery("a[data-rel^='lightcase']").lightcase();
    // });


/* ========================================================================= */
/*  SLider height browser js
/* ========================================================================= */

    // Hero area auto height adjustment
    jQuery('#tgx-hero-unit .carousel-inner .item') .css({'height': ((jQuery(window).height()))+'px'});
    jQuery(window).resize(function(){
        jQuery('#tgx-hero-unit .carousel-inner .item') .css({'height': ((jQuery(window).height()))+'px'});
    });

if(jQuery('.tgx-project').length){
  jQuery(".tgx-project").addClass("owl-carousel").owlCarousel({
        pagination: true,
        center: true,
        margin:100,
        dots:false,
        loop:true,
        items:2,
        nav: true,
        navClass: ['owl-carousel-left','owl-carousel-right'],
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        autoHeight : true,
        autoplay:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:2
            }
        }
     });
  };



});

jQuery(document).ready(function(){
  jQuery('.noti__close').click(function(e){
    e.preventDefault();
    var parent = jQuery(this).parent('.noti');
    parent.fadeOut("slow", function() { jQuery(this).remove(); } );
  });
});

function closeMessage(el) {
  el.addClass('is-hidden');
}

jQuery('.js-messageClose').on('click', function(e) {
  closeMessage(jQuery(this).closest('.Message'));
});

jQuery('#js-helpMe').on('click', function(e) {
  alert('Help you we will, young padawan');
  closeMessage(jQuery(this).closest('.Message'));
});

jQuery('#js-authMe').on('click', function(e) {
  alert('Okelidokeli, requesting data transfer.');
  closeMessage(jQuery(this).closest('.Message'));
});

jQuery('#js-showMe').on('click', function(e) {
  alert("Thanks For Your Interested");
  closeMessage(jQuery(this).closest('.Message'));
});

jQuery(document).ready(function() {
  setTimeout(function() {
    closeMessage(jQuery('#js-timer'));
  }, 5000);
});


