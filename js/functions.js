/**
 * Functionality specific to theme.
 *
 * Provides helper functions to enhance the theme experience.
 */

(function($){

	// Superfish
	jQuery('ul.nav-menu').superfish({ 
		delay:	100,							// delay on mouseout 
		animation:	{opacity:'show', height:'show'},	// fade-in and slide-down animation 
		speed:	'fast',						// speed of the opening animation. Equivalent to second parameter of jQuery's .animate() method
		speedOut:	'fast',						// speed of the closing animation. Equivalent to second parameter of jQuery's .animate() method
		cssArrows:	false							// disable generation of arrow mark-up
	});

	// Add active class for toggles and accordions
	jQuery('.toggle-panel').on('show.bs.collapse', function (e) {
		jQuery(e.target).prev('.toggle-heading').find('.toggle-toggle').addClass('active');
	});

	// Remove active class for toggles and accordions
	jQuery('.toggle-panel').on('hide.bs.collapse', function (e) {
		jQuery(this).find('.toggle-toggle').not($(e.target)).removeClass('active');
	});

	// Button to display search form
	jQuery(".search-button").click(function(){
		jQuery(".topnav-search").slideToggle("fast");
		jQuery(this).toggleClass("active");
		return false;
	});

	// Tooltips
	jQuery("[data-toggle='tooltip']").tooltip();

	// Open external links in new window
	jQuery('a[rel*=external]').click(function() {
		window.open(this.href);
		return false;
	});

	// Scroll to top link 
	jQuery(document).ready(function() {
		var offset = 220;
		var duration = 500;
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('#backtotop').fadeIn(duration);
			} else {
				jQuery('#backtotop').fadeOut(duration);
			}
		});
		jQuery('#backtotop').click(function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		})
	});

	// Isotope Filter / Infinite Scroll for Standard Blog
	jQuery(document).ready(function() {
		var $blogcontainer = jQuery('.blog-container');
		$blogcontainer.imagesLoaded(function(){
			$blogcontainer.isotope({
				layoutMode: 'fitRows',
 				itemSelector : 'article',
			});
		});
		jQuery('.blog-option-set a').click(function(){
  			var selector = jQuery(this).attr('data-filter');
  			$blogcontainer.isotope({ filter: selector });
			return false;
		});
		var $optionSets = jQuery('.blog-option-set'),
		$optionLinks = $optionSets.find('a'); 
		$optionLinks.click(function(){
			var $this = jQuery(this);
			if ( $this.hasClass('selected') ) {
				return false;
			}
			var $optionSet = $this.parents('.blog-option-set');
			$optionSet.find('.selected').removeClass('selected');
			$this.addClass('selected'); 
		});
		$blogcontainer.infinitescroll({
			nextSelector: "#next-posts a",
			navSelector: "#next-posts a",
			itemSelector: ".post",
			contentSelector: ".blog-container",
			behavior: "twitter",
			loading: {
				msgText: "Loading More Entries",
				finishedMsg: "All Entries Loaded"
			},
		},
		function( newElements ) {
			var $newElems = jQuery(newElements).css({ opacity: 0 });
			$newElems.imagesLoaded(function(){
				// show elems now they're ready
				$newElems.animate({ opacity: 1 });
				$blogcontainer.isotope( 'appended', jQuery( $newElems ) );
			});
		});
	});

	// Isotope Filter / Infinite Scroll for Portfolio
	jQuery(document).ready(function() {
		var $portfoliocontainer = jQuery('.portfolio-container');
		$portfoliocontainer.imagesLoaded(function(){
			$portfoliocontainer.isotope({
				layoutMode: 'sloppyMasonry',
				itemSelector : 'article',
			});
		});
		jQuery('.portfolio-option-set a').click(function(){
			var selector = jQuery(this).attr('data-filter');
			$portfoliocontainer.isotope({ filter: selector });
			return false;
		});
		var $optionSets = jQuery('.portfolio-option-set'),
		$optionLinks = $optionSets.find('a'); 
		$optionLinks.click(function(){
			var $this = jQuery(this);
			if ( $this.hasClass('selected') ) {
				return false;
			}
			var $optionSet = $this.parents('.portfolio-option-set');
			$optionSet.find('.selected').removeClass('selected');
			$this.addClass('selected'); 
		});
		$portfoliocontainer.infinitescroll({
			nextSelector: "#next-posts a",
			navSelector: "#next-posts a",
			itemSelector: ".post",
			contentSelector: ".portfolio-container",
			behavior: "twitter",
			loading: {
				msgText: "Loading More Entries",
				finishedMsg: "All Entries Loaded"
			},
		},
		function( newElements ) {
			var $newElems = jQuery(newElements).css({ opacity: 0 });
			$newElems.imagesLoaded(function(){
				// show elems now they're ready
				$newElems.animate({ opacity: 1 });
				$portfoliocontainer.isotope( 'appended', jQuery( $newElems ) );
			});
		});
	});

	// Isotope Filter / Infinite Scroll for Masonry Blog
	jQuery(document).ready(function() {
		var $masonrycontainer = jQuery('.masonry-container');
		$masonrycontainer.imagesLoaded(function(){
			$masonrycontainer.isotope({
				layoutMode: 'sloppyMasonry',
				itemSelector : 'article',
			});
		});
		jQuery('.masonry-option-set a').click(function(){
			var selector = jQuery(this).attr('data-filter');
			$masonrycontainer.isotope({ filter: selector });
			return false;
		});
		var $optionSets = jQuery('.masonry-option-set'),
		$optionLinks = $optionSets.find('a'); 
		$optionLinks.click(function(){
			var $this = jQuery(this);
			if ( $this.hasClass('selected') ) {
				return false;
			}
			var $optionSet = $this.parents('.masonry-option-set');
			$optionSet.find('.selected').removeClass('selected');
			$this.addClass('selected'); 
		});
		$masonrycontainer.infinitescroll({
			nextSelector: "#next-posts a",
			navSelector: "#next-posts a",
			itemSelector: ".post",
			contentSelector: ".masonry-container",
			behavior: "twitter",
			loading: {
				msgText: "Loading More Entries",
				finishedMsg: "All Entries Loaded"
			},
		},
		function( newElements ) {
			var $newElems = jQuery(newElements).css({ opacity: 0 });
			$newElems.imagesLoaded(function(){
				// show elems now they're ready
				$newElems.animate({ opacity: 1 });
				$masonrycontainer.isotope( 'appended', jQuery( $newElems ) );
			});
		});
	});

	// Gallery Slider
	jQuery(document).ready(function() {
		jQuery('.galleryslider .flexslider').flexslider({
			animationLoop:true,
			animationSpeed:500,
			animation:'slide',
			slideshow: true,
			controlNav: 'thumbnails',
			smoothHeight:true,
			useCSS:false,
			pauseOnAction: true,
			pauseOnHover: true,
		});
	});

	// PostSlide Shortcode
	jQuery(document).ready(function() {
		jQuery('.postslider .flexslider').flexslider({
			animationLoop:true,
			animationSpeed:300,
			animation:'slide',
			slideshow: false,
			controlNav: true,
			smoothHeight:true,
			useCSS:false,
			pauseOnAction: true,
			pauseOnHover: true,
		});
	});


	// Fixed Navigation
	jQuery(document).ready(function() {
		jQuery(window).scroll(function() {
			var yPos = ( jQuery(window).scrollTop() );
			if(yPos > 200) { // show fixed nav bar after screen has scrolled down 200px from the top
				jQuery(".nav-fixed").fadeIn('fast');
			} else {
				jQuery(".nav-fixed").fadeOut('fast');
			}
		});
	});


	// Menu toggle for mobile devices - top navbar.
	(function(){
		var nav = $('.nav-primary'), button, menu;
		if ( ! nav )
			return;

		button = nav.find( '.menu-toggle' );
		if ( ! button )
			return;

		// Hide button if menu is missing or empty.
		menu = nav.find( '#topnav' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		jQuery( '.nav-primary .menu-toggle' ).on( 'click.themebeagle', function() {
			nav.toggleClass( 'toggled-on', 300 );
		} );

	})();

	jQuery('.menu-item-has-children').click(function () {
		jQuery(this).parent().toggleClass( 'shownav', 300 );
	});


	// Menu toggle for mobile devices - header nav bar.
	(function() {
		var nav = $( '.nav-secondary' ), button, menu;
		if ( ! nav )
			return;

		button = nav.find( '.menu-toggle' );
		if ( ! button )
			return;

		// Hide button if menu is missing or empty.
		menu = nav.find( '#secnav' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		jQuery( '.nav-secondary .menu-toggle' ).on( 'click.themebeagle', function() {
			nav.toggleClass( 'toggled-on', 300 );
		});

	})();


	// Menu toggle for mobile devices - fixed nav bar.
	(function() {
		var nav = $( '.nav-fixed' ), button, menu;
		if ( ! nav )
			return;

		button = nav.find( '.menu-toggle' );
		if ( ! button )
			return;

		// Hide button if menu is missing or empty.
		menu = nav.find( '#fixednav' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		jQuery( '.nav-fixed .menu-toggle' ).on( 'click.themebeagle', function() {
			nav.toggleClass( 'toggled-on', 300 );
		});

	})();


	jQuery(document).ready(function() {

		// adding Active class to first selected tab and show
		jQuery("ul.nav-tabs-widget li:first").addClass("active").show();

		// adding Active class to first selected tab and show
		jQuery(".tab-content-widget .tab-pane:first").addClass("in active").show();

		// adding Active class to first selected tab and show
		jQuery(".tabs-top ul.nav-tabs li:first").addClass("active").show(); 

		// adding Active class to first selected tab and show
		jQuery(".tabs-top div.tab-pane:first").addClass("in active").show();

		// adding Active class to first selected tab and show
		jQuery(".tabs-left ul.nav-tabs li:first").addClass("active").show(); 

		// adding Active class to first selected tab and show
		jQuery(".tabs-left div.tab-pane:first").addClass("in active").show(); 
	});

	// These are functions only for the theme demo
	jQuery(".nav-menu .darkheader").click(function(){
		jQuery('body').addClass('darkheader');
		return false;
	});
	jQuery(".nav-menu .lightheader").click(function(){
		jQuery('body').removeClass('darkheader');
		return false;
	});
	jQuery(".nav-menu .unboxed").click(function(){
		jQuery('body').addClass('unboxed');
		return false;
	});
	jQuery(".nav-menu .boxed").click(function(){
		jQuery('body').removeClass('unboxed');
		return false;
	});
	jQuery(".nav-menu .thumb-left").click(function(){
		jQuery('.standard-blog article.post').addClass('thumbs-left');
		jQuery('.standard-blog article.post').removeClass('thumbs-right');
		return false;
	});
	jQuery(".nav-menu .thumb-right").click(function(){
		jQuery('.standard-blog article.post').addClass('thumbs-right');
		jQuery('.standard-blog article.post').removeClass('thumbs-left');
		return false;
	});
	jQuery(".nav-menu .thumb-top").click(function(){
		jQuery('.standard-blog article.post').removeClass('thumbs-right');
		jQuery('.standard-blog article.post').removeClass('thumbs-left');
		return false;
	});
	// End theme demo functions

	jQuery(document).ready(function($) {
		jQuery(".woocommerce ul.products li.product a img, .woocommerce-page ul.products li.product a img").wrap("<div class='product-image-box'></div>");
		jQuery(".widget img.large-thumbnail, .widget img.medium-thumbnail").wrap("<div class='product-image-box'></div>");
		jQuery(".woocommerce ul.products li.product .onsale, .woocommerce-page ul.products li.product .onsale").each(function() { 
			var item = jQuery(this); 
			item.prependTo(item.parent().find(".product-image-box")); 
		});
	});

	// Recipe Print Funtion
	jQuery(document).ready(function(e) {
		jQuery('#recipeprint').on('click', function(e)  {
			jQuery('.recipe-info').printThis({
				exclude: ['hr', '.recipeprint', '.recipe-image', '.recipe-credit' ],
				include: ['.recipeprintlink' ]
			});
			return false;
		}); 
	});

})(jQuery);