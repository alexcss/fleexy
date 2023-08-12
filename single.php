<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

defined( 'ABSPATH' ) || exit;

$context         = \Timber\Timber::context();
$timber_post     = new \Timber\Post();
$context['post'] = $timber_post;

$data = [

];

$context = array_merge( $context, $data );

\Timber\Timber::render( array( 'single.twig' ), $context );
