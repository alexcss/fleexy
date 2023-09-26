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

$context = Timber::context();

$data = [
	'title' => sprintf( __( 'Search results for :' ) . " %s", get_search_query() ),
];

$context = array_merge( $context, $data );

$templates = [ 'search.twig' ];

Timber::render( $templates, $context );
