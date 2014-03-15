<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Robotics Documentation Program</title>
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
		<h1>Robotics Documentation</h1>
	</div>
	<nav>
	<ul>
		<li><a href="./index.php">Input</a></li>
		<li><a class="active" href="./generate-file.php">View</a></li>
		<li><a href="./help.php">Help</a></li>
	</ul>
	</nav>

	<?php
	require_once('php/md/MarkdownInterface.php');
	require_once('php/md/Markdown.php');
	$document = $_GET['document'];
	$output = $_GET['output'];
	$teamnumber = $_GET['teamnumber'];
	if ( ($document == 'engineering' || $document == 'team' || $document == 'strategy') && ($teamnumber == '4262' || $teamnumber == '4373') )
	{
		if ($output === 'pdf')
		{
			echo "<h2>To-Do Generate " . $document . " as " . $output . ".</h2>";
		}
		else
		{
			echo (Markdown::defaultTransform(file_get_contents('/home/thosegrapefruits/Web/robotics-documentation/documentation/' . $teamnumber . '/' . $document . '.md' )));
		}
	}
	else
	{
		echo '<form enctype="multipart/form-data" method="GET" name="Form" action="generate-file.php" onsubmit="generateDocument()">';
		
		echo '<h3>Team Number</h3>';
		echo '<input type="radio" name="teamnumber" value="4262" checked id="4262"><label for="4262">4262</label> <input type="radio" name="teamnumber" value="4373" id="4373"><label for="4373">4373</label>';
		
		echo '<h3>Document</h3>';
		echo '<input type="radio" name="document" value="engineering" checked id="engineering">';
		echo '<label for="engineering">Engineering</label><br>';
		echo '<input type="radio" name="document" value="team" id="team"></input>';
		echo '<label for="team">Team & Outreach</label><br>';
		echo '<input type="radio" name="document" value="strategy" id="strategy"></input>';
		echo '<label for="strategy">Business Plan / Strategy / Sustainability Plan</label><br>';
		
		echo '<h3>Format</h3>';
		echo '<input type="radio" name="output" value="html" checked id="html">';
		echo '<label for="html">HTML</label><br>';
		echo '<input type="radio" name="output" value="pdf" id="pdf"></input>';
		echo '<label for="pdf">PDF</label><br><br>';
		echo '<input type="submit" value="View File" />';
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
