<?php

$chatid3 = $update->callback_query->from->id;
$fn = $update->callback_query->from->first_name;
$fl = $update->callback_query->from->last_name;

$adin1 = "SELECT * FROM admins WHERE u_id = '$chatid3'";
                    $check_adin1 = mysqli_query($db, $adin1);
                    $there_adin1 = mysqli_num_rows($check_adin1);
                    
if($there_adin1 == 1){
$ex = explode('|||',$data2);
    
    $disp = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM payment WHERE id='".$ex[1]."'"));
    $bal = $disp['amt'];
    $num = $disp['number'];
    $idc = $disp['chat'];
    $nm = $disp['name'];
    $numf = substr_replace($num ,"*****", -5);
    
    $disp1 = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE chat='".$idc."'"));
    $with = $disp1['withdraw'] + $bal;    
    mysqli_query($db, "UPDATE users SET withdraw ='".$with."' WHERE chat ='".$idc."'");
    
    $disp2 = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE chat='".$chatid3."'"));
    $with1 = $disp2['balance'] + $bal + 0.25;
    mysqli_query($db, "UPDATE users SET balance ='".$with1."' WHERE chat ='".$chatid3."'");
    mysqli_query($db, "DELETE FROM payment WHERE id = '".$ex[1]."'");
    
    $bot->send_message(CHANNEL_ID, "📫<b> New withdrawal\n\nName:</b> $nm \n<b>Paytm Number:</b><code> $numf </code>\n<b>Amount:</b><code> $bal </code>£AM \n◈ ━━━━━━━ ● ━━━━━━━ ◈\n🎮<b> Status ~ Paid 🟢</b>\n◈ ━━━━━━━ ● ━━━━━━━ ◈\n🤖 Bot: @".BOT_USERNAME." ", null, null, 'HTML');
    $bot->send_message($idc, "📫<b> New withdrawal\n\nName:</b> $nm \n<b>Paytm Number:</b><code> $num </code>\n<b>Amount:</b><code> $bal </code>£AM \n◈ ━━━━━━━ ● ━━━━━━━ ◈\n🎮<b> Status ~ Paid 🟢</b>\n◈ ━━━━━━━ ● ━━━━━━━ ◈\n", null, null, 'HTML');
    $bot->edit_message($chatid2,$mid2, "order claimed by $fn $fl\nPay<code> $bal </code>to<code> $num </code>via Paytm. ",null, 'HTML',null, null);
    
    }
    
    
    
$emai = substr_replace("adsbot.telegram@gmail.com" ,"*****@gmail.com", 6); 
echo "$emai";