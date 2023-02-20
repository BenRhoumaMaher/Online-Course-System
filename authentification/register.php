<?php
require("../app/app.php");

if(isset($_POST['register'])){
    
    $category = defend($_POST['txtusercategory']);
    $usermail = defend($_POST['txtmail']);
    $userpwd = defend($_POST['txtpwd']);
    $name = defend($_POST['txtname']);
    $details = defend($_POST['txtdetails']);
   
    $userpwd = password_hash($userpwd, PASSWORD_DEFAULT);
        
    $insert1 = "INSERT INTO userlogin(user_mail,user_pwd,user_category) VALUES (:usermail,:userpwd,:category)";
    
    GLOBAL $dba;
    $check_insert1 = $dba->prepare($insert1);
    
    $check_insert1->bindParam(":usermail", $usermail);
    $check_insert1->bindParam(":userpwd", $userpwd);
    $check_insert1->bindParam(":category", $category);
    
    $check_insert1->execute();
    
    if($category == 'learner'){

    $insert2 = "INSERT INTO learners(learn_mail,learn_name,learn_details) VALUES (:usermail,:name,:details)";
    GLOBAL $dba;    
    $check_insert2 = $dba->prepare($insert2);
    
    $check_insert2->bindParam(":usermail", $usermail);
    $check_insert2->bindParam(":name", $name);
    $check_insert2->bindParam(":details", $details);
    
    $check_insert2->execute();
    
}
    if($category == 'instructor'){
    GLOBAL $dba;
    $insert2 = "INSERT INTO instructors(instruct_mail,instruct_name,instruct_details) VALUES (:usermail,:name,:details)";

    $check_insert2 = $dba->prepare($insert2);
    $check_insert2->bindParam(":usermail", $usermail);
    $check_insert2->bindParam(":name", $name);
    $check_insert2->bindParam(":details", $details);
    
    $check_insert2->execute();
    
    }
    
    if($check_insert1 and $check_insert2){
    
    echo "<script>alert('Registration successful!');
    window.location.replace('login.php');</script>";
    }
    else{
    echo "<script>alert('Sorry! Try again!');</script>";
    }
   }



view("register");