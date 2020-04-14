<?php  
 require('db_connect.php');
session_start();            //Session Start  
if(isset($_SESSION['email']))
{
    echo "Hello : " . $_SESSION['email'];
     echo "<br>";

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
$sql ="SELECT * FROM profile LIMIT 10;";  
 $result = mysqli_query($conn,$sql);
}
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

<body background="img/areq.jpg">

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
        <button id="accept" formaction="access_request.php" form="selectedRow" type="submit" name="edit">Accept</button>
        <button id="decline" name="decline" type="submit" form="selectedRow">Decline</button>
    </div>

    <br /><br />
    <div class="accesscontainer">
        <h1>Access Request</h1>

        <div class="table-responsive">
            <table id="profile" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>uid</td>
                        <td>fname</td>
                        <td>lname</td>
                        <td>dep</td>
                        <td>reqstatus</td>
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
                                     <td>'.$row["dep"].'</td> 
                                      <td>'.$row["reqstatus"].'</td> 
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
