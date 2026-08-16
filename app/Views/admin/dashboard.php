<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="stat-grid">
  <div class="stat-card">
    <span class="eyebrow">Total Artikel</span>
    <div class="num"><?= $jumlahArtikel ?></div>
  </div>
  <div class="stat-card">
    <span class="eyebrow">Total Kategori</span>
    <div class="num"><?= $jumlahKategori ?></div>
  </div>
  <div class="stat-card">
    <span class="eyebrow">Artikel Bulan Ini</span>
    <div class="num"><?= count(array_filter($artikelTerbaru, fn($a) => date('m', strtotime($a['created_at'])) === date('m'))) ?></div>
  </div>
</div>

<div class="panel">
  <h2>Artikel Terbaru</h2>
  <table class="data-table">
    <thead>
      <tr>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Penulis</th>
        <th>Tanggal</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($artikelTerbaru as $a): ?>
      <tr>
        <td><?= esc($a['judul']) ?></td>
        <td><span class="badge"><?= esc($a['nama_kategori']) ?></span></td>
        <td><?= esc($a['penulis']) ?></td>
        <td><?= date('d M Y', strtotime($a['tanggal_publikasi'])) ?></td>
      </tr>
      <?php endforeach; ?>
      <?php if (empty($artikelTerbaru)): ?>
      <tr><td colspan="4">Belum ada artikel. <a href="<?= base_url('admin/artikel/tambah') ?>">Tambah artikel pertama</a>.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?= $this->endSection() ?>
