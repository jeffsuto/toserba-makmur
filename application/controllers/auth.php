<?php

  /**
   * Controller untuk login dan logout
   */
  class Auth extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
    }

    function lupapassword()
    {
      $message['receiver'] = $this->input->post('email');
      $user = Customer::where('email', $message['receiver'])->get();
      if ($user->count() > 0)
      {
        $message['subject'] = 'Reset password';
        $message['message'] = 'Password anda : '.$user[0]['password'];

        if ($this->email->sendemail($message)) {
          echo json_encode(array(
            "success" => 1,
            "message" => 'Password baru telah dikirim ke email anda. Silahkan cek email sekarang'
          ));
        }else {
          echo json_encode(array("success" => 0));
        }
      }
      else
      {
        echo json_encode(array("success" => 0));
      }
    }

    function login()
    {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $user = Users::where( array('username' => $username,
                                  'password' => $password) )->get();

      if($user->count() > 0)
      {
        $this->session->set_userdata('AdmiN', $username);
      }
      redirect(base_url());
    }

    function logout()
    {
      $this->session->unset_userdata('AdmiN');
      redirect(base_url());
    }

    function logincustomer()
    {
      $email    = $this->input->post('email');
      $password = $this->input->post('password');

      $cust     = Customer::where( array('email'    => $email,
                                         'password' => $password ) )->get();

      if ($cust->count() > 0)
      {
        foreach ($cust as $row)
        {
          echo json_encode( array(
            'success' => 1,
            'id_customer' => $row['id_customer']
          ) );
        }
      }
      else {
        echo json_encode( array('success' => 0) );
      }
    }

  }


?>
