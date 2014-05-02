<?php 

require 'controller/SkateController.php';
$skateContoller = new SkateController();

if(isset($_POST['brands']))
{
	//fill page with skate decks of selected brands
	$skateTables = $skateContoller->CreateSkateTables($_POST['brands']);
}
else
{
	//page is loaded for the first time, no type selected
	$skateTables = $skateContoller->CreateSkateTables('%');
}

$title = 'Skate Overview';
$content = $skateContoller->CreateSkateDropdownList() . $skateTables;

include 'template.php';


?>