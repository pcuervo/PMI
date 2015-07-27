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
		
		// RECIPE PRODUCT
		if( ! taxonomy_exists('tipo-producto')){

			$labels = array(
				'name'              => 'Tipo de productos',
				'singular_name'     => 'Tipo de producto',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar tipo de producto',
				'update_item'       => 'Actualizar tipo de producto',
				'add_new_item'      => 'Nueva tipo de producto',
				'new_item_name'     => 'Nombre nuevo tipo de producto',
				'menu_name'         => 'Tipo de productos'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'tipo-producto' ),
			);

			register_taxonomy( 'tipo-producto', 'productos', $args );
		}

		// RECIPE PRODUCT
		if( ! taxonomy_exists('producto-destacado')){

			$labels = array(
				'name'              => 'Producto destacado',
				'singular_name'     => 'Producto destacado',
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'producto-destacado' ),
			);

			register_taxonomy( 'producto-destacado', 'productos', $args );
		}

		// RECIPE PRODUCT
		if( ! taxonomy_exists('productos-receta')){

			$labels = array(
				'name'              => 'Producto en receta',
				'singular_name'     => 'Producto en receta',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar producto en receta',
				'update_item'       => 'Actualizar producto en receta',
				'add_new_item'      => 'Nueva producto en receta',
				'new_item_name'     => 'Nombre nuevo tipo',
				'menu_name'         => 'Producto en receta'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'productos-receta' ),
			);

			register_taxonomy( 'productos-receta', 'recetas', $args );
		}

		// MEAL TYPE
		if( ! taxonomy_exists('tipos-comida')){

			$labels = array(
				'name'              => 'Tipos de comida',
				'singular_name'     => 'Tipo de comida',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar tipo de comida',
				'update_item'       => 'Actualizar tipo de comida',
				'add_new_item'      => 'Nuevo tipo de comida',
				'new_item_name'     => 'Nombre nuevo tipo de comida',
				'menu_name'         => 'Tipo de comida'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'tipos-comida' ),
			);

			register_taxonomy( 'tipos-comida', 'recetas', $args );
		}// Meal type

		// RECIPE PORTIONS
		if( ! taxonomy_exists('porciones-recetas')){

			$labels = array(
				'name'              => 'Porciones de receta',
				'singular_name'     => 'Porción de receta',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar porción de receta',
				'update_item'       => 'Actualizar porción de receta',
				'add_new_item'      => 'Nueva Porciones de receta',
				'new_item_name'     => 'Nombre nuevo Tipo',
				'menu_name'         => 'Porciones de receta'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'porciones-recetas' ),
			);

			register_taxonomy( 'porciones-recetas', 'recetas', $args );
		}

		// MEAL TYPE
		if( ! taxonomy_exists('tipos-comida')){

			$labels = array(
				'name'              => 'Tipos de comida',
				'singular_name'     => 'Tipo de comida',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar tipo de comida',
				'update_item'       => 'Actualizar tipo de comida',
				'add_new_item'      => 'Nuevo tipo de comida',
				'new_item_name'     => 'Nombre nuevo tipo de comida',
				'menu_name'         => 'Tipo de comida'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'tipos-comida' ),
			);

			register_taxonomy( 'tipos-comida', 'recetas', $args );
		}// Meal type

		// Insert taxonomy terms
		insert_recipe_portion_terms();
		insert_meal_type_terms();
		insert_product_type_terms();
		insert_featured_product_terms();
		register_taxonomy('producto-utilizado', array());

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
			case 'productos':
				insert_dynamic_taxonomy_term( $post->post_title, 'productos-receta' );
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


	/*
	 * Insert "porciones de receta" terms
	 *
	 */
	function insert_recipe_portion_terms( ){

		$porciones = array( '10+ personas', '6 a 10 personas', '4 a 6 personas', 'Individuales' );
		foreach ( $porciones as $porcion )
			insert_dynamic_taxonomy_term( $porcion, 'porciones-recetas' );

	}// insert_recipe_portion_terms

	/*
	 * Insert "tipos de comida" terms
	 *
	 */
	function insert_meal_type_terms( ){

		$tipos_de_comida = array( 'Cena', 'Comida', 'Desayuno' );
		foreach ( $tipos_de_comida as $tipo_comida )
			insert_dynamic_taxonomy_term( $tipo_comida, 'tipos-comida' );

	}// insert_meal_type_terms

	/*
	 * Insert "tipos de producto" terms
	 *
	 */
	function insert_product_type_terms( ){

		$tipo_de_producto = array( 'Embutidos', 'Retail', 'Pavo entero', 'Pechuga de pavo' );
		foreach ( $tipo_de_producto as $tipo )
			insert_dynamic_taxonomy_term( $tipo, 'tipo-producto' );

	}// insert_product_type_terms

	/*
	 * Insert "producto destacado" terms
	 *
	 */
	function insert_featured_product_terms( ){

		$tipo_de_producto = array( 'Si', 'No' );
		foreach ( $tipo_de_producto as $tipo )
			insert_dynamic_taxonomy_term( $tipo, 'producto-destacado' );

	}// insert_featured_product_terms





	