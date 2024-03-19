<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Color as Scheme_Color;
use Elementor\Group_Control_Border;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class OSF_Elementor_Header_Group extends Elementor\Widget_Base {

    public function get_name() {
        return 'opal-header-group';
    }

    public function get_title() {
        return __('Opal Header Group', 'striz-core');
    }

    public function get_icon() {
        return 'eicon-lock-user';
    }

    public function get_categories() {
        return ['opal-addons'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'account_config',
            [
                'label' => __('Config', 'striz-core'),
            ]
        );

        $this->add_control(
            'show_wishlist',
            [
                'label' => __('Show wishlist', 'striz-core'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'show_search',
            [
                'label' => __('Show search form', 'striz-core'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'show_account',
            [
                'label' => __('Show account', 'striz-core'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'show_cart',
            [
                'label' => __('Show cart', 'striz-core'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_responsive_control(
            'align_config',
            [
                'label'     => __('Alignment', 'striz-core'),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'flex-start' => [
                        'title' => __('Left', 'striz-core'),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center'     => [
                        'title' => __('Center', 'striz-core'),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'flex-end'   => [
                        'title' => __('Right', 'striz-core'),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'center',
                'selectors' => [
                    '{{WRAPPER}}.elementor-widget-opal-header-group .elementor-widget-container ' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //Wishlist config
        $this->start_controls_section(
            'wishlist_config',
            [
                'label'     => __('WooCommerce Wishlist', 'striz-core'),
                'condition' => [
                    'show_wishlist!' => '',
                ],
            ]
        );

        $this->add_control(
            'wishlist_icon',
            [
                'label'   => __('Choose Icon', 'striz-core'),
                'type'    => Controls_Manager::ICON,
                'default' => 'opal-icon-favourite',
            ]
        );

        $this->add_control(
            'show_subtotal',
            [
                'label' => __('Show Total', 'striz-core'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'title_wishtlist_hover',
            [
                'label'       => __('Title Hover', 'striz-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('View wishlist ', 'striz-core'),
                'label_block' => true,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'config_wishlist_border',
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .elementor-widget-container .wishlist-woocommerce',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'config_wishlist_border_radius',
            [
                'label'      => __('Border Radius', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-widget-container .wishlist-woocommerce' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'config_wishlist_padding',
            [
                'label'      => __('Padding', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-widget-container .wishlist-woocommerce' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'config_wishlist_margin',
            [
                'label'      => __('Margin', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-widget-container .wishlist-woocommerce' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //End Wishlist config

        //Search form config
        $this->start_controls_section(
            'search_config',
            [
                'label'     => __('Search Form', 'striz-core'),
                'condition' => [
                    'show_search!' => '',
                ],
            ]
        );


        $this->add_control(
            'skin',
            [
                'label'              => __('Skin', 'striz-core'),
                'type'               => Controls_Manager::SELECT,
                'default'            => 'classic',
                'options'            => [
                    'classic'     => __('Classic', 'striz-core'),
                    'minimal'     => __('Minimal', 'striz-core'),
                    'full_screen' => __('Full Screen', 'striz-core'),
                ],
                'prefix_class'       => 'elementor-search-form--skin-',
                'render_type'        => 'template',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'icon_skin',
            [
                'label'     => __('Choose Icon', 'striz-core'),
                'type'      => Controls_Manager::ICON,
                'default'   => 'opal-icon-search',
                'condition' => [
                    'skin!' => 'classic',
                ],
            ]
        );

        $this->add_control(
            'placeholder',
            [
                'label'     => __('Placeholder', 'striz-core'),
                'type'      => Controls_Manager::TEXT,
                'separator' => 'before',
                'default'   => __('Search', 'striz-core') . '...',
            ]
        );

        $this->add_control(
            'heading_button_content',
            [
                'label'     => __('Button', 'striz-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'skin' => 'classic',
                ],
            ]
        );

        $this->add_control(
            'button_type',
            [
                'label'        => __('Type', 'striz-core'),
                'type'         => Controls_Manager::SELECT,
                'default'      => 'icon',
                'options'      => [
                    'icon' => __('Icon', 'striz-core'),
                    'text' => __('Text', 'striz-core'),
                ],
                'prefix_class' => 'elementor-search-form--button-type-',
                'render_type'  => 'template',
                'condition'    => [
                    'skin' => 'classic',
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'     => __('Text', 'striz-core'),
                'type'      => Controls_Manager::TEXT,
                'default'   => __('Search', 'striz-core'),
                'separator' => 'after',
                'condition' => [
                    'button_type' => 'text',
                    'skin'        => 'classic',
                ],
            ]
        );

        $this->add_control(
            'icon',
            [
                'label'        => __('Icon', 'striz-core'),
                'type'         => Controls_Manager::CHOOSE,
                'label_block'  => false,
                'default'      => 'search',
                'options'      => [
                    'search' => [
                        'title' => __('Search', 'striz-core'),
                        'icon'  => 'fa fa-search',
                    ],
                    'arrow'  => [
                        'title' => __('Arrow', 'striz-core'),
                        'icon'  => 'fa fa-arrow-right',
                    ],
                ],
                'render_type'  => 'template',
                'prefix_class' => 'elementor-search-form--icon-',
                'condition'    => [
                    'button_type' => 'icon',
                    'skin'        => 'classic',
                ],
            ]
        );

        $this->add_control(
            'size',
            [
                'label'     => __('Size', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__container'                                                                                 => 'min-height: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .elementor-search-form__submit'                                                                                    => 'min-width: {{SIZE}}{{UNIT}}',
                    'body:not(.rtl) {{WRAPPER}} .elementor-search-form__icon'                                                                       => 'padding-left: calc({{SIZE}}{{UNIT}} / 3)',
                    'body.rtl {{WRAPPER}} .elementor-search-form__icon'                                                                             => 'padding-right: calc({{SIZE}}{{UNIT}} / 3)',
                    '{{WRAPPER}} .elementor-search-form__input, {{WRAPPER}}.elementor-search-form--button-type-text .elementor-search-form__submit' => 'padding-left: calc({{SIZE}}{{UNIT}} / 3); padding-right: calc({{SIZE}}{{UNIT}} / 3)',
                ],
                'condition' => [
                    'skin!' => 'full_screen',
                ],
            ]
        );

        $this->add_control(
            'toggle_button_content',
            [
                'label'     => __('Toggle', 'striz-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'skin' => 'full_screen',
                ],
            ]
        );

        $this->add_control(
            'toggle_align',
            [
                'label'       => __('Alignment', 'striz-core'),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => false,
                'default'     => 'center',
                'options'     => [
                    'flex-start' => [
                        'title' => __('Left', 'striz-core'),
                        'icon'  => 'eicon-h-align-left',
                    ],
                    'center'     => [
                        'title' => __('Center', 'striz-core'),
                        'icon'  => 'eicon-h-align-center',
                    ],
                    'flex-end'   => [
                        'title' => __('Right', 'striz-core'),
                        'icon'  => 'eicon-h-align-right',
                    ],
                ],
                'selectors'   => [
                    '{{WRAPPER}} .elementor-search-form__toggle' => 'display: flex; justify-content: {{VALUE}}',
                ],
                'condition'   => [
                    'skin' => 'full_screen',
                ],
            ]
        );

        $this->add_control(
            'toggle_size',
            [
                'label'     => __('Size', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__toggle i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'skin' => 'full_screen',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'config_search_form_border',
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .elementor-widget-container .search-form',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'config_search_form_border_radius',
            [
                'label'      => __('Border Radius', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-widget-container .search-form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'config_search_form_padding',
            [
                'label'      => __('Padding', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-widget-container .search-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'config_search_form_margin',
            [
                'label'      => __('Margin', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-widget-container .search-form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //End Search form config


        //Account config
        $this->start_controls_section(
            'account_content',
            [
                'label'     => __('Account', 'striz-core'),
                'condition' => [
                    'show_account!' => '',
                ],
            ]
        );

        $this->add_control(
            'show_icon_account',
            [
                'label'   => __('Show Icon', 'striz-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_submenu_indicator',
            [
                'label' => __('Show Submenu Indicator', 'striz-core'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );


        $this->add_control(
            'icon_account',
            [
                'label'     => __('Choose Icon', 'striz-core'),
                'type'      => Controls_Manager::ICON,
                'default'   => 'opal-icon-account',
                'condition' => [
                    'show_icon_account!' => '',
                ],
            ]
        );

        $this->add_control(
            'text_account',
            [
                'label'   => __('Text', 'striz-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('My account', 'striz-core'),
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'config_account_border',
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .elementor-widget-container .account',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'config_account_border_radius',
            [
                'label'      => __('Border Radius', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-widget-container .account' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'config_account_padding',
            [
                'label'      => __('Padding', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-widget-container .account' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'config_account_margin',
            [
                'label'      => __('Margin', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-widget-container .account' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //End account config


        //WooCommerce cart config
        $this->start_controls_section(
            'cart_content',
            [
                'label'     => __('WooCommerce Cart', 'striz-core'),
                'condition' => [
                    'show_cart!' => '',
                ],
            ]
        );

        $this->add_control(
            'cart_icon',
            [
                'label'   => __('Choose Icon', 'striz-core'),
                'type'    => Controls_Manager::ICON,
                'default' => 'opal-icon-cart',
            ]
        );

        $this->add_control(
            'title_cart',
            [
                'label'   => __('Title', 'striz-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Cart', 'striz-core'),
            ]
        );

        $this->add_control(
            'title_cart_hover',
            [
                'label'       => __('Title Hover', 'striz-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('View your shopping cart', 'striz-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'show_items',
            [
                'label' => __('Show Count Text', 'striz-core'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'show_amount',
            [
                'label' => __('Show Amount', 'striz-core'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'show_count',
            [
                'label' => __('Show Count', 'striz-core'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'config_cart_border',
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .elementor-widget-container .cart-woocommerce',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'config_cart_border_radius',
            [
                'label'      => __('Border Radius', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-widget-container .cart-woocommerce' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'config_cart_padding',
            [
                'label'      => __('Padding', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cart-woocommerce' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'config_cart_margin',
            [
                'label'      => __('Margin', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cart-woocommerce' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //End WooCommerce cart


        //Start style wishlist
        $this->start_controls_section(
            'section_lable_style_wishlist',
            [
                'label'     => __('Wishlist Style', 'striz-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_wishlist' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'icon_wishlist_style',
            [
                'label'     => __('ICON', 'striz-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->start_controls_tabs('tabs_icon_wishlist_style');

        $this->start_controls_tab(
            'tab_icon_wishlist_normal',
            [
                'label' => __('Normal', 'striz-core'),
            ]
        );

        $this->add_control(
            'icon_wishlist_color',
            [
                'label' => __('Color', 'striz-core'),
                'type'  => Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} .opal-header-wishlist i' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_icon_wishlist_hover',
            [
                'label' => __('Hover', 'striz-core'),
            ]
        );

        $this->add_control(
            'icon_wishlist__hover_color',
            [
                'label' => __('Hover Color', 'striz-core'),
                'type'  => Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} .opal-header-wishlist:hover i' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->add_responsive_control(
            'icon_wishlist_size',
            [
                'label'     => __('Size', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .opal-header-wishlist i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_wishlist_spacing',
            [
                'label'     => __('Spacing', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .opal-header-wishlist i' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'count_wishlish_style',
            [
                'label'     => __('COUNT', 'striz-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'count_wl_color',
            [
                'label'     => __('Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-header-wishlist .count' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'count_wl_background_color',
            [
                'label'     => __('Background Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-header-wishlist .count' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'count_wl_font_size',
            [
                'label'     => __('Font Size', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .site-header-wishlist .count' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'count_wl_size',
            [
                'label'     => __('Size', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .site-header-wishlist .count' => 'line-height: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'count_wl_border',
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .site-header-wishlist .count',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'count_wl_border_radius',
            [
                'label'      => __('Border Radius', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .site-header-wishlist .count' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'count_wl_box_shadow',
                'selector' => '{{WRAPPER}} .site-header-wishlist .count',
            ]
        );

        $this->add_responsive_control(
            'count_wl_padding',
            [
                'label'      => __('Padding', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .site-header-wishlist .count' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'count_wl_margin',
            [
                'label'      => __('Margin', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .site-header-wishlist .count' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //End style wishlist


        //Style Search Form
        $this->start_controls_section(
            'section_input_style',
            [
                'label'     => __('Search Form Style', 'striz-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_search!' => '',
                ],
            ]
        );

        $this->add_control(
            'search_input',
            [
                'label' => __('INPUT', 'striz-core'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_responsive_control(
            'icon_size_minimal',
            [
                'label'     => __('Icon Size', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__icon' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'skin' => 'minimal',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'overlay_background_color',
            [
                'label'     => __('Overlay Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}.elementor-search-form--skin-full_screen .elementor-search-form__container' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'skin' => 'full_screen',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'input_typography',
                'selector' => '{{WRAPPER}} input[type="search"].elementor-search-form__input',
            ]
        );

        $this->start_controls_tabs('tabs_input_colors');

        $this->start_controls_tab(
            'tab_input_normal',
            [
                'label' => __('Normal', 'striz-core'),
            ]
        );

        $this->add_control(
            'input_text_color',
            [
                'label'     => __('Text Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__input,
					{{WRAPPER}} .elementor-search-form__icon,
					{{WRAPPER}} .elementor-lightbox .dialog-lightbox-close-button,
					{{WRAPPER}} .elementor-lightbox .dialog-lightbox-close-button:hover,
					{{WRAPPER}}.elementor-search-form--skin-full_screen input[type="search"].elementor-search-form__input' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'input_background_color',
            [
                'label'     => __('Background Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}:not(.elementor-search-form--skin-full_screen) .elementor-search-form__container'           => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}.elementor-search-form--skin-full_screen input[type="search"].elementor-search-form__input' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'skin!' => 'full_screen',
                ],
            ]
        );

        $this->add_control(
            'input_border_color',
            [
                'label'     => __('Border Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}:not(.elementor-search-form--skin-full_screen) .elementor-search-form__container'           => 'border-color: {{VALUE}}',
                    '{{WRAPPER}}.elementor-search-form--skin-full_screen input[type="search"].elementor-search-form__input' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'           => 'input_box_shadow',
                'selector'       => '{{WRAPPER}} .elementor-search-form__container',
                'fields_options' => [
                    'box_shadow_type' => [
                        'separator' => 'default',
                    ],
                ],
                'condition'      => [
                    'skin!' => 'full_screen',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_input_focus',
            [
                'label' => __('Focus', 'striz-core'),
            ]
        );

        $this->add_control(
            'input_text_color_focus',
            [
                'label'     => __('Text Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}:not(.elementor-search-form--skin-full_screen) .elementor-search-form--focus .elementor-search-form__input,
					{{WRAPPER}} .elementor-search-form--focus .elementor-search-form__icon,
					{{WRAPPER}} .elementor-lightbox .dialog-lightbox-close-button:hover,
					{{WRAPPER}}.elementor-search-form--skin-full_screen input[type="search"].elementor-search-form__input:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'input_background_color_focus',
            [
                'label'     => __('Background Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}:not(.elementor-search-form--skin-full_screen) .elementor-search-form--focus .elementor-search-form__container' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}.elementor-search-form--skin-full_screen input[type="search"].elementor-search-form__input:focus'               => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'skin!' => 'full_screen',
                ],
            ]
        );

        $this->add_control(
            'input_border_color_focus',
            [
                'label'     => __('Border Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}:not(.elementor-search-form--skin-full_screen) .elementor-search-form--focus .elementor-search-form__container' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}}.elementor-search-form--skin-full_screen input[type="search"].elementor-search-form__input:focus'               => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'           => 'input_box_shadow_focus',
                'selector'       => '{{WRAPPER}} .elementor-search-form--focus .elementor-search-form__container',
                'fields_options' => [
                    'box_shadow_type' => [
                        'separator' => 'default',
                    ],
                ],
                'condition'      => [
                    'skin!' => 'full_screen',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'button_border_width',
            [
                'label'     => __('Border Size', 'striz-core'),
                'type'      => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}}:not(.elementor-search-form--skin-full_screen) .elementor-search-form__container'           => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}}.elementor-search-form--skin-full_screen input[type="search"].elementor-search-form__input' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'border_radius',
            [
                'label'     => __('Border Radius', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default'   => [
                    'size' => 3,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}}:not(.elementor-search-form--skin-full_screen) .elementor-search-form__container'           => 'border-radius: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}}.elementor-search-form--skin-full_screen input[type="search"].elementor-search-form__input' => 'border-radius: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_button_style',
            [
                'label'     => __('Button', 'striz-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'skin' => 'classic',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'button_typography',
                'selector'  => '{{WRAPPER}} .elementor-search-form__submit',
                'condition' => [
                    'button_type' => 'text',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_button_colors');

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
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__submit' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label'     => __('Background Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__submit' => 'background-color: {{VALUE}}',
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
            'button_text_color_hover',
            [
                'label'     => __('Text Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__submit:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_background_color_hover',
            [
                'label'     => __('Background Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__submit:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'icon_size',
            [
                'label'     => __('Icon Size', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__submit' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'button_type' => 'icon',
                    'skin!'       => 'full_screen',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'button_width',
            [
                'label'     => __('Width', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min'  => 1,
                        'max'  => 10,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__submit' => 'min-width: calc( {{SIZE}} * {{size.SIZE}}{{size.UNIT}} )',
                ],
                'condition' => [
                    'skin' => 'classic',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_toggle_style',
            [
                'label'     => __('Toggle', 'striz-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'skin' => 'full_screen',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_toggle_color');

        $this->start_controls_tab(
            'tab_toggle_normal',
            [
                'label' => __('Normal', 'striz-core'),
            ]
        );

        $this->add_control(
            'toggle_color',
            [
                'label'     => __('Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__toggle' => 'color: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'toggle_background_color',
            [
                'label'     => __('Background Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__toggle i' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_toggle_hover',
            [
                'label' => __('Hover', 'striz-core'),
            ]
        );

        $this->add_control(
            'toggle_color_hover',
            [
                'label'     => __('Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__toggle:hover' => 'color: {{VALUE}} !important; border-color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'toggle_background_color_hover',
            [
                'label'     => __('Background Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__toggle i:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'toggle_icon_size',
            [
                'label'     => __('Icon Size', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__toggle i:before' => 'font-size: calc({{SIZE}}em / 100)',
                ],
                'condition' => [
                    'skin' => 'full_screen',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'toggle_border_width',
            [
                'label'     => __('Border Width', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-search-form__toggle i' => 'border-width: {{SIZE}}{{UNIT}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'toggle_border_radius',
            [
                'label'      => __('Border Radius', 'striz-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-search-form__toggle i' => 'border-radius: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();
        //End style search form


        //Start Style Account
        $this->start_controls_section(
            'section_style_account',
            [
                'label'     => __('Account Style', 'striz-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_account' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'heading_title_account',
            [
                'label'     => __('TITLE', 'striz-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->start_controls_tabs('tabs_title_account_style');

        $this->start_controls_tab(
            'tab_title_account_normal',
            [
                'label' => __('Normal', 'striz-core'),
            ]
        );

        $this->add_control(
            'name_text_color',
            [
                'label'     => __('Text Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .site-header-account > a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_title_account_hover',
            [
                'label' => __('Hover', 'striz-core'),
            ]
        );

        $this->add_control(
            'name_text_hover_color',
            [
                'label'     => __('Text Hover Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .site-header-account > a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'name_typography',
                'selector' => '{{WRAPPER}} .site-header-account > a',
            ]
        );

        $this->add_control(
            'heading_icon_account',
            [
                'label'     => __('ICON', 'striz-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->start_controls_tabs('tabs_icon_account_style');

        $this->start_controls_tab(
            'tab_icon_account_normal',
            [
                'label' => __('Normal', 'striz-core'),
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'     => __('Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .site-header-account > a span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_icon_account_hover',
            [
                'label' => __('Hover', 'striz-core'),
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label'     => __('Hover Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .site-header-account > a:hover span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->add_responsive_control(
            'icon_account_size',
            [
                'label'     => __('Size', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .site-header-account > a span' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_account_spacing',
            [
                'label'     => __('Spacing', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .site-header-account > a span' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        //Start style cart
        $this->start_controls_section(
            'section_lable_style',
            [
                'label'     => __('Cart Style', 'striz-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_cart' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'icon_cart_style',
            [
                'label'     => __('ICON', 'striz-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->start_controls_tabs('tabs_icon_cart_style');

        $this->start_controls_tab(
            'tab_icon_cart_normal',
            [
                'label' => __('Normal', 'striz-core'),
            ]
        );

        $this->add_control(
            'icon_cart_color',
            [
                'label' => __('Color', 'striz-core'),
                'type'  => Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} .site-header-cart i' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_icon_cart_hover',
            [
                'label' => __('Hover', 'striz-core'),
            ]
        );

        $this->add_control(
            'icon_cart_hover_color',
            [
                'label' => __('Hover Color', 'striz-core'),
                'type'  => Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} .site-header-cart:hover i' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'icon_cart_size',
            [
                'label'     => __('Size', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .site-header-cart i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_cart_spacing',
            [
                'label'     => __('Spacing', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .site-header-cart i' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_cart_style',
            [
                'label'     => __('TITLE', 'striz-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'cart_title_typography',
                'selector' => '{{WRAPPER}} .site-header-cart .title',
            ]
        );

        $this->start_controls_tabs('tabs_title_cart_style');

        $this->start_controls_tab(
            'tab_title_cart_normal',
            [
                'label' => __('Normal', 'striz-core'),
            ]
        );

        $this->add_control(
            'cart_title_color',
            [
                'label'     => __('Title Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-header-cart .title' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_title_cart_hover',
            [
                'label' => __('Hover', 'striz-core'),
            ]
        );

        $this->add_control(
            'cart_title_hover_color',
            [
                'label'     => __('Title Hover Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-header-cart:hover .title' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->add_responsive_control(
            'cart_title_spacing',
            [
                'label'     => __('Spacing', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .site-header-cart .title' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'amount_cart_style',
            [
                'label'     => __('AMOUNT', 'striz-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'show_amount!' => '',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'cart_amount_typography',
                'selector'  => '{{WRAPPER}} .site-header-cart .amount',
                'condition' => [
                    'show_amount!' => '',
                ],
            ]
        );

        $this->add_control(
            'amount_color',
            [
                'label'     => __('Amount Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-header-cart .amount' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'show_amount!' => '',
                ],

            ]
        );

        $this->add_responsive_control(
            'amount_spacing',
            [
                'label'     => __('Spacing', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-button .amount' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_amount!' => '',
                ],
            ]
        );

        $this->add_control(
            'count_text_cart_style',
            [
                'label'     => __('COUNT TEXT', 'striz-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'show_items!' => '',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'cart_count_text_typography',
                'selector'  => '{{WRAPPER}} .site-header-cart .count-text',
                'condition' => [
                    'show_items!' => '',
                ],
            ]
        );

        $this->add_control(
            'count_text_color',
            [
                'label'     => __('Count Text Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-header-cart .count-text' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'show_items!' => '',
                ],

            ]
        );

        $this->add_control(
            'countcart_style',
            [
                'label'     => __('COUNT', 'striz-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'show_count!' => '',
                ],
            ]
        );

        $this->add_control(
            'count_color',
            [
                'label'     => __('Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-header-cart .count' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'show_count!' => '',
                ],
            ]
        );

        $this->add_control(
            'count_background_color',
            [
                'label'     => __('Background Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .site-header-cart .count' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'show_count!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'count_font_size',
            [
                'label'     => __('Font Size', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .site-header-cart .count' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_count!' => '',
                ],
            ]
        );


        $this->add_responsive_control(
            'count_size',
            [
                'label'     => __('Size', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .site-header-cart .count' => 'line-height: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_count!' => '',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'count_border',
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .site-header-cart .count',
                'separator'   => 'before',
                'condition'   => [
                    'show_count!' => '',
                ],
            ]
        );

        $this->add_control(
            'count_border_radius',
            [
                'label'      => __('Border Radius', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .site-header-cart .count' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'  => [
                    'show_count!' => '',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'      => 'count_box_shadow',
                'selector'  => '{{WRAPPER}} .site-header-cart .count',
                'condition' => [
                    'show_count!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'count_padding',
            [
                'label'      => __('Padding', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .site-header-cart .count' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'  => [
                    'show_count!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'count_margin',
            [
                'label'      => __('Margin', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .site-header-cart .count' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'  => [
                    'show_count!' => '',
                ],
            ]
        );

        $this->end_controls_section();
        //End style cart
    }

    protected function render() {
        $settings = $this->get_settings();

        if ($settings['show_search'] == 'yes') {
            echo '<div class="search-form">';
            $this->render_search_form();
            echo '</div>';
        }

        if ($settings['show_account'] == 'yes') {
            echo '<div class="account">';
            $this->render_account();
            echo '</div>';
        }

        if ($settings['show_wishlist'] == 'yes') {
            echo '<div class="wishlist-woocommerce">';
            $this->render_wishlist();
            echo '</div>';
        }

        if ($settings['show_cart'] == 'yes') {
            echo '<div class="cart-woocommerce">';
            $this->render_cart();
            echo '</div>';
        }
    }

    protected function render_wishlist() {
        $settings = $this->get_settings();

        $items = '';

        if (function_exists('yith_wcwl_count_all_products')) {
            $items = '<div class="site-header-wishlist">';
            $items .= '<a class="opal-header-wishlist header-button" title="" href="' . esc_url(get_permalink(get_option('yith_wcwl_wishlist_page_id'))) . '">';
            $items .= '<i class="' . $settings['wishlist_icon'] . '" aria-hidden="true"></i>';
            if ($settings['show_subtotal']) {
                $items .= '<span class="count">' . esc_html(yith_wcwl_count_all_products()) . '</span>';
            }
            $items .= '</a>';
            $items .= '</div>';
        } elseif (function_exists('woosw_init')) {
            $key      = WPCleverWoosw::get_key();
            $wishlist = get_option('woosw_list_' . $key);

            $items = '<div class="site-header-wishlist">';
            $items .= '<a class="opal-header-wishlist header-button" title="" href="' . esc_url(WPCleverWoosw::get_url($key, true)) . '">';
            $items .= '<i class="' . $settings['wishlist_icon'] . '" aria-hidden="true"></i>';
            if ($settings['show_subtotal']) {
                $items .= '<span class="count">' . esc_html(WPCleverWoosw::get_count($key)) . '</span>';
            }
            $items .= '</a>';
            $items .= '</div>';
        }
        echo($items);

    }

    protected function render_search_form() {
        $settings = $this->get_settings();
        $this->add_render_attribute(
            'input', [
                'placeholder' => $settings['placeholder'],
                'class'       => 'elementor-search-form__input',
                'type'        => 'search',
                'name'        => 's',
                'title'       => __('Search', 'striz-core'),
                'value'       => get_search_query(),
            ]
        );

        // Set the selected icon.
        if ('icon' == $settings['button_type']) {
            $icon_class = 'search';

            if ('arrow' == $settings['icon']) {
                $icon_class = is_rtl() ? 'arrow-left' : 'arrow-right';
            }

            $this->add_render_attribute('icon', [
                'class' => 'fa fa-' . $icon_class,
            ]);
        }

        ?>
        <form class="elementor-search-form" role="search" action="<?php echo home_url(); ?>" method="get">
            <?php if ('full_screen' === $settings['skin']) : ?>
                <div class="elementor-search-form__toggle">
                    <i class="<?php echo $settings['icon_skin']; ?>" aria-hidden="true"></i>
                </div>
            <?php endif; ?>
            <div class="elementor-search-form__container">
                <?php if ('minimal' === $settings['skin']) : ?>
                    <div class="elementor-search-form__icon">
                        <i class="<?php echo $settings['icon_skin']; ?>" aria-hidden="true"></i>
                    </div>
                <?php endif; ?>
                <input <?php echo $this->get_render_attribute_string('input'); ?>>
                <?php if (osf_is_woocommerce_activated()): ?>
                    <input type="hidden" name="post_type" value="product"/>
                <?php endif; ?>
                <?php if ('classic' === $settings['skin']) : ?>
                    <button class="elementor-search-form__submit" type="submit">
                        <?php if ('icon' === $settings['button_type']) : ?>
                            <i <?php echo $this->get_render_attribute_string('icon'); ?> aria-hidden="true"></i>
                        <?php elseif (!empty($settings['button_text'])) : ?>
                            <?php echo $settings['button_text']; ?>
                        <?php endif; ?>
                    </button>
                <?php endif; ?>
                <?php if ('full_screen' === $settings['skin']) : ?>
                    <div class="dialog-lightbox-close-button dialog-close-button">
                        <i class="eicon-close" aria-hidden="true"></i>
                        <span class="elementor-screen-only"><?php esc_html_e('Close', 'striz-core'); ?></span>
                    </div>
                <?php endif ?>
            </div>
        </form>
        <?php
    }

    protected function render_cart() {
        $settings = $this->get_settings(); ?>
        <div class="site-header-cart menu d-flex">
            <a data-toggle="toggle" class="cart-contents header-button" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="">
                <i class="<?php echo esc_attr($settings['cart_icon']); ?>" aria-hidden="true"></i>
                <span class="title"><?php echo esc_html($settings['title_cart']); ?></span>
                <?php if (!empty(WC()->cart) && WC()->cart instanceof WC_Cart): ?>
                    <?php if ($settings['show_count']): ?>
                        <span class="count d-inline-block text-center"><?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?></span>
                    <?php endif; ?>
                    <?php if ($settings['show_items']): ?>
                        <span class="count-text"><?php echo wp_kses_data(_n("item", "items", WC()->cart->get_cart_contents_count(), "striz-core")); ?></span>
                    <?php endif; ?>
                    <?php if ($settings['show_amount']): ?>
                        <span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span>
                    <?php endif; ?>
                <?php endif; ?>
            </a>
            <ul class="shopping_cart">
                <li><?php the_widget('WC_Widget_Cart', 'title='); ?></li>
            </ul>
        </div>
        <?php
    }

    protected function render_account() {
        $settings = $this->get_settings();

        if (osf_is_woocommerce_activated()) {
            $account_link = get_permalink(get_option('woocommerce_myaccount_page_id'));
        } else {
            $account_link = wp_login_url();
        }
        ?>
        <div class="site-header-account">
            <?php
            echo '<a href="' . esc_html($account_link) . '">';

            if ($settings['show_icon_account'] == 'yes') {
                echo '<span class="' . esc_attr($settings['icon_account']) . '"></span>';
            }

            if (is_user_logged_in()) {
                echo $settings['text_account'];
            }

            if ($settings['show_submenu_indicator']) {
                echo '<i class="fa fa-angle-down submenu-indicator" aria-hidden="true"></i>';
            }

            echo '</a>';
            ?>
            <div class="account-dropdown">
                <div class="account-wrap">
                    <div class="account-inner <?php if (is_user_logged_in()): echo "dashboard"; endif; ?>">
                        <?php if (!is_user_logged_in()) {
                            $this->render_form_login();
                        } else {
                            $this->render_dashboard();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    protected function render_form_login() { ?>

        <div class="login-form-head pb-1 mb-3 bb-so-1 bc">
            <span class="login-form-title"><?php esc_attr_e('Sign in', 'striz-core') ?></span>
            <span class="pull-right">
                <a class="register-link" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
                   title="<?php esc_attr_e('Register', 'striz-core'); ?>"><?php esc_attr_e('Create an Account', 'striz-core'); ?></a>
            </span>
        </div>
        <form class="opal-login-form-ajax" data-toggle="validator">
            <p>
                <label><?php esc_attr_e('Username or email', 'striz-core'); ?> <span class="required">*</span></label>
                <input name="username" type="text" required placeholder="<?php esc_attr_e('Username', 'striz-core') ?>">
            </p>
            <p>
                <label><?php esc_attr_e('Password', 'striz-core'); ?> <span class="required">*</span></label>
                <input name="password" type="password" required placeholder="<?php esc_attr_e('Password', 'striz-core') ?>">
            </p>
            <button type="submit" data-button-action class="btn btn-primary btn-block w-100 mt-1"><?php esc_html_e('Login', 'striz-core') ?></button>
            <input type="hidden" name="action" value="osf_login">
            <?php wp_nonce_field('ajax-osf-login-nonce', 'security-login'); ?>
        </form>
        <div class="login-form-bottom">
            <a href="<?php echo wp_lostpassword_url(get_permalink()); ?>" class="mt-2 lostpass-link d-inline-block" title="<?php esc_attr_e('Lost your password?', 'striz-core'); ?>"><?php esc_attr_e('Lost your password?', 'striz-core'); ?></a>
        </div>
        <?php

    }


    protected function render_dashboard() { ?>
        <?php if (has_nav_menu('my-account')) : ?>
            <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Dashboard', 'striz-core'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'my-account',
                    'menu_class'     => 'account-links-menu',
                    'depth'          => 1,
                ));
                ?>
            </nav><!-- .social-navigation -->
        <?php else: ?>
            <ul class="account-dashboard">

                <?php if (osf_is_woocommerce_activated()): ?>
                    <li>
                        <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" title="<?php esc_html_e('Dashboard', 'striz-core'); ?>"><?php esc_html_e('Dashboard', 'striz-core'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(wc_get_account_endpoint_url('orders')); ?>" title="<?php esc_html_e('Orders', 'striz-core'); ?>"><?php esc_html_e('Orders', 'striz-core'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(wc_get_account_endpoint_url('downloads')); ?>" title="<?php esc_html_e('Downloads', 'striz-core'); ?>"><?php esc_html_e('Downloads', 'striz-core'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(wc_get_account_endpoint_url('edit-address')); ?>" title="<?php esc_html_e('Edit Address', 'striz-core'); ?>"><?php esc_html_e('Edit Address', 'striz-core'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(wc_get_account_endpoint_url('edit-account')); ?>" title="<?php esc_html_e('Account Details', 'striz-core'); ?>"><?php esc_html_e('Account Details', 'striz-core'); ?></a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo esc_url(get_dashboard_url(get_current_user_id())); ?>" title="<?php esc_html_e('Dashboard', 'striz-core'); ?>"><?php esc_html_e('Dashboard', 'striz-core'); ?></a>
                    </li>
                <?php endif; ?>
                <li>
                    <a title="<?php esc_html_e('Log out', 'striz-core'); ?>" class="tips" href="<?php echo esc_url(wp_logout_url(home_url())); ?>"><?php esc_html_e('Log Out', 'striz-core'); ?></a>
                </li>
            </ul>
        <?php endif;

    }
}

$widgets_manager->register(new OSF_Elementor_Header_Group());