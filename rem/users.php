<?php  
 require('db_connect.php');
session_start();            //Session Start 
if(isset($_SESSION['email']))
{
    echo "Hello : " . $_SESSION['email'];
    echo "<br>";
}
$dbaccess = $_SESSION['dbaccess'];

$sql ="SELECT * FROM profile LIMIT 10;";  
 $result = mysqli_query($conn,$sql);
   
if(isset($_POST["delete"]))
{
    $id = $_POST['selectedId'];
    if( $id!="")    {
        
$sqldel = "DELETE FROM profile 
where uid = '$id'";
        
   if(mysqli_query($conn,$sqldel)) 
   {
        echo " Selected ID is DELETED";
    }
    else
    {
        echo "NOT DONE";
    }

}
    else{
        echo "No Selected Row";
    }

}
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
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" />

    <link rel="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap.min.css" />
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.jqueryui.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />

</head>

<body background="img/users.jpeg">

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
    <form id="selectedRow" method="POST">
        <input type="hidden" id="selectedId" name="selectedId" value="" />
    </form>
    <div class="butn">
        <!--
        <button id="create">Create</button>
        <button id="view" formaction="edit_user.php" form="selectedRow" type="submit" name="edit">View</button>
        <button id="edit" formaction="edit_user.php" form="selectedRow" type="submit" name="edit">Edit</button>
        <button id="deleteButton" name="delete" type="submit" form="selectedRow">Delete</button>
-->
        <?php
            if($dbaccess == 'administrator' || $dbaccess == "agent")
            {
            ?>

        <button id="view" formaction="edit_user.php" form="selectedRow" type="submit" name="edit">View</button>
        <button id="edit" formaction="edit_user.php" form="selectedRow" type="submit" name="edit">Edit</button>
        <?php
            }
            ?>
        <?php 
            if($dbaccess == 'administrator')
            {
            ?>
        <button id="create">Create</button>
        <button id="deleteButton" name="delete" type="submit" form="selectedRow">Delete</button>
        <?php
            }
            ?>
    </div>

    <br /><br />
    <div class="usercontainer">
        <h1>USERS</h1>

        <div class="table-responsive">
            <table id="profile" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>uid</td>
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
                                    <td>'.$row["uid"].'</td>  
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
            var table = $('#profile').DataTable();

            $('#profile tbody').on('click ', ' tr ', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                    selectedId = "";
                    document.getElementById("selectedId").value = selectedId;
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    selectedId = $(this).find("td:first").html();
                    document.getElementById("selectedId").value = selectedId;
                    //console.log(document.getElementById("selectedId").value);
                }
            });

            $('#deleteButton').click(function() {
                table.row('.selected').remove().draw(false);
            });
        });

    </script>

</body>

</html>
