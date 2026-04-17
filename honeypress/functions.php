<?php

/**
 * Wrapper for functions.php
 */
if ( !class_exists( 'HoneyPress_Freemius_Mock' ) ) {
    class HoneyPress_Freemius_Mock {
        public function can_use_premium_code() {
            return false;
        }

        public function is_premium() {
            return false;
        }

        public function is_plan( $plan ) {
            return false;
        }

        public function is_free_plan() {
            return true;
        }

    }

}
if ( !function_exists( 'hp_fs' ) ) {
    // Create a helper function for easy SDK access.
    function hp_fs() {
        global $hp_fs;
        if ( !isset( $hp_fs ) ) {
            $honeypress_theme = wp_get_theme();
            $allowed_themes = array(
                'HoneyPress',
                'HoneyPress child',
                'HoneyPress Child',
                'HoneyPress Pro',
                'HoneyPress Pro child',
                'HoneyPress Pro Child',
                'Honeypress Pro',
                'Honeypress Pro child',
                'Honeypress Pro Child'
            );
            if ( in_array( $honeypress_theme->get( 'Name' ), $allowed_themes ) ) {
                // Include Freemius SDK.
                if ( file_exists( dirname( __FILE__ ) . '/freemius/start.php' ) ) {
                    require_once dirname( __FILE__ ) . '/freemius/start.php';
                } elseif ( defined( 'SPICEB_PLUGIN_DIR' ) && file_exists( SPICEB_PLUGIN_DIR . 'inc/freemius/start.php' ) ) {
                    require_once SPICEB_PLUGIN_DIR . 'inc/freemius/start.php';
                }
                if ( function_exists( 'fs_dynamic_init' ) ) {
                    $hp_fs = fs_dynamic_init( array(
                        'id'               => '10308',
                        'slug'             => 'honeypress',
                        'premium_slug'     => 'honeypress-pro',
                        'type'             => 'theme',
                        'public_key'       => 'pk_38baed8cd9bb017d576a6d3238917',
                        'is_premium'       => false,
                        'premium_suffix'   => 'Pro',
                        'has_addons'       => false,
                        'has_paid_plans'   => true,
                        'is_org_compliant' => true,
                        'menu'             => array(
                            'slug'    => 'honeypress-welcome',
                            'account' => true,
                            'support' => true,
                            'contact' => false,
                            'parent'  => array(
                                'slug' => 'themes.php',
                            ),
                        ),
                        'navigation'       => 'menu',
                        'is_live'          => true,
                    ) );
                }
            }
        }
        if ( !isset( $hp_fs ) || !is_object( $hp_fs ) ) {
            $hp_fs = new HoneyPress_Freemius_Mock();
        }
        return $hp_fs;
    }

    // Init Freemius.
    hp_fs();
    // Signal that SDK was initiated.
    do_action( 'hp_fs_loaded' );
}
if ( hp_fs()->can_use_premium_code() ) {
    require get_parent_theme_file_path( '/pro/functions.php' );
} else {
    require get_parent_theme_file_path( '/free/functions.php' );
}