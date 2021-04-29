<?php
/**
 * Plugin Name: Custom Dynamic Tag
 * Description: Custom Dynamic Tag Example.
 * Version:     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

final class Custom_Dynamic_Tag {

	public function __construct() {

		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'init' ) );

	}

	public function init() {

		// Check if Elementor is installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_elementor_plugin' ] );

			return;
		}

		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once( 'plugin.php' );

	}

	public function admin_notice_missing_elementor_plugin() {

		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
		/* translators: 1: Custom Dynamic Tag for Elementor 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'Custom_Dynamic_Tag' ),
			'<strong>' . esc_html__( 'Custom Dynamic Tag', 'Custom_Dynamic_Tag' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'Custom_Dynamic_Tag' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

}

// Instantiate Custom_Dynamic_Tag.
new Custom_Dynamic_Tag();