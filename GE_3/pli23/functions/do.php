<!--
Η συνάρτηση αυτή καλείται κατά την διαδικασία του login και σκοπός της είναι να εμφανίσει
μήνυμα λάθους σε περίπτωση λάθους, ενώ στην περίπτωση σωστής εισόδου στο σύστημα κάνει τα 
ανάλογα redirect.
-->

<?php
include 'login.php';

if(login()){

    $_SESSION['username']=$_POST['User_name'];
    if(isset($_POST['dietist'])){
     
    header("location:../dietolog.php");}
    else{  
      header("location:../customer.php");  
    }
    exit();
}
 else {
    session_start();
    $_SESSION['msg']="<small>Λάθος συνδυασμός Χρήστη-Κωδικού</small>";
   
    header("location:../index.php");
    exit();
}


?>

