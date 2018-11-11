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

@section('menu-kategori')
  active
@endsection

@section('content')
  <div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Data List Kategori</h5>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<li><a data-action="close"></a></li>
				</ul>
			</div>
		</div>

    <div class="panel-body">
      <button type="button" onclick="addKategori()" data-toggle="modal" data-target="#kategori-modal" class="btn btn-success btn-sm" name="button">
        <b>Tambah</b>
      </button>
    </div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>Kode Kategori</th>
          <th>Nama Kategori</th>
          <th class="text-center">Actions</th>
				</tr>
			</thead>
      <tbody>
        @foreach ($kategori_data as $row)
          <tr>
            <td class="text-center">{{$row['kode_kategori']}}</td>
            <td>{{$row['nama_kategori']}}</td>
            <td class="text-center">
              <button onclick="editKategori('{{$row['kode_kategori']}}')" data-toggle="modal" data-target="#kategori-modal" class="btn btn-primary btn-sm">Edit</button>
              <button class="btn btn-danger btn-sm" onclick="delKategori('{{$row['kode_kategori']}}')">Hapus</button>
            </td>
          </tr>
        @endforeach
      </tbody>
		</table>
    @include('modals.kategori')
	</div>
@endsection
