<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Event Repository class
 */
class Slider_Repository {
	/**
	 * Get Slider from admin
	 *
	 * @param $number
	 * @param $with_shortcode_params
	 * @return int[]|WP_Post[]
	 */
	public function fetch_products_from_store( $params ) {

		$query = array(
			'post_status' => 'publish',
			'post_type' => 'product',
			'posts_per_page' => -1,
		);

		if ( $params['min'] && $params['max'] ) {
			$query['meta_query'] = array(
				array(
					'key' => '_price',
					'value' => array( $params['min'], $params['max'] ),
					'compare' => 'BETWEEN',
					'type' => 'NUMERIC'
				),
			);
		}

		$products_query = new WP_Query($query);

		return $products_query->posts;
	}

	public function chunk_products_for_slider( $array ) {

		$size    = 4;

		return array_chunk($array, $size);
	}

}