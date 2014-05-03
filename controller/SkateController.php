<script type="text/javascript">
//display a confirmation box when trying to delete an object

function showConfirm(id)
{
	//build the confirmation box
	var c = confirm("Are you sure you want to delete this item?");

	//if true, delete item and refresh
	if(c)
		window.location = "skateoverview.php?delete="+id;
}
</script>

<?php 
require("model/skatemodel.php");

class SkateController
{
	function CreateOverviewTable()
	{
		$result = "
			<table class='overViewTable'>
				<tr>
					<td></td>
					<td></td>
					<td><b>Id</b></td>
					<td><b>Brand</b></td>
					<td><b>Deck</b></td>
					<td><b>Pros</b></td>
					<td><b>Cons</b></td>
					<td><b>Description</b></td>
				</tr>";

			$skateArray = $this->GetSkateByBrand('%'); // percentage sign returns all from mysql

			foreach ($skateArray as $key => $value) 
			{
				$result = $result .
					"<tr>
						<td><a href='skateadd.php?update=$value->id'>Update</a></td>
						<td><a href='#' onclick='showConfirm($value->id)'>Delete</a></td>
						<td>$value->id</td>
						<td>$value->brand</td>
						<td>$value->deck</td>
						<td>$value->pros</td>
						<td>$value->cons</td>
						<td>$value->description</td>
					</tr>";
			}

			$result = $result . "</table>";
			return $result;
	}

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

		// $id, $brand, $deck, $pros, $cons, $price, $image, $description MUST BE INSERTED IN THIS ORDER!!

		// -1 is used when data is considered to be 'dummy data'
	}

	function UpdateSkate($id)
	{
		$deck = $_POST["txtDeck"];
		$brands = $_POST["ddlBrands"];
		$price = $_POST["txtPrice"];
		$pros = $_POST["txtPros"];
		$cons = $_POST["txtCons"];
		$image = $_POST["ddlImage"];
		$description = $_POST["txtDescription"];

		$skate = new SkateEntity($id, $brands, $deck, $pros, $cons, $price, $image, $description);	
		$skateModel = new SkateModel();
		$skateModel->UpdateSkate($id, $skate);
	}

	function DeleteSkate($id)
	{
		$skateModel = new SkateModel();
		$skateModel->DeleteSkate($id);

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