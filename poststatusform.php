<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Web Development :: Assignment 1" />
		<meta name="keywords" content="web, development, assignment, 1" />
		<link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
		 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
			<!--Post status form using POST method. Additional styling provided below. Status code, Status and Date fields have patterns to specify a certain format. The date field has the server date automatically instantiated.-->
			<form action = "poststatusprocess.php" method = "post">
				<style type="text/css">
					input.largerCheckbox {
						width: 20px;
						height: 20px;
					}
					input.largerRadio {
						width: 20px;
						height: 20px;
					}
					span.text {
						font-size: 18pt;
						display: inline;
					}
				</style>
				<br>
				<label style="font-size:18pt">Status Code (required) <input type="text" name="code" style="font-size:18pt" required pattern="S[0-9]{4}" title ="Code must start with S followed by 4 numbers"/></label>
				<br>
				<label style="font-size:18pt">Status (required) <input type="text" name="status" style="font-size:18pt" required pattern="[a-zA-Z0-9\s.!?,]+" title ="Status can only contain: A-Z, a-z, 0-9, .!?, and space"/></label>
				<br>
				<label style="font-size:18pt">Share </label>
					<input type="radio" class="largerRadio" name="share" value="public"/><span class="text">Public</span>
					<input type="radio" class="largerRadio" name="share" value="friends"/><span class="text">Friends</span>
					<input type="radio" class="largerRadio" name="share" value="onlyme"/><span class="text">Only Me</span><br>
				<label style="font-size:18pt">Date <input type="text" id = "datepicker" name="date" value="08/04/2017"  style="font-size:18pt" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" title ="Date must be in dd/mm/yyyy format. Please check your date."></label>
				<br>
				<label style="font-size:18pt">Permission Type </label>
					<input type="checkbox" class="largerCheckbox" name="like" value="like"/><span class="text">Allow like</span>
					<input type="checkbox" class="largerCheckbox" name="comment" value="comment"/><span class="text">Allow comment</span>
					<input type="checkbox" class="largerCheckbox" name="allowshare" value="share"/><span class="text">Allow share</span><br>
				<input type="submit" value="Post" style="font-size:18pt">
				<input type="reset" value="Reset" style="font-size:18pt">
			</form>
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