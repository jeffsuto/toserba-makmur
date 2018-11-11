<div id="detailpengiriman-modal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title text-semibold detailpengiriman-modal-title"> </h5>
			</div>

			<form action="#" id="form_detail_pengiriman" method="post">
				<div class="modal-body">
					<table class="table">
						<thead>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Qty</th>
							<th>Jumlah Barang Terkirim</th>
							<th>Jumlah Barang Terima</th>
							<th>Jumlah Barang Rusak</th>
							<th>Kondisi Barang</th>
						</thead>
						<tbody class="detail-pengiriman">

						</tbody>
					</table>
					<hr>
					<div class="form-inline col-md-12">
						<label class="control-label col-md-2 text-bold">No. Resi</label>
						<input type="text" class="form-control resi" name="resi" value=""><br><br>
						<label class="control-label col-md-2 text-bold">Ekspedisi</label>
						<span class="kurir"></span>
					</div>
	      </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success" name="button">Simpan</button>
	      </div>
      </form>
		</div>
	</div>
</div>
