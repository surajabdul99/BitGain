<?php
session_start();
require_once "includes/dbconfig.php";
include_once "includes/functions.php";

$session_admin_username = $_SESSION['admin_username'];


if(isset($_SESSION['admin_username'])){
    
  // $session_id = $_SESSION['tp_user_unique_id'];

  if(!empty($_POST['user'])  && isset($_POST['delete-user'])   ){
      
      $user_id = checkValues($_POST['user']);
      $coin_receiver_query = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_user_id = ' $user_id' ");
      if($coin_receiver_query){
          
          $total_coin_receiver = mysqli_num_rows( $coin_receiver_query);
          if( $total_coin_receiver  == 1){
              
              // DELETE FROM DATABASE
              
              $delete_query = mysqli_query($con,"DELETE FROM tp_users WHERE tp_user_id = '$user_id'  ");
              
             if(  $delete_query){
                 echo 'DELETED SUCCESSFULLY';
             }else{
                  echo 'DELETED unSUCCESSFULL';
             }
              
              
          }  else{ echo '<div class="alert alert-danger">error</div>'; }     //end $total_coin_receiver
          
      }    else{ echo '<div class="alert alert-danger">Unsuccessful Query</div>'; }   // end  $coin_receiver_query
          
      
      
  }// end of isset
    
}
  ?>
