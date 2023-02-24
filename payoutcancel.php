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
    
    
    $disp2 = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE chat='".$idc."'"));
    $ball = $disp2['balance'] + $bal;
    mysqli_query($db, "UPDATE users SET balance='".$ball."' WHERE chat ='".$idc."'");
    
    $bot->send_message($idc, "<b>Your withdraw request Declined!\n".$bal."₹ has be refunded.</b>", null, null, 'HTML');
    $bot->edit_message($chatid2,$mid2, "User will be noticed Declined.",null, 'HTML',null, null);
    
    }