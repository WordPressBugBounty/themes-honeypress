<?php
/**
 * Wrapper for single.php
 */
if ( function_exists( 'hp_fs' ) && hp_fs()->can_use_premium_code() ) {
    require get_parent_theme_file_path( '/pro/single.php' );
} else {
    require get_parent_theme_file_path( '/free/single.php' );
}
