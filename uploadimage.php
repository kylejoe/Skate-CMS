<?php 
$title = "Upload new image";

$content = '
	<form action="" method="post" enctype="multipart/form-data">
		<label for="file">Filename: </label>
		<input type="file" name="file" id="file"/><br/>
		<input type="Submit" name="submit" value="submit">	
	</form>';

 //check if filetype is a valid format


	if (isset($_POST["submit"])) 
	{
	$fileType = $_FILES["file"]["type"];

		if (($fileType == "image/gif") ||
			($fileType == "image/jpeg") ||
			($fileType == "image/jpg") ||
			($fileType == "image/png"))
		{
			//check if files exists
			if (file_exists("img/" . $_FILES["file"]['name']))
			{
				echo "File already exists";
			}
			else
			{
				move_uploaded_file($_FILES["file"]["tmp_name"], "img/" . $_FILES["file"]["name"]);
				echo "Upload in " . "img/" . $_FILES["file"]["name"];
			}
		}
		
	}

include './template.php';

?>


