<?php
// This file is the place to store all basic functions

function mysql_prep( $value ) {
    global $con;
    $magic_quotes_active = get_magic_quotes_gpc();
    $new_enough_php = function_exists( "mysqli_real_escape_string" ); // i.e. PHP >= v4.3.0
    if( $new_enough_php ) { // PHP v4.3.0 or higher
        // undo any magic quote effects so mysql_real_escape_string can do the work
        if( $magic_quotes_active ) { $value = stripslashes( $value ); }
        $value = mysqli_real_escape_string( $con,$value );
    } else { // before PHP v4.3.0
        // if magic quotes aren't already on then add slashes manually
        if( !$magic_quotes_active ) { $value = addslashes( $value ); }
        // if magic quotes are active, then the slashes already exist
    }
    return $value;
}

function redirect_to( $location = NULL ) {
    if ($location != NULL) {
       header("Location: {$location}");
       exit;
   }
}

function confirm_query($result_set) {
    if (!$result_set) {
        die("Database query failed: " . mysql_error());
    }
}



function test_input($data){
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}


function checkValues($value)
{
    // Use this function on all those values where you want to check for both sql injection and cross site scripting
    //Trim the value
    $value = trim($value);

    // Stripslashes
    if (get_magic_quotes_gpc()) {
        $value = stripslashes($value);
    }

    // Convert all &lt;, &gt; etc. to normal html and then strip these
    $value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));

    // Strip HTML Tags
    $value = strip_tags($value);

    // Quote the value
    $value = addslashes($value);
    return $value;

}

function mb_stripos_all($haystack,$needle){
    $s=0;
    $i=0;
    while(is_integer($i)){
        $i=mb_strpos($haystack,$needle,$s);
        if(is_integer($i)){
        $aStrPos[]=$i;
        $s = $i+mb_strlen($needle);
    }
}
if(isset($aStrPos)){
    return $aStrPos;
}else{
    return false;
}
}

function apply_highlight($a_json,$parts){
    $p=count($parts);
    $rows=count($a_json);
    for($row=0;$row<$rows;$row++){
    $label=$a_json[$row]['label'];
        $a_label_match=array();
        for($i=0;$i<$p;$i++){
            $part_len=mb_strlen($parts[$i]);
        $a_match_start=mb_stripos_all($label,$parts[$i]);
        foreach($a_match_start as $part_pos){
            $overlap=false;
            foreach($a_label_match as $pos => $len){
                if($part_pos - $pos >=0 && $part_pos - $pos < $len){
                    $overlap=true;
                    break;
                }
            }
            if(!$overlap){
                $a_label_match[$part_pos]=$part_len;
            }
        }
    }
    if (count($a_label_match)>0){
        ksort($a_label_match);
        $label_highlight='';
        $start=0;
        $label_len=mb_strlen($label);
        foreach($a_label_match as $pos =>$len){
            if($pos-$start>0){
                $no_highlight=mb_substr($label,$start,$pos-$start);
                $label_highlight.=$no_highlight;
            }
            $highlight='<span class="hl_results">'.mb_substr($label,$pos,$len).'</span>';
            $label_highlight.=$highlight;
            $start=$pos+$len;
        }
        if($label_len-$start>0){
            $no_highlight=mb_substr($label,$start);
            $label_highlight.=$no_highlight;
        }
        $a_json[$row]['label']=$label_highlight;
    }
}
return $a_json;
}

function crop($file, $final, $new_width, $new_height){

    list($width, $height, $image_type) = getimagesize($file);
    switch($image_type)
    {
        case 1:
            $image = imagecreatefromgif($file);
            break;
        case 2:
            $image = imagecreatefromjpeg($file);
            break;
        case 3:
            $image = imagecreatefrompng($file);
            break;
        default: return '';
            break;
    }

    $image_p = imagecreatetruecolor($new_width, $new_height);
    if(($image_type == 1) OR ($image_type == 3))
    {
        imagealphablending($image_p, false);
        imagesavealpha($image_p, true);
        $transparent = imagecolorallocatealpha($image_p, 255,255,255,127);
        imagefilledrectangle($image_p, 0, 0, $new_width, $new_height, $transparent);
    }
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    ob_start();
    switch ($image_type)
    {
        case 1:
            imagegif($image_p);
            break;
        case 2:
            imagejpeg($image_p, $final, 100);
            break;
        case 3:
            imagepng($image_p, $final, 0);
            break;
        default:
            echo '';
            break;
    }
    $final_image = ob_get_contents();
    ob_end_clean();
    return $final_image;
}
