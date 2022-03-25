<?php

/**
 * Theme Css and Js
 */
function althos_scripts() {
	// all css files
//	wp_enqueue_style( 'althos-fonts', althos_fonts_url(), array(), '1.0.1' );
	wp_enqueue_style( 'animate', althos_THEME_CSS_DIR . 'animate.css', array() );
	wp_enqueue_style( 'fontawesome', althos_THEME_CSS_DIR . 'fontawesome.min.css', array() );
	wp_enqueue_style( 'bootstrap', althos_THEME_CSS_DIR . 'bootstrap.min.css', array() );
	wp_enqueue_style( 'metisMenu', althos_THEME_CSS_DIR . 'metisMenu.css', array() );
	wp_enqueue_style( 'venobox', althos_THEME_CSS_DIR . 'venobox.min.css', array() );
	wp_enqueue_style( 'slick', althos_THEME_CSS_DIR . 'slick.css', array() );
	wp_enqueue_style( 'aos', althos_THEME_CSS_DIR . 'aos.css', array() );
	wp_enqueue_style( 'spacing', althos_THEME_CSS_DIR . 'spacing.css', array() );
	wp_enqueue_style( 'althos-main', althos_THEME_CSS_DIR . 'main.css', array() );
	wp_enqueue_style( 'althos-style', get_stylesheet_uri() );

	// all js files
	wp_enqueue_script( 'popper', althos_THEME_JS_DIR . 'popper.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'bootstrap', althos_THEME_JS_DIR . 'bootstrap.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'metisMenu', althos_THEME_JS_DIR . 'metisMenu.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'venobox', althos_THEME_JS_DIR . 'venobox.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'slick', althos_THEME_JS_DIR . 'slick.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'aos', althos_THEME_JS_DIR . 'aos.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'althos-main', althos_THEME_JS_DIR . 'script.js', array( 'jquery' ), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}

add_action( 'wp_enqueue_scripts', 'althos_scripts' );


/**
 * Register Google Fonts
 * @return string
 */
function althos_fonts_url() {
	$font_url = '';

	/*
	Translators: If there are characters in your language that are not supported
	by chosen font(s), translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'althos' ) ) {
		$font_url = 'https://fonts.googleapis.com/css2?family=Carter+One&family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,400&display=swap';
	}

	return $font_url;
}