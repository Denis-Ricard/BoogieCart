<?php

/**
 * Administration home page
 * @author Denis Ricard
 * @copyright 2011
 */

require_once('resources/templateFunctions.php');

// Must pass in variables (as an array) to use in template
$variables = array(
    'logout' => @$logout,
    );

renderLayout("index.php", $variables);