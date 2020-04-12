<!--
Συνάρτηση που κάνει εισαγωγή νέου πελάτη. Επίσης απλή φόρμα HTML η οποία καλείται και
χρησιμοποιεί τα inputs που δώθηκαν.
Το μόνο που θέλει προσοχή είναι η "παράλληλη" ενημέρωση και του πίνακα DieticianCustomer που αντιστοιχεί
στην "ένα προς πολλά" σχέση διαιτολόγου-πελάτη
-->
<?php

include 'connect.php';
 $user1=mysqli_real_escape_string($mysqli,$_POST['UserName']);
  $pass1=mysqli_real_escape_string($mysqli,$_POST['password']);
  $sname1=mysqli_real_escape_string($mysqli,$_POST['sname']);
  $weight1=mysqli_real_escape_string($mysqli,$_POST['weight']);
  $gender1=mysqli_real_escape_string($mysqli,$_POST['gender']);
  $age1=mysqli_real_escape_string($mysqli,$_POST['age']);
  $comment1=mysqli_real_escape_string($mysqli,$_POST['comment']);
$sql="INSERT INTO customer  (USERNAME, Password, SecondName, Weight, Gender, Age, Comments ) VALUES ( '$user1', '$pass1', '$sname1', '$weight1', '$gender1', '$age1', '$comment1' )";
if(mysqli_query($mysqli, $sql)){
    echo '<script> alert ("Επιτυχής εισαγωγή"); </script>';
  
    
}
 else {
echo '<script> alert ("error"); </script>';
echo mysqli_error($mysqli); 
} 
 $sql1="SELECT Id FROM customer WHERE USERNAME='$user1'";
   if(mysqli_query($mysqli, $sql1)){
       session_start();
       $dietician=$_SESSION['userid'];
        if ($result = $mysqli->query($sql1)){
                  if($result->num_rows >0){
        while($row= mysqli_fetch_assoc($result)){
       
        $cust=$row['Id'];}
       }
       $sql2="INSERT INTO DieticianCustomer (Id_dietician,Id_customer) VALUES ('$dietician','$cust')";
          if ($result = $mysqli->query($sql2)){
                  
                  echo '<script>location.replace("../dietolog.php"); </script>';
                  
       
        }
 else {
       echo mysqli_error($mysqli);  
   }
   }
   }
?>    
        