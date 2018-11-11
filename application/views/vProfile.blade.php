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

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-flat">
    		<div class="panel-heading">
    			<h5 class="panel-title"> <span class="text-bold">Profile</span> {{$profile_data[0]['nama']}}</h5>
    			<div class="heading-elements">
    				<ul class="icons-list">
    					<li><a data-action="collapse"></a></li>
    					<li><a data-action="reload"></a></li>
    					<li><a data-action="close"></a></li>
    				</ul>
    			</div>
    		</div>
        <div class="panel-body">
          <table>
            <tr>
              <td width="50%" class="text-bold">Username</td>
              <td>{{$profile_data[0]['username']}}</td>
            </tr>
            <tr>
              <td width="50%" class="text-bold">Email</td>
              <td>{{$profile_data[0]['email']}}</td>
            </tr>
            <tr>
              <td width="50%" class="text-bold">No. Telp</td>
              <td>{{$profile_data[0]['tlp']}}</td>
            </tr>
            <tr>
              <td width="50%" class="text-bold">Alamat</td>
              <td>{{$profile_data[0]['alamat']}}</td>
            </tr>
            <tr>
          </table>
        </div>
    	</div>
    </div>

    <div class="col-md-6">
      <div class="panel panel-flat">
    		<div class="panel-heading">
    			<h5 class="panel-title"> Coming Soon </h5>
    			<div class="heading-elements">
    				<ul class="icons-list">
    					<li><a data-action="collapse"></a></li>
    					<li><a data-action="reload"></a></li>
    					<li><a data-action="close"></a></li>
    				</ul>
    			</div>
    		</div>
        <div class="panel-body">

        </div>
    	</div>
    </div>
  </div>
@endsection
