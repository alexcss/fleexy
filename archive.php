<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */

defined( 'ABSPATH' ) || exit;

$category_query = [
	'taxonomy'   => 'category',
	'hide_empty' => true,
	'parent'     => 0
];

$context                    = Timber::context();
$context['sidebar_title']   = get_field( 'category_page_title', 'options' ) ?: __( 'Category', 'fp' );
$context['title']           = get_the_title( get_option( 'page_for_posts', true ) );
$context['categories']      = Timber::get_terms( $category_query );
$category                   = get_category( get_query_var( 'cat' ) );
$context['active_category'] = $category;

$templates = array( 'home.twig' );

\Timber\Timber::render( $templates, $context );
