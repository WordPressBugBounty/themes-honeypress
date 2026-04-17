<?php
/**
 * Wrapper for index-news.php
 */
if (function_exists('hp_fs') && hp_fs()->can_use_premium_code()) {
    if (file_exists(get_parent_theme_file_path('/pro/inc/home-section/index-news.php'))) {
        require get_parent_theme_file_path('/pro/inc/home-section/index-news.php');
    } else {
        if (wp_get_theme()->get('Name') == 'Bizhunt' || wp_get_theme()->get('Name') == 'HoneyBee' || wp_get_theme()->get('Name') == 'Honeypress Dark' || wp_get_theme()->get('Name') == 'HoneyWaves' || wp_get_theme()->get('Name') == 'Radix Multipurpose' || wp_get_theme()->get('Name') == 'Tromas') {
            require get_stylesheet_directory() . 'index-news.php';
        }else{
            require get_parent_theme_file_path('/free/index-news.php');
        }
    }
} else {
    if (wp_get_theme()->get('Name') == 'Bizhunt' || wp_get_theme()->get('Name') == 'HoneyBee' || wp_get_theme()->get('Name') == 'Honeypress Dark' || wp_get_theme()->get('Name') == 'HoneyWaves' || wp_get_theme()->get('Name') == 'Radix Multipurpose' || wp_get_theme()->get('Name') == 'Tromas') {
        require get_stylesheet_directory() . 'index-news.php';
    }else{
        require get_parent_theme_file_path('/free/index-news.php');
    }
}
