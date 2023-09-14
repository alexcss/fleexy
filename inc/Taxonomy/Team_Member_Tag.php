<?php

namespace FP\Taxonomy;

defined( 'ABSPATH' ) || exit;

class Team_Member_Tag extends Taxonomy {
	const NAME = 'team_member_tag';
	const POST_TYPE = 'team_member';

	public function config(): array {
		$singular = __( 'Tag', 'fp' );
		$plural   = __( 'Tags', 'fp' );

		$labels = [
			'name'              => $plural,
			'singular_name'     => $singular,
			'search_items'      => sprintf( __( 'Search %s', 'fp' ), $plural ),
			'all_items'         => sprintf( __( 'All %s', 'fp' ), $plural ),
			'view_item'         => sprintf( __( 'View %s', 'fp' ), $singular ),
			'parent_item'       => sprintf( __( 'Parent %s', 'fp' ), $singular ),
			'parent_item_colon' => sprintf( __( 'Parent %s:', 'fp' ), $singular ),
			'edit_item'         => sprintf( __( 'Edit %s', 'fp' ), $singular ),
			'update_item'       => sprintf( __( 'Update %s', 'fp' ), $singular ),
			'add_new_item'      => sprintf( __( 'Add %s', 'fp' ), $singular ),
			'new_item_name'     => sprintf( __( 'New %s', 'fp' ), $singular ),
			'menu_name'         => $plural,
			'back_to_items'     => sprintf( __( '← Back to %s', 'fp' ), $singular ),
		];

		$args = [
			'labels'             => $labels,
			//'description'        => '',
			'public'             => true,
			'publicly_queryable' => false, // равен аргументу public
			'show_in_nav_menus'  => true, // равен аргументу public
			'show_ui'            => true, // равен аргументу public
			//'show_in_menu'       => true, // равен аргументу show_ui
			//'show_tagcloud'      => true, // равен аргументу show_ui
			//'show_in_quick_edit' => null, // равен аргументу show_ui
			'hierarchical'       => false,
			'rewrite'            => true,
			//'query_var'          => $taxonomy, // название параметра запроса
			//'capabilities'       => [],
			'show_admin_column'  => true,
			'show_in_rest'       => true,
		];

		return $args;
	}
}
