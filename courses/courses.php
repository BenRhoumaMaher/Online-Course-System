<?php 
session_start();
require("../app/app.php");

if(isset($_POST['enroll'])){
    if(isset($_SESSION['usersession'])){
        
    $usersession = $_SESSION['usersession'];
    $course = $_POST['txtcourse'];

    $get_enrol = "SELECT * FROM enroll WHERE learn_mail = '$usersession' AND course_code = $course";
    $smt = $dba->prepare($get_enrol);
    $smt->execute();
    $num = $smt->rowCount();

    if($num == 0){

    $enrol = "INSERT INTO enroll VALUES (NULL,'$usersession','$course',DEFAULT,NULL)";
    $smtd = $dba->prepare($enrol);
    $smtd->execute();

    if($smtd){
    echo "<script>alert('You are enrolled!');
    window.location.replace('../elist.php');</script>";
    }
    }
    else{
    echo "<script>alert('You are already enrolled!');
    window.location.replace('../elist.php');</script>";
    }
    }
    else{
    echo "<script>alert('Please login and enroll!');
   </script>";
    }
   }
   











view("courses");