<?php 

require ("entities/SkateEntity.php");

//contains database related code for the coffee page
class SkateModel
{
	//Get all coffee types from the database andtrturn them in an array
	function GetSkateBrands()
	{
		require 'credentials.php';

		//open connetion and select database

		mysql_connect($host,$user,$passwd) or die(mysql_error());
		mysql_select_db($database);
		$result = mysql_query("SELECT DISTINCT brand FROM skate") or die(mysql_error());
		$brands = array();

		//Get data from database
		while($row = mysql_fetch_array($result))
		{
			array_push($brands, $row[0]);
		}

		//close connection and return result
		mysql_close();
		return $brands;
	}

	//get skateEntity objects from the database and return them in an array
	function GetSkateByBrand($brand)
	{
		require 'credentials.php';

		//open connection and select database
		mysql_connect($host, $user, $passwd) or die(mysql_error());
		mysql_select_db($database);

		$query = "SELECT * FROM skate WHERE brand LIKE '$brand'";
		$result = mysql_query($query) or die(mysql_error());
		$skateArray = array();

		//get data from database
		while ($row = mysql_fetch_array($result)) 
		{
				$brand = $row[1];
				$deck = $row[2];
				$pros = $row[3];
				$cons = $row[4];
				$price = $row[5];
				$image = $row[6];
				$description = $row[7];

				//create skate objects and store them in an array
				$skate = new SkateEntity(-1, $brand, $deck, $pros, $cons, $price, $image, $description);
				array_push($skateArray, $skate);

		}
				//close connection and return result
				mysql_close();
				return $skateArray;

	}
}




?>