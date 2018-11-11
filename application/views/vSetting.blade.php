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
    			<h5 class="panel-title">Setting Akun</h5>
    			<div class="heading-elements">
    				<ul class="icons-list">
    					<li><a data-action="collapse"></a></li>
    					<li><a data-action="reload"></a></li>
    					<li><a data-action="close"></a></li>
    				</ul>
    			</div>
    		</div>
        <div class="panel-body">
          <form class="form-horizontal" action="{{base_url('update/akun')}}" method="post">
            @foreach ($setting_data as $row)
              <input type="hidden" name="id" value="{{$row['id']}}">
              <div class="form-group">
                <label class="control-label col-sm-3">Username</label>
                <div class="col-sm-9">
                  <input type="text" name="username" class="form-control" value="{{$row['username']}}">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">New Password</label>
                <div class="col-sm-9">
                  <input type="text" name="password" class="form-control" value="{{$row['password']}}">
                </div>
              </div>
            @endforeach

            <button type="submit" class="btn btn-success" name="button">Simpan</button>
          </form>
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
