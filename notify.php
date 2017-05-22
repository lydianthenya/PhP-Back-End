<?php
#API access key from Google API's Console
    define( 'API_ACCESS_KEY', 'AAAAKx_q5U8:APA91bFtDmp9X9-ZEhtcz4ZYx-eH-7emTBafBZTjF_cawCJIk-5o0Kpd1alQQ1ZQyToL2apYJ4nemTecDSeM8wgR_Y8F_xeozZFPYvO31X-7T6KuWcVXozsTmOEiGZe2szgbnpHr4zw9' );

    $registrationIds ='cS2J-ZDIgTY:APA91bGi7MCG5eDQIiZZSEjX677JpSM5vdgyEJK3B-06SZIhzFrFBPapkSID5mVlbPtz6wUWoIYhYW3ZxI97RjUH4G5MrFo7hWmd2iVJ-M5b247WmSKPwbVUSFfuKeoOGvPpYbDhawEM';
#prep the bundle
     $msg = array
          (
		        'body' 	=> 'User name has succesfully been registred',
		        'title'	=> 'Title Of Notification',
             	'icon'	=> 'myicon',/*Default Icon*/
              	'sound' => 'mySound'/*Default sound*/
          );
	$fields = array
			(
				'to'		=> $registrationIds,
				'notification'	=> $msg
			);
	
	
	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
#Echo Result Of FireBase Server
		