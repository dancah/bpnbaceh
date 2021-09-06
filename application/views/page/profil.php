<?php $this->load->view('component/notification'); ?>
<div class="row">
	<div class="col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="profile-widgets py-3">
					<div class="text-center">
						<div class="">
							<img src="<?=base_url('uploads/user/'.$data['foto']) ?>" alt="" class="avatar-lg mx-auto img-thumbnail rounded-circle">
							<div class="online-circle"><i class="fas fa-circle text-success"></i></div>
						</div>
						<div class="mt-3 ">
							<a href="#" class="text-dark font-weight-medium font-size-16"><?= $data['nama'] ?></a>
							<p class="text-body mt-1 mb-1">Administrator</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="<?= site_url('auth/profile_save') ?>" enctype="multipart/form-data" class="needs-validation" novalidate>
					<input type="hidden" name="idUser" value="<?= $data['idUser'] ?>">
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Nama</label>
						<div class="col-md-10">
							<input class="form-control" type="text" name="nama" value="<?= $data['nama'] ?>" required>
							<div class="invalid-feedback">Nama mohon diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Nomor HP</label>
						<div class="col-md-10">
							<input class="form-control" type="text" name="nohp" value="<?= $data['nohp'] ?>" required>
							<div class="invalid-feedback">Nomor HP mohon diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Email</label>
						<div class="col-md-10">
							<input class="form-control" type="email" name="email" value="<?= $data['email'] ?>" required>
							<div class="invalid-feedback">Email mohon diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Username</label>
						<div class="col-md-10">
							<input class="form-control" type="text" name="username" value="<?= $data['username'] ?>" required>
							<div class="invalid-feedback">Nama mohon diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Password <i class="fa fa-question-circle" data-toggle="tooltip" data-title="Kosongkan jika tidak diubah"></i></label>
						<div class="col-md-10">
							<input class="form-control" type="password" name="password">
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