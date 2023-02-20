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
            <li><a href="../index.php" title="Home">Home</a></li>
            <li><a href="./clist.php" title="About">Courses</a>
            </li>
            <li><a href="./authentification/login.php" title="Contact">Login</a>
            </li>
        </ul>
    </nav>
    <main>
        <section>
            <?php
echo "<h3>Hello ".$name."</h3>";
echo "<p><a href='clist.php'>Back to Courses<a/></p>";

$fetch_enrols = "SELECT * FROM enroll WHERE course_code = $course";
$smt = $dba->prepare($fetch_enrols);
$smt->execute();
$num = $smt->rowCount();
$fetch = $smt->fetchAll(PDO::FETCH_OBJ);
if($num == 0){
 echo "No learners enrolled so far!";
}
else{
 echo "<table style='margin:0 10%;width:80%;;textalign:left;'>";
 echo "<tr>";
 echo "<th style='width:30%;'> Learner Name </th>";
 echo "<th style='width:30%;'> Learner Email </th>";
 echo "<th style='width:20%;'> Progress </th>";
 echo "</tr>";
}
foreach($fetch as $fetched){
 echo "<tr>";
 echo "<td>".get_name($dba,$fetched->learn_mail,'learner')."</td>";
 echo "<td>$fetched->learn_mail</td>";
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