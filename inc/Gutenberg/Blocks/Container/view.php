<?php
/**
 * Container Block Template.
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
$class_name = 'fp-block fp-container-block py-xl-8';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$wrapper_attributes = get_block_wrapper_attributes(
	[
		'class' => esc_attr( $class_name ),
	]
);

$data = [
	'anchor'    => $anchor,
	'attribute' => $wrapper_attributes,
	'fields'    => get_fields(),
];
?>
<div class="container text-block pb-100 pt-lg-60 pb-lg-120">
	<div class="row">
		<div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 text-block">
			<InnerBlocks />
		</div>
	</div>
</div>
