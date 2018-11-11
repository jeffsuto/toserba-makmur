<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>@yield('page-title') | Admin</title>

  	<!-- Global stylesheets -->
  	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  	<link href="{{base_url()}}assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
  	<link href="{{base_url()}}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  	<link href="{{base_url()}}assets/css/core.min.css" rel="stylesheet" type="text/css">
  	<link href="{{base_url()}}assets/css/components.min.css" rel="stylesheet" type="text/css">
  	<link href="{{base_url()}}assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <link href="{{base_url()}}assets/css/custom.css" rel="stylesheet" type="text/css">
  	<!-- /global stylesheets -->

  	<!-- Core JS files -->
  	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/loaders/pace.min.js"></script>
  	<script type="text/javascript" src="{{base_url()}}assets/js/core/libraries/jquery.min.js"></script>
  	<script type="text/javascript" src="{{base_url()}}assets/js/core/libraries/bootstrap.min.js"></script>
  	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/loaders/blockui.min.js"></script>
  	<!-- /core JS files -->

  </head>
  <body>

    @include('template.navbar')

    <!-- Page container -->
    <div class="page-container">

      <!-- Page content -->
      <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main">
          <div class="sidebar-content">

            <!-- User menu -->
  					<div class="sidebar-user">
  						<div class="category-content">
  							<div class="media">
  								<a href="#" class="media-left"><img src="{{base_url()}}assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
  								<div class="media-body">
  									<span class="media-heading text-semibold">{{$name}}</span>
  									<div class="text-size-mini text-muted">
  										<i class="icon-book text-size-small"></i> &nbsp;Administrator
  									</div>
  								</div>

  								<div class="media-right media-middle">
  									<ul class="icons-list">
  										<li>
  											<a href="{{base_url('admin/setting')}}"><i class="icon-cog3"></i></a>
  										</li>
  									</ul>
  								</div>
  							</div>
  						</div>
  					</div>
					  <!-- /user menu -->

            <!-- Main navigation -->
            <div class="sidebar-category sidebar-category-visible">
              <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                  <!-- Main -->
  								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
  								<li class="@yield('menu-customer')"><a href="{{base_url('admin/customer')}}"><i class="icon-users4"></i> <span>Customer</span></a></li>
                  <li class="@yield('menu-barang')"><a href="{{base_url('admin/barang')}}"><i class="icon-cube3"></i> <span>Barang</span></a></li>
                  <li class="@yield('menu-supplier')"><a href="{{base_url('admin/supplier')}}"><i class="icon-collaboration"></i> <span>Supplier</span></a></li>
                  <li class="@yield('menu-kategori')"><a href="{{base_url('admin/kategori')}}"><i class="icon-price-tag2"></i> <span>Kategori</span></a></li>
                  <li class="@yield('menu-pengiriman')"><a href="{{base_url('admin/pengiriman')}}"><i class="icon-truck"></i> <span>Pengiriman</span></a></li>
                  <li class="@yield('menu-penjualan')"><a href="{{base_url('admin/penjualan')}}"><i class="icon-bag"></i> <span>Penjualan</span></a></li>
                  <li class="@yield('menu-pegawai')"><a href="{{base_url('admin/pegawai')}}"><i class="icon-user-tie"></i> <span>Pegawai</span></a></li>
                  <!-- /main -->
                  {{-- Report --}}
                  <li class="navigation-header"><span>Laporan</span> <i class="icon-menu" title="Main pages"></i></li>
                  <li>
  									<a href="#"><i class="icon-stats-growth"></i>Laporan</a>
  									<ul>
                      <li class="@yield('laporan-pembelian')"><a href="{{base_url('admin/laporan/pembelian')}}"><i class="icon-cart2"></i>Laporan Pembelian</a></li>
                      <li class="@yield('laporan-penjualan')"><a href="{{base_url('admin/laporan/penjualan')}}"><i class="icon-bag"></i>Laporan Penjualan</a></li>
                      <li class="@yield('laporan-pengiriman')"><a href="{{base_url('admin/laporan/pengiriman')}}"><i class="icon-truck"></i>Laporan Pengiriman</a></li>
  									</ul>
  								</li>
                  {{-- /Report --}}
                </ul>
              </div>
            </div>
            <!-- /Main navigation -->

          </div>
        </div>
        <!-- /Main sidebar -->

        <!-- Main content -->
        <div class="content-wrapper">

          <!-- Page header -->
          <div class="page-header page-header-default">
  					<div class="page-header-content">
  						<div class="page-title">
  							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - @yield('page-title')</h4>
  						</div>

  					</div>

  					<div class="breadcrumb-line">
  						<ul class="breadcrumb">
  							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
  							<li class="active">@yield('page-title')</li>
  						</ul>

  					</div>
  				</div>
          <!-- Page header -->

          <!-- Content area -->
          <div class="content">

            @yield('content')

            <div class="footer text-muted">
              &copy; 2018. All Rights Reserved by lestary-sby.tk
				    </div>

          </div>
          <!-- /Content area -->

        </div>
        <!-- /Main content -->

      </div>
		  <!-- /Page content -->

    </div>
    <!-- /Page container -->
  </body>
  <!-- Theme JS files -->
  @yield('theme_js')
  <!-- /theme JS files -->
  @yield('custom_js')

</html>
