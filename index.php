<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Web Development :: Assignment 1" />
		<meta name="keywords" content="web, development, assignment, 1" />
		<link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
		<title>Assignment 1</title>
	</head>
	<body>
		<header>
			<!--header logo-->
			<img src="images/logo.png" alt="Logo"/>
		</header>
		<h1>
			<!--header text-->
			<img src="images/header.png" alt="Status Posting System"/>
		</h1>
		<article>
			<p>
				<!--information needed for index page-->
				<?php
				echo "<div class='textstyle'><p>Name: Bailee Devey <br>
				Student ID: 14868633 <br>
				Email: <a href=\"mailto:tds1944@aut.ac.nz\">tds1944@aut.ac.nz</a></p></div>";
	
				echo "<div class='textstyle'><p>I declare that this assignment is my individual work. I have not worked collaboratively nor have I copied from any other student's work or from any other source.</p></div>"
				?>
			</p>
		</article>
		<nav>
			<!--navigation-->
			<dl>
				<dt><a href="index.php"><abbr title="Home">Home</abbr></a></dt>
				<dt><a href="poststatusform.php"><abbr title="Post a New Status">Post Status</abbr></a></dt>
				<dt><a href="searchstatusform.php"><abbr title="Search Status">Search Status</abbr></a></dt>
				<dt><a href="about.php"><abbr title="About this Assignment">About</abbr></a></dt>
			</dl>
		</nav>
	</body>
</html>	