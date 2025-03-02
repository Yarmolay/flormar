<?php
/**
 * @package           Shortcode Slider
 *
 * @wordpress-plugin
 * Plugin Name:       Shortcode Slider
 * Description:       In this plugin add Shortcode Slider.
 * Version:           1.1.0
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Author:            WP Team 2142
 * Author URI:        https://google.com
 * Text Domain:       shortcode-slider
 */

/**
 * Woocommerce plugin active.
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( ! is_plugin_active( 'woocommerce/woocommerce.php') ) { ?>
	<div class="alert alert-danger notice is-dismissible" style="border-left: 4px solid red;">
        <p>Sorry, but this plugin requires WooCommerce. <br> So please ensure that WooCommerce is both installed and activated.</p>
    </div>
	<?php
	deactivate_plugins( plugin_basename( __FILE__) );

	if ( isset( $_GET['activate'] ) ) {
		unset( $_GET['activate'] );
	}
}

/**
 * Current plugin version.
 */
define( 'WPCP_VERSION', '1.1.0' );
define( 'WPCP_PLUGIN_DIR', plugin_dir_url( __FILE__ ) );

/**
 * Include styles and bootstrap.
 */
add_action( 'wp_enqueue_scripts', 'enqueue_shortcode_slider_plugin_styles' );
function enqueue_shortcode_slider_plugin_styles() {
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');

	wp_enqueue_script( 'slider-js', WPCP_PLUGIN_DIR.'assets/js/slider.js', array('jquery'), true);
	wp_enqueue_style( 'slider-css', WPCP_PLUGIN_DIR.'assets/css/slider-style.css' );

}

/**
 * Include functionality.
 */
require_once 'includes/class-slider-repository.php';
require_once 'includes/class-slider-controller.php';
