<?php

/**
 * @author Denis Ricard
 * @copyright 2011
 *
 * Page de configuration de l'application
 *
 * Principales valeurs à  éditer:
 * - Définir le charset (ligne 18)
 * - Définir l'adresse du site (ligne 29)
 * - Connecter la base de données (ligne 67)
 * - Définir la langue par défaut (ligne 124)
 */

// DISPLAY ALL ERRORS
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

/**
  * Décide du Charset utilisé dans tout le site
  *
  */
header("Content-Type: text/html; charset=iso-8859-1");

/**
  * Constante de chemins (paths) et des URL
  * ex. require_once(CLASS_PATH . "class.php")
  *
  */
  // Adresse principale
 defined("MAIN_URL")
     or define("MAIN_URL", "http://" . $_SERVER["HTTP_HOST"].dirname($_SERVER['SCRIPT_NAME']) . "/");

  // Nom de la page web
 defined("PAGE_NAME")
     or define("PAGE_NAME", basename($_SERVER['PHP_SELF']));

  // URL complète de la page
 defined("URL")
     or define("URL", MAIN_URL.PAGE_NAME);

  // Chemin absolu du Root
 defined("ROOT")
     or define("ROOT", $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR . 'boogiestrat' . DIRECTORY_SEPARATOR);

 // Chemin absolu vers les resources
 defined("RESOURCES")
 or define("RESOURCES", ROOT . 'resources' . DIRECTORY_SEPARATOR);

  // Chemin absolu vers les librairies
 defined("LIBRARY")
     or define("LIBRARY", RESOURCES . 'library' . DIRECTORY_SEPARATOR);

  // Chemin absolu vers les pages du layout (header, footer, etc.)
 defined("LAYOUT")
     or define("LAYOUT", RESOURCES . 'layout' . DIRECTORY_SEPARATOR);

  // Chemin absolu vers les pages de contenu
 defined("PAGES")
     or define("PAGES", RESOURCES . 'pages' . DIRECTORY_SEPARATOR);

  //Chemin absolu vers les classes
 defined("CLASSES")
     or define("CLASSES", LIBRARY . 'classes' . DIRECTORY_SEPARATOR);

  //Chemin absolu vers les widgets
 defined("WIDGETS")
     or define("WIDGETS", RESOURCES . 'widgets' . DIRECTORY_SEPARATOR);


/**
  * Information de connection à  la base de données
  *
  */
defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER') ? null : define("DB_USER", "denisric_cart");
defined('DB_PASS') ? null : define("DB_PASS", "cart01");
defined('DB_NAME') ? null : define("DB_NAME", "denisric_cart");


/**
  * Inclusion de la classe de connection à la base de donnéees
  *
  */
require_once(CLASSES . 'lib' . DIRECTORY_SEPARATOR . 'sql.php');


/**
  * Inclusion automatique de la classe nécessaire
  *
  */
function loadClass ($classe)
{
	require CLASSES . $classe . '.php';
}

spl_autoload_register ('loadClass');


/**
  * Variables de session user
  *
  */
if(!isset($_SESSION['user'])) {

	if(@$_COOKIE['user']!="") {
		$_SESSION['user'] = $_COOKIE['user'];
	} else {
		$_SESSION['user'] = 'public';
	}

}


/**
  * Variables de langage
  *
  */
if(isset($_SESSION['lang']) && $_SESSION['lang'] !='') {

	defined("LANG")
     or define("LANG", $_SESSION['lang']);

} else {

	if(isset($_COOKIE['lang'])) {
		$_SESSION['lang'] = $_COOKIE['lang'];
	} else {
		// langage par défaut
		$_SESSION['lang'] = 'en';
	}

	defined("LANG")
     or define("LANG", $_SESSION['lang']);

}

switch (LANG) {

// ENGLISH
			case 'en':
                include_once(LIBRARY . 'lang' . DIRECTORY_SEPARATOR . 'en' . DIRECTORY_SEPARATOR . 'en.php');
			break;

// FRANÇAIS
			case 'fr':
                include_once(LIBRARY . 'lang' . DIRECTORY_SEPARATOR . 'fr' . DIRECTORY_SEPARATOR . 'fr.php');
			break;

}
