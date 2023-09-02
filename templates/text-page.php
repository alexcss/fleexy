<?php
/*
Template Name: Text Page
*/

defined( 'ABSPATH' ) || exit;

$context = Timber::context();

Timber::render( [ 'templates/page-text.twig' ], $context );
