<?php
/**
 * Wrapper for content-single.php
 */
if ( function_exists( 'hp_fs' ) && hp_fs()->can_use_premium_code() ) {
    require get_parent_theme_file_path( '/pro/content-single.php' );
} else {
    require get_parent_theme_file_path( '/free/template-parts/content-single.php' );
}
