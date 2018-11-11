
/**
 * Action hapus data
 */
function delPegawai(id)
{
  swal({
      title: "Apakah anda yakin?",
      text: "Data akan dihapus dari database!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#FF7043",
      confirmButtonText: "Ya, Hapus!",
      }, function() {
        window.location.href = base_url+'del/pegawai/'+id
    });
  return false;
}

function delPengiriman(id)
{
  swal({
      title: "Apakah anda yakin?",
      text: "Data akan dihapus dari database!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#FF7043",
      confirmButtonText: "Ya, Hapus!",
      }, function() {
        window.location.href = base_url+'del/pengiriman/'+id
    });
  return false;
}

function delBarang(id)
{
  swal({
      title: "Apakah anda yakin?",
      text: "Data akan dihapus dari database!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#FF7043",
      confirmButtonText: "Ya, Hapus!",
      }, function() {
        window.location.href = base_url+'del/barang/'+id
    });
  return false;
}

function delPenjualan(id)
{
  swal({
      title: "Apakah anda yakin?",
      text: "Data akan dihapus dari database!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#FF7043",
      confirmButtonText: "Ya, Hapus!",
      }, function() {
        window.location.href = base_url+'del/penjualan/'+id
    });
  return false;
}

function delSupplier(id)
{
  swal({
      title: "Apakah anda yakin?",
      text: "Data akan dihapus dari database!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#FF7043",
      confirmButtonText: "Ya, Hapus!",
      }, function() {
        window.location.href = base_url+'del/supplier/'+id
    });
  return false;
}

function delKategori(id)
{
  swal({
      title: "Apakah anda yakin?",
      text: "Data akan dihapus dari database!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#FF7043",
      confirmButtonText: "Ya, Hapus!",
      }, function() {
        window.location.href = base_url+'del/kategori/'+id
    });
  return false;
}

function delCustomer(id)
{
  swal({
      title: "Apakah anda yakin?",
      text: "Data akan dihapus dari database!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#FF7043",
      confirmButtonText: "Ya, Hapus!",
      }, function() {
        window.location.href = base_url+'del/customer/'+id
    });
  return false;
}
