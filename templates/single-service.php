<?php
/**
Template Name: Single Service
*/

defined( 'ABSPATH' ) || exit;

$context = Timber::context();

Timber::render( [ 'page.twig' ], $context );
