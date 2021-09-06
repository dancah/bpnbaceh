<li><a href="<?=site_url('')?>"><i class="mdi mdi-airplay"></i><span>Beranda</span></a></li>
<li class="<?php echo userSession('id')?'':'d-none' ?>"><a href="<?=site_url('user')?>"><i class="mdi mdi-human-child"></i><span>User</span></a></li>
<li><a href="<?=site_url('halaman/profile')?>"><i class="mdi mdi-airplay"></i><span>Profile</span></a></li>
<li class="<?php echo userSession('id')?'':'d-none' ?>"><a href="<?=site_url('user')?>"><i class="mdi mdi-human-child"></i><span>User</span></a></li>
<li>
   <a href="javascript: void(0);" class="has-arrow waves-effect">
      <i class="mdi mdi-flip-horizontal"></i>
      <span>Data Kegiatan</span>
   </a>
   <ul class="sub-menu" aria-expanded="false">
      <li><a href="<?= site_url('halaman/kegiatan') ?>">Tampilkan Kegiatan</a></li>
      <li class="<?php echo userSession('id')?'':'d-none' ?>"><a href="<?= site_url('kegiatan/index/lists') ?>">List Kegiatan</a></li>
   </ul>
</li>
<li>
   <a href="javascript: void(0);" class="has-arrow waves-effect">
      <i class="mdi mdi-checkbox-multiple-blank-outline"></i>
      <span>Gallery</span>
   </a>
   <ul class="sub-menu" aria-expanded="false">
      <li><a href="<?= site_url('halaman/galeri') ?>">Tampilkan Gallery</a></li>
      <li class="<?php echo userSession('id')?'':'d-none' ?>"><a href="<?= site_url('galeri/index/lists') ?>">List Gallery</a></li>
   </ul>
</li>
<li>
   <a href="javascript: void(0);" class="has-arrow waves-effect">
      <i class="mdi mdi-clipboard-list-outline"></i>
      <span>Berita</span>
   </a>
   <ul class="sub-menu" aria-expanded="false">
      <li><a href="<?= site_url('halaman/berita') ?>">Tampilkan Berita</a></li>
      <li class="<?php echo userSession('id')?'':'d-none' ?>"><a href="<?= site_url('berita/index/lists') ?>">List Berita </a></li>
   </ul>
</li>
<li><a href="<?= site_url('halaman/peta') ?>"><i class="mdi mdi-map-marker-outline"></i><span>Peta Lokasi Kegiatan</span></a></li>
