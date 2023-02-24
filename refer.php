<?php

$disp = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE chat='$chatid'"));
$rf = $disp['refer'];

$disp2 = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM main WHERE id='1'"));
$ref = $disp2['refer'];

        $inline = new InlineKeyboardMarkup(true, true);
        $options[0][0] = ["text" => "🔗 Refer now", "url" => "https://t.me/share/url?url=https://t.me/".BOT_USERNAME."?start=$chatid"];
        $inline->add_option($options);
        
        $bot->send_message($chatid, "👭 You have $rf referrals.\n⚙️ Your referral link: \nhttps://t.me/".BOT_USERNAME."?start=".$chatid."\n\n💰 Per Referral $ref £AM - Share Your referral link to your Friends & earn unlimited £AM\n\n⚠️ Note\nFake, empty or spam users are deleted after checking.", null, json_encode($inline), 'HTML', false, true);
        
        
        
        
        
