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

	protected  function get_profile_names() {
		return [
				'apple' => __( 'Apple', 'aa_elementor' ),
				'behance' => __( 'Behance', 'aa_elementor' ),
				'bitbucket' => __( 'BitBucket', 'aa_elementor' ),
				'codepen' => __( 'CodePen', 'aa_elementor' ),
				'delicious' => __( 'Delicious', 'aa_elementor' ),
				'deviantart' => __( 'DeviantArt', 'aa_elementor' ),
				'digg' => __( 'Digg', 'aa_elementor' ),
				'dribbble' => __( 'Dribbble', 'aa_elementor' ),
				'email' => __( 'Email', 'aa_elementor' ),
				'facebook' => __( 'Facebook', 'aa_elementor' ),
				'flickr' => __( 'Flicker', 'aa_elementor' ),
				'foursquare' => __( 'FourSquare', 'aa_elementor' ),
				'github' => __( 'Github', 'aa_elementor' ),
				'houzz' => __( 'Houzz', 'aa_elementor' ),
				'instagram' => __( 'Instagram', 'aa_elementor' ),
				'jsfiddle' => __( 'JS Fiddle', 'aa_elementor' ),
				'linkedin' => __( 'LinkedIn', 'aa_elementor' ),
				'medium' => __( 'Medium', 'aa_elementor' ),
				'pinterest' => __( 'Pinterest', 'aa_elementor' ),
				'product-hunt' => __( 'Product Hunt', 'aa_elementor' ),
				'reddit' => __( 'Reddit', 'aa_elementor' ),
				'slideshare' => __( 'Slide Share', 'aa_elementor' ),
				'snapchat' => __( 'Snapchat', 'aa_elementor' ),
				'soundcloud' => __( 'SoundCloud', 'aa_elementor' ),
				'spotify' => __( 'Spotify', 'aa_elementor' ),
				'stack-overflow' => __( 'StackOverflow', 'aa_elementor' ),
				'tripadvisor' => __( 'TripAdvisor', 'aa_elementor' ),
				'tumblr' => __( 'Tumblr', 'aa_elementor' ),
				'twitch' => __( 'Twitch', 'aa_elementor' ),
				'twitter' => __( 'Twitter', 'aa_elementor' ),
				'vimeo' => __( 'Vimeo', 'aa_elementor' ),
				'vk' => __( 'VK', 'aa_elementor' ),
				'website' => __( 'Website', 'aa_elementor' ),
				'whatsapp' => __( 'WhatsApp', 'aa_elementor' ),
				'wordpress' => __( 'WordPress', 'aa_elementor' ),
				'xing' => __( 'Xing', 'aa_elementor' ),
				'yelp' => __( 'Yelp', 'aa_elementor' ),
				'youtube' => __( 'YouTube', 'aa_elementor' ),
		];
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
										'style2' => __( 'Style 2', ' aw_elementor' ),
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
						'condition'   => [
							'style' => [ 'style1'],
							],
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
							'condition'   => [
								'style' => [ 'style1'],
								],
						]
			);

			$this->add_control(
				'text_content',
						[
							'label'       => __( 'Content', ' aw_elementor' ),
							'type'        => Controls_Manager::TEXTAREA,
							'placeholder' => __( 'Enter your sub title', ' aw_elementor' ),
							'default'     => __( 'Do you know that you can assign status and relation to a company right in the visit list?', ' aw_elementor' ),
							'label_block' => true,
							'condition'   => [
								'style' => [ 'style2'],
								],
						]
			);

			$this->add_control(
				'icon',
						[
							'label'       => __( 'Icon', 'aa_elementor' ),
							'type'        => Controls_Manager::ICON,
							'label_block' => true,
							'default'     => 'fa fa-exclamation-triangle',
							'condition'   => [
								'style' => [ 'style1','style2'],
								],
						]
				);
        
	$this->end_controls_section();

		$this->start_controls_section(
			'_section_btns',
			[
					'label' => __( 'Button', ' aw_elementor' ),
					'tab'   => Controls_Manager::TAB_CONTENT,
					'condition'   => [
						'style' => ['style2'],
						],
			]
		);

		$this->add_control(
			'button_text',
			[
					'label'       => __( 'Button Text', 'aa_elementor' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __( 'Interested', 'aa_elementor' ),
					'placeholder' => __( 'Type button text here', 'aa_elementor' ),
					'label_block' => true,
			]
	);

	$this->add_control(
			'button_link',
			[
					'label'       => __( 'Link', 'aa_elementor' ),
					'type'        => Controls_Manager::URL,
					'placeholder' => __( 'https://example.com/', 'aa_elementor' ),
			]
	);

	$this->add_control(
			'button_text2',
			[
					'label'       => __( 'Button Text Close', 'aa_elementor' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __( 'No, not interested', 'aa_elementor' ),
					'placeholder' => __( 'Type button text here', 'aa_elementor' ),
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
							'condition'   => [
								'style' => ['style1'],
								],
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
							'condition'   => [
								'style' => ['style1'],
								],
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
							'condition'   => [
								'style' => ['style1'],
								],
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

$this->start_controls_section(
	'_section_style_text',
			[
					'label' => __( 'Content Style', ' aw_elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
					'condition'   => [
						'style' => ['style2'],
						],
			]
);

$this->add_responsive_control(
	'text_color',
			[
					'label'      => __( 'Content Color', ' aw_elementor' ),
					'type'       => Controls_Manager::COLOR,
					'size_units' => [ 'px', '%' ],
					'selectors'  => [
							'{{WRAPPER}} .awe-noti-textcontent' =>'color: {{VALUE}} !important',
					]
			]
	);

	$this->add_group_control(
		Group_Control_Typography:: get_type(),
		[
				'name'     => 'text_typography',
				'label'    => __( 'Title Typography', ' aw_elementor' ),
				'selector' => '{{WRAPPER}} .awe-noti-textcontent',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
		]
);


$this->end_controls_section();

$this->start_controls_section(
	'_section_style_icon',
			[
					'label' => __( 'Icon Style', ' aw_elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
			]
);

$this->add_responsive_control(
	'icon_color',
			[
					'label'      => __( 'Icon Color', ' aw_elementor' ),
					'type'       => Controls_Manager::COLOR,
					'size_units' => [ 'px', '%' ],
					'selectors'  => [
							'{{WRAPPER}} .awe-icon i' =>'color: {{VALUE}} !important',
					]
			]
	);

	$this->add_responsive_control(
		'icon_bg_color',
				[
						'label'      => __( 'Icon BG Color', ' aw_elementor' ),
						'type'       => Controls_Manager::COLOR,
						'size_units' => [ 'px', '%' ],
						'selectors'  => [
								'{{WRAPPER}} .awe-icon' =>'background: {{VALUE}} !important',
						],
						'condition'   => [
							'style' => ['style2'],
							],
				]
		);


$this->end_controls_section();

$this->start_controls_section(
	'_section_style_button',
			[
					'label'       => __( 'Button Style', ' aw_elementor' ),
					'tab'         => Controls_Manager::TAB_STYLE,
					'condition'   => [
						'style' => ['style2'],
						],
			]
);

$this->add_group_control(
	Group_Control_Border:: get_type(),
	[
			'name'     => 'links_borders',
			'selector' => '{{WRAPPER}} .Message-button'
	]
);

$this->add_responsive_control(
	'links_border_radius',
	[
			'label'      => __( 'Border Radius', 'aa_elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors'  => [
					'{{WRAPPER}} .Message-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
	]
);

$this->start_controls_tabs( '_tab_links_colors' );
$this->start_controls_tab(
	'_tab_links_normal',
	[
			'label' => __( 'Normal', 'aa_elementor' ),
	]
);

$this->add_control(
	'links_color',
	[
			'label'     => __( 'Text Color', 'aa_elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
					'{{WRAPPER}} .Message-button' => 'color: {{VALUE}}',
			],
	]
);

$this->add_control(
	'links_bg_color',
	[
			'label'     => __( 'Background Color', 'aa_elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
					'{{WRAPPER}} .Message-button' => 'background-color: {{VALUE}} !important',
			],
	]
);

$this->end_controls_tab();
$this->start_controls_tab(
	'_tab_links_hover',
	[
			'label' => __( 'Hover', 'aa_elementor' ),
	]
);

$this->add_control(
	'links_hover_color',
	[
			'label'     => __( 'Text Color', 'aa_elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
					'{{WRAPPER}} .Message-body a:hover, {{WRAPPER}} .Message-body a:focus' => 'color: {{VALUE}}',
			],
	]
);

$this->add_control(
	'links_hover_bg_color',
	[
			'label'     => __( 'Background Color', 'aa_elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
					'{{WRAPPER}} .Message-body a:hover, {{WRAPPER}} .Message-body a:focus' => 'background-color: {{VALUE}} !important',
			],
	]
);

$this->add_control(
	'links_hover_border_color',
	[
			'label'     => __( 'Border Color', 'aa_elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
					'{{WRAPPER}} .Message-body a:hover, {{WRAPPER}} .Message-body a:focus' => 'border-color: {{VALUE}};',
			],
			'condition' => [
					'links_border_border!' => '',
			]
	]
);

$this->end_controls_tab();
$this->end_controls_tabs();

$this->end_controls_section();
		
			

	}

	protected function render() {
		require AWE_PATH . '/modules/notifications/template/view.php';
	}

	// protected function _content_template() {
	// 	require AWE_PATH . '/modules/notifications/template/content-template.php';
	// }

}
