<?php  include "header.view.php" ; ?>

<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1> Details </h1>
    </header>
    <nav>
        <button> Click for Menu </button>
        <ul>
            <li><a href="../index.php" title="Home">Home</a></li>
            <li><a href="courses.php" title="About">Courses</a>
            </li>
            <li><a href="../authentification/login.php" title="Contact">Login</a>
            </li>
        </ul>
    </nav>
    <main>
        <section style="text-align:left;padding: 0 30px;">
            <h3>Course Details</h3>
            <?php
if(isset($_REQUEST['search'])){
 $search = $_REQUEST['search'];
}
$query = "SELECT * FROM courses WHERE course_code = $search";

$select_courses = $dba->prepare($query);

$select_courses->execute();
$selected = $select_courses->fetch();

if($selected){
 echo "<h4>".$selected[1]."</h4>";
 echo "<h5> Instructor: ";
 $find_instructor = "SELECT instruct_name FROM instructors WHERE instruct_mail = '$selected[2]'";
 $find = $dba->prepare($find_instructor); 
 $find->execute();
 
 $found = $find->fetch();
 
 echo $found['instruct_name'];
 echo "</h5>";
 echo "<h5>Description:</h5>";
 echo "<p>".$selected[3]."</p>";
 echo "<h5>Outcomes:</h5>";
 $temp = explode(",",$selected[4]);
 echo "<ul>";
 foreach($temp as $t){
 echo "<li>".$t."</li>";
 }
 echo "</ul>";
 echo "<h5>Eligibility:</h5>";
 $temp = explode(",",$selected[5]);
 echo "<ul>";
 foreach($temp as $t){
 echo "<li>".$t."</li>";
 }
 echo "</ul>";
 echo "</div>";
}
?>
        </section>
    </main>

    <?php  include "../views/footer.view.php" ; ?>
</body>

</html>