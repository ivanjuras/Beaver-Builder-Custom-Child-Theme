<?php

// ---------- Enable SVG uploads ---------- //

add_filter( 'wp_check_filetype_and_ext', 'bbcct_enable_svg', 10, 4 );
function bbcct_enable_svg( $data, $file, $filename, $mimes ) {
    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
        return $data;
    }

    $filetype = wp_check_filetype( $filename, $mimes );

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}

add_filter( 'upload_mimes', 'bbcct_mime_types' );
function bbcct_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_action( 'admin_head', 'bbcct_fix_svg' );
function bbcct_fix_svg() {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
                width: 100% !important;
                height: auto !important;
        }
        </style>
    ';
}


// ---------- Disable rel='shortlink' and shortlink HTTP header ---------- //

add_filter('after_setup_theme', 'bbcct_remove_shortlink');
function bbcct_remove_shortlink() {
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);
    remove_action( 'template_redirect', 'wp_shortlink_header', 11);
}


// ---------- Disable embeds ---------- //

add_action('init', 'bbcct_remove_embeds');
function bbcct_remove_embeds() {
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
}

