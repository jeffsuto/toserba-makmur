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

@section('menu-barang')
  active
@endsection

@section('content')
  <div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Daftar List Barang</h5>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<li><a data-action="close"></a></li>
				</ul>
			</div>
		</div>
    <div class="panel-body">
      <button type="button" onclick="addBarang()" class="btn btn-success btn-sm" data-toggle="modal" data-target="#barang-modal">
        <b>Tambah</b>
      </button>
    </div>
		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Harga Barang</th>
					<th>Stok Barang</th>
          <th>Diskon</th>
          <th>Berat</th>
          <th>Dimensi</th>
					<th>Image Barang</th>
					<th>Deskripsi Barang</th>
          <th>Nama Supplier</th>
          <th>Kategori</th>
          <th class="text-center">Action</th>
				</tr>
			</thead>
      <tbody>
        @foreach ($barang_data->result_array() as $row)
          <tr>
            <td class="text-center">{{$row['kode_barang']}}</td>
            <td>{{$row['nama_barang']}}</td>
            <td class="text-center">Rp. {{$row['harga_barang']}}</td>
            <td class="text-center">{{$row['stock_barang']}}</td>
            <td class="text-center">{{$row['diskon']}}%</td>
            <td class="text-center">{{$row['berat']}}</td>
            <td class="text-center">{{$row['dimensi']}}</td>
            <td>
              <a href="{{base_url()."assets/images/items/".$row['image']}}" data-popup="lightbox">
                <img src="{{base_url()."assets/images/items/".$row['image']}}" alt="" class="img-rounded img-preview">
              </a>
            </td>
            <td class="td-limit">{{$row['deskripsi']}}</td>
            <td>{{$row['nama']}}</td>
            <td>{{$row['nama_kategori']}}</td>
            <td>
              <button type="button" data-toggle="modal" data-target="#barang-modal" onclick="editBarang('{{$row['kode_barang']}}')" class="btn btn-primary btn-sm">Edit</button>
              <button class="btn btn-danger btn-sm" onclick="delBarang('{{$row['kode_barang']}}')">Hapus</button>
            </td>
          </tr>
        @endforeach
      </tbody>
		</table>
	</div>
  @include('modals.barang')
@endsection
