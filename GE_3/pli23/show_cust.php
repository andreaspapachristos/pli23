
<!DOCTYPE html>
<!-- 
Σελίδα στην οποία γίνεται redirect από την dietolog.php πατώντας το ID του πελάτη.
Περιλαμβάνει δύο φόρμες εισαγωγής στοιχείων. Η πρώτη για την τροποποίηση των στοιχείων του πελάτη,
και η δεύτερη για την εισαγωγή μενού του συγκεγκριμένου πελάτη
-->


<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/show-cust.css" rel="stylesheet" type="text/css" media="screen">        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
         <link rel="stylesheet" href="/resources/demos/style.css">
         <title>Edit</title>
         <script>
             $(function() {
                        $( ".datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
                         });
                    </script>
        
          </head>
          <body>
              <script>
  function  imagechange(){
      var image=document.getElementById('image');
        if (image.src.match("/img/close.png")){
            image.src="/img/open.png";
           $(".personal-information,.attribute,.refresh").prop('disabled', false);
           $(".control,.recipe,.in-meal").prop('disabled',true);
        }
       else {
      image.src="/img/close.png";
      $(".personal-information,.attribute,.refresh").prop('disabled', true);
      $(".control,.recipe,.in-meal").prop('disabled',false);
  }
  }
     </script> 
     
             <ul>
                 <li><a class="active" href="dietolog.php"> Πίσω</a></li>
            <li class="logout">
                <a href="functions/logout.php">Έξοδος</a>
                    </li>
             </ul>
          <?php
           include 'functions/connect.php';
              if(isset($_GET['set'])){
                     $var=$_GET['set'];
                     session_start();
                     $_SESSION['customer']=$var;
                   
                    }
                else {
                         session_start();
                         $var=$_SESSION['customer'];
                         }
              $sql="SELECT * FROM customer WHERE Id=$var";
                if ($result = $mysqli->query($sql)){
                  if($result->num_rows >0){
                      while($row= mysqli_fetch_assoc($result)){
                         $user= $row['USERNAME'];                 
                         $pass=$row['Password'];
                         $sname=$row['SecondName'];
                         $weight=$row['Weight'];
                         $gender=$row['Gender'];
                         $age=$row['Age'];
                         $comment=$row['Comments'];
                         $id=$row['Id'];
                      } 
                    }
              }
?>
    <div class="content">
       
        <form  name="Name" action="functions/action.php" method="post" >
            <input id="image" type="image" src="/img/close.png" alt="secured" value="" onclick="imagechange();return false"/>
            <label id="key">"Κλειδί" Χρήστη:</label> <?php echo $id?><br>
            <fieldset class="personal-information"disabled="true">
                <label>Όνομα Χρήστη:</label> <input type="text" name="UserName" value="<?php echo $user?>" size="20" class="username" required="true"/>
            <br>
           <label> Κωδικός:</label><input type="text" name="password" value="<?php echo $pass?>" size="20" class="paswd" required="true"/>  
            <br>
           <label>Επίθετο:</label> <input type="text" name="sname" value="<?php echo $sname?>" size="20" class="sname" required="true"/>
           <br> 
           </fieldset>
            <fieldset class="attribute" disabled="true">
           <label>Βάρος:</label> <input type="text" name="weight" value="<?php echo $weight?>" size="20" class="weight" required="true"/>
           <br> <!--input type="text" value=" " size="20"  required="true" -->
           <label>Φύλλο:</label> <select class="gender"  name="gender">
               <option value="<?php echo $gender?>" name="gender"><?php echo $gender?></option>
               <?php if ($gender=="male") $tag='female'; else $tag='male';?>
               <option value="<?php echo $tag?>" ><?php echo $tag?></option>
           </select>
           <br> 
           <label>Ηλικία:</label> <input type="text" name="age" value="<?php echo $age?>" size="20" class="age" required="true"/>
           <br>       
           <label>Σχόλια:</label><input type="text" name="comment" value="<?php echo $comment?>" class="comment"/>
           </fieldset>
            <input type="submit" name="refresh" class="refresh" value="Ανανέωση" disabled="true"/>
        </form>
</div>
     <aside>
     <div class="meal">
         <form name="meal_input" action="functions/new_meal.php" method="post">
             <fieldset class="control">
              <label>Γεύμα: </label><select class="eidos" name="eidos" >
                     <option value="breakfast">Πρωινό</option>
                     <option value="around10">Δεκατιανό</option>
                     <option value="launch">Μεσημεριανό</option>
                     <option value="dinner">Βραδυνό</option>
                 </select>
              <label>Για την ημερομηνία:</label><input type="text" id="datepicker"  class="datepicker" name="datepicker" required="true"/>
             </fieldset>
             <fieldset class="recipe">
                 <legend>Προετοιμασία</legend>
                 <textarea name="recipe" rows="20" cols="70"></textarea>
             </fieldset>
             <input type="submit" value="εισαγωγή" class="in-meal"/>
         </form>
         
         
     </div>
        </aside>                    
    <div class="buttons">                     
      <hr id="pasport">
    </div>        
                               
    </body> 
</html>