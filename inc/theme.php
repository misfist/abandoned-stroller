<?php

/**
 * Theme Initialization Functions
 *
 * @package Misfist Network Theme
 */

# Theme setup
add_action( 'after_setup_theme', 'misfist_theme_setup', 5 );

# Register custom image sizes.
add_action( 'init', 'misfist_theme_register_image_sizes', 5 );

# Register custom menus.
add_action( 'init', 'misfist_theme_register_menus', 5 );

# Register custom layouts.
//add_action( 'hybrid_register_layouts', 'misfist_theme_register_layouts' );

# Register sidebars.
add_action( 'widgets_init', 'misfist_theme_register_sidebars', 5 );

# Add custom scripts and styles
add_action( 'wp_enqueue_scripts', 'misfist_theme_enqueue_scripts', 5 );
add_action( 'wp_enqueue_scripts', 'misfist_theme_enqueue_styles',  5 );


/**
 * Sets up the ANP Main Network theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */

if ( ! function_exists( 'misfist_theme_setup' ) ) {

    // Register Theme Features
    function misfist_theme_setup()  {

        // Add theme support for Post Formats
        $formats = array( 'gallery', 'image', 'video', 'link', 'aside', );
        add_theme_support( 'post-formats', $formats );  

        // Add theme support for Semantic Markup
        $markup = array( 'search-form' );
        add_theme_support( 'html5', $markup );  

        add_theme_support( 'menus' );

        // Add theme support for custom header
        add_theme_support( 'custom-header' );

        // Add theme support for Translation
        load_theme_textdomain( 'abandoned-stroller', get_template_directory() . '/library/language' );  

        // Loop Pagination
        // Provides a template tag for adding pagination to multi-post pages (e.g., archives, blog, search)
        // http://themehybrid.com/docs/hybrid-core-extensions
        add_theme_support( 'loop-pagination' );
    }

}


/**
 * Register custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function misfist_theme_register_image_sizes() {

    add_image_size( '600', 600, 150, true );
    add_image_size( '300', 300, 100, true );
    add_image_size( '150', 150, 150, true );

}

/**
 * Register nav menu locations.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function misfist_theme_register_menus() {
    register_nav_menu( 'primary',    esc_html_x( 'Primary',    'nav menu location', 'abandoned-stroller' ) );
    register_nav_menu( 'secondary',  esc_html_x( 'Secondary',  'nav menu location', 'abandoned-stroller' ) );
    register_nav_menu( 'subsidiary', esc_html_x( 'Subsidiary', 'nav menu location', 'abandoned-stroller' ) );
}

/**
 * Register layouts.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function misfist_theme_register_layouts() {

    hybrid_register_layout( '1c',   array( 'label' => esc_html__( '1 Column',                     'abandoned-stroller' ), 'image' => '%s/images/layouts/1c.png'   ) );
    hybrid_register_layout( '2c-l', array( 'label' => esc_html__( '2 Columns: Content / Sidebar', 'abandoned-stroller' ), 'image' => '%s/images/layouts/2c-l.png' ) );
    hybrid_register_layout( '2c-r', array( 'label' => esc_html__( '2 Columns: Sidebar / Content', 'abandoned-stroller' ), 'image' => '%s/images/layouts/2c-r.png' ) );
}

/**
 * Register sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */

 function misfist_theme_register_sidebars() {

    hybrid_register_sidebar(
        array(
            'id'          => 'sidebar1',
            'name'        => esc_html_x( 'Primary', 'sidebar', 'abandoned-stroller' ),
            'description' => esc_html__( '', 'abandoned-stroller' )
        )
    );

    hybrid_register_sidebar(
        array(
            'id'          => 'home-modules',
            'name'        => esc_html_x( 'Homepage Modules', 'sidebar', 'abandoned-stroller' ),
            'description' => esc_html__( 'Modules for the Homepage', 'abandoned-stroller' )
        )
    );

    hybrid_register_sidebar(
        array(
            'id'          => 'footer1',
            'name'        => esc_html_x( 'Footer 1', 'abandoned-stroller' ),
            'description' => esc_html_x( 'First footer widget area.', 'abandoned-stroller' )
        )
    );

    hybrid_register_sidebar(
        array(
            'id'          => 'footer2',
            'name'        => esc_html_x( 'Footer 2', 'abandoned-stroller' ),
            'description' => esc_html_x( 'Second footer widget area.', 'abandoned-stroller' )
        )
    );

    hybrid_register_sidebar(
        array(
            'id'          => 'footer3',
            'name'        => esc_html_x( 'Footer 3', 'abandoned-stroller' ),
            'description' => esc_html_x( 'Third footer widget area.', 'abandoned-stroller' )
        )
    );

    hybrid_register_sidebar(
        array(
            'id'          => 'footer4',
            'name'        => esc_html_x( 'Footer 4', 'abandoned-stroller' ),
            'description' => esc_html_x( 'Fourth footer widget area.', 'abandoned-stroller' )
        )
    );

    hybrid_register_sidebar(
        array(
            'id' => 'social',
            'name' => __( 'Social Widget', 'abandoned-stroller' ),
            'description' => __( 'Widget area for social links.', 'abandoned-stroller' )
        )
    );

}

/**
 * Load scripts for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function misfist_theme_enqueue_scripts() {

    wp_register_script( 'main', trailingslashit( get_template_directory_uri() ) . 'assets/scripts/main.js', array( 'jquery' ), '', true );

    wp_register_script( 'light-box', trailingslashit( get_template_directory_uri() ) . 'assets/vendor/featherlight/release/featherlight.min.js', array( 'jquery' ), '', true );

    wp_register_script( 'light-box-gallery', trailingslashit( get_template_directory_uri() ) . 'assets/vendor/featherlight/release/featherlight.gallery.min.js', array( 'jquery' ), '', true );

    wp_enqueue_script( 'main' );

    if( is_front_page() ) {
        wp_enqueue_script( 'light-box' );
        wp_enqueue_script( 'light-box-gallery' );
    }

}

/**
 * Load stylesheets for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function misfist_theme_enqueue_styles() {

    // Load one-five base style.
    //wp_enqueue_style( 'hybrid-one-five' );

    // Load gallery style if 'cleaner-gallery' is active.
    if ( current_theme_supports( 'cleaner-gallery' ) )
        wp_enqueue_style( 'hybrid-gallery' );

    // Load parent theme stylesheet if child theme is active.
    if ( is_child_theme() )
        wp_enqueue_style( 'hybrid-parent' );

    // Load active theme stylesheet.
    //wp_enqueue_style( 'hybrid-style' );


    wp_register_style( 'abandoned-stroller-style', trailingslashit( get_template_directory_uri() ) . 'assets/styles/style.css');

    wp_register_style( 'light-box', trailingslashit( get_template_directory_uri() ) . 'assets/vendor/featherlight/release/featherlight.min.css');

    wp_register_style( 'light-box', trailingslashit( get_template_directory_uri() ) . 'assets/vendor/featherlight/release/featherlight.gallery.min.css');

    wp_enqueue_style( 'abandoned-stroller-style' );

    if( is_front_page() ) {
        wp_enqueue_style( 'light-box' );
        wp_enqueue_style( 'light-box-gallery' );
    }

}

