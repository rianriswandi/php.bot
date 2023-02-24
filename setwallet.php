<?php


mysqli_query($db, "UPDATE users SET step = 'wallet' WHERE chat = '".$chatid."'");
        $menu = new ReplyKeyboardMarkup(true, false);        
        $options[0][0]="🚫 Cancel";        
        $menu->add_option($options);
        
       $bot->send_message($chatid, "🔻Please enter your Paytm number:", null, json_encode($menu), 'HTML');
  