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

$context = Timber::context();

Timber::render( '404.twig', $context );
