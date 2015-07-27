<!doctype html>
	<head>
		<meta charset="utf-8">
		<title><?php print_title(); ?></title>

		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-60x60.png" />
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-152x152.png" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>images/favicon/favicon-196x196.png" sizes="196x196" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>images/favicon/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>images/favicon/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>images/favicon/favicon-16x16.png" sizes="16x16" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>images/favicon/favicon-128.png" sizes="128x128" />
		<meta name="application-name" content="&nbsp;"/>
		<meta name="msapplication-TileColor" content="#FFFFFF" />
		<meta name="msapplication-TileImage" content="<?php echo THEMEPATH; ?>images/favicon/mstile-144x144.png" />
		<meta name="msapplication-square70x70logo" content="<?php echo THEMEPATH; ?>images/favicon/mstile-70x70.png" />
		<meta name="msapplication-square150x150logo" content="<?php echo THEMEPATH; ?>images/favicon/mstile-150x150.png" />
		<meta name="msapplication-wide310x150logo" content="<?php echo THEMEPATH; ?>images/favicon/mstile-310x150.png" />
		<meta name="msapplication-square310x310logo" content="<?php echo THEMEPATH; ?>images/favicon/mstile-310x310.png" />

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="cleartype" content="on">
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<script src="//use.typekit.net/nso1tmf.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>
		<?php wp_head(); ?>
	</head>

	<body>
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
		<div class="[ container ]">
			<header class="[  ]">
				<div class="[ hidden--large ]">
					<div class="[ wrapper ]">
						<div class="[ row ][ padding--top--small padding--bottom--small ]">
							<div class="[ xmall-6 large-1 ][ inline-block align-middle ]">
								<div class="[ logo ]">
									<a href="<?php echo site_url() ?>">
										<img alt="Inicio PMI" src="<?php echo THEMEPATH ?>images/logo.png" class="[ image-responsive ]">
									</a>
								</div>
							</div><div class="[ xmall-6 ][ inline-block align-middle ]">
								<a class="[ block ][ button--hollow ][ pull-right ][ diagonal-green-to-blue-gradient ][ js-modal-opener ]" data-modal="nav" href="#">
									<span class="[ block ][ bg-light ][ no-padding ]">
										<img class="[ image-responsive ][ svg icon ][ square--button ][ padding--small ][ secondary ]" src="<?php echo THEMEPATH; ?>images/hamburger.svg" alt="menu">
									</span>
								</a>
							</div>
						</div><!-- row -->
					</div><!-- wrapper -->
				</div><!-- hidden-large -->

				<div class="[ shown--large ]">
					<div class="[ header-top ][ diagonal-dark-blue-to-light-blue ][ relative z-index-1 ]">
						<div class="[ wrapper ][ relative ]">
							<a class="[ block ][ padding--small ][ bg-light ][ logo ][ center ]" href="<?php echo site_url() ?>">
								<img class="[ image-responsive ]" alt="Inicio PMI" src="<?php echo THEMEPATH ?>images/logo.png">
							</a>
							<div class="[ menu-options ][ hide ]">
								<div class="[ columna xmall-4 ] <?php echo isset( $_GET['lang'] ) ? '[ opacity-3 ]' : ''; ?>">
									<a href="<?php echo site_url(); ?>">
										<img class="[ svg icon icon--small ]" src="<?php echo THEMEPATH; ?>images/spanish.svg" alt="spanish">
									</a>
								</div>
								<div class="[ columna xmall-4 ]<?php echo isset( $_GET['lang'] ) ? '' : '[ opacity-3 ]'; ?>">
									<a href="<?php echo site_url(); ?>?lang=en">
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
						</div><!-- wrapper -->
					</div><!-- header-top -->
					<div class="[ header-bottom ]">
						<div class="[ wrapper ][ relative ]">
							<nav class="[ menu-container ][ padding--small ]">
								<a class="[ xmall-3 ][ inline-block align-middle ][ imago ]" href="<?php echo site_url() ?>">
									<img class="" alt="Inicio PMI" src="<?php echo THEMEPATH ?>images/imago.png">
								</a><a
								class="<?php echo ( 'Nosotros' == get_the_title() ) ? '[ active ]' : '[ active--light ]' ?>[ xmall-2 ][ inline-block align-middle ][ button button--menu ]" href="<?php echo site_url( 'nosotros') ?>">
									Nosotros
								</a><a
								class="<?php echo ( 'productos' == get_post_type() ) ? '[ active ]' : '' ?>[ xmall-2 ][ inline-block align-middle ][ button button--menu ]" href="<?php echo site_url( 'productos' ) ?>">
									Productos
								</a><span class="[ xmall-4 inline-block align-middle ][ spacer ]">&nbsp;</span><a
								class="<?php echo ( 'Servicios' == get_the_title() ) ? '[ active ]' : '' ?>[ xmall-2 ][ inline-block align-middle ][ button button--menu ]" href="<?php echo site_url('servicios') ?>">
									Servicios
								</a><a
								class="<?php echo ( 'Contacto' == get_the_title() ) ? '[ active ]' : '' ?>[ xmall-2 ][ inline-block align-middle ][ button button--menu ]" href="<?php echo site_url('contacto') ?>">
									Contacto
								</a>
								<div class="[ menu-options ][ hide ]">
									<div class="[ columna xmall-4 ]">
										<img class="[ svg icon icon--small ]" src="<?php echo THEMEPATH; ?>images/spanish.svg" alt="spanish">
									</div>
									<div class="[ columna xmall-4 ][ opacity-3 ]">
										<img class="[ svg icon icon--small ]" src="<?php echo THEMEPATH; ?>images/english.svg" alt="English">
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
							</nav>
						</div><!-- wrapper -->
					</div><!-- header-botom -->
				</div><!-- shown--large -->
			</header>
			<div class="[ main ]">