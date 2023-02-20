<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
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
            <li><a href="../courses/courses.php" title="About">Courses</a>
            </li>
            <li><a href="../authentification/" title="Contact">Login</a>
            </li>
        </ul>
    </nav>
    <main>
        <section>
            <?php
echo "<h3>Hello ".$name."</h3>";
echo "<p><a href='dashboard.php'>Dashboard</a>&emsp;<a
href='logout.php'>Logout</a></p>";
$str = '';
$details = '';
if($category == 'instructor'){
 $str = "SELECT * FROM instructors WHERE instruct_mail =
'$usersession'";
}
if($category == 'learner'){
 $str = "SELECT * FROM learners WHERE learn_mail =
'$usersession'";
}
$fetch_details = $dba->prepare($str);
$fetch_details->execute();
$fetch = $fetch_details->fetch();
if($fetch){
 $details = $fetch[2];
}
?>
            <form method="post" name="frmpwd">
                <p><input type="password" name="txtoldpwd" size="40" placeholder="Enter your old Password" required></p>
                <p><input type="password" name="txtnewpwd" size="40"
                        placeholder="Enter your new Password 8-15 characters" required></p>
                <p><input type="submit" name="changepwd" value="Change
Password" class="frmbtn"></p>
            </form>
            <p>
                <hr>
            </p>
            <form method="post" name="frmprofile">
                <p><input type="text" name="txtname" size="40" value="<?php
echo $name; ?>" required></p>
                <p><textarea name="txtdetails" cols="40" required><?php echo
$details; ?></textarea></p>
                <p><input type="submit" name="changeprofile" value="Update
Profile" class="frmbtn"></p>
            </form>
        </section>
    </main>

    <?php  include "footer.view.php" ; ?>
</body>

</html>