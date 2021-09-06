<?php $this->load->view('component/notification'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="d-flex justify-content-between p-3">
				<h5 class="pt-2">Daftar Galeri</h5>
				<div >
					<a href="<?php echo site_url('galeri/form') ?>" class="btn btn-primary">
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
								<th width="20%">Judul</th>
								<th>Deskripsi</th>
								<th width="30%">URL</th>
								<th width="14%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($data) { ?>
								<?php foreach($data as $n => $item) { ?>
									<tr>
										<td><?php echo $n+1 ?></td>
										<td><?php echo $item['judul'] ?></td>
										<td><?php echo $item['deskripsi'] ?></td>
										<td><?php echo $item['url'] ?></td>
										<td>
											<a href="<?php echo site_url('galeri/form/'.$item['idGallery']) ?>" class="btn btn-sm btn-info">
												<i class="fa fa-pencil-alt"></i>
											</a>
											<a href="<?php echo site_url('galeri/delete/'.$item['idGallery']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')">
												<i class="fa fa-trash-alt"></i>
											</a>
										</td>
									</tr>
								<?php } ?>
							<?php } else { ?>

							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>