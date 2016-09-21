;(function ( $, window, document, undefined ) {

	// Create the defaults once
	var pluginName = "skinCollapsible",
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

			$(this.element).find('li > .collapsible-title').click( this.onClick.bind(this) );

		},

		onClick: function( event ) {
			event.preventDefault();
			var $item = $(event.target).parent(); // li element
			if( $item.hasClass('collapsible-open') ) {
				this.closeItem( $item );
			}else{
				this.openItem( $item );
			}
		},

		closeItem: function( item ) {
			item.removeClass('collapsible-open');
		},

		openItem: function( item ) {
			item.addClass('collapsible-open');
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