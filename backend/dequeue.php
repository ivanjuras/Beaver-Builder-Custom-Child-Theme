<?php

// ---------- Dequeue styles ---------- //

add_action( 'wp_enqueue_styles', 'bbcct_deregister_styles', 9999 );
add_action( 'wp_print_styles', 'bbcct_deregister_styles', 9999 );
function bbcct_deregister_styles() {

	wp_dequeue_style( 'fl-builder-google-fonts' );
	wp_dequeue_style( 'open-sans-css' );
	wp_dequeue_style( 'font-awesome' );

	// Disable Yoast SEO bar on the front-end
	if ( ! is_admin() ) {
		wp_dequeue_style( 'yoast-seo-adminbar' );
	}

}


// ---------- Dequeue scripts ---------- //

add_action( 'wp_print_scripts', 'bbcct_dequeue_scripts', 9999 );
function bbcct_dequeue_scripts() {

    wp_dequeue_script( 'responsive-menu-pro-font-awesome' );
    
}
