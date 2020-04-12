<!DOCTYPE html>
<!--
Η σελίδα φιλοδοξεί να απαντήσει στο 5ο ερώτημα της εργασίας. Δεν τα καταφέρνω με τόση επιτυχία.
Δυστυχώς το query και η τεχνική μου φάνηκαν αρκετά περίπλοκα, έτσι ενώ πετυχαίνει την λειτουργία
που μας ζητείται, επιστρέφει αποττελέσματα μόνο αν έχουν οριστεί και feedback και σύντομο σχόλιο
σε κάθε γεύμα της συγκεκριμένης ημερομηνίας.
Εισάγω παραδοχή για την λειτουργία της απαίτησης αυτής όπου γίνεται και καλύτερα αντιλιπτή
η δυσλειτουργία της.
-->


<html>
    <head>
        <link href="css/show-comments.css" rel="stylesheet" type="text/css" media="screen">
        <meta charset="UTF-8">   
    </head>
   <body>
    <header>
        <ul>
                 <li><a class="active" href="dietolog.php"> Πίσω</a></li>
                 <li class="logout"><a href="functions/logout.php">Έξοδος</a></li>
        </ul>
    </header>
       <div>
        <?php
           include 'functions/connect.php';          
              session_start();
              $id=$_SESSION['userid'];
              $customid=mysqli_real_escape_string($mysqli,$_POST['customer-id']);
              $datefrom=mysqli_real_escape_string($mysqli, $_POST['datefrom']);
              $dateuntill=mysqli_real_escape_string($mysqli,$_POST['dateuntill']); //AND meal.Id_customer=$customid
              $sql="SELECT DISTINCT  commentsOfDay.Id,commentsOfDay.comment,commentsOfDay.commentDate, meal.CustomerComments, meal.MealType, mealDate FROM commentsOfDay JOIN meal ON meal.Id_customer=$customid JOIN DieticianCustomer ON DieticianCustomer.Id_dietician=$id  WHERE commentDate >= '$datefrom'   AND commentDate <= '$dateuntill'  AND  commentsOfDay.Id_customer=$customid  AND DieticianCustomer.Id_customer=commentsOfDay.Id_customer  AND meal.mealDate=commentsOfDay.commentDate ORDER BY commentDate";
              if ($result = $mysqli->query($sql)){                              
                  if($result->num_rows >0){ 
                      echo '<table  id="table">';
                       echo '<tr class="line1">';
                          echo '<td class="head-">"Κλειδί" σχολίου</td>';
                          echo '<td class="head">Αξιολόγηση Ημέρας</td>';
                          echo '<td class="head">Ημερομηνία Αξιολόγησης</td>';                          
                          echo '<td class="head"> <table id="esoterikos"><td>Ημερομηνία Γεύματος</td>';
                          echo '<td class="head">Σχόλια Γεύματος</td>';
                          echo '<td class="head">Για το γεύμα: </td></table></td>';
                          echo '</tr>';
                      while($row= mysqli_fetch_assoc($result)){
                         
                          echo '<tr class=line2>';
                          echo '<td id="selected" >'.$row['Id'].'</td>';
                          echo"<td>".$row['comment']."</td>";
                          echo"<td>".$row['commentDate']."</td>";
                          echo"<td><table id='esoterikos'><td>".$row['mealDate']."</td>";
                          echo '<td>'.$row['CustomerComments'].'</td>';
                          echo '<td>'.$row['MealType'].'</td></table></td>';
                          echo '</tr>';
                      }
                     
                      echo '</table>';
                      
                    }else{
                        
                    echo '<script>alert ("Δεν βρέθηκαν εγγραφές"); location.replace("../dietolog.php");</script>';
                    }
              }
              else {
     echo 'no result';     
 }
             mysqli_close($mysqli);
              ?>
              </div>
        </body> 
</html>    

