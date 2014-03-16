<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Robotics Documentation Program</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<!--[if IE]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>
	<?php
	$document = $_GET['document'];
	$output = $_GET['output'];
	$teamnumber = $_GET['teamnumber'];
	if ( ($document == 'engineering' || $document == 'team' || $document == 'strategy') && ($teamnumber == '4262' || $teamnumber == '4373') )
	{
		echo generateFile($document, $output, $teamnumber);
	}
	else
	{
		?>
		<link rel="stylesheet" href="style.css">
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
		<form enctype="multipart/form-data" method="GET" name="Form" action="generate-file.php">
			<h3>Team Number</h3>
			<input type="radio" name="teamnumber" value="4262" checked id="4262"><label for="4262">4262</label> <input type="radio" name="teamnumber" value="4373" id="4373"><label for="4373">4373</label>
			<h3>Document</h3>
			<input type="radio" name="document" value="engineering" checked id="engineering">
			<label for="engineering">Engineering</label><br>
			<input type="radio" name="document" value="team" id="team"></input>
			<label for="team">Team & Outreach</label><br>
			<input type="radio" name="document" value="strategy" id="strategy"></input>
			<label for="strategy">Business Plan / Strategy / Sustainability Plan</label><br>
			<h3>Format</h3>
			<input type="radio" name="output" value="html" checked id="html">
			<label for="html">HTML</label><br>
			<input type="radio" name="output" value="pdf" id="pdf"></input>
			<label for="pdf">PDF</label><br><br>
			<input type="submit" value="View File" />
		</form>
		<footer>
			<h6>Made by <a href="http://loganmoore.me">Logan Moore</a>.</h2>
		</footer>
		</div>
		<?
	}
	
	function generateFile($document, $output, $teamnumber)
	{
		?>
		<link rel="stylesheet" href="./print.css">
		</head>
		<body class="php"> <?
		if ($output === 'pdf')
		{
			return "<h2>To-Do Generate " . $document . " as " . $output . ".</h2>";
		}
		else
		{
			include 'php/Parsedown.php';
			$parsedown = new Parsedown();
			$basepath = 'documentation/' . $teamnumber . '/' . $document;
			// return file_get_contents($basepath . '.md' );
			$data = $parsedown->parse(file_get_contents($basepath . '.md' ));
			return $data . '<script src="/js/prettify/run_prettify.js?skin=sons-of-obsidian"></script>';
			file_put_contents($path . '.html', $data, LOCK_EX);
		}
	}	?>

<script type="text/javascript" src="/js/retina.js"></script>
<script src="/js/prettify/run_prettify.js?skin=sons-of-obsidian"></script>
</body>
</html>