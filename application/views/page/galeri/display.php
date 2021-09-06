<div class="row">
	<?php if ($data) { ?>
		<?php foreach ($data as $n => $item) { ?>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title"><?php echo $item['judul'] ?></h4>
						<p class="card-title-desc"><?php echo $item['deskripsi'] ?></p>
						<div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?php echo $item['url'] ?>"></iframe>
                        </div>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php } else { ?>
		<div class="alert alert-info">Belum ada data galeri</div>
	<?php } ?>
</div>
<?php echo $pagination ?>
