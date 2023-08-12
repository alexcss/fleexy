<?php

namespace FP\Plugins\Acf;

defined( 'ABSPATH' ) || exit;

abstract class Options_Page extends Group {

	static $main_options_page;

	public function title(): string {
		die( 'function Options_Page::title() must be overridden in a subclass.' );
	}

	/**
	 * ACF form init
	 *
	 * @return void
	 *
	 * @action acf/init
	 */
	public function init(): void {
		$this->init_fields();

		$this->handle_sub_fields();

		if ( self::$main_options_page === null ) {
			$this->create_main_options_page();
		}

		if ( empty( $this->fields ) ) {
			return;
		}

		$child = acf_add_options_sub_page( [
			'page_title'  => 'Options - ' . $this->title(),
			'menu_title'  => $this->title(),
			'parent_slug' => 'options',
		] );

		if ( ! $child ) {
			return;
		}

		$args = [
			'key'    => $this->get_key( 'group' ),
			'title'  => 'Options',
			'fields' => $this->fields,
		];

		$args['location'][] = [
			[
				'param'    => 'options_page',
				'operator' => ' == ',
				'value'    => $child['menu_slug'],
			],
		];

		acf_add_local_field_group( $args );
	}

	protected function create_main_options_page() {
		acf_add_options_page( [
			'page_title' => __( 'Theme General Settings', 'fp' ),
			'menu_title' => __( 'Theme General Settings', 'fp' ),
			'menu_slug'  => 'options',
			'capability' => 'edit_posts',
			'redirect'   => true,
		] );

		self::$main_options_page = true;
	}
}
