@extends('template.main')

@section('page-title')
  {{$title}}
@endsection

@section('theme_js')
  <script type="text/javascript" src="{{base_url()}}assets/js/plugins/notifications/bootbox.min.js"></script>
  <script type="text/javascript" src="{{base_url()}}assets/js/plugins/notifications/sweet_alert.min.js"></script>
  <script type="text/javascript" src="{{base_url()}}assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="{{base_url()}}assets/js/core/app.js"></script>
  <script type="text/javascript" src="{{base_url()}}assets/js/pages/components_modals.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/pages/datatables_basic.js"></script>
@endsection

@section('custom_js')
  <script type="text/javascript" src="{{base_url()}}assets/js/custom.js"></script>
  <script type="text/javascript" src="{{base_url()}}assets/js/ajax_delete.js"></script>
  <script type="text/javascript" src="{{base_url()}}assets/js/ajax_add.js"></script>
  <script type="text/javascript" src="{{base_url()}}assets/js/ajax_edit.js"></script>
@endsection

@section('laporan-penjualan')
  active
@endsection

@section('content')
  <div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Laporan Penjualan</h5>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<li><a data-action="close"></a></li>
				</ul>
			</div>
		</div>

    <div class="panel-body">
      <form action="{{base_url('admin/laporan/penjualan')}}" method="get">
        <div class="col-md-2">
          <input type="text" class="form-control year" name="year" value="@if (isset($_GET['year'])){{$_GET['year']}}@endif" placeholder="Tahun">
        </div>
        <div class="col-md-2">
          <input type="text" class="form-control month" name="month" value="@if (isset($_GET['year'])){{$_GET['month']}}@endif" placeholder="Bulan">
        </div>
        <div class="col-md-2">
          <input type="text" class="form-control day" name="day" value="@if (isset($_GET['year'])){{$_GET['day']}}@endif" placeholder="Tanggal">
        </div>
        <button type="submit" class="btn btn-primary btn-right">Filter Tahun/Bulan/Tanggal</button>
        <button type="button" class="btn btn-info" id="print_laporanpenjualan" name="button">
          <i class="icon-printer2"></i>
        </button>
      </form>
    </div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>ID</th>
          <th>Customer</th>
          <th>Tanggal</th>
          <th>Barang</th>
          <th>Total Transaksi</th>
				</tr>
			</thead>
      <tbody>
        @foreach ($laporan_penjualan as $row)
          <tr>
            <td>{{$row['id']}}</td>
            <td>{{$row['nama']}}</td>
            <td>{{$row['tgl_transaksi']}}</td>
            <td>{{ $row['barang'] }}</td>
            <td>{{$row['total_jml_transaksi']}}</td>
          </tr>
        @endforeach
      </tbody>
		</table>
	</div>
@endsection
