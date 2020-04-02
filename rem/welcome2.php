<?php  
 require('db_connect.php');
session_start();            //Session Start  
$dbaccess = $_SESSION['dbaccess'];
$usertype= "Regular User";
if($dbaccess == "agent")
{
    $usertype = "Elevated Access User";
}
else if($dbaccess == "administrator")
{
    $usertype= "Administrator";
}

else if($dbaccess == "regular")
{
    $usertype= "Regular User";
}
else{
    
}
 ?>

<!DOCTYPE html>
<html>

<head>
    <title>realestatemanagement.com/Signup Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/rem.css">
</head>

<body background="img/welcome.jpg" style="max-width:100%;height:auto;">

    <!-- Sidebar -->
    <div class="menu">
        <ul>

            <li><a href="welcome2.php">Welcome</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <?php
            if($dbaccess == 'administrator' || $dbaccess == "agent")
            {
            ?>
            <li><a href="users.php">Users</a></li>
            <?php
            }
            ?>
            <?php 
            if($dbaccess == 'administrator')
            {
            ?>
            <li>
                <a href="access_request.php">Access Requests</a>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>

    <div class="REM">
        <h1>REAL ESTATE MANAGEMENT</h1>
    </div>

    <div class="ruser">
        <h2><?php echo  "Welcome ".$usertype ?></h2>
    </div>


    <div class="logoutlink">
        <a href="login.php">Logout</a> </div>
</body>

</html>
