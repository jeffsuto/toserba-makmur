<?php

  /**
   * Controller add khusus untuk create data
   */
  class Add extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->library('code');
      $this->load->library('pdf');
      $this->load->library('notification');
      $this->load->model('pengiriman');
      $this->load->model('detailpenjualan');
      $this->load->model('detailpengiriman');
      $this->load->model('laporanpembelian');
      $this->load->model('ulasan');
      $this->load->model('users');
    }

    function pegawai()
    {
      $user = new Users;
      $user->nama = $this->input->post( 'nama' );
      $user->username = $this->input->post( 'username' );
      $user->email = $this->input->post( 'email' );
      $user->alamat = $this->input->post( 'alamat' );
      $user->tlp = $this->input->post( 'telp' );
      $user->password = 123456;
      $user->akses = 1;

      $user->save();
      redirect( base_url('admin/pegawai') );
    }

    function ulasan($id_customer, $kode_barang, $id_pengiriman = "")
    {
      $ulasan = new Ulasan;
      $ulasan->id_customer = $id_customer;
      $ulasan->kode_barang = $kode_barang;
      $ulasan->komentar    = $this->input->post('komentar');

      $nmfile = $kode_barang."_".$id_customer; //nama file
      $config['upload_path'] = './assets/images/komplain/'; //Folder untuk menyimpan hasil upload
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = $nmfile; //nama yang terupload nantinya
      $this->upload->initialize($config);

      if (isset($_FILES['img']))
      {
        if($this->upload->do_upload('img'))
        {
          $img = $this->upload->data();
          //dibawah ini merupakan code untuk resize
          $config2['image_library'] = 'gd2';
          $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
          $config2['maintain_ratio'] = TRUE;
          $config2['width'] = 1000; //lebar setelah resize menjadi 1000 px
          $this->load->library('image_lib',$config2);
          $this->image_lib->resize(); //proses resize

          $detailpengiriman = DetailPengiriman::where( array(
                                                        'id_pengiriman' => $id_pengiriman,
                                                        'kode_barang' => $kode_barang) )
                                            ->update([
                                              'kondisi_barang' => $img['file_name'],
                                              'jml_barang_terima' => $this->input->post('jml_terima'),
                                              'jml_barang_rusak' => $this->input->post('jml_rusak')
                                            ]); 
        }
      }
      else 
      {
        $detailpengiriman = DetailPengiriman::where( array(
                                                      'id_pengiriman'     => $id_pengiriman,
                                                      'kode_barang'   => $kode_barang) )
                                            ->update([
                                              'jml_barang_terima' => $this->input->post('jml_terima'),
                                              'jml_barang_rusak' => $this->input->post('jml_rusak')
                                            ]);      
      }

      if ($ulasan->save()) {
        echo json_encode( array('success' => 1) );
      }else {
        echo json_encode( array('success' => 0) );
      }
    }

    function detailpenjualan($id_penjualan, $id_pengiriman)
    {
      $detail = json_decode($this->input->post('detail'));
      $flag = 0;
      foreach ($detail as $row) {

        //----------- GENERATE CODE FOR DETAIL PENJUALAN ---------------
        $query = $this->m_get->getMaxDetailPenjualanValue();
        $id_detailpenjualan = "";

        if($query->row()->id_detail_penjualan != null){
          $max_code = $query->row()->id_detail_penjualan;
          $id_detailpenjualan = $this->code->generateCode("DT", $max_code);
        }
        else
          $id_detailpenjualan = "DT"."-".sprintf("%04s", 1);
        //----------- /GENERATE CODE FOR DETAIL PENJUALAN ---------------

        $detailPenjualan = new DetailPenjualan;
        $detailPengiriman = new DetailPengiriman;

        $kode_barang = $row->kode_barang;
        $qty         = $row->qty;
        $catatan     = $row->catatan;

        // INSERT VALUE OF DETAIL PENJUALAN
        $detailPenjualan->id_detail_penjualan   = $id_detailpenjualan;
        $detailPenjualan->id_penjualan          = $id_penjualan;
        $detailPenjualan->kode_barang           = $kode_barang;
        $detailPenjualan->qty                   = $qty;
        $detailPenjualan->catatan               = $catatan;
        // /INSERT VALUE OF DETAIL PENJUALAN

        // INSERT VALUE OF DETAIL PENGIRIMAN
        $detailPengiriman->id_pengiriman        = $id_pengiriman;
        $detailPengiriman->kode_barang          = $kode_barang;
        $detailPengiriman->qty                  = $qty;
        // /INSERT VALUE OF DETAIL PENGIRIMAN

        if ($detailPenjualan->save() && $detailPengiriman->save()) {
          $flag++;
          if ($flag > count($detail)) {
            break;
          }else
            echo json_encode( array( 'success' => 1 ) );
        }else {
          echo json_encode( array( 'success' => 0 ) );
        }
      }
    }

    function penjualan($id_customer = "")
    {
      $detail = $this->input->post('detail');

      // ----------- GENERATE CODE FOR PENJUALAN ---------------
      $query = $this->m_get->getMaxPenjualanValue();
      $id_penjualan = "";

      if($query->row()->id != null){
        $max_code = $query->row()->id;
        $id_penjualan = $this->code->generateCode("INV", $max_code);
      }
      else
        $id_penjualan = "INV"."-".sprintf("%04s", 1);
      // ----------- GENERATE CODE FOR PENJUALAN ---------------

      $penjualan = new Penjualan;
      $penjualan->id                  = $id_penjualan;
      $penjualan->id_customer         = $id_customer;
      $penjualan->tgl_transaksi       = $this->input->post('tgl_awal');
      $penjualan->tgl_batas_akhir     = $this->input->post('tgl_akhir');
      $penjualan->total_transaksi     = $this->input->post('jml');
      $penjualan->total_jml_transaksi = $this->input->post('total_jml');
      $penjualan->ongkir              = $this->input->post('ongkir');
      $penjualan->bukti_pembayaran    = "belumuploadbukti.jpg";
      $penjualan->status_pembelian    = "BELUM BAYAR";

      if($penjualan->save()){

        $pengiriman = new Pengiriman;
        $pengiriman->id_penjualan       = $id_penjualan;
        $pengiriman->id_ekspedisi       = $this->input->post('id_ekspedisi');
        $pengiriman->alamat             = $this->input->post('alamat');
        $pengiriman->status_pengiriman  = "BELUM TERKIRIM";

        if ($pengiriman->save()) {
          $id_pengiriman = Pengiriman::where(array('id_penjualan' => $id_penjualan))->get();
          echo json_encode( array(
            'success' => 1,
            'kode_penjualan' => $id_penjualan,
            'id_pengiriman'  => $id_pengiriman[0]['id_pengiriman']
          ));
        }
      }else {
        echo json_encode( array('success' => 0) );
      }
    }

    function keranjang($id_customer = "", $kode = "")
    {
      $qty         = $this->input->post('qty');

      $stok = $this->m_get->cekstok($kode);

      foreach ($stok as $s) {
        $stockTersedia = $s->stock_barang;
      }

      $cart_cek = Keranjang::where( array('id_customer' => $id_customer, 'kode_barang' => $kode) )->get();

      $cart = $cart_cek->first();
      $qty = $cart['qty'] + $qty;

      if ($stockTersedia != 0) {
        if ($qty <= $stockTersedia) {
          if ($cart_cek->count() != null)
          {

            $update = Keranjang::where( array('id_customer' => $id_customer, 'kode_barang' => $kode) )->update([
              'qty' => $qty
            ]);

            if ($update) {
              echo json_encode( array('success' => 1) );
            }else {
              echo json_encode( array('success' => 0) );
            }
          }
          else
          {
            $cart = new Keranjang;
            $cart->id_customer      = $id_customer;
            $cart->kode_barang      = $kode;
            $cart->qty              = $qty;

            if ($cart->save()) {
              echo json_encode( array('success' => 1) );
            }else {
              echo json_encode( array('success' => 0) );
            }
          }
        }else {
          echo json_encode( array('success' => 'melebihi_batas_stok') );
        }
      }else {
        echo json_encode( array('success' => 'stok_kosong') );
      }

    }

    function favorit()
    {
      $fav = new Favorit;
      $fav->id_customer     = $this->input->post('id_customer');
      $fav->kode_barang     = $this->input->post('kode_barang');
      if ($fav->save()) {
        echo json_encode( array('success' => 1) );
      }else {
        echo json_encode( array('success' => 0) );
      }
    }

    function customer()
    {
      $cust = new Customer;
      $cust->nama       = $this->input->post('name');
      $cust->username   = $this->input->post('username');
      $cust->email      = $this->input->post('email');
      $cust->password   = $this->input->post('password');

      $result = $this->m_get->mail_exists(strtolower($cust->email))->result_array();

      if ($result != null) {
        echo json_encode(array("success" => "email_sudah_ada"));
      }else{
        if ($cust->save()) {
          echo json_encode(array("success" => 1));
        }else {
          echo json_encode(array("success" => 0));
        }
      }
    }

    function rolekey_exists($key) {
      $this->customer->mail_exists($key);
    }

    function kategori()
    {
      $ktg = new Kategori;
      $ktg->kode_kategori = $this->input->post('kode');
      $ktg->nama_kategori = $this->input->post('nama');
      if ($ktg->save()) {
        redirect('admin/kategori');
      }else {
        echo "Gagal menambahkan";
      }
    }

    function supplier()
    {
      $supp = new Supplier;
      $supp->nama     = $this->input->post('nama');
      $supp->alamat   = $this->input->post('alamat');
      $supp->tlp      = $this->input->post('telp');
      if ($supp->save()) {
        redirect('admin/supplier');
      }else {
        echo "Gagal menambahkan";
      }
    }

    function barang()
    {
      $kode = $this->input->post('kode');
      $stok = $this->input->post('stok');
      $nama = $this->input->post('nama');
      $harga_beli = $this->input->post('harga_beli');
      $diskon = $this->input->post('diskon');
      $barang = new Barang;
      $laporan_pembelian = new Laporanpembelian;

      $barang->id_supplier    = $this->input->post('supplier');
      $barang->kode_kategori  = $this->input->post('kategori');
      $barang->kode_barang    = $kode;
      $barang->nama_barang    = $nama;
      $barang->stock_barang   = $stok;
      $barang->harga_barang   = $this->input->post('harga');
      $barang->harga_beli     = $this->input->post('harga_beli');
      $barang->diskon         = $diskon;
      $barang->berat          = $this->input->post('berat');
      $barang->dimensi        = $this->input->post('p')."x".$this->input->post('l')."x".$this->input->post('t');
      $barang->deskripsi      = $this->input->post('deskripsi');

      $nmfile = $kode."_"; //nama file
      $config['upload_path'] = './assets/images/items/'; //Folder untuk menyimpan hasil upload
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = $nmfile; //nama yang terupload nantinya
      $this->upload->initialize($config);

      if ($_FILES['img'])
      {
        if($this->upload->do_upload('img'))
        {
          echo "berhasil";
          $img = $this->upload->data();
          $barang->image = $img['file_name'];
          //dibawah ini merupakan code untuk resize
          $config2['image_library'] = 'gd2';
          $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
          $config2['maintain_ratio'] = TRUE;
          $config2['width'] = 1000; //lebar setelah resize menjadi 1000 px
          $this->load->library('image_lib',$config2);
          $this->image_lib->resize(); //proses resize

          if ($barang->save()) {
            $laporan_pembelian->kode_barang   = $kode;
            $laporan_pembelian->qty           = $stok;
            $laporan_pembelian->tgl_pembelian = date('Y-m-d');

            if ($laporan_pembelian->save()) {
              $message = array(
                'title' => 'Barang Baru!',
                'body' => 'Kini telah hadir '.$nama.', diskon '.$diskon.'%. Cek Sekarang juga!'
              );

              $this->notification->send($message);
            }

          }
        }
      }
      redirect('admin/barang');
    }

  }


?>
