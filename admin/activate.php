<?php
//session_start();
//require_once "includes/dbconfig.php";
//include_once "includes/functions.php";

//$session_admin_username = $_SESSION['admin_username'];


//if(isset($_SESSION['admin_username'])){
    
   if(!empty($_POST['payer'])  && isset($_POST['activate'])   ){
        
        $user = checkValues($_POST['payer']);
        //$active = 1;
        
        $user_query = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_user_id = '$user' ");
        if($user_query){
         $user_row = mysqli_fetch_array($user_query);
            
            $user_unique_id = $user_row['tp_user_unique_id'];
            $username = $user_row['tp_username'];
            $wallet_address = $user_row['tp_withdrawal_address'];
            $deposit_address = $user_row['tp_deposit_address'];
            $deposit_amount = $user_row['tp_deposit_amount'];
            $deposit_date = $user_row['tp_date_joined'];
          //  $username = $user_row['tp_username'];
        
             
            
      //insert into database
            $insert_into_db = mysqli_query($con," INSERT INTO tp_investortp_user_unique_id,tp_username,	tp_withdrawal_address,tp_deposit_address,tp_deposit_amount")
            
            
            
        }  else { echo 'error';}    
    } 
    else { echo '';}
        
//}
    
   
  ?>
