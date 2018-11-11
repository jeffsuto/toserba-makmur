<?php

  /**
   * Notification for android with firebase clouds
   */

  // TODO : API_ACCESS_KEY dari firebase
  define( 'API_ACCESS_KEY', 'YOUR_API_ACCESS_KEY');

  class Notification
  {

    function send($message = array(), $id_customer = "")
    {
      $msg = array(
        'body' => $message['body'],
        'title' => 'Toserba Makmur - '.$message['title']
      );

      if ($id_customer == "") {
        $fields = array(
          'to' => '/topics/YOUR_PACKAGE_APP', // TODO : isi mobile package app 
          'notification'	=> $msg
        );
      }else {
        $fields = array(
          'to' => '/topics/YOUR_PACKAGE_APP.'.$id_customer, // TODO : isi mobile package app
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
