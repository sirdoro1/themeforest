<?php
/**
 * Your Inspiration Themes
 *
 * @package WordPress
 * @subpackage Your Inspiration Themes
 * @author Your Inspiration Themes Team <info@yithemes.com>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

add_action( 'wp_enqueue_scripts', 'yiw_enqueue_parent_theme_style', 5 );

if ( ! function_exists( 'yiw_enqueue_parent_theme_style' ) ) {
    /**
     * enqueue the parent css file
     *
     *
     * @return void
     * @since  1.0.0
     * @author Andrea Frascaspata
     */
    function yiw_enqueue_parent_theme_style() {

        wp_enqueue_style( 'reset-bootstrap' );
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css'  );
        wp_enqueue_style( 'main-style' );

        if( function_exists( 'is_shop_installed' ) && is_shop_installed() ) {

            $version = WC()->version;
            $path = WC()->template_path();

            if ( version_compare( preg_replace( '/-beta-([0-9]+)/', '', $version ), WC_LATEST_VERSION, '<' ) ) {
                $path = 'woocommerce_' . substr( $version, 0, 3 ) . '.x/';
            }

            wp_enqueue_style( 'woocommerce-parent-style', get_template_directory_uri() . '/' . $path . 'style.css' );
        }
    }
}



add_action( 'after_setup_theme', 'yiw_child_theme_setup' );

if ( ! function_exists( 'yiw_child_theme_setup' ) ) {
    /**
     * load child language files
     *
     *
     * @return void
     * @since  1.0.0
     * @author Andrea Frascaspata
     */
    function yiw_child_theme_setup() {
        load_child_theme_textdomain( 'yiw', get_stylesheet_directory() . '/languages' );
    }
}