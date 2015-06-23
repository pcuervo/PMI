<?php

/*------------------------------------*\
	TAXONOMIES
\*------------------------------------*/



	add_action( 'init', 'custom_taxonomies_callback', 0 );

	function custom_taxonomies_callback(){

		// BRANDS
		if( ! taxonomy_exists('marcas')){

			$labels = array(
				'name'              => 'Marca',
				'singular_name'     => 'Marca',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar marca',
				'update_item'       => 'Actualizar marca',
				'add_new_item'      => 'Nueva marca',
				'new_item_name'     => 'Nombre nuevo marca',
				'menu_name'         => 'Marcas'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'marca' ),
			);

			register_taxonomy( 'marcas', 'productos', $args );
		}
		
		// Producto utilizado
		if( ! taxonomy_exists('producto-utilizado')){

			$labels = array(
				'name'              => 'Producto utilizado',
				'singular_name'     => 'Producto utilizado',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Producto utilizado',
				'update_item'       => 'Actualizar Producto utilizado',
				'add_new_item'      => 'Nueva Producto utilizado',
				'new_item_name'     => 'Nombre nuevo Tipo',
				'menu_name'         => 'Producto utilizado'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'producto-utilizado' ),
			);

			register_taxonomy( 'producto-utilizado', 'recetas', $args );
		}
		insert_term_brand();
		insert_producto_utilizado();
	}// custom_taxonomies_callback

	/**
	* Insert terms for "Marcas"
	**/
	function insert_term_brand(){
		// if ( ! term_exists( 'Nike', 'brand' ) ){
		// 	wp_insert_term( 'Nike', 'brand' );
		// }
	}// insert_term_brands

	function insert_producto_utilizado(){
		// if ( ! term_exists( 'Nike', 'brand' ) ){
		// 	wp_insert_term( 'Nike', 'brand' );
		// }
	}// insert_producto_utilizado

	