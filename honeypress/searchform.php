<?php
/**
 * Wrapper for searchform.php
 */
if ( function_exists( 'hp_fs' ) && hp_fs()->can_use_premium_code() ) {
    require get_parent_theme_file_path( '/pro/searchform.php' );
} else {
    require get_parent_theme_file_path( '/free/searchform.php' );
}
