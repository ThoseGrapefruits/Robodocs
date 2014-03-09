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
	<div id="main" role="main" class="hellobox">
		<h1><?php echo 'Robotics Documentation'; ?></h1>
	</div>
	<nav>
	<ul>
	    <li><a href="../index.php">Home</a></li>
		<li><a href="../about-me.php">About Me</a></li>
	</ul>
	</nav>
	
	<div style="margin-left:auto;margin-right:auto;width:660px">
		<form method="post" action="process.php">
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
                    <td>Your Name</td>
                    <td><input type="text" autofocus name="name" placeholder="Name">*</td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td><input type="date" name="date">*</td>
                </tr>
            </table>
            <br>
            <h3>Documentation <a style="help" href="help.php?topic=documentation">?</a></h3>
            <textarea name="documentation" maxlength="10000" rows="16" cols="100"></textarea>
            <br>
            <h3>Upload Images</h3>
            <input type="file" accept="image/*"><br>
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
