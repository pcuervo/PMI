<?php

/*------------------------------------*\
	CONSTANTS
\*------------------------------------*/



	/**
	* Define paths to javascript, styles, theme and site.
	**/
	define( 'JSPATH', get_template_directory_uri() . '/js/' );
	define( 'CSSPATH', get_template_directory_uri() . '/css/' );
	define( 'THEMEPATH', get_template_directory_uri() . '/' );
	define( 'SITEURL', site_url('/') );





/*------------------------------------*\
	INCLUDES
\*------------------------------------*/



	require_once('inc/post-types.php');
	require_once('inc/metaboxes.php');
	require_once('inc/taxonomies.php');
	require_once('inc/pages.php');
	require_once('inc/users.php');
	require_once('inc/functions-admin.php');
	require_once('inc/functions-js-footer.php');





/*------------------------------------*\
	GENERAL FUNCTIONS
\*------------------------------------*/



	/**
	* Enqueue frontend scripts and styles
	**/
	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'functions', JSPATH.'functions.js', array('plugins'), '1.0', true );

		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );
		wp_localize_script( 'functions', 'site_url', site_url() );
		wp_localize_script( 'functions', 'theme_url', THEMEPATH );


		// styles
		wp_enqueue_style( 'styles', get_stylesheet_uri() );

	});

	/**
	* Add javascript to the footer of pages.
	**/
	add_action( 'wp_footer', 'footer_scripts', 21 );





/*------------------------------------*\
	HELPER FUNCTIONS
\*------------------------------------*/



	/**
	 * Print the title tag based on what is being viewed.
	 * @return string
	 */
	function print_title(){
		global $page, $paged;

		wp_title( '|', true, 'right' );
		bloginfo( 'name' );

		// Add a page number if necessary
		if ( $paged >= 2 || $page >= 2 ){
			echo ' | ' . sprintf( __( 'Página %s' ), max( $paged, $page ) );
		}
	}// print_title

	/**
	 * Return the name of a month in Spanish.
	 * @param string $month - Number of month
	 * @return string $month_name - The name of month in Spanish
	 */
	function get_month_name( $month ){

		switch ( $month ) {
			case 1:
				return 'enero';
			case 2:
				return 'febrero';
			case 3:
				return 'marzo';
			case 4:
				return 'abril';
			case 5:
				return 'mayo';
			case 6:
				return 'junio';
			case 7:
				return 'julio';
			case 8:
				return 'agosto';
			case 9:
				return 'septiembre';
			case 10:
				return 'octubre';
			case 11:
				return 'noviembre';
			default:
				return 'diciembre';
		}// switch

	}// get_month_name

	/**
	 * Send contact email to Sunland School.
	 * @param string $name - Name of person requesting more info
	 * @param string $email - Email of person requesting more info
	 * @param string $tel - Telephone numbre of person requesting more info
	 * @param string $section - Website section from where the form was sent
	 * @param string $to_email - Email to where the info has to be sent
	 */
	function send_email_contacto($name, $email, $tel, $msg, $section, $to_email ){

		$to = $to_email;
		$subject = 'Informes acerca de: ' . $section;
		$headers = 'From: My Name <' . $to_email . '>' . "\r\n";
		$message = '<html><body>';
		$message .= '<h3>Contacto a través de www.sunland.mx</h3>';
		$message .= '<p>Nombre: '.$name.'</p>';
		$message .= '<p>Email: '. $email . '</p>';
		if( $tel != '' ) $message .= '<p>Teléfono: '. $tel . '</p>';
		if( $msg != '' ) $message .= '<p>Mensaje: '. $msg . '</p>';
		$message .= '</body></html>';

		add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));
		wp_mail($to, $subject, $message, $headers );

	}// send_email_contacto	





/*------------------------------------*\
	FORMAT FUNCTIONS
\*------------------------------------*/





/*------------------------------------*\
	SET/GET FUNCTIONS
\*------------------------------------*/





/*------------------------------------*\
	AJAX FUNCTIONS
\*------------------------------------*/











