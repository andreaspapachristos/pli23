<!-- 
Απλά περνάει το feedback στην βάση δεδομένων

-->

<?php
include 'connect.php';
session_start();
$commentDate=mysqli_real_escape_string($mysqli,$_POST['day']);
$comment2=mysqli_real_escape_string($mysqli,$_POST['txtarea']);
$id=$_SESSION['userid'];
$sql7="INSERT INTO commentsOfDay  (Id_customer, commentDate, comment)VALUES ('$id','$commentDate', '$comment2')";
 if(mysqli_query($mysqli, $sql7)){
              
                header("location:../customer.php"); 
          
                     }else{
                            echo mysqli_error($mysqli);
                            echo $id;
                            }

?>

