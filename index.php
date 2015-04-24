<?php
ob_start();
session_start();
require_once("core/classes/game.class.php");
require_once("core/functions.php");
require_once("includes/header.php");



/**
 * Loading the right page
 */
$page = (!isset($_GET['page']) ? 'index' : $_GET['page']);

if (isset($_SESSION['color'])) {
    $page = 'game';
}

include("includes/pages/$page.php");












require_once("includes/footer.php");



ob_flush();
?>




