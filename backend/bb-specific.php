<?php

// Add current year shorcode
add_shortcode('currentyear', 'bbcct_create_current_year_shortode');
function bbcct_create_current_year_shortode() {
    return date('Y');
} 

// Remove BB shortcodes
add_action( 'after_setup_theme', 'bbcct_remove_all_presets', 11 );
function bbcct_remove_all_presets() {
    FLCustomizer::remove_preset( 
      array('default-dark' , 'classic' , 'modern' , 'bold' , 
          'stripe' , 'deluxe' , 'premier' , 'dusk' , 'midnight')
     );
}
