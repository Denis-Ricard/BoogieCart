<?php
        //Admin bootstrap file
        
	require_once realpath(dirname(__FILE__) . "/../../resources/config.php");

	//Overwrite some paths for admin files
	define("ADMIN_RESOURCES", ROOT . 'admin/resources/');
	define("ADMIN_LAYOUT", ADMIN_RESOURCES . 'layout/');    
	define("ADMIN_PAGES", ADMIN_RESOURCES . 'pages/');   
	define("ADMIN_CLASSES", ADMIN_RESOURCES . 'classes/');   
	define("ADMIN_WIDGETS", ADMIN_RESOURCES . 'widgets/');
	
	// Session manager with logout button
	if(PAGE_NAME != "login.php") {
		
		$session = new Session;

		// Log out admin user
		if ( @$_GET['logout'] == 1 ) {
			
			$session->logout();
			header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
			
		}
		
		if ( !$session->is_logged_in() )
		{
		   // Authentified as admin
		   header('Location: login.php');
		
		} else {
			
		  //User is loaded -> then create a logout button
		  $logout = '<a href="'.$_SERVER['PHP_SELF'].'?logout=1">logout</a>';
		  
		}
	}
	
	function renderLayout($contentFile, $variables = array())
	{
		$contentFileFullPath = ADMIN_PAGES.$contentFile;
	
		// making sure passed in variables are in scope of the template
		// each key in the $variables array will become a variable
		if (count($variables) > 0) {
		    foreach ($variables as $key => $value) {
			if (strlen($key) > 0) {
			    ${$key} = $value;
			}
		    }
		}
		
		// Header
		require_once ADMIN_LAYOUT . "header.php";
		
		// Main
		if (file_exists($contentFileFullPath)) {
		    
		    require_once $contentFileFullPath;
		    
		} else {
		    
		    require_once ADMIN_PAGES . "error.php";
		    
		}
	
		// Footer
		require_once ADMIN_LAYOUT . "footer.php";
	}
