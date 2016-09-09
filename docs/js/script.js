$(function(){

	if( $('.skin-collapsible').length ) {
		$('.skin-collapsible').skinCollapsible();
	}

	if( $('.skinSwitch').length ) {
		$('.skinSwitch').skinSwitch();
	}

	if( $('#references-collapse').length ) {
		$('#references-collapse').click(function(e){
			e.preventDefault();
			if( $(this).hasClass('references-collapse-open') ) {
				$(this).removeClass('references-collapse-open');
				$(this).parent().next('ul.skin-references').removeClass('references-collapse-open')
			}else{
				$(this).addClass('references-collapse-open');
				$(this).parent().next('ul.skin-references').addClass('references-collapse-open');
		}
		});
	}

	if( $('.tooltip-link').length ) {
		$('.tooltip-link').tooltipster({
			theme: 'tooltipster-shadow',
			delay: 100,
			maxWidth: 280,
			side: 'bottom',
			trigger: 'click',
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
				console.log(helper.event.type);
				var $origin = $(helper.origin);
				// we set a variable so the data is only loaded once via Ajax, not every time the tooltip opens
				if ($origin.data('loaded') !== true) {

					//Generate templated data
					var title = $origin.data('tooltip-field-title');
					var content = $origin.data('tooltip-field-content');

					// call the 'content' method to update the content of our tooltip with the returned data
					instance.content($('<span class="tooltip-content-title">'+title+'</span><span class="tooltip-content-text">'+content+'</span>'));
					// to remember that the data has been loaded
					$origin.data('loaded', true);
				}
			}
		});
	}

	$('.header-menu-icon').click(function(){
		$(this).parent('ul').toggleClass('responsive-menu');
	});

});