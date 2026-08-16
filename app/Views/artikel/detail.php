<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="section" style="padding-top:40px;">
  <div class="container" style="max-width:820px;">
    <div class="breadcrumb">
      <a href="<?= base_url('/') ?>">Beranda</a> /
      <a href="<?= base_url('artikel') ?>">Semua Artikel</a> /
      <span><?= esc($artikel['nama_kategori']) ?></span>
    </div>

    <h1 style="margin-top:16px;"><?= esc($artikel['judul']) ?></h1>


    <div class="article-meta" style="display: flex; gap: 20px; align-items: center; margin: 15px 0;">
      <span><i class="fa-solid fa-pen-nib"></i> <?= esc($artikel['penulis']) ?></span>
      <span><i class="fa-regular fa-calendar"></i> <?= date('d F Y', strtotime($artikel['tanggal_publikasi'])) ?></span>
      <span class="kategori" style="text-transform:uppercase;"><i class="fa-solid fa-tag"></i> <?= esc($artikel['nama_kategori']) ?></span>
    </div>

    <div class="detail-hero">
    <?php 
      $gambarUrl = (str_starts_with($artikel['gambar'], 'http://') || str_starts_with($artikel['gambar'], 'https://'))
        ? $artikel['gambar']
        : base_url($artikel['gambar']);
    ?>
    <img src="<?= esc($gambarUrl) ?>" alt="<?= esc($artikel['judul']) ?>">
  </div>

    <div class="prose">
      <?= $artikel['isi'] // konten dari rich text editor, sudah berupa HTML ?>
    </div>

    
    <?php if (! empty($terkait)): ?>
    <div style="margin-top:56px;">
      <span class="eyebrow">Baca Juga</span>
      <h2 style="margin-top:10px;">Artikel Terkait</h2>
      <div class="grid-artikel" style="grid-template-columns:repeat(3,1fr);margin-top:20px;">
        <?php foreach ($terkait as $t): ?>
        
        <?php 
          // Cek apakah gambar dari internet atau lokal
          $gambarTerkait = (str_starts_with($t['gambar'], 'http://') || str_starts_with($t['gambar'], 'https://'))
            ? $t['gambar']
            : base_url($t['gambar']);
        ?>

        <a href="<?= base_url('artikel/' . $t['id']) ?>" class="card-artikel">
          <div class="thumb"><img src="<?= esc($gambarTerkait) ?>" alt="<?= esc($t['judul']) ?>"></div>
          <div class="body">
            <span class="kategori"><?= esc($t['nama_kategori']) ?></span>
            <h3 style="font-size:16px;"><?= esc($t['judul']) ?></h3>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>

  </div>
</section>

<?= $this->endSection() ?>