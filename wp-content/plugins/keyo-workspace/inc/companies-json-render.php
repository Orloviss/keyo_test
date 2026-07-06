<?php

/**
 * Сбор данных и вывод в шаблон
 */

if (!defined('ABSPATH')) {
    exit;
}

function keyo_test_render_companies()
{
    $args = array(
        'post_type' => 'company',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC'
    );

    $query = new WP_Query($args);
    $companies_data = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();

            $countries = wp_get_post_terms($post_id, 'company_country', array('fields' => 'names'));
            $activities = wp_get_post_terms($post_id, 'company_activity', array('fields' => 'names'));

            $companies_data[] = array(
                'id' => $post_id,
                'name' => get_field('company_name', $post_id) ? get_field('company_name', $post_id) : get_the_title(),
                'website' => get_field('company_site', $post_id) ? esc_url(get_field('company_site', $post_id)) : '',
                'logo' => get_field('company_logo', $post_id) ? esc_url(get_field('company_logo', $post_id)) : '',
                'description' => get_field('company_description', $post_id)
                    ? wp_strip_all_tags(get_field('company_description', $post_id))
                    : '',
                'countries' => !is_wp_error($countries) ? $countries : array(),
                'activities' => !is_wp_error($activities) ? $activities : array(),
            );
        }
        wp_reset_postdata();
    }

    $json_output = wp_json_encode($companies_data, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP);

    if ($json_output) {
        ?>
        <script id="keyo-companies-data" type="application/json">
            <?php echo $json_output; ?>
        </script>
        <?php
    }
}

add_action('keyo_render_companies_json_data', 'keyo_test_render_companies');
