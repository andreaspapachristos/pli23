<!-- 
Επίσης μια ακόμη συνάρτηση που απλώς εκτελεί ένα query εδώ αυτό της διαγραφής

-->

<?php
include 'connect.php';
$id=$_POST['idi'];
   $sql="DELETE  FROM customer WHERE Id=$id";
   if ($result = $mysqli->query($sql)){
       $sql3="DELETE FROM DieticianCustomer WHERE Id_customer=$id";{
           if ($result1=$mysqli->query($sql3)){
              header("location:../dietolog.php"); 
           }
   }       
   }
  else{
       header("location:../index.php");
  }
  $mysqli->close();
?>

