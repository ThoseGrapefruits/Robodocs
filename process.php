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

require_once('recaptchalib.php');
$privatekey = "6LdDx-8SAAAAALi2H0pxp2BNco6y7_pJqoasFCYo";
$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

if (!$resp->is_valid)
{   // cAPTCHA was not valid.
    die ("<h2>The reCAPTCHA wasn't entered correctly. Go back and try it again.<br>(reCAPTCHA said: " . $resp->error . ")</h2>");
}
else
{   // cAPTCHA was valid.
    if(isset($_POST['name']) && isset($_POST['date']))
    {   // User input was given and complete.
        $data = "##" . $_POST['date'] . "\n" . "> " . $_POST['name'] . "\n\n"
                . ;
        $ret = file_put_contents('documentation' . $_POST['teamnumber'] . '.md', $data, FILE_APPEND | LOCK_EX);
        if($ret === false)
        {
            die('<h2>There was an error writing this file.</h2>');
        }
        else
        {
            // File could be written to.
            
            echo "<h2>Documentation submitted successfully!</h2>";
            // TODO option to generate HTML & PDF from MarkDown
        }
    }
    else
    {
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