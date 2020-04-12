<!--
Συνάρτηση που ελέγχει τα στοιχεία εισαγωγής των χρηστών. (διαιτολόγων και χρηστών)
Είναι περιεχόμενη (include) στην do.php
-->
              <?php
              function login(){
              $mysqli= new mysqli("127.0.0.1","root","m@ria14","pli23");
              if(!$mysqli){
                  die("ERROR: Could not connect".mysqli_connect_error());
              }
              $username= mysqli_real_escape_string($mysqli,$_POST['User_name']);
              $password= mysqli_real_escape_string($mysqli,$_POST['Passwd']);
              if(isset($_POST['dietist'])){
                  $table="dietician";
              }
                else {$table="customer";}
              $sql="SELECT Id FROM $table WHERE USERNAME='$username'  AND Password='$password'";
              if ($result = $mysqli->query($sql)){
                  if($result->num_rows >0){
                    $var= mysqli_fetch_assoc($result);
                      session_start();
                     $_SESSION['userid']=$var['Id'];
                        return true;
                      $result->close();
                  }  else {
                      return FALSE;
                  }
              }  else {
                  echo 'ERROR: Could not execute $sql.'.$mysqli->error;  
                  exit();
              }
              $mysqli->close();
        }
              ?>

