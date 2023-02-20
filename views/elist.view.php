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
echo "<p><a href='./authentification/logout.php'>Logout<a/></p>";

$fetch_enrolls = "SELECT * FROM enroll WHERE learn_mail = '$usersession'";
$smtd = $dba->prepare($fetch_enrolls);
$smtd->execute();
$numd = $smtd->rowCount();
$fetch = $smtd->fetchAll(PDO::FETCH_OBJ);
if($numd == 0){
 echo "No enrollments so far!";
}
else{
 echo "<table style='margin: 0 5%;text-align:left;'>";
 echo "<tr>";
 echo "<th style='width:30%;'> Course Title </th>";
 echo "<th style='width:15%;'> Start Date </th>";
 echo "<th style='width:15%;'> Completion Date </th>";
 echo "<th style='width:15%;'> Access Content </th>";
 echo "<th style='width:15%;'> Progress </th>";
 echo "</tr>";
}
foreach($fetch as $fetched){
 echo "<tr>";
 $get_coursetitle = "SELECT * FROM courses WHERE course_code = '$fetched->enroll_id'";
$smta = $dba->prepare($get_coursetitle);
$smta->execute();
$coursetitle = $smta->fetch();
 echo "<td>".$coursetitle[1]."</td>";
 echo "<td>$fetched->learn_start</td>";

 if($fetched->learn_end == NULL){
 echo "<td>Not completed</td>";
 }
 else{
 echo "<td>$fetched->learn_end</td>";
 }
 echo "<td>";
 echo "<form method='post' action='content/contents.php'><input
type='hidden' name='txtcourse' value='$fetched->course_code'>";
 echo "<input type='submit' name='access' value='View'
class='frmbtn'></form>";
 echo "</td>";
 echo "<td><progress id='progress'
value='".get_progress($dba,$fetched->enroll_id)."' max='100'>
</progress> ".get_progress($dba,$fetched->enroll_id)."%</td>";
 echo "</tr>";
}
echo "</table>";
?>
        </section>
    </main>

    <?php  include "footer.view.php" ; ?>
</body>

</html>