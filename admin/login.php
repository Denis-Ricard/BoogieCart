<?php

/**
 * Administration login page
 * @author Denis Ricard
 * @copyright 2011
 */

require_once('resources/templateFunctions.php');

$session = new Session;

// LOGIN REDIRECTION
if($session->is_logged_in()) {
    header("Location: index.php");
}

// LOGIN USER AND CREATE ADMIN SESSION
if(isset($_POST['admin_user'])) {

    $username = trim($_POST['admin_user']);
    $password = trim($_POST['admin_pass']);

    $found_user = User::authenticate($username, $password);

    if($found_user) {
        $session->login($found_user);
        header("Location: index.php");
    } else {
        $message = "User name / Password combination incorrect.";
    }
}

    // Must pass in variables (as an array) to use in template
    $variables = array();

    renderLayout("login.php", $variables);