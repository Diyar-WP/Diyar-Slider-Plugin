<?php
/**
 * Slider block
 *
 * @var array     $attributes Block attributes.
 * @var string    $content    Block default content.
 * @var \WP_Block $block      Block instance.
 *
 * @package wpe/slider-block
 */

$autoplay   = empty( $attributes['autoplay'] ) ? false : $attributes['autoplay'];
$navigation = empty( $attributes['navigation'] ) ? false : $attributes['navigation'];
// $pagination = empty( $attributes['pagination'] ) ? false : $attributes['pagination'];
$pagination = empty( $attributes['pagination'] ) ? false : array(
    'el'        => '.swiper-pagination',
    'clickable' => true,
);
$slidesPerView  = empty( $attributes['slidesPerView'] ) ? 1 : $attributes['slidesPerView'];
$slidesPerViewSmall = empty( $attributes['slidesPerViewSmall'] ) ? 1 : $attributes['slidesPerViewSmall'];
$slidesPerViewMedium = empty( $attributes['slidesPerViewMedium'] ) ? 1 : $attributes['slidesPerViewMedium'];
$speed = empty( $attributes['speed'] ) ? 3000 : $attributes['speed'];
$loop = empty( $attributes['loop'] ) ? true : $attributes['loop'];


$swiper_attr = array(
	'autoplay'   => $autoplay,
	'navigation' => $navigation,
	'pagination' => $pagination,
	'slidesPerView' => $slidesPerView,
	 'slidesPerViewSmall' => $slidesPerViewSmall,
    'slidesPerViewMedium' => $slidesPerViewMedium,
	'loop' => $loop,
	'speed' => $speed,
	'breakpoints'       => array(
		'768' => array(
			'slidesPerView' => $slidesPerViewSmall,
			'spaceBetween'  => 20,
		),
		'1024' => array(
			'slidesPerView' => $slidesPerViewMedium,
			'spaceBetween'  => 30,
		),
	),
);
$swiper_attr = htmlspecialchars( wp_json_encode( $swiper_attr ) );

$wrapper_attributes = get_block_wrapper_attributes(
	array(
		'class' => 'swiper',
	)
);
?>

<div <?php echo wp_kses_data( $wrapper_attributes ) . 'data-swiper="' . esc_attr( $swiper_attr ) . '"'; ?>>

	<div class="swiper-wrapper">
		<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>
	 <div class="swiper-pagination"></div>

</div><!-- .swiper -->
