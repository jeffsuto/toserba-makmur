@extends('template.main')

@section('page-title')
  {{$title}}
@endsection

@section('theme_js')
  <script type="text/javascript" src="{{base_url()}}assets/js/plugins/media/fancybox.min.js"></script>
  <script type="text/javascript" src="{{base_url()}}assets/js/plugins/notifications/bootbox.min.js"></script>
  <script type="text/javascript" src="{{base_url()}}assets/js/plugins/notifications/sweet_alert.min.js"></script>
  <script type="text/javascript" src="{{base_url()}}assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="{{base_url()}}assets/js/core/app.js"></script>
  <script type="text/javascript" src="{{base_url()}}assets/js/pages/components_modals.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/pages/datatables_basic.js"></script>
  <script type="text/javascript" src="{{base_url()}}assets/js/pages/gallery_library.js"></script>
@endsection

@section('custom_js')
  <script type="text/javascript" src="{{base_url()}}assets/js/custom.js"></script>
  <script type="text/javascript" src="{{base_url()}}assets/js/ajax_edit.js"></script>
  <script type="text/javascript" src="{{base_url()}}assets/js/ajax_delete.js"></script>
@endsection

@section('menu-penjualan')
  active
@endsection

@section('content')
  <div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Data List Penjualan</h5>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<li><a data-action="close"></a></li>
				</ul>
			</div>
		</div>

    <div class="panel-body">
      <form action="{{base_url('admin/penjualan')}}" method="get">
        <div class="col-md-2">
          <select class="form-control" name="filter_status">
            <option value="ALL" @if (isset($_GET['filter_status'])) @if($_GET['filter_status'] == "ALL" ) selected @endif @endif>ALL</option>
            <option value="0" @if (isset($_GET['filter_status'])) @if($_GET['filter_status'] == "0" ) selected @endif @endif>BELUM BAYAR</option>
            <option value="1" @if (isset($_GET['filter_status'])) @if($_GET['filter_status'] == "1" ) selected @endif @endif>DIBATALKAN</option>
            <option value="2" @if (isset($_GET['filter_status'])) @if($_GET['filter_status'] == "2" ) selected @endif @endif>PROSES PEMBAYARAN</option>
            <option value="3" @if (isset($_GET['filter_status'])) @if($_GET['filter_status'] == "3" ) selected @endif @endif>SELESAI</option>
            <option value="4" @if (isset($_GET['filter_status'])) @if($_GET['filter_status'] == "4" ) selected @endif @endif>SUDAH BAYAR</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter Status</button>
      </form>
    </div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>Kode Penjualan</th>
					<th>Nama Customer</th>
					<th>Tanggal Transaksi</th>
          <th>Tanggal Akhir Transaksi</th>
					<th>Total Transaksi</th>
					<th>Ongkir</th>
					<th>Total Jumlah Transaksi</th>
          <th>Bukti Pembayaran</th>
          <th>Status Pembelian</th>
          <th class="text-center">Actions</th>
				</tr>
			</thead>
      <tbody>
        @foreach ($penjualan_data->result_array() as $row)
          <tr>
            <td class="text-center">{{$row['id']}}</td>
            <td>{{$row['nama'].'['.$row['id_customer'].']'}}</td>
            <td>{{$row['tgl_transaksi']}}</td>
            <td>{{$row['tgl_batas_akhir']}}</td>
            <td class="text-center">Rp. {{$row['total_transaksi']}}</td>
            <td class="text-center">Rp. {{$row['ongkir']}}</td>
            <td class="text-center">Rp. {{$row['total_jml_transaksi']}}</td>
            <td>
              <a href="{{base_url('assets/images/bukti/'.$row['bukti_pembayaran'])}}" data-popup="lightbox">
                <img src="{{base_url('assets/images/bukti/'.$row['bukti_pembayaran'])}}" alt="" class="img-rounded img-preview">
              </a>
            </td>
            <td class="text-center">
              @if ($row['status_pembelian'] == "SUDAH BAYAR")
                <label class="label label-success">{{$row['status_pembelian']}}</label>
              @elseif ($row['status_pembelian'] == "PROSES VALIDASI")
                <label onclick="editStatusPenjualan('{{$row['id']}}', '{{$row['status_pembelian']}}', {{$row['id_customer']}})" class="label label-warning label-proses">{{$row['status_pembelian']}}</label>
              @elseif ($row['status_pembelian'] == "SELESAI")
                <label class="label label-info">{{$row['status_pembelian']}}</label>
              @else
                <label onclick="editStatusPenjualan('{{$row['id']}}', '{{$row['status_pembelian']}}', {{$row['id_customer']}})" class="label label-danger label-belum">{{$row['status_pembelian']}}</label>
              @endif
            </td>
            <td class="text-center">
              <button onclick="detailPenjualan('{{$row['id']}}')" data-toggle="modal" data-target="#detailpenjualan-modal" class="btn btn-info btn-sm">Detail</button>
              @if ($row['status_pembelian'] != "SUDAH BAYAR" && $row['status_pembelian'] != "DIBATALKAN" && $row['status_pembelian'] != "SELESAI")
                <button class="btn btn-warning btn-sm" onclick="batalPenjualan('{{$row['id']}}', '{{$row['id_customer']}}')">Batalkan</button>
              @endif
              <button class="btn btn-danger btn-sm" onclick="delPenjualan('{{$row['id']}}')">Hapus</button>
            </td>
          </tr>
        @endforeach
      </tbody>
		</table>
    @include('modals.detailpenjualan')
	</div>
@endsection
