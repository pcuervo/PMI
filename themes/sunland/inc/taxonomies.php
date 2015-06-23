<?php


// TAXONOMIES ////////////////////////////////////////////////////////////////////////
	
	add_action( 'init', 'custom_taxonomies_callback', 0 );

	function custom_taxonomies_callback(){

		// BRAND
		if( ! taxonomy_exists('brand')){

			$labels = array(
				'name'              => 'Brands',
				'singular_name'     => 'Brand',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Brand',
				'update_item'       => 'Actualizar brand',
				'add_new_item'      => 'Nuevo brand',
				'new_item_name'     => 'Nombre Nuevo brand',
				'menu_name'         => 'Brands'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'brand' ),
			);

			register_taxonomy( 'brand', 'product', $args );
		}
		// BRAND
		if( ! taxonomy_exists('filter')){

			$labels = array(
				'name'              => 'Filters',
				'singular_name'     => 'Filter',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Filter',
				'update_item'       => 'Actualizar filter',
				'add_new_item'      => 'Nuevo filter',
				'new_item_name'     => 'Nombre Nuevo filter',
				'menu_name'         => 'Filters'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'filter' ),
			);

			register_taxonomy( 'filter', 'product', $args );
		}

	if( ! taxonomy_exists('recipe')){

			$labels = array(
				'name'              => 'Recipes',
				'singular_name'     => 'Recipe',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Recipe',
				'update_item'       => 'Actualizar recipe',
				'add_new_item'      => 'Nuevo recipe',
				'new_item_name'     => 'Nombre Nuevo Recipe',
				'menu_name'         => 'Recipes'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'recipe' ),
			);

			register_taxonomy( 'recipe', 'product', $args );
		}

		/**
		* Insert initial terms for some of the new taxonomies
		**/
		insert_term_brand();
		insert_term_filter();

	}// custom_taxonomies_callback

	/**
	* Insert terms dynamically fot "recipe"
	**/
	add_action('save_post', function($post_ID){
		 $post = get_post( $post_ID ); // get post object
         if ('recipe' == $post->post_type){
			wp_insert_term( $post->post_title, 'recipe' );
       }
	});
	/**
	* Delete terms dynamically fot "recipe"
	**/
	add_action('wp_trash_post', function($post_ID){
		$post = get_post($post_ID);
	    $term = get_term_by('name', $post->post_title, 'recipe');
	    if ('recipe' == $post->post_type && $term->count == 0){
	       wp_delete_term($term->term_id, 'recipe');
	    }
	});

	/**
	* Insert terms for "Brands"
	**/
	function insert_term_brand(){
		if ( ! term_exists( 'Nike', 'brand' ) ){
			wp_insert_term( 'Nike', 'brand' );
		}
		if ( ! term_exists( 'Taj', 'brand' ) ){
			wp_insert_term( 'Taj', 'brand' );
		}
		if ( ! term_exists( 'sundram', 'brand' ) ){
			wp_insert_term( 'sundram', 'brand' );
		}
	}// insert_term_brands

	/**
	* Insert terms for "Filters"
	**/
	function insert_term_filter(){
		if ( ! term_exists( 'Butterball', 'filter' ) ){
			wp_insert_term( 'Butterball', 'filter' );
		}
		if ( ! term_exists( 'Longmont', 'filter' ) ){
			wp_insert_term( 'Longmont', 'filter' );
		}
		if ( ! term_exists( 'Bar-S', 'filter' ) ){
			wp_insert_term( 'Bar-S', 'filter' );
		}
	if ( ! term_exists( 'Carolina Turkey', 'filter' ) ){
			wp_insert_term( 'Carolina Turkey', 'filter' );
		}
	if ( ! term_exists( 'Gusto', 'filter' ) ){
			wp_insert_term( 'Gusto', 'filter' );
		}
	}// insert_term_Filters


	