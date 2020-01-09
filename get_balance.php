<?php

require_once("block_io.php");

$apiKey = "f57a-af0a-57a2-7d48";
$version = 2; // API version
$pin = "55kmn)%+Zs_block.io";
$block_io = new BlockIo($apiKey, $pin, $version);

$address1 = '2N6cnR3vbpiyAKFHyGmKfHyb1FTBSiZr7Bf';

//$balance_query = $block_io->get_address_balance(array('addresses' => '.tp_deposit_address.'));
      $balance_query= $block_io->get_address_balance(array('addresses' => $address1));
print_r($balance_query);

$network= $balance_query->data->network;
  $available_balance = $balance_query->data->available_balance;
 $pending_balance = $balance_query->data->pending_received_balance;
$status = $balance_query->status;


//$balance =  $balance_query.balances[0];
$b=$balance_query->data->balances;
$a = $b[0];
echo '<br>';
print_r($a);
$avail = $a->available_balance;

echo "av ".$avail;



echo "Status: $status";
echo '<br>';
echo "Network: $network";
echo '<br>';
echo "Available Balance: $available_balance";
echo '<br>';
echo "Pending Balance: $pending_balance";


?>

