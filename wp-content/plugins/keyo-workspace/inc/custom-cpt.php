<?php

/**
 * Регистрация кастомного типа записи «Компании» и таксономий
 */

if (!defined('ABSPATH')) {
    exit;
}
// Регистрация таксономий
function keyo_register_cpt_companies()
{
    $country_labels = array(
        'name' => 'Страны',
        'singular_name' => 'Страна',
        'search_items' => 'Искать страны',
        'all_items' => 'Все страны',
        'edit_item' => 'Редактировать страну',
        'update_item' => 'Обновить страну',
        'add_new_item' => 'Добавить новую страну',
        'new_item_name' => 'Название новой страны',
        'menu_name' => 'Страны',
    );

    $country_args = array(
        'labels' => $country_labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
    );

    register_taxonomy('company_country', array('company'), $country_args);

    $activity_labels = array(
        'name' => 'Виды деятельности',
        'singular_name' => 'Вид деятельности',
        'search_items' => 'Искать виды деятельности',
        'all_items' => 'Все виды деятельности',
        'edit_item' => 'Редактировать вид деятельности',
        'update_item' => 'Обновить вид деятельности',
        'add_new_item' => 'Добавить новый вид деятельности',
        'new_item_name' => 'Название нового вида деятельности',
        'menu_name' => 'Виды деятельности',
    );

    $activity_args = array(
        'labels' => $activity_labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
    );

    register_taxonomy('company_activity', array('company'), $activity_args);

    // Регистрация типа записи «Компании»
    $labels = array(
        'name' => 'Компании',
        'singular_name' => 'Компания',
        'add_new' => 'Добавить компанию',
        'add_new_item' => 'Добавить новую компанию',
        'edit_item' => 'Редактировать компанию',
        'new_item' => 'Новая компания',
        'view_item' => 'Посмотреть компанию',
        'search_items' => 'Искать компании',
        'not_found' => 'Компаний не найдено',
        'not_found_in_trash' => 'В корзине компаний не найдено',
        'menu_name' => 'Компании',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-building',
        'show_in_rest' => true,
        'hierarchical' => false,
        'supports' => array('title'),

        // отключение публичных страниц
        'publicly_queryable' => false,
        'has_archive' => false,
        'exclude_from_search' => true,
    );

    register_post_type('company', $args);
}
add_action('init', 'keyo_register_cpt_companies');
