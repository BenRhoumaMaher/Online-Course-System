<?php  include "header.view.php" ; ?>

<body>
    <header>
        <h1> Upload Content </h1>
    </header>
    <nav>
        <button> Click for Menu </button>
        <ul>
            <li><a href="../index.php" title="Home">Home</a></li>
            <li><a href="../courses/courses.php" title="About">Courses</a>
            </li>
            <li><a href="../authentification/login.php" title="Contact">Login</a>
            </li>
        </ul>
    </nav>
    <main>
        <section>
            <?php
echo "<h3>Hello ".$name."</h3>";
echo "<p><a href='../elist.php'>Back to Enrollments</a></p>";
echo "<p>";
echo "<form method='post'>";
echo "<input type='hidden' name='txtcourse' value='$course'>";
echo "<select name='txtcontent'>";
echo "<option value='999'>Choose the content title</option>";

$fetch_contents = "SELECT * FROM contents WHERE course_code = $course";
$content = $dba->prepare($fetch_contents);
$content->execute();
$fetch = $content->fetchAll(PDO::FETCH_OBJ);

foreach($fetch as $fetched){
 echo "<option value='$fetched->content_id'>$fetched->content_title</option>";
}
echo "</select>";
echo "<input type='submit' name='getcontent' value='Go'
class='frmbtn'>";
echo "</form>";
echo "</p>";
?>
        </section>
        <section>
            <?php
if(($contents == 999) || ($contents == 0)){
 echo "Please choose a content title!";
}
else{
 $fetch_content = "SELECT * FROM contents WHERE content_id = $contents";
 $contenta = $dba->prepare($fetch_content);
 $contenta->execute();
 $fetcha = $contenta->fetch();

 if($fetcha){
    echo "<h4>".$fetcha[1]."</h4>";
    $filestring = explode('.',$fetcha[3]);
    $file_ext= strtolower(end($filestring));
    $exts = array('doc','docx','ppt','pptx');
    if(in_array($file_ext,$exts)){
    echo "<p>The content will be downloaded!</p>";
    }
    echo "<p><iframe src='$fetcha[3]' height='auto' width='80%'
   height='500px' frameborder='0'></iframe></p>";

    $get_enrolid = "SELECT * FROM enroll WHERE learn_mail = '$usersession' AND course_code = '$course'";
    $contentsw = $dba->prepare($get_enrolid);
    $contentsw->execute();
    $enrolid = $contentsw->fetch();
    
    $eid = $enrolid[0];

    $check_records = "SELECT * FROM record WHERE enroll_id = $eid AND content_id = '$contents'";
    $cont = $dba->prepare($check_records);
    $cont->execute();
    $num = $cont->rowCount();

    if($num == 0){
    "INSERT INTO record VALUES ($eid,$contents)";
    }
    if(get_progress($dba,$eid) == 100){
    "UPDATE enroll SET learn_end = NOW() WHERE enroll_id = $eid";
    }
   }
}
?>
        </section>
    </main>
    <?php  include "footer.view.php" ; ?>
</body>

</html>