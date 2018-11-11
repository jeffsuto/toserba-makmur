<?php

  /**
   * Controller untuk delete
   */
  class Del extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model('pengiriman');
      $this->load->model('users');
    }

    function pegawai($id)
    {
      Users::where('id', $id)->delete();
      redirect('admin/pegawai');
    }

    function pengiriman($id)
    {
      Pengiriman::where('id_pengiriman', $id)->delete();
      redirect('admin/pengiriman');
    }

    function penjualan($id = "")
    {
      $delete = Penjualan::where('id', $id)->delete();
	  
	  header('Content-Type: application/json');
      if ($delete){
        echo json_encode( array('success' => 1) );
      }else {
        echo json_encode( array('success' => 0) );
      }
      redirect('admin/penjualan');
    }

	  function keranjang($id_customer = "", $kode="")
    {
      $delete = Keranjang::where(array('id_customer' => $id_customer, 'kode_barang' => $kode))->delete();

      header('Content-Type: application/json');
      if ($delete){
        echo json_encode( array('success' => 1) );
      }else {
        echo json_encode( array('success' => 0) );
      }
    }

	  function keranjang_all($id_customer = "")
    {
      $delete = Keranjang::where(array('id_customer' => $id_customer))->delete();

      header('Content-Type: application/json');
      if ($delete){
        echo json_encode( array('success' => 1) );
      }else {
        echo json_encode( array('success' => 0) );
      }
    }

    function customer($id = "")
    {
      Customer::where('id_customer', $id)->delete();
      redirect('admin/customer');
    }

    function kategori($id = "")
    {
      Kategori::where('kode_kategori', $id)->delete();
      redirect('admin/kategori');
    }

    function barang($id = "")
    {
      Barang::where('kode_barang', $id)->delete();
      redirect('admin/barang');
    }

    function supplier($id = "")
    {
      Supplier::find($id)->delete();
      redirect('admin/supplier');
    }

	function favorit($id_customer = "",$kode_barang="")
    {
      $delete = Favorit::where(array('id_customer' => $id_customer, 'kode_barang' => $kode_barang))->delete();

      header('Content-Type: application/json');
      if ($delete){
        echo json_encode( array('success' => 1) );
      }else {
        echo json_encode( array('success' => 0) );
      }
    }

  }


 ?>
