<!DOCTYPE html>
<!--
Η σελίδα υποδοχής του διετολόγου. Δεν περιέχει κάτι το ιδιαίτερο. Είναι απλά ένας πίνακας που εμφανίζει
τους πελάτες του διαιτολόγου μου έκανε login ουσιαστικά πίνακας αποτελεσμάτων query δηλαδή,
μια φόρμα εισαγωγής στοιχείων για την εμφάνιση σχολίων από πελάτη και δύο κουμπιά (buttons) τα οποία
απλώς εμφανίζουν αντίστοιχα δύο φόρμες μια για εισαγωγή νέου πελάτη και μια για διαγραφή πελάτη.
Είναι η μόνη σελίδα στην οποία κατάφερα να χρησιμοποιήσω javascript.

-->
<!--
<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); 
header("Pragma:no-chace");
?>
-->
<html>
    <head>
        <script type="text/javascript" src="js/jquery-2.2.0.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/addUser.js"></script>
        <script type="text/javascript" src="js/showform.js"></script>
        <script type="text/javascript" src="js/delete.js"></script>
        <script type="text/javascript" src="js/validate.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
         <link href="css/login.css" rel="stylesheet" type="text/css" media="screen">
         <meta charset="UTF-8">
        <title>welcome</title>
    </head>
    <body>
        <header>
             <?php session_start();
         if(!(isset($_SESSION['userid']))){die('acces prohibited');}?>
       
        </header>
        <script>
             $(function() {
                        $( ".datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
                         });
                    </script>
        <div class="menu">
            <ul>
                <li><a class="active" href="#home">  
                    <?php echo 'welcome '.$_SESSION['username'];?></a></li>
                    <li class="logout">
                        <a href="functions/logout.php">Έξοδος</a>
                    </li>
            </ul>
            <span id="logo">
       
                </span>
        </div>
         <div class="db" >
             <script type="text/javascript">
             function getId(){
                 var c=document.getElementById("table");
                cells=c.getElementsByTagName('a');
                 for(var i in cells){
                            cells[i].onclick=function(){
                            var rowid=(this.innerHTML);                                               
                     window.location.href="show_cust.php?set="+ rowid;                                       
             }
         }
     } 
             </script>
           <?php
    include 'functions/connect.php';  
           
                $id=$_SESSION['userid'];
                $sql="SELECT customer.* FROM customer JOIN DieticianCustomer ON DieticianCustomer.Id_customer=customer.Id JOIN dietician ON dietician.Id=DieticianCustomer.Id_dietician WHERE dietician.Id= $id  ";
                        if ($result = $mysqli->query($sql)){                              
                             if($result->num_rows >0){ 
                                 echo '<table  id="table">';
                                 echo '<tr class="tbl">';
                                 echo '<th>Κλειδί Πελάτη</th>';
                                 echo '<th>Όνομα</th>';
                                 echo '<th>Επώνυμο</th>';
                                 echo '<th>Ηλικία</th>';
                                 echo '<th>Βάρος</th>';
                                 echo '<th>Φύλλο</th>';
                                 echo '</tr>';
                                 while($row= mysqli_fetch_assoc($result)){                         
                          echo '<tr class="line">';
                          echo '<td id="selected" ><a href="javascript:getId();" title="δύο κλίκ" id="ts">'.$row['Id'].'</a></td>';
                          echo"<td>".$row['USERNAME']."</td>";
                          echo"<td>".$row['SecondName']."</td>";
                          echo '<td>'.$row['Age'].'</td>';
                          echo '<td>'.$row['Weight'].'</td>';
                          echo '<td>'.$row['Gender'].'</td>';
                          echo '</tr>';
                      }                     
                      echo '</table>';                     
                    }
              }
              
             mysqli_close($mysqli);
              ?>
        </div>
       
        <div id="db-meal">
          
          
        </div>
                    <aside>
        <div class="feedback">
            <form action="show-comments.php" method="POST">
                <fieldset class="comm">
                    <legend id="epikefalida">Εμφάνιση σχολίων </legend>
                                <label>Id Πελάτη:</label><input type="text" class="customer-id" name="customer-id" required="true"/><br>
                                <label>Ημερομηνία από: </label><input type="text" class="datepicker" name="datefrom" required="true"/>
                                <label>εως: </label><input type="text" class="datepicker" name="dateuntill" required="true"/>
                                <input type="submit" value="Εμφάνιση" id="button"/>
                </fieldset>
                            </form>
          
                        
                        </div>  
                        </aside>
                  
                    <div class="new">
                        <button type="button" name="new" onclick="getVisible()">Δημιουργία Νέου Πελάτη</button>
                        <button type="button" name="del" onclick="delUser()">Διαγραφή Πελάτη</button>
                    </div>
                        
                    
                    <div id="new-user">
                        <form name="newusr" action="functions/addUser.php" method="POST"/>
                          
                            <br>
                            <fieldset class="personal-information">
                         <label>Όνομα Χρήστη:</label> <input type="text" name="UserName" value="" size="20" class="username" />
                         <br>
                         <label> Κωδικός:</label><input type="text" name="password" value="" size="20" class="paswd" maxlength="8" onblur="validate();" on/>  
                        <br>
                        <label>Επίθετο:</label> <input type="text" name="sname" value="" size="20" class="sname" />
                        <br> 
                        </fieldset>
                         <fieldset class="attribute" >
                        <label>Βάρος:</label> <input type="text" name="weight" value="" size="20" class="weight" />
                         <br> 
                      <label>Φύλλο:</label> <!--<input type="text" name="gender" value="" size="20" class="gender" />
                      --><select name="gender" class="gender" >
        
                     <option value="male">male</option>
                     <option value="female">female</option> </select>
                                            <br> 
                     <label>Ηλικία:</label> <input type="text" name="age" value="" size="20" class="age" />
                      <br>       
                     <label>Σχόλια:</label><input type="text" name="comment" value="" class="comment"/>
                     </fieldset>
                           <label>Εισαγωγή </label><input type="image" src="img/ok-icon.png" alt="ok" class="ok" >
                        </form>
                    </div>
                    <div id="del">
                        <form name="delusr" action="functions/delete.php" method="POST">
                        <label id="key">Δώσε "Κλειδί" Χρήστη:</label><input type="text" name="idi" value="" size="20" class="id" />
                        <label>Διαγραφή  </label> <input type="image" src="img/ok-icon.png" alt="ok" class="ok" onclick="return confirm('Οριστική διαγραφή;')">
                    </div>
    </body>
</html>
