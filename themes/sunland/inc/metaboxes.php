<?php

// CUSTOM METABOXES //////////////////////////////////////////////////////////////////

add_action('add_meta_boxes', function(){
		global $post;
				add_meta_box( 'weight', 'Weight', 'metabox_weight', 'product', 'advanced', 'high' );
				add_meta_box( 'indications', 'Indications', 'metabox_indications', 'product', 'advanced', 'high' );
				add_meta_box( 'portions', 'Portions', 'metabox_portions', 'product', 'advanced', 'high' );
				add_meta_box( 'ingredients', 'Ingredients', 'metabox_ingredients', 'product', 'advanced', 'high' );

				add_meta_box( 'quantity', 'Quantity', 'metabox_quantity', 'recipe', 'advanced', 'high' );
				add_meta_box( 'time', 'Time', 'metabox_time', 'recipe', 'advanced', 'high' );
				add_meta_box( 'instructions', 'instructions', 'metabox_instructions', 'recipe', 'advanced', 'high' );
				add_meta_box( 'ingredients_for_recipe', 'ingredients', 'metabox_ingredients_for_recipe', 'recipe', 'advanced', 'high' );
				add_meta_box('dynamic_nutrition_facts',__( 'Nutrition facts', 'myplugin_textdomain' ),'metabox_nutrition_facts','recipe');
				add_meta_box('dynamic_nutrition_percentage',__( 'Nutrition percentage', 'myplugin_textdomain' ),'metabox_nutrition_percentage','recipe');
			
			if( $post->post_name == 'contacto'){
				add_meta_box( 'telefono', 'Teléfonos', 'metabox_telefono', 'page', 'advanced', 'high' );
				add_meta_box( 'email', 'E-mail de contacto', 'metabox_email', 'page', 'advanced', 'high' );
				add_meta_box( 'address', 'Address', 'metabox_address', 'page', 'advanced', 'high' );		
			}
	});

	function metabox_nutrition_facts() {
	    global $post;
	    wp_nonce_field( plugin_basename( __FILE__ ), 'nutrition_facts_nonce' );
	    ?>
	    <div id="meta_inner">
	    <?php

	    $nutritions_facts = get_post_meta($post->ID,'nutritions_facts',true);
	    $c = 0;
	    if ( count( $nutritions_facts ) >0 ) {
	    	if (is_array($nutritions_facts) ){
		        foreach( $nutritions_facts as $nutritions_fact ) {
		            if ( isset( $nutritions_fact['name'] ) || isset( $nutritions_fact['weight']) ) {
		                printf( '<p>Nutrition name <input type="text" name="nutritions[%1$s][name]" value="%2$s" /> -- Weight per 100g : <input type="text" name="nutritions[%1$s][weight]" value="%3$s" /> <span class="remove">%4$s</span></p>', $c, $nutritions_fact['name'], $nutritions_fact['weight'], __( 'Remove Component' ) );
		                $c = $c +1;
		            }
		        }
	      	}
	    }

	    ?>
	<span id="facts"></span>
	<span class="add_fact"><?php _e('Add Component'); ?></span>
	<script>
	    var $ =jQuery.noConflict();
	    $(document).ready(function() {
	        var count = <?php echo $c; ?>;
	        $(".add_fact").click(function() {
	            count = count + 1;

	            $('#facts').append('<p>Nutrition name <input type="text" name="nutritions_facts['+count+'][name]" value="" /> -- Weight per 100g : <input type="text" name="nutritions_facts['+count+'][weight]" value="" /><span class="remove">Remove Component</span></p>' );
	            return false;
	        });
	        $(".remove").live('click', function() {
	            $(this).parent().remove();
	        });
	    });
	    </script>
	</div><?php

	}// metabox_nutrition_facts

	function metabox_nutrition_percentage() {
	    global $post;
	    wp_nonce_field( plugin_basename( __FILE__ ), 'nutrition_percentage_nonce' );
	    ?>
	    <div id="meta_inner">
	    <?php

	    $nutritions = get_post_meta($post->ID,'nutritions',true);
	    $c = 0;
	    if ( count( $nutritions ) >0 ) {
	    	if (is_array($nutritions) ){
		        foreach( $nutritions as $nutrition ) {
		            if ( isset( $nutrition['name'] ) || isset( $nutrition['weight'] )|| isset( $nutrition['percentage'] ) ) {
		                printf( '<p>Nutrition name <input type="text" name="nutritions[%1$s][name]" value="%2$s" /> -- Weight per 100g : <input type="text" name="nutritions[%1$s][weight]" value="%3$s" /> -- Percentage : <input type="text" name="nutritions[%1$s][percentage]" value="%4$s" /><span class="remove">%5$s</span></p>', $c, $nutrition['name'], $nutrition['weight'], $nutrition['percentage'], __( 'Remove Component' ) );
		                $c = $c +1;
		            }
		        }
	      	}
	    }

	    ?>
	<span id="here"></span>
	<span class="add"><?php _e('Add Component'); ?></span>
	<script>
	    var $ =jQuery.noConflict();
	    $(document).ready(function() {
	        var count = <?php echo $c; ?>;
	        $(".add").click(function() {
	            count = count + 1;

	            $('#here').append('<p>Nutrition name <input type="text" name="nutritions['+count+'][name]" value="" /> -- Weight per 100g : <input type="text" name="nutritions['+count+'][weight]" value="" /> -- Percentage : <input type="text" name="nutritions['+count+'][percentage]" value="" /><span class="remove">Remove Component</span></p>' );
	            return false;
	        });
	        $(".remove").live('click', function() {
	            $(this).parent().remove();
	        });
	    });
	    </script>
	</div><?php

	}// metabox_nutrition_percentage

	function metabox_weight($post){
		$weight = get_post_meta($post->ID, '_weight_meta', true);
		wp_nonce_field(__FILE__, '_weight_meta_nonce');

echo <<<END

	<label>Weight:</label>
	<input type="text" class="[ widefat ]" name="_weight_meta" value="$weight" />

END;
	}// metabox_weight

	function metabox_indications($post){
		$indications = get_post_meta($post->ID, '_indications_meta', true);
		wp_nonce_field(__FILE__, '_indications_meta_nonce');

echo <<<END

	<label>Indications:</label>
	<input type="text" class="[ widefat ]" name="_indications_meta" value="$indications" />

END;
	}// metabox_indications

	function metabox_ingredients($post){
		$ingredients = get_post_meta($post->ID, '_ingredients_meta', true);
		wp_nonce_field(__FILE__, '_ingredients_meta_nonce');

echo <<<END

	<label>Ingredients:</label>
	<input type="text" class="[ widefat ]" name="_ingredients_meta" value="$ingredients" />

END;
	}// metabox_ingredients

	function metabox_portions($post){
		$portions = get_post_meta($post->ID, '_portions_meta', true);
		wp_nonce_field(__FILE__, '_portions_meta_nonce');

echo <<<END

	<label>Portions:</label>
	<input type="text" class="[ widefat ]" name="_portions_meta" value="$portions" />

END;
	}// metabox_portions


	function metabox_quantity($post){
		$quantity = get_post_meta($post->ID, '_quantity_meta', true);
		wp_nonce_field(__FILE__, '_quantity_meta_nonce');

echo <<<END

	<label>quantity:</label>
	<input type="text" class="[ widefat ]" name="_quantity_meta" value="$quantity" />

END;
	}// metabox_quantity


	function metabox_time($post){
		$time = get_post_meta($post->ID, '_time_meta', true);
		wp_nonce_field(__FILE__, '_time_meta_nonce');

echo <<<END

	<label>time:</label>
	<input type="text" class="[ widefat ]" name="_time_meta" value="$time" />

END;
	}// metabox_time	


function metabox_instructions($post){
		$instructions = get_post_meta($post->ID, '_instructions_meta', true);
		wp_nonce_field(__FILE__, '_instructions_meta_nonce');

echo <<<END

	<label>instructions:</label>
	<input type="text" class="[ widefat ]" name="_instructions_meta" value="$instructions" />

END;
	}// metabox_instructions

	
function metabox_ingredients_for_recipe($post){
		$ingredients_for_recipe = get_post_meta($post->ID, '_ingredients_for_recipe_meta', true);
		wp_nonce_field(__FILE__, '_ingredients_for_recipe_meta_nonce');

echo <<<END

	<label>ingredients_for_recipe:</label>
	<input type="text" class="[ widefat ]" name="_ingredients_for_recipe_meta" value="$ingredients_for_recipe" />

END;
	}// metabox_ingredients_for_recipe
	
	function metabox_telefono($post){
		$telefono1 = get_post_meta($post->ID, '_telefono1_meta', true);
		$telefono2 = get_post_meta($post->ID, '_telefono2_meta', true);

		wp_nonce_field(__FILE__, '_telefono1_meta_nonce');
		wp_nonce_field(__FILE__, '_telefono2_meta_nonce');

echo <<<END

	<label>Teléfono 1:</label>
	<input type="text" class="[ widefat ]" name="_telefono1_meta" value="$telefono1" />
	<label>Teléfono 2:</label>
	<input type="text" class="[ widefat ]" name="_telefono2_meta" value="$telefono2" />

END;
	}// metabox_telefono

	function metabox_email($post){
		$email = get_post_meta($post->ID, '_email_meta', true);

		wp_nonce_field(__FILE__, '_email_meta_nonce');

echo <<<END

	<label>Email:</label>
	<input type="text" class="[ widefat ]" name="_email_meta" value="$email" />

END;
	}// metabox_email

	function metabox_address($post){
		$address 	= get_post_meta($post->ID, '_address_meta', true);

		wp_nonce_field(__FILE__, '_address_meta_nonce');

echo <<<END

	<label>Ingresa los motivos de contacto separado por comas (ej. Informes, Ayuda, Pasar a saludar...):</label>
	<input type="text" class="[ widefat ]" name="_address_meta" value="$address" />

END;
	}// metabox_address

/*
** FUNCTION TO SAVE POST'S TAXONOMIES VALUES INTO DATABASE
*/
add_action('save_post', function($post_id){


		if ( ! current_user_can('edit_page', $post_id)) 
			return $post_id;

		if ( defined('DOING_AUTOSAVE') and DOING_AUTOSAVE ) 
			return $post_id;
		
		if ( wp_is_post_revision($post_id) OR wp_is_post_autosave($post_id) ) 
			return $post_id;

		if ( isset($_POST['_weight_meta']) and check_admin_referer(__FILE__, '_weight_meta_nonce') ){
			update_post_meta($post_id, '_weight_meta', $_POST['_weight_meta']);
		}
		if ( isset($_POST['_indications_meta']) and check_admin_referer(__FILE__, '_indications_meta_nonce') ){
			update_post_meta($post_id, '_indications_meta', $_POST['_indications_meta']);
		}
		if ( isset($_POST['_ingredients_meta']) and check_admin_referer(__FILE__, '_ingredients_meta_nonce') ){
			update_post_meta($post_id, '_ingredients_meta', $_POST['_ingredients_meta']);
		}
		if ( isset($_POST['_portions_meta']) and check_admin_referer(__FILE__, '_portions_meta_nonce') ){
			update_post_meta($post_id, '_portions_meta', $_POST['_portions_meta']);
		}
		if ( isset($_POST['_quantity_meta']) and check_admin_referer(__FILE__, '_quantity_meta_nonce') ){
			update_post_meta($post_id, '_quantity_meta', $_POST['_quantity_meta']);
		}
		if ( isset($_POST['_time_meta']) and check_admin_referer(__FILE__, '_time_meta_nonce') ){
			update_post_meta($post_id, '_time_meta', $_POST['_time_meta']);
		}
		if ( isset($_POST['_instructions_meta']) and check_admin_referer(__FILE__, '_instructions_meta_nonce') ){
			update_post_meta($post_id, '_instructions_meta', $_POST['_instructions_meta']);
		}
		if ( isset($_POST['_ingredients_for_recipe_meta']) and check_admin_referer(__FILE__, '_ingredients_for_recipe_meta_nonce') ){
			update_post_meta($post_id, '_ingredients_for_recipe_meta', $_POST['_ingredients_for_recipe_meta']);
		}
		if ( isset($_POST['_nutrition_facts_meta']) and check_admin_referer(__FILE__, '_nutrition_facts_meta_nonce') ){
			update_post_meta($post_id, '_nutrition_facts_meta', $_POST['_nutrition_facts_meta']);
		}
		if ( isset($_POST['_percentage_per_serving_meta']) and check_admin_referer(__FILE__, '_percentage_per_serving_meta_nonce') ){
			update_post_meta($post_id, '_percentage_per_serving_meta', $_POST['_percentage_per_serving_meta']);
		}
	    if ( isset( $_POST['nutrition_percentage_nonce'] ) ){
    		if ( !wp_verify_nonce( $_POST['nutrition_percentage_nonce'], plugin_basename( __FILE__ ) ) )
        		return;
	     	if(array_key_exists('nutritions',$_POST) ){
	    		$nutritions = $_POST['nutritions'];
	    		update_post_meta($post_id,'nutritions',$nutritions);
			}
			else {
				update_post_meta($post_id,'nutritions',NULL);
			}
		    
	   }
	    if ( isset( $_POST['nutrition_facts_nonce'] ) ){
    		if ( !wp_verify_nonce( $_POST['nutrition_facts_nonce'], plugin_basename( __FILE__ ) ) )
        		return;
	     	if(array_key_exists('nutritions_facts',$_POST) ){
	    		$nutritions = $_POST['nutritions_facts'];
	    		update_post_meta($post_id,'nutritions_facts',$nutritions);
			}
			else {
				update_post_meta($post_id,'nutritions_facts',NULL);
			}
		}

		// Teléfonos
		if ( isset($_POST['_telefono1_meta']) and check_admin_referer(__FILE__, '_telefono1_meta_nonce') ){
			update_post_meta($post_id, '_telefono1_meta', $_POST['_telefono1_meta']);
		}
		if ( isset($_POST['_telefono2_meta']) and check_admin_referer(__FILE__, '_telefono2_meta_nonce') ){
			update_post_meta($post_id, '_telefono2_meta', $_POST['_telefono2_meta']);
		}
		// Email
		if ( isset($_POST['_email_meta']) and check_admin_referer(__FILE__, '_email_meta_nonce') ){
			update_post_meta($post_id, '_email_meta', $_POST['_email_meta']);
		}
		// address
		if ( isset($_POST['_address_meta']) and check_admin_referer(__FILE__, '_address_meta_nonce') ){
			update_post_meta($post_id, '_address_meta', $_POST['_address_meta']);
		}


	});



?>