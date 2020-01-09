<?php
session_start();
require_once "includes/dbconfig.php";
include_once "includes/functions.php";
if(!isset($_SESSION['admin_username'])){
    redirect_to("index.php");
}


?>





    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ADMIN DASHBOARD</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="images/wcifav.png">
        <!-- Custom CSS -->

        <link href="css/sb-admin.css" rel="stylesheet">

        <link href="css/mystyle.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <script src="js/bootstrap.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="admin_dashboard.php">ADMIN DASHBOARD</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">




                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php  echo $_SESSION['admin_username']  ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>

                            <li>
                                <a href="admin_logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul id="suraj-left-nav" class="nav navbar-nav side-nav">
                        <li>
                            <a href="admin_dashboard.php"><i class="fa fa-fw fa-home"></i> Homepage</a>
                        </li>



                        <li>
                            <a href="registered_users.php"><i class="fa fa-fw fa-user"></i> Registered Users</a>
                        </li>





                        <li>
                            <a href="admin_logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>









                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <br>
                    <br>



                    <?php

                            $registered_users_query = mysqli_query($con,'SELECT * FROM tp_users');
                            $num_of_registered_users=mysqli_num_rows($registered_users_query);
                            
                            
                           
                            
                              
    ?>

                        <hr/>






                        <?php
                    
         if(!empty($_POST['user'])  && isset($_POST['delete-user'])   ){
      
      $user_id = checkValues($_POST['user']);
      $coin_receiver_query = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_user_id = ' $user_id' ");
      if($coin_receiver_query){
          
          $total_coin_receiver = mysqli_num_rows( $coin_receiver_query);
          if( $total_coin_receiver  == 1){
              
              // DELETE FROM DATABASE
              
              $delete_query = mysqli_query($con,"DELETE FROM tp_users WHERE tp_user_id = '$user_id'  ");
              
             if(  $delete_query){
                 echo '<div class="alert alert-success">USER DELETION SUCCCESFULL</div>';
             }else{
                 echo '<div class="alert alert-danger">USER DELETION UNSUCCCESFULLY</div>';
             }
              
              
          }  else{ echo '<div class="alert alert-danger">error</div>'; }     //end $total_coin_receiver
          
      }    else{ echo '<div class="alert alert-danger">Unsuccessful Query</div>'; }   // end  $coin_receiver_query
          
      
      
  }// end of isset
    
                    ?>




                            <!-- START CREDITED ROW -->

                            <div class="row">
                                <div class="col-lg-12">



                                    <h1 class="page-header">
                                   REGISTERED USERS
                                </h1>
                                    <div class="table-responsive">

                                        <table class="table table-striped table-advance table-hover">
                                            <tbody>
                                                <tr class="table-head">
                                                    <th><i class="icon_profile"></i> Id</th>
                                                    <th><i class="icon_profile"></i> Username</th>
                                                    <th><i class="icon_profile"></i> Full Name</th>
                                                    <th><i class="icon_mail_alt"></i>Wallet Address</th>
                                                    <th><i class="icon_mobile"></i> Calling Contact</th>
                                                    <th><i class="icon_mobile"></i>Email Address</th>
                                                    <th><i class="icon_mobile"></i> Date Joined</th>
                                                    <th><i class="icon_cogs"></i> Account Status</th>
                                                    <th><i class="icon_cogs"></i> Action</th>
                                                </tr>



                                                <!-- Start php Script to fetch registered doctor's data from database -->
                                                <?php
                                                    
                                                    
                    
                                       $registered_users_query1 = mysqli_query($con,'SELECT * FROM tp_users' );
                                          while ($row=mysqli_fetch_assoc( $registered_users_query1 )){
                                            $user_id = $row['tp_user_id'];
                                            $user_name = $row['tp_username'];
                                            $user_full_name = $row['tp_full_name'];
                                            $user_wallet_address = $row['tp_ether_address'];
                                            $user_contact = $row['tp_phone_number'];
                                            $user_email   = $row['tp_user_email'];  
                                            $user_joined_date = $row['tp_date_joined'];
                                            $user_status = $row['tp_activated'];
                                          
                                        
                                            if($user_status == 1){
                                                $user_status = 'Active';
                                            }  elseif($user_status == 0){
                                                $user_status = 'Inactive';
                                            }
                                            
                        
                    ?>

                                                    <!--end php Script to fetch registered doctor's data from database -->

                                                    <tr>
                                                        <td>
                                                            <?php echo  $user_id?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user_name ?>
                                                        </td>
                                                        <td>
                                                            <?php echo  $user_full_name ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user_wallet_address ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user_contact  ?>
                                                        </td>

                                                        <td>
                                                            <?php echo  $user_email ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user_joined_date ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user_status ?>
                                                        </td>
                                                        <td>

                                                            <form method="post" action="">
                                                                <input type="hidden" name="user" value="<?php echo $user_id ; ?>">
                                                                <button style="background:red;" type="submit" class="btn btn-success" name="delete-user"> DELETE USER </button>
                                                            </form>




                                                            <!--form method="post" action="includes/delete.php">
                                                                    <input type="hidden" name="us" value="<?php //echo $user_id ; ?>">
                                                                    <button type="submit" class="btn btn-success" name="delete"> DELETE       </button>
                                                                </form-->

                                                        </td>
                                                    </tr>

                                                    <?php   } ?>

                                            </tbody>
                                        </table>



                                    </div>




                                </div>
                            </div>

                            <!-- END CREDITED ROW -->





                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->



            <br>
            <br>





        </div>
        <!-- wrapper -->










        <!--/div-->





        <div class="footer">

            <p>&copy; Copyright 2018 Cashbuild-Matrix System</p>

        </div>

        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

    </html>
