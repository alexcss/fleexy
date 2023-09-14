<?php

namespace FP\Post_Type;

defined( 'ABSPATH' ) || exit;

abstract class Post_Type {

	const NAME = '';
	const SLUG = '';

	protected $post;

	public function config() : array {
		return [];
	}

	/**
	 * Register post type
	 */
	public function register() : void {

		register_post_type( static::NAME, $this->config() );

		$this->add_columns();
	}

	public function add_columns() : void {
		add_filter( sprintf( 'manage_%s_posts_columns', static::NAME ), [ $this, 'columns' ] );
		add_action( sprintf( 'manage_%s_posts_custom_column', static::NAME ), [ $this, 'column' ], 10, 2 );
	}

	public function remove_columns() : void {
		remove_filter( sprintf( 'manage_%s_posts_columns', static::NAME ), [ $this, 'columns' ] );
		remove_action( sprintf( 'manage_%s_posts_custom_column', static::NAME ), [ $this, 'column' ], 10, 2 );
	}

	public function columns( $columns ) : array {
		return $columns;
	}

	public function column( $column, $post_id ) : void {

	}

}
