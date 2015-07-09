
			</div><!-- main -->
			<footer>
				<div class="[ wrapper ] [ padding ]">
					<div class="[ row ]">
						<?php
							$contact_info_query = new WP_Query( 'pagename=contacto' );
							if ( $contact_info_query->have_posts() ) : $contact_info_query->the_post();
								$facebook = get_post_meta( $post->ID, '_facebook_meta', TRUE );
								$twitter = get_post_meta( $post->ID, '_twitter_meta', TRUE );
								$telefono = get_post_meta( $post->ID, '_telefono_meta', TRUE );
								$email = get_post_meta( $post->ID, '_email_meta', TRUE );
								$address = get_post_meta( $post->ID, '_address_meta', TRUE );
							endif;
							wp_reset_query();
						?>
						<div class="[ columna xmall-12 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ][ uppercase ][ margin-bottom ]">contacto</h4>
							<address>
								<?php echo $address; ?>
							</address>
							<p>
								Tel. <?php echo $telefono ?>
							</p>
						</div>
						<div class="[ columna xmall-12 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ][ uppercase ][ margin-bottom ]">de venta en</h4>
							<a href="#">
								<i class="[ icon-soriana ]"></i>
							</a>
							<a href="#">
								<i class="[ icon-walmart ]"></i>
							</a>
						</div>
						<div class="[ columna xmall-12 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ][ uppercase ][ margin-bottom ]">síguenos</h4>
							<p>
								<a class="[ light ]" href="<?php echo $facebook ?>" target="_blank">
									<i class="[ icon-facebook ] [ icon- ]"></i> /PMI
								</a>
							</p>
							<p>
								<a class="[ light ]" href="<?php echo $twitter ?>" target="_blank">
									<i class="[ icon-twitter ] [ icon- ]"></i> @pmi
								</a>
							</p>
						</div>
						<div class="[ columna xmall-12 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ][ uppercase ][ margin-bottom ]">newsletter</h4>
							<form class="[ form ]" action="">
								<input class="[ margin-bottom--small ]" type="text" placeholder="correo electrónico">
								<button class="[ button button--secondary ]" type="submit" >suscribirme</button>
							</form>
						</div>
					</div><!-- row -->
					<p class="[ text-center ]">
						<a class="light" href="#">Aviso de privacidad</a>
					</p>
					<hr class="[  ]">
					<div class="row">
						<div class="[ columna xmall-12 ][ margin-bottom ]">
							<h4 class="[ light ][ text-center ][ uppercase ]">Proveedores</h4>
							<div class="[ text-center ]">
								<?php
								// Get all brands
								$marcas_args = array(
									'post_type' 		=> 'marcas',
									'posts_per_page' 	=> -1,
								);
								$query_marcas = new WP_Query( $marcas_args );
								if ( $query_marcas->have_posts() ) : while ( $query_marcas->have_posts() ) : $query_marcas->the_post();
									$producto_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
									echo '<p class="[ inline-block align-middle ][ padding ]">' . the_title() . '</p>';
								endwhile; endif; wp_reset_query();
								?>
							</div>
						</div>
					</div><!-- row -->
				</div>
			</footer>

			<?php wp_footer(); ?>

		</div><!-- container -->
	</body>
</html>


