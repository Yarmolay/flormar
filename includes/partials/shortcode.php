<?php

/**
 * Generates a shortcode to display a flormar slider.
 *
 * @param array $atts Shortcode attributes.
 * @return string|null HTML markup for the Slider block.
 */

add_shortcode( 'flormar-test-slider', 'flormar_test_slider_shortcode' );
function flormar_test_slider_shortcode( $atts ) {

	$atts = shortcode_atts(
		$atts,
		'flormar-test-slider'
	);
	$slider_repository     = new Slider_Repository();
	$products_slider       = $slider_repository->fetch_products_from_store( $atts );
	$chunk_products = $slider_repository->chunk_products_for_slider( $products_slider );

	if ( ! empty( $products_slider ) ) : ?>

		<div class="carousel-slider">
			<div class="carousel">
				<h3><?php _e('המוצרים הנמכרים ביותר ','flormar'); ?></h3>
				<div class="slider-responsive">
					<?php foreach ( $products_slider as $key => $product ) : ?>
						<?php $current_product = wc_get_product( $product->ID );?>
						<div class="item">
							<img class="img" src="<?php echo wp_get_attachment_url( $current_product->get_image_id() ); ?>" alt="slide">
							<h4><?php echo $current_product->get_title(); ?></h4>
							<span>₪<?php echo number_format($current_product->get_price(),2); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
				<a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
					<i class="fa fa-chevron-left fa-lg text-muted"></i>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
					<i class="fa fa-chevron-right fa-lg text-muted"></i>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	<?php else : ?>
		<div class="container">
			<div class="row">
				<h3><?php _e( 'Products not found', 'flormar' ); ?></h3>
			</div>
		</div>
	<?php endif; ?>



<?php
}
