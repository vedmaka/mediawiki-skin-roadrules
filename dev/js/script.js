$(function(){

	$('.skin-collapsible').skinCollapsible();
	$('.skinSwitch').skinSwitch();

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

});