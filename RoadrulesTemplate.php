<?php

class RoadrulesTemplate extends BaseTemplate {
	
	var $user;

	public function execute() {
		
		global $wgRoadrulesSkinPanelAdminOnly;
		
		$this->user = $this->getSkin()->getUser();
		
		// Output HTML Page
		$this->html( 'headelement' );
		?>
		<!-- header -->
		<?php $this->printHeader(); ?>
		<!-- /header -->
		
		<?php if( $wgRoadrulesSkinPanelAdminOnly && ( !$this->user->isAnon && in_array('sysop', $this->user->getGroups())) ): ?>
		<!-- admin panel -->
		<?php $this->printPanel(); ?>
		<!-- /admin panel -->
		<?php endif; ?>
		
		<div id="mw-page-base" class="noprint"></div>
		<div id="mw-head-base" class="noprint"></div>
		
		<div id="content" class="mw-body clearfix" role="main">
        <a id="top"></a>
            <div class="container">

                <?php
                // Loose comparison with '!=' is intentional, to catch null and false too, but not '0'
                if ( $this->data['title'] != '' ) {
                ?>
                <h1 id="firstHeading" class="firstHeading" lang="<?php $this->text( 'pageLanguage' ); ?>"><?php
                     $this->html( 'title' )
                ?></h1>
                <?php
                } ?>
                <?php $this->html( 'prebodyhtml' ) ?>
                <div id="bodyContent" class="mw-body-content">

                <!-- markup goes here -->
                <?php
                    $this->html( 'bodycontent' );
                ?>

                <?php if ( $this->data['dataAfterContent'] ) {
                    $this->html( 'dataAfterContent' );
                } ?>

                <?php $this->html( 'debughtml' ); ?>
                </div>
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
	                <?php foreach($this->getMenuLinks('footer') as $link): ?>
	                <li>
	                    <a href="<?php echo $link['href'] ?>"><?php echo $link['text'] ?></a>
	                </li>
	                <?php endforeach; ?>
	            </ul>
	        </div>
	    </footer>
		<?php
	}
	
	private function printPanel() {
		$nav = $this->data['content_navigation'];
		$user = $this->data['personal_urls'];
		echo "<!-- ".print_r($nav,1)." -->";
		?>
		<div id="actions-panel">
	        <div class="container clearfix">
	            <ul>
	            	<?php foreach($nav as $link_type): ?>
	            	<?php foreach($link_type as $key => $link): ?>
	            	<?php if(in_array($key, array('main','template','special','view','talk','template_talk'))) { ?>
	            	<?php continue; } ?>
	                <li>
	                    <a href="<?php echo $link['href']?>" id="action-<?php echo $key?>">
	                        <?php echo $link['text'] ?>
	                    </a>
	                </li>
	                <?php endforeach; ?>
	                <?php endforeach; ?>
	            </ul>
	            <ul class="user-menu">
	            	<?php if($this->user->isLoggedIn()): ?>
	            	<li>
	                    Logged in as <b><?php echo $this->user->getName() ?></b>
	                </li>
	                <li>
	                	<a href="<?php echo $user['logout']['href']?>">
	                		Logout
	                	</a>
	                </li>
	                <!-- remove all other user actions for now
	                <?php endif; ?>
	            	<?php foreach($user as $key => $link): ?>
	            	<?php if(in_array($key, array('userpage'))) { ?>
	            	<?php continue; } ?>
	                <li>
	                	<a href="<?php echo $link['href']?>">
	                		<?php echo $link['text'] ?>
	                	</a>
	                </li>
	                <?php endforeach; ?>
	                -->
	            </ul>
	        </div>
	    </div>
		<?php
	}
	
	private function printHeader() {
		?>
		<header>
	        <div class="container clearfix">
	            <a href="<?php echo Title::newMainPage()->getFullUrl() ?>" class="logo">
	                <img src="<?php echo $this->getSkin()->getSkinStylePath('assets/img/logo.png'); ?>" />
	            </a>
	            <ul class="header-menu">
	            	<?php foreach($this->getMenuLinks('header') as $link): ?>
	                <li>
	                    <a href="<?php echo $link['href'] ?>"><?php echo $link['text'] ?></a>
	                </li>
	                <?php endforeach; ?>
	                <li class="header-menu-icon">
	                    &#9776;
	                </li>
	            </ul>
	        </div>
	    </header>
		<?php
	}
	
	private function getMenuLinks( $menuName )
	{
		$sidebar = $this->data['sidebar'];
		if( !array_key_exists($menuName, $sidebar) ) {
			return array();
		}
		return $sidebar[$menuName];
	}

}