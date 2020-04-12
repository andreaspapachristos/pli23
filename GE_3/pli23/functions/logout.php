<!--/*
Συνάρτηση για την έξοδο από το σύστημα. Εδώ γίνεται unset η μεταβλητή $_SESSION['userid']
έτσι ώστε να υπάρχει πρόσβαση στις παρακάτω ιστοσελίδες αν δεν προηγηθεί η διαδικασία του 
login. Το κόλπο δυστυχώς δεν έχει "μεγάλη επιτυχία"
*/-->

<?php

    session_start();
    session_unset($_SESSION['userid']);
    session_destroy();
    header("location:../index.php");
   

?>
