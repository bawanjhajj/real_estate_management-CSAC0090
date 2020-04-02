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

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />

</head>

<body background="img/user.jpg">

    <div class="menu">
        <ul>
            <li><a href="welcome.php" class="sidebar">Welcome</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="users.php">Users</a></li>
            <li>
                <a href="access_request.php">Access Requests</a>
            </li>
        </ul>

    </div>

    <div class="butn">
        <button id="acceptButton">Accept</button>
        <button id="declineButton">Decline</button>
    </div>

    <body>
        <div class="accesscontainer">
            <h1>ACCESS REQUEST</h1>
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
    <div class="logoutlink">
        <a href="login.php">Logout</a>
    </div>

</body>

</html>
<script>
    $(document).ready(function() {
        var table = $('#accessdata').DataTable();
        $('#accessdata tbody').on('click ', ' tr ', function() {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');

            }
        });

        $('#acceptButton').click(function() {
            table.row('.selected').remove().draw(false);
        });
    });

</script>
