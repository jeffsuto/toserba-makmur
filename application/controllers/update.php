<?php

  /**
   * Controller untuk update data
   */
  class Update extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model(array(
        'pengiriman', 'detailpengiriman', 'detailpenjualan','ulasan', 'users'
      ));
      $this->load->library('notification');
    }

    function pegawai($id = "")
    {
      Users::where('id', $id)->update([
        'nama' => $this->input->post('nama'),
        'email' => $this->input->post('email'),
        'alamat' => $this->input->post('alamat'),
        'username' => $this->input->post('username'),
        'tlp' => $this->input->post('telp'),
      ]);

      redirect(base_url('admin/pegawai'));
    }

    function ulasan($id="", $kode_barang="")
    {
      $update = Ulasan::where('id_customer', $id)->where('kode_barang', $kode_barang)->update([
        'komentar'     => $this->input->post('komentar')
      ]);
      if ($update) {
        echo json_encode(array("success" => 1));
      }else {
        echo json_encode(array("success" => 0));
      }
    }

	  function statusditerima($id)
    {
		  $status = $this->input->post('status_pengiriman');
      $update = Pengiriman::where('id_penjualan', $id)->update([
        'status_pengiriman' => $status
      ]);

      if ($update) {
        echo json_encode(array("success" => 1));
      }else {
        echo json_encode(array("success" => 0));
      }

      redirect('admin/pengiriman');
    }

    function akun()
    {
      $id             = $this->input->post('id');
      $username       = $this->input->post('username');
      $password       = $this->input->post('password');

      Users::where('id', $id)->update([
        'username'  => $username,
        'password'  => $password
      ]);
      redirect(base_url('admin/setting'));
    }

    function detailpengiriman($id, $id_customer = "")
    {
      $id_detail      = $this->input->post('id_detail');
      $barang_kirim   = $this->input->post('jml_barang_terkirim');
      $no_resi        = $this->input->post('resi');

      Pengiriman::where('id_pengiriman', $id)->update([
        'no_resi'  => $no_resi,
        'status_pengiriman' => 'TERKIRIM',
        'waktu_pengiriman'  => date('Y-m-d H:i:s')
      ]);

      for ($i=0; $i < count($id_detail); $i++) {
        DetailPengiriman::where('id_detail_pengiriman', $id_detail)->update([
          'jml_barang_kirim'  => $barang_kirim[$i]
        ]);
      }

      $customer = Customer::where('id_customer', $id_customer)->first();

      $message = array(
        'title' => 'Barang Terkirim',
        'body' => 'Barang yang anda pesan telah dikirim.'
      );

      $message_email = array(
        'receiver' => $customer->email,
        'subject'  => 'BARANG TERKIRIM',
        'message'  => 'Barang yang anda pesan telah dikirim'
      );
      $this->notification->send($message, $id_customer);
      $this->email->sendemail($message_email);
      
      redirect('admin/pengiriman');
    }

    function statuspengiriman($id, $status)
    {
      if ($status == 1) {
        Pengiriman::where('id_pengiriman', $id)->update([
          'status_pengiriman'  => 'TERKIRIM',
          'waktu_pengiriman'   => date('Y-m-d H:i:s')
        ]);

      }else {
        Pengiriman::where('id_pengiriman', $id)->update([
          'status_pengiriman'  => 'BELUM TERKIRIM'
        ]);
      }
      redirect('admin/pengiriman');
    }

    function buktipembayaran($id = "")
    {
      $nmfile = $id."_"; //nama file
      $config['upload_path'] = './assets/images/bukti/'; //Folder untuk menyimpan hasil upload
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = $nmfile; //nama yang terupload nantinya
      $config['overwrite'] = true;
      $this->upload->initialize($config);

      if ($_FILES['foto'])
      {
        if($this->upload->do_upload('foto'))
        {
          $img = $this->upload->data();
          $update = Penjualan::where("id", $id)->update([
            'bukti_pembayaran' => $img['file_name'],
            'status_pembelian' => "PROSES VALIDASI"
          ]);

          //dibawah ini merupakan code untuk resize
          $config2['image_library'] = 'gd2';
          $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
          $config2['maintain_ratio'] = TRUE;
          $config2['width'] = 1000; //lebar setelah resize menjadi 1000 px
          $this->load->library('image_lib',$config2);
          $this->image_lib->resize(); //proses resize

          echo json_encode( array("success" => 1) );
        }
      }
    }

    function mstatuspenjualan($id)
    {
      $status = $this->input->post('status');
      $update = Penjualan::where('id', $id)->update([
        'status_pembelian' => $status
      ]);

      if ($update) {
        echo json_encode(array('status' => 1));
      }else {
        echo json_encode(array('status' => 0));
      }
    }

    function statuspenjualan($id, $status, $id_customer = "")
    {
      if ($status == 1) {

        Penjualan::where('id', $id)->update([
          'status_pembelian'  => 'SUDAH BAYAR'
        ]);

        $barang = detailPenjualan::where('id_penjualan', $id)->get();
        $cek = "";
        foreach ($barang as $row) {
          $stok = Barang::where('kode_barang', $row['kode_barang'])->get();
          $cek = Barang::where('kode_barang', $row['kode_barang'])->update([
            'stock_barang'  => $stok[0]['stock_barang'] - $row['qty']
          ]);
        }

        $message = array(
          'title' => 'Barang Tervalidasi',
          'body' => 'Barang yang anda pesan telah terbayar.'
        );

        $customer = Customer::where('id_customer', $id_customer)->first();
        $message_email = array(
          'receiver' => $customer->email,
          'subject'  => 'BARANG TERVALIDASI',
          'message'  => 'Barang yang anda pesan telah terbayar.'
        );
        $this->notification->send($message, $id_customer);
        $this->email->sendemail($message_email);

      }
      else {
        Penjualan::where('id', $id)->update([
          'status_pembelian'  => 'DIBATALKAN'
        ]);

        $message = array(
          'title' => 'Barang Terkirim',
          'body' => 'Barang yang anda pesan telah dikirim.'
        );

        $customer = Customer::where('id_customer', $id_customer)->first();
        $message_email = array(
          'receiver' => $customer->email,
          'subject'  => 'BARANG TERVALIDASI',
          'message'  => 'Barang yang anda pesan telah terbayar.'
        );
        $this->notification->send($message, $id_customer);
        $this->email->sendemail($message_email);
      }
      redirect('admin/penjualan');
    }

    function barang($id = "")
    {
      $kode     = $this->input->post('kode');

      $nmfile = $kode."_"; //nama file
      $config['upload_path'] = './assets/images/items/'; //Folder untuk menyimpan hasil upload
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = $nmfile; //nama yang terupload nantinya
      $this->upload->initialize($config);

      if ($_FILES['img'])
      {
        if($this->upload->do_upload('img'))
        {
          $img = $this->upload->data();
          $update = Barang::where('kode_barang', $id)->update([
            'kode_barang'       => $kode,
            'id_supplier'       => $this->input->post('id_supplier'),
            'kode_kategori'     => $this->input->post('kode_barang'),
            'nama_barang'       => $this->input->post('nama'),
            'stock_barang'      => $this->input->post('stok'),
            'harga_barang'      => $this->input->post('harga'),
            'diskon'            => $this->input->post('diskon'),
            'berat'             => $this->input->post('berat'),
            'dimensi'           => $this->input->post('p')."x".$this->input->post('l')."x".$this->input->post('t'),
            'deskripsi'         => $this->input->post('deskripsi'),
            'image'             => $img['file_name']
          ]);

          //dibawah ini merupakan code untuk resize
          $config2['image_library'] = 'gd2';
          $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
          $config2['maintain_ratio'] = TRUE;
          $config2['width'] = 1000; //lebar setelah resize menjadi 1000 px
          $this->load->library('image_lib',$config2);
          $this->image_lib->resize(); //proses resize

          if ($update) {
            redirect(base_url('admin/barang'));
          }
          else {
            echo "Gagal";
          }
        }
        else
        {
          $update = Barang::where('kode_barang', $id)->update([
            'kode_barang'       => $kode,
            'id_supplier'       => $this->input->post('supplier'),
            'kode_kategori'     => $this->input->post('kategori'),
            'nama_barang'       => $this->input->post('nama'),
            'stock_barang'      => $this->input->post('stok'),
            'harga_barang'      => $this->input->post('harga'),
            'diskon'            => $this->input->post('diskon'),
            'berat'             => $this->input->post('berat'),
            'dimensi'           => $this->input->post('p')."x".$this->input->post('l')."x".$this->input->post('t'),
            'deskripsi'         => $this->input->post('deskripsi')
          ]);
        }
      }
    }

    function customer($id = "", $mode = "")
    {
      // $update = "";
      // $email_check;

      switch ($mode) {

        case 'password':
          $oldpass = $this->input->post('oldpass');
          $newpass = $this->input->post('newpass');

          $customer = Customer::where('id_customer', $id)->get();
          if ($oldpass != $customer[0]['password']) {
            echo json_encode(array("success" => 2));
          }else {
            $update = Customer::where('id_customer', $id)->update([
              'password' => $newpass
            ]);

            if ($update) {
              echo json_encode(array("success" => 1));
            }else {
              echo json_encode(array("success" => 0));
            }
          }

          break;

        case 'alamat':

          $alamat = $this->input->post('alamat');
          $kota   = $this->input->post('kota');

          $update = Customer::where( array('id_customer' => $id) )->update([

            'alamat'      => $alamat,
            'id_kota'        => $kota
          ]);

          if ($update) {
            echo json_encode(array("success" => 1));
          }else {
            echo json_encode(array("success" => 0));
          }
          break;

        case 'foto':

          $nmfile = $id."_"; //nama file
          $config['upload_path'] = './assets/images/customers/'; //Folder untuk menyimpan hasil upload
          $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
          $config['file_name'] = $nmfile; //nama yang terupload nantinya
          $config['overwrite'] = true;
          $this->upload->initialize($config);

          if ($_FILES['foto'])
          {
            if($this->upload->do_upload('foto'))
            {
              $img = $this->upload->data();
              $update = Customer::where('id_customer', $id)->update([
                'image'             => $img['file_name']
              ]);

              //dibawah ini merupakan code untuk resize
              $config2['image_library'] = 'gd2';
              $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
              $config2['maintain_ratio'] = TRUE;
              $config2['width'] = 1000; //lebar setelah resize menjadi 1000 px
              $this->load->library('image_lib',$config2);
              $this->image_lib->resize(); //proses resize

              echo json_encode( array("success" => 1) );
            }
          }
          break;

        case 'nama':
          $update = Customer::where('id_customer', $id)->update([
            'nama'     => $this->input->post('nama')
          ]);
          if ($update) {
            echo json_encode(array("success" => 1));
          }else {
            echo json_encode(array("success" => 0));
          }
          break;

        case 'username' :
          $update = Customer::where('id_customer', $id)->update([
            'username'    => $this->input->post('username')
          ]);
          if ($update) {
            echo json_encode(array("success" => 1));
          }else {
            echo json_encode(array("success" => 0));
          }
          break;

        case 'email' :
          // $email_check = $this->m_get->mail_exists(strtolower($this->input->post('email'))->result_array();
          $update = Customer::where('id_customer', $id)->update([
            'email'     => $this->input->post('email')
          ]);
          if ($update) {
            echo json_encode(array("success" => 1));
          }else {
            echo json_encode(array("success" => 0));
          }
          break;

        case 'telp' :
          $update = Customer::where('id_customer', $id)->update([
            'tlp'     => $this->input->post('tlp')
          ]);
          if ($update) {
            echo json_encode(array("success" => 1));
          }else {
            echo json_encode(array("success" => 0));
          }
          break;
      }
      // if ($update) {
      //   echo json_encode(array("success" => 1));
      // }else {
      //   echo json_encode(array("success" => 0));
      // }
    }

    function kategori($id = "")
    {
      $update = Kategori::where('kode_kategori', $id)->update([
        'kode_kategori' => $this->input->post('kode'),
        'nama_kategori' => $this->input->post('nama')
      ]);
      if ($update) {
        redirect('admin/kategori');
      }else {
        echo "gagal";
      }
    }

    function supplier($id = "")
    {
      $update = Supplier::where('id', $id)->update([
        'nama'    => $this->input->post('nama'),
        'alamat'  => $this->input->post('alamat'),
        'tlp'     => $this->input->post('telp')
      ]);
      if ($update) {
        redirect('admin/supplier');
      }else {
        echo "gagal";
      }
    }

  }


?>
