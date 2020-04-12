<!DOCTYPE html>
<html>
    <head>
        <title>Health Mission</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/main.css" rel="stylesheet" type="text/css" media="screen">
        <script type="text/javascript" src="js/jquery-2.2.0.js"></script>
    </head>
  <!--  <?php define('$lock', true);
          
         ?> -->
    <body>
       
        <header id="st">
            <p id="title"> Διαχείριση Σωματικού Βάρους  < <small> < </small></p>
            <div id="circle">
           <canvas  class="cicle" width="200" height="200">
                
            </canvas>
         </div>
        </header>
        <hr>
        <div id="customer">
          
       
            <article id="eisagogi">
                <p id='kalosorisma'>
                Καλώς ήρθατε στην σελίδα της υγιεινής διατροφής.
                Για να συνδεθείτε θα πρέπει να εισάγετε το όνομα χρήστη και τον κωδικό
                που σας έχουμε αποστείλει</p>
                <p id='perigrafi'>
                <br>
                αν ειστε Διαιτολόγος τσεκάρετε το αντίστοιχο πλαίσιo
                </p>
            </article>
        </div>
        <div id="diaitolog">
            <form method="Post" name="login" action="functions/do.php" onsubmit="return (validate_string());">
                <fieldset>
                    <ul>
                        <li>
                            <label for="User_name">User Name:</label>
                            <input type="text" id="User_name" name="User_name" class="name" required="required" placeholder="Όνομα Χρήστη" autofocus="autofocus" />
                        </li>
                        <li id="pass">
                            <label for="Passwd">Password:</label>
                            <input type="password" id="Passwd" name="Passwd" required="required" placeholder="Κωδικός Χρήστη"/>
                        </li>
                        <li>
                            <input type="checkbox" id="checkbox" name="dietist" value="ON"  />
                            <h4 > Διαιτολόγος</h4>  
                        </li>
                    </ul>
                   <span class="login">
                       <input type="submit" value="Είσοδος" name="login"/>  
                   </span> 
                     <div class="error_login"> 
                       <?php session_start(); if (isset($_SESSION['msg'])) { echo $_SESSION['msg']; } unset($_SESSION['msg']) ?>
                   </div>
                </fieldset> 
            </form>
        </div>
        <hr id="close">
        <hr id="close1">
        <footer>
            <address>επικοινωνία στην διεύθυνση:
            <a href="mailto:std069040@ac.eap.gr">std069040@ac.eap.gr</a>
            </address>
            <img alt="icon" src="img/gentoo_logo.jpg" />
            <canvas class="foot" width="80" height="80">        
            </canvas>
            
        </footer>
    </body>
</html>
