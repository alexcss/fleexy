<?php

namespace FP\Post_Type\Testimonial;

use FP\Post_Type\Post_Type;

defined( 'ABSPATH' ) || exit;

class Testimonial extends Post_Type {

	const NAME = 'testimonial';
	// eng: explore
	const SLUG = 'testimonials';

	public function config(): array {
		$singular = __( 'Testimonial', 'fp' );
		$plural   = __( 'Testimonials', 'fp' );

		$labels = [
			'name'               => $plural,
			'singular_name'      => $singular,
			'menu_name'          => $plural,
			'all_items'          => sprintf( __( 'All %s', 'studysmarter-core' ), $plural ),
			'add_new'            => __( 'Add New', 'studysmarter-core' ),
			'add_new_item'       => sprintf( __( 'Add %s', 'studysmarter-core' ), $singular ),
			'edit'               => __( 'Edit', 'studysmarter-core' ),
			'edit_item'          => sprintf( __( 'Edit %s', 'studysmarter-core' ), $singular ),
			'new_item'           => sprintf( __( 'New %s', 'studysmarter-core' ), $singular ),
			'view'               => sprintf( __( 'View %s', 'studysmarter-core' ), $singular ),
			'view_item'          => sprintf( __( 'View %s', 'studysmarter-core' ), $singular ),
			'search_items'       => sprintf( __( 'Search %s', 'studysmarter-core' ), $plural ),
			'not_found'          => sprintf( __( 'No %s found', 'studysmarter-core' ), $plural ),
			'not_found_in_trash' => sprintf( __( 'No %s found in trash', 'studysmarter-core' ), $plural ),
			'parent'             => sprintf( __( 'Parent %s', 'studysmarter-core' ), $singular ),
		];

		$args = [
			'labels'       => $labels,
			'public'       => true,
			'show_ui'      => true,
			'supports'     => [ 'title', 'custom-fields', 'revisions', 'author' ],
			//  custom-fields is requred for post_meta to work
			'map_meta_cap' => true,
			'show_in_rest' => true,
			'show_in_menu' => true,
			'rewrite'      => [
				'slug' => self::SLUG,
			],
			'has_archive'  => false,
			'menu_icon'    => 'dashicons-book',
			'template'     => [],
			'taxonomies'   => [],
		];

		return $args;
	}
}
