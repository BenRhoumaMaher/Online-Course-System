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
            <h3> Add Content to Course </h3>
            <p><a href='../clist.php'>Back to Courses</a></p>
            <p>
            <form method="post" name="frmnewcontent" enctype="multipart/form-data">
                <p><input type="text" name="txtcontent" size="60" placeholder="Enter Content Title" required></p>
                <input type="hidden" name="txtcourse" value="<?php echo $course; ?>">
                <p>Allowed extensions: txt, rtf, doc, docx, pdf, ppt, pptx,
                    mp4
                    <input type="file" name="txtfile" id="txtfile" required>
                </p>
                <p><input type="submit" name="upload" value="Upload" class="frmbtn"></p>
            </form>
            </p>
        </section>
        <section>
            <h3> Uploaded Contents </h3>
            <?php
$fetch_contents = "SELECT * FROM contents WHERE course_code = '$course'";
$content = $dba->prepare($fetch_contents);
$content->execute();


$contentnum = $content->rowCount();
$contentfetch = $content->fetchAll(PDO::FETCH_OBJ);
if($contentnum == 0){
 echo "No contents uploaded in this course!";
}
else{
 echo "<table style='margin: 0 10px; text-align:left;'>";
 echo "<tr>";
 echo "<th style='width: 50%'> Content Title </th>";
 echo "<th style='width: 40%'> Content File Path </th>";
 echo "<th style='width: 10%'> Delete Content </th>";
 echo "</tr>";
}
foreach($contentfetch as $fetched){
 echo "<tr>";
 echo "<td>$fetched->content_title</td>";
 echo "<td>$fetched->content_file</td>";
 echo "<td><a href='uploadcontent.php?delete=$fetched->content_id&&course=$course'>Delete</a></td>";
 echo "</tr>";
}
echo "</table>";
?>
        </section>

    </main>
    <?php  include "footer.view.php" ; ?>
</body>

</html>