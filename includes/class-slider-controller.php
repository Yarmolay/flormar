<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Slider_Controller
{
	private static $instance  = null;
	private $slider_repository = null;

	/**
	 * Class constructor
	 *
	 * @param Slider_Repository $slider_repository
	 */
	private function __construct( Slider_Repository $slider_repository ) {
		$this->slider_repository = $slider_repository;

		add_action( 'admin_init', array( $this, 'shortcode_slider_plugin_check' ) );

	}

	/**
	 * Instance init
	 *
	 * @param Slider_Repository $Slider_repository
	 * @return self|null
	 */
	public static function get_instance( Slider_Repository $Slider_repository ) {
		if ( self::$instance == null ) {
			self::$instance = new self( $Slider_repository );
		}

		return self::$instance;
	}

	/**
	 * Shortcode Slider Plugin Check
	 *
	 * @return void
	 */
	public function shortcode_slider_plugin_check() {

	}

}