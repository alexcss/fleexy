<?php
/**
 * Our_Team Block Template.
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
$class_name = 'fp-block fp-our-team-block position-relative py-100 py-lg-120';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

$wrapper_attributes = get_block_wrapper_attributes(
	[
		'class' => esc_attr( $class_name ),
	]
);

$context = Timber::context();

$team_id = get_field( 'team' );

$team_id = implode( ',', $team_id );

global $wpdb;

$team_query        = "SELECT * FROM {$wpdb->prefix}bookingpress_staffmembers WHERE bookingpress_staffmember_id IN ($team_id)";
$team_data_results = $wpdb->get_results( $team_query );

if ( ! empty( $team_id ) ) {
	$team_meta_query   = "SELECT * FROM {$wpdb->prefix}bookingpress_staffmembers_meta WHERE bookingpress_staffmember_id IN ($team_id) AND bookingpress_staffmembermeta_key = 'staffmember_avatar_details'";
	$team_meta_results = $wpdb->get_results( $team_meta_query, ARRAY_A );
//	echo '<pre>';
//	var_dump($team_image_results);
//	echo '</pre>';

	foreach ( $team_data_results as $index => &$user ) {
		$user_id       = $user->bookingpress_staffmember_id;
		$user_image_id = array_search( $user_id, array_column( $team_meta_results, 'bookingpress_staffmember_id' ) );

		$team_data_results[ $index ]->image = maybe_unserialize( $team_meta_results[ $user_image_id ]['bookingpress_staffmembermeta_value'] );
	}
}

$data = [
	'anchor'    => $anchor,
	'attribute' => $wrapper_attributes,
	'fields'    => get_fields(),
	'our_team'  => $team_data_results,
];

$context = array_merge( $context, $data );

Timber::render( './view.twig', $context );

