<?php $this->load->view('component/notification'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="d-flex justify-content-between p-3">
				<h5 class="pt-2">Daftar Berita</h5>
				<div >
					<a href="<?php echo site_url('berita/form') ?>" class="btn btn-primary">
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
								<th>Isi Berita</th>
								<th width="15%">Tanggal Publish</th>
								<th width="18%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($data) { ?>
								<?php foreach($data as $n => $item) { ?>
									<tr>
										<td><?php echo $n+1 ?></td>
										<td><?php echo $item['judul'] ?></td>
										<td><?php echo stringTruncate($item['text'],150) ?></td>
										<td><?php echo $item['tanggal'] ?></td>
										<td>
											<a href="#" data-toggle="popover" data-content="<img class='img-fluid' src='<?=base_url('uploads/media/'.$item['gambar'])?>'>" data-html="true" data-trigger="hover" data-placement="left" class="btn btn-warning btn-sm"><i class="fa fa-image"></i></a>
											<a href="<?php echo site_url('berita/form/'.$item['idBerita']) ?>" class="btn btn-sm btn-info">
												<i class="fa fa-pencil-alt"></i>
											</a>
											<a href="<?php echo site_url('berita/delete/'.$item['idBerita']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')">
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