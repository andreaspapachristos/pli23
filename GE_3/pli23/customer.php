<!DOCTYPE html>
<!--
Η σελίδα του χρήστη. Εμφανίζει στην σειρά (οριζόντια):
1) τα μενού της τρέχουσας ημερομηνίας ή μήνυμα λάθους
2) μια φόρμα αναζήτησης μενου σε εύρος ημερών που ορίζει ο πελάτης
3) μαι φόρμα εισαγωγής feedback
Ελάχιστα διακοσμημένη και με κάποια μικρά τεχνικά προβλήματα
-->
<html>
    <head>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
         <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
         <link href="css/customer.css" rel="stylesheet" type="text/css" media="screen">
        <meta charset="UTF-8">
        <title>welcome</title>
    </head>
    <body>
        <header>                  
        <?php         
            session_start();
           if(!isset($_SESSION['userid'])){
              die('acces prohibited');
                 }
            echo 'welcome '.$_SESSION['username'];
            ?>
            <a href="functions/logout.php" class="back">Έξοδος</a>
            </header>        
        <div id="show-meal">
            <p><h3>Μενού Ημέρας</h3></p>
        <?php 
        include 'functions/connect.php'; 
        $id=$_SESSION['userid'];
        date_default_timezone_set("Europe/Athens");
        $sql6="SELECT *  FROM meal WHERE meal.Id_customer= $id AND mealDate=CURDATE() GROUP BY MealType";
         if ($result = $mysqli->query($sql6)){   
                  if($result->num_rows >0){ 
                      echo '<table class="kefalida">';
                       echo '<tr class="line">';
                      echo '<th id="small">Ημερομηνία</th>';
                        echo '<th id="small">Τύπος Γεύματος</th>';
                        echo '<th id="big">Περιγραφή γεύματος</th>';
                       echo '<th id="small">Σχόλιο Πελάτη</th>';
                        echo '<th id="small">Ώρα κατανάλωσης</th>';                        
                        echo '<th id="small">Εισαγωγή</th>';
                        echo '</tr>';
                        echo '</table>';
                      while($row= mysqli_fetch_assoc($result)){   
                          echo '<form action="functions/update.php"  method="POST" name="f"> ';
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
                    else  echo 'Δεν υπάρχουν διαθέσιμα γεύματα. Δοκιμάστε αργότερα'; echo mysqli_error($mysqli);                     
              }else   echo mysqli_error($mysqli);              
             mysqli_close($mysqli);
             ?>             
        </div>
        <div id="custom-entries">
                <script>
                        $(function() {
                        $( ".datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
                         });
                    </script>
            <p><h3>Εμφάνιση Μενού Περισσότερων Ημερών</h3></p>        
        <form id="multiple"method="POST" action="findmeals.php">
            <fieldset class="insert">
                <legend>Ημερομηνίες</legend>
            <label>Από: </label><input type="text" name="from" id="from"  class="datepicker"/>
            <label>Έως: </label><input type="text" name="untill" id="untill"  class="datepicker"/>
             <input type="image" src="img/ok-icon.png"  alt="ok" class="ok" ><label>  Εμφάνιση </label>
            </fieldset>            
            </form>
        <!--<span id="moredays">
            
        </span> -->
        </div>
        <div id="comments">
            <p><h3>Feedback</h3></p>
            <form id="feedback"method="POST" action="functions/feedback.php" name="fdback">
            <fieldset class="insert">
                <legend>Ημερομηνία</legend>
            <label>Για την ημέρα: </label><input type="text" name="day" id="day"  class="datepicker"/>
             <input type="image" src="img/ok-icon.png"  alt="ok" class="ok" ><label>  Καταχώρηση </label>
            </fieldset>
                </form>        
        <textarea rows="4" cols="60" name="txtarea" form="feedback">Σχόλιο ημέρας</textarea>                                            
        </div>        
    </body>
</html>
