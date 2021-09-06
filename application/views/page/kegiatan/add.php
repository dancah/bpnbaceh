<link rel="stylesheet" type="text/css" href="<?=base_url('template/dist/')?>assets/libs/leaflet/leaflet.css" />
<?php $this->load->view('component/notification'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="d-flex justify-content-between p-3">
				<h5 class="pt-2">Tambah Kegiatan</h5>
				<div >
					<a href="<?php echo site_url('kegiatan/index/lists') ?>" class="btn btn-dark">
						<i class="fa fa-arrow-left fa-fw"></i> Kembali
					</a>
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="<?php echo site_url('kegiatan/save') ?>" class="needs-validation" enctype="multipart/form-data" novalidate>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Nama Kegiatan</label>
						<div class="col-md-10">
							<input class="form-control" type="text" name="nama" required>
							<div class="invalid-feedback">Nama kegiatan wajib diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Deskripsi</label>
						<div class="col-md-10">
							<textarea class="form-control" name="deskripsi" rows="4" required></textarea>
							<div class="invalid-feedback">Deskripsi kegiatan wajib diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Tanggal Kegiatan</label>
						<div class="col-md-10">
							<input class="form-control" type="text" name="tanggal" data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd" required readonly>
							<p class="text-monospace small text-info font-weight-bold pt-1">* Jika tidak diisi maka default tanggal adalah hari ini</p>
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
						<label class="col-form-label col-md-2">Alamat</label>
						<div class="col-md-10">
							<textarea class="form-control" name="alamat" rows="4" required></textarea>
							<div class="invalid-feedback">Alamat wajib diisi</div>
						</div>
					</div>
					<div class="form-group form-row">
						<label class="col-form-label col-md-2">Koordinat Lokasi</label>
						<div class="col-md-10">
							<p class="bg-info p-2 text-white rounded"><i class="fa fa-info-circle fa-fw"></i> Perbesar (Zoom) dan geser/pindahkan marker untuk mendapatkan koordinat latitude dan longitude</p>
							<div id="map"></div>
							<div class="form-row mt-3">
								<div class="col-lg-6">
									<label>Latitude</label>
									<input type="text" name="lat" class="form-control" id="lat" />
								</div>
								<div class="col-lg-6">
									<label>Longitude</label>
									<input type="text" name="lng" class="form-control" id="lng" />
								</div>
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

<script type="text/javascript" src="<?= base_url('template/dist/') ?>assets/libs/leaflet/leaflet.js"></script>
<script type="text/javascript">
	function addMapPicker() {
		var mapCenter = [4.61, 96.56];
		var map = L.map('map', {
			center: [4.61, 96.56],
			zoom: 8,
			scrollWheelZoom: false,
			layers: new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
		});
		
		var marker = L.marker(mapCenter, { draggable: true }).addTo(map);
		marker.on('dragend', function (e) {
			document.getElementById('lat').value = marker.getLatLng().lat;
			document.getElementById('lng').value = marker.getLatLng().lng;
		});
		var updateMarker = function(lat, lng) {
			marker.setLatLng([lat, lng]);
			return false;
		};
		map.on('click', function(e) {
			$('#lat').val(e.latlng.lat);
			$('#lng').val(e.latlng.lng);
			updateMarker(e.latlng.lat, e.latlng.lng);
		});

		var updateMarkerByInputs = function() {
			return updateMarker( $('#lat').val() , $('#lng').val());
		}
		$('#lat').on('input', updateMarkerByInputs);
		$('#lng').on('input', updateMarkerByInputs);
	}

	$(document).ready(function() {
		addMapPicker();
	});
</script>
<style>
	#map {
	    width : 100%;
	    height : 480px;
	}
 </style>