<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

defined( 'ABSPATH' ) || exit;

$context         = Timber::get_context();
$context['post'] = get_field( '404_page', 'options' );

$data = [
	'title' => get_field( '404_page_title', 'options' ) ?: __( 'OOOPS... Page not found', 'fp' ),
	'link'  => get_field( '404_page_link', 'options' ),
];

$context = array_merge( $context, $data );

Timber::render( '404.twig', $context );
