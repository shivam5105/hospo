<?php
include_once("settings.php");

global $mysqli;
$query = "SELECT subscriptions.* FROM users join subscriptions on subscriptions.user_id=users.id where users.role_id=2 AND users.email_confirmed=1 AND users.membership_status='Active' ORDER BY subscriptions.id desc limit 1";
    if($stmt = $mysqli->query($query)){
	    $users=$stmt->fetch_all(MYSQLI_ASSOC);
		  print_r($users);
	// foreach($users as $user){
		// $userid=$user['id'];
			  // if($stmt = $mysqli->query("update users set membership_status='Expired' where user_id=$userid ")){
			   
				
			  // }
		// }
   
    }
?>