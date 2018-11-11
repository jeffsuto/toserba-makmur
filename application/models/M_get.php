<?php

  /**
   * Model khusus untuk get Data dengan query builder CI
   */
  class M_get extends CI_Model
  {

    function __construct()
    {
      parent::__construct();
    }

    function komplain($id = "")
    {
      if ($id == "") {
        $this->db->select('customers.nama, komplain.*')
                 ->from('komplain')
                 ->join('penjualan', 'komplain.id_penjualan = penjualan.id', 'inner')
                 ->join('customers', 'penjualan.id_customer = customers.id_customer');
      }
      else
      {
        $this->db->select('customers.nama, komplain.*')
                 ->from('komplain')
                 ->join('penjualan', 'komplain.id_penjualan = penjualan.id', 'inner')
                 ->join('customers', 'penjualan.id_customer = customers.id_customer')
                 ->where('komplain.id_penjualan', $id);
      }
      return $this->db->get();
    }

    function laporanpengiriman($year = "", $month = "", $day = "")
    {
      $this->db->select('pengiriman.*, detail_pengiriman.*, ekspedisis.nama, barang.nama_barang,
                        customers.nama AS "customer"')
              ->from('detail_pengiriman')
              ->join('barang', 'detail_pengiriman.kode_barang = barang.kode_barang', 'inner')
              ->join('pengiriman', 'detail_pengiriman.id_pengiriman = pengiriman.id_pengiriman', 'inner')
              ->join('penjualan', 'pengiriman.id_penjualan = penjualan.id', 'inenr')
              ->join('customers', 'penjualan.id_customer = customers.id_customer')
              ->join('ekspedisis', 'pengiriman.id_ekspedisi= ekspedisis.id', 'inner')
              ->where('status_pengiriman', 'TERKIRIM');

      if($day == "" && $year != "" && $month != ""){
        $this->db->where(array('YEAR(waktu_pengiriman)'=> $year, 'MONTH(waktu_pengiriman)' => $month));
      }
      elseif ($day == "" && $year != "" && $month == "") {
        $this->db->where(array('YEAR(waktu_pengiriman)'=> $year));
      }
      elseif ($day == "" && $year == "" && $month != "") {
        $this->db->where(array('MONTH(waktu_pengiriman)'=> $month));
      }
      elseif($day != "" && $year == "" && $month != "") {
        $this->db->where(array('DAY(waktu_pengiriman)'=> $day, 'MONTH(waktu_pengiriman)' => $month));
      }
      elseif ($day != "" && $year != "" && $month == "") {
        $this->db->where(array('DAY(waktu_pengiriman)'=> $day, 'YEAR(waktu_pengiriman)' => $year));
      }
      elseif ($day != "" && $year == "" && $month == "") {
        $this->db->where(array('DAY(waktu_pengiriman)'=> $day));
      }
      elseif ($day != "" && $year != "" && $month != "") {
        $this->db->where('waktu_pengiriman', $year.'-'.$month.'-'.$day);
      }
      return $this->db->get();
    }

    function laporanpenjualan($year = "", $month = "", $day = "")
    {
      $this->db->select('penjualan.id, penjualan.tgl_transaksi, penjualan.total_jml_transaksi,
                        customers.nama')
              ->from('penjualan')
              ->join('customers', 'penjualan.id_customer = customers.id_customer', 'inner')
              ->where('status_pembelian', 'SELESAI');

      if($day == "" && $year != "" && $month != ""){
        $this->db->where(array('YEAR(tgl_transaksi)'=> $year, 'MONTH(tgl_transaksi)' => $month));
      }
      elseif ($day == "" && $year != "" && $month == "") {
        $this->db->where(array('YEAR(tgl_transaksi)'=> $year));
      }
      elseif ($day == "" && $year == "" && $month != "") {
        $this->db->where(array('MONTH(tgl_transaksi)'=> $month));
      }
      elseif($day != "" && $year == "" && $month != "") {
        $this->db->where(array('DAY(tgl_transaksi)'=> $day, 'MONTH(tgl_transaksi)' => $month));
      }
      elseif ($day != "" && $year != "" && $month == "") {
        $this->db->where(array('DAY(tgl_transaksi)'=> $day, 'YEAR(tgl_transaksi)' => $year));
      }
      elseif ($day != "" && $year == "" && $month == "") {
        $this->db->where(array('DAY(tgl_transaksi)'=> $day));
      }
      elseif ($day != "" && $year != "" && $month != "") {
        $this->db->where('tgl_transaksi', $year.'-'.$month.'-'.$day);
      }
      return $this->db->get();
    }

    function laporanpembelian($year = "", $month = "", $day = "")
    {
      $this->db->select('laporan_pembelian.id, laporan_pembelian.kode_barang, laporan_pembelian.qty,
                         laporan_pembelian.tgl_pembelian, barang.harga_beli, barang.nama_barang,
                         supplier.nama')
               ->from('laporan_pembelian')
               ->join('barang', 'laporan_pembelian.kode_barang = barang.kode_barang', 'inner')
               ->join('supplier', 'barang.id_supplier = supplier.id', 'inner')
               ->order_by('laporan_pembelian.tgl_pembelian', 'desc');

      if($day == "" && $year != "" && $month != ""){
        $this->db->where(array('YEAR(tgl_pembelian)'=> $year, 'MONTH(tgl_pembelian)' => $month));
      }
      elseif($day != "" && $year == "" && $month != "") {
        $this->db->where(array('DAY(tgl_pembelian)'=> $day, 'MONTH(tgl_pembelian)' => $month));
      }
      elseif ($day != "" && $year != "" && $month == "") {
        $this->db->where(array('DAY(tgl_pembelian)'=> $day, 'YEAR(tgl_pembelian)' => $year));
      }elseif ($day == "" && $year != "" && $month == "") {
        $this->db->where(array('YEAR(tgl_pembelian)'=> $year));
      }
      elseif ($day == "" && $year == "" && $month != "") {
        $this->db->where(array('MONTH(tgl_pembelian)'=> $month));
      }
      elseif ($day != "" && $year == "" && $month == "") {
        $this->db->where(array('DAY(tgl_pembelian)'=> $day));
      }
      elseif ($day != "" && $year != "" && $month != "") {
        $this->db->where('tgl_pembelian', $year.'-'.$month.'-'.$day);
      }

      return $this->db->get();
    }

    function ulasan($id)
    {
      $this->db->select('ulasan.*, customers.nama')
               ->from('ulasan')
               ->join('customers', 'ulasan.id_customer = customers.id_customer', 'inner')
               ->join('barang', 'barang.kode_barang = ulasan.kode_barang', 'inner')
               ->where('ulasan.kode_barang', $id)
               ->order_by('ulasan.id_ulasan', 'desc');
      return $this->db->get();
    }

    function detailpengiriman($id)
    {
      $this->db->select('ekspedisis.nama, detail_pengiriman.*, barang.nama_barang, barang.kode_barang, pengiriman.no_resi')
               ->from('detail_pengiriman')
               ->join('pengiriman', 'pengiriman.id_pengiriman = detail_pengiriman.id_pengiriman', 'left')
               ->join('ekspedisis', 'ekspedisis.id = pengiriman.id_ekspedisi', 'inner')
               ->join('barang', 'detail_pengiriman.kode_barang = barang.kode_barang', 'inner')
               ->where('detail_pengiriman.id_pengiriman', $id);
      return $this->db->get();
    }

    function pengiriman($id, $filter_status)
    {
      if (($id == "" && $filter_status == "") || $filter_status == "ALL")
      {
        $this->db->select('*')
                 ->from('pengiriman')
                 ->join('ekspedisis', 'pengiriman.id_ekspedisi = ekspedisis.id', 'inner')
                 ->join('penjualan', 'pengiriman.id_penjualan = penjualan.id', 'inner');
      }
      elseif ($filter_status != "" && $filter_status != "ALL")
      {
        $filter = "";
        switch ($filter_status) {
          case '0':
            $filter = "TERKIRIM";
            break;
          case '1':
            $filter = "DITERIMA";
            break;
          case '2':
            $filter = "BELUM TERKIRIM";
            break;
        }
        $this->db->select('*')
                 ->from('pengiriman')
                 ->join('ekspedisis', 'pengiriman.id_ekspedisi = ekspedisis.id', 'inner')
                 ->join('penjualan', 'pengiriman.id_penjualan = penjualan.id', 'inner')
                 ->where('status_pengiriman', $filter);
      }
      else
      {
        $this->db->select('*')
                 ->from('pengiriman')
                 ->join('ekspedisis', 'pengiriman.id_ekspedisi = ekspedisis.id', 'inner')
                 ->where('id_pengiriman', $id);
      }
      return $this->db->get();
    }

    function getMaxDetailPenjualanValue()
    {
        $this->db->select_max('id_detail_penjualan');
        return $this->db->get('detail_penjualan');
    }

    function getMaxPenjualanValue()
    {
        $this->db->select_max('id');
        return $this->db->get('penjualan');
    }

    function keranjang($id)
    {
      if ($id == "")
      {
        $this->db->select('*')
                 ->from('keranjang')
                 ->join('customers', 'keranjang.id_customer = customers.id_customer', 'left')
                 ->join('kota', 'customers.id_kota = kota.id_kota', 'left')
                 ->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi', 'left')
                 ->join('barang', 'keranjang.kode_barang = barang.kode_barang', 'left');
      }
      else
      {
        $this->db->select('*')
                 ->from('keranjang')
                 ->join('customers', 'keranjang.id_customer = customers.id_customer', 'left')
                 ->join('kota', 'customers.id_kota = kota.id_kota', 'left')
                 ->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi', 'left')
                 ->join('barang', 'keranjang.kode_barang = barang.kode_barang', 'left')
                 ->where('keranjang.id_customer', $id);
      }
      return $this->db->get();
    }

    function customer($id)
    {
      if ($id == "")
      {
        $this->db->select('*')
                 ->from('customers')
                 ->join('kota', 'customers.id_kota = kota.id_kota', 'left')
                 ->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi', 'left');
      }
      else
      {
        $this->db->select('*')
                 ->from('customers')
                 ->join('kota', 'customers.id_kota = kota.id_kota', 'left')
                 ->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi', 'left')
                 ->where('customers.id_customer', $id);
      }
      return $this->db->get();
    }

    function favorit($id)
    {
      if ($id == "")
      {
        $this->db->select('*')
                 ->from('favorit')
                 ->join('customers', 'favorit.id_customer = customers.id_customer', 'inner')
                 ->join('barang', 'favorit.kode_barang = barang.kode_barang', 'inner');
      }
      else
      {
        $this->db->select('*')
                 ->from('favorit')
                 ->join('customers', 'favorit.id_customer = customers.id_customer', 'inner')
                 ->join('barang', 'favorit.kode_barang = barang.kode_barang', 'inner')
                 ->where('favorit.id_customer', $id);
      }
      return $this->db->get();
    }

    function adafavorit($id_customer,$kode_barang)
    {

        $this->db->select('*')
                 ->from('favorit')
                 ->join('customers', 'favorit.id_customer = customers.id_customer', 'inner')
                 ->join('barang', 'favorit.kode_barang = barang.kode_barang', 'inner')
                 ->where('favorit.id_customer', $id_customer)
                 ->where('favorit.kode_barang',$kode_barang);
      return $this->db->get();
    }

    function deletefavorit($id_customer,$kode_barang)
    {

        $this->db->where('favorit.id_customer', $id_customer)
                 ->where('favorit.kode_barang',$kode_barang)
                 ->delete('favorit');
        $result['success'] = '1';
      return $result;
    }

    function cekstok($kode)
    {

        $this->db->select('*')
                 ->from('barang')
                 ->where('barang.kode_barang',$kode);
      return $this->db->get()->result();
    }

    function mail_exists($key)
    {
      $this->db->select('*')
               ->from('customers')
               ->where('email',$key);
               return $this->db->get();
    }

    function barang($id)
    {
      if ($id == "")
      {
        $this->db->select('*')
                 ->from('barang')
                 ->join('supplier', 'barang.id_supplier = supplier.id', 'inner')
                 ->join('kategori', 'barang.kode_kategori = kategori.kode_kategori', 'inner');
      }
      else
      {
        $this->db->select('*')
                 ->from('barang')
                 ->join('supplier', 'barang.id_supplier = supplier.id', 'inner')
                 ->join('kategori', 'barang.kode_kategori = kategori.kode_kategori', 'inner')
                 ->where('kode_barang', $id);
      }
      return $this->db->get();
    }

    function penjualan($id, $filter_status)
    {
      if (($id == "" && $filter_status == "") || $filter_status == "ALL")
      {
        $this->db->select('penjualan.*, customers.nama')
                 ->from('penjualan')
                 ->join('customers', 'customers.id_customer = penjualan.id_customer', 'inner');
      }
      elseif ($filter_status != "" && $filter_status != "ALL")
      {
        $filter = "";
        switch ($filter_status) {
          case '0':
            $filter = "BELUM BAYAR";
            break;
          case '1':
            $filter = "DIBATALKAN";
            break;
          case '2':
            $filter = "PROSES VALIDASI";
            break;
          case '3':
            $filter = "SELESAI";
            break;
          default:
            $filter = "SUDAH BAYAR";
            break;
        }
        $this->db->select('penjualan.*, customers.nama')
                 ->from('penjualan')
                 ->join('customers', 'customers.id_customer = penjualan.id_customer', 'inner')
                 ->where('status_pembelian', "$filter");
      }
      else
      {
        $this->db->select('pengiriman.*, penjualan.*, ekspedisis.nama')
                 ->from('penjualan')
                 ->join('pengiriman', 'pengiriman.id_penjualan = penjualan.id', 'inner')
                 ->join('ekspedisis', 'ekspedisis.id = pengiriman.id_ekspedisi', 'inner')
                 ->where('penjualan.id', $id)
                 ->or_where('penjualan.id_customer', $id);
      }
      return $this->db->get();
    }

    // function penjualan_andro($id,$id_customer)
    // {
    //   if ($id == "" && $id_customer="")
    //   {
    //     $this->db->select('*')
    //              ->from('penjualan')
    //              ->join('customers', 'penjualan.id_customer = customers.id_customer', 'inner');
    //   }
    //   else
    //   {
    //     $this->db->select('*')
    //              ->from('penjualan')
    //              ->join('customers', 'penjualan.id_customer = customers.id_customer', 'inner')
    //              ->where('penjualan.id', $id)
    //              ->where('customers.id_customer',$id_customer);
    //   }
    //   return $this->db->get();
    // }

    function detailpenjualan($id)
    {
      if ($id == "")
      {
        $this->db->select('*')
                 ->from('detail_penjualan')
                 ->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id', 'inner')
                 ->join('barang', 'detail_penjualan.kode_barang = barang.kode_barang', 'inner');
      }
      else
      {
        $this->db->select('*')
                 ->from('detail_penjualan')
                 ->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id', 'inner')
                 ->join('barang', 'detail_penjualan.kode_barang = barang.kode_barang', 'inner')
                 ->where('id_detail_penjualan', $id)
                 ->or_where('id_penjualan', $id);
      }
      return $this->db->get();
    }

  }


?>
