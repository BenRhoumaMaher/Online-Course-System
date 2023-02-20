<?php  include "header.view.php" ; ?>

<body>
    <header>
        <h1> Online Course Project </h1>
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
            <h3> Edit Course Details </h3>
            <p>
            <form method="post" name="frmeditcourse">
                <input type="hidden" name="txtcourse" value="<?php echo $course; ?>">
                <p><input type="text" name="txtcourse" size="60" value="<?php
echo $titleval; ?>"></p>
                <p><textarea name="txtdesc" cols="60"><?php echo
$describeval; ?></textarea></p>
                <p><textarea name="txtoutcome" cols="60"><?php echo
$outcomeval; ?></textarea></p>
                <p><textarea name="txteligible" cols="60"><?php echo
$eligibleval; ?></textarea></p>
                <p><input type="submit" name="editcourse" value="Update
Course" class="frmbtn"></p>
            </form>
            </p>
        </section>
    </main>

    </main>
    <?php  include "footer.view.php" ; ?>
</body>

</html>