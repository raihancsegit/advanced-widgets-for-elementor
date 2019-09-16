<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background as Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Perfecto aae Portfolio
 *
 * Elementor widget for aae portfolio
 *
 * @since 1.0.0
 */
class Awe_Notifications extends Widget_Base {

	public function get_name() {
		return 'awe-notifications';
	}

	public function get_title() {
		return esc_html__( 'Notifications', ' aw_elementor' );
	}

	public function get_icon() {
		return 'ad ad-injection';
	}

	public function get_categories() {
		return [ 'awe_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'awe-notifications' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'_section_info',
			[
				'label' => __( 'Notifications', ' aw_elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		/*-------------------------------------
			Visual Style
		-------------------------------------*/
        $this->add_control(
            'style',
            [
                'label'   => __( 'Visual Style', ' aw_elementor' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => __( 'Style 1', ' aw_elementor' ),
                ],
            ]
        );


			$this->add_control(
					'title',
					[
						'label'       => __( 'Title', ' aw_elementor' ),
						'type'        => Controls_Manager::TEXT,
						'placeholder' => __( 'Enter your pre title', ' aw_elementor' ),
						'default'     => __( 'Success', ' aw_elementor' ),
						'label_block' => true,
					]
			);

			$this->add_control(
				'sub_title',
						[
							'label'       => __( 'Sub Title', ' aw_elementor' ),
							'type'        => Controls_Manager::TEXT,
							'placeholder' => __( 'Enter your sub title', ' aw_elementor' ),
							'default'     => __( 'Anyone with access can view your invited visitors.', ' aw_elementor' ),
							'label_block' => true,
						]
			);
        
	$this->end_controls_section();
				
				$this->start_controls_section(
					'_section_style_common',
					[
							'label' => __( 'Common Style', ' aw_elementor' ),
							'tab'   => Controls_Manager::TAB_STYLE,
					]
				);

			$this->add_responsive_control(
					'padding',
					[
							'label'      => __( 'Padding', ' aw_elementor'),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => ['px', 'em', '%'],
							'selectors'  => [
									'{{WRAPPER}} .awe-main' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
					]
			);

			$this->add_responsive_control(
				'margin',
				[
						'label'      => __( 'Margin', ' aw_elementor'),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => ['px', 'em', '%'],
						'selectors'  => [
								'{{WRAPPER}} .awe-main' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
				]
		);

			$this->add_group_control(
					Group_Control_Background::get_type(),
					[
							'name' => 'p_background',
							'label' => __( 'Background Color', ' aw_elementor' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .awe-main',
					]
			);


			$this->add_group_control(
					Group_Control_Border:: get_type(),
					[
							'name'     => 'links_border',
							'selector' => '{{WRAPPER}} .awe-main'
					]
			);

			$this->add_responsive_control(
				'border_radius',
					[
							'label'      => __( 'Border Radius', ' aw_elementor' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .awe-main' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
					]
			);

			
			$this->end_controls_section();

			$this->start_controls_section(
					'_section_border_right',
					[
							'label' => __( 'Border Right', ' aw_elementor' ),
							'tab'   => Controls_Manager::TAB_STYLE,
					]
			);

			$this->add_responsive_control(
					'border_right_color',
					[
							'label'      => __( 'Border Right bg Color ', ' aw_elementor' ),
							'type'       => Controls_Manager::COLOR,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .noti--green::before' =>'background-color: {{VALUE}} !important',
							],
					]
			);

		$this->add_responsive_control(
				'border_right_width',
				[
						'label'      => __( 'Border Right Width', ' aw_elementor' ),
						'type'       => Controls_Manager::NUMBER,
						'size_units' => [ 'px', '%' ],
						'selectors'  => [
								'{{WRAPPER}} .noti--green::before' =>'width: {{VALUE}}px !important',
						],
				]
		);

		$this->end_controls_section();
			
		$this->start_controls_section(
					'_section_style_title',
					[
							'label' => __( 'Title Style', ' aw_elementor' ),
							'tab'   => Controls_Manager::TAB_STYLE,
					]
		);
			
				$this->add_responsive_control(
					'title_color',
							[
									'label'      => __( 'Title Color', ' aw_elementor' ),
									'type'       => Controls_Manager::COLOR,
									'size_units' => [ 'px', '%' ],
									'selectors'  => [
											'{{WRAPPER}} .awe-alert-title' =>'color: {{VALUE}} !important',
									]
							]
					);

					$this->add_group_control(
						Group_Control_Typography:: get_type(),
						[
								'name'     => 'title_typography',
								'label'    => __( 'Title Typography', ' aw_elementor' ),
								'selector' => '{{WRAPPER}} .awe-alert-title',
								'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
						]
				);
			

		$this->end_controls_section();
		
		$this->start_controls_section(
			'_section_style_content',
			[
					'label' => __( 'Content Style', ' aw_elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
			]
);
	
		$this->add_responsive_control(
			'content_color',
					[
							'label'      => __( 'Content Color', ' aw_elementor' ),
							'type'       => Controls_Manager::COLOR,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .awe-alert-subtitle' =>'color: {{VALUE}} !important',
							]
					]
			);

			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
						'name'     => 'content_typography',
						'label'    => __( 'Title Typography', ' aw_elementor' ),
						'selector' => '{{WRAPPER}} .awe-alert-subtitle',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				]
		);
	

$this->end_controls_section();
		
			

	}

	protected function render() {
		require AWE_PATH . '/modules/notifications/template/view.php';
	}

	// protected function _content_template() {
	// 	require AWE_PATH . '/modules/notifications/template/content-template.php';
	// }

}
