<?= $this->extend('layouts/admin') ?>

<?= $this->section('head') ?>
<link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="panel">
  <h2>Tambah Artikel Baru</h2>

  <?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-error">
      <ul style="margin:0;padding-left:18px;">
        <?php foreach (session()->getFlashdata('errors') as $err): ?>
          <li><?= esc($err) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form action="<?= base_url('admin/artikel/simpan') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="form-group">
      <label for="judul">Judul Artikel</label>
      <input type="text" id="judul" name="judul" class="form-control" value="<?= esc(old('judul')) ?>" required>
      <p class="hint">Minimal 10 karakter.</p>
    </div>

    <div class="form-row">
      <div class="form-group">
        <label for="kategori_id">Kategori</label>
        <select id="kategori_id" name="kategori_id" class="form-control" required>
          <option value="">-- Pilih Kategori --</option>
          <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id'] ?>" <?= old('kategori_id') == $k['id'] ? 'selected' : '' ?>>
              <?= esc($k['nama_kategori']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="penulis">Penulis</label>
        <input type="text" id="penulis" name="penulis" class="form-control" value="<?= esc(old('penulis')) ?>" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group">
        <label for="tanggal_publikasi">Tanggal Publikasi</label>
        <input type="date" id="tanggal_publikasi" name="tanggal_publikasi" class="form-control"
               value="<?= esc(old('tanggal_publikasi') ?: date('Y-m-d')) ?>" required>
      </div>
      <div class="form-group">
        <label for="gambar">Gambar Artikel</label>
        <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*" required>
        <p class="hint">Format JPG/PNG, maksimal 2 MB.</p>
      </div>
    </div>

    <div class="form-group">
      <label>Isi Artikel</label>
      <div id="editor-container" style="background:#fff;"></div>
      <input type="hidden" name="isi" id="isi">
    </div>

    <div style="display:flex;gap:12px;margin-top:24px;">
      <button type="submit" class="btn btn-primary">Simpan Artikel</button>
      <a href="<?= base_url('admin/artikel') ?>" class="btn btn-outline">Batal</a>
    </div>
  </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.js"></script>
<script>
  var quill = new Quill('#editor-container', {
    theme: 'snow',
    placeholder: 'Tulis isi artikel di sini...',
    modules: {
      toolbar: [
        [{ header: [2, 3, false] }],
        ['bold', 'italic', 'underline'],
        [{ list: 'ordered' }, { list: 'bullet' }],
        ['link'],
        ['clean']
      ]
    }
  });

  var form = document.querySelector('form');
  form.addEventListener('submit', function () {
    document.getElementById('isi').value = quill.root.innerHTML;
  });
</script>
<?= $this->endSection() ?>
