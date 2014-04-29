<?php
$realm = 'Restricted area';

$users = json_decode(file_get_contents("pw",0,null,null), true);

if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
	header('HTTP/1.1 401 Unauthorized');
	header('WWW-Authenticate: Digest realm="'.$realm.
		   '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');

	die('No Account Information Given');
}

// Analyze the PHP_AUTH_DIGEST variable
$data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST']);
if (!$data || !isset($users[$data['username']]))
{
	header('HTTP/1.1 401 Unauthorized');
	header('WWW-Authenticate: Digest realm="' . $realm . '",qop="auth",nonce="' . uniqid() . '",opaque="' . md5($realm) . '"');
}

// Generate valid response
$A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'] . ':' . $data['uri']);
$valid_response = md5($A1 . ':' . $data['nonce'] . ':' . $data['nc'] . ':' . $data['cnonce'] . ':' . $data['qop'] . ':' . $A2);

if ($data['response'] != $valid_response)
{
	die('Invalid login information.');
}

// Valid username & password
?>
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
	function validateForm()
	{
	$valid = true;
		var newPassword = document.forms["Form"]["newPassword"].value;
		if ( newPassword == '' || newPassword == null )
		{
			document.getElementById("newPasswordAlert").innerHTML = "Please input a new password.";
			valid = false;
		}
		else
		{
			document.getElementById("newPasswordAlert").innerHTML = "";
		}
		var currentPassword = document.forms["Form"]["currentwPassword"].value;
		if ( currentPassword == '' || currentPassword == null )
		{
			document.getElementById("currentPasswordAlert").innerHTML = "Please input your current password.";
			$valid = false;
		}
		else
		{
			document.getElementById("currentPasswordAlert").innerHTML = "";
		}
		return $valid;
	}
</script>
</head>

<body class="php">
<div id="container">
	<div id="main" role="main" class="hellobox roboticsbox">
		<h1>Admin Page</h1>
	</div>
	<nav>
	<ul>
		<li><a href="./index.php">Input</a></li>
		<li><a href="./generate-file.php">View</a></li>
		<li><a href="./help.php">Help</a></li>
	</ul>
	</nav>
<div class="mainbody">
	<div class="loginstatus"><?echo 'You are logged in as <b>' . $data['username'] . '</b>';?></div>
	<h4>Change Password</h4>
	<form enctype="multipart/form-data" method="POST" name="Form" action="process-input.php" onsubmit="return validateForm();">
		<input type="text" id="currentPassword" name="currentPassword" placeholder="Current Password"><label id="currentPasswordAlert" class="alert" for="currentPassword"></label>
		<input type="text" id="newPassword" name="newPassword" placeholder="New Password"><label id="newPasswordAlert" class="alert" for="newPassword"></label>
	</form>
</div>
<?
// function to parse the http auth header
function http_digest_parse($txt)
{
	// protect against missing data
	$needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
	$data = array();
	$keys = implode('|', array_keys($needed_parts));

	preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

	foreach ($matches as $m) {
		$data[$m[1]] = $m[3] ? $m[3] : $m[4];
		unset($needed_parts[$m[1]]);
	}

	return $needed_parts ? false : $data;
}
?>