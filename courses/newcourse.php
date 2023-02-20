<?php
require("../app/app.php");
include("../check.php");

if(isset($_POST['newcourse'])){
 
 $title = defend($_POST['txtcourse']);
 $instruct = $usersession;
 $outcome = defend($_POST['txtoutcome']);
 $eligible = defend($_POST['txteligible']);
 $describe = defend($_POST['txtdesc']);
 
 $insert = "INSERT INTO courses(course_code,course_title,course_instruct,course_description,course_outcome,course_eligibility) 
 VALUES (NULL,:title,:instruct,:describe,:outcome,:eligible)"; 

    $check_insert = $dba->prepare($insert);
    
    $check_insert->bindParam(":title", $title);
    $check_insert->bindParam(":instruct", $instruct);
    $check_insert->bindParam(":describe", $describe);
    $check_insert->bindParam(":outcome", $outcome);
    $check_insert->bindParam(":eligible", $eligible);
    
    $check_insert->execute();
 
 if($check_insert){
 echo "<script>alert('New Course created!');
      window.location.replace('../clist.php')
      </script>;";
}
else {
 echo "<script>alert('Sorry, try again!');</script>";
}
}


view("newcourse");