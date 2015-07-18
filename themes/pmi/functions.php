<?php

/*------------------------------------*\
	CONSTANTS
\*------------------------------------*/



	/**
	* Define paths to javascript, styles, theme and site.
	**/
	define( 'JSPATH', get_template_directory_uri() . '/js/' );
	define( 'CSSPATH', get_template_directory_uri() . '/css/' );
	define( 'THEMEPATH', get_template_directory_uri() . '/' );
	define( 'SITEURL', site_url('/') );





/*------------------------------------*\
	INCLUDES
\*------------------------------------*/



	require_once('inc/post-types.php');
	require_once('inc/metaboxes.php');
	require_once('inc/taxonomies.php');
	require_once('inc/pages.php');
	require_once('inc/users.php');
	require_once('inc/functions-admin.php');
	require_once('inc/functions-js-footer.php');





/*------------------------------------*\
	GENERAL FUNCTIONS
\*------------------------------------*/



	/**
	* Enqueue frontend scripts and styles
	**/
	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'functions', JSPATH.'functions.js', array('plugins'), '1.0', true );

		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );
		wp_localize_script( 'functions', 'site_url', site_url() );
		wp_localize_script( 'functions', 'theme_url', THEMEPATH );


		// styles
		wp_enqueue_style( 'styles', get_stylesheet_uri() );

	});

	/**
	* Add javascript to the footer of pages.
	**/
	add_action( 'wp_footer', 'footer_scripts', 21 );





/*------------------------------------*\
	HELPER FUNCTIONS
\*------------------------------------*/



	/**
	 * Print the title tag based on what is being viewed.
	 * @return string
	 */
	function print_title(){
		global $page, $paged;

		wp_title( '|', true, 'right' );
		bloginfo( 'name' );

		// Add a page number if necessary
		if ( $paged >= 2 || $page >= 2 ){
			echo ' | ' . sprintf( __( 'Página %s' ), max( $paged, $page ) );
		}
	}// print_title

	/**
	 * Return the name of a month in Spanish.
	 * @param string $month - Number of month
	 * @return string $month_name - The name of month in Spanish
	 */
	function get_month_name( $month ){

		switch ( $month ) {
			case 1:
				return 'enero';
			case 2:
				return 'febrero';
			case 3:
				return 'marzo';
			case 4:
				return 'abril';
			case 5:
				return 'mayo';
			case 6:
				return 'junio';
			case 7:
				return 'julio';
			case 8:
				return 'agosto';
			case 9:
				return 'septiembre';
			case 10:
				return 'octubre';
			case 11:
				return 'noviembre';
			default:
				return 'diciembre';
		}// switch

	}// get_month_name

	/**
	 * Send contact email to Sunland School.
	 * @param string $name - Name of person requesting more info
	 * @param string $email - Email of person requesting more info
	 * @param string $tel - Telephone numbre of person requesting more info
	 * @param string $section - Website section from where the form was sent
	 * @param string $to_email - Email to where the info has to be sent
	 */
	function send_email_contacto($name, $email, $tel, $msg, $section, $to_email ){

		$to = $to_email;
		$subject = 'Informes acerca de: ' . $section;
		$headers = 'From: My Name <' . $to_email . '>' . "\r\n";
		$message = '<html><body>';
		$message .= '<h3>Contacto a través de www.sunland.mx</h3>';
		$message .= '<p>Nombre: '.$name.'</p>';
		$message .= '<p>Email: '. $email . '</p>';
		if( $tel != '' ) $message .= '<p>Teléfono: '. $tel . '</p>';
		if( $msg != '' ) $message .= '<p>Mensaje: '. $msg . '</p>';
		$message .= '</body></html>';

		add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));
		wp_mail($to, $subject, $message, $headers );

	}// send_email_contacto	





/*------------------------------------*\
	FORMAT FUNCTIONS
\*------------------------------------*/





/*------------------------------------*\
	SET/GET FUNCTIONS
\*------------------------------------*/


	
	/**
	 * Get all products by brand.
	 * @param string $brand 
	 * @return mixed $products
	 */
	function get_products_by_brand( $brand ){

		$products_args = array(
			'post_type' 		=> 'productos',
			'posts_per_page' 	=> -1,
			'tax_query' => array(
		        array(
			        'taxonomy' => 'marcas',
			        'field' => 'name',
			        'terms' => array( $brand ),
			   	)
		    ),
		);

		$query_products = new WP_Query( $products_args );
		if ( ! $query_products->have_posts() ) {
			return 0;
		}

		$i = 0;
		while ( $query_products->have_posts() ) : $query_products->the_post();

			$product_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );

			$products[$i] = array(
				'title'		=> get_the_title(),
				'content'	=> get_the_content(),
				'permalink'	=> get_permalink( get_the_ID() ),
				'image_url'	=> $product_img_url[0],
				);
			$i++;
		endwhile; wp_reset_query();

		return $products;

	}// get_products_by_brand

	/**
	 * Get logo of a given brand.
	 * @param string $brand 
	 * @return string $brand_logo_url
	 */
	function get_brand_logo( $brand ){

		$brand_args = array(
			'post_type' 		=> 'marcas',
			'posts_per_page' 	=> 1,
			'name'				=> $brand
		);

		$query_brand = new WP_Query( $brand_args );
		if ( ! $query_brand->have_posts() ) {
			return 0;
		}

		$query_brand->the_post();
		$brand_logo_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
		wp_reset_query();

		if( empty( $brand_logo_url ) ){
			return 0;
		}
		return $brand_logo_url[0];

	}// get_brand_logo

	/**
	 * Get recipe info for filters.
	 * @param integer $post_id 
	 * @return mixed $brand_info
	 */
	function get_recipe_filter_info( $post_id ){

		$product_info = get_recipe_product_info( $post_id );
		
		$brand_info = array(
			'brand'			=> $product_info['brand'],
			'meal_type'		=> get_recipe_meal_type_slug( $post_id ),
			'portion'		=> get_recipe_portion_slug( $post_id ),
			'product_type'	=> $product_info['product_type'],
			);

		return $brand_info;

	}// get_recipe_filter_info

	/**
	 * Get product info for a given Recipe.
	 * @param integer $post_id 
	 * @return string $product_info
	 */
	function get_recipe_product_info( $post_id ){

		$recipe_product_term = wp_get_post_terms( $post_id, 'productos-receta' );

		if( empty ( $recipe_product_term ) ) 
			return array( 'brand' => '', 'product_type' => '' );

		$args = array(
		  'name'        => $recipe_product_term[0]->slug,
		  'post_type'   => 'productos',
		  'numberposts' => 1
		);
		$product_post = get_posts( $args );

		if( ! $product_post ) return '';

		$brand_product_term = wp_get_post_terms( $product_post[0]->ID, 'marcas' );
		$brand_slug = ! empty( $brand_product_term ) ? $brand_product_term[0]->slug : '';
		$product_type_term = wp_get_post_terms( $product_post[0]->ID, 'tipo-producto' );
		$product_type_slug = empty( $product_type_term ) ? '' : $product_type_term[0]->slug;

		$product_info = array(
			'brand'			=> $brand_slug,
			'product_type'	=> $product_type_slug,
			);

		return $product_info;

	}// get_recipe_product_info

	/**
	 * Get meal type slug for a given Recipe.
	 * @param integer $post_id 
	 * @return string $meal_type_slug
	 */
	function get_recipe_meal_type_slug( $post_id ){

		$recipe_meal_type_term = wp_get_post_terms( $post_id, 'tipos-comida' );
		$recipe_meal_type_slug = empty( $recipe_meal_type_term ) ? '' : $recipe_meal_type_term[0]->slug;
		
		return $recipe_meal_type_slug;

	}// get_recipe_meal_type_slug

	/**
	 * Get portion slug for a given Recipe.
	 * @param integer $post_id 
	 * @return string $portion_slug
	 */
	function get_recipe_portion_slug( $post_id ){

		$recipe_portion_term = wp_get_post_terms( $post_id, 'porciones-recetas' );
		$recipe_portion_slug = empty( $recipe_portion_term ) ? '' : $recipe_portion_term[0]->slug;
		
		return $recipe_portion_slug;

	}// get_recipe_portion_slug





/*------------------------------------*\
	AJAX FUNCTIONS
\*------------------------------------*/











