<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Color as Scheme_Color;

abstract class OSF_Elementor_Carousel_Base extends Elementor\Widget_Base {

    public function get_categories() {
        return array('opal-addons');
    }

    public function get_name() {
        return 'opal-carousel-base';
    }


    protected function add_control_carousel($condition = array()) {
        $this->start_controls_section(
            'section_carousel_options',
            [
                'label'     => __('Carousel Options', 'striz-core'),
                'type'      => Controls_Manager::SECTION,
                'condition' => $condition,
            ]
        );

        $this->add_control(
            'enable_carousel',
            [
                'label' => __('Enable', 'striz-core'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'navigation',
            [
                'label'     => __('Navigation', 'striz-core'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'both',
                'options'   => [
                    'both'   => __('Arrows and Dots', 'striz-core'),
                    'arrows' => __('Arrows', 'striz-core'),
                    'dots'   => __('Dots', 'striz-core'),
                    'none'   => __('None', 'striz-core'),
                ],
                'condition' => [
                    'enable_carousel' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'label'     => __('Pause on Hover', 'striz-core'),
                'type'      => Controls_Manager::SWITCHER,
                'default'   => 'yes',
                'condition' => [
                    'enable_carousel' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'     => __('Autoplay', 'striz-core'),
                'type'      => Controls_Manager::SWITCHER,
                'default'   => 'yes',
                'condition' => [
                    'enable_carousel' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label'     => __('Autoplay Speed', 'striz-core'),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 5000,
                'condition' => [
                    'autoplay'        => 'yes',
                    'enable_carousel' => 'yes'
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-slide-bg' => 'animation-duration: calc({{VALUE}}ms*1.2); transition-duration: calc({{VALUE}}ms)',
                ],
            ]
        );

        $this->add_control(
            'infinite',
            [
                'label'     => __('Infinite Loop', 'striz-core'),
                'type'      => Controls_Manager::SWITCHER,
                'default'   => 'yes',
                'condition' => [
                    'enable_carousel' => 'yes'
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_carousel_style',
            [
                'label'     => __('Carousel', 'striz-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_carousel' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'heading_nav',
            [
                'label'     => __('Arrows', 'striz-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->start_controls_tabs('tabs_nav_style');

        $this->start_controls_tab(
            'tab_nav_normal',
            [
                'label' => __('Normal', 'striz-core'),
            ]
        );

        $this->add_control(
            'carousel_nav_color',
            [
                'label'     => __('Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-theme.owl-carousel .owl-nav [class*="owl-"]:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .testimonial-nav .testimonial-control-prev i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .testimonial-nav .testimonial-control-next i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'carousel_nav_border_color',
            [
                'label'     => __('Border Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-theme.owl-carousel .owl-nav [class*="owl-"]:before' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .testimonial-nav .testimonial-control-prev' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .testimonial-nav .testimonial-control-next' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            'tab_nav_hover',
            [
                'label' => __('Hover', 'striz-core'),
            ]
        );

        $this->add_control(
            'carousel_nav_color_hover',
            [
                'label'     => __('Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-theme.owl-carousel .owl-nav [class*="owl-"]:hover:before' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .testimonial-nav .testimonial-control-prev:hover i' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .testimonial-nav .testimonial-control-next:hover i' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'carousel_nav_border_color_hover',
            [
                'label'     => __('Border Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-theme.owl-carousel .owl-nav [class*="owl-"]:hover:before' => 'border-color: {{VALUE}} !important;',
                    '{{WRAPPER}} .testimonial-nav .testimonial-control-prev:hover' => 'border-color: {{VALUE}} !important;',
                    '{{WRAPPER}} .testimonial-nav .testimonial-control-next:hover' => 'border-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'heading_dot',
            [
                'label'     => __('Dots', 'striz-core'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->start_controls_tabs('tabs_dot_style');

        $this->start_controls_tab(
            'tab_dot_normal',
            [
                'label' => __('Normal', 'striz-core'),
            ]
        );

        $this->add_control(
            'carousel_dot_background_color',
            [
                'label'     => __('Background Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-theme.owl-carousel .owl-dots .owl-dot' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            'tab_dot_hover',
            [
                'label' => __('Hover', 'striz-core'),
            ]
        );

        $this->add_control(
            'carousel_nav_background_color_hover',
            [
                'label'     => __('Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-theme.owl-carousel .owl-dots  .owl-dot:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .owl-theme.owl-carousel .owl-dot.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function get_carousel_settings() {
        $settings = $this->get_settings_for_display();
        return array(
            'navigation'         => $settings['navigation'],
            'autoplayHoverPause' => $settings['pause_on_hover'] === 'yes' ? 'true' : 'false',
            'autoplay'           => $settings['autoplay'] === 'yes' ? 'true' : 'false',
            'autoplayTimeout'    => $settings['autoplay_speed'],
            'items'              => $settings['column'],
            'items_tablet'       => $settings['column_tablet'] ? $settings['column_tablet'] : $settings['column'],
            'items_mobile'       => $settings['column_mobile'] ? $settings['column_mobile'] : 1,
            'loop'               => $settings['infinite'] === 'yes' ? 'true' : 'false',
        );
    }

    protected function render_carousel_template() {
        ?>
        var carousel_settings = {
        navigation: settings.navigation,
        autoplayHoverPause: settings.pause_on_hover === 'yes' ? true : false,
        autoplay: settings.autoplay === 'yes' ? true : false,
        autoplayTimeout: settings.autoplay_speed,
        items: settings.column,
        items_tablet: settings.column_tablet ? settings.column_tablet : settings.column,
        items_mobile: settings.column_mobile ? settings.column_mobile : 1,
        loop: settings.infinite === 'yes' ? true : false,
        };
        <?php
    }
}