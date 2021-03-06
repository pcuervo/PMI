
			</div><!-- main -->

			<section class="[ action-buttons action-buttons--right ][ hidden--large ]">
				<a class="[ block ][ button button--hollow button--action ][ diagonal-green-to-blue-gradient ][ js-modal-opener ]" data-modal="nav" href="#">
					<span class="[ block ][ bg-light ][ no-padding ]">
						<img class="[ svg icon ][ square--button ][ secondary ]" src="<?php echo THEMEPATH; ?>images/hamburger.svg" alt="menu">
					</span>
				</a>
			</section><!-- action-buttons -->

			<section class="[ modal-wrapper modal-nav ][ hide ]">
				<div class="[ modal modal--full ][ diagonal-green-to-blue-gradient ]">
					<div class="[ modal-content ]">
						<article>
							<div class="[ row ][ padding ]">
								<div class="[ xmall-6 ][ pull-right ][ hidden--large-inline ][ inline-block align-middle ]">
									<a class="[ block ][ button--light button--hollow ][ pull-right ][ bg-transparent ][ js-modal-closer ]" data-modal="nav" href="#">
										<span class="[ block ][ no-padding ]">
											<img class="[ image-responsive ][ svg icon ][ square--button ][ padding--small ][ light ]" src="<?php echo THEMEPATH; ?>images/close.svg" alt="menu">
										</span>
									</a>
								</div>
							</div><!-- row -->
						</article>

						<nav class="[ center-full ][ hidden--large ]">
							<a href="<?php echo site_url('nosotros'); ?><?php echo isset( $_GET['lang'] ) ? '?lang=en' : ''; ?>" class="<?php echo ( 'Nosotros' == get_the_title() ) ? '[ active ]' : '' ?>[ nav-item ][ light ][ block ][ text-center uppercase ][ padding ]"><?php echo isset( $_GET['lang'] ) ? 'About Us' : 'Nosotros'; ?></a>
							<a href="<?php echo site_url('productos'); ?><?php echo isset( $_GET['lang'] ) ? '?lang=en' : ''; ?>" class="<?php echo ( 'Productos' == get_post_type() ) ? '[ active ]' : '' ?>[ nav-item ][ light ][ block ][ text-center uppercase ][ padding ]"><?php echo isset( $_GET['lang'] ) ? 'Products' : 'Productos'; ?></a>
							<a href="<?php echo site_url('servicios'); ?><?php echo isset( $_GET['lang'] ) ? '?lang=en' : ''; ?>" class="<?php echo ( 'Nosotros' == get_the_title() ) ? '[ active ]' : '' ?>[ nav-item ][ light ][ block ][ text-center uppercase ][ padding ]"><?php echo isset( $_GET['lang'] ) ? 'Services' : 'Servicios'; ?></a>
							<a href="<?php echo site_url('contacto'); ?><?php echo isset( $_GET['lang'] ) ? '?lang=en' : ''; ?>" class="<?php echo ( 'Nosotros' == get_the_title() ) ? '[ active ]' : '' ?>[ nav-item ][ light ][ block ][ text-center uppercase ][ padding ]"><?php echo isset( $_GET['lang'] ) ? 'Contact' : 'Contacto'; ?></a>
							<div class="[ nav-item ][ padding ][ relative ]">
								<div class="[ row ][ menu-options ][ hide ]">
									<div class="[ columna xmall-4 ]<?php echo isset( $_GET['lang'] ) ? '[ opacity-3 ]' : ''; ?>">
										<a href="<?php echo the_permalink(); ?>">
											<img class="[ svg icon icon--small ]" src="<?php echo THEMEPATH; ?>images/spanish.svg" alt="Español">
										</a>
									</div>
									<div class="[ columna xmall-4 ]<?php echo isset( $_GET['lang'] ) ? '' : '[ opacity-3 ]'; ?>">
										<a href="<?php echo the_permalink(); ?>?lang=en">
											<img class="[ svg icon icon--small ]" src="<?php echo THEMEPATH; ?>images/english.svg" alt="English">
										</a>
									</div>
									<div class="[ columna xmall-4 ][ js-open-search ]" data-element="menu-options">
										<img class="[ svg icon icon--small ]" src="<?php echo THEMEPATH; ?>images/search.svg" alt="search">
									</div>
									<form class="[ form--search ][ columna xmall-12 ]" method="get" action="<?php echo site_url(); ?>">
										<div class="[ input-group ]">
											<input class="[ sb-search-input ][ xmall-12 ]" placeholder="¿Qué deseas buscar?" type="text" name="s" id="s">
											<span class="[ input-group-addon ]">
												<button class="[ sb-search-submit ][ bg-light ]" type="submit" name="submit">
													<img class="[ svg icon icon--small ][ secondary ]" src="<?php echo THEMEPATH; ?>images/search.svg" alt="search">
												</button>
											</span>
										</div>
									</form>
								</div><!-- menu-options -->
							</div>
						</nav><!-- categorias -->
					</div><!-- modal-content -->
				</div>
			</section>
			<footer class="[ diagonal-dark-blue-to-light-blue ]">
				<div class="[ wrapper ][ padding--top padding--bottom ]">
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
						<div class="[ columna xmall-12 small-6 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ][ uppercase ][ margin-bottom ]">
								<?php echo isset( $_GET['lang'] ) ? "contact" : 'contacto'; ?>
							</h4>
							<address class="[ margin-bottom ]">
								<?php echo $address; ?>
							</address>
							<p>
								Tel. <?php echo $telefono ?>
							</p>
						</div>
						<div class="[ columna xmall-12 small-6 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ][ uppercase ][ margin-bottom ]">
								<?php echo isset( $_GET['lang'] ) ? "Point of sale" : 'De venta en'; ?>:
							</h4>
							<?php
							$pos_args = array(
								'post_type' 		=> 'puntos-venta',
								'posts_per_page' 	=> 3,
							);
							$query_pos = new WP_Query( $pos_args );
							if ( $query_pos->have_posts() ) : while ( $query_pos->have_posts() ) : $query_pos->the_post();
								$pos_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb' );
								$pos_link = get_post_meta( $post->ID, '_pos_link_meta', true );
								echo '<a href="' . $pos_link . '" target="_blank"><img class="[ icon icon--large ][ light ][ margin-bottom--small ]" src="' . $pos_img_url[0] . '" alt="' . $post->post_title . '"></a>';
								
							endwhile; endif; wp_reset_query();
							?>
						</div>
						<div class="[ clear--small ]"></div>
						<div class="[ columna xmall-12 small-6 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ][ uppercase ][ margin-bottom ]">
								<?php echo isset( $_GET['lang'] ) ? "follow us" : 'síguenos'; ?>
							</h4>
							<p class="[ margin-bottom--small ]">
								<a class="[ light ]" href="<?php echo $facebook ?>" target="_blank">
									<img class="[ svg icon icon--small ][ light ]" src="<?php echo THEMEPATH; ?>images/facebook.svg" alt="facebook"> /PMI
								</a>
							</p>
							<p>
								<a class="[ light ]" href="<?php echo $twitter ?>" target="_blank">
									<img class="[ svg icon icon--small ][ light ]" src="<?php echo THEMEPATH; ?>images/twitter.svg" alt="twitter"> @pmi
								</a>
							</p>
						</div>
						<div class="[ columna xmall-12 small-6 medium-3 ][ margin-bottom ]">
							<h4 class="[ light ][ uppercase ][ margin-bottom ]">newsletter</h4>
							<form class="[ form ][ js-form-newsletter ]" action="">
								<input class="[ margin-bottom--small ][ xmall-12 ][ required email ]" type="email" placeholder="<?php echo isset( $_GET['lang'] ) ? "email" : 'correo electrónico'; ?>"><br />
								<button class="[ button button--secondary ]" type="submit" >
									<?php echo isset( $_GET['lang'] ) ? "subscribe me" : 'suscribirme'; ?>
								</button>
							</form>
						</div>
					</div><!-- row -->
					<p class="[ text-center ]">
						<a class="[ light ]" href="#">
							<?php echo isset( $_GET['lang'] ) ? "Privacy Policy" : 'Aviso de privacidad'; ?>
						</a>
					</p>
					<hr class="[ light-separator ]">
					<div class="[ row ]">
						<div class="[ columna xmall-12 ]">
							<h4 class="[ light ][ text-center ][ uppercase ]">
								<?php echo isset( $_GET['lang'] ) ? "Brands" : 'Proveedores'; ?>
							</h4>
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
									$brand_url = get_post_meta( $post->ID, '_link_meta', true );
									echo '<p class="[ inline-block align-middle ][ no-margin padding--small ]"> <a href="' . $brand_url . '"> ' . get_the_title() . '</a></p>';
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


