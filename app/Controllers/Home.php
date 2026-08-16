<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Home extends BaseController
{
    public function index()
    {
        $artikelModel = new ArtikelModel();

        $data = [
            'title'          => 'Beranda',
            'artikel_utama'  => $artikelModel->getArtikelTerbaru(1)[0] ?? null,
            'artikel_lain'   => array_slice($artikelModel->getArtikelTerbaru(7), 1),
        ];

        return view('home/index', $data);
    }

    public function tentang()
    {
        $kategoriModel = new KategoriModel();

        $data = [
            'title'    => 'Tentang',
            'kategori' => $kategoriModel->findAll(),
        ];

        return view('home/tentang', $data);
    }
}
