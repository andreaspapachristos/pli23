<!--
 Συνάρτηση που υλοποιεί την ανανέωση στοιχείων του πελάτη.
Δεν χρειάζεται επεξήγηση εδώ μια και είναι πολύ απλή. Ένα query που αντλεί τις τιμές από 
HTML φόρμα
-->
<?php
include '../show_cust.php';
include 'connect.php'; 
  $user1=mysqli_real_escape_string($mysqli,$_POST['UserName']);
  $pass1=mysqli_real_escape_string($mysqli,$_POST['password']);
  $sname1=mysqli_real_escape_string($mysqli,$_POST['sname']);
  $weight1=mysqli_real_escape_string($mysqli,$_POST['weight']);
  $gender1=mysqli_real_escape_string($mysqli,$_POST['gender']);
  $age1=mysqli_real_escape_string($mysqli,$_POST['age']);
  $comment1=mysqli_real_escape_string($mysqli,$_POST['comment']);
$sql="UPDATE customer SET USERNAME='$user1', Password='$pass1', SecondName='$sname1', Weight='$weight1',Gender='$gender1', Age='$age1', Comments='$comment1' WHERE Id=$id";
if ($result = $mysqli->query($sql)){
    echo '<script> alert ("Επιτυχής ανανέωση"); location.replace("../show_cust.php"); </script>';
   
    
}
 else {
echo mysqli_error($mysqli); 
}


?>
        