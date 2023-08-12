<?php

namespace FP\Plugins\Acf;

defined( 'ABSPATH' ) || exit;

abstract class Group {

	protected $fields = [];

	abstract public function init_fields();

	public function title(): string {
		return __( 'Settings', 'fp' );
	}

	/**
	 * ACF form init
	 *
	 * @return void
	 *
	 * @action acf/init
	 */
	abstract public function init(): void;

	protected function handle_sub_fields() {
		foreach ( $this->fields as $index => $field ) {
			if ( isset( $field['sub_fields'] ) ) {
				$this->fields[ $index ]['sub_fields'] = $this->handle_sub_field_keys( $field['sub_fields'], [ $field['name'] ] );
			}
		}
	}

	protected function handle_sub_field_keys( $sub_fields, $branch = [] ) {
		foreach ( $sub_fields as $index => $field ) {
			$current_branch = array_merge( $branch, [ $field['name'] ] );
			if ( empty( $field['key'] ) ) {
				$field['key'] = $this->get_key( $current_branch );
			}

			if ( isset( $field['sub_fields'] ) ) {
				$field['sub_fields'] = $this->handle_sub_field_keys( $field['sub_fields'], $current_branch );
			}

			$sub_fields[ $index ] = $field;
		}

		return $sub_fields;
	}

	protected function add_tab( string $label ): void {
		$this->add_field( [
			'label' => $label,
			'name'  => 'tab_' . sanitize_title( $label ),
			'type'  => 'tab',
		] );
	}

	protected function add_field( array $field ): void {
		if ( empty( $field['name'] ) ) {
			throw new \InvalidArgumentException( __( 'Acf field name empty', 'fp' ) );
		}

		if ( empty( $field['key'] ) ) {
			$field['key'] = $this->get_key( $field['name'] );
		}

		$this->fields[] = $field;
	}

	protected function get_key( $name ) {
		if ( is_array( $name ) ) {
			$name = implode( '_', $name );
		}
		return sprintf( 'fp_acf_key_%s_%s', md5( static::class ), sanitize_title( $name ) );
	}

	protected function is_field( array $field, string $key ): bool {
		if ( empty( $field['key'] ) ) {
			throw new \InvalidArgumentException( __( 'Invalid Acf field', 'fp' ) );
		}

		return $field['key'] === $this->get_key( $key );
	}

}
