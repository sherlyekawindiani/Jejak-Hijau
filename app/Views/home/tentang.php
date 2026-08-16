<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="section">
  <div class="container" style="max-width:820px;">
    <span class="eyebrow">Tentang Kami</span>
    <h1 style="margin-top:10px;">Jejak Hijau <br> Teman menyusuri alam Indonesia.</h1>
    <p class="prose" style="margin-top:18px;">
      Jejak Hijau adalah portal informasi wisata alam yang menghimpun cerita, tips, dan dokumentasi
      perjalanan dari berbagai penjuru Nusantara. Mulai dari jalur pendakian gunung, garis pantai,
      gemuruh air terjun, rimbunnya hutan konservasi, hingga tenangnya danau.
      Situs ini dibangun sebagai proyek Ujian Akhir Semester mata kuliah Pemrograman Web II
      menggunakan framework CodeIgniter dengan pola MVC.
    </p>

    <div class="chips" style="margin-top:32px;">
      <?php foreach ($kategori as $k): ?>
        <span class="chip"><?= esc($k['nama_kategori']) ?></span>
      <?php endforeach; ?>
    </div>

    <a href="<?= base_url('artikel') ?>" class="btn btn-primary" style="margin-top:8px;">Lihat Semua Artikel &rarr;</a>
  </div>
</section>

<?= $this->endSection() ?>
