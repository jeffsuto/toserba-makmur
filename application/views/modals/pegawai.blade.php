<div id="pegawai-modal" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title text-semibold">Tambah Pegawai</h5>
			</div>

			<form action="{{base_url('add/pegawai')}}" id="form-pegawai" method="post" class="form-horizontal">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-sm-3">Nama</label>
						<div class="col-sm-9">
							<input type="text" name="nama" class="form-control nama">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Email</label>
						<div class="col-sm-9">
							<input type="email" name="email" class="form-control email">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Username</label>
						<div class="col-sm-9">
							<input type="text" name="username" class="form-control username">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Alamat</label>
						<div class="col-sm-9">
							<textarea name="alamat" class="form-control alamat" cols="30" rows="10"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">No. Telepon</label>
						<div class="col-sm-9">
							<input type="text" class="form-control telp" name="telp">
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
