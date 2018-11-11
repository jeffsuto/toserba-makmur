<?php

  /**
   * Notification for android with firebase clouds
   */

  define( 'API_ACCESS_KEY', 'AAAAakNiXv4:APA91bG_box8SC6w5B4mTrMggBbHBEmmFLYCOZOLXuo4j8wPjKFeoqzuSrQZa8xkptEq-uqkzk7CNYrZ6DS3sstjwBBs8zaBspH3Xxot1ZgW6LFjCTpBSa_1F-LduRFbu_3fvnSfsO3V');

  class Notification
  {

    function send($message = array(), $id_customer = "")
    {
      $msg = array(
        'body' => $message['body'],
        'title' => 'Toko Lestari - '.$message['title']
      );

      if ($id_customer == "") {
        $fields = array(
          'to' => '/topics/untag.tugasakhir.lestari.lestari',
          'notification'	=> $msg
        );
      }else {
        $fields = array(
          'to' => '/topics/untag.tugasakhir.lestari.lestari.'.$id_customer,
          'notification'	=> $msg
        );
      }

      $headers = array(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);

      $ch = curl_init();
  		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
  		curl_setopt( $ch,CURLOPT_POST, true );
  		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
  		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
  		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
  		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
  		curl_exec( $ch);
  		curl_close( $ch );
    }

  }

?>
