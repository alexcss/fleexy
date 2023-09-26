<?php

namespace FP\Gutenberg\Blocks\Our_Team;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-our-team';

	public function init_fields(): void {

		$this->add_field( [
			'name'          => 'title',
			'label'         => __( 'Title', 'fp' ),
			'type'          => 'textarea',
			'default_value' => 'Meet Our Team',
			'instructions'  => __( 'if you want to highlight a word use this rule __TEXT__', 'fp' ),
		] );

		$this->add_field( [
			'name'          => 'team_members',
			'label'         => __( 'Team Members', 'fp' ),
			'type'          => 'relationship',
			'post_type'     => [
				0 => 'team_member',
			],
			'post_status'   => [
				0 => 'publish',
			],
			'taxonomy'      => '',
			'filters'       => [
				0 => 'search',
			],
			'elements'      => [
				0 => 'featured_image',
			],
			'return_format' => 'id',
		] );

		$this->add_field( [
			'name'  => 'team_member_cta',
			'label' => __( 'CTA', 'fp' ),
			'type'  => 'link',
		] );

		$this->add_field( [
			'name'          => 'description',
			'label'         => __( 'Description', 'fp' ),
			'type'          => 'textarea',
			'default_value' => 'Lorem Ipsum Title',
			'instructions'  => __( 'if you want to highlight a word use this rule __TEXT__', 'fp' ),
			'new_lines'     => 'br',
		] );

		$this->add_field( [
			'name'  => 'cta',
			'label' => __( 'CTA', 'fp' ),
			'type'  => 'link',
		] );

	}

}
