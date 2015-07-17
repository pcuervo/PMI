var $=jQuery.noConflict();

/*------------------------------------*\
	#FUNCTIONS
\*------------------------------------*/

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

