<!-- 
καμμιά ιδιαιτερότητα μια απλή σύνδεση σε βάση.
Προσοχή φέρει κωδικό που δούλεψα στην δική μου μηχανή
-->
        <?php
   $mysql_host='127.0.0.1';
   $mysql_user='root';
   $mysql_passwd='m@ria14';
   $mysql_db='pli23';
    $mysqli= new mysqli($mysql_host,$mysql_user,$mysql_passwd,$mysql_db);
              if(!$mysqli){
                  die("ERROR: Could not connect".mysqli_connect_error());
              }
   
        
        ?>
 
