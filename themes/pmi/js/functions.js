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
	$(container).isotope({
		itemSelector: item,
		layoutMode: 'fitRows'
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

	// $(container).isotope({
	// 	itemSelector: item,
	// 	layoutMode: 'fitRows'
	// });

	// store filter for each group
	var filters = {};

	$('.filtros').on( 'click', '.button', function() {
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
			$buttonGroup.find('.is-checked').removeClass('is-checked');
			$( this ).addClass('is-checked');
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

	var data = $('.contacto form').serialize();
	console.log(data);
	$.post(
		ajax_url,
		data,
		function( response ){
			console.log(response);
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