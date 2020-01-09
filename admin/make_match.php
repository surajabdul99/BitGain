<?php
//session_start();
//require_once "includes/dbconfig.php";
//include_once "includes/functions.php";

$session_admin_username = $_SESSION['admin_username'];


if(isset($_SESSION['admin_username'])){
    
    if(isset($_POST['receivers'])  && isset($_POST['pledge'])  && isset($_POST['confirm_match']))
    {
        
      $receiver_id = $_POST['receivers'];  // extracting selected receiver from form
      $payer_ids = $_POST['pledge'];      //extracting selected payers from form
        
   // print_r($payer_ids);
        $k = count($payer_ids) ;
       // echo $k;
       // echo "<br>";
            
       
        $success= 0;
for ($counter = 0; $counter < $k; $counter++){
       
     //foreach($payer_ids as $payer_id) {
          // echo $payer_id;
          //   echo "<br>";
    
            
        
        //}
           
      //  }
    $receiver_match_query = mysqli_query($con,"SELECT * FROM tp_level_one WHERE tp_user_unique_id = '{$receiver_id}'");
    if( $receiver_match_query){
        while($receiver_row = mysqli_fetch_assoc($receiver_match_query)){
            $receiver_amount = $receiver_row['tp_amount'];
            $tp_receiver_unique_id = $receiver_row['tp_user_unique_id'];
            $receiver_full_name = $receiver_row['tp_full_name'];
            $receiver_wallet_address = $receiver_row['tp_ether_address'];
            $receiver_email= $receiver_row['tp_user_email'];
             $receiver_number= $receiver_row['tp_user_number'];
            
            
           
            
            
        }
    }
     
   $payer_match_query = mysqli_query($con," SELECT * FROM tp_users WHERE tp_activated = 1 AND tp_user_unique_id = '{$payer_ids[$counter]}'");
   if($payer_match_query){
       
       while($payer_row = mysqli_fetch_assoc($payer_match_query)){
            $payer_amount = 100;
            $tp_payer_unique_id = $payer_row['tp_user_unique_id'];
            $payer_full_name =$payer_row['tp_full_name'];
            $payer_wallet_address=$payer_row['tp_ether_address'];
            $payer_phone_number=$payer_row['tp_phone_number'];
            $payer_email=$payer_row['tp_user_email'];
           
        }
       
   }
    
   
    $num_of_payers=mysqli_num_rows($payer_match_query);
    $num_of_receiver=mysqli_num_rows( $receiver_match_query);
    
        
    if( $num_of_payers > 0 &&  $num_of_receiver > 0){
        
       $check_past_match = mysqli_query($con,"SELECT * FROM tp_level_one_payment WHERE tp_payer_unique_id ='$tp_payer_unique_id'  ");
       $num_of_past_match = mysqli_num_rows($check_past_match); 
       
        if(   $num_of_past_match >0) {
            echo '<div class="alert alert-danger"> MATCH ALREADY EXISTS</div>';
        }
        
        
        else{
        $insert_receiver=mysqli_query($con,"INSERT into tp_level_one_payment(tp_payer_unique_id,tp_receiver_unique_id,tp_amount,tp_payer_full_name,	tp_receiver_full_name,tp_payer_address,tp_receiver_address,tp_payer_email,tp_receiver_email,tp_payer_number,tp_receiver_number) VALUES('$tp_payer_unique_id','$tp_receiver_unique_id','$payer_amount',' $payer_full_name','$receiver_full_name','$payer_wallet_address','$receiver_wallet_address','$payer_email','$receiver_email','$payer_phone_number','$receiver_number')");
        
            
    
        if($insert_receiver){
        //echo 'inserted';
            $update_pledges = mysqli_query($con,"UPDATE tp_users SET tp_matched = 1 WHERE tp_user_unique_id = '$tp_payer_unique_id' ");
            $update_awaiting = mysqli_query($con,"UPDATE tp_level_one SET tp_matched = 1 WHERE tp_user_unique_id = '$tp_receiver_unique_id' " );
             
           
            
            
           if($update_pledges && $update_awaiting){
               $success = 1;
            }
            
            
            else {
            $success = 0;
            }    // $update_pledges && $update_awaiting else
        
  
    
    
    
         //}   
       
        
        }  //end of $insert_receiver
            
             else{
            $succes = 0;
            }  // end of $insert_receiver else
        }
    }    //end of $num_of_payers > 0 &&  $num_of_receiver > 0
     
      
   
}  // end of counter for loop
        
        // $move_to_awaiting_second = mysqli_query($con, "INSERT INTO tp_awaiting_second_payment(tp_user_unique_id, tp_amount,tp_username,tp_momo_number,tp_roi,tp_first_gh_amount,tp_recommit_amount) VALUES ('  $tp_receiver_unique_id','$receiver_amount','$receiver_momo_name','$receiver_momo_number',' $receiver_roi_amount',' $receiver_first_gh_amount ',' $receiver_recommit_amount ')");
        
        
        
         
        //echo  $num_of_past_match ;
      if($success == 1){
                ?>
    <div class="alert alert-success">
        <p class="text-center">
            <span class="fa fa-check"></span> Match made successfully
        </p>
    </div>
    <?php
            }
        
         
       
        
        
    }  // end of form call if
    
    elseif(!isset($_POST['receivers'])  || !isset($_POST['pledge']) || !isset($_POST['confirm_match'])) {
        echo "";
    }    // end of form call else

       
       
}   //end of session 
  

?>
