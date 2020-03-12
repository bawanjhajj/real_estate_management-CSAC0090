<?php  
 require('db_connect.php');

$sql ="SELECT * FROM userdata LIMIT 10;";  
 $result = mysqli_query($conn,$sql);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <div class="butn">
        <div class="button"> <button>Create</button></div>
        <div class="button"><button>View</button></div>
        <div class="button"> <button>Edit</button></div>
        <div class="button"><button>Delete</button></div>
    </div>

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
</head>

<body background="img/user.jpg">

    <div class="menu">
        <a href="welcome.php" class="sidebar">Welcome</a>
        <a href="profile.php">My Profile</a>
        <a href="users.php">Users</a>
        <a href="access_request.php">Access Requests</a>

    </div>
    <h1>USERS</h1>


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

                </table>
            </div>
        </div>
    </body>
    <div class="logoutlink"> <a href="login.php">Logout</a> </div>
</body>

</html>
<script>
    $(document).ready(function() {
        var table = $('#userdata').DataTable();

        $('#userdata').on('click', 'tr', function() {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
        $('#button').click(function() {
            table.row('.selected').remove().draw(false);

            $('table').on('click', 'input[type="button"]', function(e) {
                $(this).closest('tr').remove()
            })
        });
    });

</script>
