<?php

/**
 * @author Denis Ricard
 * @copyright 2011
 */

    require_once("resources/templateFunctions.php");

    // Must pass in variables (as an array) to use in template
    $catalog = new Catalog();
    $products = $catalog->productList();
    $variables = array(
    		'products' => $products,
    		);

    renderLayout("index.php", $variables);

