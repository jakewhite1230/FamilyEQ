<?php
include('inc/settings.php');
include('inc/galleryShortcode.php');


function register_theme_menus(){
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' )
			)

		);
}

add_action('init', 'register_theme_menus');

function theme_styles() {




	wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('googlefont_css', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300italic');

}

add_action('wp_enqueue_scripts', 'theme_styles');




function theme_js() {

	global $wp_scripts;

	wp_register_script('html5_shiv','https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false);
	wp_register_script('respond_js','https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false);


	$wp_scripts->add_data('html5_shiv', 'conditional', 'lt IE 9');
	$wp_scripts->add_data('respond_js', 'conditional', 'lt IE 9');

	wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script('viewport_js', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', array('jquery'), '', true );
	wp_enqueue_script('waypoints_js', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array('jquery'), '', true );

}

add_action('wp_enqueue_scripts', 'theme_js');

//Add featured Images
add_theme_support( 'post-thumbnails' );

//Allow SVG uploads
function custom_mtypes( $m ){
    $m['svg'] = 'image/svg+xml';
    $m['svgz'] = 'image/svg+xml';
    return $m;
}
add_filter( 'upload_mimes', 'custom_mtypes' );
