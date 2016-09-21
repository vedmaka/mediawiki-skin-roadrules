$(function(){

	$('sup.reference').each(function( i, reference ){

		var referenceName;
		var referenceItem;
		var target = reference;

		// Find reference name by querying internal anchor
		referenceName = $(reference).find('a').attr('href').replace('#', '');

		// Find rendered reference item at bottom of the page
		referenceItem = $('ol.references li#' +referenceName);

		// Override ref link with regular link
		if( $(reference).parent().prev('.ref-clone-link').length ) {
			target = $(reference).parent().prev('.ref-clone-link');
			target.click(function(){
				$(reference).find('a').click();
				window.location.hash = referenceName;
			});
			target.attr('id', $(reference).attr('id'));
			$(reference).removeAttr('id');
		}

		// Initialize tooltipster on reference anchor
		// TODO: remove duplication
		$(target).tooltipster({
			theme: 'tooltipster-shadow',
			delay: 100,
			maxWidth: 280,
			side: 'bottom',
			trigger: 'custom',
			interactive: true,
			triggerOpen: {
				mouseenter: true,
				tap: true
			},
			triggerClose: {
				mouseleave: true,
				tap: true,
				touchleave: true
			},
			functionPosition: function(instance, helper, position) {

				if( helper.geo.available.window.right.width >= position.size.width ) {
					position.coord.top += 0;
					position.coord.left += position.size.width/2 - 15; //TODO: is it right way here? lets see and get back to it later
				}

				return position;
			},
			content: 'Loading..',
			// 'instance' is basically the tooltip. More details in the "Object-oriented Tooltipster" section.
			functionBefore: function(instance, helper) {
				var $origin = $(helper.origin);
				// we set a variable so the data is only loaded once via Ajax, not every time the tooltip opens
				if ($origin.data('loaded') !== true) {

					//Generate templated data
					var title = referenceItem.find('.reference-title').length ? referenceItem.find('.reference-title').html() : "Reference";
					var content = referenceItem.find('.reference-text').html().replace(/<span class="reference-title">(.*)<\/span> &nbsp;/, '');

					// call the 'content' method to update the content of our tooltip with the returned data
					instance.content($('<span class="tooltip-content-title">'+title+'</span><span class="tooltip-content-text">'+content+'</span>'));
					// to remember that the data has been loaded
					$origin.data('loaded', true);
				}
			}
		});


	});

});