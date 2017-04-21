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
				
				/*Getting information from the form via POST method. Also making sure more than one checkbox item can be included in the database.*/
				$code = $_POST['code'];
				$status = $_POST['status'];
				$share = $_POST['share'];
				$date = $_POST['date'];
				$like = $_POST['like'];
				$comment = $_POST['comment'];
				$allowshare = $_POST['allowshare'];
				if($like == null){
					if($comment == null){
						$permission = $allowshare;
					} else if($allowshare == null) {
						$permission = $comment;
					} else {
						$permission = $comment.", ".$allowshare;
					}
				} else if ($comment == null){
					if($allowshare == null){
						$permission = $like;
					} else {
						$permission = $like.", ".$allowshare;
					}
				} else if ($allowshare == null) {
						$permission = $like.", ".$comment;
				} else {
					$permission = $like.", ".$comment.", ".$allowshare;
				}
				
				/*Check whether the table exists and if not create a new table.*/
				$query = "select code from $sql_tble";
				$result = mysqli_query($conn, $query);
				if(empty($result)) {
					echo "<p>Table doesn't exist....creating table now</p>";
					$query = "use $sql_db";
					$result = mysqli_query($conn, $query);
					$query = "CREATE TABLE statusposts (
						code varchar(5) NOT NULL,
						status varchar(200) DEFAULT NULL,
						share varchar(50) DEFAULT NULL,
						date varchar(10) DEFAULT NULL,
						permission varchar(100) DEFAULT NULL,
						CONSTRAINT code_pk PRIMARY KEY (code)
                    )";
					$result = mysqli_query($conn, $query);
					echo "<div class='textstyle'><p>Table created successfully</p></div>";
				}

				/*Query the database if the code from the form already exists. If it does then print out that the code is already in use and to try again.*/
				$query = "Select * from $sql_tble WHERE code = '$code'";
				$result = mysqli_query($conn, $query);
				$exists = mysqli_num_rows($result);
				if($exists > 0){
					echo "<div class='textstyle'><p>Code already in use. Please enter a new code</p></div>";
				} else {
					/*Query the database to insert the values from the form into the relevant database fields.*/
					$query = "insert into $sql_tble(code, status, share, date, permission) values('$code','$status','$share', '$date', '$permission')";
					$result = mysqli_query($conn, $query);
					if(!$result) {
						echo "<div class='textstyle'><p>Something is wrong with ",	$query, "</p></div>";
					} else {
						echo "<div class='textstyle'><p>Congrats, your post has been saved to the database!</p></div>";
					}
				}
				
				/*Free the results of the querys and close the database connection.*/
				mysqli_free_result($result);
				mysqli_close($conn);
			?>
		</article>
	</body>
</html>	