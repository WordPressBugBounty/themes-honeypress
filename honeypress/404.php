<?php
/**
 * Wrapper for 404.php
 */
if ( function_exists( 'hp_fs' ) && hp_fs()->can_use_premium_code() ) {
    require get_parent_theme_file_path( '/pro/404.php' );
} else {
    require get_parent_theme_file_path( '/free/404.php' );
}
