<!DOCTYPE html>
<!--Η σελίδα αυτή είναι η εμφάνιση των γευμάτων σε χρονικό διάστημα το οποίο ορίζει ο πελάτης
Είναι ίδια περίπου με την customer.php και χρησιμοποιεί και την ίδια συνάρτηση για την ενημέρωση
των μενού, την εισαγωγή σχολίου και ενημέρωση της ημερομηνίας κατανάλωσης.
Η εκφώνηση ζητάει και ειδικό πλαίσιο για να σημειώνει ο πελάτης αν κατανάλωσε το γεύμα ή όχι.
Δεν το έκανα, δυστυχώς χρειάζεται να προσθέσω στην Βάση Δεδομένων Boolean μεταβλητή και πλέον είναι
αργά δεν έχω τον χρόνο.
-->
<html>
    <head>
       
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link href="css/customer.css" rel="stylesheet" type="text/css" media="screen">
         <meta charset="UTF-8">
        <title>Meals</title>
    </head>
    <body>
        <header>
            <a href="../customer.php" class="back">Πίσω</a>
        </header>
        <div>
<?php     
        include 'functions/connect.php'; 
        session_start();        
        $id=$_SESSION['userid'];
        $from=$_POST['from'];
        $untill=$_POST['untill'];
        date_default_timezone_set("Europe/Athens");
        $sql="SELECT *  FROM meal WHERE meal.Id_customer= $id AND mealDate >='$from' AND mealDate <='$untill'  ORDER BY mealDate, MealType";        
         if ($result = $mysqli->query($sql)){              
                  if($result->num_rows >0){ 
                      echo '<table  class="kefalida">';
                      echo '<tr class="line">';
                      echo '<th id="small">Ημερομηνία</th>';
                        echo '<th id="small">Τύπος Γεύματος</th>';
                        echo '<th id="big">Περιγραφή γεύματος</th>';
                       echo '<th id="small">Σχόλιο Πελάτη</th>';
                        echo '<th id="small">Ώρα κατανάλωσης</th>';                        
                        echo '<th id="small">Εισαγωγή</th>';
                        echo '</tr>';
                        echo '<table/>'; 
                      while($row= mysqli_fetch_assoc($result)){                           
                     echo '<form  action="functions/update.php" method="POST" name="f"> ';                       
                      echo '<table  id="table">';                       
                          echo '<tr class="line">';
                          echo  '<td id="small"><input type="text" name="dat" readonly value='.$row['mealDate'].'></input></td>';
                          echo '<td id="small"><input type="text" name="tpe" readonly value='.$row['MealType'].'></input></td>';                                                    
                          echo '<td id="big">'.$row['DieticianComments'].'</td>';
                           echo '<td id="small"><input type="text" name="customercomment" id="cstcm"  value='.$row['CustomerComments'].'></input></td>';
                             if($row['timeOfDinner']!==null){$date=$row['timeOfDinner'];}else{$date=Date('H:i:s');}
                          echo '<td id="small"><input type="time" name="time" id="tm" value='.$date.'></input></td>';
                          echo '<td id="small"><input type="submit" name="sbmt" value="Καταχώρηση" /></td>';                        
                          echo '</tr>';
                        echo '</table>';
                       echo '</form>';
                      }                                                                
                    }
                    else     echo 'Δεν υπάρχουν διαθέσιμα γεύματα. Δοκιμάστε αργότερα';echo mysqli_error($mysqli);             
              }else   echo mysqli_error($mysqli);              
             mysqli_close($mysqli);
?>
            </div>
    </body>
</html>