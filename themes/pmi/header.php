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
				<div class="[ wrapper ]">
					<div class="[ row ][ padding--top--small padding--bottom--small ]">

						<div class="[ xmall-6 large-1 ][ inline-block align-middle ]">
							<div class="[ logo ]">
								<a href="<?php echo site_url() ?>">
									<img alt="Inicio PMI" src="<?php echo THEMEPATH ?>images/logo.png" class="[ image-responsive ]">
								</a>
							</div>
						</div><div class="[ xmall-6 ][ hidden--large-inline ][ inline-block align-middle ]">
							<a class="[ block ][ button--hollow ][ pull-right ][ diagonal-green-to-blue-gradient ][ js-modal-opener ]" data-modal="nav" href="#">
								<span class="[ block ][ bg-light ]">
									<img class="[ image-responsive ][ svg icon ][ square--button ][ padding--small ][ secondary ]" src="<?php echo THEMEPATH; ?>images/hamburger.svg" alt="menu">
								</span>
							</a>
						</div>

						<nav class="[ shown--large--inline ][ large-11 ][ clearfix ][ menu-container ][ inline-block align-middle ]">
							<a class="<?php echo ( 'Nosotros' == get_the_title() ) ? '[ active ]' : '[ active--light ]' ?>[ shown--medium--inline middle ][ inline-block align-middle ][ button button--menu ][ pull-right ]" href="<?php echo site_url( 'nosotros') ?>">
								Nosotros
							</a>
							<a class="<?php echo ( 'Productos' == get_the_title() ) ? '[ active ]' : '' ?>[ shown--medium--inline align-middle ][ button button--menu ][ pull-right ]" href="<?php echo site_url( 'productos' ) ?>">
								Productos
							</a>
							<a class="<?php echo ( 'Servicios' == get_the_title() ) ? '[ active ]' : '' ?>[ shown--medium--inline align-middle ][ button button--menu ][ pull-right ]" href="<?php echo site_url('servicios') ?>">
								Servicios
							</a>
							<a class="<?php echo ( 'Contacto' == get_the_title() ) ? '[ active ]' : '' ?>[ shown--medium--inline align-middle ][ button button--menu ][ pull-right ]" href="<?php echo site_url('contacto') ?>">
								Contacto
							</a>
						</nav>
					</div>
				</div>
			</header>
			<div class="[ main ]">