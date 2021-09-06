<?php $this->load->view('component/notification'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="d-flex justify-content-between p-3">
				<h5 class="pt-2">Edit Berita</h5>
				<div >
					<a href="<?php echo site_url('berita/index/lists') ?>" class="btn btn-dark">
						<i class="fa fa-arrow-left fa-fw"></i> Kembali
					</a>
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="<?php echo site_url('berita/save') ?>" class="needs-validation" enctype="multipart/form-data" novalidate>
					<input type="hidden" name="idBerita" value="<?= $result['idBerita'] ?>">
					<div class="form-group form-row">
						<label class="col-form-label col-md-2" for="judul">Judul</label>
						<div class="col-md-10">
							<input class="form-control" type="text" name="judul" value="<?= $result['judul'] ?>" required>
							<div class="invalid-feedback">Judul mohon diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Isi Berita</label>
						<div class="col-md-10">
							<textarea class="form-control" name="text" id="isi" rows="4" required><?= $result['text'] ?></textarea>
							<div class="invalid-feedback">Isi berita mohon diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Tanggal Publikasi</label>
						<div class="col-md-10">
							<input class="form-control tanggal" type="text" name="tanggal" value="<?= $result['tanggal'] ?>" data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd" readonly>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Gambar</label>
						<div class="col-md-10">
							<div class="custom-file">
								<input type="file" name="gambar" class="custom-file-input" id="customFile" onchange="show_file_name(this)">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
							<p class="m-0 text-monospace small font-weight-bold pt-1">
								<a href="#" class="text-info" data-toggle="popover" data-content="<img class='img-fluid' src='<?=base_url('uploads/media/'.$result['gambar'])?>'>" data-html="true" data-trigger="hover"><i class="fa fa-image fa-fw"></i> Gambar sebelumnya</a>
							</p>
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
<link rel="stylesheet" type="text/css" href="<?= base_url('template/dist/') ?>assets/libs/summernote/summernote.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('template/dist/') ?>assets/libs/summernote/summernote-bs4.min.css">
<script type="text/javascript" src="<?= base_url('template/dist/') ?>assets/libs/summernote/summernote.min.js"></script>
<script type="text/javascript" src="<?= base_url('template/dist/') ?>assets/libs/summernote/summernote-bs4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#isi').summernote({
			height: "300px",
			callbacks: {
				onImageUpload: function(image) {
					uploadImage(image[0]);
				},
				onMediaDelete : function(target) {
					deleteImage(target[0].src);
				}
			}
		});

		function uploadImage(image) {
			var data = new FormData();
			data.append("image", image);
			$.ajax({
				url: "<?= site_url('berita/image_upload') ?>",
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "POST",
				success: function(url) {
					$('#isi').summernote("insertImage", url);
				},
				error: function(data) {
					console.log(data);
				}
			});
		}

		function deleteImage(src) {
			$.ajax({
				data: {src : src},
				type: "POST",
				url: "<?= site_url('berita/image_delete') ?>",
				cache: false,
				success: function(response) {
					console.log(response);
				}
			});
		}

	});
</script>