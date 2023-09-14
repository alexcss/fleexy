<?php

namespace FP\Plugins\Acf\Post_Types;

defined( 'ABSPATH' ) || exit;

use FP\Plugins\Acf\Post_Type;

class Team_Member extends Post_Type {

	const POST_TYPE = 'team_member';

	public function init(): void {

		$this->init_fields();

		$this->handle_sub_fields();

		if ( empty( $this->fields ) ) {
			return;
		}

		$args = [
			'key'    => $this->get_key( 'group' ),
			'title'  => __( 'Content', 'fp' ),
			'fields' => $this->fields,
		];

		$args['location'][] = [
			[
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => static::POST_TYPE,
			],
		];

		acf_add_local_field_group( $args );
	}

	public function init_fields(): void {
		$this->add_field( [
			'name'         => 'description',
			'label'        => __( 'Description', 'fp' ),
			'type'         => 'wysiwyg',
			'required'     => true,
			'toolbar'      => 'fp_header_toolbar',
			'media_upload' => 0,
			'delay'        => 0,
		] );

		$this->add_field( [
			'name'          => 'experience',
			'label'         => __( 'Experience', 'fp' ),
			'type'          => 'text',
			'default_value' => '7 years',
			'required'      => true,
			'wrapper'       => [
				'width' => '50',
			],
		] );

		$this->add_field( [
			'name'          => 'patients',
			'label'         => __( 'Patients', 'fp' ),
			'type'          => 'text',
			'default_value' => '1200+',
			'required'      => true,
			'wrapper'       => [
				'width' => '50',
			],
		] );
	}
}
