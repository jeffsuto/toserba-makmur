/**
 * Action edit data
 */
function addBarang()
{
  $('.form-barang')[0].reset();
  $('.barang-modal-title').text('Tambah Barang');
  $('.form-barang').attr('action', base_url+'add/barang');
}

function addSupplier()
{
  $('.form-supplier')[0].reset();
  $('.supplier-modal-title').text('Tambah Supplier');
  $('.form-supplier').attr('action', base_url+'add/supplier');
}

function addKategori()
{
  $('.form-kategori')[0].reset();
  $('.kategori-modal-title').text('Tambah Kategori');
  $('.form-kategori').attr('action', base_url+'add/kategori');
}
