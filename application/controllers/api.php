<?php

  /**
   * Controller untuk mengambil API
   */
  class Api extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model('provinsi');
      $this->load->model('ulasan');
      $this->load->library('notification');
    }

    function pegawai($id = "")
    {
      $user = Users::where('id', $id)->get();
      header('Content-Type: application/json');
      echo json_encode( array("data" => $user) );
    }

    function test()
    {
      $message = array(
        'title' => 'Toko Lestary',
        'body'  => 'CROTTTT!!!'
      );
      $this->notification->send($message);
    }

    function ulasan($id)
    {
      $ulasan = $this->m_get->ulasan($id);

      header('Content-Type: application/json');
      echo json_encode( array("data" => $ulasan->result_array()) );
    }

    function detailpengiriman($id)
    {
      $detail = $this->m_get->detailpengiriman($id);

      header('Content-Type: application/json');
      echo json_encode( array("data" => $detail->result_array()) );
    }

    function penjualan($id = "",$filter_status ="")
    {
      $penjualan = $this->m_get->penjualan($id, $filter_status);

      header('Content-Type: application/json');
      echo json_encode( array("data" => $penjualan->result_array()) );
    }

    function kota()
    {
      $kota = "";
      $id_provinsi = $this->input->get('provinsi');
      if (isset($id_provinsi))
        $kota = Kota::where( array('id_provinsi' => $id_provinsi) )->get();
      else
        $kota = Kota::all();

      header('Content-Type: application/json');
      echo json_encode( $kota );
    }

    function provinsi()
    {
      $provinsi = Provinsi::all();

      header('Content-Type: application/json');
      echo json_encode( $provinsi );
    }

    // API Keranjang
    function keranjang($id = "")
    {
      $cart = $this->m_get->keranjang($id);

      header('Content-Type: application/json');
      echo json_encode( $cart->result_array() );
    }

    // API Customer
    function customer($id = "")
    {
      $customer = $this->m_get->customer($id);

      header('Content-Type: application/json');
      echo json_encode( $customer->result_array() );
    }

    // API favorit
    function favorit($id = "")
    {
      $fav = $this->m_get->favorit($id);

      header('Content-Type: application/json');
      echo json_encode( $fav->result_array() );
    }

    function adafavorit($id_customer = "",$kode_barang="")
    {
      $fav = $this->m_get->adafavorit($id_customer,$kode_barang);

      $result = $fav->result_array();
      if($result!=null){
        $result['success'] = "1";
        $result['message'] = "success";
      }else{
        $result['success'] = "0";
        $result['message'] = "error";
      }
      header('Content-Type: application/json');
      echo json_encode( $result );
    }

    function deletefavorit($id_customer = "",$kode_barang="")
    {
      $fav = $this->m_get->deletefavorit($id_customer,$kode_barang);

      header('Content-Type: application/json');
      echo json_encode( $fav );
    }

    //api Penjualan
    // function penjualan($id = "",$id_customer = "")
    // {
    //   $fav = $this->m_get->penjualan_andro($id,$id_customer);
    //
    //   header('Content-Type: application/json');
    //   echo json_encode( $fav->result_array() );
    // }

    // API detail Penjualan
    function detailpenjualan($id = "")
    {
      $data   = array();
      $detail = $this->m_get->detailpenjualan($id);

      foreach ($detail->result() as $row)
      {
        $diskon     = $row->diskon;
        $harga      = $row->harga_barang;
        $hargaAkhir = $harga - ($harga*$diskon/100);
        $data[] = array(
          'id'            => $row->id_detail_penjualan,
          'id_penjualan'  => $row->id_penjualan,
          'kode_barang'   => $row->kode_barang,
          'nama_barang'   => $row->nama_barang,
          'image'         => $row->image,
          'diskon'        => $row->diskon,
          'harga'         => $row->harga_barang,
          'qty'           => $row->qty,
          'jumlah'        => $hargaAkhir,
          'tgl'           => $row->tgl_transaksi,
		  'catatan'		  => $row->catatan
        );
      }
      $output = array("data" => $data);
      header('Content-Type: application/json');
      echo json_encode($output);
    }

    // API Supplier
    function supplier($id = "")
    {
      $supp = "";
      $data = array();

      if ($id == "") $supp = Supplier::all();
      else $supp = Supplier::where('id', $id)->get();

      foreach ($supp as $row)
      {
        $data[] = array(
          'id'     => $row['id'],
          'nama'   => $row['nama'],
          'alamat' => $row['alamat'],
          'telp'   => $row['tlp']
        );
      }

      header('Content-Type: application/json');
      echo json_encode($data);
    }

    // API barang
    function barang($id = "")
    {
      $data   = array();
      $barang = $this->m_get->barang($id);

      foreach ($barang->result() as $row)
      {
        $data[] = array(
          'kode'          => $row->kode_barang,
          'kode_kategori' => $row->kode_kategori,
          'id_supplier'   => $row->id,
          'nama'          => $row->nama_barang,
          'kategori'      => $row->nama_kategori,
          'supplier'      => $row->nama,
          'stok'          => $row->stock_barang,
          'harga'         => $row->harga_barang,
          'diskon'        => $row->diskon,
          'berat'         => $row->berat,
          'dimensi'       => $row->dimensi,
          'deskripsi'     => $row->deskripsi,
          'img'           => $row->image,
        );
      }

      header('Content-Type: application/json');
      echo json_encode($data);
    }

    // API Kategori
    function kategori($id = "")
    {
      $ktg = "";
      $data = array();

      if ($id == "") $ktg = Kategori::all();
      else $ktg = Kategori::where('kode_kategori', $id)->get();

      foreach ($ktg as $row)
      {
        $data[] = array(
          'kode' => $row['kode_kategori'],
          'nama' => $row['nama_kategori']
        );
      }

      header('Content-Type: application/json');
      echo json_encode($data);
    }

  }


?>
