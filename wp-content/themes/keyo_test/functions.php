<?php

/**
 * keyo_test functions and definitions
 *
 * @package keyo_test
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!defined('KEYOTEST_VERSION')) {
    define('KEYOTEST_VERSION', '1.0.0');
}

// Базовые настройки

function keyotest_setup()
{
    load_theme_textdomain('keyotest', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    register_nav_menus(
        array(
            'primary' => esc_html__('Primary Menu', 'keyotest'),
        )
    );

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    add_theme_support(
        'custom-logo',
        array(
            'height' => 100,
            'width' => 100,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'keyotest_setup');
