<?php  include "../views/header.view.php" ; ?>
<?php


?>

<head>
    <style>
    .cl {
        margin: 5px;
        display: inline-block;
        vertical-align: top;
        width: 300px;
        height: 200px;
        border: 1px solid #ccc;
    }
    </style>

</head>

<body>
    <header>
        <h1> Courses </h1>
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
        <?php
$pattern = '';
$patternexist = false;
if(isset($_POST['searchcourse'])){
 $pattern = $_POST['txtsearch'];
 $patternexist = true;
}
?>
        <section>
            <h3>Courses</h3>
            <div>
                <form method="post" name="frmsearch">
                    <p><input type="search" name="txtsearch" size="60" value="<?php
            if($patternexist){echo $pattern; }?>"></p>
                    <p><input type="submit" name="searchcourse" class="frmbtn" value="Search Courses"></p>
                </form>
            </div>
            <?php
$query = "SELECT * FROM courses";

if($patternexist){
 $query = "SELECT * FROM courses WHERE course_title LIKE
'%$pattern%' OR course_description LIKE '%$pattern%'";
}

$check = $dba->prepare($query);
$check->execute();
$fetch = $check->fetchAll(PDO::FETCH_OBJ);

foreach($fetch as $fetching){
    echo "<div class='cl'>";
    echo "<h4><a href='details.php?
   search=$fetching->course_code'>$fetching->course_title<a/></h4>";
    echo "<p style='height:70px';>$fetching->course_description</p>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='txtcourse'
   value='$fetching->course_code'>";
    echo "<input type='submit' name='enroll' value = 'Enroll'
   class='frmbtn'>";
    echo "</form>";
    echo "</div>"; 
}
            ?>
        </section>
    </main>
    <?php  include "../views/footer.view.php" ; ?>
</body>

</html>