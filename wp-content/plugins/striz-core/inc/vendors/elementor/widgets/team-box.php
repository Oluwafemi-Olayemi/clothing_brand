<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography as Scheme_Typography;
use Elementor\Core\Schemes\Color as Scheme_Color;
use Elementor\Group_Control_Image_Size;

class OSF_Elementor_Team_Box extends Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve testimonial widget name.
     *
     * @since  1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'opal-team-box';
    }

    /**
     * Get widget title.
     *
     * Retrieve testimonial widget title.
     *
     * @since  1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Opal Team Box', 'striz-core');
    }

    /**
     * Get widget icon.
     *
     * Retrieve testimonial widget icon.
     *
     * @since  1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-person';
    }

    public function get_categories()
    {
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
    protected function register_controls()
    {
        $this->start_controls_section(
            'section_team',
            [
                'label' => __('Team', 'striz-core'),
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                'default' => 'full',
                'separator' => 'none',
            ]
        );

        $this->add_control(
            'view',
            [
                'label' => __('View', 'striz-core'),
                'type' => Controls_Manager::HIDDEN,
                'default' => 'traditional',
            ]
        );

        $this->add_control(
            'teams',
            [
                'label' => __('Team Item', 'striz-core'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Choose Image', 'striz-core'),
                'default' => [
                    'url' => Elementor\Utils::get_placeholder_image_src(),
                ],
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
            ]
        );

        $this->add_control(
            'name',
            [
                'label' => __('Name', 'striz-core'),
                'default' => 'John Doe',
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'job',
            [
                'label' => __('Job', 'striz-core'),
                'default' => 'Designer',
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __('Link to', 'striz-core'),
                'placeholder' => __('https://your-link.com', 'striz-core'),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'facebook',
            [
                'label' => __('Facebook', 'striz-core'),
                'placeholder' => __('https://www.facebook.com/opalwordpress', 'striz-core'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'twitter',
            [
                'label' => __('Twitter', 'striz-core'),
                'placeholder' => __('https://twitter.com/opalwordpress', 'striz-core'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'google',
            [
                'label' => __('Google', 'striz-core'),
                'placeholder' => __('https://plus.google.com/u/0/+WPOpal', 'striz-core'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_responsive_control(
            'team_align',
            [
                'label' => __('Alignment', 'striz-core'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'striz-core'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'striz-core'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'striz-core'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default'     => 'left',
                'prefix_class' => 'elementor-align-',
                'selectors' => [
                    '{{WRAPPER}} .elementor-teams-wrapper' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Wrapper.
        $this->start_controls_section(
            'section_style_team_wrapper',
            [
                'label' => __('Wrapper', 'striz-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'wrapper_background_color',
            [
                'label' => __('Background Color', 'striz-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-teams-wrapper .elementor-team-details' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'wrapper_padding',
            [
                'label'      => __( 'Padding', 'striz-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-teams-wrapper .elementor-team-details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Name.
        $this->start_controls_section(
            'section_style_team_name',
            [
                'label' => __('Name', 'striz-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'name_space',
            [
                'label' => __('Spacing', 'striz-core'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 5,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-team-name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'name_text_color',
            [
                'label' => __('Text Color', 'striz-core'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-team-name, {{WRAPPER}} .elementor-team-name a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                'selector' => '{{WRAPPER}} .elementor-team-name',
            ]
        );

        $this->end_controls_section();

        // Job.
        $this->start_controls_section(
            'section_style_team_job',
            [
                'label' => __('Job', 'striz-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'job_space',
            [
                'label' => __('Spacing', 'striz-core'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 15,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-team-job' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'job_text_color',
            [
                'label' => __('Text Color', 'striz-core'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-team-job' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'job_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                'selector' => '{{WRAPPER}} .elementor-team-job',
            ]
        );

        $this->end_controls_section();

        // Icon Social.
        $this->start_controls_section(
            'section_style_icon_social',
            [
                'label' => __('Icon Social', 'striz-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'icon_social_font_size',
            [
                'label' => __('Font Size', 'striz-core'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 16,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-team-socials li.social a' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_icon_social_style');

        $this->start_controls_tab(
            'tab_icon_social_normal',
            [
                'label' => __('Normal', 'striz-core'),
            ]
        );

        $this->add_control(
            'color_icon_social',
            [
                'label' => __('Color', 'striz-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-team-socials li.social a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_icon_social_hover',
            [
                'label' => __('Hover', 'striz-core'),
            ]
        );

        $this->add_control(
            'color_icon_social_hover',
            [
                'label' => __('Color', 'striz-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-team-socials li.social a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

    }

    /**
     * Render testimonial widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper', 'class', 'elementor-teams-wrapper');


        // Item
        $this->add_render_attribute('item', 'class', 'elementor-team-item');

        $this->add_render_attribute('meta', 'class', 'elementor-team-meta');

        ?>
        <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
            <div <?php echo $this->get_render_attribute_string('item'); ?>>
                <?php $this->render_style($settings) ?>
            </div>
        </div>
        <?php
    }

    protected function render_style($settings)
    {
        $team_name_html = $settings['name'];
        if (!empty($settings['link']['url'])) :
            $team_name_html = '<a href="' . esc_url($settings['link']['url']) . '">' . $team_name_html . '</a>';
        endif;
        ?>
        <div class="elementor-team-meta-inner">
            <div class="elementor-team-image">
                <?php
                if (!empty($settings['image']['url'])) :
                    $image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image');
                    echo $image_html;
                endif;
                ?>
                <div class="elementor-team-socials">
                    <ul class="team-icon-socials">
                        <?php foreach ($this->get_socials() as $key => $social): ?>
                            <?php if (!empty($settings[$key])) : ?>
                                <li class="social">
                                    <a href="<?php echo esc_url($settings[$key]) ?>">
                                        <i class="fa <?php echo esc_attr($social); ?>"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="elementor-team-details">
                <div class="elementor-team-name"><?php echo $team_name_html; ?></div>
                <div class="elementor-team-job"><?php echo $settings['job']; ?></div>
            </div>
        </div>
        <?php
    }

    private function get_socials()
    {
        return array(
            'facebook' => 'fa-facebook',
            'twitter' => 'fa-twitter',
            'google' => 'fa-google-plus',
        );
    }

}

$widgets_manager->register(new OSF_Elementor_Team_Box());
