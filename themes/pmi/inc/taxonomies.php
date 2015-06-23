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

	}// custom_taxonomies_callback

	/*
	 * Insert dynamic taxonomy terms after a post has been created/saved.
	 */
	function update_taxonomies(){
		global $post;

		// Exist of post doesn't exist or it has been moved to trash
		if( NULL === $post || 'trash' === get_post_status( $post->ID ) ) {
			return;
		}

		switch ( $post->post_type ) {
			case 'marcas':
				insert_dynamic_taxonomy_term( $post->post_title, 'marcas' );
				break;
			default:
				# code...
				break;
		}
		
	}// update_taxonomies
	add_action('save_post', 'update_taxonomies');

	/*
	 * Insert  $new_term to $taxonomy based on the title of new post
	 *
	 * @param string $new_term
	 * @param string $taxonomy
	 */
	function insert_dynamic_taxonomy_term( $new_term, $taxonomy ){

		$term = term_exists( $new_term, $taxonomy );
		if ( FALSE !== $term && NULL !== $term ) {
			return;
		}
		wp_insert_term( $new_term, $taxonomy );

	}// insert_dynamic_taxonomy_term



	