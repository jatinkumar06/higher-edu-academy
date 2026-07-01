 <?php
 session_start();
 include "../connection.php";

   
    
session_unset();     
session_destroy(); 
 echo "<script>alert('You have been logged out successfully.');window.location.href='login.php';</script>"; 
// header("Location: login.php");   
exit;
    ?>