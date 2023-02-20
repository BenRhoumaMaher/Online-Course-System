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
            <h3> User Login </h3>
            <p>
            <form method="post" name="frmlogin">
                <p><input type="email" name="txtuser" size="40" placeholder="Enter your email"></p>
                <p><input type="password" name="txtpwd" size="40" placeholder="Enter your password"></p>
                <p><input type="submit" name="login" value="Login" class="frmbtn"></p>
            </form>
            </p>
            <p>
                New learner or instructor ? <a href="register.php">Register here</a>
            </p>
        </section>
    </main>

    <?php  include "footer.view.php" ; ?>
</body>

</html>