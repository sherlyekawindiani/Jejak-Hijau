<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= esc($title ?? 'Admin') ?> — Jejak Hijau Admin</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
<?= $this->renderSection('head') ?>
</head>
<body>

<div class="admin-shell">
  <aside class="sidebar">
    <div class="brand">
      <svg width="26" height="26" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 2C9 9 5 15 5 20a11 11 0 0 0 22 0c0-5-4-11-11-18Z" fill="#4FA875"/>
      </svg>
      Jejak Hijau
      <small>Admin Panel</small>
    </div>

    <nav class="sidebar-nav">
      <a href="<?= base_url('admin/dashboard') ?>" class="<?= uri_string() === 'admin/dashboard' || uri_string() === 'admin' ? 'active' : '' ?>">
        <span class="icon">&#9635;</span> Dashboard
      </a>
      <a href="<?= base_url('admin/artikel') ?>" class="<?= strpos(uri_string(), 'admin/artikel') === 0 ? 'active' : '' ?>">
        <span class="icon">&#9998;</span> Manajemen Artikel
      </a>
      <a href="<?= base_url('admin/kategori') ?>" class="<?= strpos(uri_string(), 'admin/kategori') === 0 ? 'active' : '' ?>">
        <span class="icon">&#9776;</span> Kategori
      </a>
      <a href="<?= base_url('/') ?>" target="_blank">
        <span class="icon">&#8599;</span> Lihat Situs
      </a>
    </nav>

    <div class="sidebar-foot">
      <div class="who">&#128100; <?= esc(session()->get('admin_nama') ?? 'Admin') ?></div>
      <a href="<?= base_url('admin/logout') ?>" class="logout">&#10148; Logout</a>
    </div>
  </aside>

  <main class="admin-main">
    <div class="admin-topbar">
      <h1><?= esc($title ?? 'Dashboard') ?></h1>
    </div>
    <div class="admin-content">
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error"><?= esc(session()->getFlashdata('error')) ?></div>
      <?php endif; ?>

      <?= $this->renderSection('content') ?>
    </div>
  </main>
</div>

<?= $this->renderSection('scripts') ?>
</body>
</html>
