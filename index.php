<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Robotics Documentation Program</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="style.css">
<!--[if IE]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>
<script type="text/javascript">
	function validateForm()
	{
		if ( validateName()
		&& validateDate()
		&& validateDocumentation()
		&& validateTeam()
		&& validateCategory() )
		{
			return true;
		}
		else
		{
			alert("Please fill in all required forms fully.");
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
		var teamnumber=document.forms["Form"]["teamnumber"].isSelected();
		if (teamnumber == null || teamnumber == "")
		{
			return false;
		}
		return true;
	}
	function validateCategory()
	{
		var category = document.forms["Form"]["category"].isSelected();
		if (category == null || category == "")
		{
			return false;
		}
		return true;
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
		<li><a class="active" href="./index.php">Input</a></li>
		<li><a href="./generate-file.php">View</a></li>
		<li><a href="./help.php">Help</a></li>
	</ul>
	</nav>
	<div id="mainbody">
		<form enctype="multipart/form-data" method="POST" name="Form" action="process-input.php" onsubmit="return validateForm()">
			<br>
			<h3>Information</h3>
			<table>
				<tr>
					<td>Team Number</td>
					<td>
						<input type="radio" name="teamnumber" value="4262" checked id="4262"><label for="4262">4262</label> <input type="radio" name="teamnumber" value="4373" id="4373"><label for="4373">4373</label>
					</td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" autofocus name="name" placeholder="Your Name"></td>
				</tr>
				<tr>
					<td>Date</td>
					<td><input type="date" name="date"></td>
				</tr>
			</table>
			<br>
			<h3>Documentation <a style="help" title="Formatting help and other information." href="help.php?topic=documentation">?</a></h3>
			<b>Section:</b><br><input type="radio" name="category" value="engineering" checked id="engineering"></input>
			<label for="engineering">Engineering</label><br>
			<input type="radio" name="category" value="team" id="team">
			<label for="team">Team & Outreach</label><br>
			<input type="radio" name="category" value="strategy" id="strategy">
			<label for="strategy">Business Plan / Strategy / Sustainability Plan</label><br><br>
			<textarea id="flex" name="documentation" maxlength="10000" rows="16"></textarea>
			<br>
			<h3>Upload Images</h3>
			<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
			<input type="file" name="images[]" accept="image/*" multiple>
			<br>
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
