<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <style>
    .cl {
        margin: 5px;
        display: inline-block;
        vertical-align: top;
        width: 300px;
        height: 100px;
        border: 1px solid #ccc;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquer
y.min.js"></script>
    <script>
    $(document).ready(function() {
        if ($(window).width() > 600)
            $("ul").show();
        else
            $("ul").hide();
        $("button").click(function() {
            $("ul").slideToggle();
        });
    });
    </script>
</head>

<body>
    <header>
        <h1> Online Course Project </h1>
    </header>
    <nav>
        <button> Click for Menu </button>
        <ul>
            <li><a href="./index.php" title="Home">Home</a></li>
            <li><a href="./courses/courses.php" title="About">Courses</a>
            </li>
            <li><a href="./authentification/login.php" title="Contact">Login</a>
            </li>
        </ul>
    </nav>
    <main>
        <section>
            <?php

echo "<h3>Hello ".$name."</h3>";
echo "<p><a href='dashboard.php'>Dashboard</a>&emsp;<a
href='authentification/logout.php'>Logout<a/></p>";
echo "<h4><a href='courses/newcourse.php'>Add New Course</a></h4>";
$fetch_courses = "SELECT * FROM courses WHERE course_instruct = '$usersession'";
$smt = $dba->prepare($fetch_courses);
$smt->execute();
$num = $smt->rowCount();
$fetch = $smt->fetchAll(PDO::FETCH_OBJ);
if($num == 0){
 echo "No courses created so far!";
}

else{
 echo "<table style='margin:0 10%;width:80%;;textalign:left;'>";
 echo "<tr>";
 echo "<th style='width:40%;'> Course Title </th>";
 echo "<th style='width:10%;'> Edit Details </th>";
 echo "<th style='width:10%;'> Manage Content </th>";
 echo "<th style='width:20%;'> Learners Count </th>";
 echo "</tr>";
}

foreach($fetch as $fetched){

 echo "<tr>";
 echo "<td>$fetched->course_title</td>";
 echo "<td><a href='./courses/editcourse.php?cid=$fetched->course_code'>Edit</td>";
 echo "<td><a href='./content/uploadcontent.php?cid=$fetched->course_code'>Add</td>";

 $get_enrols = "SELECT * FROM enroll WHERE course_code=$fetched->course_code";
 echo "<td>";
 $smtd = $dba->prepare($get_enrols);
 $smtd->execute();
 $numd = $smtd->rowCount();
 if ($numd > 0){
 echo "&emsp;<a href='./reports.php?cid=$fetched->course_code'>View";
 }
 echo "</td>";
 echo "</tr>";
}
echo "</table>";
?>
        </section>
    </main>

    <?php  include "footer.view.php" ; ?>
</body>

</html>