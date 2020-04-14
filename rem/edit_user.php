<?php  
session_start();            //Session Start 
include('db_connect.php');
$dbaccess = $_SESSION['dbaccess'];

if(isset($_SESSION['email']))
{
    echo "Hello : " . $_SESSION['email'];
     echo "<br>";
    
if(isset($_POST['selectedId']))
{
$query1 ="SELECT * FROM profile WHERE uid ='{$_POST['selectedId']}'";
    $result = mysqli_query($conn,$query1) or die(mysqli_error());
    if(isset($result)){
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
     else { echo "Cant Fetch Data"; header("Location: users.php"); }
}
   
if(isset($_POST["edituser"]))
{
    $qemail = $_POST['e'];
    $qpass = $_POST['p'];
    $qfname = $_POST['fn'];
    $qlname = $_POST['ln'];
    $qdob = $_POST['dob'];
    $qaccess = $_POST['access'];
    $qphone = $_POST['phone'];
    $qdep = $_POST['dep'];
    $qaddress = $_POST['addr'];
   
$sql = "UPDATE profile SET pass = '$qpass', fname = '$qfname', lname = '$qlname', dob = '$qdob', access = '$qaccess', phone = '$qphone', dep = '$qdep', address = '$qaddress' where email = '$qemail';";
    
    $sql .= "UPDATE login SET pass = '$qpass', access = '$qaccess' where email = '$qemail';";
    
    $sql .= "UPDATE signup SET pass = '$qpass', fname = '$qfname', lname = '$qlname', dob = '$qdob' where email = '$qemail';";
    
      $result = ( mysqli_multi_query($conn,$sql));
    echo "---".$result;
    
    if  ( $result==1 )
    { echo "Updation Completed"; header("Location: users.php"); }
    else
    { echo "Can't Update"; }
}
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>realestatemanagement.com/Edit User Page</title>
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

    <div class="Edit User">
        <form autocomplete="off" id="editform" action="edit_user.php" method="post">
            <h1>Edit User</h1>
            <label for="em"><b>Email Address</b></label>
            <input type="text" name="e" placeholder="Email Address" value="<?php echo $email; ?>" required readonly />
            <label for="p"><b>Password</b></label>
            <input type="password" name="p" placeholder="Password" value="<?php echo $pass; ?>" required />
            <label for="fn"><b>First Name</b></label>
            <input type="text" name="fn" placeholder="First Name" value="<?php echo $fname; ?>" required />
            <label for="ln"><b>Last Name</b></label>
            <input type="text" name="ln" placeholder="Last Name" value="<?php echo $lname; ?>" required />
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
                if($dbaccess == "administrator")
                {      
            ?>
            <select name="access" id="atype">
                <option value="regular">Regular</option>
                <option value="agent">Elevated Access User</option>
                <option selected value="administrator">Administrator</option>
            </select>
            <?php
                }
                else if ($dbaccess == "")
                {
            ?>
            <input type="text" name="access" placeholder="access" value=<?php echo $dbaccess; ?> readonly required="required" />
            <?php
                }
                else{
            ?>
            <input type="text" name="access" placeholder="access" value=<?php echo $dbaccess; ?> readonly required="required" />
            <?php
                }
            ?>
            <label for="phone"><b>Phone Number</b></label>
            <input type="text" name="phone" placeholder="Phone Number" value="<?php echo $phone; ?>" required="required" />

            <label for="atype"><b>Department</b></label>
            <?php 
                if($dbaccess == "administrator")
                {            
            ?>
            <select name="dep" id="atype">
                <option value="sales">sales</option>
                <option value="registration">registration</option>
                <option selected value="property evaluation">property evaluation</option>
            </select>
            <?php
                }
                else
                {
            ?>
            <input type="text" name="dep" placeholder="Department" value=<?php echo $dbaccess; ?> readonly required="required" />
            <?php
                }
            ?>
            <label for="addr"><b>Address</b></label>
            <input type="text" name="addr" placeholder="Address" value="<?php echo $address; ?>" required="required" />
            <input type="submit" name="edituser" value="EDIT" class="btn-edit" />
        </form>
    </div>

    <div class="logoutlink"> <a href="login.php">Logout</a> </div>
</body>

</html>
