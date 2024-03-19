<?php
if (!defined('ABSPATH')) {
    exit;
}

class OSF_Scripts {
    /**
     * OSF_Scripts constructor.
     */
    public function __construct() {
        add_action('admin_enqueue_scripts', array($this, 'add_admin_scripts'), 999);
        add_action('customize_preview_init', array($this, 'init_preview_js'));
        add_action('customize_controls_enqueue_scripts', array($this, 'init_panel_customize_js'));

        add_action('after_switch_theme', array($this, 'set_style_theme_mods'));
        add_action('customize_save_after', array($this, 'set_style_theme_mods'));
        add_action('wp_enqueue_scripts', array($this, 'add_elementor_style'), 9);
        add_action('wp_enqueue_scripts', array($this, 'add_frontend_scripts'), 100);

    }

    /**
     * Assign styles to individual theme mod.
     *
     * @return void
     */
    public function set_style_theme_mods() {
        set_theme_mod('osf_theme_custom_style', osf_theme_custom_css());
        set_theme_mod('osf_theme_google_fonts', osf_get_fonts_url());
    }

    public function add_elementor_style(){
        if(osf_is_elementor_activated()){
            wp_enqueue_style('font-awesome');
            wp_enqueue_style( 'elementor-animations' );
            global $osf_header, $osf_footer;
            if($osf_footer || $osf_header){
                $scheme_css_file = new Elementor\Core\Files\CSS\Global_CSS('global.css');
                $scheme_css_file->enqueue();
            }

            wp_deregister_style('yith-wcwl-font-awesome');
        }
    }

    public function add_frontend_scripts() {
        wp_register_script('otf-countdown', trailingslashit(XSTREET_CORE_PLUGIN_URL) . 'assets/js/countdown.js', array('jquery'), false, true);

        if (get_theme_support('opal-customize-css')) {
            $dev_mode = get_theme_mod('osf_dev_mode', false);
            // Custom Css
            if ($dev_mode) {
                $google_fonts_url = osf_get_fonts_url();
            } else {
                $google_fonts_url = get_theme_mod('osf_theme_google_fonts', false);
            }
            if ($google_fonts_url) {
                wp_enqueue_style('otf-fonts', $google_fonts_url, array(), null);
            }

            if (is_customize_preview() || $dev_mode) {
                wp_add_inline_style('striz-style', osf_theme_custom_css());
            } else {
                $cssCustom = get_theme_mod('osf_theme_custom_style', false);
                if (!$cssCustom) {
                    $cssCustom = osf_theme_custom_css();
                    set_theme_mod('osf_theme_custom_style', $cssCustom);
                }
                wp_add_inline_style('striz-style', $cssCustom);
            }

            if (is_customize_preview()) {
                add_action('wp_footer', array($this, 'customizer_inline_css'));
            }
            wp_add_inline_style('striz-style', apply_filters('osf_theme_custom_inline_css', ''));
        }

        // Owl Carousel
        wp_enqueue_script('owl-carousel', trailingslashit(XSTREET_CORE_PLUGIN_URL) . 'assets/js/libs/owl.carousel.js', array('jquery'), '2.2.1');
        wp_enqueue_script('otf-carousel', trailingslashit(XSTREET_CORE_PLUGIN_URL) . 'assets/js/carousel.js', array('owl-carousel'));

        wp_enqueue_script('smoothscroll', trailingslashit(XSTREET_CORE_PLUGIN_URL) . 'assets/js/SmoothScroll.min.js', array('jquery'), '1.4.8', true);

        //Css plugin
        wp_enqueue_style('osf-plugin', trailingslashit(XSTREET_CORE_PLUGIN_URL) . 'assets/css/plugin-update.css', array(),null);
    }

    public function customizer_inline_css() {
        echo '<div id="osf-style-inline-css-customizer" class="d-none">';
        osf_customize_partial_css();
        echo '</div>';
    }


    public function init_panel_customize_js() {
        wp_enqueue_script(
            'otf-admin-customize',
            XSTREET_CORE_PLUGIN_URL . 'assets/js/customizer/customize.js',
            array('jquery'),
            null,
            true
        );
    }


    /**
     * @return void
     */
    public function init_preview_js() {
        wp_enqueue_style('otf-theme-preview', XSTREET_CORE_PLUGIN_URL . 'assets/css/customize-preview.css');
        wp_enqueue_script('otf-theme-preview', XSTREET_CORE_PLUGIN_URL . 'assets/js/customizer/preview.js', array(
            'jquery',
            'customize-preview'
        ), XSTREET_CORE_VERSION, true);
        wp_localize_script('otf-theme-preview', 'otfCustomizerButtons', apply_filters('osf_customizer_buttons', array()));
    }

    /**
     * @return void
     */
    public function add_admin_scripts($hook) {
        global $post;
        if ($hook === 'widgets.php') {
            wp_enqueue_script(
                'otf-admin-color',
                XSTREET_CORE_PLUGIN_URL . 'assets/3rd-party/alpha-color-picker/alpha-color-picker.js',
                array('jquery'),
                null,
                true
            );
        }

        wp_enqueue_script(
            'otf-admin-select2',
            XSTREET_CORE_PLUGIN_URL . 'assets/3rd-party/select2/select2.js',
            array('jquery'),
            null,
            true
        );

        wp_enqueue_style('otf-admin-style',
            XSTREET_CORE_PLUGIN_URL . 'assets/css/admin.css');

        if ($hook == 'post-new.php' || $hook == 'post.php') {
            wp_enqueue_script('otf-admin-page', trailingslashit(XSTREET_CORE_PLUGIN_URL) . 'assets/js/admin-page.js');
        }

    }
}

new OSF_Scripts();