<?php 
    $con = mysqli_connect("localhost", "root", "", "exemplu") or die("Nu ma pot conecta: ".$con->connect_error); 
     
    if(!empty($_POST["id_produs"])){ 
        $sql = "SELECT * FROM model WHERE id_produs = ".$_POST['id_produs']." ORDER BY model ASC"; 
        $result = $con->query($sql); 
         
        if($result->num_rows > 0){ 
            echo '<option selected disabled>Model</option>';
            while($row = $result->fetch_assoc()){  
                echo '<option value="'.$row['pret'].'" >'.$row['model'].'</option>'; 
            } 
        }else{ 
            echo '<option selected disabled>Modelul nu exista</option>'; 
        } 
    }
?>