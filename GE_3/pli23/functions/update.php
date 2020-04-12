<!-- 
Συνάρτηση που εισάγει την ώρα κατανάλωσης του γεύματος και το σύντομο σχόλιο του πελάτη
στον πίνακα meal(δηλαδή αυτόν που περιέχει τα γεύματα)
Χωρίς εκπλήξεις και λίγο κακότεχνη, αφού εισάγει και τα δύο πεδία μαζί
-->


<?php
include 'connect.php';
session_start();
$id=$_SESSION['userid']; 
$time=mysqli_real_escape_string($mysqli,$_POST['time']);
 $type=mysqli_real_escape_string($mysqli,$_POST['tpe']);
 $date= mysqli_real_escape_string($mysqli,$_POST['dat']);
 $comment=mysqli_real_escape_string($mysqli,$_POST['customercomment']);
   
        $sql4="UPDATE meal SET timeOfDinner='$time',CustomerComments='$comment'  WHERE Id_customer='$id' AND MealType='$type'AND mealDate='$date'" ;
            if(mysqli_query($mysqli, $sql4)){
              
                header("location:../customer.php"); 
          
                     }else{
                            echo mysqli_error($mysqli);
                            }
                     
?>
