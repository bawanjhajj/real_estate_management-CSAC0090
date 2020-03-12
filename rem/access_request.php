<?php  
 require('db_connect.php');

$sql ="SELECT * FROM accessdata LIMIT 10;";  
 $result = mysqli_query($conn,$sql);
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

<body background="img/user.jpg">

    <div class="menu">
        <a href="welcome.php" class="sidebar">Welcome</a>
        <a href="profile.php">My Profile</a>
        <a href="users.php">Users</a>
        <a href="access_request.php">Access Requests</a>

    </div>
    <h1>ACCESS REQUEST</h1>


    <div class="btn-group1"> <button>Approve</button></div>
    <div class="btn-group2"><button>Decline</button></div>


    <body>

        <div class="accesscontainer">
            <div class="table-responsive">
                <table id="accessdata" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>reqid</td>
                            <td>fname</td>
                            <td>lname</td>
                            <td>dep</td>
                            <td>reqstatus</td>
                        </tr>
                    </thead>

                    <?php  
                          while($row = mysqli_fetch_array($result))  
                          {
                               // echoing the fetched data from the database per column names
                               echo '  
                               <tr>
                                    <td>'.$row["reqid"].'</td>  
                                    <td>'.$row["fname"].'</td>  
                                    <td>'.$row["lname"].'</td> 
                                     <td>'.$row["dep"].'</td> 
                                      <td>'.$row["reqstatus"].'</td> 
                               </tr>  
                               ';  
                          }  
                          ?>

                </table>
            </div>
        </div>
    </body>
    <div class="logoutlink"> <a href="login.php">Logout</a> </div>

</body>

</html>
<script>
    $(document).ready(function() {
        $('#accessdata').DataTable();

    });

</script>
