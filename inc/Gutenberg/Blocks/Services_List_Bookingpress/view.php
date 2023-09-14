<?php
/**
 * Services List Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during backend preview render.
 * @param int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param array $context The context provided to the block by the post or it's parent block.
 */

defined( 'ABSPATH' ) || exit;

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
} else {
	$anchor = 'id="' . esc_attr( $block['id'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'fp-block fp-services-list-block position-relative py-80 py-md-100 py-lg-120';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$wrapper_attributes = get_block_wrapper_attributes(
	[
		'class' => esc_attr( $class_name ),
	]
);

//FP\Gutenberg\Blocks\Services_List\Block::enqueue_script('src/js/services-list.js');

$context = Timber::context();

$service_category_id = get_field( 'service_category' );

global $wpdb;

$services_query   = $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}bookingpress_services WHERE bookingpress_category_id = %d", $service_category_id );
$services_results = $wpdb->get_results( $services_query );

$get_locale = get_locale();

$services_id = [];

if ( is_array( $services_id ) ) {
	foreach ( $services_results as $service ) {
		$services_id[] = $service->bookingpress_service_id;
	}
	$services_id = implode( ',', $services_id );
}


//$services_translation_query   = $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}bookingpress_ml_translation WHERE bookingpress_element_ref_id IN ($services_id) AND bookingpress_language_code = %s", $get_locale );
//$services_translation_results = $wpdb->get_results( $services_translation_query );
//
//foreach ( $services_translation_results as $item ) {
//	$s_id = array_search( $item->bookingpress_element_ref_id, array_column( $services_results, 'bookingpress_service_id' ) );
//	$t_id = array_search( $item->bookingpress_element_ref_id, array_column( $services_translation_results, 'bookingpress_element_ref_id' ) );
//	if ( $item->bookingpress_translated_value ) {
//		$services_results[ $s_id ]->bookingpress_service_name = $item->bookingpress_translated_value;
//	}
//}

if ( ! empty( $services_id ) ) {
	$service_image_query   = $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}bookingpress_servicesmeta WHERE bookingpress_service_id IN ($services_id) AND bookingpress_servicemeta_name = %s", 'service_image_details' );
	$service_image_results = $wpdb->get_results( $service_image_query, ARRAY_A );

	foreach ( $services_results as $index => &$service ) {
		$s_id                              = $service->bookingpress_service_id;
		$s_image_id                        = array_search( $s_id, array_column( $service_image_results, 'bookingpress_service_id' ) );
		$services_results[ $index ]->image = maybe_unserialize( $service_image_results[ $s_image_id ]['bookingpress_servicemeta_value'] );
	}
}

$data = [
	'anchor'    => $anchor,
	'attribute' => $wrapper_attributes,
	'services'  => $services_results,
	'title'     => get_field( 'title' ),
];

$context = array_merge( $context, $data );

Timber::render( './view.twig', $context );

