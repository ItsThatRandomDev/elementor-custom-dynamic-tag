<?php
namespace Custom_Dynamic_Tag\Tags;

class Example_Tag extends \Elementor\Core\DynamicTags\Tag {

	public function get_name() {
		return 'example-tag';
	}

	public function get_title() {
		return __( 'Example Tag', 'elementor-pro' );
	}

	public function get_group() {
		return 'custom-dynamic-tags';
	}

	public function get_categories() {
		return [ \Elementor\Modules\DynamicTags\Module::TEXT_CATEGORY ];
	}

	protected function _register_controls() {

		$this->add_control(
			'input_one',
			[
				'label' => __( 'Input One', 'elementor-pro' ),
				'type'  => \Elementor\Controls_Manager::NUMBER,
				'min'   => 1,
				'max'   => 100,
			]
		);

		$this->add_control(
			'input_two',
			[
				'label' => __( 'Input Two', 'elementor-pro' ),
				'type'  => \Elementor\Controls_Manager::NUMBER,
				'min'   => 1,
				'max'   => 100,
			]
		);

	}

	public function render() {

		$input_one = $this->get_settings( 'input_one' );
		$input_two = $this->get_settings( 'input_two' );

		if ( ! empty( $input_one ) && ! empty( $input_two ) ) {
			echo $input_one + $input_two;
		}

	}
}