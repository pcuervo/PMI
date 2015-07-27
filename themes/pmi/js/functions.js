var $=jQuery.noConflict();

/*------------------------------------*\
	#FUNCTIONS
\*------------------------------------*/

/**
 * Run Isotope plugin
 * @container element cointaining items
 * @item element inside the container
**/
function runIsotope(container, item){
	var $container = $(container);
	$container.imagesLoaded( function(){
		$container.isotope({
			itemSelector : item,
			layoutMode: 'fitRows'
		});
	});
}

/**
 * Run Validation plugin
 * @form to validate
**/
function runValidation(form){
	$(form).validate({
		submitHandler:function(){
			switch(form){
				case '.js-contacto':
					sendContactEmail();
					break;
				default:
					$(form).submit();
			}
		}
	});

}


/**
 * Filster in Isotope plugin
 * @container element cointaining items
 * @item element inside the container
**/
function filterIsotope(container, item){

	var $grid = $(container).isotope({
		itemSelector: item
	});

	// store filter for each group
	var filters = {};

	$('.filtros').on( 'click', '.button-group .button', function() {
		var $this = $(this);
		// get group key
		var $buttonGroup = $this.parents('.button-group');
		var filterGroup = $buttonGroup.attr('data-filter-group');
		// set filter for group
		filters[ filterGroup ] = $this.attr('data-filter');
		// combine filters
		var filterValue = concatValues( filters );
		// set filter for Isotope
		$grid.isotope({ filter: filterValue });
	});

	// change is-checked class on buttons
	$('.button-group').each( function( i, buttonGroup ) {
		var $buttonGroup = $( buttonGroup );
		$buttonGroup.on( 'click', 'button', function() {
			$buttonGroup.find('.active').removeClass('active');
			$( this ).addClass('active');
		});
	});
}

// flatten object by concatting values
function concatValues( obj ) {
	var value = '';
	for ( var prop in obj ) {
	value += obj[ prop ];
	}
	return value;
}


/**
 * Toggle action buttons
 */
 function toggleActionButtons(){
	var headerHeight = getHeaderHeight();
	var sy = getScrollY();
	if ( sy >= headerHeight ) {
		$('.action-buttons').addClass('opened');
	} else {
		$('.action-buttons').removeClass('opened');
	}
}// toggleActionButtons

/**
 * Toggle action buttons
 */
 function toggleHeader(){
	var headerHeight = getHeaderHeight();
	var sy = getScrollY();
	if ( sy >= 10 ) {
		$('header').addClass('fixed');
		$('.main').addClass('header-fixed');
	} else {
		$('header').removeClass('fixed');
		$('.main').removeClass('header-fixed');
	}
}// toggleHeader



/**
 * Opens Modal
 * @param element to be shown
**/
function openModal(element){
	$(element).removeClass('hide');
	$('body').css('overflow', 'hidden');
}//openModal

/**
 * Closes Modal
**/
function closeModal(){
	$('.modal-wrapper').addClass('hide');
	$('body').css('overflow', 'visible');
}//closeModal

/**
 * Toggles element
 * @param element to be shown
**/
function toggleElement(element){
	$(element).toggleClass('hide');
}//showElement

/**
 * Animates scroll to an element
 * @param element to scroll to
**/
function scrollToElement(element, offset, speed){
	console.log(speed);
	var position = $(element).offset().top;
	position = position - offset;
	$('html, body').animate({scrollTop: position}, speed);
}//scrollToElement


/**
 * Load Google Map
 * @param {String} lat
 * @param {String} lon
 * @param {String} address
 */





/*------------------------------------*\
	AJAX FUNCTIONS
\*------------------------------------*/

/**
 * Send email requesting more information.
 */
function sendContactEmail(){

	var data = $('.js-contacto').serialize();
	$.post(
		ajax_url,
		data,
		function( response ){
			// response = $.parseJSON(response);
			// console.log(response.error);
			// console.log(response);
		}
	);
}// sendContactEmail




/*------------------------------------*\

\*------------------------------------*/

function imgToSvg(){
	$('img.svg').each(function(){
		var $img = jQuery(this);
		var imgID = $img.attr('id');
		var imgClass = $img.attr('class');
		var imgURL = $img.attr('src');

		jQuery.get(imgURL, function(data) {
			// Get the SVG tag, ignore the rest
			var $svg = jQuery(data).find('svg');

			// Add replaced image's ID to the new SVG
			if(typeof imgID !== 'undefined') {
				$svg = $svg.attr('id', imgID);
			}
			// Add replaced image's classes to the new SVG
			if(typeof imgClass !== 'undefined') {
				$svg = $svg.attr('class', imgClass+' replaced-svg');
			}

			// Remove any invalid XML tags as per http://validator.w3.org
			$svg = $svg.removeAttr('xmlns:a');

			// Replace image with new SVG
			$img.replaceWith($svg);

		}, 'xml');

	});
} //imgToSvg


/*------------------------------------*\
	GET/SET FUNCTIONS
\*------------------------------------*/

/**
 * Get header's height
 */
function getHeaderHeight(){
	return $('header').height();
}// getHeaderHeight

/**
 * Get footer's height
 */
function getFooterHeight(){
	return $('footer').height();
}// getFooterHeight

/**
 * Get the scrolled pixels in Y axis
 */
function getScrollY() {
	return $(window).scrollTop();
}// getScrollY

/**
 * Set conainer's padding bottom
 */
function setContainerPaddingBottom(){
	var headerHeight = getHeaderHeight();
	var footerHeight = getFooterHeight();
	$('.main').css('padding-bottom', footerHeight + headerHeight);
}// setContainerPaddingBottom