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
}









?>