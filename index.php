<?php
ob_start();

require_once("includes/header.php");


/**
 * Loading the right page
 */
$page = (!isset($_GET['page']) ? 'index' : $_GET['page']);
include("includes/pages/$page.php");













require_once("includes/footer.php");



ob_flush();
?>




