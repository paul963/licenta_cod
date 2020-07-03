<?php
	include('start.php');
	if(isset($_SESSION['login_user'])){
		header("Refresh:3; url=welcome.php");
	}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<link rel="stylesheet" type="text/css" href="css/signin.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<title>LoWi</title>
</head>

<body>
	<nav>
		<ul>
			<li><div class="sign"><a class="sign" href="sign-in.php">AUTENTIFICĂ-TE</a></div></li>
		    <li class="add"><a href="add-sale-clients.php">COMANDĂ</a></li>
			<li><a href="#">PRODUSE</a>
		        <ul class="prod">
		      	 	<li class="prod"><a href="ski-clients.php">SKI-URI</a></li>
		    	    <li class="prod"><a href="snowboard-clients.php">PLĂCI SNOWBOARD</a></li>
		    	    <li class="prod"><a href="echipamente-clients.php">ECHIPAMENTE</a></li>
		        </ul>
		    <li><a class="w" href="welcome-clients.php">ACASĂ</a></li>
			<li class="logo"><img src="img\logo_nav.png" style="margin-left: 10px; height: 50px"></li>
		    </li>
		</ul>
	</nav>

	<div class="si">
		<form method="post" action="">
			<h1 class="h1">Bine ai revenit!</h1>

			<input class="cell" type="email" name="email" placeholder="Email" autocomplete="on" required>

			<br><br>
			<input class="cell" type="password" name="parola" placeholder="Parola" required>

			<br><br><br>
			<input class="button" type="submit" name="submit" value="AUTENTIFICARE">
		</form>
	</div>

	<footer id="footer">
		<div id="footer-content">
		    <div id="footer-logo">
		    	<a id="foot" href="welcome-clients.php"><img src="img\logo.png"></a>
		    </div>

		    <div id="footer-about">
	    	<h1 style="color: white">Servicii</h1>
	    	<hr style="border: 1px solid #7d7d7d; width: 70px; margin-top: 10px; margin-bottom: 15px;">
	    	<a id="foot" href="help-clients.php#questions">Intrebari frecvente</a><br>
	    	<a id="foot" href="help-clients.php#guarantees">Garantii si service</a><br>
	    	<a id="foot" href="help-clients.php#transport">Transport gratuit</a><br>
	    	<a id="foot" href="help-clients.php#return">Returnare</a><br>    	
	   	</div>

		<div id="footer-contact">
	    	<h1 style="color: white">Contact</h1>
	    	<hr style="border: 1px solid #7d7d7d; width: 70px; margin-top: 10px; margin-bottom: 15px;">
	    	<p style="margin-top: 20px; font-size: 17px"><img src="img\phonee.png" style="margin-right: 5px;">+ 40 7222 222 222</p>
	    	<p style="margin-bottom: 10px; font-size: 17px"><img src="img\email.png" style="margin-right: 5px;">test.test@gmail.ro</p>
	    	<a href="https://www.facebook.com"><img src="img\facebook.png"></a> &nbsp
	        <a href="https://www.linkedin.com"><img src="img\linkedin.png"></a> &nbsp
	        <a href="https://www.instagram.com"><img src="img\instagram.png"></a> &nbsp
	        <a href="https://www.twitter.com"><img src="img\twitter.png"></a>
	    </div>
		</div>

		<hr style="border: 1px solid #7d7d7d;">
		
		<div id="copywrite">
		    <a id="foot" href="welcome-clients.php">LoWi</a> &copy; 2020 | ALL RIGHTS RESERVED
		</div>
	</footer>
</body>
</html>