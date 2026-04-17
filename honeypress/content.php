<?php
/**
 * Wrapper for content.php
 */
if ( function_exists( 'hp_fs' ) && hp_fs()->can_use_premium_code() ) {
    require get_parent_theme_file_path( '/pro/content.php' );
} else {
    require get_parent_theme_file_path( '/free/template-parts/content.php' );
}
