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
		$args = apply_filters( sprintf( 'fp_core/post_type/%s/args', static::NAME ), $this->config() );

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

	/**
	 * Proxy props and meta to current post
	 *
	 * @param string $prop
	 * @return mixed
	 */
	public function __get( $prop ) {
		if ( get_post_type() === static::NAME && is_null( $this->post ) ) {
			$this->post = get_post();
		}

		if ( $this->post ) {
			return $this->post->$prop;
		}

		return null;
	}

	public function set_post( \WP_Post $post ) {
		if ( $post->post_type === static::NAME ) {
			$this->post = $post;
		}
	}

}
