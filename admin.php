<?php

mysqli_query($db, "UPDATE users SET step = 'none' WHERE chat = '".$chatid."'");
$menu = new ReplyKeyboardMarkup(true, false);
        
        $options[0][0]="đ¤ Send Broadcast";
        $options[0][1]="đĨ Add Channel";
        $options[1][0]="đ Channel list";
        $options[1][1]="đ¤ Admins list";
        $options[2][0]="âšī¸ Get User Info";
        $options[2][1]="đī¸ Commands";
        $options[3][0]="đ˛ Goto Start Menu";
        $menu->add_option($options);
        
       $bot->send_message($chatid, "<b>đ Welcome Admin.</b>", null, json_encode($menu), 'HTML');
  
       