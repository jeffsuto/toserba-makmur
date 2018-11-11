/**
 * Action edit data
 */
function editPegawai(id)
{
  $.ajax({
    url : base_url+'api/pegawai/'+id,
    datatype : 'JSON',
    success : function(data)
    {
      console.log('berhasil');
      $('#form-pegawai').attr('action', base_url+'update/pegawai/'+id);

      $('.nama').val(data.data[0].nama);
      $('.email').val(data.data[0].email);
      $('.username').val(data.data[0].username);
      $('.alamat').val(data.data[0].alamat);
      $('.telp').val(data.data[0].tlp);
    }
  });
}

function batalPenjualan(id, id_customer)
{
  swal({
      title: "Apakah anda yakin?",
      text: "Pesanan dengan kode "+id+" akan dibatalkan!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#FF7043",
      confirmButtonText: "Ya, Batalkan!",
      }, function() {
        window.location.href = base_url+'update/statuspenjualan/'+id+'/2'+id_customer
    });
  return false;
}

function editPengiriman(id, id_customer)
{
  $.ajax({
    url      : base_url+'api/detailpengiriman/'+id,
    datatype : 'JSON',
    success  : function(data)
    {
      console.log('berhasil');
      $('.resi').val(data.data[0].no_resi);
      $('.kurir').text(data.data[0].nama);
      $('.detailpengiriman-modal-title').text('Kode Pengiriman : '+data.data[0].id_pengiriman);
      $('#form_detail_pengiriman').attr('action', base_url+'update/detailpengiriman/'+id+'/'+id_customer);
      var dt = '';
      for (var i = 0; i < data.data.length; i++) {
        dt += '<tr>'
          +  '<input type="hidden" name="id_detail[]" value="'+data.data[i].id_detail_pengiriman+'">'
          +  '<td>'
          +    data.data[i].kode_barang
          +  '</td>'
          +  '<td>'
          +    data.data[i].nama_barang
          +  '</td>'
          +  '<td>'
          +    data.data[i].qty
          +  '</td>'
          +  '<td>'
          +    '<input type="number" min="0" class="form-control" name="jml_barang_terkirim[]" value="'+data.data[i].jml_barang_kirim+'">'
          +  '</td>'
          +  '<td>'
          +    data.data[i].jml_barang_terima
          +  '</td>'
          +  '<td>'
          +    data.data[i].jml_barang_rusak
          +  '</td>'
          +  '<td>'
          +    '<a href="'+base_url+'assets/images/komplain/'+data.data[i].kondisi_barang+'" data-popup="lightbox">'
          +      '<img src="'+base_url+'assets/images/komplain/'+data.data[i].kondisi_barang+'" alt="" class="img-rounded img-preview">'
          +    '</a>'
          +  '</td>'
          +'</tr>';
      }
      $('.detail-pengiriman').html(dt);
    },
    error : function(data)
    {
      console.log('gagal');
    }
  });
}

function editStatusPengiriman(id, status)
{
  if (status == "BELUM TERKIRIM") {
    window.location.href = base_url+'update/statuspengiriman/'+id+'/1';
  }else {
    window.location.href = base_url+'update/statuspengiriman/'+id+'/0';
  }
}

function detailPenjualan(id)
{
  $.ajax({
    url      : base_url+'api/detailpenjualan/'+id,
    datatype : 'JSON',
    success  : function(data)
    {

      $('.detailpenjualan-modal-title').text('Kode Transaksi : '+data.data[0].id_penjualan);
      $('#tgl').text('Tanggal : '+data.data[0].tgl);
      var dt = '';
      var total = 0;
      for (var i = 0; i < data.data.length; i++) {
        dt += '<tr>'
                +'<td>'+data.data[i].nama_barang+'</td>'
                +'<td>Rp.'+data.data[i].harga+'</td>'
                +'<td>'+data.data[i].catatan+'</td>'
                +'<td>'+data.data[i].qty+'</td>'
                +'<td>'+data.data[i].diskon+'%</td>'
                +'<td>Rp. '+data.data[i].jumlah * data.data[i].qty+'</td>'
              +'</tr>';
        total += data.data[i].jumlah * data.data[i].qty;
      }
      dt += '<tr><td>Total bayar</td><td></td><td></td><td></td><td></td><td>Rp. '+total+'</td>';
      $('.detail').html(dt);
    }
  });
}

/**
 * Action edit data
 */
function editBarang(id)
{
 $.ajax({
   url      : base_url+'api/barang/'+id,
   datatype : 'JSON',
   success  : function(data)
   {
     $('.barang-modal-title').text('Edit Barang');
     $('.form-barang').attr('action', base_url+'update/barang/'+id);
     for (var i = 0; i < data.length; i++) {
       var dim = data[i].dimensi.split('x');
       $('.kode').val(data[i].kode);
       $('.nama').val(data[i].nama);
       $('.harga').val(data[i].harga);
       $('.diskon').val(data[i].diskon);
       $('.p').val(dim[0]);
       $('.l').val(dim[1]);
       $('.t').val(dim[2]);
       $('.berat').val(data[i].berat);
       $('.stok').val(data[i].stok);
       $('.deskripsi').val(data[i].deskripsi);
       $('.supplier').val(data[i].id_supplier).change();
       $('.kategori').val(data[i].kode_kategori).change();
     }
   }
 });
}

function editStatusPenjualan(id, status, id_customer){
  if (status == "PROSES VALIDASI") {
    window.location.href = base_url+'update/statuspenjualan/'+id+'/1/'+id_customer;
  }else {
    swal({
        title: "Tidak dapat merubah status",
        text: "Customer belum mengirimkan bukti pembayaran",
        type: "warning",
        confirmButtonColor: "#FF7043",
        });
    return false;
  }
}

function editKategori(id)
{
  $.ajax({
    url       : base_url+'api/kategori/'+id,
    datatype  : 'JSON',
    success   : function(data)
    {
      $('.kategori-modal-title').text('Edit Kategori');
      $('.form-kategori').attr('action', base_url+'update/kategori/'+id);
      for (var i = 0; i < data.length; i++) {
        $('.kode').val(data[i].kode);
        $('.nama').val(data[i].nama);
      }
    }
  });
}

function editSupplier(id)
{
  $.ajax({
    url       : base_url+'api/supplier/'+id,
    datatype  : 'JSON',
    success   : function(data)
    {
      $('.supplier-modal-title').text('Edit Supplier');
      $('.form-supplier').attr('action', base_url+'update/supplier/'+id);
      for (var i = 0; i < data.length; i++) {
        $('.nama').val(data[i].nama);
        $('.alamat').val(data[i].alamat);
        $('.telp').val(data[i].telp);
      }
    }
  });
}
