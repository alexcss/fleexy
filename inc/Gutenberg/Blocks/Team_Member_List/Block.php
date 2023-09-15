<?php

namespace FP\Gutenberg\Blocks\Team_Member_List;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-team-member-list';

	public function init_fields(): void {

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
