<?php 
include('app/app.php');
include('check.php');
if($category == 'learner'){
 header('authentification/logout.php');
}

require("views/clist.view.php");