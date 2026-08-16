<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Beranda') ?> — Jejak Hijau</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<nav class="navbar">
  <div class="container">
    <a href="<?= base_url('/') ?>" class="brand">
      <svg class="mark" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 2C9 9 5 15 5 20a11 11 0 0 0 22 0c0-5-4-11-11-18Z" fill="#4FA875"/>
        <path d="M16 8c-4 4.5-6.5 8.5-6.5 12A6.5 6.5 0 0 0 16 26" stroke="#122A21" stroke-width="1.3" fill="none" stroke-linecap="round"/>
      </svg>
      Jejak Hijau
    </a>
    <ul class="nav-links">
      <li><a href="<?= base_url('/') ?>" class="<?= uri_string() === '' ? 'active' : '' ?>">Beranda</a></li>
      <li><a href="<?= base_url('artikel') ?>" class="<?= strpos(uri_string(), 'artikel') === 0 ? 'active' : '' ?>">Semua Artikel</a></li>
      <li><a href="<?= base_url('tentang') ?>" class="<?= uri_string() === 'tentang' ? 'active' : '' ?>">Tentang</a></li>
    </ul>
    <?php if (session()->get('isLoggedIn')) : ?>
        <!-- Guest tidak akan melihat tombol ini. Tombol baru muncul setelah Admin berhasil login -->
        <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-outline">Dashboard Admin</a>
    <?php endif; ?>
   
  </div>
</nav>

<?php if (session()->getFlashdata('error')): ?>
  <div class="container" style="margin-top:20px;">
    <div class="alert alert-error"><?= esc(session()->getFlashdata('error')) ?></div>
  </div>
<?php endif; ?>

<?= $this->renderSection('content') ?>

<footer class="site-footer">
  <div class="container">
    <div class="cols">
      <div>
        <div class="brand">Jejak Hijau</div>
        <p style="max-width:32ch;color:#9FB6A9;font-size:14px;margin-top:12px;">
          Portal informasi wisata alam gunung, pantai, air terjun, hutan, dan danau di seluruh Nusantara.
        </p>
      </div>
      <div>
        <p style="color:#fff;font-weight:600;margin-bottom:12px;">Navigasi</p>
        <p><a href="<?= base_url('/') ?>">Beranda</a></p>
        <p><a href="<?= base_url('artikel') ?>">Semua Artikel</a></p>
        <p><a href="<?= base_url('tentang') ?>">Tentang</a></p>
      </div>
      <div>
        <p style="color:#fff;font-weight:600;margin-bottom:12px;">Untuk Pengelola</p>
        <p><a href="<?= base_url('admin/login') ?>">Login Admin</a></p>
      </div>
    </div>
    <div class="bottom">
      <span>&copy; <?= date('Y') ?> Jejak Hijau</span>
      <span>Dibangun dengan CodeIgniter</span>
    </div>
  </div>
</footer>

</body>
</html>
