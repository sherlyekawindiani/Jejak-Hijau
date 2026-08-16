<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

// =========================================================
// FRONTEND (Pengunjung)
// =========================================================
$routes->get('/', 'Home::index');
$routes->get('artikel', 'Artikel::index');
$routes->get('artikel/(:num)', 'Artikel::detail/$1');
$routes->get('tentang', 'Home::tentang');

// =========================================================
// ADMIN - Auth
// =========================================================
$routes->get('admin/login', 'Auth::login');
$routes->post('admin/login', 'Auth::attempt');
$routes->get('admin/logout', 'Auth::logout');

// =========================================================
// ADMIN (Backend) - dilindungi oleh filter 'auth'
// =========================================================
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');

    $routes->get('artikel', 'Admin\Artikel::index');
    $routes->get('artikel/tambah', 'Admin\Artikel::tambah');
    $routes->post('artikel/simpan', 'Admin\Artikel::simpan');
    $routes->get('artikel/edit/(:num)', 'Admin\Artikel::edit/$1');
    $routes->post('artikel/update/(:num)', 'Admin\Artikel::update/$1');
    $routes->get('artikel/hapus/(:num)', 'Admin\Artikel::hapus/$1');

    // KATEGORI
    $routes->get('kategori', 'Admin\Kategori::index');
    $routes->post('kategori/simpan', 'Admin\Kategori::simpan');
    $routes->get('kategori/edit/(:num)', 'Admin\Kategori::edit/$1');     
    $routes->post('kategori/update/(:num)', 'Admin\Kategori::update/$1'); 
    $routes->get('kategori/hapus/(:num)', 'Admin\Kategori::hapus/$1');
});