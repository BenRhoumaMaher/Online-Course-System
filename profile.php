<?php 
include ("check.php");
require("app/app.php");

if(isset($_POST['changepwd'])){

 $oldpassword = $_POST['txtoldpwd'];
 $newpassword = $_POST['txtnewpwd'];
 $get_password = "SELECT * FROM userlogin WHERE user_mail = '$usersession'";
 $smt = $dba->prepare($get_password);
 $smt->execute();
 $pwd = $smt->fetch();

 if(password_verify($oldpassword,$pwd['user_pwd'])){
 
 $hashed = password_hash($newpassword,PASSWORD_DEFAULT);
 $updatepwd = "UPDATE userlogin SET user_pwd = '$hashed' WHERE user_mail = '$usersession'";
 $smtd = $dba->prepare($updatepwd);
 $smtd->execute();
 if($smtd){
 echo "<script>alert('Password changed! Login with new password!');
 window.location.replace('authentification/logout.php');</script>";
 }
 }
 else{
    echo "<script>alert('Old password is wrong!');</script>";
    }
 }


 if(isset($_POST['changeprofile'])){

    $newname = $_POST['txtname'];
    $newdetails = $_POST['txtdetails'];

    if($category == 'instructor'){
    $updateprofile1 = "UPDATE instructors SET instruct_name =
   '$newname' WHERE instruct_mail = '$usersession'";

    $updateprofile2 = "UPDATE instructors SET instruct_details
   = '$newdetails' WHERE instruct_mail = '$usersession'";
    }

    if($category == 'learner'){
    $updateprofile1 = "UPDATE learners SET learn_name =
   '$newname' WHERE learn_mail = '$usersession'";

    $updateprofile2 = "UPDATE learners SET learn_details =
   '$newdetails' WHERE learn_mail = '$usersession'";
    }

    $details = $dba->prepare($updateprofile1);
    $details->execute();

    $det = $dba->prepare($updateprofile2);
    $det->execute();

    if($details and $det){
    echo "<script>alert('Profile Updated!');</script>";
    }
   }

   require("views/profile.view.php");
?>