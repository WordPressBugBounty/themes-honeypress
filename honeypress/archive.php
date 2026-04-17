<?php
/**
 * Wrapper for archive.php
 */
if ( function_exists( 'hp_fs' ) && hp_fs()->can_use_premium_code() ) {
    require get_parent_theme_file_path( '/pro/archive.php' );
} else {
    require get_parent_theme_file_path( '/free/archive.php' );
}
