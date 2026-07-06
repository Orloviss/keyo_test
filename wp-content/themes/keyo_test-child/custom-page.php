<?php

/**
 * Template Name: Шаблон страницы "Компании"
 */

get_header(); ?>

<main class="companies">
    <div class="container">

        <h1 class="title">
            <?php the_title(); ?>
        </h1>


        <div class="companies-block">
            <!-- Фильтр -->
            <div class="companies-filter">

                <div class="companies-filter__item">
                    <label class="companies-filter__label" for="filter-country">Страна</label>
                    <select class="companies-filter__select" id="filter-country">
                        <option value="">Все страны</option>
                    </select>
                </div>

                <div class="companies-filter__item">
                    <label class="companies-filter__label" for="filter-has-site">Сайт компании</label>
                    <div class="companies-filter__checkbox-wrapper">
                        <input class="companies-filter__checkbox" type="checkbox" id="filter-has-site">
                        <span class="companies-filter__checkbox-text">Есть сайт</span>
                    </div>
                </div>
            </div>

            <div id="companies-json" class="companies-list">
                <div class="companies-loading">Загрузка списка компаний...</div>
            </div>
        </div>

    </div>
</main>

<?php
// хук вывода компаний
do_action('keyo_render_companies_json_data');
?>

<?php get_footer(); ?>