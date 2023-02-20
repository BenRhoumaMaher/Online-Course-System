<?php
include ('../app/app.php');
include ('../check.php');
$course = 0;
$contents = 0;
if(isset($_POST['access'])){
 $course = $_POST['txtcourse'];
}
if(isset($_POST['getcontent'])){
    $course = $_POST['txtcourse'];
    $contents = $_POST['txtcontent'];
   }
   
view("content");
?>