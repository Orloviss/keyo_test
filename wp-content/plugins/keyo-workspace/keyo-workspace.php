<?php

/*
 * Plugin Name: Keyo functions
 * Description: Основная рабочая логика
 * Author:      Orloviss
 * Version:     1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path(__FILE__) . 'inc/custom-cpt.php';
require_once plugin_dir_path(__FILE__) . 'inc/companies-json-render.php';

// Пути для добавления полей из json в админ панель
function keyo_acf_json_load($paths)
{

    unset($paths[0]);

    $paths[] = plugin_dir_path(__FILE__) . 'acf-json';

    return $paths;
}
add_filter('acf/settings/load_json', 'keyo_acf_json_load');
