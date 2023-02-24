<?php


$sql_chek = "SELECT * FROM users WHERE chat = '".$chatid."'";
        $chek = mysqli_query($db, $sql_chek);
        $thee = mysqli_num_rows($chek);
        
        if ($thee == 0) {
                        $sql_insert = "INSERT INTO users (chat,username,step,refby,joinon) VALUES('".$chatid."','@".$username."','none','".$ex[1]."','".$date."')";

                        $insert = mysqli_query($db, $sql_insert);
         }elseif($chatid == $ex[1]){
$insertstep = mysqli_query($db, "UPDATE users SET step = 'none' WHERE chat = '".$chatid."'");
mysqli_query($db, "UPDATE users SET username = '@".$username."' WHERE chat = '".$chatid."'");
$bot->send_message($chatid, "You cannot self refer yourself.", null, null, 'HTML');
        }else{
$insertstep = mysqli_query($db, "UPDATE users SET step = 'none' WHERE chat = '".$chatid."'");
mysqli_query($db, "UPDATE users SET username = '@".$username."' WHERE chat = '".$chatid."'");
$bot->send_message($chatid, "You are already user of this bot.", null, null, 'HTML');
        }


        $minj = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM main WHERE id='1'"));
$mni = $minj['minipay'];     
$mni1 = $minj['refer'];
$mni2 = $minj['bonus'];           
           $menu = new ReplyKeyboardMarkup(true, false);
        
        $options[0][0]="💳 Balance";
        $options[1][0]="🔋 Referral";
        $options[1][1]="🎰 Bonus";
        $options[1][2]="Withdraw 💵";
        $options[2][0]="📊 Statistic";
        $options[2][1]="💼 Set wallet";
        $menu->add_option($options);
        
       $bot->send_message($chatid, "<b>👋 Welcome to ".SERVICE_NAME."</b> \n\nPress 🎰 Bonus to get Daily Bonus: <b>".$mni2." £AM </b>\nPress 🔋Referral to get your invite link and earn <b>".$mni1." £AM </b>  per referral\n\nMinimum withdraw: <b>".$mni." £AM.</b>", null, json_encode($menu), 'HTML');
  
       