<?php
	//include('session.php');
	//if(!isset($_SESSION['login_user'])){
		//header("location: sign-in.php"); 
	//}
	
	$con = new mysqli("localhost", "root", "", "exemplu") or die("Nu ma pot conecta");
	$id = $_GET['id'];
    $query = "SELECT * from vanzari where id='".$id."'";
    $result = mysqli_query($con,$query);
 
    while($row=mysqli_fetch_assoc($result))
    {
        $id = $row['id'];
        $agent = $row['agent'];
        $data = $row['data'];
        $produs = $row['produs'];
        $model = $row['model'];
        $cantitate = $row['cantitate'];
        $pret = $row['pret'];
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<link rel="stylesheet" type="text/css" href="css/edit.css">
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
	
	<h1 class="editarea">Modifică vânzarea</h1>

	<div class="edit">
		<form method="post" action="">
			<p class="editare">
			Agent<br>Data<br>Produs<br>Model<br>Cantitate
			</p> 

		 	<input class="cell" type="text" name="agent" value="<?php echo $agent;?>" readonly>
		 	
		 	<br>
		 	<input class="cell" type="text" name="data" value="<?php echo $data;?>" readonly>

		 	<br>
		 	<input class="cell" type="text" name="produs" value="<?php echo $produs;?>" readonly>

		 	<br>
		 	<input class="cell" type="text" name="model" value="<?php echo $model;?>" readonly>

		 	<br>
		 	<input class="cell" type="number" name="cantitate" value="<?php echo $cantitate;?>" autocomplete="off" required>
		
		 	<br><br><br>
		 	<input class="button" type="submit" name="submit" value="Salvare">
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
	$sql_produs = "SELECT pret FROM model WHERE model = '$model'";
	$result_produs = $con->query($sql_produs) or die("Nu merge".$con->error);
 	$row_produs = $result_produs->fetch_assoc();

	if (isset($_POST['submit'])){
		$id = $_GET['id'];
		$cantitate = $_POST['cantitate'];
		$pret = $row_produs['pret'] * $cantitate;

	 	$con->query("UPDATE vanzari SET cantitate='$cantitate', pret='$pret' WHERE id=$id");

	 	echo '<div class="alert">';
			echo '<p class="allert">Modificările au fost salvate!</p>';
		echo '</div>';

	 	header("Refresh:3; url=sale-all.php");
	}
	$con->close();
?> 