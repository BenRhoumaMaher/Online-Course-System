<?php
session_start();
if(isset($_SESSION['usersession'])){
    echo "<script>window.location.replace('../dashboard.php')
   </script>";
   }   
require("../app/app.php");

$auth = true;
$hashedpwd = '';

if(isset($_POST['login'])){
 $username = defend($_POST['txtuser']);
 $password = defend($_POST['txtpwd']);

 $select_user = "SELECT * FROM userlogin WHERE user_mail=:username";
    
 $check_select = $dba->prepare($select_user);
 
 $check_select->bindParam(":username", $username);
    
 $check_select->execute();
 $user = $check_select->fetch();

 if($user){
 $hashedpwd = $user[1];
 }
 else{
 $auth = false;
 }
 
 if(!password_verify($password,$hashedpwd)){
 $auth = false;
 }
 
 if($auth){
 $_SESSION['usersession'] = $username;
 echo "<script>window.location.replace('../dashboard.php')
</script>";
 }
 else{
 echo "<script>alert('Invalid username or password!')
</script>";
 }
}




view("login");