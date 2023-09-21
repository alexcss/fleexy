<?php

namespace FP\Gutenberg;

defined( 'ABSPATH' ) || exit;

class Core {
	const DEFAULT_BLOCKS = [
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/list-item',
		'core/quote',
		'core/table',
		'core/shortcode',
		'core/block',
		'core/template'
	];

	// TODO: Refactor to use the main block array from Register.php
	const CUSTOM_BLOCKS = [
//		'acf/fp-example',
		'acf/fp-container',
		'acf/fp-hero',
		'acf/fp-image',
		'acf/fp-our-team',
		'acf/fp-our-advantages',
		'acf/fp-testimonial',
		'acf/fp-contact-form',
		'acf/fp-slider',
		'acf/fp-what-we-offer',
		'acf/fp-google-maps',
		'acf/fp-contact-us',
		'acf/fp-service',
		'acf/fp-services-list',
		'acf/fp-team-member-list',
	];


	public function __construct() {
		// remove core blocks
		add_filter( 'allowed_block_types_all', [ $this, 'allowed_blocks' ] );
		// disable gutenberg editor
		add_filter( 'gutenberg_can_edit_post_type', [ $this, 'disable_gutenberg_editor' ], 10, 2 );
		add_filter( 'use_block_editor_for_post_type', [ $this, 'disable_gutenberg_editor' ], 10, 2 );
		// remove blocks pattern
		add_action( 'init', [ $this, 'remove_block_pattern' ] );

	}

	public function remove_block_pattern(): void {
		remove_theme_support( 'core-block-patterns' );
	}

	/**
	 * Templates and Page IDs without editor
	 */
	function disable_editor( $id = false ): array|bool {

		$excluded_templates = [
			'templates/text-page.php',
		];

		$excluded_ids = [ get_option( 'page_for_posts' ) ];

		if ( empty( $id ) ) {
			return false;
		}

		$id       = intval( $id );
		$template = get_page_template_slug( $id );

		return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
	}

	/**
	 * Disable Gutenberg by template
	 */
	function disable_gutenberg_editor( $can_edit, $post_type ) {

		$disabled_post_types = [ 'testimonial' ];

		if ( in_array( $post_type, $disabled_post_types, true ) ) {
			$can_edit = false;
		}

		if ( ! ( is_admin() && ! empty( $_GET['post'] ) ) ) {
			return $can_edit;
		}

		if ( $this->disable_editor( $_GET['post'] ) ) {
			$can_edit = false;
		}

		return $can_edit;

	}

	public function allowed_blocks( $allowed_blocks ): array {

		return array_merge( static::DEFAULT_BLOCKS, static::CUSTOM_BLOCKS );
	}
}
