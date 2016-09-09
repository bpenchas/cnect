<?php

require 'include/util.php';
require 'include/guest-authors.php';
require 'include/ajax_v1.php';

function infinite_scroll_render(){
    get_template_part('post-loop');
}

function cnect_add_theme_support() {
    add_theme_support('post-thumbnails', array('post'));
    add_theme_support('infinite-scroll', array(
    'container' => 'scroll',
    'render' => 'infinite_scroll_render',
    'footer' => false,));

    $args = array(
        'width'         => 1280,
        'height'        => 548,
        'default-image' => get_template_directory_uri() . '/images/header.jpg',
    );
    add_theme_support('custom-header', $args);
}

function cnect_scripts_method() {
    wp_enqueue_script('jquery');
    wp_enqueue_script(
        'responsive',
        // get_stylesheet_directory_uri() . '/responsive.js?' . time(),
        get_stylesheet_directory_uri() . '/responsive.js'
        // array( 'jquery' )

    );
}

function cnect_register_menus() {
    register_nav_menus(array(
        'main_navigation'       => 'Main Navigation',
        'schools_navigation'    => 'Schools Menu'
        ));
}


add_action('wp_ajax_posts', 'ajax_posts');
add_action('wp_ajax_nopriv_posts', 'ajax_posts');

add_action('wp_ajax_categories', 'ajax_categories');
add_action('wp_ajax_nopriv_categories', 'ajax_categories');

add_action('wp_ajax_tags', 'ajax_tags');
add_action('wp_ajax_nopriv_tags', 'ajax_tags');

add_action('after_setup_theme', 'cnect_add_theme_support');
add_action('after_setup_theme', 'cnect_register_menus');
add_action('wp_footer', 'cnect_scripts_method');

