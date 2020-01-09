

<?php
require_once "includes/dbconfig.php";
include_once "includes/functions.php";
session_start();
$result = '';

if (isset($_POST['submit_admin_login'])) {
	//obtain user input and sanitize
	
	$admin_username = checkValues($_POST['admin_username']);
	$admin_password = checkValues($_POST['admin_password']);
	$admin_password = md5($admin_password);

	//Query exe
	$admin_login_query = "SELECT * FROM pm_admin_tbl WHERE pm_admin_username='{$admin_username}'";
	$select_admin_login_query = mysqli_query($con,$admin_login_query);
	if(!$select_admin_login_query){
		die("QUERY FAIED:".mysqli_error($con));
	}
		while ($row=mysqli_fetch_array($select_admin_login_query)){
			$db_admin_id=$row['pm_admin_id'];
			$db_admin_username=$row['pm_admin_username'];
			$db_admin_password=$row['pm_admin_password'];
           
		}
		
		if($admin_username === $db_admin_username   && $admin_password === $db_admin_password){
            $_SESSION['admin_username']= $db_admin_username;
            
            $result = 'success';
            
            echo "<script>window.location='admin_dashboard.php';</script>";
			
		} 
		
		else {
			//echo "<script>window.location='user_login.php';</script>";
			$result = '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Username and Password do not match</div>';
		}

}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
   <link rel="shortcut icon" type="image/x-icon" href="images/wcifav.png">
    <link rel="stylesheet" href="css/bootstrap.css" media="all" type="text/css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.css" media="all" type="text/css">
    <link rel="stylesheet" href="css/style.css" media="all" type="text/css">
    
     <link rel="stylesheet" href="css/mystyle.css" media="all" type="text/css">
    <!--script type="text/javascript" src="js/jquery-3.2.1.min.js"></script-->
    
</head>
<body >

<div class="container center-block" align="center" style="margin-top: 70px">

    <form class="form-signin" method="post" id="log-form">

        <h2 class="form-signin-heading">ADMIN LOG IN</h2><hr />

       <div id="login-error">
           <?php  echo $result; ?>
       </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                <input type="text" class="form-control" placeholder="User name" name="admin_username" id="admin_username" required/>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i> </span>
                <input type="password" class="form-control" placeholder="Password" name="admin_password" id="admin_password" required/>
            </div>
        </div>

        <hr />

        <div class="form-group">
            <button type="submit" rel = "admin" class="btn btn-default product-button" name="submit_admin_login" id="impleConfirm">
                <span class="glyphicon glyphicon-log-in"></span> &nbsp;Log In
            </button>
        </div>

    </form>

</div>
<br>


 <!-- jQuery -->
        <script src="js/jquery.js"></script>
         <script src="js/jquery.confirm.min.js"></script>
         <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/validation.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
         
    <script>  
         $("#complexConfirm").confirm({
    title:"Delete confirmation",
    text:"This is very dangerous, you shouldn't do it! Are you really really sure?",
    confirm: function(button) {
        alert("You just confirmed.");
    },
    cancel: function(button) {
        alert("You aborted the operation.");
    },
    confirmButton: "Yes I am",
    cancelButton: "No"
});
        
        </script>   
         <script>  $("#simpleConfirm").confirm();</script>

</body>
</html>
