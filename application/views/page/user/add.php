<?php $this->load->view('component/notification'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="d-flex justify-content-between p-3">
				<h5 class="pt-2">Tambah User</h5>
				<div >
					<a href="<?php echo site_url('user') ?>" class="btn btn-dark">
						<i class="fa fa-arrow-left fa-fw"></i> Kembali
					</a>
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="<?= site_url('user/save') ?>" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Nama</label>
						<div class="col-md-10">
							<input class="form-control" type="text" name="nama" required>
							<div class="invalid-feedback">Nama mohon diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Nomor HP</label>
						<div class="col-md-10">
							<input class="form-control" type="text" name="nohp" required>
							<div class="invalid-feedback">Nomor HP wajib diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Email</label>
						<div class="col-md-10">
							<input class="form-control" type="email" name="email" required>
							<div class="invalid-feedback">Email wajib diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Username</label>
						<div class="col-md-10">
							<input class="form-control" type="text" name="username" required>
							<div class="invalid-feedback">Username wajib diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Password <i class="fa fa-question-circle" data-toggle="tooltip" data-title="Kosongkan jika tidak diubah"></i></label>
						<div class="col-md-10">
							<input class="form-control" type="password" name="password" required>
							<div class="invalid-feedback">Password wajib diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Foto</label>
						<div class="col-md-10">
							<div class="custom-file">
								<input type="file" name="foto" class="custom-file-input" id="customFile" onchange="show_file_name(this)">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
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