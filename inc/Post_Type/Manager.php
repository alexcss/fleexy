<?php

namespace FP\Post_Type;

defined( 'ABSPATH' ) || exit;

class Manager {

	public function __construct() {
		add_action( 'init', function () {
		} );

		//add_filter( 'post_type_link', [ $this, 'product_remove_slug' ], 10, 3 );
		//add_action( 'pre_get_posts', [ $this, 'product_parse_request' ] );

	}

	public function product_remove_slug( $post_link, $post ) {

		if ( 'product' != $post->post_type || 'publish' != $post->post_status ) {
			return $post_link;
		}

		$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

		return $post_link;
	}

	public function product_parse_request( $query ) {

		if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
			return;
		}

		if ( ! empty( $query->query['name'] ) ) {
			$query->set( 'post_type', [ 'post', 'product', 'page' ] );
		}
	}
}
