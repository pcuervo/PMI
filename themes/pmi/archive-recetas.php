<?php
	get_header();
?>
	<!-- PRODUCTS -->
	<section class="[]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ columna xmall-12 medium-8 ][ center ][ margin-bottom ]">
					<h2 class="[ text-center ][ margin-bottom ]">Recetas</h2>
					<p>Aquí va el texto de recetas...</p>
				</div>

				<div class="[ columna xmall-12 medium-8 ][ center ][ margin-bottom ][ filtros ]">
					<h3>Marcas</h3>
					<div class="[ margin-bottom ][ filtro-marcas ]">
						<button class="button" data-filter="">Todas</button>
						<?php
						$args = array(
							'orderby'		=> 'name',
							'hide_empty'	=> true,
							);
						$brands = get_terms( 'marcas', $args );

						foreach( $brands as $brand ) {
							echo '<button class="[ button ]" data-filter=".' . $brand->slug . '">' . $brand->name . '</button>';
						}
						?>
					</div>

					<h3>Tipo de comida</h3>
					<div class="[ margin-bottom ][ filtro-tipo-comida ]">
						<button class="button" data-filter="">Todas</button>
						<?php

						$tipos_comida = get_terms( 'tipos-comida' );
						foreach( $tipos_comida as $tipo ) {
							echo '<button class="button" data-filter=".' . $tipo->slug . '">' . $tipo->name . '</button>';
						}
						?>
					</div>

					<h3>Porciones</h3>
					<div class="[ margin-bottom ][ filtro-porciones ]">
						<button class="button" data-filter="">Todas</button>
						<?php

						$porciones = get_terms( 'porciones-recetas' );
						foreach( $porciones as $porcion ) {
							echo '<button class="button" data-filter=".' . $porcion->slug . '">' . $porcion->name . '</button>';
						}
						?>
					</div>

					<h3>Tipo de producto</h3>
					<div class="[ margin-bottom ][ filtro-tipo-producto ]">
						<button class="button" data-filter="">Todos</button>
						<?php

						$tipos_producto = get_terms( 'tipo-producto' );
						foreach( $tipos_producto as $tipo ) {
							echo '<button class="button" data-filter=".' . $tipo->slug . '">' . $tipo->name . '</button>';
						}
						?>
					</div>
				</div><!-- filtros -->

				<div>
					<?php
					if ( have_posts()) : while ( have_posts() ) : the_post();
						$recipe_filter_info = get_recipe_filter_info( $post->ID );
						$recipe_filter_classes = '';
						foreach ( $recipe_filter_info as $key => $value ) {
							$recipe_filter_classes .= $value . ' ';
						}
					?>
						<div class="[ post ][ columna xmall-6 medium-4 large-3 ][ margin-bottom--large ][ <?php echo $recipe_filter_classes; ?>]">
							<div class="[ drop-shadow ]">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium', array( 'class' => '[ image-responsive ] [ margin-bottom ]' ) ); ?>
								</a>
								<div class="[ padding--small ][ bg-primary ]">
									<p class="[ post-title ]"><?php the_title() ?></p>
								</div>
							</div>
						</div>
					<?php endwhile; endif; ?>
				</div>
			</div><!-- row -->
		</div><!-- wrapper -->
	</section><!-- PRODUCTS -->

<?php
	get_footer();
?>