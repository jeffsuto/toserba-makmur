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

@section('menu-pegawai')
    active
@endsection

@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Data List Pegawai</h5>
      <div class="heading-elements">
        <ul class="icons-list">
          <li><a data-action="collapse"></a></li>
          <li><a data-action="reload"></a></li>
          <li><a data-action="close"></a></li>
        </ul>
      </div>
    </div>

    <div class="panel-body">
      <button type="button" onclick="addPegawai()" data-toggle="modal" data-target="#pegawai-modal" class="btn btn-success btn-sm" name="button">
        <b>Tambah</b>
      </button>
    </div>

    <table class="table datatable-basic">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Email</th>
          <th>Username</th>
          <th>Password</th>
          <th>Alamat</th>
          <th>No. Telepon</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pegawai_data as $row)
          <tr>
            <td>{{ $row['nama'] }}</td>
            <td>{{ $row['email'] }}</td>
            <td>{{ $row['username'] }}</td>
            <td>{{ $row['password'] }}</td>
            <td>{{ $row['alamat'] }}</td>
            <td>{{ $row['tlp'] }}</td>
            <td>
              <button onclick="editPegawai('{{$row['id']}}')" data-toggle="modal" data-target="#pegawai-modal" class="btn btn-primary btn-sm">Edit</button>
              <button class="btn btn-danger btn-sm" onclick="delPegawai('{{$row['id']}}')">Hapus</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    @include('modals.pegawai')
  </div>
@endsection
