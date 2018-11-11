<?php

  /**
   * Email Sender library
   */
  class MY_Email extends CI_Email
  {
    function __construct()
    {
      parent::__construct();
    }

    function sendemail($message = array())
    {
      $config['protocol'] = 'smtp';
      $config['smtp_host'] = 'ssl://smtp.gmail.com';
      $config['smtp_port'] = 465;
      $config['smtp_user'] = ''; //email pengirim
      $config['smtp_pass'] = ''; //password pengirim
      $config['mailtype'] = 'html';
      $config['charset'] = 'iso-8859-1';
      $config['wordwrap'] = TRUE;

      parent::initialize( $config );
      parent::set_newline("\r\n");
      parent::from($config['smtp_user']); //email pengirim
      parent::to($message['receiver']); //email penerima
      parent::subject($message['subject']); //subjek
      parent::message($message['message']); //isi pesan
      
      return parent::send();
    }
  }
?>
