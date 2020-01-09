<?php

define('api', 'https://api.telegram.org/bot'.token.'/');

$data = file_get_contents("php://input");
$update = json_decode($data, true);

$message = $update["message"];
$text = $message["text"];
$cid = $update["message"]["from"]["id"];
$from = $message["from"];
$username = $from["username"];
$nome = $from["first_name"];
$cognome = $from["last_name"];

$cbid = $update["callback_query"]["from"]["id"];
$cbdata = $update["callback_query"]["data"];

function callback($up){
    return $up["callback_query"];
}

function apiRequest($metodo){
    $req = file_get_contents(api.$metodo);
    return $req;
}

function send($id, $text){
    if(strpos($text, "\n")){
        $text = urlencode($text);
        //'reply_to_message_id' => $reply_to_message_id,
    }
    return apiRequest("sendMessage?text=$text&parse_mode=HTML&chat_id=$id");
}


function keyboard($tasti, $text, $cd){
$tasti2 = $tasti;
    
$tasti3 = json_encode($tasti2);
    
    if(strpos($text, "\n")){
        $text = urlencode($text);
    }

apiRequest("sendMessage?text=$text&parse_mode=Markdown&chat_id=$cd&reply_markup=$tasti3");
}



function inlinekeyboard($menud, $chat, $text){
$menu = $menud;
    
    if(strpos($text, "\n")){
        $text = urlencode($text);
    }
    
    $d2 = array(
    "inline_keyboard" => $menu,
    );
    
    $d2 = json_encode($d2);
    
    return apiRequest("sendMessage?chat_id=$chat&parse_mode=Markdown&text=$text&reply_markup=$d2");
}

/*
function sendMsg($cid, $text, $keyboard = null, $reply_to_message_id = "0", $disable_web_page_preview = false) {
      $r = $this->apiRequest('sendMessage',
         array(
            'chat_id' => $id,
            'text' => $text,
            'parse_mode' => 'HTML',
            'reply_to_message_id' => $reply_to_message_id,
            'disable_web_page_preview' => $disable_web_page_preview
         )
      );
      $this->run_event($r["result"]);
      return $r;
   }
*/
//f57a-af0a-57a2-7d48

