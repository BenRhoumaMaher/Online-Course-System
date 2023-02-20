<?php 

function view($page) {
    GLOBAL 
    $dba, 
    $course,
    $instructor,
    $titleval,
    $describeval,
    $outcomeval,
    $contents,
    $name,
    $usersession,
    $category,
    $eligibleval;
    require (APP_PATH . "views/$page.view.php");
}

function defend($value) {
    return trim(htmlspecialchars($value));
}