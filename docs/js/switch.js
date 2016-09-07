;(function ( $, window, document, undefined ) {

	// Create the defaults once
	var pluginName = "skinSwitch",
		defaults = {
			propertyName: "value"
		};

	// The actual plugin constructor
	function Plugin( element, options ) {
		this.element = element;

		// jQuery has an extend method that merges the
		// contents of two or more objects, storing the
		// result in the first object. The first object
		// is generally empty because we don't want to alter
		// the default options for future instances of the plugin
		this.options = $.extend( {}, defaults, options) ;

		this._defaults = defaults;
		this._name = pluginName;

		this.init();
	}

	Plugin.prototype = {

		init: function() {

			$(this.element).find('.sub-heading-title-text').click( this.onClick.bind(this) );
			$(this.element).find('ul.sub-heading-menu').bind('mouseleave', this.onMouseOut.bind(this) );

		},

		onClick: function(e) {
			e.preventDefault();

			if( $(this.element).hasClass('switch-open') ) {
				this.closeSwitch();
			}else{
				this.openSwitch();
			}

		},

		onMouseOut: function(e) {
			if( $(this.element).hasClass('switch-open') ) {
				this.closeSwitch();
			}
		},

		closeSwitch: function() {
			$(this.element).removeClass('switch-open');
		},

		openSwitch: function() {
			$(this.element).addClass('switch-open');
		}

	};

	// A really lightweight plugin wrapper around the constructor,
	// preventing against multiple instantiations
	$.fn[pluginName] = function ( options ) {
		return this.each(function () {
			if (!$.data(this, "plugin_" + pluginName)) {
				$.data(this, "plugin_" + pluginName,
					new Plugin( this, options ));
			}
		});
	};

})( jQuery, window, document );