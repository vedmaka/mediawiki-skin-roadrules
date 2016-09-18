<?php

class RoadrulesTemplate extends BaseTemplate {

	public function execute() {
		
		// Output HTML Page
		$this->html( 'headelement' );
		?>
		<!-- header -->
		<?php $this->printHeader(); ?>
		<!-- /header -->
		<!-- admin panel -->
		<?php $this->printPanel(); ?>
		<!-- /admin panel -->
		
		<div id="content" class="mw-body" role="main">
        <a id="top"></a>
        <div class="container">

            <h1 id="firstHeading" class="firstHeading">Ontario Automobile Policy</h1>

            <div id="bodyContent" class="mw-body-content">
		
			<!-- markup goes here -->
			
			</div>
		</div>
		
		<!-- footer -->
		<?php $this->printFooter(); ?>
		<!-- /footer -->
			
		<?php $this->printTrail(); ?>
		</body>
		</html>
		<?php

	}
	
	private function printFooter() {
		?>
		<footer>
	        <div class="container clearfix">
	            <!--<a href="#" class="logo">
	                <img src="img/logo_bottom.png" />
	            </a>-->
	            <ul class="footer-menu">
	                <li>
	                    <a href="#">insurance policy</a>
	                </li>
	                <li>
	                    <a href="#">fault rules</a>
	                </li>
	                <li>
	                    <a href="#">tow-by-laws</a>
	                </li>
	                <li>
	                    <a href="#">entire laws</a>
	                </li>
	                <li>
	                    <a href="#">claim map</a>
	                </li>
	                <li>
	                    <a href="#">claim start</a>
	                </li>
	                <li>
	                    <a href="#">rates down</a>
	                </li>
	            </ul>
	        </div>
	    </footer>
		<?php
	}
	
	private function printPanel() {
		?>
		<div id="actions-panel">
	        <div class="container clearfix">
	            <ul>
	                <li>
	                    <a href="#">
	                        Edit
	                    </a>
	                </li>
	                <li>
	                    <a href="#">
	                        View History
	                    </a>
	                </li>
	                <li>
	                    <a href="#">
	                        Delete
	                    </a>
	                </li>
	                <li>
	                    <a href="#">
	                        Move
	                    </a>
	                </li>
	                <li>
	                    <a href="#">
	                        Change Protection
	                    </a>
	                </li>
	            </ul>
	            <ul class="user-menu">
	                <li>
	                    Logged in as <b>Admin</b>
	                </li>
	                <li>
	                    <a href="#">
	                        Logout
	                    </a>
	                </li>
	            </ul>
	        </div>
	    </div>
		<?php
	}
	
	private function printHeader() {
		?>
		<header>
	        <div class="container clearfix">
	            <a href="#" class="logo">
	                <img src="<?php echo $this->getSkin()->getSkinStylePath('assets/img/logo.png'); ?>" />
	            </a>
	            <ul class="header-menu">
	                <li>
	                    <a href="#">insurance policy</a>
	                </li>
	                <li>
	                    <a href="#">fault rules</a>
	                </li>
	                <li>
	                    <a href="#">tow-by-laws</a>
	                </li>
	                <li>
	                    <a href="#">entire laws</a>
	                </li>
	                <li>
	                    <a href="#">claim map</a>
	                </li>
	                <li>
	                    <a href="#">claim start</a>
	                </li>
	                <li>
	                    <a href="#">rates down</a>
	                </li>
	                <li class="header-menu-icon">
	                    &#9776;
	                </li>
	            </ul>
	        </div>
	    </header>
		<?php
	}

}