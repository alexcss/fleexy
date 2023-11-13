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
$class_name = 'fp-block fp-services-list-block position-relative py-80 py-md-100 py-lg-160 mt-n100';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$wrapper_attributes = get_block_wrapper_attributes(
	[
		'class' => esc_attr( $class_name ),
	]
);

$context = Timber::context();

$services_ids = get_field( 'services' );

$arr = [];
foreach ( $services_ids as $item ) {
	$arr[] = [
		'post'     => Timber::get_post( $item ),
		'children' => Timber::get_posts( [
			'post_parent'    => $item,
			'post_type'      => 'page',
			'posts_per_page' => -1,
		] ),
	];
}

$data = [
	'anchor'    => $anchor,
	'attribute' => $wrapper_attributes,
	'title'     => get_the_title(),
	'services'  => $arr,
];

$context = array_merge( $context, $data );

Timber::render( './view.twig', $context );

