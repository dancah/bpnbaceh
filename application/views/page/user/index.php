<?php $this->load->view('component/notification'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="d-flex justify-content-between p-3">
				<h5 class="pt-2">Daftar User</h5>
				<div >
					<a href="<?php echo site_url('user/form') ?>" class="btn btn-primary">
						<i class="fa fa-plus fa-fw"></i> Tambah
					</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered datatable">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th width="20%">Nama</th>
								<th width="15%">Username</th>
								<th width="15%">Nomor HP</th>
								<th>Email</th>
								<th width="15%">Foto</th>
								<th width="18%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($data) { ?>
								<?php foreach($data as $n => $item) { ?>
									<tr>
										<td><?php echo $n+1 ?></td>
										<td><?php echo $item['nama'] ?></td>
										<td><?php echo $item['username'] ?></td>
										<td><?php echo $item['nohp'] ?></td>
										<td><?php echo $item['email'] ?></td>
										<td>
											<img src="<?=base_url('uploads/user/'.$item['foto'])?>" height="60">
										</td>
										<td>
											<a href="<?php echo site_url('user/form/'.$item['idUser']) ?>" class="btn btn-sm btn-info">
												<i class="fa fa-pencil-alt"></i>
											</a>
											<a href="<?php echo site_url('user/delete/'.$item['idUser']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')">
												<i class="fa fa-trash-alt"></i>
											</a>
										</td>
									</tr>
								<?php } ?>
							<?php } else { ?>
								<tr>
									<td colspan="7">Tidak ditemukan data</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>