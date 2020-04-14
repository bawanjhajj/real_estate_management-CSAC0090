<?php  
session_start();            //Session Start 
include('db_connect.php');
if(isset($_SESSION['email']))
{
    echo "hello : " . $_SESSION['email'];
     echo "<br>";
$query1 ="SELECT * FROM profile WHERE email ='{$_SESSION['email']}'";
    $result = mysqli_query($conn,$query1) or die(mysqli_error());
    
            while ($row1 = mysqli_fetch_array($result))
            {
                $email = $row1['email'];
                $pass = $row1['pass'];
                $fname = $row1['fname'];
                $lname = $row1['lname'];
                $dob = $row1['dob'];
                $access = $row1['access'];
                $phone = $row1['phone'];
                $dep = $row1['dep'];
                $address = $row1['address'];
            }
}
    else {    echo "Cant Fetch Data";    }
mysqli_close($conn);
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>realestatemanagement.com/Add User Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/rem.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body background="img/profile.jpg">
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
            <a href="add_user.php">Access Requests</a>
            <?php
            }
            ?>
            <?php 
            if($dbaccess == 'administrator')
            {
            ?>
            <li>
                <a href="access_request.php">Access Requests</a>
                <a href="edit_user.php">Access Requests</a>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>

    <div class="Edit User">
        <form autocomplete="off" id="addform" action="db_connect.php" method="post">
            <h1>Add User</h1>
            <label for="em"><b>Email Address</b></label>
            <input type="text" name="e" placeholder="Email Address" value=<?php echo $email; ?> required="required" />
            <label for="p"><b>Password</b></label>
            <input type="password" name="p" placeholder="Password" value=<?php echo $pass; ?> required="required" />
            <label for="fn"><b>First Name</b></label>
            <input type="text" name="fn" placeholder="First Name" value=<?php echo $fname; ?> required="required" />
            <label for="ln"><b>Last Name</b></label>
            <input type="text" name="ln" placeholder="Last Name" value=<?php echo $lname; ?> required="required" />

            <script>
                $(function() {
                    $("#datepicker").datepicker();
                    $("#format").on("change", function() {
                        $("#datepicker").datepicker("option", "dateFormat", $(this).val());
                    });
                });

            </script>

            <b>Date of Birth <input type="text" name="dob" value=<?php echo $dob; ?> id="datepicker" size="30"></b>
            <label for="atype"><b>Access Type</b></label>
            <?php 
                if($access == "administrator")
                {       
            ?>
            <select name="access" id="atype">
                <option value="regular">Regular</option>
                <option value="agent">Elevated Access User</option>
                <option selected value="administrator">Administrator</option>
            </select>
            <?php
                }
                else
                {
            ?>
            <input type="text" name="access" placeholder="access" value=<?php echo $access; ?> readonly required="required" />
            <?php
                }
            ?>
            <label for="phone"><b>Phone Number</b></label>
            <input type="text" name="phone" placeholder="Phone Number" value=<?php echo $phone; ?> required="required" />

            <label for="atype"><b>Department</b></label>
            <?php 
                if($access == "administrator"){
                    
            ?>

            <select name="dep" id="atype">
                <option value="sales">Sales</option>
                <option value="registration">Registration</option>
                <option selected value="property evaluation">Property Evaluation</option>
            </select>
            <?php
                }
                else{
            ?>
            <input type="text" name="dep" placeholder="department" value=<?php echo $dep; ?> readonly required="required" />
            <?php
                }
            ?>
            <label for="addr"><b>Address</b></label>
            <input type="text" name="addr" placeholder="Address" value=<?php echo $address; ?> required="required" />

            <button type="Save" class="btn btn-primary btn-block btn-large">Save</button>
            <button id="cancelbtn" onclick="document.location = 'add_user.php'">Cancel</button>
        </form>
    </div>
    <div class="logoutlink"> <a href="login.php">Logout</a> </div>
</body>

</html>
