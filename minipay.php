<?php


if(is_numeric($ex[1])){

if($ex[1] == '0'){
$ex[1] = 00;
}

     
     
     
     $disp2 = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM main WHERE id='1'"));

     $tot = $ex[1];
     $insert = mysqli_query($db, "UPDATE main SET minipay='".$tot."' WHERE id ='1'"); 
                
                
                $bot->send_message($chatid, "💎 minimum payout set to ₹".$ex[1]."\n", null, null, 'HTML');
            
        }else{
            
            $bot->send_message($chatid, "❌ Please use correct format.", null, null, 'HTML');
        }