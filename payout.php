<?php




if($ex[1] == 'open'){
     
     $disp2 = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM main WHERE id='1'"));

     $tot = $ex[1];
     $insert = mysqli_query($db, "UPDATE main SET payout='".$tot."' WHERE id ='1'"); 
                
                
                $bot->send_message($chatid, "✅Payout opened", null, null, 'HTML');
            
  }elseif($ex[1] == 'close'){
     
     $disp2 = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM main WHERE id='1'"));

     $tot = $ex[1];
     $insert = mysqli_query($db, "UPDATE main SET payout='".$tot."' WHERE id ='1'"); 
                
                
                $bot->send_message($chatid, "❎Payout closed", null, null, 'HTML');
            
        }else{
            
            $bot->send_message($chatid, "❌ Please use correct format.", null, null, 'HTML');
        }