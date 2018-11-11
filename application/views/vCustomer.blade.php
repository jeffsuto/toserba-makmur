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

@section('menu-customer')
  active
@endsection

@section('content')
  <div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Data List Customer</h5>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<li><a data-action="close"></a></li>
				</ul>
			</div>
		</div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>Kode</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Username</th>
					<th>Password</th>
					<th>No. Telp</th>
          <th>Alamat</th>
          <th>Image</th>
          <th>Kota</th>
          <th>Provinsi</th>
          <th class="text-center">Action</th>
				</tr>
			</thead>
      <tbody>
        @foreach ($customer_data->result_array() as $row)
          <tr>
            <td>{{$row['id_customer']}}</td>
            <td>{{$row['nama']}}</td>
            <td>{{$row['email']}}</td>
            <td>{{$row['username']}}</td>
            <td>{{$row['password']}}</td>
            <td>{{$row['tlp']}}</td>
            <td>{{$row['alamat']}}</td>
            <td>
              <a href="{{base_url('assets/images/customers/').$row['image']}}" data-popup="lightbox">
                <img src="{{base_url('assets/images/customers/').$row['image']}}" alt="" class="img-rounded img-preview">
              </a>
            </td>
            <td>{{$row['nama_kota']}}</td>
            <td>{{$row['nama_provinsi']}}</td>
            <td>
              <button class="btn btn-danger btn-sm" onclick="delCustomer('{{$row['id_customer']}}')">Hapus</button>
            </td>
          </tr>
        @endforeach
      </tbody>
		</table>
	</div>
@endsection
