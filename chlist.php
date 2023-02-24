<?php

mysqli_query($db, "ALTER TABLE channel DROP id");
mysqli_query($db, "ALTER TABLE channel AUTO_INCREMENT = 1");
mysqli_query($db, "ALTER TABLE channel ADD id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
$ch = mysqli_query($db, "SELECT * FROM channel ORDER BY id");
        if(mysqli_num_rows($ch) > 0){
            
            $totch = mysqli_query($db, 'SELECT COUNT(1) FROM channel');
            $countch = mysqli_fetch_array($totch); // total channels
            foreach ($ch as $channel) {
            $result = $bot->getChat($channel['cid']);
print_r($result);
            $type = $result->result->username;   
             $insert = mysqli_query($db, "UPDATE channel SET username = '@$type' WHERE cid = '".$channel['cid']."'");
                $item .= $channel['id']." @".$type." - ".$channel['member']."\n🆔<code>".$channel['cid']."</code>\n\n";
            }
            $bot->send_message($chatid, "🗳 Channels Lists\n<b>ID  Channel </b>\n".$item."\n<b>📢 Total channels: ".$countch[0]."\n</b>", null, null, 'HTML', false, true);
        }else{
            $bot->send_message($chatid, "❌ No channels registered yet.", null, null, 'HTML');
        }