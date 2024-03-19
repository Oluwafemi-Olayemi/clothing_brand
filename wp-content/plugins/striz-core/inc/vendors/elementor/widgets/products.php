<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
if (!osf_is_woocommerce_activated()) {
    return;
}

use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Color as Scheme_Color;
use Elementor\Core\Schemes\Typography as Scheme_Typography;
use Elementor\Group_Control_Typography;

/**
 * Elementor tabs widget.
 *
 * Elementor widget that displays vertical or horizontal tabs with different
 * pieces of content.
 *
 * @since 1.0.0
 */
class OSF_Elementor_Products extends OSF_Elementor_Carousel_Base {


    public function get_categories() {
        return array('opal-addons');
    }

    /**
     * Get widget name.
     *
     * Retrieve tabs widget name.
     *
     * @return string Widget name.
     * @since  1.0.0
     * @access public
     *
     */
    public function get_name() {
        return 'opal-products';
    }

    /**
     * Get widget title.
     *
     * Retrieve tabs widget title.
     *
     * @return string Widget title.
     * @since  1.0.0
     * @access public
     *
     */
    public function get_title() {
        return __('Opal Products', 'striz-core');
    }

    /**
     * Get widget icon.
     *
     * Retrieve tabs widget icon.
     *
     * @return string Widget icon.
     * @since  1.0.0
     * @access public
     *
     */
    public function get_icon() {
        return 'eicon-tabs';
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

    /**
     * Register tabs widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function register_controls() {

        //Section Query
        $this->start_controls_section(
            'section_setting',
            [
                'label' => __('Settings', 'striz-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'limit',
            [
                'label'   => __('Posts Per Page', 'striz-core'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );

        $this->add_responsive_control(
            'column',
            [
                'label'   => __('columns', 'striz-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 3,
                'options' => [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6],
            ]
        );


        $this->add_control(
            'advanced',
            [
                'label' => __('Advanced', 'striz-core'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'   => __('Order By', 'striz-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date'       => __('Date', 'striz-core'),
                    'id'         => __('Post ID', 'striz-core'),
                    'menu_order' => __('Menu Order', 'striz-core'),
                    'popularity' => __('Number of purchases', 'striz-core'),
                    'rating'     => __('Average Product Rating', 'striz-core'),
                    'title'      => __('Product Title', 'striz-core'),
                    'rand'       => __('Random', 'striz-core'),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label'   => __('Order', 'striz-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc'  => __('ASC', 'striz-core'),
                    'desc' => __('DESC', 'striz-core'),
                ],
            ]
        );

        $this->add_control(
            'categories',
            [
                'label'    => __('Categories', 'striz-core'),
                'type'     => Controls_Manager::SELECT2,
                'options'  => $this->get_product_categories(),
                'multiple' => true,
            ]
        );

        $this->add_control(
            'cat_operator',
            [
                'label'     => __('Category Operator', 'striz-core'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'IN',
                'options'   => [
                    'AND'    => __('AND', 'striz-core'),
                    'IN'     => __('IN', 'striz-core'),
                    'NOT IN' => __('NOT IN', 'striz-core'),
                ],
                'condition' => [
                    'categories!' => ''
                ],
            ]
        );

        $this->add_control(
            'product_type',
            [
                'label'   => __('Product Type', 'striz-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'newest',
                'options' => [
                    'newest'       => __('Newest Products', 'striz-core'),
                    'on_sale'      => __('On Sale Products', 'striz-core'),
                    'best_selling' => __('Best Selling', 'striz-core'),
                    'top_rated'    => __('Top Rated', 'striz-core'),
                    'featured'     => __('Featured Product', 'striz-core'),
                ],
            ]
        );

        $this->add_control(
            'paginate',
            [
                'label'   => __('Paginate', 'striz-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none'       => __('None', 'striz-core'),
                    'pagination' => __('Pagination', 'striz-core'),
                ],
            ]
        );

        $this->add_control(
            'product_layout',
            [
                'label'   => __('Product Layout', 'striz-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid' => __('Grid', 'striz-core'),
                    'list' => __('List', 'striz-core'),
                ],
            ]
        );
        $this->add_responsive_control(
            'product_gutter',
            [
                'label'      => __('Gutter', 'striz-core'),
                'type'       => Controls_Manager::SLIDER,
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} ul.products li.product' => 'padding-left: calc({{SIZE}}{{UNIT}} / 2); padding-right: calc({{SIZE}}{{UNIT}} / 2);',
                    '{{WRAPPER}} ul.products'            => 'margin-left: calc({{SIZE}}{{UNIT}} / -2); margin-right: calc({{SIZE}}{{UNIT}} / -2);',
                ],
            ]
        );
        $this->end_controls_section();
        // End Section Query

        $this->start_controls_section(
            'section_style_box',
            [
                'label' => __('Box', 'striz-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'products_box_border_color',
            [
                'label' => __('Border Color', 'striz-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .product:hover:before' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_style_content',
            [
                'label' => __('Content', 'striz-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'products_title',
            [
                'label' => __('Title', 'striz-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'products_title_typography',
                'selector' => '{{WRAPPER}} .product .woocommerce-loop-product__title a',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_responsive_control(
            'products_title_bottom_space',
            [
                'label' => __('Spacing', 'striz-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .product .woocommerce-loop-product__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->start_controls_tabs('tabs_view_title_style');

            $this->start_controls_tab(
                'products_title_button_normal',
                [
                    'label' => __('Normal', 'striz-core'),
                ]
            );
                $this->add_control(
                    'products_title_color',
                    [
                        'label' => __('Color', 'striz-core'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                            '{{WRAPPER}} .product .woocommerce-loop-product__title a' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_control(
                    'products_border_color',
                    [
                        'label' => __('Border Color', 'striz-core'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                            '{{WRAPPER}} .product .group-transition' => 'border-color: {{VALUE}};',
                        ],
                    ]
                );
            $this->end_controls_tab();

            $this->start_controls_tab(
                'products_title_button_hover',
                [
                    'label' => __('Hover', 'striz-core'),
                ]
            );
                $this->add_control(
                    'products_title_color_hover',
                    [
                        'label' => __('Color Hover (Wrapper)', 'striz-core'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                            '{{WRAPPER}} .product .woocommerce-loop-product__title a:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );
            $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'products_category',
            [
                'label' => __('Category', 'striz-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'products_category_typography',
                'selector' => '{{WRAPPER}} .product .posted_in',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_responsive_control(
            'products_category_bottom_space',
            [
                'label' => __('Spacing', 'striz-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .product .posted_in' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->start_controls_tabs('tabs_view_category_style');

        $this->start_controls_tab(
            'products_category_button_normal',
            [
                'label' => __('Normal', 'striz-core'),
            ]
        );
        $this->add_control(
            'products_category_color',
            [
                'label' => __('Color', 'striz-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .product .posted_in a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'products_category_button_hover',
            [
                'label' => __('Hover', 'striz-core'),
            ]
        );
        $this->add_control(
            'products_category_color_hover',
            [
                'label' => __('Color Hover (Wrapper)', 'striz-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .product .posted_in a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();



        $this->add_control(
            'products_group-action',
            [
                'label' => __('Group Action', 'striz-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->start_controls_tabs('tabs_view_action_style');

        $this->start_controls_tab(
            'products_action_button_normal',
            [
                'label' => __('Normal', 'striz-core'),
            ]
        );
        $this->add_control(
            'products_action_color',
            [
                'label' => __('Color', 'striz-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .shop-action .woosc-btn:before,{{WRAPPER}} .shop-action .woosq-btn:before,{{WRAPPER}} .shop-action .woosw-btn:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'products_action_button_hover',
            [
                'label' => __('Hover', 'striz-core'),
            ]
        );
        $this->add_control(
            'products_action_color_hover',
            [
                'label' => __('Color Hover (Wrapper)', 'striz-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .shop-action .woosc-btn:hover:before,{{WRAPPER}} .shop-action .woosq-btn:hover:before,{{WRAPPER}} .shop-action .woosw-btn:hover:before' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->add_control(
            'products_price',
            [
                'label' => __('Price', 'striz-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'products_price_color',
            [
                'label' => __('Price Color', 'striz-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .product .price' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'products_price_sale_color',
            [
                'label' => __('Price Sale Color', 'striz-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .product .price ins' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        // Carousel Option
        $this->add_control_carousel(array(
            'product_layout' => 'grid'
        ));
    }


    protected function get_product_categories() {
        $categories = get_terms(array(
                'taxonomy'   => 'product_cat',
                'hide_empty' => false,
            )
        );
        $results    = array();
        if (!is_wp_error($categories)) {
            foreach ($categories as $category) {
                $results[$category->slug] = $category->name;
            }
        }

        return $results;
    }

    protected function get_product_type($atts, $product_type) {
        switch ($product_type) {
            case 'featured':
                $atts['visibility'] = "featured";
                break;

            case 'on_sale':
                $atts['on_sale'] = true;
                break;

            case 'best_selling':
                $atts['best_selling'] = true;
                break;

            case 'top_rated':
                $atts['top_rated'] = true;
                break;

            default:
                break;
        }

        return $atts;
    }

    /**
     * Render tabs widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->woocommerce_default($settings);
    }

    private function woocommerce_default($settings) {
        $type = 'products';
        $atts = [
            'limit'          => $settings['limit'],
            'columns'        => $settings['column'],
            'orderby'        => $settings['orderby'],
            'order'          => $settings['order'],
            'product_layout' => $settings['product_layout'],
        ];

        $atts = $this->get_product_type($atts, $settings['product_type']);
        if (isset($atts['on_sale']) && wc_string_to_bool($atts['on_sale'])) {
            $type = 'sale_products';
        } elseif (isset($atts['best_selling']) && wc_string_to_bool($atts['best_selling'])) {
            $type = 'best_selling_products';
        } elseif (isset($atts['top_rated']) && wc_string_to_bool($atts['top_rated'])) {
            $type = 'top_rated_products';
        }

        if (!empty($settings['categories'])) {
            $atts['category']     = implode(',', $settings['categories']);
            $atts['cat_operator'] = $settings['cat_operator'];
        }

        // Carousel
        if ($settings['enable_carousel'] === 'yes') {
            $atts['carousel_settings'] = json_encode(wp_slash($this->get_carousel_settings()));
            $atts['product_layout']    = 'carousel';
        } else {

            if (!empty($settings['column_tablet'])) {
                $this->add_render_attribute('row', 'data-elementor-columns-tablet', $settings['column_tablet']);
            }
            if (!empty($settings['column_mobile'])) {
                $this->add_render_attribute('row', 'data-elementor-columns-mobile', $settings['column_mobile']);
            }
        }

        if ($settings['paginate'] === 'pagination') {
            $atts['paginate'] = 'true';
        }

        $shortcode = new WC_Shortcode_Products($atts, $type);
        ?>
        <div <?php echo $this->get_render_attribute_string('row') ?>>
            <?php
            echo $shortcode->get_content();
            ?>
        </div>
        <?php
    }
}

$widgets_manager->register(new OSF_Elementor_Products());