<div id="customer-modal" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title text-semibold barang-modal-title">Edit Customer</h5>
			</div>

			<form action="{{base_url('update/customer')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-sm-3">Username</label>
						<div class="col-sm-9">
							<input type="text" name="kode" class="form-control username">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Email</label>
						<div class="col-sm-9">
							<input type="text" name="nama" class="form-control email">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Nama</label>
						<div class="col-sm-9">
							<input type="text" name="nama" class="form-control nama">
						</div>
					</div>

          <div class="form-group">
						<label class="control-label col-sm-3">Alamat</label>
						<div class="col-sm-5">
							<input type="text" name="nama" class="form-control alamat">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Kota</label>
						<div class="col-sm-5">
							<input type="text" name="nama" class="form-control">
						</div>
					</div>

          <div class="form-group">
						<label class="control-label col-sm-3">Berat Barang (gram)</label>
						<div class="col-sm-9">
							<input type="number" min="0" name="berat" class="form-control berat">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Stok Barang</label>
						<div class="col-sm-9">
							<input type="number" min="0" name="stok" class="form-control stok">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Image</label>
						<div class="col-sm-9">
							<input type="file" name="img" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Deskripsi Barang</label>
						<div class="col-sm-9">
							<textarea type="text" name="deskripsi" class="form-control deskripsi"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Nama Supplier</label>
						<div class="col-sm-9">
							<select class="form-control supplier" name="supplier">
                @foreach ($supplier_data as $row)
                  <option value="{{$row['id']}}">{{$row['nama']}}</option>
                @endforeach
              </select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Kategori</label>
						<div class="col-sm-9">
              <select class="form-control kategori" name="kategori">
                @foreach ($kategori_data as $row)
                  <option value="{{$row['kode_kategori']}}">{{$row['nama_kategori']}}</option>
                @endforeach
              </select>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary text-semibold">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
