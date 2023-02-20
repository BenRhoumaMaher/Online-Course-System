<?php  include "views/header.view.php" ; ?>

<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1> Online Course Project </h1>
    </header>
    <nav>
        <button> Click for Menu </button>
        <ul>
            <li><a href="index.php" title="Home">Home</a></li>
            <li><a href="courses/courses.php" title="About">Courses</a>
            </li>
            <li><a href="authentification/login.php" title="Contact">Login</a>
            </li>
        </ul>
    </nav>
    <main>
        <section>
            <h3>Welcome to Online Course System!</h3>
            <p style='text-align:left;'>In this web application, we will
                develop user-friendly application to enroll to courses. We
                primarily have 2 major users for this application: </p>
            <ul style='text-align:left;'>
                <li>Instructor - the one who develops course materials </li>
                <li>Learner - the one who studies those developed course
                    materials </li>
            </ul>
            <p style='text-align:left;'>
                The instructors develop course materials and upload the same
                in this website. Once the course is published, they appear in
                the search list. The learners browse through the course list
                and sneek into every detail. nce they are
                comfortable with a course, they enroll into it. Once they
                enroll, they can view the course materials. A progress track
                will be there to specify how far they have completed the
                course. When progress reaches 100%, it marks the course to be
                completed.
            </p>
            <p>
                For this application, we keep all courses free of cost!
            </p>
        </section>
        <article class="artclass">
            <div>
                <h3>Courses with enrollments</h3>
                <?php
require('app/app.php');
$get_courses = "SELECT * FROM courses";
$smt = $dba->prepare($get_courses);
$smt->execute();
$fetch = $smt->fetchAll(PDO::FETCH_OBJ);
$num = $smt->rowCount();

foreach($fetch as $fetchs){
 $enrols = "SELECT * FROM enroll WHERE course_code = $fetchs->course_code";
 $smta = $dba->prepare($enrols);
 $smta->execute();
 $numa = $smta->rowCount();
 echo "<p>$fetchs->course_title &emsp; - &emsp;$numa</p>";
}
?>
            </div>
            <div style='vertical-align:top;'>
                <h3>Instructors List</h3>
                <?php
$get_instr= "SELECT * FROM instructors";
$smtw = $dba->prepare($get_instr);
$smtw->execute();
$fetchw = $smtw->fetchAll(PDO::FETCH_OBJ);

foreach($fetchw as $fetchww){
 echo "<p>$fetchww->instruct_name - $fetchww->instruct_details</p>";
}
?>
            </div>
        </article>
    </main>
    <?php  include "views/footer.view.php" ; ?>
</body>

</html>