<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id='wrapper'>
		<div id='banner'>


		</div>

		<nav id='navigation'>
			<ul id='nav'>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="skate.php">Skate Decks</a></li>
				<li><a href="management.php">Management</a></li>
			</ul>
		</nav>

		<div id='content_area'>
			<?php echo $content ?>
		</div>

		<div id='sidebar'>
			<img src="img/pictureofskating.jpg">
		</div>

		<footer>
			<p>All rights reserved &#174</p>
			<p><?php echo date("Y"); ?></p>
		</footer>

	</div>

</body>
</html>