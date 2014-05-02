<?php 
require './controller/SkateController.php';
$SkateController = new SkateController();


$title = "Add a new Skateboard";

$content = "

<form action='' method='post'>
	<fieldset>
		<legend>Add a new Skateboard</legend>
		<label for='deck'>Deck: </label>
		<input type='text' class='inputField' name='txtDeck' /><br/>

		<label for='brands'>Brands: </label>
		<select class='inputField' name='ddlBrands'>
			<option value='%'>All</option>"
		.$SkateController->CreateOptionValues($SkateController->GetSkateBrands()).

		"</select><br/>

		<label for='price'>Price: </label>
		<input type='text' class='inputField' name='txtPrice' /><br/>

		<label for='pros'>Pros: </label>
		<input type='text' class='inputField' name='txtPros' /><br/>

		<label for='cons'>Cons: </label>
		<input type='text' class='inputField' name='txtCons' /><br/>

		<label for='image'>Image: </label>
		<select class='inputField' name='ddlImage'>"
		.$SkateController->GetImages().


		"</select><br/>

		<label for='description'>Description: </label>
		<textarea cols='70' rows='12' name='txtDescription'></textarea>

		<input type='submit' value='Submit'>
	</fieldset>
</form>";


//checks if any value has ben assigned to txtDeck
//check every variable
if(isset($_POST["txtDeck"]))
{
	$SkateController->InsertSkate();
}

include 'template.php';


?>


