<?php
session_start();
if(isset($_SESSION['usersession'])){
 unset($_SESSION['usersession']);
}
header("location:login.php");
?>