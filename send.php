<?php



$ch = mysqli_query($db, "SELECT * FROM users ORDER BY id");
$disp = mysqli_query($db, "SELECT * FROM users");
$t = mysqli_num_rows($disp);
$i = 0;

mysqli_query($db, "UPDATE users SET step='none' WHERE chat='$chatid'");
$bot->send_message($chatid, "sending $i of $t", null, null, 'HTML');
        

	foreach($ch as $key){		
	        $i++;	    
	        if($photo){
	        $bot->send_Photo($key['chat'], $photo, $caption, 'HTML', null, null);
                }else{
	        $bot->send_message($key['chat'], $text, null, null, 'HTML');    
	        } 
		$bot->edit_message($chatid,$mid+1,"sending $i of $t", null, null, 'HTML');    
		if(mt_rand(1,9) == 1){sleep(2);}            
	}
	$bot->edit_message($chatid,$mid+1,"Broadcast done.", null, null, 'HTML');
	

