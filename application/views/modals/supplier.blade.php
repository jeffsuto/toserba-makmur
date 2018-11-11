<div id="supplier-modal" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title text-semibold supplier-modal-title">Tambah Supplier</h5>
			</div>

			<form action="{{base_url('add/supplier')}}" method="post" class="form-horizontal form-supplier">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-sm-3">Nama Supplier</label>
						<div class="col-sm-9">
							<input type="text" name="nama" class="form-control nama">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Alamat Supplier</label>
						<div class="col-sm-9">
							<input type="text" name="alamat" class="form-control alamat">
						</div>
					</div>

          <div class="form-group">
						<label class="control-label col-sm-3">No. Telp Supplier</label>
						<div class="col-sm-9">
							<input type="number" min="0" name="telp" class="form-control telp">
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
