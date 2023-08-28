<?php

namespace FP\Gutenberg\Blocks\Contact_Form;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-contact-form';

	public function init_fields(): void {

		$this->add_field( [
			'name'          => 'title',
			'label'         => __( 'Title', 'fp' ),
			'type'          => 'text',
			'default_value' => 'Want to book a treatment or speak to our specialists?',
		] );

		$this->add_field( [
			'name'          => 'description',
			'label'         => __( 'Description', 'fp' ),
			'type'          => 'textarea',
			'default_value' => 'Feel free to contact us or leave your phone number and we’ll get back to you.',
		] );

		$this->add_field( [
			'name'         => 'form',
			'label'        => __( 'Contact Form', 'fp' ),
			'type'         => 'text',
			'instructions' => __( 'Pls put shortcode from Contact Form 7', 'fp' ),
		] );

		$this->add_field( [
			'name'  => 'background_image',
			'label' => __( 'Background Image', 'fp' ),
			'type'  => 'image',
		] );

	}

}
