<?php
// Load CSS từ parent & child theme
function twentytwentyfive_child_enqueue_styles() {
    // style cha
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css'
    );

    // style con
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'twentytwentyfive_child_enqueue_styles');

// Đăng ký khu vực widget cho footer
function mytheme_register_footer_widget() {
    register_sidebar(array(
        'name'          => __('Custom Footer Widget', 'twentytwentyfive-child'),
        'id'            => 'custom-footer-widget',
        'description'   => __('Widget hiển thị ở footer', 'twentytwentyfive-child'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="footer-widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'mytheme_register_footer_widget');
