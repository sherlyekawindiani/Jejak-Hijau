<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="hero">
  <svg class="contour-bg" viewBox="0 0 1140 500" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M-50 420 Q 260 340 560 400 T 1200 380" stroke="#4FA875" stroke-width="1.4" fill="none"/>
    <path d="M-50 460 Q 260 380 560 440 T 1200 420" stroke="#4FA875" stroke-width="1.4" fill="none"/>
    <path d="M-50 500 Q 260 420 560 480 T 1200 460" stroke="#4FA875" stroke-width="1.4" fill="none"/>
  </svg>
  <div class="container">
    <div>
      <span class="eyebrow">Portal Wisata Alam Nusantara</span>
      <h1>Jelajahi jejak alam yang belum banyak dikisahkan.</h1>
      <p class="lead">Temukan cerita, panduan, dan inspirasi dari berbagai perjalanan menjelajahi alam Nusantara.</p>
      <a href="<?= base_url('artikel') ?>" class="btn btn-primary">Mulai Jelajahi &rarr;</a>
      
    </div>
    <?php if ($artikel_utama): ?>
    <a href="<?= base_url('artikel/' . $artikel_utama['id']) ?>" class="hero-media">
      <img src="<?= esc($artikel_utama['gambar']) ?>" alt="<?= esc($artikel_utama['judul']) ?>">
      <span class="tag"><?= esc($artikel_utama['nama_kategori']) ?></span>
    </a>
    <?php endif; ?>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head">
      <div>
        <span class="eyebrow">Cerita Terbaru</span>
        <h2 style="margin-top:8px;">Artikel yang baru dipublikasikan</h2>
      </div>
      <a href="<?= base_url('artikel') ?>" class="btn btn-outline">Semua Artikel</a>
    </div>

    <div class="grid-artikel">
      <?php foreach ($artikel_lain as $a): ?>
      <a href="<?= base_url('artikel/' . $a['id']) ?>" class="card-artikel">
        <div class="thumb"><img src="<?= esc($a['gambar']) ?>" alt="<?= esc($a['judul']) ?>"></div>
        <div class="body">
          <span class="kategori"><?= esc($a['nama_kategori']) ?></span>
          <h3><?= esc($a['judul']) ?></h3>
          <div class="meta">
            <span><?= esc($a['penulis']) ?></span>
            <span><?= date('d M Y', strtotime($a['tanggal_publikasi'])) ?></span>
          </div>
        </div>
      </a>
      <?php endforeach; ?>
      <?php if (empty($artikel_lain)): ?>
        <p>Belum ada artikel lain. Tambahkan artikel dari halaman admin.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
