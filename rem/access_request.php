<?php  
 require('db_connect.php');

 /*$sql ="SELECT * FROM userdata LIMIT 10;";  
 $result = mysqli_query($conn,$sql);



while($row = mysqli_fetch_assoc($result)){
                        $uid = $row['userid'];
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $access = $row['access'];
                        $dep = $row['dep'];
                    ?>
<tr>
    <td><?php echo $uid; ?></td>
    <td><?php echo $fname; ?></td>
    <td><?php echo $lname; ?></td>
    <td><?php echo $access; ?></td>
    <td><?php echo $dep; ?></td>
</tr> */ //End of while

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <title>ACCESS REQUEST</title>
    <link rel="stylesheet" href="css/rem.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
</head>

<body background="img/profile.jpg">

    <div class="menu">
        <a href="welcome.php" class="sidebar">Welcome</a>
        <a href="profile.php">My Profile</a>
        <a href="users.php">Users</a>
        <a href="access_request.php">Access Requests</a>

    </div>
    <h1>ACCESS REQUEST</h1>

    <body>
        <br /><br />
        <div class="usercontainer">

            <br />
            <div class="table-responsive">
                <table id="userdata" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>userid</td>
                            <td>fname</td>
                            <td>lname</td>
                            <td>access</td>
                            <td>dep</td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Ankush</td>
                            <td>Sharma</td>
                            <td>administrator</td>
                            <td>sales</td>

                        </tr>
                        <tr>
                            <td>002</td>
                            <td>inder</td>
                            <td>singh</td>
                            <td>agent</td>
                            <td>registration</td>

                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Bawan</td>
                            <td>kaur</td>
                            <td>user</td>
                            <td>Property Evaluation</td>

                        </tr>
                        <tr>
                            <td>004</td>
                            <td>ANKUSH</td>
                            <td>ANKUSH</td>
                            <td>agent</td>
                            <td>sales</td>

                        </tr>
                    </tbody>


                </table>
            </div>
        </div>
    </body>
    <div class="logoutlink"> <a href="login.php">Logout</a> </div>
</body>

</html>
<script>
    $(document).ready(function() {
        $('#userdata').DataTable();

    });

</script>
