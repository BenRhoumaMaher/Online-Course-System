<?php 
require ("app/connect.php");
session_start();
function get_category($dba,$id){
$get_cat = "SELECT * FROM userlogin WHERE user_mail = '$id'";
$smt = $dba->prepare($get_cat);
$smt->execute();
$cat = $smt->fetch();
 if($cat){
 return $cat[2];
 }
}
function get_name($dba,$id,$cat){
GLOBAL $dba;
 $str = '';
 if($cat == 'instructor'){
 $str = "SELECT * FROM instructors WHERE instruct_mail ='$id'";
 }
 if($cat == 'learner'){
 $str = "SELECT * FROM learners WHERE learn_mail = '$id'";
 }
$smt = $dba->prepare($str);
$smt->execute();
$name = $smt->fetch();
 if($name){
 return $name[1];
 }
}

function get_progress($dba,$id){
    
    // Using enroll id we find the learner id and course code.
    $get_enrols = "SELECT * FROM enroll WHERE enroll_id = $id";
    $smta = $dba->prepare($get_enrols);
    $smta->execute();
    $enrol = $smta->fetch();
    $progress = 0;

    if($enrol){
    $enrolid = $enrol[0];
    $course = $enrol[2];
    // initialize learner’s completion - $completed to zero.
    $completed = 0;
    
    // Using course code, we retrieve all contents associated with it
    $contents = "SELECT * FROM contents WHERE course_code = $course";
    $smtl = $dba->prepare($contents);
    $smtl->execute();
    $content = $smtl->fetchALL(PDO::FETCH_OBJ);
    // We assign contents count to $total 
    $total = $smtl->rowCount();
    
    // For every content id, we find if there is an entry in record table by asking is 
    // there any record with the enroll id and content id in the record table.
    foreach($content as $contents){

    $contentid = $contents->content_id;

    // the count of contents for a particular course
    $records = "SELECT * FROM record WHERE enroll_id = '$enrolid' AND content_id = '$contentid'";
    $smtq = $dba->prepare($records);
    $smtq->execute();
    $contentn = $smtq->rowCount();

    // If there is an entry, we increment the value of $completed variable.
    if($contentn == 1){
    $completed = $completed + 1;
    }
    // For progress calculation, we use simple mathematics (completed / total * 100), 
    // round the value and return the same.
    $progress = round(($completed / $total) * 100);
    }
    }
    // In case, the learner has not started learning, we will return $progress variable's 
    // initial value which is zero.
    return $progress;
   }
   

$usersession = "";
$category = "";
$name = "";

if(isset($_SESSION['usersession'])){
    GLOBAL $dba;
 $usersession = $_SESSION['usersession'];
 $category = get_category($dba,$usersession);
 $name = get_name($dba,$usersession,$category);
}
else{
    echo "<script>window.location.replace('authentification/login.php');
    </script>";
}