<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background as Group_Control_Background;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Perfecto awe Portfolio
 *
 * Elementor widget for awe portfolio
 *
 * @since 1.0.0
 */
class Text_Animation extends Widget_Base {

	public function get_name() {
		return 'awe-text-animation';
	}

	public function get_title() {
		return esc_html__( 'Text Animation', ' aw_elementor' );
	}

	public function get_icon() {
		return 'ad ad-text-animation';
	}

	public function get_categories() {
		return [ 'awe_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'awe-animation' ];
	}

	protected  function get_profile_names() {
		return [
				'apple' => __( 'Apple', 'aw_elementor' ),
				'behance' => __( 'Behance', 'aw_elementor' ),
				'bitbucket' => __( 'BitBucket', 'aw_elementor' ),
				'codepen' => __( 'CodePen', 'aw_elementor' ),
				'delicious' => __( 'Delicious', 'aw_elementor' ),
				'deviantart' => __( 'DeviantArt', 'aw_elementor' ),
				'digg' => __( 'Digg', 'aw_elementor' ),
				'dribbble' => __( 'Dribbble', 'aw_elementor' ),
				'email' => __( 'Email', 'aw_elementor' ),
				'facebook' => __( 'Facebook', 'aw_elementor' ),
				'flickr' => __( 'Flicker', 'aw_elementor' ),
				'foursquare' => __( 'FourSquare', 'aw_elementor' ),
				'github' => __( 'Github', 'aw_elementor' ),
				'houzz' => __( 'Houzz', 'aw_elementor' ),
				'instagram' => __( 'Instagram', 'aw_elementor' ),
				'jsfiddle' => __( 'JS Fiddle', 'aw_elementor' ),
				'linkedin' => __( 'LinkedIn', 'aw_elementor' ),
				'medium' => __( 'Medium', 'aw_elementor' ),
				'pinterest' => __( 'Pinterest', 'aw_elementor' ),
				'product-hunt' => __( 'Product Hunt', 'aw_elementor' ),
				'reddit' => __( 'Reddit', 'aw_elementor' ),
				'slideshare' => __( 'Slide Share', 'aw_elementor' ),
				'snapchat' => __( 'Snapchat', 'aw_elementor' ),
				'soundcloud' => __( 'SoundCloud', 'aw_elementor' ),
				'spotify' => __( 'Spotify', 'aw_elementor' ),
				'stack-overflow' => __( 'StackOverflow', 'aw_elementor' ),
				'tripadvisor' => __( 'TripAdvisor', 'aw_elementor' ),
				'tumblr' => __( 'Tumblr', 'aw_elementor' ),
				'twitch' => __( 'Twitch', 'aw_elementor' ),
				'twitter' => __( 'Twitter', 'aw_elementor' ),
				'vimeo' => __( 'Vimeo', 'aw_elementor' ),
				'vk' => __( 'VK', 'aw_elementor' ),
				'website' => __( 'Website', 'aw_elementor' ),
				'whatsapp' => __( 'WhatsApp', 'aw_elementor' ),
				'wordpress' => __( 'WordPress', 'aw_elementor' ),
				'xing' => __( 'Xing', 'aw_elementor' ),
				'yelp' => __( 'Yelp', 'aw_elementor' ),
				'youtube' => __( 'YouTube', 'aw_elementor' ),
		];
}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'_section_info',
			[
				'label' => __( 'Text Animation', ' aw_elementor' ),
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
							'style2' => __( 'Style 2', ' aw_elementor' ),
					],
				]
        	);


		$this->add_control(
				'title',
					[
					'label'       => __( 'Text', ' aw_elementor' ),
					'type'        => Controls_Manager::TEXT,
					'placeholder' => __( 'Enter Text', ' aw_elementor' ),
					'default'     => __( 'Enter Text', ' aw_elementor' ),
					'label_block' => true,
					'condition'   => [
						'style' => [ 'style1','style2'],
						],
					]
			);


			$this->add_responsive_control(
				'align',
				[
						'label'   => __( 'Alignment', 'aw_elementor' ),
						'type'    => Controls_Manager::CHOOSE,
						'options' => [
								'left' => [
										'title' => __( 'Left', 'aw_elementor' ),
										'icon'  => 'fa fa-align-left',
								],
								'center' => [
										'title' => __( 'Center', 'aw_elementor' ),
										'icon'  => 'fa fa-align-center',
								],
								'right' => [
										'title' => __( 'Right', 'aw_elementor' ),
										'icon'  => 'fa fa-align-right',
								],
								'justify' => [
										'title' => __( 'Justify', 'aw_elementor' ),
										'icon'  => 'fa fa-align-justify',
								],
						],
						'toggle'    => true,
						'selectors' => [
								'{{WRAPPER}}' => 'text-align: {{VALUE}}'
						]
				]
		);

			
			
		$this->end_controls_section();

		$this->start_controls_section(
			'_section_style_common',
				[
						'label' => __( 'Common Style', ' aw_elementor' ),
						'tab'   => Controls_Manager::TAB_STYLE,
						'condition'   => [
							'style' => [ 'style1'],
							],
				]
		);
		
				$this->add_responsive_control(
					'padding',
							[
									'label'      => __( 'Padding', ' aw_elementor'),
									'type'       => Controls_Manager::DIMENSIONS,
									'size_units' => ['px', 'em', '%'],
									'selectors'  => [
											'{{WRAPPER}} .awe-text-ani' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
										'{{WRAPPER}} .awe-text-ani' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
						]
				);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
							'name' => 'p_background',
							'label' => __( 'Background Color', ' aw_elementor' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .awe-text-ani',
					]
			);
		
		
			$this->add_group_control(
					Group_Control_Border:: get_type(),
					[
							'name'     => 'links_border',
							'selector' => '{{WRAPPER}} .awe-text-ani'
					]
			);
		
			$this->add_responsive_control(
				'border_radius',
					[
							'label'      => __( 'Border Radius', ' aw_elementor' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .awe-text-ani' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
					]
			);
				
		$this->end_controls_section();	
		
		$this->start_controls_section(
			'_section_style_text',
				[
						'label' => __( 'Text Style', ' aw_elementor' ),
						'tab'   => Controls_Manager::TAB_STYLE,
						'condition'   => [
							'style' => [ 'style1'],
							],
				]
			);
		
				$this->add_group_control(
					Group_Control_Background::get_type(),
						[
								'name' => 'text_background',
								'label' => __( 'Background Color', ' aw_elementor' ),
								'types' => [ 'classic', 'gradient'],
								'selector' => '{{WRAPPER}} .awe-text-ani p',
						]
				);
		
				
		
			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
						'name'     => 'title_typography',
						'selector' => '{{WRAPPER}} .awe-text-ani p',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				]
			);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'_section_style2_common',
				[
						'label' => __( 'Common Style', ' aw_elementor' ),
						'tab'   => Controls_Manager::TAB_STYLE,
						'condition'   => [
							'style' => [ 'style2'],
							],
				]
		);
		
				$this->add_responsive_control(
					'padding2',
							[
									'label'      => __( 'Padding', ' aw_elementor'),
									'type'       => Controls_Manager::DIMENSIONS,
									'size_units' => ['px', 'em', '%'],
									'selectors'  => [
											'{{WRAPPER}} .awe-text-ani2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									],
							]
				);
		
				$this->add_responsive_control(
				'margin2',
						[
								'label'      => __( 'Margin', ' aw_elementor'),
								'type'       => Controls_Manager::DIMENSIONS,
								'size_units' => ['px', 'em', '%'],
								'selectors'  => [
										'{{WRAPPER}} .awe-text-ani2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
						]
				);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
							'name' => 'p_background2',
							'label' => __( 'Background Color', ' aw_elementor' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .awe-text-ani2',
					]
			);
		
		
			$this->add_group_control(
					Group_Control_Border:: get_type(),
					[
							'name'     => 'links_border2',
							'selector' => '{{WRAPPER}} .awe-text-ani2'
					]
			);
		
			$this->add_responsive_control(
				'border_radius2',
					[
							'label'      => __( 'Border Radius', ' aw_elementor' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .awe-text-ani2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
					]
			);
				
		$this->end_controls_section();	

		$this->start_controls_section(
			'_section_style_text2',
				[
						'label' => __( 'Text Style', ' aw_elementor' ),
						'tab'   => Controls_Manager::TAB_STYLE,
						'condition'   => [
							'style' => [ 'style2'],
							],
				]
			);
		
			
			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
						'name'     => 'title2_typography',
						'selector' => '{{WRAPPER}} .awe-text-ani2 h1',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				]
			);
		
		$this->end_controls_section();

	}

	protected function render() {
		require AWE_PATH . '/modules/text-animation/template/view.php';
	}

	// protected function _content_template() {
	// 	require AWE_PATH . '/modules/text-animation/template/content-template.php';
	// }

}
