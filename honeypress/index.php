<?php
/**
 * Wrapper for index.php
 */
if ( function_exists( 'hp_fs' ) && hp_fs()->can_use_premium_code() ) {
    require get_parent_theme_file_path( '/pro/index.php' );
} else {
    require get_parent_theme_file_path( '/free/index.php' );
}
