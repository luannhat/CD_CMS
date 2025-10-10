<?php
function ttfive_child_enqueue_styles() {
    // Gọi CSS của theme gốc
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css'
    );

    // Gọi CSS của theme con
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'ttfive_child_enqueue_styles');

//
if ( ! function_exists( 'twentytwentyfive_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_post_format_setup' );

// Kích hoạt tính năng post formats cho blog
function ttfive_child_theme_setup() {
    add_theme_support('post-thumbnails'); // ảnh đại diện
    add_theme_support('post-formats', array('image', 'video', 'quote', 'gallery'));
}
add_action('after_setup_theme', 'ttfive_child_theme_setup');