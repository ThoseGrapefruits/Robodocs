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
<script type="text/javascript">
	this.fileNumber = 2;
	function validateForm()
	{
		if (validateName() && validateDate() && validateDocumentation() && validateTeam() /*TODO*/ )
		{
			return true;	
		}
		else
		{
			alert("Please fill in all required forms fully.")
			return false;
		}
	}
	function validateDate()
	{
		var date=document.forms["Form"]["date"].value;
		if (date == null || date == "")
		{
			return false;
		}
		return true;
	}
	function validateName()
	{
		var name=document.forms["Form"]["name"].value;
		if (name == null || name == "")
		{
			return false;
		}
		return true;
	}
	function validateDocumentation()
	{
		var documentation=document.forms["Form"]["documentation"].value;
		if (documentation == null || documentation == "")
		{
			return false;
		}
		return true;
	}
	function validateTeam()
	{
		var teamnumber=document.forms["Form"]["teamnumber"].value;
		if (teamnumber == null || teamnumber == "")
		{
			return false;
		}
		return true;
	}
	function addFile()
	{
		document.getElementById('fileInsert').insertAdjacentHTML('beforeend', '<li><input type="file" name="file'.concat(this.fileNumber, '" accept="image/*" ></li>'));
		this.fileNumber++;
	}
</script>
</head>
<body class="php">
<div id="container">
	<div id="main" role="main" class="hellobox roboticsbox">
		<h1>Robotics Documentation</h1>
	</div>
	<nav>
	<ul>
		<li><a href="../index.php">Home</a></li>
		<li><a href="../about-me.php">About Me</a></li>
	</ul>
	</nav>

	<div style="margin-left:auto;margin-right:auto;width:660px">
		<form method="post" name="Form" action="process.php" onsubmit="return validateForm()">
			<br>
			<h3>Information</h3>
			<table>
				<tr>
					<td>Team Number</td>
					<td>
						<input type="radio" name="teamnumber" value="4262" id="teamnumberradio">4262 <input type="radio" name="teamnumber" value="4373" id="teamnumberradio">4373
					</td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" autofocus name="name" placeholder="Your Name">*</td>
				</tr>
				<tr>
					<td>Date</td>
					<td><input type="date" name="date">*</td>
				</tr>
			</table>
			<br>
			<h3>Documentation <a style="help" href="help.php?topic=documentation">?</a></h3>
			<p>Insert images at specific points in the text with <code>%%1%%</code>, <code>%%2%%</code>, etc. with the image number indices. If no places are given, they will be added at the end of the current post.</p>
			<textarea name="documentation" maxlength="10000" rows="16" cols="100"></textarea>
			<br>
			<h3>Upload Images</h3>
			<ol id="fileInsert">
				<li><input type="file" name="file1" accept="image/*" ></li>
			</ol>
			<button type="button" onClick="addFile()">Add Image</button>
			<br>
			<h3>Captcha</h3>
			<?php
				require_once('recaptchalib.php');
				$publickey = "6LdDx-8SAAAAANxhMNRdnKzl9K75GFg1q4HwQv6l";
				echo recaptcha_get_html($publickey);
			?>
			<br>
			<input type=""
			<br><input type="submit" value="Submit"></div>
		</form>
	</div>
	
	<footer>
	<h6>Made by <a href="http://loganmoore.me">Logan Moore</a>.</h2>
	</footer>
</div>
<script type="text/javascript" src="/js/retina.js"></script>
<script src="/js/prettify/run_prettify.js?skin=sons-of-obsidian"></script>
</body>
</html>
