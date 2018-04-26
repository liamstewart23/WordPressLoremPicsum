<?php
/*
Plugin Name: Lorem Picsum Shortcode
Plugin URI: https://github.com/liamstewart23/WordPressLoremPicsum
Description: Lorem Ipsum... but for photos
Version: 1.0.0
Author: Liam Stewart
Author URI: https://liamstewart.ca
*/

/**
 * @param $atts
 *
 * @return string
 */
function ls_loremPicsum( $atts ) {
    extract( shortcode_atts( array(
        'width'     => '300',
        'height'     => '',
        'blur'      => false,
        'greyscale' => false
    ), $atts ) );

    if($greyscale) {
        $greyscale='/g/';
    }

    if($blur) {
        $blur='?blur';
    }

    return '<img src="https://picsum.photos/'. $greyscale . $width . '/' . $height . $blur .'">';
}

function ls_loremPicsum_shortcodes() {
    add_shortcode( 'picsum', 'ls_loremPicsum' );// register shortcode
    add_filter( 'widget_text', 'do_shortcode' );// shortcodes in widgets
    add_filter( 'the_excerpt', 'do_shortcode' );// shortcodes in widgets
    add_filter( 'comment_text', 'do_shortcode' );// shortcodes in comments
}

add_action( 'init', 'ls_loremPicsum_shortcodes' );// init

