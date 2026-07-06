<?php

/**
 * keyo_test child functions
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!defined('KEYO_TEST_CHILD_VERSION')) {
    define('KEYO_TEST_CHILD_VERSION', '1.0.0');
}

// Подключение стилей и скриптов
function keyo_test_child_scripts()
{
    wp_enqueue_style(
        'keyo-test-normalize',
        get_stylesheet_directory_uri() . '/scss/normalise.css',
        array(),
        KEYO_TEST_CHILD_VERSION
    );

    wp_enqueue_style(
        'keyo-test-child-style',
        get_stylesheet_directory_uri() . '/scss/style.css',
        array('keyo-test-normalize'),
        KEYO_TEST_CHILD_VERSION
    );

    wp_enqueue_script(
        'keyo-test-child-js',
        get_stylesheet_directory_uri() . '/js/main.js',
        array(),
        KEYO_TEST_CHILD_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'keyo_test_child_scripts');
