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
            <li><a href="login.php" title="Contact">Login</a>
            </li>
        </ul>
    </nav>
    <main>
        <section>
            <h3> User Registration </h3>
            <p>
            <form action="" method="POST" name="frmregister">
                <p><select name="txtusercategory">
                        <option value="">Who are you?</option>
                        <option value="learner">Learner</option>
                        <option value="instructor">Instructor</option>
                    </select></p>
                <p><input type="email" name="txtmail" size="40" placeholder="Enter your Email Address" required></p>
                <p><input type="password" name="txtpwd" size="40" placeholder="Enter your Password 8-15 characters"
                        required>
                </p>
                <p><input type="text" name="txtname" size="40" placeholder="Enter you Full Name" required></p>
                <p><textarea name="txtdetails" cols="40" placeholder="Enter
your details" required></textarea></p>
                <p><input type="submit" name="register" value="Register" class="frmbtn"></p>
            </form>
            </p>
        </section>
    </main>

    </main>
    <?php  include "footer.view.php" ; ?>
</body>

</html>