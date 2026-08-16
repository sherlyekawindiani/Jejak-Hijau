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

<div class="form-row" style="align-items:start;">
  <!-- PANEL FORM -->
  <div class="panel">
    <h2><?= isset($kategoriEdit) ? 'Edit Kategori' : 'Tambah Kategori' ?></h2>

    <?php if (session()->getFlashdata('errors')): ?>
      <div class="alert alert-error">
        <?php foreach (session()->getFlashdata('errors') as $err): ?>
          <div><?= esc($err) ?></div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form action="<?= isset($kategoriEdit) ? base_url('admin/kategori/update/' . $kategoriEdit['id']) : base_url('admin/kategori/simpan') ?>" method="post" autocomplete="off">
      <?= csrf_field() ?>
      <div class="form-group">
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" 
               id="nama_kategori" 
               name="nama_kategori" 
               class="form-control" 
               placeholder="Contoh: Perkemahan" 
               value="<?= esc(old('nama_kategori', $kategoriEdit['nama_kategori'] ?? '')) ?>" 
               required 
               autocomplete="off">
      </div>

      <div style="display:flex; gap:8px;">
        <button type="submit" class="btn btn-primary">
          <?= isset($kategoriEdit) ? 'Perbarui Kategori' : 'Simpan Kategori' ?>
        </button>
        
        <?php if (isset($kategoriEdit)): ?>
          <a href="<?= base_url('admin/kategori') ?>" class="btn btn-outline" style="text-decoration:none;">Batal</a>
        <?php endif; ?>
      </div>
    </form>
  </div>

  <!-- PANEL DAFTAR TABEL -->
  <div class="panel">
    <h2>Daftar Kategori</h2>
    <table class="data-table">
      <thead>
        <tr>
          <th>Nama Kategori</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($kategori as $k): ?>
        <tr>
          <td><?= esc($k['nama_kategori']) ?></td>
          <td style="white-space: nowrap;">
            <!-- Tombol Edit -->
            <a href="<?= base_url('admin/kategori/edit/' . $k['id']) ?>" class="btn btn-outline btn-sm">Edit</a>
            
            <!-- Tombol Hapus -->
            <a href="<?= base_url('admin/kategori/hapus/' . $k['id']) ?>" class="btn btn-danger btn-sm"
               onclick="return confirm('Hapus kategori ini? Artikel dengan kategori ini akan gagal dihapus jika masih terkait.');">Hapus</a>
          </td>
        </tr>
        <?php endforeach; ?>

        <?php if (empty($kategori)): ?>
          <tr><td colspan="2">Belum ada kategori.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>