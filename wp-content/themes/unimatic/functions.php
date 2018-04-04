<?php
	function my_jquery_enqueue() {
		//wp_deregister_script('jquery');
		wp_register_script('jquery', get_bloginfo('template_directory').'/js/jquery-1.11.1.min.js', false, null);
		wp_enqueue_script('jquery');
	}
	if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary_menu', __( 'primary_menu', 'unimatic' ) );
	register_nav_menu( 'footer_menu', __( 'footer_menu', 'unimatic' ) );

	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
	}

	if( function_exists('acf_add_options_page') ) {
	    acf_add_options_page();
    }


    function new_excerpt_length($length) {
        return 30;
    }
    add_filter('excerpt_length', 'new_excerpt_length');
    function wpdocs_excerpt_more( $more ) {
        return '...';
    }
    add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );



    add_action( 'after_setup_theme', 'woocommerce_support' );
    function woocommerce_support() {
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
        //
        remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
    }







    add_action('wp','myak_woocommerce_hooks');
    function myak_woocommerce_hooks() {
        // remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
        //add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 9, 0 );
        //
        // remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
        // //add_action( 'woocommerce_after_main_content', 'woocommerce_output_related_products', 9 );
        // remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
        //add_action( 'woocommerce_after_single_product_summary', 'woocommerce_cross_sell_display', 21 );

        //remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
        //add_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 32 );



        //
        /*add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );*/
        //
        // remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
        // add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 19 );


        //remove_action( 'woocommerce_single_product_summary', array( WC_Variation_Description::get_instance()->frontend, 'add_variation_description' ), 25 );
        //add_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
        /*add_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
        add_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
        add_action( 'woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30 );
        add_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );
        add_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
        add_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );*/
        //
        // remove_action( 'woocommerce_product_tabs', 'woocommerce_default_product_tabs' );

        // remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
        // remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
        // if( !is_product()){
        //    add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
        //    add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
        // }
        // //
        // add_filter( 'wc_product_sku_enabled', '__return_false' );
		//
		// add_filter( 'woocommerce_subcategory_count_html', '__return_null' );


		// remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
		// add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail_myak', 10);
		// if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail_myak' ) ) {
		//     function woocommerce_template_loop_product_thumbnail_myak() {
		//         echo woocommerce_get_product_thumbnail_myak();
		//     }
		// }
		// if ( ! function_exists( 'woocommerce_get_product_thumbnail_myak' ) ) {
		//     function woocommerce_get_product_thumbnail_myak( $size = 'full', $placeholder_width = 0, $placeholder_height = 0  ) {
		//         global $post, $woocommerce;
		//         $output = '';
		//
		//         if ( has_post_thumbnail() ) {
		//             $output .= get_the_post_thumbnail( $post->ID, $size );
		//         }
		//         $output .= '';
		//         return $output;
		//     }
		// }

    }

    // add_filter( 'woocommerce_enqueue_styles', '__return_false' );
    // function wp_enqueue_woocommerce_style(){
    //     wp_register_style( 'mytheme-woocommerce', get_template_directory_uri() . '/css/woocommerce.css' );
    //     if ( class_exists( 'woocommerce' ) ) {
    //         wp_enqueue_style( 'mytheme-woocommerce' );
    //     }
    // }
    // add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );











	function custom_post_type() {
        $args = array(
            'label'               => __( 'Landing', 'unimatic' ),
            'description'         => __( 'Landing', 'unimatic' ),
            'labels'              => __( 'Landing', 'unimatic' ),
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
        );
        register_post_type( 'landing', $args );
    }
    add_action( 'init', 'custom_post_type', 0 );
