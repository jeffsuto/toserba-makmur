<?php

  /**
   *  Controller Admin
   */
  class Admin extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model('provinsi');
      $this->load->library('pdf');
    }
    
    function index()
    {
      if ($this->session->userdata('AdmiN'))
      {
        redirect('admin/customer');
      }
      else
      {
        $data['title'] = "Login";
        echo $this->blade->tampilan('vLogin', $data);
      }
    }

    function laporan($role = "", $print = "")
    {
      if (!$this->session->userdata('AdmiN')) {
        redirect(base_url());
      }else {

        $user = Users::where('username', $this->session->userdata('AdmiN'))->get();
        $data['name'] = $user[0]['nama'];
        $data['profile_data'] = $user;

        $year = $this->input->get('year');
        $month = $this->input->get('month');
        $date = $this->input->get('day');

        switch ($role) {
          case '':
            $data['title'] = 'Laporan Penjualan';
            echo $this->blade->tampilan('vLaporanpenjualan', $data);
            break;

          case 'pengiriman':

            $data['title'] = 'Laporan Pengiriman';
            if ($print == "") {
              $data['title'] = 'Laporan Pengiriman';
              $data['laporan_pengiriman'] = $this->m_get->laporanpengiriman($year, $month, $date);
              echo $this->blade->tampilan('vLaporanpengiriman', $data);
            }else {
              $pdf = new PDF_MC_Table('l','mm','A4');
              // membuat halaman baru
              $pdf->AddPage();
              // setting jenis font yang akan digunakan
              $pdf->SetFont('Arial','B',14);
              // mencetak string
              $pdf->Cell(190,7,'LAPORAN PENGIRIMAN',0,1);
              $pdf->SetFont('Arial','B',11);

              $pdf->SetWidths(Array(35,25,30,25,40,10,50,60));

              $pdf->SetLineHeight(5);

              // Memberikan space kebawah agar tidak terlalu rapat
              $pdf->Cell(10,7,'',0,1);
              $pdf->SetFont('Arial','B',12);
              $pdf->Cell(35,10,'ID TRANSAKSI',1,0,'C');
              $pdf->Cell(25,10,'NO. RESI',1,0,'C');
              $pdf->Cell(30,10,'CUSTOMER',1,0,'C');
              $pdf->Cell(25,10,'EKSPEDISI',1,0,'C');
              $pdf->Cell(40,10,'NAMA BARANG',1,0,'C');
              $pdf->Cell(10,10,'QTY',1,0,'C');
              $pdf->Cell(50,10,'TANGGAL',1,0,'C');
              $pdf->Cell(60,10,'ALAMAT',1,1,'C');
              $pdf->SetFont('Arial','',12,'C');

              $laporan_pengiriman = $this->m_get->laporanpengiriman($year, $month, $date);
              
              foreach ($laporan_pengiriman->result_array() as $row) {
                
                $pdf->Row(Array(
                  $row['id_penjualan'],
                  $row['no_resi'],
                  $row['customer'],
                  $row['nama'],
                  $row['nama_barang'],
                  $row['qty'],
                  $row['waktu_pengiriman'],
                  $row['alamat']
                ));
              }
              // ob_end_clean();
              $pdf->Output();
            }
            break;

          case 'penjualan':

            $data['title'] = 'Laporan Penjualan';
            if ($print == "") {
              $data['title'] = 'Laporan Penjualan';
              $laporan_penjualan = $this->m_get->laporanpenjualan($year, $month, $date);
              $res = array();
              foreach ($laporan_penjualan->result_array() as $row) {
                $barang = '';
                $detailpenjualan = $this->m_get->detailpenjualan($row['id']);
                foreach ($detailpenjualan->result_array() as $sub) {
                  $barang .= $sub['nama_barang'].',';
                }  
                $res[] = array(
                  'id' => $row['id'],
                  'nama' => $row['nama'],
                  'tgl_transaksi' => $row['tgl_transaksi'],
                  'barang' => $barang,
                  'total_jml_transaksi' => $row['total_jml_transaksi']
                );
              }
              $data['laporan_penjualan'] = $res;
              echo $this->blade->tampilan('vLaporanpenjualan', $data);
            }else {
              $pdf = new PDF_MC_Table('l','mm','A4');
              // membuat halaman baru
              $pdf->AddPage();
              // setting jenis font yang akan digunakan
              $pdf->SetFont('Arial','B',14);
              // mencetak string
              $pdf->Cell(190,7,'LAPORAN PENJUALAN',0,1);
              $pdf->SetFont('Arial','B',11);

              $pdf->SetWidths(Array(35,60,70,80,30));

              $pdf->SetLineHeight(5);

              // Memberikan space kebawah agar tidak terlalu rapat
              $pdf->Cell(10,7,'',0,1);
              $pdf->SetFont('Arial','B',16);
              $pdf->Cell(35,10,'ID',1,0);
              $pdf->Cell(60,10,'NAMA CUSTOMER',1,0);
              $pdf->Cell(70,10,'TANGGAL DAN WAKTU',1,0);
              $pdf->Cell(80,10,'BARANG',1,0);
              $pdf->Cell(30,10,'JUMLAH',1,1);
              $pdf->SetFont('Arial','',12);

              $laporan_penjualan = $this->m_get->laporanpenjualan($year, $month, $date);
              
              $total = 0;

              foreach ($laporan_penjualan->result_array() as $row) {
                $total += $row['total_jml_transaksi'];
                $barang = ''; 
                $detailpenjualan = $this->m_get->detailpenjualan($row['id']);
                foreach ($detailpenjualan->result_array() as $sub) {
                  $barang .= $sub['nama_barang'].',';
                }
                $pdf->Row(Array(
                  $row['id'],
                  $row['nama'],
                  $row['tgl_transaksi'],
                  $barang,
                  'Rp '.$row['total_jml_transaksi']
                ));
              }
              $pdf->SetFont('Arial','B',13);
              $pdf->Cell(245,10, 'TOTAL', 1,0, 'C');
              $pdf->Cell(30,10, 'Rp '.$total, 1,0);
              $pdf->Output();
            }

            break;
          default:

            if ($print == "") {
              $data['title'] = 'Laporan Pembelian';
              $data['laporan_pembelian'] = $this->m_get->laporanpembelian($year, $month, $date);
              echo $this->blade->tampilan('vLaporanpembelian', $data);
            }else {
              $pdf = new PDF_MC_Table('l','mm','A4');
              // membuat halaman baru
              $pdf->AddPage();
              // setting jenis font yang akan digunakan
              $pdf->SetFont('Arial','B',14);
              // mencetak string
              $pdf->Cell(190,7,'LAPORAN PENJUALAN',0,1);
              $pdf->SetFont('Arial','B',11);

              $pdf->SetWidths(Array(35,100,60,30,15,30));

              $pdf->SetLineHeight(5);
              // Memberikan space kebawah agar tidak terlalu rapat
              $pdf->Cell(10,7,'',0,1);
              $pdf->SetFont('Arial','B',16);
              $pdf->Cell(35,10,'TANGGAL',1,0);
              $pdf->Cell(100,10,'NAMA BARANG',1,0);
              $pdf->Cell(60,10,'SUPPLIER',1,0);
              $pdf->Cell(30,10,'HARGA',1,0);
              $pdf->Cell(15,10,'QTY',1,0);
              $pdf->Cell(30,10,'JUMLAH',1,1);
              $pdf->SetFont('Arial','',12);

              $laporan_pembelian = $this->m_get->laporanpembelian($year, $month, $date);
              $total = 0;

              foreach ($laporan_pembelian->result_array() as $row) {

                $total += $row['harga_beli']*$row['qty'];

                $pdf->Row(Array(
                  $row['tgl_pembelian'],
                  $row['nama_barang'],
                  $row['nama'],
                  'Rp '.$row['harga_beli'],
                  $row['qty'],
                  'Rp '.$row['harga_beli']*$row['qty']
                ));
              }
              $pdf->SetFont('Arial','B',13);
              $pdf->Cell(240,10, 'TOTAL', 1,0, 'C');
              $pdf->Cell(30,10, 'Rp '.$total, 1,0);
              $pdf->Output();
            }

            break;
        }
      }
    }

    function profile()
    {
      if (!$this->session->userdata('AdmiN')) {
        redirect(base_url());
      }else {
        $user = Users::where('username', $this->session->userdata('AdmiN'))->get();
        $data['name'] = $user[0]['nama'];
        $data['title'] = 'Profile';
        $data['profile_data'] = $user;
        echo $this->blade->tampilan('vProfile', $data);
      }
    }

    function setting()
    {
      if (!$this->session->userdata('AdmiN')) {
        redirect(base_url());
      }else {
        $user = Users::where('username', $this->session->userdata('AdmiN'))->get();
        $data['name'] = $user[0]['nama'];
        $data['title'] = 'Setting';
        $data['setting_data'] = $user;
    		echo $this->blade->tampilan('vSetting', $data);
      }
    }

    function customer()
    {
      if (!$this->session->userdata('AdmiN')) {
        redirect(base_url());
      }else {
        $user = Users::where('username', $this->session->userdata('AdmiN'))->get();
        $data['name'] = $user[0]['nama'];
        $data['title'] = 'Customer';
        $data['active'] = 'active';
        $data['customer_data'] = $this->m_get->customer("");
    		echo $this->blade->tampilan('vCustomer', $data);
      }
    }

    function barang()
    {
      if (!$this->session->userdata('AdmiN')) {
        redirect(base_url());
      }else {
        $user = Users::where('username', $this->session->userdata('AdmiN'))->get();
        $data['name'] = $user[0]['nama'];
        $data['title'] = 'Barang';
        $data['active'] = 'active';
        $data['barang_data'] = $this->m_get->barang("");
        $data['supplier_data'] = Supplier::all();
        $data['kategori_data'] = Kategori::all();
        echo $this->blade->tampilan('vBarang', $data);
      }
    }

    function supplier()
    {
      if (!$this->session->userdata('AdmiN')) {
        redirect(base_url());
      }else {
        $user = Users::where('username', $this->session->userdata('AdmiN'))->get();
        $data['name'] = $user[0]['nama'];
        $data['title'] = 'Supplier';
        $data['active'] = 'active';
        $data['supplier_data'] = Supplier::all();
        echo $this->blade->tampilan('vSupplier', $data);
      }
    }

    function kategori()
    {
      if (!$this->session->userdata('AdmiN')) {
        redirect(base_url());
      }else {
        $user = Users::where('username', $this->session->userdata('AdmiN'))->get();
        $data['name'] = $user[0]['nama'];
        $data['title'] = 'Kategori';
        $data['active'] = 'active';
        $data['kategori_data'] = Kategori::all();
        echo $this->blade->tampilan('vKategori', $data);
      }
    }

    function pengiriman()
    {
      if (!$this->session->userdata('AdmiN')) {
        redirect(base_url());
      }else {
        $user = Users::where('username', $this->session->userdata('AdmiN'))->get();
        $filter_status = $this->input->get('filter_status');
        $data['name'] = $user[0]['nama'];
        $data['title'] = 'Pengiriman';
        $data['active'] = 'active';
        if (isset($_GET['filter_status'])) {
          $data['pengiriman_data'] = $this->m_get->pengiriman("", $filter_status);
        }else {
          $data['pengiriman_data'] = $this->m_get->pengiriman("", "");
        }
        echo $this->blade->tampilan('vPengiriman', $data);
      }
    }

    function pegawai()
    {
      if (!$this->session->userdata('AdmiN')) {
        redirect(base_url());
      }else {
        $user = Users::where('username', $this->session->userdata('AdmiN'))->get();
        $data['name'] = $user[0]['nama'];
        $data['title'] = 'Pegawai';
        $data['active'] = 'active';
        $data['pegawai_data'] = Users::all();
        echo $this->blade->tampilan('vPegawai', $data);
      }
    }

    function penjualan()
    {
      if (!$this->session->userdata('AdmiN')) {
        redirect(base_url());
      }else {
        $user = Users::where('username', $this->session->userdata('AdmiN'))->get();
        $filter_status = $this->input->get('filter_status');
        $data['name'] = $user[0]['nama'];
        $data['title'] = 'Penjualan';
        $data['active'] = 'active';
        if (isset($filter_status)) {
          $data['penjualan_data'] = $this->m_get->penjualan("", $filter_status);
        }else {
          $data['penjualan_data'] = $this->m_get->penjualan("", "");
        }

        echo $this->blade->tampilan('vPenjualan', $data);
      }
    }
  }


?>
