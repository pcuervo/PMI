<?php

/*------------------------------------*\
	CUSTOM METABOXES
\*------------------------------------*/



	add_action('add_meta_boxes', function(){
		global $post;

		switch ( $post->post_name ) {
			case 'some-page':
				break;
			default:
				add_metaboxes_products();
				add_metaboxes_recipes();
		}

	});





/*------------------------------------*\
	CUSTOM METABOXES FUNCTIONS
\*------------------------------------*/



	function add_metaboxes_products(){
		add_meta_box( 'net_content', 'Contenido neto', 'metabox_net_content', 'productos', 'advanced', 'high' );
		add_meta_box( 'product_portions', 'Porciones', 'metabox_product_portions', 'productos', 'advanced', 'high' );
		add_meta_box( 'indications', 'Indicaciones', 'metabox_indications', 'productos', 'advanced', 'high' );
		add_meta_box( 'ingredients', 'Ingredientes', 'metabox_ingredients', 'productos', 'advanced', 'high' );
	}

	function add_metaboxes_recipes(){
		add_meta_box( 'recipe_portions', 'Porciones', 'metabox_recipe_portions', 'recetas', 'advanced', 'high' );
		add_meta_box( 'cook_time', 'Tiempo', 'metabox_cook_time', 'recetas', 'advanced', 'high' );
		add_meta_box( 'instructions', 'Instrucciones', 'metabox_instructions', 'recetas', 'advanced', 'high' );
		add_meta_box( 'recipe_ingredients', 'Ingredientes', 'metabox_recipe_ingredients', 'recetas', 'advanced', 'high' );
		add_meta_box( 'nutrition_facts', 'Información nutricional', 'metabox_nutrition_facts', 'recetas', 'advanced', 'high' );
		add_meta_box( 'percentage_value', 'Información nutricional', 'metabox_percentage_value', 'recetas', 'advanced', 'high' );
	}




/*-----------------------------------------*\
	CUSTOM METABOXES CALLBACK FUNCTIONS
\*-----------------------------------------*/
	


	function metabox_net_content( $post ){
		$net_content = get_post_meta( $post->ID, '_net_content_meta', true );

		wp_nonce_field( __FILE__, '_net_content_meta_nonce' );

		echo "<input type='text' class='[ widefat ]' name='_net_content_meta' value='$net_content' />";
	}// metabox_net_content

	function metabox_product_portions( $post ){
		$product_portions = get_post_meta( $post->ID, '_product_portions_meta', true );

		wp_nonce_field( __FILE__, '_product_portions_meta_nonce' );

		echo "<input type='text' class='[ widefat ]' name='_product_portions_meta' value='$product_portions' />";
	}// metabox_product_portions

	function metabox_indications( $post ){
		$indications = get_post_meta( $post->ID, '_indications_meta', true );

		wp_nonce_field( __FILE__, '_indications_meta_nonce' );

		echo "<textarea class='[ widefat ]' name='_indications_meta'>$indications</textarea>";
	}// metabox_indications

	function metabox_ingredients( $post ){
		$ingredients = get_post_meta( $post->ID, '_ingredients_meta', true );

		wp_nonce_field( __FILE__, '_ingredients_meta_nonce' );

		echo "<textarea class='[ widefat ]' name='_ingredients_meta'>$ingredients</textarea>";
	}// metabox_ingredients

	function metabox_recipe_portions( $post ){
		$recipe_portions = get_post_meta( $post->ID, '_recipe_portions_meta', true );

		wp_nonce_field( __FILE__, '_recipe_portions_meta_nonce' );

		echo "<input type='text' class='[ widefat ]' name='_recipe_portions_meta' value='$recipe_portions' />";
	}// metabox_recipe_portions

	function metabox_cook_time( $post ){
		$cook_time = get_post_meta( $post->ID, '_cook_time_meta', true );

		wp_nonce_field( __FILE__, '_cook_time_meta_nonce' );

		echo "<input type='text' class='[ widefat ]' name='_cook_time_meta' value='$cook_time' />";
	}// metabox_cook_time

	function metabox_instructions( $post ){
		$instructions = get_post_meta( $post->ID, '_instructions_meta', true );

		wp_nonce_field( __FILE__, '_instructions_meta_nonce' );

		echo "<textarea class='[ widefat ]' name='_instructions_meta'>$instructions</textarea>";
	}// metabox_instructions

	function metabox_recipe_ingredients( $post ){
		$recipe_ingredients = get_post_meta( $post->ID, '_recipe_ingredients_meta', true );

		wp_nonce_field( __FILE__, '_recipe_ingredients_meta_nonce' );

		echo "<textarea class='[ widefat ]' name='_recipe_ingredients_meta'>$recipe_ingredients</textarea>";
	}// metabox_recipe_ingredients

	function metabox_nutrition_facts( $post ){
		$calories = get_post_meta( $post->ID, '_calories_meta', true );
		$fat = get_post_meta( $post->ID, '_fat_meta', true );
		$cholesterol = get_post_meta( $post->ID, '_cholesterol_meta', true );
		$protein = get_post_meta( $post->ID, '_protein_meta', true );

		wp_nonce_field( __FILE__, '_calories_meta_nonce' );
		wp_nonce_field( __FILE__, '_fat_meta_nonce' );
		wp_nonce_field( __FILE__, '_cholesterol_meta_nonce' );
		wp_nonce_field( __FILE__, '_protein_meta_nonce' );

		echo '<label>Calorías</label>';
		echo "<input type='text' class='[ widefat ]' name='_calories_meta' value='$calories' />";
		echo '<label>Grasa</label>';
		echo "<input type='text' class='[ widefat ]' name='_fat_meta' value='$fat' />";
		echo '<label>Colesterol</label>';
		echo "<input type='text' class='[ widefat ]' name='_cholesterol_meta' value='$cholesterol' />";
		echo '<label>Proteína</label>';
		echo "<input type='text' class='[ widefat ]' name='_protein_meta' value='$protein' />";
	}// metabox_nutrition_facts

	function metabox_percentage_value( $post ){
		$saturated_fat = get_post_meta( $post->ID, '_saturated_fat_meta', true );
		$saturated_fat_percentage = get_post_meta( $post->ID, '_saturated_fat_percentage_meta', true );
		$trans_fat = get_post_meta( $post->ID, '_trans_fat_meta', true );
		$trans_fat_percentage = get_post_meta( $post->ID, '_trans_fat_percentage_meta', true );
		$sodium = get_post_meta( $post->ID, '_sodium_meta', true );
		$sodium_percentage = get_post_meta( $post->ID, '_sodium_percentage_meta', true );
		$carbohydrates = get_post_meta( $post->ID, '_carbohydrates_meta', true );
		$carbohydrates_percentage = get_post_meta( $post->ID, '_carbohydrates_percentage_meta', true );
		$sugar_percentage = get_post_meta( $post->ID, '_sugar_percentage_meta', true );
		$sugar = get_post_meta( $post->ID, '_sugar_meta', true );
		$iron = get_post_meta( $post->ID, '_iron_meta', true );
		$fiber = get_post_meta( $post->ID, '_fiber_meta', true );
		$calcium = get_post_meta( $post->ID, '_calcium_meta', true );

		wp_nonce_field( __FILE__, '_saturated_fat_meta_nonce' );
		wp_nonce_field( __FILE__, '_saturated_fat_percentage_meta_nonce' );
		wp_nonce_field( __FILE__, '_trans_fat_meta_nonce' );
		wp_nonce_field( __FILE__, '_trans_fat_percentage_meta_nonce' );
		wp_nonce_field( __FILE__, '_sodium_meta_nonce' );
		wp_nonce_field( __FILE__, '_sodium_percentage_meta_nonce' );
		wp_nonce_field( __FILE__, '_carbohydrates_meta_nonce' );
		wp_nonce_field( __FILE__, '_carbohydrates_percentage_meta_nonce' );
		wp_nonce_field( __FILE__, '_sugar_meta_nonce' );
		wp_nonce_field( __FILE__, '_sugar_percentage_meta_nonce' );
		wp_nonce_field( __FILE__, '_iron_meta_nonce' );
		wp_nonce_field( __FILE__, '_fiber_meta_nonce' );
		wp_nonce_field( __FILE__, '_calcium_meta_nonce' );

		echo '<label>Grasa saturada</label>';
		echo "<input type='text' class='[ widefat ]' name='_saturated_fat_meta' value='$saturated_fat' />";
		echo '<label>Grasa saturada (%)</label>';
		echo "<input type='text' class='[ widefat ]' name='_saturated_fat_percentage_meta' value='$saturated_fat_percentage' />";
		echo '<label>Grasa trans</label>';
		echo "<input type='text' class='[ widefat ]' name='_trans_fat_meta' value='$trans_fat' />";
		echo '<label>Grasa trans (%)</label>';
		echo "<input type='text' class='[ widefat ]' name='_trans_fat_percentage_meta' value='$trans_fat_percentage' />";
		echo '<label>Sodio</label>';
		echo "<input type='text' class='[ widefat ]' name='_sodium_meta' value='$sodium' />";
		echo '<label>Sodio (%)</label>';
		echo "<input type='text' class='[ widefat ]' name='_sodium_percentage_meta' value='$sodium_percentage' />";
		echo '<label>Carbohidratos</label>';
		echo "<input type='text' class='[ widefat ]' name='_carbohydrates_meta' value='$carbohydrates' />";
		echo '<label>Carbohidratos (%)</label>';
		echo "<input type='text' class='[ widefat ]' name='_carbohydrates_percentage_meta' value='$carbohydrates_percentage' />";
		echo '<label>Azúcares</label>';
		echo "<input type='text' class='[ widefat ]' name='_sugar_meta' value='$sugar' />";
		echo '<label>Azúcares (%)</label>';
		echo "<input type='text' class='[ widefat ]' name='_sugar_percentage_meta' value='$sugar_percentage' />";
		echo '<label>Hierro</label>';
		echo "<input type='text' class='[ widefat ]' name='_iron_meta' value='$iron' />";
		echo '<label>Fibra</label>';
		echo "<input type='text' class='[ widefat ]' name='_fiber_meta' value='$fiber' />";
		echo '<label>Calcio</label>';
		echo "<input type='text' class='[ widefat ]' name='_calcium_meta' value='$calcium' />";
		
	}// metabox_percentage_value





/*------------------------------------*\
	SAVE METABOXES DATA
\*------------------------------------*/

	add_action('save_post', function( $post_id ){

		save_metabox_products( $post_id );
		save_metabox_recipes( $post_id );
	});

	/**
	* Save the metaboxes for post type "Productos"
	**/
	function save_metabox_products( $post_id ){
		// Net content
		if ( isset($_POST['_net_content_meta']) and check_admin_referer( __FILE__, '_net_content_meta_nonce') ){
			update_post_meta($post_id, '_net_content_meta', $_POST['_net_content_meta']);
		}
		// product_Portions
		if ( isset($_POST['_product_portions_meta']) and check_admin_referer( __FILE__, '_product_portions_meta_nonce') ){
			update_post_meta($post_id, '_product_portions_meta', $_POST['_product_portions_meta']);
		}
		// Indications
		if ( isset($_POST['_indications_meta']) and check_admin_referer( __FILE__, '_indications_meta_nonce') ){
			update_post_meta($post_id, '_indications_meta', $_POST['_indications_meta']);
		}
		// Ingredients
		if ( isset($_POST['_ingredients_meta']) and check_admin_referer( __FILE__, '_ingredients_meta_nonce') ){
			update_post_meta($post_id, '_ingredients_meta', $_POST['_ingredients_meta']);
		}
	}// save_metabox_products

	/**
	* Save the metaboxes for post type "Productos"
	**/
	function save_metabox_recipes( $post_id ){
		// Recipe Portions
		if ( isset($_POST['_recipe_portions_meta']) and check_admin_referer( __FILE__, '_recipe_portions_meta_nonce') ){
			update_post_meta($post_id, '_recipe_portions_meta', $_POST['_recipe_portions_meta']);
		}
		// Cook Time
		if ( isset($_POST['_cook_time_meta']) and check_admin_referer( __FILE__, '_cook_time_meta_nonce') ){
			update_post_meta($post_id, '_cook_time_meta', $_POST['_cook_time_meta']);
		}
		// Instructions
		if ( isset($_POST['_instructions_meta']) and check_admin_referer( __FILE__, '_instructions_meta_nonce') ){
			update_post_meta($post_id, '_instructions_meta', $_POST['_instructions_meta']);
		}
		// Recipe Ingredients
		if ( isset($_POST['_recipe_ingredients_meta']) and check_admin_referer( __FILE__, '_recipe_ingredients_meta_nonce') ){
			update_post_meta($post_id, '_recipe_ingredients_meta', $_POST['_recipe_ingredients_meta']);
		}
		// Calories
		if ( isset($_POST['_calories_meta']) and check_admin_referer( __FILE__, '_calories_meta_nonce') ){
			update_post_meta($post_id, '_calories_meta', $_POST['_calories_meta']);
		}
		// Fat
		if ( isset($_POST['_fat_meta']) and check_admin_referer( __FILE__, '_fat_meta_nonce') ){
			update_post_meta($post_id, '_fat_meta', $_POST['_fat_meta']);
		}
		// Cholesterol
		if ( isset($_POST['_cholesterol_meta']) and check_admin_referer( __FILE__, '_cholesterol_meta_nonce') ){
			update_post_meta($post_id, '_cholesterol_meta', $_POST['_cholesterol_meta']);
		}
		// Protein
		if ( isset($_POST['_protein_meta']) and check_admin_referer( __FILE__, '_protein_meta_nonce') ){
			update_post_meta($post_id, '_protein_meta', $_POST['_protein_meta']);
		}
		if ( isset($_POST['_saturated_fat_meta']) and check_admin_referer( __FILE__, '_saturated_fat_meta_nonce') ){
			update_post_meta($post_id, '_saturated_fat_meta', $_POST['_saturated_fat_meta']);
		}
		if ( isset($_POST['_saturated_fat_percentage_meta']) and check_admin_referer( __FILE__, '_saturated_fat_percentage_meta_nonce') ){
			update_post_meta($post_id, '_saturated_fat_percentage_meta', $_POST['_saturated_fat_percentage_meta']);
		}
		if ( isset($_POST['_trans_fat_meta']) and check_admin_referer( __FILE__, '_trans_fat_meta_nonce') ){
			update_post_meta($post_id, '_trans_fat_meta', $_POST['_trans_fat_meta']);
		}
		if ( isset($_POST['_trans_fat_percentage_meta']) and check_admin_referer( __FILE__, '_trans_fat_percentage_meta_nonce') ){
			update_post_meta($post_id, '_trans_fat_percentage_meta', $_POST['_trans_fat_percentage_meta']);
		}
		if ( isset($_POST['_sodium_meta']) and check_admin_referer( __FILE__, '_sodium_meta_nonce') ){
			update_post_meta($post_id, '_sodium_meta', $_POST['_sodium_meta']);
		}
		if ( isset($_POST['_sodium_percentage_meta']) and check_admin_referer( __FILE__, '_sodium_percentage_meta_nonce') ){
			update_post_meta($post_id, '_sodium_percentage_meta', $_POST['_sodium_percentage_meta']);
		}
		if ( isset($_POST['_carbohydrates_meta']) and check_admin_referer( __FILE__, '_carbohydrates_meta_nonce') ){
			update_post_meta($post_id, '_carbohydrates_meta', $_POST['_carbohydrates_meta']);
		}
		if ( isset($_POST['_carbohydrates_percentage_meta']) and check_admin_referer( __FILE__, '_carbohydrates_percentage_meta_nonce') ){
			update_post_meta($post_id, '_carbohydrates_percentage_meta', $_POST['_carbohydrates_percentage_meta']);
		}
		if ( isset($_POST['_sugar_percentage_meta']) and check_admin_referer( __FILE__, '_sugar_percentage_meta_nonce') ){
			update_post_meta($post_id, '_sugar_percentage_meta', $_POST['_sugar_percentage_meta']);
		}
		if ( isset($_POST['_sugar_meta']) and check_admin_referer( __FILE__, '_sugar_meta_nonce') ){
			update_post_meta($post_id, '_sugar_meta', $_POST['_sugar_meta']);
		}
		if ( isset($_POST['_iron_meta']) and check_admin_referer( __FILE__, '_iron_meta_nonce') ){
			update_post_meta($post_id, '_iron_meta', $_POST['_iron_meta']);
		}
		if ( isset($_POST['_fiber_meta']) and check_admin_referer( __FILE__, '_fiber_meta_nonce') ){
			update_post_meta($post_id, '_fiber_meta', $_POST['_fiber_meta']);
		}
		if ( isset($_POST['_calcium_meta']) and check_admin_referer( __FILE__, '_calcium_meta_nonce') ){
			update_post_meta($post_id, '_calcium_meta', $_POST['_calcium_meta']);
		}





		// TODO: SAVE META FIELDS FOR metabox_nutrition_facts AND metabox_percentage_value

	}// save_metabox_recipes
