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
		<header style="position:absolute"><a href="http://koding.com">Koding.com</a></header>
		<h1><?php echo 'Welcome'; ?></h1>
	</div>
	<nav>
	<ul>
		<li><a class="active" href="index.php">Home</a></li>
		<li><a href="about-me.php">About Me</a></li>
	</ul>
	</nav>

<?php
session_start();
require_once('php/recaptchalib.php');
$privatekey = "6LdDx-8SAAAAALi2H0pxp2BNco6y7_pJqoasFCYo";
$resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

if(!$resp->is_valid)
{	// Captcha was not valid.
	die ("<h2>The reCAPTCHA wasn't entered correctly. Go back and try it again.</h2>");
}
else
{	// Captcha was valid.
	if(isset($_POST['teamnumber']) && isset($_POST['name']) && isset($_POST['date']) && isset($_POST['documentation']) && isset($_POST['category']))
	{	// User input was given and complete.
		// Upload all of the image files
		$fileLocations = array();
		$count = 0;
		$time = time();
		foreach ($_FILES['images']['name'] as $filename) 
		{
			$target = './media/' . $time . "_" . $count;
			$fileLocations[] = $target;
			$temp = $target;
			$tmp = $_FILES['images']['tmp_name'][$count];
			$count = $count + 1;
			move_uploaded_file($tmp,$temp);
			$temp = '';
			$tmp = '';
		}
		$data = "##" . $_POST['date'] . "\n" . "> Author: " . $_POST['name'] . "\n\n". $_POST['documentation'] . "\n\n";
		$count = 1;
		foreach ($fileLocations as $file)
		{
			$data = $data . '![Image ' . $count . '](' . $file . ')';
			$count = $count + 1;
		}
		$path = '/home/thosegrapefruits/Web/robotics-documentation/documentation/' . $_POST['teamnumber'] . '/' . $_POST['category'] . '.md';
		$ret = file_put_contents($path, $data, FILE_APPEND | LOCK_EX);
		if($ret === false)
		{
			die('<h2>There was an error writing this file.</h2>');
		}
		else
		{
			// File could be written to.
			
			die("<h2>Documentation submitted successfully!</h2>");
			// TODO option to generate HTML & PDF from MarkDown
		}
	}
	else
	{	// User input was not valid
		die('<h2>Incomplete data given.</h2>');
	}
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