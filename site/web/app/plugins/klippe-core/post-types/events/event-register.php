<?php
namespace MikadoCore\CPT\Event;

use MikadoCore\Lib\PostTypeInterface;

/**
 * Class EventRegister
 * @package MikadoCore\CPT\Event
 */
class EventRegister implements PostTypeInterface {
    /**
     * @var string
     */
    private $base;
    private $taxBase;
    private $tagBase;

    public function __construct() {
        $this->base    = 'event';
        $this->taxBase = 'event-category';
        $this->tagBase = 'event-tag';

        add_filter( 'archive_template', array( $this, 'registerArchiveTemplate' ) );
        add_filter( 'single_template', array( $this, 'registerSingleTemplate' ) );
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Registers custom post type with WordPress
     */
    public function register() {
        $this->registerPostType();
        $this->registerTax();
        $this->registerTagTax();
    }

    /**
     * Registers event archive template if one does'nt exists in theme.
     * Hooked to archive_template filter
     *
     * @param $archive string current template
     *
     * @return string string changed template
     */
    public function registerArchiveTemplate( $archive ) {
        global $post;

        if ( ! empty( $post ) && $post->post_type == $this->base ) {
            if ( ! file_exists( get_template_directory() . '/archive-' . $this->base . '.php' ) ) {
                return MIKADO_CORE_CPT_PATH . '/events/templates/archive-' . $this->base . '.php';
            }
        }

        return $archive;
    }

    /**
     * Registers event single template if one doesn't exists in theme.
     * Hooked to single_template filter
     * @param $single string current template
     * @return string string changed template
     */
    public function registerSingleTemplate( $single ) {
        global $post;

        if ( ! empty( $post ) && $post->post_type == $this->base ) {
            if ( ! file_exists( get_template_directory() . '/single-event.php' ) ) {
                return MIKADO_CORE_CPT_PATH . '/events/templates/single-' . $this->base . '.php';
            }
        }

        return $single;
    }

    /**
     * Registers custom post type with WordPress
     */
    private function registerPostType() {

        $menuPosition = 5;
        $menuIcon = 'dashicons-admin-post';
        $slug = $this->base;

        if ( klippe_core_theme_installed() ) {
            if ( klippe_mikado_options()->getOptionValue( 'event_single_slug' ) ) {
                $slug = klippe_mikado_options()->getOptionValue( 'event_single_slug' );
            }
        }

        register_post_type( $this->base,
            array(
                'labels'        => array(
                    'name'          => esc_html__( 'Mikado Events', 'klippe-core' ),
                    'singular_name' => esc_html__( 'Mikado Event', 'klippe-core' ),
                    'add_item'      => esc_html__( 'New Mikado Event', 'klippe-core' ),
                    'add_new_item'  => esc_html__( 'Add New Event', 'klippe-core' ),
                    'edit_item'     => esc_html__( 'Edit Event', 'klippe-core' )
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array( 'slug' => $slug ),
                'menu_position' => $menuPosition,
                'show_ui'       => true,
                'supports'      => array(
                    'author',
                    'title',
                    'editor',
                    'thumbnail',
                    'excerpt',
                    'page-attributes',
                    'comments'
                ),
                'menu_icon'     => $menuIcon
            )
        );
    }

    /**
     * Registers custom taxonomy with WordPress
     */
    private function registerTax() {
        $labels = array(
            'name'              => esc_html__( 'Event Categories', 'klippe-core' ),
            'singular_name'     => esc_html__( 'Event Category', 'klippe-core' ),
            'search_items'      => esc_html__( 'Search Event Categories', 'klippe-core' ),
            'all_items'         => esc_html__( 'All Event Categories', 'klippe-core' ),
            'parent_item'       => esc_html__( 'Parent Event Category', 'klippe-core' ),
            'parent_item_colon' => esc_html__( 'Parent Event Category:', 'klippe-core' ),
            'edit_item'         => esc_html__( 'Edit Event Category', 'klippe-core' ),
            'update_item'       => esc_html__( 'Update Event Category', 'klippe-core' ),
            'add_new_item'      => esc_html__( 'Add New Event Category', 'klippe-core' ),
            'new_item_name'     => esc_html__( 'New Event Category Name', 'klippe-core' ),
            'menu_name'         => esc_html__( 'Event Categories', 'klippe-core' )
        );

        register_taxonomy( $this->taxBase, array( $this->base ), array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'query_var'         => true,
            'show_admin_column' => true,
            'rewrite'           => array( 'slug' => 'event-category' )
        ) );
    }

    /**
     * Registers custom tag taxonomy with WordPress
     */
    private function registerTagTax() {
        $labels = array(
            'name'              => esc_html__( 'Event Tags', 'klippe-core' ),
            'singular_name'     => esc_html__( 'Event Tag', 'klippe-core' ),
            'search_items'      => esc_html__( 'Search Event Tags', 'klippe-core' ),
            'all_items'         => esc_html__( 'All Event Tags', 'klippe-core' ),
            'parent_item'       => esc_html__( 'Parent Event Tag', 'klippe-core' ),
            'parent_item_colon' => esc_html__( 'Parent Event Tags:', 'klippe-core' ),
            'edit_item'         => esc_html__( 'Edit Event Tag', 'klippe-core' ),
            'update_item'       => esc_html__( 'Update Event Tag', 'klippe-core' ),
            'add_new_item'      => esc_html__( 'Add New Event Tag', 'klippe-core' ),
            'new_item_name'     => esc_html__( 'New Event Tag Name', 'klippe-core' ),
            'menu_name'         => esc_html__( 'Event Tags', 'klippe-core' )
        );

        register_taxonomy( $this->tagBase, array( $this->base ), array(
            'hierarchical'      => false,
            'labels'            => $labels,
            'show_ui'           => true,
            'query_var'         => true,
            'show_admin_column' => true,
            'rewrite'           => array( 'slug' => 'event-tag' )
        ) );
    }
}