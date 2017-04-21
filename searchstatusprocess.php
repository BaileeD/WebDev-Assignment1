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
		<nav>
			<!--navigation-->
			<dl>
				<dt><a href="index.php"><abbr title="Home">Home</abbr></a></dt>
				<dt><a href="poststatusform.php"><abbr title="Post a New Status">Post Status</abbr></a></dt>
				<dt><a href="searchstatusform.php"><abbr title="Search Status">Search Status</abbr></a></dt>
				<dt><a href="about.php"><abbr title="About this Assignment">About</abbr></a></dt>
			</dl>
		</nav>
		<article>
			<!--Database connection using a separate file to get host, username, password, database and table.-->
			<?php
				require_once('../../conf/sqlinfo.inc.php');
				$conn = @mysqli_connect($sql_host, $sql_user, $sql_pass) or die ('Database connection failure');
				@mysqli_select_db($conn, $sql_db) or die ('Database not available');
				
				/*Getting information from the form via GET method.*/
				$status = $_GET['status'];

				/*Query the database to return rows where the form input matches all/part of the status in the status field*/
				$query = "select * from $sql_tble where status like '%$status%'";
				$result = mysqli_query($conn, $query);
				
				if(!$result) {
					echo "<p>Something is wrong with ",	$query, "</p>";
				} else {
					/*Print out the status code, status, who can view the status, the date it was posted and the permissions for the status*/
					echo "<h2>Status Information</h2>";
					while ($ans = mysqli_fetch_assoc($result)) {
						echo "<div class='textstyle'><p>Status: ".$ans["status"]."</p></div>";
						echo "<div class='textstyle'><p>Status Code: ".$ans["code"]."</p></div>";
						echo "<div class='textstyle'><p>Share: ".$ans["share"]."</p></div>";
						echo "<div class='textstyle'><p>Date Posted: ".$ans["date"]."</p></div>";
						echo "<div class='textstyle'><p>Permission: ".$ans["permission"]."</p></div><br>";
					}
				}
				
				/*Free the results of the querys and close the database connection.*/
				mysqli_free_result($result);
				mysqli_close($conn);
			?>
		</article>
	</body>
</html>	