<?php

namespace FP\Plugins\Acf\Page_Templates;

defined( 'ABSPATH' ) || exit;

use FP\Plugins\Acf\Page_Template;

class Contact_Us extends Page_Template {

	public function init(): void {

		$this->init_fields();

		$this->handle_sub_fields();

		if ( empty( $this->fields ) ) {
			return;
		}

		$args = [
			'key'    => $this->get_key( 'group' ),
			'title'  => $this->title(),
			'fields' => $this->fields,
		];

		$args['location'][] = [
			[
				'param'    => 'post_template',
				'operator' => '==',
				'value'    => 'page-templates/contact-us.php',
			],
		];

		$args['hide_on_screen'] = [
			0 => 'the_content',
		];

		acf_add_local_field_group( $args );
	}

	public function init_fields() {
		$this->add_field( [
			'label'        => __( 'Title', 'fp' ),
			'name'         => 'hero-title',
			'type'         => 'text',
			'instructions' => __( 'if you want to highlight a word use this rule __TEXT__', 'fp' ),
		] );

	}
}
