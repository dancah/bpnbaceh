<link rel="stylesheet" type="text/css" href="<?=base_url('template/dist/')?>assets/libs/leaflet/leaflet.css" />
<?php $this->load->view('component/notification'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Peta Lokasi Kegiatan</h4>
				<p class="card-title-dsec">Berikut adalah sebaran lokasi-lokasi kegiatan.</p>
				<div class="p-3">
					<form method="POST" action="<?=site_url('halaman/peta_search')?>">
						<div class="d-flex justify-content-end">
							<div class="form-group">
								<select name="tahun" class="select form-control" onchange="submitForm()" data-placeholder="Tahun Kegiatan">
									<option value="0">Semua Tahun</option>
									<?php 
									foreach($tahun as $data) { 
										echo '<option value="'.$data['tahun'].'" '.($data['tahun']==$search['tahun']?'selected':'').'>'.$data['tahun'].'</option>';
									}
									?>
								</select>	
							</div>
						</div>
					</form>
				</div>
				<div id="map"></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?= base_url('template/dist/') ?>assets/libs/leaflet/leaflet.js"></script>
<script type="text/javascript">
	function addMapPicker() {
		var map = L.map('map', {
			center: [4.9, 96.30],
			zoom: 9,
			scrollWheelZoom: false,
			layers: new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
		});
		var LeafIcon = L.Icon.extend({
            options: {
                iconSize: [24, 24]
            }
        });
        var markerIcon = new LeafIcon({
        	iconUrl: '<?=base_url("template/dist/assets/images/marker.png")?>'
        });

		var map_data = <?= $map_data ?>;
       	for (var i = 0; i < map_data.length; i++) {
            marker = new L.marker(
            	[map_data[i][1], map_data[i][2]], 
            	{ 
            		title: map_data[i][0],
            		icon: markerIcon
            	},
            )
            .bindPopup(map_data[i][3])
            .addTo(map);
            //
            marker.on('mouseover', function (e) {
                this.openPopup();
            });
            marker.on('mouseout', function (e) {
                this.closePopup();
            });
        }
	}

	function submitForm() {
		$('form').submit();
	}

	$(document).ready(function() {
		addMapPicker();
		$('.select').select2();
	});
</script>
<style>
	#map {
	    width : 100%;
	    height : 600px;
	}
	.peta-info {
		width: 300px;
	}
 </style>