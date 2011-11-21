<?php
	require_once realpath(dirname(__FILE__) . "/config.php");

	function renderLayout($contentFile, $variables = array())
	{
		ob_start();
		$contentFileFullPath = PAGES.$contentFile;

		// making sure passed in variables are in scope of the template
		// each key in the $variables array will become a variable
		if (count($variables) > 0) {
			foreach ($variables as $key => $value) {
				if (strlen($key) > 0) {
					${$key} = $value;
				}
			}
		}

		require_once LAYOUT . "header.php";
		require_once LAYOUT . "leftPanel.php";

		echo '
		<!-- Main -->
		';

		if(@LAYOUT == '2-column') {

			echo '<div class="grid_9">';

		} else {

			echo '<div class="grid_5">';

		}

        echo '<div class="cell center_cell" id="main_center_cell">
        	';

		if (file_exists($contentFileFullPath)) {
			require_once $contentFileFullPath;
		} else {
			/*
				If the file isn't found the error can be handled in lots of ways.
				In this case we will just include an error template.
			*/
			require_once PAGES . "/error.php";
		}

		// close content div
		echo "\t</div>\n";
		echo "</div>\n";

		if(@LAYOUT != '2-column') {
			require_once LAYOUT . "/rightPanel.php";
		}


		echo '<div class="clear"></div>';

		require_once LAYOUT . "/footer.php";

		header('Content-Length: ' . ob_get_length());
		ob_end_flush();
	}
