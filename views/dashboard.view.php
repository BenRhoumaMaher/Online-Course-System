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
echo "<p><a href='./authentification/logout.php'>Logout</a></p>";
echo "<div class='cl'>";
if($category == 'instructor'){
 echo "<h3><a href='./clist.php'>Courses<a/></h3>";
 echo "<p>Manage Courses, Content and Reports</p>";
}
if($category == 'learner'){
 echo "<h3><a href='elist.php'>Enrolments<a/></h3>";
 echo "<p>Enrolled Courses and Content Access</p>";
}
echo "</div>";
echo "<div class='cl'>";
echo "<h3><a href='./profile.php'>Profile<a/></h3>";
echo "<p>Change password and Profile</p>";
echo "</div>";
?>
        </section>
    </main>
    <?php  include "footer.view.php" ; ?>
</body>

</html>