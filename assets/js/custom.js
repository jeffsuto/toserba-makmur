let base_url = 'http://localhost/toserba-makmur/';

$('#print_laporanpengiriman').click(function(){
  let year = $('.year').val();
  let month = $('.month').val();
  let day = $('.day').val();
  let url = base_url + 'admin/laporan/pengiriman/print?year='+year+'&month='+month+'&day='+day;
  window.open( url, '_blank');
});

$('#print_laporanpembelian').click(function(){
  let year = $('.year').val();
  let month = $('.month').val();
  let day = $('.day').val();
  let url = base_url + 'admin/laporan/pembelian/print?year='+year+'&month='+month+'&day='+day;
  window.open( url, '_blank');
});

$('#print_laporanpenjualan').click(function(){
  let year = $('.year').val();
  let month = $('.month').val();
  let day = $('.day').val();
  let url = base_url + 'admin/laporan/penjualan/print?year='+year+'&month='+month+'&day='+day;
  window.open( url, '_blank');
});
