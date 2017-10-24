<?php
include_once("settings.php");

global $mysqli;
$query = "SELECT users.id as userid, packages.price,packages.type,subscriptions.* ,
if(packages.type='year', DATE_ADD(subscriptions.created_at, INTERVAL 1 YEAR), DATE_ADD(subscriptions.created_at, INTERVAL 1 MONTH)) as expired

FROM users join subscriptions on subscriptions.user_id=users.id join packages on packages.id=subscriptions.package_id where users.role_id=2 AND users.email_confirmed=1 AND users.membership_status='Active' 
AND packages.type!='free' 
AND subscriptions.id=(SELECT t2.id
                 FROM subscriptions t2
                 WHERE t2.user_id = subscriptions.user_id  and t2.status='Paid'          
                 ORDER BY t2.id DESC
                 LIMIT 1)
                 
                 
having  CURDATE()>=expired";
    if($stmt = $mysqli->query($query)){
	    $users=$stmt->fetch_all(MYSQLI_ASSOC);
		  print_r($users);
 foreach($users as $user){
		$userid=$user['userid'];
			 if($stmt = $mysqli->query("update users set membership_status='Expired' ,updated_at=now() where user_id=$userid ")){
			   
				
			 }
		}
   
    }
?>