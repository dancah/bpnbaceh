<?php $this->load->view('component/notification'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="d-flex justify-content-between p-3">
				<h5 class="pt-2">Tambah Galeri</h5>
				<div >
					<a href="<?php echo site_url('galeri/index/lists') ?>" class="btn btn-dark">
						<i class="fa fa-arrow-left fa-fw"></i> Kembali
					</a>
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="<?php echo site_url('galeri/save') ?>" class="needs-validation" novalidate>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2" for="judul">Judul</label>
						<div class="col-md-10">
							<input class="form-control" type="text" name="judul" id="judul" required>
							<div class="invalid-feedback">Judul mohon diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Deskripsi</label>
						<div class="col-md-10">
							<textarea class="form-control" name="deskripsi" rows="4" required></textarea>
							<div class="invalid-feedback">Deskripsi mohon diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">URL Youtube</label>
						<div class="col-md-10">
							<input class="form-control" type="text" name="url" required>
							<div class="invalid-feedback">URL Youtube mohon diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">&nbsp;</label>
						<div class="col-md-10">
							<button type="submit" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan</button>
							<button type="reset" class="btn btn-secondary"><i class="fa fa-sync-alt fa-fw"></i> Reset</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>