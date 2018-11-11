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
  <script type="text/javascript" src="{{base_url()}}assets/js/ajax_delete.js"></script>
  <script type="text/javascript" src="{{base_url()}}assets/js/ajax_add.js"></script>
  <script type="text/javascript" src="{{base_url()}}assets/js/ajax_edit.js"></script>
@endsection

@section('menu-pengiriman')
  active
@endsection

@section('content')
  <div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Data List Pengiriman</h5>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<li><a data-action="close"></a></li>
				</ul>
			</div>
		</div>

    <div class="panel-body">
      <form action="{{base_url('admin/pengiriman')}}" method="get">
        <div class="col-md-2">
          <select class="form-control" name="filter_status">
            <option value="ALL" @if (isset($_GET['filter_status'])) @if($_GET['filter_status'] == "ALL" ) selected @endif @endif>ALL</option>
            <option value="0" @if (isset($_GET['filter_status'])) @if($_GET['filter_status'] == "0" ) selected @endif @endif>TERKIRIM</option>
            <option value="1" @if (isset($_GET['filter_status'])) @if($_GET['filter_status'] == "1" ) selected @endif @endif>DITERIMA</option>
            <option value="2" @if (isset($_GET['filter_status'])) @if($_GET['filter_status'] == "2" ) selected @endif @endif>BELUM TERKIRIM</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter Status</button>
      </form>
    </div>

    <table class="table datatable-basic">
			<thead>
				<tr>
					<th>Kode Pengiriman</th>
          <th>Kode Penjualan</th>
					<th>Nama Ekspedisi</th>
          <th>No. Resi</th>
          <th>Alamat Tujuan</th>
          <th>Waktu Pengiriman</th>
          <th>Status Pengiriman</th>
          <th class="text-center">Actions</th>
				</tr>
			</thead>
      <tbody>
        @foreach ($pengiriman_data->result_array() as $row)
          <tr>
            <td class="text-center">{{$row['id_pengiriman']}}</td>
            <td class="text-center">{{$row['id_penjualan']}}</td>
            <td class="text-center">{{$row['nama']}}</td>
            <td>{{$row['no_resi']}}</td>
            <td>{{$row['alamat']}}</td>
            <td>{{$row['waktu_pengiriman']}}</td>
            <td class="text-center">
              @if ($row['status_pengiriman'] == "TERKIRIM")
                <label class="label label-success">{{$row['status_pengiriman']}}</label>
              @elseif ($row['status_pengiriman'] == "BELUM TERKIRIM")
                <label class="label label-danger">{{$row['status_pengiriman']}}</label>
              @endif
            </td>
            <td class="text-center">
              {{-- <button onclick="detailPengiriman('{{$row['id_pengiriman']}}')" data-toggle="modal" data-target="#detailpengiriman-modal" class="btn btn-info btn-sm">Detail</button> --}}
              <button onclick="editPengiriman('{{$row['id_pengiriman']}}', '{{$row['id_customer']}}')" data-toggle="modal" data-target="#detailpengiriman-modal" class="btn btn-primary btn-sm">Edit</button>
              <button class="btn btn-danger btn-sm" id="btn" onclick="delPengiriman('{{$row['id_pengiriman']}}')">Hapus</button>
            </td>
          </tr>
        @endforeach
      </tbody>
		</table>
    @include('modals.detailpengiriman')
	</div>
@endsection
