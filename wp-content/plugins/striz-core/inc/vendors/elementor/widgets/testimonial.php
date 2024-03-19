<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Group_Control_Css_Filter;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography as Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;

class OSF_Elementor_Testimonials extends OSF_Elementor_Carousel_Base {

    /**
     * Get widget name.
     *
     * Retrieve testimonial widget name.
     *
     * @return string Widget name.
     * @since  1.0.0
     * @access public
     *
     */
    public function get_name() {
        return 'opal-testimonials';
    }

    /**
     * Get widget title.
     *
     * Retrieve testimonial widget title.
     *
     * @return string Widget title.
     * @since  1.0.0
     * @access public
     *
     */
    public function get_title() {
        return __('Opal Testimonials', 'striz-core');
    }

    /**
     * Get widget icon.
     *
     * Retrieve testimonial widget icon.
     *
     * @return string Widget icon.
     * @since  1.0.0
     * @access public
     *
     */
    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return array('opal-addons');
    }

    /**
     * Register testimonial widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
            'section_testimonial',
            [
                'label' => __('Testimonials', 'striz-core'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control('testimonial_content', [
            'label'       => __('Content', 'striz-core'),
            'type'        => Controls_Manager::TEXTAREA,
            'default'     => 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
            'label_block' => true,
            'rows'        => '10',
        ]);

        $repeater->add_control('testimonial_image', [
            'label'      => __('Choose Image', 'striz-core'),
            'default'    => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'type'       => Controls_Manager::MEDIA,
            'show_label' => false,
        ]);

        $repeater->add_control('testimonial_name', [
            'label'   => __('Name', 'striz-core'),
            'default' => 'John Doe',
            'type'    => Controls_Manager::TEXT,
        ]);

        $repeater->add_control('testimonial_job', [
            'label'   => __('Job', 'striz-core'),
            'default' => 'Designer',
            'type'    => Controls_Manager::TEXT,
        ]);

        $repeater->add_control('testimonial_link', [
            'label'       => __('Link to', 'striz-core'),
            'placeholder' => __('https://your-link.com', 'striz-core'),
            'type'        => Controls_Manager::URL,
        ]);

        $this->add_control(
            'testimonials',
            [
                'label'       => __('Testimonials Item', 'striz-core'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ testimonial_name }}}',
            ]
        );

        $this->add_group_control(
            Elementor\Group_Control_Image_Size::get_type(),
            [
                'name'      => 'testimonial_image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `testimonial_image_size` and `testimonial_image_custom_dimension`.
                'default'   => 'full',
                'separator' => 'none',
            ]
        );


        $this->add_responsive_control(
            'column',
            [
                'label'   => __('Columns', 'striz-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 1,
                'options' => [1 => 1, 2 => 2, 3 => 3, 4 => 4, 6 => 6],
            ]
        );

        $this->add_control(
            'view',
            [
                'label'   => __('View', 'striz-core'),
                'type'    => Controls_Manager::HIDDEN,
                'default' => 'traditional',
            ]
        );
        $this->end_controls_section();

        // Image.
        $this->start_controls_section(
            'section_style_testimonial_image',
            [
                'label' => __('Image', 'striz-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_size',
            [
                'label'      => __('Image Size', 'striz-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => 60,
                        'max' => 200,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );


        $this->start_controls_tabs('image_effects');

        $this->start_controls_tab('normal',
            [
                'label' => __('Normal', 'striz-core'),
            ]
        );

        $this->add_control(
            'opacity',
            [
                'label'     => __('Opacity', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'max'  => 1,
                        'min'  => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name'     => 'css_filters',
                'selector' => '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('hover',
            [
                'label' => __('Hover', 'striz-core'),
            ]
        );

        $this->add_control(
            'opacity_hover',
            [
                'label'     => __('Opacity', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'max'  => 1,
                        'min'  => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper:hover .elementor-testimonial-image img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name'     => 'css_filters_hover',
                'selector' => '{{WRAPPER}} .elementor-testimonial-wrapper:hover .elementor-testimonial-image img',
            ]
        );

        $this->add_control(
            'background_hover_transition',
            [
                'label'     => __('Transition Duration', 'striz-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'max'  => 3,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img' => 'transition-duration: {{SIZE}}s',
                ],
            ]
        );

        $this->add_control(
            'hover_animation',
            [
                'label' => __('Hover Animation', 'striz-core'),
                'type'  => Controls_Manager::HOVER_ANIMATION,
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'      => 'image_border',
                'selector'  => '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label'      => __('Border Radius', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_padding',
            [
                'label'      => __('Padding', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_margin',
            [
                'label'      => __('Margin', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Content
        $this->start_controls_section(
            'section_style_testimonial_style',
            [
                'label' => __('Content', 'striz-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_content_color',
            [
                'label'     => __('Text Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-content' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'content_typography',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
                'selector' => '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-content',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'content_border',
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-content',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'content_radius',
            [
                'label'      => __('Border Radius', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label'      => __('Padding', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label'      => __('Margin', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Name.
        $this->start_controls_section(
            'section_style_testimonial_name',
            [
                'label' => __('Name', 'striz-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'name_text_color',
            [
                'label'     => __('Text Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-name, {{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-name a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'name_typography',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-name',
            ]
        );

        $this->add_responsive_control(
            'name_padding',
            [
                'label'      => __('Padding', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'name_margin',
            [
                'label'      => __('Margin', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Job.
        $this->start_controls_section(
            'section_style_testimonial_job',
            [
                'label' => __('Job', 'striz-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'job_text_color',
            [
                'label'     => __('Text Color', 'striz-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-job'     => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-details' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'job_typography',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-job',
            ]
        );

        $this->add_responsive_control(
            'job_padding',
            [
                'label'      => __('Padding', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-job' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'job_margin',
            [
                'label'      => __('Margin', 'striz-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-job' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Add Carousel Control
        $this->add_control_carousel();

    }

    /**
     * Render testimonial widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        if (!empty($settings['testimonials']) && is_array($settings['testimonials'])) {

            $this->add_render_attribute('wrapper', 'class', 'elementor-testimonial-wrapper');
            $this->add_render_attribute('row', 'class', 'row');
            if ($settings['enable_carousel'] === 'yes') {
                $this->add_render_attribute('row', 'class', 'owl-carousel owl-theme');
                $carousel_settings = $this->get_carousel_settings();
                $this->add_render_attribute('row', 'data-settings', wp_json_encode($carousel_settings));
            }

            $this->add_render_attribute('row', 'data-elementor-columns', $settings['column']);
            if (!empty($settings['column_tablet'])) {
                $this->add_render_attribute('row', 'data-elementor-columns-tablet', $settings['column_tablet']);
            }
            if (!empty($settings['column_mobile'])) {
                $this->add_render_attribute('row', 'data-elementor-columns-mobile', $settings['column_mobile']);
            }
            $this->add_render_attribute('row', 'class', 'row2');
            $this->add_render_attribute('row2', 'data-elementor-columns', $settings['column']);
            if (!empty($settings['column_tablet'])) {
                $this->add_render_attribute('row2', 'data-elementor-columns-tablet', $settings['column_tablet']);
            }
            if (!empty($settings['column_mobile'])) {
                $this->add_render_attribute('row2', 'data-elementor-columns-mobile', $settings['column_mobile']);
            }

            // Item
            $this->add_render_attribute('item', 'class', 'elementor-testimonial-item');
            $this->add_render_attribute('item', 'class', 'column-item');
            $this->add_render_attribute('item2', 'class', 'elementor-testimonial-item2');
            $this->add_render_attribute('item2', 'class', 'column-item');


            ?>
            <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
                <div <?php echo $this->get_render_attribute_string('row') ?>>
                    <?php foreach ($settings['testimonials'] as $testimonial): ?>
                        <div <?php echo $this->get_render_attribute_string('item'); ?>>
                            <div class="elementor-testimonial-content"
                                 data-trigger="<?php echo '.tes-item-' . $testimonial['_id']; ?>">
                                <?php echo $testimonial['testimonial_content']; ?>
                            </div>
                            <?php if ($settings['enable_carousel'] !== 'yes') {
                                $this->render_image($settings, $testimonial); ?>
                                <div class="elementor-testimonial-meta-inner">
                                    <div class="elementor-testimonial-details">
                                        <?php
                                        $testimonial_name_html = $testimonial['testimonial_name'];
                                        if (!empty($testimonial['testimonial_link']['url'])) :
                                            $testimonial_name_html = '<a href="' . esc_url($testimonial['testimonial_link']['url']) . '">' . $testimonial_name_html . '</a>';
                                        endif;
                                        ?>
                                        <div class="elementor-testimonial-name"><?php echo $testimonial_name_html; ?></div>
                                        ,
                                        <div class="elementor-testimonial-job"><?php echo $testimonial['testimonial_job']; ?></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if ($settings['enable_carousel'] === 'yes') { ?>
                    <div <?php echo $this->get_render_attribute_string('row2') ?>>
                        <div <?php echo $this->get_render_attribute_string('item2'); ?>>
                            <div class="testimonial-nav">
                                <div class="testimonial-control-prev"><i class="fa fa-angle-left"></i></div>
                                <?php foreach ($settings['testimonials'] as $testimonial): ?>
                                    <div class="<?php echo 'tes-item-' . $testimonial['_id']; ?> elementor-testimonial-image-wrapper">
                                        <?php $this->render_image($settings, $testimonial); ?>
                                    </div>
                                <?php endforeach; ?>
                                <div class="testimonial-control-next"><i class="fa fa-angle-right"></i></div>
                            </div>
                            <div class="elementor-testimonial-meta-inner">
                                <?php foreach ($settings['testimonials'] as $testimonial): ?>
                                    <div class="<?php echo 'tes-item-' . $testimonial['_id']; ?> elementor-testimonial-details">
                                        <?php
                                        $testimonial_name_html = $testimonial['testimonial_name'];
                                        if (!empty($testimonial['testimonial_link']['url'])) :
                                            $testimonial_name_html = '<a href="' . esc_url($testimonial['testimonial_link']['url']) . '">' . $testimonial_name_html . '</a>';
                                        endif;
                                        ?>
                                        <div class="elementor-testimonial-name"><?php echo $testimonial_name_html; ?></div>
                                        ,
                                        <div class="elementor-testimonial-job"><?php echo $testimonial['testimonial_job']; ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php
        }
    }

    private function render_image($settings, $testimonial) { ?>
        <div class="elementor-testimonial-image">
            <?php
            $testimonial['testimonial_image_size']             = $settings['testimonial_image_size'];
            $testimonial['testimonial_image_custom_dimension'] = $settings['testimonial_image_custom_dimension'];
            if (!empty($testimonial['testimonial_image']['url'])) :
                $image_html = Group_Control_Image_Size::get_attachment_image_html($testimonial, 'testimonial_image');
                echo $image_html;
            endif;
            ?>
        </div>
        <?php
    }

}

$widgets_manager->register(new OSF_Elementor_Testimonials());
