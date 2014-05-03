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
				$id = $row[0];
				$brand = $row[1];
				$deck = $row[2];
				$pros = $row[3];
				$cons = $row[4];
				$price = $row[5];
				$image = $row[6];
				$description = $row[7];

				//create skate objects and store them in an array
				$skate = new SkateEntity($id, $brand, $deck, $pros, $cons, $price, $image, $description);
				array_push($skateArray, $skate);

		}
				//close connection and return result
				mysql_close();
				return $skateArray;

	}


	function GetSkateById($id)
	{
		require 'credentials.php';

		//open connection and select database
		mysql_connect($host, $user, $passwd) or die(mysql_error());
		mysql_select_db($database);

		$query = "SELECT * FROM skate WHERE id = $id";
		$result = mysql_query($query) or die(mysql_error());


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

				//create skate
				$skate = new SkateEntity($id, $brand, $deck, $pros, $cons, $price, $image, $description);

		}
				//close connection and return result
				mysql_close();
				return $skate;	
	}

	function InsertSkate(SkateEntity $skate)
	{
		$query = sprintf("INSERT INTO skate (brand, deck, pros, cons, price, image, description)
						VALUES('%s','%s','%s','%s','%s','%s','%s')",
		mysql_real_escape_string($skate->brand),
		mysql_real_escape_string($skate->deck),
		mysql_real_escape_string($skate->pros),
		mysql_real_escape_string($skate->cons),
		mysql_real_escape_string($skate->price),
		mysql_real_escape_string("img/" . $skate->image),
		mysql_real_escape_string($skate->description));
		$this->PerformQuery($query);
	}

	function UpdateSkate($id, SkateEntity $skate)
	{
		$query = sprintf("UPDATE skate
							SET brand = '%s', deck = '%s', pros = '%s', cons = '%s', 
							price = '%s', image = '%s', description = '%s' 
							WHERE id = $id",
		mysql_real_escape_string($skate->brand),
		mysql_real_escape_string($skate->deck),
		mysql_real_escape_string($skate->pros),
		mysql_real_escape_string($skate->cons),
		mysql_real_escape_string($skate->price),
		mysql_real_escape_string("img/" . $skate->image),
		mysql_real_escape_string($skate->description));
		
		$this->PerformQuery($query);
	}

	function DeleteSkate($id)
	{
		$query = "DELETE FROM skate WHERE id = $id";
		$this->PerformQuery($query);
	}

	function PerformQuery($query)
	{
		require ('credentials.php');
		mysql_connect($host, $user, $passwd) or die(mysql_error());
		mysql_select_db($database);

		//execute query and close connection
		mysql_query($query) or die(mysql_error());
		mysql_close();
	}
}




?>