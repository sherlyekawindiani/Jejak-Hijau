<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="section" style="padding-top:48px;">
  <div class="container">
    <span class="eyebrow">Pustaka Cerita</span>
    <h1 style="margin-top:10px;">Semua Artikel</h1>

    <div class="chips" style="margin-top:24px;">
      <a href="<?= base_url('artikel') ?>" class="chip <?= ! $kategoriAktif ? 'active' : '' ?>">Semua</a>
      <?php foreach ($kategori as $k): ?>
        <a href="<?= base_url('artikel?kategori=' . $k['id']) ?>" class="chip <?= $kategoriAktif == $k['id'] ? 'active' : '' ?>">
          <?= esc($k['nama_kategori']) ?>
        </a>
      <?php endforeach; ?>
    </div>

    <div class="grid-artikel" style="margin-top:36px;">
      <?php foreach ($artikel as $a): ?>
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
      <?php if (empty($artikel)): ?>
        <p>Belum ada artikel pada kategori ini.</p>
      <?php endif; ?>
    </div>

    <div class="pagination-wrap">
      <?= $pager->links('artikel', 'pager_custom') ?>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
