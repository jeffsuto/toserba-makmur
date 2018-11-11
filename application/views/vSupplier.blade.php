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

@section('menu-supplier')
  active
@endsection

@section('content')
  <div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Daftar List Supplier</h5>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<li><a data-action="close"></a></li>
				</ul>
			</div>
		</div>

    <div class="panel-body">
      <button type="button" onclick="addSupplier()" data-toggle="modal" data-target="#supplier-modal" class="btn btn-success btn-sm" name="button">
        <b>Tambah</b>
      </button>
    </div>

    <table class="table datatable-basic">
			<thead>
				<tr>
					<th>Kode Supplier</th>
					<th>Nama Supplier</th>
					<th>Alamat Barang</th>
					<th>No. Telp Supplier</th>
          <th class="text-center">Action</th>
				</tr>
			</thead>
      <tbody>
        @foreach ($supplier_data as $row)
          <tr>
            <td class="text-center">{{$row['id']}}</td>
            <td>{{$row['nama']}}</td>
            <td>{{$row['alamat']}}</td>
            <td>{{$row['tlp']}}</td>
            <td class="text-center">
              <button type="button" onclick="editSupplier('{{$row['id']}}')" data-toggle="modal" data-target="#supplier-modal" class="btn btn-primary btn-sm">Edit</button>
              <button class="btn btn-danger btn-sm" onclick="delSupplier('{{$row['id']}}')">Hapus</button>
            </td>
          </tr>
        @endforeach
      </tbody>
		</table>
    @include('modals.supplier')
	</div>
@endsection
