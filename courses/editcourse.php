<?php
require("../app/app.php");

include('../check.php');

$course = '';
$instructor = $usersession;
if(isset($_REQUEST['cid'])){
 $course = $_REQUEST['cid'];
}


$get_details = "SELECT * FROM courses WHERE course_code = $course";

$smt = $dba->prepare($get_details);
$smt->execute();

$details = $smt->fetch();

if($details){
    $titleval = $details[1];
    $describeval = $details[3];
    $outcomeval = $details[4];
    $eligibleval = $details[5]; 
 
}

if(isset($_POST['editcourse'])){

    $course = defend($_POST['txtcourse']);
    $title = defend($_POST['txtcourse']);
    $describe = defend($_POST['txtdesc']);
    $outcome = defend($_POST['txtoutcome']);
    $eligible = defend($_POST['txteligible']);
    $update = false;
    
    if($title != $titleval){
    $course = $_REQUEST['cid'];
    $update1 = "UPDATE courses SET
    course_title = '$title' WHERE course_code = '$course'";
    $smt = $dba->prepare($update1);
    $smt->execute();
    $titleval = $title;
    $update = true;
    }

    if($describe != $describeval){
    $course = $_REQUEST['cid'];
    $update2 = "UPDATE courses SET
   course_description = '$describe' WHERE course_code =
   '$course'";
   $smt1 = $dba->prepare($update2);
   $smt1->execute();
    $describeval = $describe;
    $update = true;
    }

    if($outcome != $outcomeval){
    $course = $_REQUEST['cid'];    
    $update3 = "UPDATE courses SET
   course_outcome = '$outcome' WHERE course_code = '$course'";
   $smt2 = $dba->prepare($update3);
   $smt2->execute();
    $outcomeval = $outcome;
    $update = true;
    }

    if($eligible != $eligibleval){
    $course = $_REQUEST['cid'];
    $update4 = "UPDATE courses SET
   course_eligibility = '$eligible' WHERE course_code = '$course'";
   $smt3 = $dba->prepare($update4);
   $smt3->execute();
    $eligibleval = $eligible;
    $update = true;
    }

    if($update){
    echo "<script>alert('Course Updated!');
    window.location.replace('../clist.php');</script>";
    }
   }



view("editcourse");