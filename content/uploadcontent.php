<?php

require("../app/app.php");

include('../check.php');

$course = '';
if(isset($_REQUEST['cid'])){
 $course = $_REQUEST['cid'];
}


if(isset($_REQUEST['delete']))
{
 $id = $_REQUEST['delete'];
 $course = $_REQUEST['course'];
 $url = '';   
 $getpath = "SELECT * FROM contents WHERE content_id = '$id'";
 $content = $dba->prepare($getpath);
 $content->execute();
 $path = $content->fetch();
 if($path){
 $url = $path[3];
 }
 $delete1 = "DELETE FROM contents WHERE content_id = '$id'";
 $delete2 = unlink($url);
 if($delete1 and $delete2){
 echo "<script>alert('Content deleted!');</script>";
 }
}


if(isset($_POST['upload'])){

 $title = $_POST['txtcontent'];
 $course = $_POST['txtcourse'];
 $filename = $_FILES['txtfile']['name'];
 $filetmp =$_FILES['txtfile']['tmp_name'];
 $filestring = explode('.',$_FILES['txtfile']['name']);
 $file_ext= strtolower(end($filestring));

$exts = array('txt','rtf','doc','docx','pdf','ppt','pptx','mp4');

 if(in_array($file_ext,$exts)===false){
 echo "<script>alert('You can upload only txt, rtf, doc,
docx, pdf, ppt, pptx, mp4 files');</script>";
 }
 else{
 $newpath = 'uploads/';
 if (!is_dir($newpath)) {
 mkdir($newpath, 0777, true);
 }
 $filepath = $newpath.strtotime("now").'.'.$file_ext;
 move_uploaded_file($filetmp,$filepath);

$insert = "INSERT INTO contents VALUES (NULL, :title, :course, :filepath)";

$check_insert = $dba->prepare($insert);
    
$check_insert->bindParam(":title", $title);
$check_insert->bindParam(":course", $course);
$check_insert->bindParam(":filepath", $filepath);

$check_insert->execute();
 
if($check_insert){
 echo "<script>alert('Content Uploaded successfully!');
</script>";
 }
 else{
 echo "<script>alert('Something went wrong, Try
again!');</script>";
 }
 }
}







view("upload");