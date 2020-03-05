<?php  
 require('db_connect.php');
 ?>


<!DOCTYPE html>
<html>
  <head>
    <title>realestatemanagement.com/Add User Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="css/rem.css">
  </head>
  <body background="img/profile.jpg">
         <!-- Sidebar -->

<div class="menu">
  <a href="welcome.php" class="sidebar">Welcome</a>
  <a href="profile.php">My Profile</a>
  <a href="users.php">Users</a>
  <a href="access_request.php">Access Requests</a>
  
</div>
      <div class="Edit User">
      <form id ="addform" action="db_connect.php" method="post">
          <h1>Add User</h1>
        <label for="em"><b>Email Address</b></label>
        <input type="text" name="e" placeholder="Email Address" required="required" />
        <label for="p"><b>Password</b></label>
        <input type="password" name="p" placeholder="Password" required="required" />
    
        <label for="fn"><b>First Name</b></label>
        <input type="text" name="fn" placeholder="First Name" required="required" />
        <label for="ln"><b>Last Name</b></label>
         <input type="text" name="ln" placeholder="Last Name" required="required" />
         <label for="dob"><b>Date of Birth</b></label>
         <input type="text" name="dob" placeholder="Date of Birth" required="required" />
              <label for="at"><b>Access Type</b></label>
        <input type="text" name="at" placeholder="Access Type" required="required" />
              <label for="phone"><b>Phone Number</b></label>
        <input type="text" name="phone" placeholder="Phone Number" required="required" />
              <label for="dept"><b>Department</b></label>
        <input type="text" name="dept" placeholder="Department" required="required" />
              <label for="addr"><b>Address</b></label>
        <input type="text" name="addr" placeholder="Address" required="required" />
             
        <button type="Save" class="btn btn-primary btn-block btn-large">Save</button>
        <button type="Cancel" class="btn btn-primary btn-block btn-large">Cancel</button>
    </form>
</div>
          <div class="logoutlink"> <a href="login.php">Logout</a> </div>
    </body>
</html>