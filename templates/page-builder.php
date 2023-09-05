<?php
/*
Template Name: Page Builder
*/

defined( 'ABSPATH' ) || exit;

$context = Timber::context();

Timber::render( [ 'templates/page-builder.twig' ], $context );
