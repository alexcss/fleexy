<?php
/**
Template Name: Category Service
*/

defined( 'ABSPATH' ) || exit;

$context = Timber::context();

Timber::render( [ 'page.twig' ], $context );
