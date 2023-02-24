<?php




if(preg_match('/^\d{10}$/',$ex[0])){

$c = mysqli_query($db, "UPDATE users SET number = '".$ex[0]."' WHERE chat = '".$chatid."'");
$min = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE chat='".$chatid."'"));
$bl = $min['balance'];
$min1 = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM main WHERE id='1'"));
$bl1 = $min1['minipay'];

if($bl >= $bl1){
mysqli_query($db, "UPDATE users SET step = 'withdraw' WHERE chat = '".$chatid."'");
        $menu = new ReplyKeyboardMarkup(true, false);        
        $options[0][0]="🚫 Cancel";        
        $menu->add_option($options);
        
       $bot->send_message($chatid, "<b>💲 Withdrawal of your balance</b>\n\n<code>Your Balance:</code><b> ".$min[balance]." INR</b>\n<code>Your Paytm Number:</code><b> ".$min[number]."</b>\n\n🔻Please enter the amount to withdraw:", null, json_encode($menu), 'HTML');
               }else{
               
        $menu = new ReplyKeyboardMarkup(true, false);        
        $options[0][0]="💳 Balance";
        $options[1][0]="🔋 Referral";
        $options[1][1]="🎰 Bonus";
        $options[1][2]="Withdraw 💵";
        $options[2][0]="📊 Statistic";
        $options[2][1]="💼 Set wallet";
        if($there_admin == 1){ $options[3][0]="🌱admin panel"; }
        $menu->add_option($options);
        
       $bot->send_message($chatid, "you need minimum $bl1 INR to withdraw.", null, json_encode($menu), 'HTML');
  
               }
}else{
$bot->send_message($chatid,"<b>⚠️ Invalid Number</b>",null, null, 'HTML');
}