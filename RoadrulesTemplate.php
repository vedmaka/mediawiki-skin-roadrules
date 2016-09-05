<?php

class RoadrulesTemplate extends BaseTemplate {

	public function execute() {

		// Output HTML Page
		$this->html( 'headelement' );
		?>
		<!-- markup goes here -->
		<?php $this->printTrail(); ?>
		</body>
		</html>
		<?

	}

	//TODO: skin methods

}