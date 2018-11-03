<?php

//---------- Enqueue styles -----------//

add_action( 'wp_enqueue_scripts', 'bbcct_enqueue_styles', 10000 );
function bbcct_enqueue_styles() {

	wp_enqueue_style(
        'bbcct-child-theme',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        null
    );

}


//---------- Enqueue scripts -----------//

add_action( 'wp_enqueue_scripts', 'bbcct_enqueue_scripts' );
function bbcct_enqueue_scripts() {

	wp_enqueue_script(
		'bbcct-main-script',
		get_stylesheet_directory_uri() . '/frontend/bbcct-scripts.js',
		array( 'jquery' ),
		null,
		true
	);

}