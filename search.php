<?php
/**
 * Search results page
 *
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

defined( 'ABSPATH' ) || exit;

global $paged;
if ( ! isset( $paged ) || ! $paged ) {
	$paged = 1;
}

$context          = \Timber\Timber::get_context();
$context['posts'] = new Timber\PostQuery( [ 'post_type' => 'post', 's' => get_search_query(), 'paged' => $paged, ] );

$title = get_field( 'search_page_title', 'options' ) ?: __( 'Search results for', 'fp' );

$data = [
	'title'     => sprintf( "$title : %s", get_search_query() ),
	'no_result' => get_field( 'search_page_no_result', 'options' ) ?: __( 'No results!', 'fp' ),
];

$context = array_merge( $context, $data );

$templates = array( 'search.twig' );

\Timber\Timber::render( $templates, $context );
