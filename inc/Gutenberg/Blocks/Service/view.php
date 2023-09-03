<?php
/**
 * Service Template.
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
$class_name = 'fp-block fp-service-block py-100';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$wrapper_attributes = get_block_wrapper_attributes(
	[
		'class' => esc_attr( $class_name ),
	]
);

$context = Timber::context();

$service_id = get_field( 'service' );

global $wpdb;

$service_query   = $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}bookingpress_services WHERE bookingpress_service_id = %d", $service_id );
$service_results = $wpdb->get_row( $service_query );

//$get_locale = get_locale();

//$service_translation_query = $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}bookingpress_ml_translation WHERE bookingpress_element_ref_id = %d AND WHERE bookingpress_language_code = $get_locale", $service_id );
//$service_translation_results = $wpdb->get_results( $service_translation_query );

$title = '';
$description = '';

$service_image_query   = $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}bookingpress_servicesmeta WHERE bookingpress_service_id = %d AND bookingpress_servicemeta_name = 'service_image_details'", $service_id );
$service_image_results = $wpdb->get_row( $service_image_query );

$service_image_results = $service_image_results ? maybe_unserialize( $service_image_results->bookingpress_servicemeta_value ) : [];

$data = [
	'title'         => $title,
	'description'   => $description,
	'anchor'        => $anchor,
	'attribute'     => $wrapper_attributes,
	'service'       => $service_results,
	'service_image' => $service_image_results ? $service_image_results[0] : null,
];

$context = array_merge( $context, $data );

Timber::render( './view.twig', $context );

