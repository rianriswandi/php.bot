<?php

$dip = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE chat='$chatid'"));
$disp3 = $dip['status'];
$cdt = $dip['refby'];

if($disp3 == 'not active'){

        $disp = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE chat='".$cdt."'"));
        $disp2 = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM main WHERE id='1'"));
     
        $ref = $disp[refer] + 1;
        $lev = $disp[balance];
        $di = $disp2[refer]; //main
        $di1 = $di + $lev;
        
        mysqli_query($db, "UPDATE users SET balance = '".$di1."' WHERE chat = '".$cdt."'");
        mysqli_query($db, "UPDATE users SET refer = '".$ref."' WHERE chat = '".$cdt."'");
        mysqli_query($db, "UPDATE users SET status = 'active' WHERE chat = '".$chatid."'");
        $bot->send_message($cdt, "<b>⚡ ".$di." INR earned from new refferal.</b>",null, null, 'HTML');
        }
        
        
        $minj = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM main WHERE id='1'"));
        $mni = $minj['minipay'];     
        $mni1 = $minj['refer'];    
        
        $menu = new ReplyKeyboardMarkup(true, false);
        
        $options[0][0]="💳 Balance";
        $options[1][0]="🔋 Referral";
        $options[1][1]="🎰 Bonus";
        $options[1][2]="Withdraw 💵";
        $options[2][0]="📊 Statistic";
        $options[2][1]="💼 Set wallet";
        $menu->add_option($options);
       $bot->delete_message($chatid,$mid-1); 
       $bot->send_message($chatid, "<b>👋 Welcome to ".SERVICE_NAME."</b> \n\nPress 🎰 Bonus to get Daily Bonus: <b>".$mni1." £AM </b>\nPress 🔋Referral to get your invite link and earn <b>0.10 £AM</b>  per referral\n\nMinimum withdraw: <b>".$mni." £AM.</b>", null, json_encode($menu), 'HTML');
  
       