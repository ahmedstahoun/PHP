<?php

$users = convert_file_to_array();

echo "<h2> All Users </h2>";
echo str_repeat("-", 40);

foreach($users as $user){
   
   
    $user_details = explode(",",$user); 
    $visiting_date = $user_details[0];
    $ip_address = $user_details[1];
    $email = $user_details[2];
    $name = $user_details[3];

    echo "<ul>
    <li> <b> Visiting Date : </b> $visiting_date </li>
    <li> <b> IP Address : </b> $ip_address </li>
    <li> <b> Name : </b> $name </li> 
    <li> <b> Email : </b> $email </li>
        </ul>";
echo str_repeat("-", 40);

}