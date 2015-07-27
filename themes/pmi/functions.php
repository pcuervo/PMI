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
	include 'inc/extra-metaboxes.php';





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
	 * Only query in given post types.
	 * @return $where
	 */
	function allowed_posts_types_only( $where, &$wp_query ){
	    global $wpdb;

	    $where .= ' AND ' . $wpdb->posts . ".post_type IN ('productos', 'recetas', 'opiniones-expertos')";
	    return $where;
	}// allowed_posts_types_only

	function order_by_post_type( $orderby, &$wp_query ){
		global $wpdb;
		return $wpdb->posts . '.post_type';
	}





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
		$brand_logo_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
		wp_reset_query();

		if( empty( $brand_logo_url ) ){
			return 0;
		}

		return $brand_logo_url[0];

	}// get_brand_logo

	/**
	 * Get featured product image of a given brand.
	 * @param string $brand
	 * @return string $brand_logo_url
	 */
	function get_brand_product_image( $brand ){

		global $post;

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

		$brand_product_image = MultiPostThumbnails::the_post_thumbnail( get_post_type(), 'secondary-image', $post->ID, 'medium', array('class' => '[ image-responsive ]'));

		wp_reset_query();

		if( empty( $brand_product_image ) ){
			return 0;
		}
		return $brand_product_image;



	}// get_brand_product_image

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

		if( ! $product_post )  
			return array( 'brand' => '', 'product_type' => '' );;

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

	/**
	 * Get portion for a given Recipe.
	 * @param integer $post_id
	 * @return string $portion
	 */
	function get_recipe_portion( $post_id ){

		$recipe_portion_term = wp_get_post_terms( $post_id, 'porciones-recetas' );
		$recipe_portion = empty( $recipe_portion_term ) ? '' : $recipe_portion_term[0]->name;

		return $recipe_portion;

	}// get_recipe_portion

	/**
	 * Get recommended recipe for a given product
	 * @param integer $product_name
	 * @return mixed $recipe_info
	 */
	function get_recommended_recipe( $product_name ){

		$recipe_args = array(
			'post_type' 		=> 'recetas',
			'posts_per_page' 	=> 1,
			'orderby'			=> 'rand',
			'tax_query' => array(
		        array(
			        'taxonomy' => 'productos-receta',
			        'field' => 'name',
			        'terms' => array( $product_name ),
			   	)
		    ),
		);
		$query_recipe = new WP_Query( $recipe_args );

		if( ! $query_recipe->have_posts() ) return get_random_recipe();

		$query_recipe->the_post();
		$recipe_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
		$recipe_info = array(
			'image_url'		=> $recipe_img_url[0],
			'title'			=> get_the_title(),
			'portions'		=> get_recipe_portion( get_the_ID() ),
			'cook_time'		=> get_post_meta( get_the_ID(), '_cook_time_meta', true ),
			'permalink'		=> get_permalink( get_the_ID() ),
			'ingredients'	=> rwmb_meta( '_ingredientes_receta', '', get_the_ID() ),
			);
		wp_reset_query();

		return $recipe_info;
	}// get_recommended_recipe

	/**
	 * Get a random recipe info
	 * @return mixed $recipe_info
	 */
	function get_random_recipe(){

		$recipe_args = array(
			'post_type' 		=> 'recetas',
			'posts_per_page' 	=> 1,
			'orderby'			=> 'rand',
		);
		$query_recipe = new WP_Query( $recipe_args );

		if( ! $query_recipe->have_posts() ) return array();

		$query_recipe->the_post();
		$recipe_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

		$recipe_info = array(
			'image_url'		=> $recipe_img_url[0],
			'title'			=> get_the_title(),
			'portions'		=> get_recipe_portion( get_the_ID() ),
			'cook_time'		=> get_post_meta( get_the_ID(), '_cook_time_meta', true ),
			'permalink'		=> get_permalink( get_the_ID() ),
			'ingredients'	=> rwmb_meta( '_ingredientes_receta', '', get_the_ID() ),
			);
		wp_reset_query();

		return $recipe_info;

	}// get_random_recipe

	/**
	 * Get product brand slug
	 * @param integer $product_post_id
	 * @return string $brand_slug
	 */
	function get_product_brand_slug( $product_post_id ){

		$brand_terms = wp_get_post_terms( $product_post_id, 'marcas' );

		if( empty( $brand_terms ) ) return '';

		return $brand_terms[0]->slug;

	}// get_product_brand_slug

	/**
	 * Get product type slug
	 * @param integer $product_post_id
	 * @return string $product_type_slug
	 */
	function get_product_type_slug( $product_post_id ){

		$type_terms = wp_get_post_terms( $product_post_id, 'tipo-producto' );

		if( empty( $type_terms ) ) return '';

		return $type_terms[0]->slug; 

	}// get_product_type_slug

	/**
	 * Get products similar to the given product base on product type
	 * @param integer $product_post_id
	 * @return string $similar_products
	 */
	function get_similar_products( $product_post_id ){

		$product_type_term = wp_get_post_terms( $product_post_id, 'tipo-producto' );

		// ¿Does the current product have an assigned "tipo de producto"?
		if ( empty( $product_type_term ) ) return array();

		$similar_products_args = array(
			'post_type' 		=> 'productos',
			'posts_per_page' 	=> 3,
			'post__not_in' 		=> array( $product_post_id ),
			'tax_query' 		=> array(
		        array(
			        'taxonomy' 	=> 'tipo-producto',
			        'field'	 	=> 'slug',
			        'terms' 	=> array( $product_type_term[0]->slug ),
			   	)
		    ),
		);
		$query_products = new WP_Query( $similar_products_args );

		// ¿Are there any other products with the same "tipo de producto"?
		if( ! $query_products->have_posts() ) return array();

		$similar_products = array();
		$product_index = 0;
		while ( $query_products->have_posts() ) : $query_products->the_post();

			$similar_products[$product_index] = array(
				'img_url'	=> wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' ),
				'title'		=> get_the_title(),
				'permalink'	=> get_the_permalink(),
			);
			$product_index++;

		endwhile;
		wp_reset_query();

		return $similar_products;
	}// get_similar_products





/*------------------------------------*\
	AJAX FUNCTIONS
\*------------------------------------*/

	/**
	 * Send contact email to PMI.
	 */
	function send_email_contacto(){

		$name = $_POST['name'];
		$email = $_POST['email'];
		$to_email = 'miguel@pcuervo.com';
		$msg = $_POST['message'];

		$to = $to_email;
		$subject = $name . ' te ha contactado a través de www.pmi.com.mx: ';
		$headers = 'From: My Name <' . $to_email . '>' . "\r\n";
		$message = '<html><body>';
		$message .= '<h3>Datos de contacto</h3>';
		$message .= '<p>Nombre: '.$name.'</p>';
		$message .= '<p>Email: '. $email . '</p>';
		if( $msg != '' ) $message .= '<p>Mensaje: '. $msg . '</p>';
		$message .= '</body></html>';

		add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));
		$mail = wp_mail($to, $subject, $message, $headers );

		if( ! $mail ) {
			$message = array(
			'error'		=> 1,
			'message'	=> 'No se pudo enviar el correo.',
			);
			echo json_encode($message , JSON_FORCE_OBJECT);
			exit;
		}

		$message = array(
			'error'		=> 0,
			'message'	=> 'Gracias por tu mensaje ' . $name . '. En breve nos pondremos en contacto contigo.',
		);
		echo json_encode($message , JSON_FORCE_OBJECT);
		exit();

	}// send_email_contacto
	add_action("wp_ajax_send_email_contacto", "send_email_contacto");
	add_action("wp_ajax_nopriv_send_email_contacto", "send_email_contacto");











