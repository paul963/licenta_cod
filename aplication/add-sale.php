<!-- <?php
	//include('session.php');
	//if(!isset($_SESSION['login_user'])){
	//header("location: sign-in.php"); 
	}
?> -->

<?php 
	$month = date('m');
	$day = date('d');
	$year = date('Y');
	$today = $year . '-' . $month . '-' . $day;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/add_sale.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script>
	    $(document).ready(function(){
	        $('#produs').on('change', function(){
	            var productID = $(this).val();
	            if(productID){
	                $.ajax({
	                    type:'POST',
	                    url:'ajaxData.php',
	                    data:'id_produs='+productID,
	                    success:function(html){
	                        $('#model').html(html); 
	                    }
	                }); 
	            }else{
	                $('#model').html('<option>Model</option>');
	            }
	        });
	    });
	</script>

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
		<h1 class="h1">Plasează o comandă</h1>
	</div>

	<?php  
        $con = mysqli_connect("localhost", "root", "", "exemplu") or die("Nu ma pot conecta: ".$con->connect_error); 
        $sql = "SELECT * FROM produse"; 
        $result = $con->query($sql); 
    ?>

	<div class="add_sale">
		<form method="post" action="">
		
			<br><br>
			<input class="cell" type="date" name="data" value="<?php echo $today; ?>" id="date" readonly>
		  	
		  	<br><br>
		  	<select id="produs" name="produs" required>
		        <option selected disabled>Produs</option>
		        <?php
		            if($result->num_rows > 0){ 
		                while($row = $result->fetch_assoc()){  
		                    echo '<option value="'.$row['id_produs'].'">'.$row['produs'].'</option>'; 
		                } 
		            }else{ 
		                echo '<option value="">Produs not available</option>'; 
		            } 
		        ?>
		    </select>

		    <br><br>
		    <select id="model" name="model" required>
		        <option selected disabled>Model</option>
		    </select>
			
			<br><br>
			<input class="cell" type="number" name="cantitate" id="cantitate" min="0" placeholder="Bucăți" autocomplete="off" required>
			
			<br><br>
			<input class="cell" type="number" name="pret" id="pret" placeholder="Pret total" readonly>

			<br><br>
			<input class="button" type="submit" name="submit" value="COMANDĂ">
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

	<script> 
		$(function(){
			$('#cantitate').keyup(function(){
				var cantitate = parseFloat($('#cantitate').val()) || 0;
				var price = parseFloat($('#model').val()) || 0;
				$('#pret').val(cantitate * price);
			});
		});
	</script>
</body>
</html>

<?php	 	
	if (isset($_POST['submit'])){
		$con = mysqli_connect("localhost", "root", "", "exemplu") or die("Nu ma pot conecta: ".$con->connect_error);
		
	 	$agent = $login_session_agent;
	 	$data = $_POST['data'];
	 	
	 	if($_POST['produs'] == 1)
	 		$produs = 'Ski';
	 	if($_POST['produs'] == 2)
	 		$produs = 'Placa snowboard';
	 	if($_POST['produs'] == 3)
	 		$produs = 'Echipamente';

	 	$price = $_POST['model'];
	 	$sql_produs = "SELECT model FROM model WHERE pret = '$price'";
		$result_produs = $con->query($sql_produs) or die("Nu merge".$con->error);
	 	$row_produs = $result_produs->fetch_assoc();
	 	$model = $row_produs['model'];

	 	$cantitate = $_POST['cantitate'];
	 	$pret = $_POST['model'] * $cantitate;

		$sql = "INSERT INTO vanzari (agent, data, produs, model, cantitate, pret) values ('$agent', '$data', '$produs', '$model', '$cantitate', '$pret')";
		$sql_run = mysqli_query($con, $sql) or die ($con->error);

		// if($sql_run){
	 // 		echo '<div class="alert">';
		// 		echo '<p class="allert">Felicitări pentru vânzare!</p>';
		// 	echo '</div>';

		// 	header("Refresh:3");
		// } 

		$con->close();
	}
?>