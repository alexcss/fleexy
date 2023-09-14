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

$data = [
	'anchor'    => $anchor,
	'attribute' => $wrapper_attributes,
	'services'  => Timber::get_posts(
		[
			'post_type'      => 'service',
			'posts_per_page' => -1,
			'tax_query'      => [
				[
					'taxonomy' => 'service_category',
					'field'    => 'term_id',
					'terms'    => $service_category_id,
				],
			],
		]
	),
	'title'     => get_field( 'title' ),
];

$context = array_merge( $context, $data );

Timber::render( './view.twig', $context );

