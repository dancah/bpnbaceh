<div class="main-content">
	<div class="page-content">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-flex align-items-center justify-content-between">
					<h4 class="page-title mb-0 font-size-18"><?= $title ?></h4>
					<div class="page-title-right">
						<?php if ($breadcrumb) { ?>
						<ol class="breadcrumb m-0">
						<?php foreach ($breadcrumb as $url => $text) { ?>
							<li class="breadcrumb-item"><a href="<?= site_url($url) ?>"><?= $text ?></a></li>
						<?php } ?>
						</ol>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
