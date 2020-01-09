<?php


$session_admin_username = $_SESSION['admin_username'];


if(isset($_SESSION['admin_username'])){
    
  // $session_id = $_SESSION['tp_user_unique_id'];

  if(!empty($_POST['completed-user'])  && isset($_POST['confirm-completed'])   ){
      
      $completed_user_id = checkValues($_POST['completed-user']);
       
     $completed_user = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_user_unique_id = $completed_user_id");
      $num_of_completed_user = mysqli_num_rows($completed_user);
      if($num_of_completed_user == 1){
          $completed_user_row = mysqli_fetch_array($completed_user );
          $completed_user_name = $completed_user_row['tp_full_name'];
          $completed_user_email = $completed_user_row['tp_user_email'];
            $completed_user_address = $completed_user_row['tp_ether_address'];
            $completed_user_number = $completed_user_row['tp_phone_number'];
            $completed_user_unique_id = $completed_user_row['tp_user_unique_id'];
      }
      
      $completed_user_query = mysqli_query($con,"SELECT * FROM tp_level_four_payment WHERE tp_payer_unique_id = '$completed_user_id' ");
      if( $completed_user_query){
          
          $total_completed_user = mysqli_num_rows(  $completed_user_query);
          if($total_completed_user  == 1){
              
              //update tp_level_four_payment
               $update_level_four = mysqli_query($con,"UPDATE tp_level_four_payment SET tp_payment_confirmed = 1 WHERE tp_payer_unique_id = '$completed_user_id'");
               $update_user =  mysqli_query($con,"UPDATE tp_users SET tp_matched = 0 WHERE tp_user_unique_id = '$completed_user_id'");
               $update_tp_pass =  mysqli_query($con,"UPDATE tp_users SET tp_pass = 0 WHERE tp_user_unique_id = '$completed_user_id'");
              $delete_from_level_one_receivers = mysqli_query($con,"DELETE FROM tp_level_one_receivers WHERE tp_user_unique_id = '$completed_user_id' ");
               $delete_from_level_two_receivers = mysqli_query($con,"DELETE FROM tp_level_two_receivers WHERE tp_user_unique_id = '$completed_user_id' ");
               $delete_from_level_three_receivers = mysqli_query($con,"DELETE FROM tp_level_three_receivers WHERE tp_user_unique_id = '$completed_user_id' ");
               $delete_from_level_one = mysqli_query($con,"DELETE FROM tp_level_one WHERE tp_user_unique_id = '$completed_user_id' ");
               $delete_from_level_two = mysqli_query($con,"DELETE FROM tp_level_two WHERE tp_user_unique_id = '$completed_user_id' ");
               $delete_from_level_three = mysqli_query($con,"DELETE FROM tp_level_three WHERE tp_user_unique_id = '$completed_user_id' ");
               $delete_from_level_four = mysqli_query($con,"DELETE FROM tp_level_four WHERE tp_user_unique_id = '$completed_user_id' ");
              
               $delete_from_level_one_payments = mysqli_query($con,"DELETE FROM tp_level_one_payment WHERE tp_receiver_unique_id = '$completed_user_id' OR tp_payer_unique_id = '$completed_user_id' ");
               $delete_from_level_two_payments = mysqli_query($con,"DELETE FROM tp_level_two_payment WHERE tp_receiver_unique_id = '$completed_user_id' OR tp_payer_unique_id = '$completed_user_id' ");
               $delete_from_level_three_payments = mysqli_query($con,"DELETE FROM tp_level_three_payment WHERE tp_receiver_unique_id = '$completed_user_id' OR tp_payer_unique_id = '$completed_user_id' ");
              
              //delete past
              
               $delete_from_level_one_past_payments = mysqli_query($con,"DELETE FROM tp_past_level_one_payment WHERE tp_receiver_unique_id = '$completed_user_id' OR tp_payer_unique_id = '$completed_user_id' ");
               $delete_from_level_two_past_payments = mysqli_query($con,"DELETE FROM tp_past_level_two_payment WHERE tp_receiver_unique_id = '$completed_user_id' OR tp_payer_unique_id = '$completed_user_id' ");
               $delete_from_level_three_past_payments = mysqli_query($con,"DELETE FROM tp_past_level_three_payment WHERE tp_receiver_unique_id = '$completed_user_id' OR tp_payer_unique_id = '$completed_user_id' ");
              
              if(  $update_level_four &&  $update_user){
                  
                  // move user to completed
                   $check_past = mysqli_query($con,"SELECT * FROM tp_completed WHERE tp_user_unique_id = '$completed_user_id' ");
                   $num_of_past = mysqli_num_rows($check_past);
                  if( $num_of_past > 0){
                      echo 'Already moved';
                  }
                      else{  $move_to_completed = mysqli_query($con, "INSERT INTO tp_completed(tp_user_unique_id,tp_full_name,tp_ether_address,tp_user_number,tp_user_email) VALUES ('$completed_user_unique_id',' $completed_user_name','$completed_user_address','$completed_user_number','$completed_user_email')");
                  
                  echo '<div class="alert alert-success">User has been confirmed and recycled</div>'; } 
                  
                 
              }
              
             
             
              
          }  else{ echo '<div class="alert alert-danger">error</div>'; }     //end $total_coin_receiver
          
      }    else{ echo '<div class="alert alert-danger">Unsuccessful Query</div>'; }   // end  $coin_receiver_query
          
      
      
  }// end of isset
    
}
  ?>
