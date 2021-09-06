<link rel="stylesheet" type="text/css" href="<?=base_url('template/dist/')?>assets/libs/leaflet/leaflet.css" />
<?php $this->load->view('component/notification'); ?>
<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-body">
				<div class="profile-widgets py-2">
					<div class="text-center">
						<div class="">
							<img src="<?=base_url('uploads/media/'.$data['foto']) ?>" alt="" class="img-fluid">
							<div class="online-circle"><i class="fas fa-circle text-success"></i></div>
						</div>
					</div>
				</div>
			</div>
			<ul class="list-group list-group-flush">
    			<li class="list-group-item">
    				<span class="d-block small">Nama Kegiatan</span>
    				<span class="d-block"><?=$data['nama'] ?></span>
    			</li>
    			<li class="list-group-item">
    				<span class="d-block small">Tanggal</span>
    				<span class="d-block"><?=idDate($data['tanggal']) ?></span>
    			</li>
			</ul>
			<div class="card-footer bg-white text-center">
				<a href="<?=site_url('halaman/kegiatan')?>" class="btn btn-dark waves-effect waves-light"><i class="fa fa-chevron-circle-left fa-fw"></i> Kembali</a>
			</div>
		</div>
	</div>
	<div class="col-lg-8">
		<div class="card">
			<div class="card-body">
				<div id="map"></div>
				<p class="m-0 mt-2"><i class="fa fa-map-marker-alt fa-fw"></i> <?=$data['alamat']?></p>
				<div class="bg-info text-white mt-3 p-3">
					<?=$data['deskripsi'];?>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?= base_url('template/dist/') ?>assets/libs/leaflet/leaflet.js"></script>
<script type="text/javascript">
	function addMapPicker() {
		var mapCenter = [<?=$data['lat'] ?>, <?=$data['lng'] ?>];
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