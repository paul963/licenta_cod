<!-- <?php
	//include('session.php');
	//if(!isset($_SESSION['login_user'])){
	//header("location: sign-in.php"); 
	}
?> -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/add_product.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<title>LoWi</title>
</head>

<body>
	<nav>
		<ul>
		    <li><a href="logout.php">DECONECTEAZĂ-TE</a></li>
		    <li><a href="#">VÂNZĂRI</a>
		        <ul class="sale">
		        	<li class="sale"><a href="sale-all.php">TOATE</a></li>
		        	<li class="sale"><a href="sale-product.php">DUPĂ PRODUS</a></li>
		    	    <li class="sale"><a href="sale-date.php">DUPĂ PERIOADĂ</a></li>
		        </ul>
		    </li>
		    <li><a href="orders.php">PREIA COMENZI</a></li>
		    <li><a href="#">ADAUGĂ</a>
		        <ul class="add">
		  			<li class="add"><a href="add-product.php">PRODUS</a></li>
		        	<li class="add"><a href="add-sale.php">COMANDĂ</a></li>
		        	<li class="add"><a href="sign-up.php">ADMINISTRATOR</a></li>
		        </ul>
		    </li>
		    <li><a href="#">PRODUSE</a>
		        <ul class="prod">
		      	 	<li class="prod"><a href="ski.php">SKI-URI</a></li>
		    	    <li class="prod"><a href="snowboard.php">PLĂCI SNOWBOARD</a></li>
		    	    <li class="prod"><a href="echipamente.php">ECHIPAMENTE</a></li>
		        </ul>
		    </li>
		    <li><a href="team.php">ADMINISTRATORI</a></li>
		    <li><a class="w" href="welcome.php">ACASĂ</a></li>
		    <li class="name">Bun venit, <?php echo $login_session_prenume; ?>!</li>
	    </ul>
	</nav>
	
	<div class="head">
		<h1 class="h1">Aducem un model nou în portofoliul nostru</h1>
	</div>

	<div class="add_prod">
		<form method="post" action="">
			<select name="mySelection">
				<option selected disabled>Produs</option>
				<option value="1">Ski</option>
				<option value="2">Placă snowboard</option>
				<option value="3">Echipamente</option>
	        </select>

			<br><br>
			<input class="cell" type="text" name="model" placeholder="Model" autocomplete="off" required>

			<br><br>
			<input class="cell" type="number" name="pret" placeholder="Pret" autocomplete="off" required="">

			<br><br>
			<input class="button" type="submit" name="submit" value="ADAUGĂ">
		</form>
	</div>

	<footer id="footer">
		<div id="footer-content">
		    <div id="footer-logo">
		    	<a id="foot" href="welcome.php"><img src="img\logo.png"></a>
		    </div>

		    <div id="footer-about">
	    	<h1 style="color: white">Servicii</h1>
	    	<hr style="border: 1px solid #7d7d7d; width: 70px; margin-top: 10px; margin-bottom: 15px;">
	    	<a id="foot" href="help.php#questions">Intrebari frecvente</a><br>
	    	<a id="foot" href="help.php#guarantees">Garantii si service</a><br>
	    	<a id="foot" href="help.php#transport">Transport gratuit</a><br>
	    	<a id="foot" href="help.php#return">Returnare</a><br>    	
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
		    <a id="foot" href="welcome.php">LoWi</a> &copy; 2020 | ALL RIGHTS RESERVED
		</div>
	</footer>
</body>
</html>

<?php	 	
	if (isset($_POST['submit'])){
		$con = mysqli_connect("localhost", "root", "", "exemplu") or die("Nu ma pot conecta: ".$con->connect_error);

	 	$produs = $_POST['mySelection'];
	 	$model = $_POST['model'];
	 	$pret = $_POST['pret'];

		$sql = "INSERT INTO model (id_produs, model, pret) values ('$produs', '$model', '$pret')";
		$sql_run = mysqli_query($con, $sql) or die ($con->error);

		$con->close();
	}
?>