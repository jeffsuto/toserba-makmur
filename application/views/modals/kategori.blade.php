<div id="kategori-modal" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title text-semibold kategori-modal-title">Tambah Kategori</h5>
			</div>

			<form action="{{base_url('add/kategori')}}" method="post" class="form-horizontal form-kategori">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-sm-3">Kode Kategori</label>
						<div class="col-sm-9">
							<input type="text" name="kode" class="form-control kode">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Nama Kategori</label>
						<div class="col-sm-9">
							<input type="text" name="nama" class="form-control nama">
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
