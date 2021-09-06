<div class="row">
	<div class="col-lg-12">
		<div class="alert alert-warning" role="alert">
			Selamat Datang
		</div>
	</div>
</div>
			<h4 class="card-title"><i class="mdi mdi-clipboard-list-outline"></i> Berita Terbaru</h4>
				<div class="row">
					<?php if ($berita) { ?>
						<?php foreach ($berita as $n => $item) { ?>
							<div class="col-lg-4">
								<div class="card">
								<div style="height: 150px; overflow-y: hidden">
								<img class="card-img-top img-fluid" src="<?=base_url('uploads/media/'.$item['gambar']) ?>" alt="...">
								</div>
									<div class="card-body">
										<h4 class="card-title"><?php echo $item['judul'] ?></h4>
										<p class="card-text mt-3"><?=stringTruncate($item['text'],90)?></p>
										<a href="<?=site_url('halaman/berita_detail/'.$item['idBerita'])?>" class="btn btn-primary waves-effect waves-light">Baca <i class="fa fa-chevron-circle-right"></i></a>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php } else { ?>
						<div class="alert alert-info">Belum ada data Berita</div>
					<?php } ?>
				</div>
				<?php echo $pagination ?>



				<h4 class="card-title"><i class="mdi mdi-clipboard-list-outline"></i>Kegiatan Terbaru</h4>
				<div class="row">
					<?php if ($kegiatan) { ?>
						<?php foreach ($kegiatan as $n => $item) { ?>
							<div class="col-lg-4">
								<div class="card">
								<div style="height: 150px; overflow-y: hidden">
								<img class="card-img-top img-fluid" src="<?=base_url('uploads/media/'.$item['foto']) ?>" alt="...">
								</div>
									<div class="card-body">
										<h4 class="card-title"><?php echo $item['nama'] ?></h4>
										<p class="card-text mt-3"><?=stringTruncate($item['deskripsi'],90)?></p>
										<a href="<?=site_url('halaman/kegiatan_detail/'.$item['idKegiatan'])?>" class="btn btn-primary waves-effect waves-light">Detail <i class="fa fa-chevron-circle-right"></i></a>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php } else { ?>
						<div class="alert alert-info">Belum ada data Kegiatan</div>
					<?php } ?>
				</div>
				<?php echo $pagination ?>