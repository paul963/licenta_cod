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
  <link rel="stylesheet" type="text/css" href="css/nav.css">
	<link rel="stylesheet" type="text/css" href="css/sale_all.css">
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

  <div class="s_all">
    <table id="myTable">
      <thead>
        <tr>
        <th onclick="sortTable(0)"> Client </th>
        <th onclick="sortTable(1)"> Telefon </th> 
        <th onclick="sortTable(2)"> Produs </th>
        <th onclick="sortTable(3)"> Model </th>
        <th onclick="sortTable(4)"> Cantitate </th>
        <th onclick="sortTable(5)"> Pret total </th>
        </tr>
      </thead>

      <?php
        $con = new mysqli("localhost", "root", "", "exemplu") or die("Nu ma pot conecta: ".$con->connect_error);
        $sql = "SELECT id, nume, telefon, produs, model, cantitate, pret FROM comenzi";
        $result = $con->query($sql) or die("Nu merge".$con->error);
      ?>

      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td align="left"><?php echo $row["nume"] ?></td>
            <td align="left"><?php echo $row["telefon"] ?></td>
            <td align="left"><?php echo $row["produs"] ?></td>
            <td align="left"><?php echo $row["model"] ?></td>
            <td align="center"><?php echo $row["cantitate"] ?></td>
            <td align="right"><?php echo number_format($row["pret"]) ?> RON</td>
          </tr>
        <?php endwhile; $con->close(); ?>	
      </tbody>
    </table>

    <form method="post" action="">
      <br>
        <input class="button" type="submit" name="submit" value="Preluare comenzi">
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
  $month = date('m');
  $day = date('d');
  $year = date('Y');

  if (isset($_POST['submit'])){
    $con = mysqli_connect("localhost", "root", "", "exemplu") or die("Nu ma pot conecta: ".$con->connect_error);
    $sql = "SELECT produs, model, cantitate, pret FROM comenzi";
    $result = $con->query($sql) or die("Nu merge".$con->error);

    $agent = $login_session_agent;
    $today = $year . '-' . $month . '-' . $day;

    while($row = $result->fetch_assoc())    
    {
      $produs = $row['produs'];
      $model = $row['model'];
      $cantitate = $row['cantitate'];
      $pret = $row['pret'];
      
      $sql = "INSERT INTO vanzari (agent, data, produs, model, cantitate, pret) values ('$agent', '$today', '$produs', '$model', '$cantitate', '$pret')";
      $sql_run = mysqli_query($con, $sql) or die ($con->error);
    }

    $con->query("DELETE FROM comenzi") or die("Nu merge".$con->error());
    $con->close();
  }
?>