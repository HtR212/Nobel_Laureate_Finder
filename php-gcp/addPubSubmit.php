<?php
    include_once("./library.php"); // To connect to the database
?>
<html>
<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./home.php" style="color:#9370DB">Nobel Luareate Finder</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./profile.php">Profile</a>
            </li>
            <?php
                if($username=="root")
                echo "
                    <li class='nav-item'>
                        <a class='nav-link' href='./addPub.php'>Add Publication</a>
                    </li>
                ";
            ?>
        </ul>
            <?php
            if($login_button == '') {
                echo '<div style="padding-right: 0.1in">Welcome: '.$_SESSION['user_first_name'].'</div>';
                echo '<a href="logout.php"><img src="./media/google-logout.png" height="40" /></a>';
            }
            else {
                echo $login_button;
            }
            ?>
        </div>
        </div>
    </nav>
</body>
</html>
<?php
 $con = new mysqli($server, $username, $password, $dbname);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // Form the SQL query (an INSERT query)
 $sql="INSERT INTO individual_publication (id, publications)
 VALUES
 ('$_POST[id]','$_POST[publications]')";

 if (!mysqli_query($con,$sql))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "1 record added"; // Output to user
 mysqli_close($con);
?>