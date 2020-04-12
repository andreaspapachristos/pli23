<!--
Η συνάρτηση που εισάγει τα μενού στον αντίστοιχο πίνακα

-->

<?php
           include 'connect.php';
              
              session_start();
              $id_dietician=mysqli_real_escape_string($mysqli,$_SESSION['userid']);
              $id_customer=$_SESSION['customer'];
              $mealdate= mysqli_real_escape_string($mysqli,$_POST['datepicker']);
              $mealtype=mysqli_real_escape_string($mysqli,$_POST['eidos']);
              $recipe=mysqli_real_escape_string($mysqli,$_POST['recipe']);
              $query="SELECT mealType FROM meal WHERE Id_dietician='$id_dietician' AND Id_customer='$id_customer' AND mealDate='$mealdate' AND MealType='$mealtype' ";
              if($result2=(mysqli_query($mysqli, $query))){ if (mysqli_num_rows($result2)>0){
                                                            $sql="UPDATE meal SET DieticianComments='$recipe' WHERE Id_dietician='$id_dietician' AND Id_customer='$id_customer' AND mealDate='$mealdate' AND MealType='$mealtype' "; }
                                                                else{
                                                                        $sql="INSERT INTO meal (Id_dietician,Id_customer,mealDate,mealType,DieticianComments) VALUES('$id_dietician','$id_customer','$mealdate','$mealtype','  $recipe')";
                                                                        }
                                                            }
                else{
                        $sql="INSERT INTO meal (Id_dietician,Id_customer,mealDate,mealType,DieticianComments) VALUES('$id_dietician','$id_customer','$mealdate','$mealtype','  $recipe')";}
                                if(mysqli_query($mysqli, $sql)){
                                        echo '<script> alert ("Επιτυχής καταχώρηση"); location.replace("../show_cust.php"); </script>';
                                 } else{
                                        echo '<script> alert ("Κάτι δεν πήγε καλά δοκιμάστε πάλι"); location.replace("../show_cust.php"); </script>';                                          
                }mysqli_close($mysqli); 
                
         
           
?>           
    
