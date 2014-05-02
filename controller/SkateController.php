<?php 
require("model/skatemodel.php");

class SkateController
{
	function CreateSkateDropdownList()
	{
		$skateModel = new SkateModel();
		$result = "<form action = '' method='post' width='200px'>
					Please select a brand:
					<select name = 'brands'>
						<option value = '%' >All</option>
						".$this->CreateOptionValues($skateModel->GetSkateBrands()).
					"</select>
					<input type = 'submit' value = 'Search'/>
					</form>";

					return $result;
	}

	function CreateOptionValues(array $valueArray)
	{
		$result = "";

		foreach ($valueArray as $value) 
		{
			$result = $result . "<option value = '$value'>$value</option>";
		}

		return $result;
	}

	function CreateSkateTables($brands)
	{
		$skateModel = new SkateModel();
		$skateArray = $skateModel->GetSkateByBrand($brands);
		$result = "";

		//generate a skateTable for each skateEntity in array
		foreach ($skateArray as $key => $skate) 
		{
			$result = $result . 

				"<table class = 'skateTable'>
					<tr>
						<th rowspan='6' width = '150px'><img runat = 'server' src = '$skate->image' /></th>
						<th>Brand: </th>
						<td>$skate->brand</td>
					</tr>
					<tr>
						<th>Deck: </th>
						<td>$skate->deck</td>
					</tr>
					<tr>
						<th>Price: </th>
						<td>$skate->price</td>
					</tr>
					<tr>
						<th>Pros: </th>
						<td>$skate->pros</td>
					</tr>
					<tr>
						<th>Cons: </th>
						<td>$skate->cons</td>
					</tr>
					<tr>
						<th>Description: </th>
						<td colspan='2'>$skate->description</td>
					</tr>

				</table>";
		}	

		return $result;
	}

	function GetImages()
	{
		//select folder to scan
		$handle = opendir("img");

		//read al files and store names in array 
		while ($image = readdir($handle)) 
		{
			$images[] = $image;
		}

		closedir($handle);

		//exclude all filenames where filelength < 3
		$imageArray = array();
		foreach ($images as $image) 
		{
			if(strlen($image) > 2)
			{
				array_push($imageArray, $image);
			}
		}
	//create <select><option> Values and return result
		$result = $this->CreateOptionValues($imageArray);
		return $result;
	}


	//<editor-fold desc="Set Methods">
	function InsertSkate()
	{
		$deck = $_POST["txtDeck"];
		$brands = $_POST["ddlBrands"];
		$price = $_POST["txtPrice"];
		$pros = $_POST["txtPros"];
		$cons = $_POST["txtCons"];
		$image = $_POST["ddlImage"];
		$description = $_POST["txtDescription"];

		$skate = new SkateEntity(-1, $brands, $deck, $pros, $cons, $price, $image, $description);
		$skateModel = new SkateModel();
		$skateModel->InsertSkate($skate);

		// $id, $brand, $deck, $pros, $cons, $price, $image, $description

		// -1 is used when data is considered to be 'dummy data'
	}

	function UpdateSkate($id)
	{

	}

	function DeleteSkate($id)
	{

	}
	//</editor-fold>

	//<editor-fold desc="Get Methods">
	function GetSkateById($id)
	{
		$skateModel = new SkateModel();
		return $skateModel->GetSkateById($id);
	}

	function GetSkateByBrand($brand)
	{
		$skateModel = new SkateModel();
		return $skateModel->GetSkateByBrand($brand);
	}

	function GetSkateBrands()
	{
		$skateModel = new SkateModel();
		return $skateModel->GetSkateBrands();
	}
	//</editor-fold>
}









?>