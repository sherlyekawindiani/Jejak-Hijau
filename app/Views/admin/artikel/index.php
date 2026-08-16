<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<style>
  .btn-outline:hover {
    background-color: #1e4d3b !important;
    color: #ffffff !important;
    border-color: #1e4d3b !important;
    transition: all 0.2s ease-in-out;
  }
</style>

<div class="panel">
  <!-- HEADER & TOMBOL TAMBAH -->
  <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; flex-wrap:wrap; gap:12px;">
    <h2 style="margin:0;">Daftar Artikel</h2>
    <a href="<?= base_url('admin/artikel/tambah') ?>" class="btn btn-primary">+ Tambah Artikel</a>
  </div>

  <!-- FORM PENCARIAN (SEARCH) -->
  <form action="<?= base_url('admin/artikel') ?>" method="get" style="margin-bottom: 20px;">
    <div style="display: flex; gap: 8px; max-width: 400px;">
      <input type="text" 
             name="keyword" 
             class="form-control" 
             placeholder="Cari judul atau penulis..." 
             value="<?= esc($keyword ?? '') ?>" 
             style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 6px; flex: 1;">
      <button type="submit" class="btn btn-primary" style="padding: 8px 16px;">Cari</button>
      
      <?php if (!empty($keyword)): ?>
        <a href="<?= base_url('admin/artikel') ?>" class="btn btn-outline" style="padding: 8px 12px; text-decoration: none;">Reset</a>
      <?php endif; ?>
    </div>
  </form>

  <!-- TABEL ARTIKEL -->
  <table class="data-table">
    <thead>
      <tr>
        <th>Gambar</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Penulis</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($artikel as $a): ?>
      <?php 
        $gambarAdmin = (str_starts_with($a['gambar'], 'http://') || str_starts_with($a['gambar'], 'https://')) 
          ? $a['gambar'] 
          : base_url($a['gambar']);
      ?>
      <tr>
        <td><img class="thumb-sm" src="<?= esc($gambarAdmin) ?>" alt=""></td>
        <td><?= esc($a['judul']) ?></td>
        <td><span class="badge" style="white-space: nowrap;"><?= esc($a['nama_kategori']) ?></span></td>
        <td><?= esc($a['penulis']) ?></td>
        <td><?= date('d M Y', strtotime($a['tanggal_publikasi'])) ?></td>
       <td style="display: flex; gap: 6px; align-items: center;">
          <a href="<?= base_url('admin/artikel/edit/' . $a['id']) ?>" class="btn btn-outline btn-sm">Edit</a>
          <a href="<?= base_url('admin/artikel/hapus/' . $a['id']) ?>" class="btn btn-danger btn-sm"
            onclick="return confirm('Hapus artikel ini?');">Hapus</a>
      </td>
        
      </tr>
      <?php endforeach; ?>
      <?php if (empty($artikel)): ?>
        <tr><td colspan="6" style="text-align:center; padding: 20px; color: #666;">Data artikel tidak ditemukan.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>

  <!-- PAGINATION -->
  <div class="pagination-wrap" style="margin-top:20px;">
    <?= $pager->links('artikel', 'pager_custom') ?>
  </div>
</div>

<?= $this->endSection() ?>