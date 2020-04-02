<?php  
 require('db_connect.php');

$sql ="SELECT * FROM userdata LIMIT 10;";  
 $result = mysqli_query($conn,$sql);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>USERS</title>
    <link rel="stylesheet" href="css/rem.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
    <script src="stylesheet" href="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" />

    <link rel="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap.min.css" />
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.jqueryui.min.js"></script>


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
        <button>Create</button><button>View</button>
        <button>Edit</button>
        <button id="deleteButton">Delete</button>
    </div>

    <br><br />
    <div class="usercontainer">
        <h1>USERS</h1>
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
                    <?php  
                          while($row = mysqli_fetch_array($result))  
                          {
                               // echoing the fetched data from the database per column names
                               echo '  
                               <tr>
                                    <td>'.$row["userid"].'</td>  
                                    <td>'.$row["fname"].'</td>  
                                    <td>'.$row["lname"].'</td> 
                                     <td>'.$row["access"].'</td> 
                                      <td>'.$row["dep"].'</td> 
                               </tr>  
                               ';  
                          }  
                          ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="logoutlink"> <a href="login.php">Logout</a> </div>
    <script>
        $(document).ready(function() {
            var table = $('#userdata').DataTable();

            $('#userdata tbody').on('click ', ' tr ', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');

                }
            });

            $('#deleteButton').click(function() {
                table.row('.selected').remove().draw(false);
            });
        });

    </script>

</body>

</html>
