/*
 * The jQuery functions
 */

// Fade out loading screen
jQuery(window).load(function() {
	jQuery( '.loader' ).fadeOut( 500 );

	jQuery( '' ).fitText();
	jQuery( '' ).fitText( 1.2);
	jQuery( '' ).fitText( 1.1, {
		minFontSize: '50px', maxFontSize: '75px'
	});
});


// Various theme functions
jQuery(document).ready( function() {
	// Modal search box
	jQuery( 'a.open-search' ).click( function() {
		jQuery(this).addClass( 'active' );
		jQuery( '.modal-search' ).addClass( 'open' );
	});
	jQuery( 'a.close-search' ).click( function() {
		jQuery( '.modal-search' ).removeClass( 'open' );
		jQuery( 'a.open-search' ).removeClass( 'active' );
	});

	// Scroll to top button
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 400) {
			jQuery( '.to-top' ).addClass( 'scrolled' );
		} else {
			jQuery( '.to-top' ).removeClass( 'scrolled' );
		}
	});
	
	//Click event to scroll to top
	jQuery( '.to-top' ).click(function(){
		jQuery( 'html, body' ).animate({
			scrollTop : 260
		},
		800);
		return false;
	});
});

// Prepend image alternate text
jQuery(document).ready( function() {
	jQuery( 'img' ).attr( 'alt', function( i, val ) {
		return 'Image: ' + val;
	});
});