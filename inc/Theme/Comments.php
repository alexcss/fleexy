<?php

namespace FP\Theme;

defined( 'ABSPATH' ) || exit;

class Comments {
	public function __construct() {
		/** Remove comments metabox from dashboard. **/
		add_action( 'admin_init', [ $this, 'disable_comments_dashboard' ] );

		/** Disable support for comments and trackbacks in post types. **/
		add_action( 'admin_init', [ $this, 'disable_comments_post_types_support' ] );

		/** Redirect any user trying to access comments page. **/
		add_action( 'admin_init', [ $this, 'disable_comments_admin_menu_redirect' ] );

		/** Remove comments page in menu. **/
		add_action( 'admin_menu', [ $this, 'disable_comments_admin_menu' ] );

		/** Remove comments links from admin bar. **/
		add_action( 'add_admin_bar_menus', [ $this, 'disable_comments_admin_bar' ] );

		/** Close comments on the front-end. **/
		add_filter( 'comments_open', '__return_false', 20, 2 );
		add_filter( 'pings_open', '__return_false', 20, 2 );

		/** Hide existing comments **/
		add_filter( 'comments_array', '__return_empty_array', 10, 2 );

		/** Return a comment count of zero to hide existing comment entry link. **/
		add_filter( 'get_comments_number', '__return_false' );

	}

	public function disable_comments_admin_bar(): void {
		if ( is_admin_bar_showing() ) {
			remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
		}
	}

	public function disable_comments_dashboard(): void {
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	}

	public function disable_comments_admin_menu(): void {
		remove_menu_page( 'edit-comments.php' );
		remove_submenu_page( 'options-general.php', 'options-discussion.php' );
	}

	public function disable_comments_post_types_support(): void {
		$post_types = get_post_types();
		foreach ( $post_types as $post_type ) {
			if ( post_type_supports( $post_type, 'comments' ) ) {
				remove_post_type_support( $post_type, 'comments' );
				remove_post_type_support( $post_type, 'trackbacks' );
			}
		}
	}

	public function disable_comments_admin_menu_redirect(): void {
		global $pagenow;
		if ( ( 'edit-comments.php' === $pagenow || $pagenow === 'options-discussion.php' ) && ! is_super_admin() ) {
			wp_redirect( admin_url() );
			exit;
		}
	}

}
