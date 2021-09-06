<?php if ($data) { ?>
	<div class="row">
		<?php foreach ($data as $n => $item) { ?>
			<div class="col-lg-4">
				<div class="card">
					<div style="height: 150px; overflow-y: hidden">
						<img class="card-img-top img-fluid" src="<?=base_url('uploads/media/'.$item['foto']) ?>" alt="...">
					</div>
					<div class="card-body">
						<h4 class="card-title mt-0"><?=$item['nama']?></h4>
						<p class="card-text">
							<small class="text-muted d-block">
								<i class="fa fa-calendar-alt fa-fw"></i> <?=idDate($item['tanggal'])?>
							</small>
							<small class="text-muted d-block">
								<i class="fa fa-map-marker-alt fa-fw"></i> <?=$item['alamat']?>
							</small>
						</p>
						<p class="card-text mt-3"><?=stringTruncate($item['deskripsi'],90)?></p>
						<a href="<?=site_url('halaman/kegiatan_detail/'.$item['idKegiatan'])?>" class="btn btn-primary waves-effect waves-light">Detail <i class="fa fa-chevron-circle-right"></i></a>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
<?php } else { ?>
	<div class="alert alert-info">Belum ada data kegiatan</div>
<?php } ?>
<?php echo $pagination ?>
