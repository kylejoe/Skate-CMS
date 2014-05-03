<?php 

require './controller/SkateController.php';

$title = "Manage skate objects";
$SkateController = new SkateController();

$content = $SkateController->CreateOverviewTable();

if(isset($_GET["delete"])) 
{
	$SkateController->DeleteSkate($_GET["delete"]);
}

include './template.php';
?>