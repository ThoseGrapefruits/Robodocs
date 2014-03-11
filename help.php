<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo ucfirst($_GET["topic"]) . ' Help'; ?></title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../style.css">
<!--[if IE]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>
</head>
<body class="php">
<div id="container">
	<div id="main" role="main" class="hellobox roboticsbox">
		<h1><?php echo ucfirst($_GET["topic"]) . ' Help'; ?></h1>
	</div>
	<nav>
	<ul>
		<li><a href="../index.php">Home</a></li>
		<li><a href="../about-me.php">About Me</a></li>
	</ul>
	</nav>

	<?php
	if ($_GET["topic"] == "documentation")
	{
		echo "<h3>Markdown</h3>";
		echo "<p>This form is using Markdown syntax for formatting. This means that any valid Markdown formatting will show in the final product, as will any valid HTML syntax.</p>";
		
		echo "<h3>Images</h3>";
		echo "<ul><li>I recommend resizing images before uploading them. They don't need to be more than 1000 pixels on the long side, and anything larger makes the file upload and document printing both slower.</li>";
		echo "<li>Images will be included at the end of the post.</li>";
		echo "</ul>";
	}
	?>

	<footer>
	<h6>Made by <a href="http://loganmoore.me">Logan Moore</a>.</h2>
	</footer>
</div>
<script type="text/javascript" src="/js/retina.js"></script>
<script src="/js/prettify/run_prettify.js?skin=sons-of-obsidian"></script>
</body>
</html>