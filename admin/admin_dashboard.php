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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                        <?php  echo $_SESSION['admin_username']  ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>

                        <li class="divider"></li>
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
                    <!--li>


                            <a data-toggle="modal" href="#"><i class="fa fa-fw fa-user"></i> Add New Admin</a>



                        </li-->

                    <li>
                        <a href="registered_users.php"><i class="fa fa-fw fa-user"></i> View Users</a>
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

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <marquee> Welcome
                                <?php  echo $_SESSION['admin_username']  ?>
                            </marquee>

                        </h1>
                        <?php
                        $total_donated = 0;      
                            $registered_users_query = mysqli_query($con,'SELECT * FROM tp_users');
                            $num_of_registered_users=mysqli_num_rows($registered_users_query);
                            
                           
                            
                            
                            $num_of_users_online = 3;
                      /*        
                            $payer_query = mysqli_query($con,"SELECT * FROM tp_pledges WHERE tp_matched = 0 "   );
                            $num_of_pledges = mysqli_num_rows($payer_query);
                            
                            $past_payment_query = mysqli_query($con,'SELECT * FROM tp_past_payments');
    
                            $num_of_earned_users = mysqli_num_rows($past_payment_query);
                              while($row = mysqli_fetch_assoc($past_payment_query) ){
                              $amount_donated = $row['tp_amount']; 
                              $total_amount_donated[] = $amount_donated;
                                  $total_donated = array_sum($total_amount_donated);
                              
                              }
                           
                          */
                            
                              
    ?>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-users fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">
                                                    <?php echo $num_of_registered_users ?>
                                                </div>
                                                <div>REGISTERED USERS</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="registered_users.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-bar-chart fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">
                                                    <?php //echo $num_of_level_one_receivers ?>
                                                </div>
                                                <div>LEVEL ONE AWAITING RECEIVERS </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-users fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">
                                                    <?php // echo  $num_of_users_online; ?>
                                                </div>
                                                <div> NUMBER OF USERS ONLINE</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <div class="row">

                                            <div class="col-xs-12 text-center">
                                                <div class="huge">$
                                                    <?php // echo $total_donated; ?>
                                                </div>
                                                <div>TOTAL EARN FROM ACTIVATION FEES</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <hr />


                       

                        <br>
                        <br>
                        <!-- START REGISTERED DOCTORS -->
                        <div class="row">
                            <div class="col-lg-12">


                                <h1 class="page-header">
                                    REGISTERED USERS
                                </h1>
                                <div id="user-list" class="table-responsive">

                                    <table class="table table-striped table-advance table-hover">
                                        <tbody>
                                            <tr class="table-head">
                                                <th><i class="icon_profile"></i> Id</th>
                                                <th><i class="icon_profile"></i> Tele Id</th>
                                                <th><i class="icon_profile"></i> Username</th>
                                                <th><i class="icon_mail_alt"></i>Deposit Address</th>
                                                <th><i class="icon_mobile"></i>Withdrawal Address</th>
                                                <th><i class="icon_mobile"></i>Deposit Amount</th>
                                                <th><i class="icon_cogs"></i> Returns</th>
                                                <th><i class="icon_mobile"></i> Date Joined</th>

                                                <th><i class="icon_cogs"></i> Action</th>
                                            </tr>



                                            <!-- Start php Script to fetch registered doctor's data from database -->
                                            <?php
                                                    
                                                    
                    
                                       $registered_users_query1 = mysqli_query($con,'SELECT * FROM tp_users ORDER BY tp_user_id ' );
                                          while ($row=mysqli_fetch_assoc( $registered_users_query1 )){
                                            $user_id = $row['tp_user_id'];
                                            $user_name = $row['tp_username'];
                                            $user_unique_id = $row['tp_user_unique_id'];
                                            $user_wallet_address = $row['tp_withdrawal_address'];
                                            $user_deposit_address = $row['tp_deposit_address'];
                                            $deposit_amount = $row['tp_deposit_amount'];
                                            // $return_amount = $row['tp_return_amount'];
                                            $user_joined_date = $row['tp_date_joined'];
                                           
                                          
                                        
                    ?>

                                            <!--end php Script to fetch registered doctor's data from database -->

                                            <tr>
                                                <td>
                                                    <?php echo  $user_id?>
                                                </td>
                                                <td>
                                                    <?php echo  $user_unique_id ?>
                                                </td>
                                                <td>
                                                    <?php echo $user_name ?>
                                                </td>
                                                <td>
                                                    <?php echo  $user_deposit_address ?>
                                                </td>
                                                <td>
                                                    <?php echo $user_wallet_address  ?>
                                                </td>

                                                <td>
                                                    <?php echo $deposit_amount ?>
                                                </td>
                                                <td>
                                                    <?php echo $user_joined_date ?>
                                                </td>
                                                <td>
                                                      <?php echo $user_joined_date ?>
                                                </td>
                                                <td>

                                                    <form method="post" action="">
                                                        <input type="hidden" name="payer" value="<?php echo $user_id ; ?>">
                                                        <button type="submit" class="btn btn-success" name="activate"> PAID </button>
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

                                    <a href="registered_users.php">
                                        <button id="view_all" type="button" class="btn btn-primary">View All</button>
                                    </a>

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <!-- /.row -->
                <!-- END REGISTERED users -->

                <br>
                <br>








                <br>










                <!-- START REGISTERED DOCTORS -->
                <div class="row">
                    <div class="col-lg-12">


                        <h1 class="page-header">
                            CONFIRM COMPLETED MEMBERS
                        </h1>
                        <div id="user-list" class="table-responsive">

                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                    <tr class="table-head">
                                        <th><i class="icon_profile"></i> Id</th>

                                        <th><i class="icon_profile"></i> Full Name</th>

                                        <th><i class="icon_mobile"></i> Calling Contact</th>
                                        <th><i class="icon_mobile"></i>Email Address</th>
                                        <th><i class="icon_mobile"></i> Date Joined</th>
                                        <th><i class="icon_cogs"></i> Amount Paid>
                                        <th><i class="icon_cogs"></i> Action</th>
                                    </tr>



                                    <!-- Start php Script to fetch registered doctor's data from database -->
                                    <?php
                                                    
                                                    
                    
                                       $registered_users_query4 = mysqli_query($con,'SELECT * FROM  tp_level_four_payment WHERE tp_payment_confirmed = 0 AND tp_paid = 1' );
                                          while ($row4=mysqli_fetch_assoc( $registered_users_query4 )){
                                            $user_id4 = $row4['tp_payer_unique_id'];
                                        
                                            $user_full_name4 = $row4['tp_payer_full_name'];
                                          
                                            $user_contact4 = $row4['tp_payer_number'];
                                            $user_email4   = $row4['tp_payer_email'];  
                                            $user_joined_date4 = $row4['tp_payment_time'];
                                            $pay_amount = $row4['tp_amount'];
                                          
                                        
                                           
                                            
                        
                    ?>

                                    <!--end php Script to fetch registered doctor's data from database -->

                                    <tr>
                                        <td>
                                            <?php echo  $user_id4?>
                                        </td>

                                        <td>
                                            <?php echo  $user_full_name4 ?>
                                        </td>

                                        <td>
                                            <?php echo $user_contact4  ?>
                                        </td>

                                        <td>
                                            <?php echo  $user_email4 ?>
                                        </td>
                                        <td>
                                            <?php echo $user_joined_date4 ?>
                                        </td>
                                        <td>
                                            <?php echo  $pay_amount ?>
                                        </td>

                                        <td>

                                            <form method="post" action="">
                                                <input type="hidden" name="completed-user" value="<?php echo $user_id4 ; ?>">
                                                <button type="submit" class="btn btn-success" name="confirm-completed"> Confirm User </button>
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




            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->








    </div>





    <div class="footer">

        <p>&copy; Copyright 2019 BitGain.Club</p>

    </div>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
