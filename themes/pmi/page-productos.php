<?php 
	get_header();
	the_post();
	
	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$nosotros_info_query = new WP_Query( 'pagename=productos' );
	if ( $nosotros_info_query->have_posts() ) : $nosotros_info_query->the_post(); 
	?>
	    <h2 class="[ sub-title ] [ ]"><?php the_title() ?></h2>
	    <h2 class="[ sub-title ] [ ]"><?php the_content() ?></h2>
	<?php endif;
	wp_reset_query();
	?>
	
    <!-- List of all marcas -->
	<?php 

		$custom_terms = get_terms('marcas');
		echo "List of marcas: ";
		foreach($custom_terms as $custom_term) {
			echo " ".$custom_term->name;
		}
	?>
    



     <!-- Products by marcas -->
     <?php 

		$custom_terms = get_terms('marcas');
		echo '<h1>'."List of products by marcas: ". '</h1>';
		foreach($custom_terms as $custom_term) {
		    wp_reset_query();
		    $args = array('post_type' => 'productos',
		        'tax_query' => array(
		            array(
		                'taxonomy' => 'marcas',
		                'field' => 'slug',
		                'terms' => $custom_term->slug,
		            ),
		        ),
		     );

		     $loop = new WP_Query($args);
		     if($loop->have_posts()) {
		        echo '<h2>'.$custom_term->name.'</h2>';

		        while($loop->have_posts()) : $loop->the_post();
		            echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
		        endwhile;
		     }
		}
    ?> 



<?php
	get_footer();
?>