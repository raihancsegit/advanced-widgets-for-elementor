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
class awe_Mailchimp_Wp extends Widget_Base {

	public function get_name() {
		return 'awe-mailchimp-wp';
	}

	public function get_title() {
		return esc_html__( 'Mailchimp Wp', 'aw_elementor' );
	}

	public function get_icon() {
		return 'ad ad-form';
	}

	public function get_categories() {
		return [ 'awe_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'awe-mailchimp-Wp' ];
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
                'advanced-addons_mailchimp',
                [
                    'label' => __( 'Mailchimp', 'aw_elementor' ),
                ]
            );

            $this->add_control(
                'advanced-addons_mailchimp_id',
                [
                    'label'       => __( 'Mailchimp ID', 'aw_elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'placeholder' => __( '294', 'aw_elementor' ),
                    'description' => __( 'For show ID <a href="admin.php?page=mailchimp-for-wp-forms" target="_blank"> Click here </a>', 'aw_elementor' ),
                    'label_block' => true,
                    'separator'   => 'before',
                ]
            );

        $this->end_controls_section();

          // Style tab section
          $this->start_controls_section(
            'advanced-addons_mailchimp_section_style',
            [
                'label' => __( 'Style', 'aw_elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->add_responsive_control(
                'advanced-addons_mailchimp_section_padding',
                [
                    'label' => __( 'Padding', 'aw_elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .advanced-addons-input-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'advanced-addons_mailchimp_section_margin',
                [
                    'label' => __( 'Margin', 'aw_elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .advanced-addons-input-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );


            $this->add_responsive_control(
                'advanced-addons_mailchimp_section_align',
                [
                    'label' => __( 'Alignment', 'aw_elementor' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'aw_elementor' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'aw_elementor' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'aw_elementor' ),
                            'icon' => 'fa fa-align-right',
                        ],
                        'justify' => [
                            'title' => __( 'Justified', 'aw_elementor' ),
                            'icon' => 'fa fa-align-justify',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .advanced-addons-input-box' => 'text-align: {{VALUE}};',
                    ],
                    'default' => 'center',
                    'separator' =>'before',
                ]
            );

        $this->end_controls_section();

        // Input Box style tab start
        $this->start_controls_section(
            'advanced-addons_mailchimp_input_style',
            [
                'label'     => __( 'Input Box', 'aw_elementor' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'advanced-addons_input_box_height',
                [
                    'label' => __( 'Height', 'aw_elementor' ),
                    'type'  => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'max' => 150,
                        ],
                    ],
                    'default' => [
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .mc4wp-form input[type*="text"]'  => 'height: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .mc4wp-form input[type*="email"]' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'advanced-addons_input_box_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .mc4wp-form input[type*="email"]',
                ]
            );

            $this->add_control(
                'advanced-addons_input_box_background',
                [
                    'label'     => __( 'Background Color', 'aw_elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .mc4wp-form input[type*="text"]'         => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .mc4wp-form input[type*="email"]'        => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .mc4wp-form select[name*="_mc4wp_lists"]' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'advanced-addons_input_box_text_color',
                [
                    'label'     => __( 'Text Color', 'aw_elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .mc4wp-form input[type*="text"]'  => 'color: {{VALUE}};',
                        '{{WRAPPER}} .mc4wp-form input[type*="email"]' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'advanced-addons_input_box_placeholder_color',
                [
                    'label'     => __( 'Placeholder Color', 'aw_elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .mc4wp-form input[type*="text"]::-webkit-input-placeholder'  => 'color: {{VALUE}};',
                        '{{WRAPPER}} .mc4wp-form input[type*="text"]::-moz-placeholder'  => 'color: {{VALUE}};',
                        '{{WRAPPER}} .mc4wp-form input[type*="text"]:-ms-input-placeholder'  => 'color: {{VALUE}};',
                        '{{WRAPPER}} .mc4wp-form input[type*="email"]::-webkit-input-placeholder' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .mc4wp-form input[type*="email"]::-moz-placeholder' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .mc4wp-form input[type*="email"]:-ms-input-placeholder' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .mc4wp-form select[name*="_mc4wp_lists"]'      => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'advanced-addons_input_box_border',
                    'label' => __( 'Border', 'aw_elementor' ),
                    'selector' => '{{WRAPPER}} .mc4wp-form input[type*="email"]',
                ]
            );

            $this->add_responsive_control(
                'advanced-addons_input_box_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'aw_elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .mc4wp-form input[type*="text"]' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                        '{{WRAPPER}} .mc4wp-form input[type*="email"]' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'advanced-addons_input_box_padding',
                [
                    'label' => __( 'Padding', 'aw_elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .mc4wp-form input[type*="text"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .mc4wp-form input[type*="email"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'advanced-addons_input_box_margin',
                [
                    'label' => __( 'Margin', 'aw_elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .mc4wp-form input[type*="text"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .mc4wp-form input[type*="email"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );
           
        $this->end_controls_section(); // Input box style tab end

          // Input submit button style tab start
          $this->start_controls_section(
            'advanced-addons_mailchimp_inputsubmit_style',
            [
                'label'     => __( 'Button', 'aw_elementor' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->start_controls_tabs('advanced-addons_submit_style_tabs');

                // Button Normal tab start
                $this->start_controls_tab(
                    'advanced-addons_submit_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'aw_elementor' ),
                    ]
                );

                    $this->add_control(
                        'advanced-addons_input_submit_height',
                        [
                            'label' => __( 'Height', 'aw_elementor' ),
                            'type'  => Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'max' => 150,
                                ],
                            ],
                            'default' => [
                                'size' => 40,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .mc4wp-form input[type*="submit"]' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'advanced-addons_input_submit_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                            'selector' => '{{WRAPPER}} .mc4wp-form input[type*="submit"]',
                        ]
                    );

                    $this->add_control(
                        'advanced-addons_input_submit_text_color',
                        [
                            'label'     => __( 'Text Color', 'aw_elementor' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .mc4wp-form input[type*="submit"]'  => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'advanced-addons_input_submit_background_color',
                        [
                            'label'     => __( 'Background Color', 'aw_elementor' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .mc4wp-form input[type*="submit"]'  => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'advanced-addons_input_submit_padding',
                        [
                            'label' => __( 'Padding', 'aw_elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .mc4wp-form input[type*="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' =>'before',
                        ]
                    );

                    $this->add_responsive_control(
                        'advanced-addons_input_submit_margin',
                        [
                            'label' => __( 'Margin', 'aw_elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .mc4wp-form input[type*="submit"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' =>'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'advanced-addons_input_submit_border',
                            'label' => __( 'Border', 'aw_elementor' ),
                            'selector' => '{{WRAPPER}} .mc4wp-form input[type*="submit"]',
                        ]
                    );

                    $this->add_responsive_control(
                        'advanced-addons_input_submit_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'aw_elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .mc4wp-form input[type*="submit"]' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                            'separator' =>'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                            'name' => 'advanced-addons_input_submit_box_shadow',
                            'label' => __( 'Box Shadow', 'aw_elementor' ),
                            'selector' => '{{WRAPPER}} .mc4wp-form input[type*="submit"]',
                        ]
                    );

                $this->end_controls_tab(); // Button Normal tab end

                // Button Hover tab start
                $this->start_controls_tab(
                    'advanced-addons_submit_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'aw_elementor' ),
                    ]
                );

                    $this->add_control(
                        'advanced-addons_input_submithover_text_color',
                        [
                            'label'     => __( 'Text Color', 'aw_elementor' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .mc4wp-form input[type*="submit"]:hover'  => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'advanced-addons_input_submithover_background_color',
                        [
                            'label'     => __( 'Background Color', 'aw_elementor' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .mc4wp-form input[type*="submit"]:hover'  => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'advanced-addons_input_submithover_border',
                            'label' => __( 'Border', 'aw_elementor' ),
                            'selector' => '{{WRAPPER}} .mc4wp-form input[type*="submit"]:hover',
                        ]
                    );

                $this->end_controls_tab(); // Button Hover tab end

            $this->end_controls_tabs();

        $this->end_controls_section(); // Input submit button style tab end
		
	}

	protected function render() {
		require AWE_PATH . '/modules/mailchimp-wp/template/view.php';
    }

    // protected function _content_template() {
	// 	require AWE_PATH . '/modules/inline-notice/template/content-template.php';
	// }
    



}
