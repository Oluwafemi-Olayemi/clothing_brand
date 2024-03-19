<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class OSF_Elementor_CallToAction extends Elementor\Widget_Base {


	public function get_name() {
		return 'opal-call-to-action';
	}

	public function get_categories() {
		return [ 'opal-addons' ];
	}

	public function get_title() {
		return __( 'Call to Action', 'striz-core' );
	}

	public function get_icon() {
		return 'eicon-image-rollover';
	}

    public static function get_button_sizes() {
        return [
            'xs' => __('Extra Small', 'striz-core'),
            'sm' => __('Small', 'striz-core'),
            'md' => __('Medium', 'striz-core'),
            'lg' => __('Large', 'striz-core'),
            'xl' => __('Extra Large', 'striz-core'),
        ];
    }

	protected function register_controls() {
		$this->start_controls_section(
			'section_main_image',
			[
				'label' => __( 'Image', 'striz-core' ),
			]
		);

		$this->add_control(
			'skin',
			[
				'label' => __( 'Skin', 'striz-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'classic' => __( 'Classic', 'striz-core' ),
					'cover' => __( 'Cover', 'striz-core' ),
				],
				'render_type' => 'template',
				'prefix_class' => 'elementor-cta--skin-',
				'default' => 'classic',
			]
		);

		$this->add_responsive_control(
			'layout',
			[
				'label' => __( 'Layout', 'striz-core' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'striz-core' ),
						'icon'  => 'eicon-h-align-left',
					],
					'above' => [
						'title' => __( 'Above', 'striz-core' ),
						'icon'  => 'eicon-v-align-top',
					],
					'right' => [
						'title' => __( 'Right', 'striz-core' ),
						'icon'  => 'eicon-h-align-right',
					],
                    'below' => [
                        'title' => __( 'Below', 'striz-core' ),
                        'icon'  => 'eicon-v-align-bottom',
                    ],
				],
				'prefix_class' => 'elementor-cta-%s-layout-image-',
				'condition' => [
					'skin!' => 'cover',
				],
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label' => __( 'Choose Image', 'striz-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'show_label' => false,
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'bg_image', // Actually its `image_size`
				'label' => __( 'Image Resolution', 'striz-core' ),
				'default' => 'large',
				'condition' => [
					'bg_image[id]!' => '',
				],
				'separator' => 'none',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'striz-core' ),
			]
		);

		$this->add_control(
			'graphic_element',
			[
				'label' => __( 'Graphic Element', 'striz-core' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'none' => [
						'title' => __( 'None', 'striz-core' ),
						'icon' => 'eicon-ban',
					],
					'image' => [
						'title' => __( 'Image', 'striz-core' ),
						'icon' => 'eicon-image',
					],
					'icon' => [
						'title' => __( 'Icon', 'striz-core' ),
						'icon' => 'eicon-star',
					],
				],
				'separator' => 'before',
				'default' => 'none',
			]
		);

		$this->add_control(
			'graphic_image',
			[
				'label' => __( 'Choose Image', 'striz-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'graphic_element' => 'image',
				],
				'show_label' => false,
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'graphic_image', // Actually its `image_size`
				'default' => 'thumbnail',
				'condition' => [
					'graphic_element' => 'image',
					'graphic_image[id]!' => '',
				],
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'striz-core' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-star',
				'condition' => [
					'graphic_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'icon_view',
			[
				'label' => __( 'View', 'striz-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'striz-core' ),
					'stacked' => __( 'Stacked', 'striz-core' ),
					'framed' => __( 'Framed', 'striz-core' ),
				],
				'default' => 'default',
				'condition' => [
					'graphic_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'icon_shape',
			[
				'label' => __( 'Shape', 'striz-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'circle' => __( 'Circle', 'striz-core' ),
					'square' => __( 'Square', 'striz-core' ),
				],
				'default' => 'circle',
				'condition' => [
					'icon_view!' => 'default',
					'graphic_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'striz-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'This is the heading', 'striz-core' ),
				'placeholder' => __( 'Enter your title', 'striz-core' ),
				'label_block' => true,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'description',
			[
				'label' => __( 'Description', 'striz-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'striz-core' ),
				'placeholder' => __( 'Enter your description', 'striz-core' ),
				'separator' => 'none',
				'rows' => 5,
                'label_block' => true,
//				'show_label' => false,

			]
		);

		$this->add_control(
			'title_tag',
			[
				'label' => __( 'Title HTML Tag', 'striz-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
				],
				'default' => 'h2',
				'condition' => [
					'title!' => '',
				],
			]
		);

		$this->add_control(
			'button',
			[
				'label' => __( 'Button Text', 'striz-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Click Here', 'striz-core' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'striz-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'striz-core' ),

			]
		);

		$this->add_control(
			'link_click',
			[
				'label' => __( 'Apply Link On', 'striz-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'box' => __( 'Whole Box', 'striz-core' ),
					'button' => __( 'Button Only', 'striz-core' ),
				],
				'default' => 'button',
				'separator' => 'none',
				'condition' => [
					'link[url]!' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_ribbon',
			[
				'label' => __( 'Ribbon', 'striz-core' ),
			]
		);

		$this->add_control(
			'ribbon_title',
			[
				'label' => __( 'Title', 'striz-core' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'ribbon_horizontal_position',
			[
				'label' => __( 'Horizontal Position', 'striz-core' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'striz-core' ),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => __( 'Right', 'striz-core' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'condition' => [
					'ribbon_title!' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'box_style',
			[
				'label' => __( 'Box', 'striz-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'min-height',
			[
				'label' => __( 'Min. Height', 'striz-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000,
					],
					'vh' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', 'vh' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__content' => 'min-height: {{SIZE}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'alignment',
			[
				'label' => __( 'Alignment', 'striz-core' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'striz-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'striz-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'striz-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__content' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'vertical_position',
			[
				'label' => __( 'Vertical Position', 'striz-core' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'top' => [
						'title' => __( 'Top', 'striz-core' ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => __( 'Middle', 'striz-core' ),
						'icon' => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => __( 'Bottom', 'striz-core' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'prefix_class' => 'elementor-cta--valign-',
				'separator' => 'none',
			]
		);

		$this->add_responsive_control(
			'padding',
			[
				'label' => __( 'Padding', 'striz-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'heading_bg_image_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Image', 'striz-core' ),
				'condition' => [
					'bg_image[url]!' => '',
					'skin' => 'classic',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'image_min_width',
			[
				'label' => __( 'Min. Width', 'striz-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__bg-wrapper' => 'min-width: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'skin' => 'classic',
				],
			]
		);

		$this->add_responsive_control(
			'image_min_height',
			[
				'label' => __( 'Min. Height', 'striz-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
					'vh' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', 'vh' ],

				'selectors' => [
					'{{WRAPPER}} .elementor-cta__bg-wrapper' => 'min-height: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'skin' => 'classic',
				],
			]
		);

        $this->add_control(
            'content_classic_colors',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Background', 'striz-core' ),
                'separator' => 'before',
            ]
        );

        $this->start_controls_tabs( 'color_tabs' );

        $this->start_controls_tab( 'colors_normal',
            [
                'label' => __( 'Normal', 'striz-core' ),
            ]
        );

        $this->add_control(
            'content_bg_color',
            [
                'label' => __( 'Background Color', 'striz-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-cta__content' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'skin' => 'classic',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            'colors_hover',
            [
                'label' => __( 'Hover', 'striz-core' ),
            ]
        );

        $this->add_control(
            'content_bg_color_hover',
            [
                'label' => __( 'Background Color', 'striz-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-cta:hover .elementor-cta__content' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'skin' => 'classic',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();


		$this->end_controls_section();

		$this->start_controls_section(
			'graphic_element_style',
			[
				'label' => __( 'Graphic Element', 'striz-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'graphic_element!' => 'none',
				],
			]
		);

		$this->add_control(
			'graphic_image_spacing',
			[
				'label' => __( 'Spacing', 'striz-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'graphic_element' => 'image',
				],
			]
		);

		$this->add_control(
			'graphic_image_width',
			[
				'label' => __( 'Size (%)', 'striz-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'default' => [
					'unit' => '%',
				],
				'range' => [
					'%' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__image img' => 'width: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'graphic_element' => 'image',
				],
			]
		);

		$this->add_control(
			'graphic_image_opacity',
			[
				'label' => __( 'Opacity', 'striz-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__image' => 'opacity: {{SIZE}};',
				],
				'condition' => [
					'graphic_element' => 'image',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'graphic_image_border',
				'selector' => '{{WRAPPER}} .elementor-cta__image img',
				'condition' => [
					'graphic_element' => 'image',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'graphic_image_border_radius',
			[
				'label' => __( 'Border Radius', 'striz-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__image img' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'graphic_element' => 'image',
				],
			]
		);

		$this->add_control(
			'icon_spacing',
			[
				'label' => __( 'Spacing', 'striz-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'graphic_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'icon_primary_color',
			[
				'label' => __( 'Primary Color', 'striz-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-view-stacked .elementor-icon' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .elementor-view-framed .elementor-icon, {{WRAPPER}} .elementor-view-default .elementor-icon' => 'color: {{VALUE}}; border-color: {{VALUE}}',
				],
				'condition' => [
					'graphic_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'icon_secondary_color',
			[
				'label' => __( 'Secondary Color', 'striz-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'graphic_element' => 'icon',
					'icon_view!' => 'default',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-view-framed .elementor-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-view-stacked .elementor-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'striz-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'graphic_element' => 'icon',
				],
			]
		);

		$this->add_control(
			'icon_padding',
			[
				'label' => __( 'Icon Padding', 'striz-core' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'em' => [
						'min' => 0,
						'max' => 5,
					],
				],
				'condition' => [
					'graphic_element' => 'icon',
					'icon_view!' => 'default',
				],
			]
		);

		$this->add_control(
			'icon_border_width',
			[
				'label' => __( 'Border Width', 'striz-core' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'border-width: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'graphic_element' => 'icon',
					'icon_view' => 'framed',
				],
			]
		);

		$this->add_control(
			'icon_border_radius',
			[
				'label' => __( 'Border Radius', 'striz-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'graphic_element' => 'icon',
					'icon_view!' => 'default',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content', 'striz-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'title',
							'operator' => '!==',
							'value' => '',
						],
						[
							'name' => 'description',
							'operator' => '!==',
							'value' => '',
						],
						[
							'name' => 'button',
							'operator' => '!==',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'heading_style_title',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Title', 'striz-core' ),
				'separator' => 'before',
				'condition' => [
					'title!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .elementor-cta__title',
				'condition' => [
					'title!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'title_spacing',
			[
				'label' => __( 'Spacing', 'striz-core' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__title:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'title!' => '',
				],
			]
		);

        $this->start_controls_tabs( 'color_title_tabs' );

        $this->start_controls_tab( 'colors_title_normal',
            [
                'label' => __( 'Normal', 'striz-core' ),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Color', 'striz-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-cta__title' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'title!' => '',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'colors_title_hover',
            [
                'label' => __( 'Hover', 'striz-core' ),
            ]
        );

        $this->add_control(
            'title_color_hover',
            [
                'label' => __( 'Color', 'striz-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-cta:hover .elementor-cta__title' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'title!' => '',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

		$this->add_control(
			'heading_style_description',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Description', 'striz-core' ),
				'separator' => 'before',
				'condition' => [
					'description!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .elementor-cta__description',
				'condition' => [
					'description!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'description_spacing',
			[
				'label' => __( 'Spacing', 'striz-core' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__description:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'description!' => '',
				],
			]
		);

        $this->start_controls_tabs( 'color_description_tabs' );

        $this->start_controls_tab('colors_description_normal',
            [
                'label' => __( 'Normal', 'striz-core' ),
            ]
        );


        $this->add_control(
            'description_color',
            [
                'label' => __( 'Color', 'striz-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-cta__description' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'description!' => '',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            'colors_description_hover',
            [
                'label' => __( 'Hover', 'striz-core' ),
            ]
        );


        $this->add_control(
            'description_color_hover',
            [
                'label' => __( 'Color', 'striz-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-cta:hover .elementor-cta__description' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'description!' => '',
                ],
            ]
        );

        $this->add_control(
            'description_background_color_hover',
            [
                'label' => __( 'Background Color', 'striz-core' ),
                'type' => Controls_Manager::COLOR,
                'default'      => '#000',
                'selectors' => [
                    '{{WRAPPER}} .elementor-cta__description span' => 'background-image: linear-gradient(to right, {{VALUE}} 0, {{VALUE}} 100%)',
                ],
                'condition' => [
                    'description!' => '',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => __( 'Button', 'striz-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'button!' => '',
				],
			]
		);












        $this->add_control(
            'button_type',
            [
                'label'        => __('Type', 'striz-core'),
                'type'         => Controls_Manager::SELECT,
                'default'      => 'primary',
                'options'      => [
                    ''                  => __('Default', 'striz-core'),
                    'primary'           => __('Primary', 'striz-core'),
                    'secondary'         => __('Secondary', 'striz-core'),
                    'outline_primary'   => __('Outline Primary', 'striz-core'),
                    'outline_secondary' => __('Outline Secondary', 'striz-core'),
                    'info'              => __('Info', 'striz-core'),
                    'success'           => __('Success', 'striz-core'),
                    'warning'           => __('Warning', 'striz-core'),
                    'danger'            => __('Danger', 'striz-core'),
                ],
                'prefix_class' => 'elementor-button-',
            ]
        );

        $this->add_control(
            'size',
            [
                'label'          => __('Size', 'striz-core'),
                'type'           => Controls_Manager::SELECT,
                'default'        => 'lg',
                'options'        => self::get_button_sizes(),
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'icon_button',
            [
                'label'       => __('Icon', 'striz-core'),
                'type'        => Controls_Manager::ICON,
                'label_block' => true,
                'default'     => '',
            ]
        );

        $this->add_control(
            'icon_button_align',
            [
                'label'     => __('Icon Position', 'striz-core'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'left',
                'options'   => [
                    'left'  => __('Before', 'striz-core'),
                    'right' => __('After', 'striz-core'),
                ],
                'condition' => [
                    'icon_button!' => '',
                ],
            ]
        );

        $this->add_control(
            'icon_button_indent',
            [
                'label'     => __('Icon Spacing', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'max' => 50,
                    ],
                ],
                'condition' => [
                    'icon_button!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-button .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .elementor-button .elementor-align-icon-left'  => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'typography',
                'selector' => '{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button',
            ]
        );

        $this->start_controls_tabs('tabs_button_style');

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => __('Normal', 'striz-core'),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label'     => __('Text Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label'     => __('Background Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => __('Hover', 'striz-core'),
            ]
        );

        $this->add_control(
            'hover_color',
            [
                'label'     => __('Text Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_hover_color',
            [
                'label'     => __('Background Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label'     => __('Border Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'border',
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .elementor-button',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label'      => __('Border Radius', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .elementor-button',
            ]
        );

        $this->add_responsive_control(
            'text_padding',
            [
                'label'      => __('Padding', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );


		$this->end_controls_section();

		$this->start_controls_section(
			'section_ribbon_style',
			[
				'label' => __( 'Ribbon', 'striz-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
				'condition' => [
					'ribbon_title!' => '',
				],
			]
		);

		$this->add_control(
			'ribbon_bg_color',
			[
				'label' => __( 'Background Color', 'striz-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-ribbon-inner' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'ribbon_text_color',
			[
				'label' => __( 'Text Color', 'striz-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-ribbon-inner' => 'color: {{VALUE}}',
				],
			]
		);

		$ribbon_distance_transform = is_rtl() ? 'translateY(-50%) translateX({{SIZE}}{{UNIT}}) rotate(-45deg)' : 'translateY(-50%) translateX(-50%) translateX({{SIZE}}{{UNIT}}) rotate(-45deg)';

		$this->add_responsive_control(
			'ribbon_distance',
			[
				'label' => __( 'Distance', 'striz-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-ribbon-inner' => 'margin-top: {{SIZE}}{{UNIT}}; transform: ' . $ribbon_distance_transform,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'ribbon_typography',
				'selector' => '{{WRAPPER}} .elementor-ribbon-inner',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .elementor-ribbon-inner',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'img_hover_effects',
			[
				'label' => __( 'Image Hover Effects', 'striz-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_hover_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Content', 'striz-core' ),
				'separator' => 'before',
				'condition' => [
					'skin' => 'cover',
				],
			]
		);

		$this->add_control(
			'content_animation',
			[
				'label' => __( 'Hover Animation', 'striz-core' ),
				'type' => Controls_Manager::SELECT,
				'groups' => [
					[
						'label' => __( 'None', 'striz-core' ),
						'options' => [
							'' => __( 'None', 'striz-core' ),
						],
					],
					[
						'label' => __( 'Entrance', 'striz-core' ),
						'options' => [
							'enter-from-right' => 'Slide In Right',
							'enter-from-left' => 'Slide In Left',
							'enter-from-top' => 'Slide In Up',
							'enter-from-bottom' => 'Slide In Down',
							'enter-zoom-in' => 'Zoom In',
							'enter-zoom-out' => 'Zoom Out',
							'fade-in' => 'Fade In',
						],
					],
					[
						'label' => __( 'Reaction', 'striz-core' ),
						'options' => [
							'grow' => 'Grow',
							'shrink' => 'Shrink',
							'move-right' => 'Move Right',
							'move-left' => 'Move Left',
							'move-up' => 'Move Up',
							'move-down' => 'Move Down',
						],
					],
					[
						'label' => __( 'Exit', 'striz-core' ),
						'options' => [
							'exit-to-right' => 'Slide Out Right',
							'exit-to-left' => 'Slide Out Left',
							'exit-to-top' => 'Slide Out Up',
							'exit-to-bottom' => 'Slide Out Down',
							'exit-zoom-in' => 'Zoom In',
							'exit-zoom-out' => 'Zoom Out',
							'fade-out' => 'Fade Out',
						],
					],
				],
				'default' => 'grow',
				'condition' => [
					'skin' => 'cover',
				],
			]
		);

		/*
		 *
		 * Add class 'elementor-animated-content' to widget when assigned content animation
		 *
		 */
		$this->add_control(
			'animation_class',
			[
				'label' => 'Animation',
				'type' => Controls_Manager::HIDDEN,
				'default' => 'animated-content',
				'prefix_class' => 'elementor-',
				'condition' => [
					'content_animation!' => '',
				],
			]
		);

		$this->add_control(
			'sequenced_animation',
			[
				'label' => __( 'Sequenced Animation', 'striz-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'striz-core' ),
				'label_off' => __( 'Off', 'striz-core' ),
				'return_value' => 'elementor-cta--sequenced-animation',
				'prefix_class' => '',
				'condition' => [
					'content_animation!' => '',
				],
			]
		);

		$this->add_control(
			'background_hover_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Background', 'striz-core' ),
				'separator' => 'before',
				'condition' => [
					'skin' => 'cover',
				],
			]
		);

		$this->add_control(
			'transformation',
			[
				'label' => __( 'Hover Animation', 'striz-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => 'None',
					'zoom-in' => 'Zoom In',
					'zoom-out' => 'Zoom Out',
					'move-left' => 'Move Left',
					'move-right' => 'Move Right',
					'move-up' => 'Move Up',
					'move-down' => 'Move Down',
				],
				'default' => 'zoom-in',
				'prefix_class' => 'elementor-bg-transform elementor-bg-transform-',
			]
		);

		$this->start_controls_tabs( 'bg_effects_tabs' );

		$this->start_controls_tab( 'normal',
			[
				'label' => __( 'Normal', 'striz-core' ),
			]
		);

		$this->add_control(
			'overlay_color',
			[
				'label' => __( 'Overlay Color', 'striz-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta:not(:hover) .elementor-cta__bg-overlay' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'overlay_blend_mode',
			[
				'label' => __( 'Blend Mode', 'striz-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'Normal', 'striz-core' ),
					'multiply' => 'Multiply',
					'screen' => 'Screen',
					'overlay' => 'Overlay',
					'darken' => 'Darken',
					'lighten' => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'saturation' => 'Saturation',
					'color' => 'Color',
					'luminosity' => 'Luminosity',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__bg-overlay' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);



		$this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => __( 'Hover', 'striz-core' ),
			]
		);

		$this->add_control(
			'overlay_color_hover',
			[
				'label' => __( 'Overlay Color', 'striz-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta:hover .elementor-cta__bg-overlay' => 'background-color: {{VALUE}}',
				],
			]
		);



		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'effect_duration',
			[
				'label' => __( 'Effect Duration', 'striz-core' ),
				'type' => Controls_Manager::SLIDER,
				'render_type' => 'template',
				'default' => [
					'size' => 500,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 3000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-cta .elementor-cta__bg, {{WRAPPER}} .elementor-cta .elementor-cta__bg-overlay' => 'transition-duration: {{SIZE}}ms',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

        $this->add_render_attribute(
            '_wrapper', 'class', [
                'elementor-widget-call-to-action'
            ]
        );

		$title_tag = $settings['title_tag'];
		$wrapper_tag = 'div';
		$button_tag = 'a';
		$link_url = empty( $settings['link']['url'] ) ? false : $settings['link']['url'];
		$bg_image = '';
		$content_animation = $settings['content_animation'];
		$animation_class = '';
		$print_bg = true;
		$print_content = true;

		if ( ! empty( $settings['bg_image']['id'] ) ) {
			$bg_image = Group_Control_Image_Size::get_attachment_image_src( $settings['bg_image']['id'], 'bg_image', $settings );
		} elseif ( ! empty( $settings['bg_image']['url'] ) ) {
			$bg_image = $settings['bg_image']['url'];
		}

		if ( empty( $bg_image ) && 'classic' == $settings['skin'] ) {
			$print_bg = false;
		}

		if ( empty( $settings['title'] ) && empty( $settings['description'] ) && empty( $settings['button'] ) && 'none' == $settings['graphic_element'] ) {
			$print_content = false;
		}

		$this->add_render_attribute( 'background_image', 'style', [
			'background-image: url(' . $bg_image . ');',
		] );

		$this->add_render_attribute( 'title', 'class', [
			'elementor-cta__title',
			'elementor-cta__content-item',
			'elementor-content-item',
		] );

		$this->add_render_attribute( 'description', 'class', [
			'elementor-cta__description',
			'elementor-cta__content-item',
			'elementor-content-item',
		] );

		$this->add_render_attribute( 'button', 'class', [
			'elementor-cta__button',
			'elementor-button',
			'elementor-size-' . $settings['size'],
		] );

		$this->add_render_attribute( 'graphic_element', 'class',
			[
				'elementor-content-item',
				'elementor-cta__content-item',
			]
		);

		if ( 'icon' === $settings['graphic_element'] ) {
			$this->add_render_attribute( 'graphic_element', 'class',
				[
					'elementor-icon-wrapper',
					'elementor-cta__icon',
				]
			);
			$this->add_render_attribute( 'graphic_element', 'class', 'elementor-view-' . $settings['icon_view'] );
			if ( 'default' != $settings['icon_view'] ) {
				$this->add_render_attribute( 'graphic_element', 'class', 'elementor-shape-' . $settings['icon_shape'] );
			}
			if ( ! empty( $settings['icon'] ) ) {
				$this->add_render_attribute( 'icon', 'class', $settings['icon'] );
			}
		} elseif ( 'image' === $settings['graphic_element'] && ! empty( $settings['graphic_image']['url'] ) ) {
			$this->add_render_attribute( 'graphic_element', 'class', 'elementor-cta__image');
		}

		if ( ! empty( $content_animation ) && 'cover' == $settings['skin'] ) {

			$animation_class = 'elementor-animated-item--' . $content_animation;

			$this->add_render_attribute( 'title', 'class', $animation_class );

			$this->add_render_attribute( 'graphic_element', 'class', $animation_class );

			$this->add_render_attribute( 'description', 'class', $animation_class );

		}

		if ( ! empty( $link_url ) ) {

			if ( 'box' === $settings['link_click'] ) {
				$wrapper_tag = 'a';
				$button_tag  = 'button';
				$this->add_render_attribute( 'wrapper', 'href', $link_url );
				if ( $settings['link']['is_external'] ) {
					$this->add_render_attribute( 'wrapper', 'target', '_blank' );
				}
			} else {
				$this->add_render_attribute( 'button', 'href', $link_url );
				if ( $settings['link']['is_external'] ) {
					$this->add_render_attribute( 'button', 'target', '_blank' );
				}
			}
		}

		$this->add_inline_editing_attributes( 'title' );
		$this->add_inline_editing_attributes( 'description' );
		$this->add_inline_editing_attributes( 'button' );

		?>
		<<?php echo $wrapper_tag . ' ' . $this->get_render_attribute_string( 'wrapper' ); ?> class="elementor-cta">
		<?php if ( $print_bg ) : ?>
			<div class="elementor-cta__bg-wrapper">
				<div class="elementor-cta__bg elementor-bg" <?php echo $this->get_render_attribute_string( 'background_image' ); ?>></div>
				<div class="elementor-cta__bg-overlay"></div>
			</div>
		<?php endif; ?>
		<?php if ( $print_content ) : ?>
			<div class="elementor-cta__content">

                <?php if ( 'image' === $settings['graphic_element'] && ! empty( $settings['graphic_image']['url'] ) ) : ?>
                    <div <?php echo $this->get_render_attribute_string( 'graphic_element' ); ?>>
                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings , 'graphic_image' ); ?>
                    </div>
                <?php elseif ( 'icon' === $settings['graphic_element'] && ! empty( $settings['icon'] ) ) : ?>
                    <div <?php echo $this->get_render_attribute_string( 'graphic_element' ); ?>>
                        <div class="elementor-icon">
                            <i <?php echo $this->get_render_attribute_string( 'icon' ); ?>></i>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( ! empty( $settings['title'] ) ) : ?>
                    <<?php echo $title_tag . ' ' . $this->get_render_attribute_string( 'title' ); ?>>
                    <?php echo $settings['title']; ?>
                    </<?php echo $title_tag; ?>>
                <?php endif; ?>

                <?php if ( ! empty( $settings['description'] ) ) : ?>
                    <div <?php echo $this->get_render_attribute_string( 'description' ); ?>>
                        <span><?php echo $settings['description']; ?></span>
                    </div>
                <?php endif; ?>

                <?php if ( ! empty( $settings['button'] ) ) : ?>
                <div class="elementor-cta__button-wrapper elementor-cta__content-item elementor-content-item <?php echo $animation_class; ?>">
                    <<?php echo $button_tag . ' ' . $this->get_render_attribute_string( 'button' ); ?>>
                        <?php if (!empty($settings['icon_button'])) : ?>
                            <span class="elementor-align-icon-<?php echo esc_attr($settings['icon_button_align']); ?>">
                                <i class="<?php echo esc_attr($settings['icon_button']); ?>" aria-hidden="true"></i>
                            </span>
                        <?php endif; ?>
                    <?php echo $settings['button']; ?>
                    </<?php echo $button_tag; ?>>
                </div>
                <?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $settings['ribbon_title'] ) ) :
			$this->add_render_attribute( 'ribbon-wrapper', 'class', 'elementor-ribbon' );

			if ( ! empty( $settings['ribbon_horizontal_position'] ) ) {
				$this->add_render_attribute( 'ribbon-wrapper', 'class', 'elementor-ribbon-' . $settings['ribbon_horizontal_position'] );
			} ?>
			<div <?php echo $this->get_render_attribute_string( 'ribbon-wrapper' ); ?>>
				<div class="elementor-ribbon-inner"><?php echo $settings['ribbon_title']; ?></div>
			</div>
		<?php endif; ?>
		</<?php echo $wrapper_tag; ?>>
		<?php
	}
}

$widgets_manager->register(new OSF_Elementor_CallToAction());
