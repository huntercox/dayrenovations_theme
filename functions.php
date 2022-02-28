<?php
// ===================================================
// Enqueue Assets
// ===================================================
  function dido_register_assets() {

    /**
     * REGISTER
     */
      /* Stylesheets */
        wp_register_style(
          'main-stylesheet',
          get_stylesheet_uri() // theme/style.css
        );

      /* Scripts  */
        // Splide.JS
          wp_register_script(
            'splide',
            get_template_directory_uri() . '/node_modules/@splidejs/splide/dist/js/splide.min.js',
            array(),
            null,
            true
          );
          wp_register_script(
            'splide-init',
            get_template_directory_uri() . '/assets/js/splide.js',
            array('splide'),
            null,
            false
          );


        // Main Custom Javascript
          wp_register_script(
            'main-script',
            get_template_directory_uri() . '/assets/js/main.js',
            array(),
            '1.0.0',
            false
          );

    /**
     * ENQUEUE
     */

      wp_enqueue_style('main-stylesheet');
      wp_enqueue_script('main-script');

      if ( is_front_page() ) {
        wp_enqueue_script('splide-init');
        wp_enqueue_script('splide');
      }

  }
  add_action( 'wp_enqueue_scripts', 'dido_register_assets' );


// ===================================================
// Nav Menu
// ===================================================
  function dido_register_navmenu() {
    // Header Menu
      register_nav_menus(
        array(
          'header-menu' => __( 'Header Menu' )
        )
      );
  }
  add_action( 'init', 'dido_register_navmenu' );


  add_theme_support( 'post-thumbnails' );
  add_image_size( 'service-area', 360, 180, true);
  add_image_size( 'featured-banner', 1000, 400, true);

// ===================================================
// ACF Options Page
// ===================================================
  if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

    acf_add_options_sub_page('General');
    acf_add_options_sub_page('Header');
    acf_add_options_sub_page('Footer');


  }

 //Remove Gutenberg Block Library CSS from loading on the frontend
  function dido_remove_wp_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
  }
  add_action( 'wp_enqueue_scripts', 'dido_remove_wp_css', 100 );
