<?php

// CUSTOM METABOXES //////////////////////////////////////////////////////////////////

add_action('add_meta_boxes', function(){
		
				add_meta_box( 'weight', 'Weight', 'metabox_weight', 'product', 'advanced', 'high' );
				add_meta_box( 'indications', 'Indications', 'metabox_indications', 'product', 'advanced', 'high' );
				add_meta_box( 'portions', 'Portions', 'metabox_portions', 'product', 'advanced', 'high' );
				add_meta_box( 'ingredients', 'Ingredients', 'metabox_ingredients', 'product', 'advanced', 'high' );

				add_meta_box( 'quantity', 'Quantity', 'metabox_quantity', 'recipe', 'advanced', 'high' );
				add_meta_box( 'time', 'Time', 'metabox_time', 'recipe', 'advanced', 'high' );
				add_meta_box( 'instructions', 'instructions', 'metabox_instructions', 'recipe', 'advanced', 'high' );
				add_meta_box( 'ingredients_for_recipe', 'ingredients', 'metabox_ingredients_for_recipe', 'recipe', 'advanced', 'high' );
				add_meta_box( 'nutrition_facts', 'nutrition_facts', 'metabox_nutrition_facts', 'recipe', 'advanced', 'high' );
				add_meta_box( 'percentage_per_serving', 'percentage_per_serving', 'metabox_percentage_per_serving', 'recipe', 'advanced', 'high' );
				add_meta_box('dynamic_sectionid',__( 'My Tracks', 'myplugin_textdomain' ),'dynamic_inner_custom_box','recipe1');
	});

	function dynamic_inner_custom_box() {
	    global $post;
	    // Use nonce for verification
	    wp_nonce_field( plugin_basename( __FILE__ ), 'dynamicMeta_noncename' );
	    ?>
	    <div id="meta_inner">
	    <?php

	    //get the saved meta as an arry
	    $songs = get_post_meta($post->ID,'songs',true);

	    $c = 0;
	    if ( count( $songs ) >0 ) {
	    	if (is_array($songs) )
			{
	        foreach( $songs as $track ) {
	            if ( isset( $track['title'] ) || isset( $track['track'] ) ) {
	                printf( '<p>Song Title <input type="text" name="songs[%1$s][title]" value="%2$s" /> -- Track number : <input type="text" name="songs[%1$s][track]" value="%3$s" /><span class="remove">%4$s</span></p>', $c, $track['title'], $track['track'], __( 'Remove Track' ) );
	                $c = $c +1;
	            }
	        }
	      }
	    }

	    ?>
	<span id="here"></span>
	<span class="add"><?php _e('Add Tracks'); ?></span>
	<script>
	    var $ =jQuery.noConflict();
	    $(document).ready(function() {
	        var count = <?php echo $c; ?>;
	        $(".add").click(function() {
	            count = count + 1;

	            $('#here').append('<p> Song Title <input type="text" name="songs['+count+'][title]" value="" /> -- Track number : <input type="text" name="songs['+count+'][track]" value="" /><span class="remove">Remove Track</span></p>' );
	            return false;
	        });
	        $(".remove").live('click', function() {
	            $(this).parent().remove();
	        });
	    });
	    </script>
	</div><?php

	}

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

	
function metabox_nutrition_facts($post){
		$nutrition_facts = get_post_meta($post->ID, '_nutrition_facts_meta', true);
		wp_nonce_field(__FILE__, '_nutrition_facts_meta_nonce');

echo <<<END

	<label>nutrition_facts:</label>
	<input type="text" class="[ widefat ]" name="_nutrition_facts_meta" value="$nutrition_facts" />

END;
	}// metabox_nutrition_facts

	
function metabox_percentage_per_serving($post){
		$percentage_per_serving = get_post_meta($post->ID, '_percentage_per_serving_meta', true);
		wp_nonce_field(__FILE__, '_percentage_per_serving_meta_nonce');

echo <<<END

	<label>percentage_per_serving:</label>
	<input type="text" class="[ widefat ]" name="_percentage_per_serving_meta" value="$percentage_per_serving" />

END;
	}// metabox_percentage_per_serving






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

    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( isset( $_POST['dynamicMeta_noncename'] ) ){
       

    if ( !wp_verify_nonce( $_POST['dynamicMeta_noncename'], plugin_basename( __FILE__ ) ) )
        return;

    // OK, we're authenticated: we need to find and save the data
	     if(array_key_exists('songs',$_POST) ){
	    		$songs = $_POST['songs'];
	    						    		update_post_meta($post_id,'songs',$songs);

			}
			else {
								    		update_post_meta($post_id,'songs',NULL);

			}

		}

	});



?>