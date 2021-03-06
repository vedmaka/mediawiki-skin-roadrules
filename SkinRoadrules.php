<?php

class SkinRoadrules extends SkinTemplate {

	public $skinname = 'roadrules';
	public $stylename = 'Roadrules';
	public $template = 'RoadrulesTemplate';

	/**
	 * Initializes output page and sets up skin-specific parameters
	 * @param OutputPage $out Object to initialize
	 */
	public function initPage( OutputPage $out ) {
		parent::initPage( $out );
		$out->addModules( array( 'skins.roadrules.js' ) );
		// Add viewport
		$out->addHeadItem('viewport', '<meta name="viewport" content="width=device-width, initial-scale=1.0">');
		// Add Google Fonts
		$out->addHeadItem('font', '<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">');
	}

	/**
	 * Loads skin and user CSS files.
	 * @param OutputPage $out
	 */
	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );

		$styles = array( /*'mediawiki.skinning.interface',*/ 'skins.roadrules.styles' );
		$out->addModuleStyles( $styles );
	}

	/**
	 * Override to pass our Config instance to it
	 */
	//public function setupTemplate( $classname, $repository = false, $cache_dir = false ) {
	//	return new $classname();
	//}

}