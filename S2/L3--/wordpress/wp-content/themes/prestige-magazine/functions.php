<?php 
// Get customizer options
require_once get_template_directory() . '/vendor/autoload.php';
use SuperbThemesCustomizer\CustomizerControls;


// New color variables
if(method_exists(CustomizerControls::class, "OverwriteDefault")) {
    CustomizerControls::OverwriteDefault(CustomizerControls::GENERAL_BOXMODE, "1");
    CustomizerControls::OverwriteDefault(CustomizerControls::BLOGFEED_HIDE_SIDEBAR, "0");
    CustomizerControls::OverwriteDefault(CustomizerControls::GENERAL_BOXMODE, "1");

CustomizerControls::OverwriteDefault(CustomizerControls::BLOGFEED_HIDE_BYLINE_IMAGE, "0");
CustomizerControls::OverwriteDefault(CustomizerControls::SINGLE_HIDE_BYLINE_IMAGE, "0");
}


// Get stylesheet
add_action( 'wp_enqueue_scripts', 'prestige_magazine_enqueue_styles' );
function prestige_magazine_enqueue_styles() {
	wp_enqueue_style( 'prestige-magazine-parent-style', get_template_directory_uri() . '/style.css' ); 
} 



// New fonts
function prestige_magazine_enqueue_assets() {
    // Include the file.
    require_once get_theme_file_path('webfont-loader/wptt-webfont-loader.php');
    // Load the webfont.
    wp_enqueue_style(
        'prestige-magazine-fonts',
        wptt_get_webfont_url('https://fonts.googleapis.com/css2?family=Jost:wght@600&family=Lato:wght@400;700&display=swap'),
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'prestige_magazine_enqueue_assets');
