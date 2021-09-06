<?php if ($data) { ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<img class="card-img-top p-3" src="<?=base_url('uploads/media/'.$data['gambar']) ?>" alt="...">
				<div class="card-body">
					<h4 class="card-title mt-0"><?=$data['judul']?></h4>
					<p class="card-text">
						<small class="text-muted"><i class="fa fa-calendar-alt fa-fw"></i> <?=idDate($data['tanggal'])?></small>
					</p>
					<p class="card-text mt-3 text-justify"><?=$data['text']?></p>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
