<?php


// TAXONOMIES ////////////////////////////////////////////////////////////////////////


	add_action( 'init', 'custom_taxonomies_callback', 0 );

	function custom_taxonomies_callback(){
		echo "string";

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

		/**
		* Insert initial terms for some of the new taxonomies
		**/
		insert_term_brand();

	}// custom_taxonomies_callback

	/**
	* Insert terms for "Tipo de arte"
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

	