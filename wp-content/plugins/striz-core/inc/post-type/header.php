<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class OSF_Custom_Post_Type_Header
 */
class OSF_Custom_Post_Type_Header extends OSF_Custom_Post_Type_Abstract
{

    /**
     * @return void
     */
    public function create_post_type()
    {

        $labels = array(
            'name'               => __('Header', "striz-core"),
            'singular_name'      => __('Header', "striz-core"),
            'add_new'            => __('Add New Header', "striz-core"),
            'add_new_item'       => __('Add New Header', "striz-core"),
            'edit_item'          => __('Edit Header', "striz-core"),
            'new_item'           => __('New Header', "striz-core"),
            'view_item'          => __('View Header', "striz-core"),
            'search_items'       => __('Search Headers', "striz-core"),
            'not_found'          => __('No Headers found', "striz-core"),
            'not_found_in_trash' => __('No Headers found in Trash', "striz-core"),
            'parent_item_colon'  => __('Parent Header:', "striz-core"),
            'menu_name'          => __('Header Builder', "striz-core"),
        );

        $args = array(
            'labels'              => $labels,
            'hierarchical'        => true,
            'description'         => __('List Header', "striz-core"),
            'supports'            => array('title', 'editor', 'thumbnail'), //page-attributes, post-formats
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'menu_icon'           => $this->get_icon(__FILE__),
            'show_in_nav_menus'   => false,
            'publicly_queryable'  => true,
            'exclude_from_search' => true,
            'has_archive'         => true,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => true,
            'capability_type'     => 'post'
        );
        register_post_type('header', $args);
    }


}

new OSF_Custom_Post_Type_Header;

