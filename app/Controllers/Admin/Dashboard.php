<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $artikelModel  = new ArtikelModel();
        $kategoriModel = new KategoriModel();

        $data = [
            'title'           => 'Dashboard',
            'jumlahArtikel'   => $artikelModel->countAll(),
            'jumlahKategori'  => $kategoriModel->countAll(),
          
            'artikelBulanIni' => $artikelModel->where('MONTH(tanggal_publikasi)', date('m'))
                                               ->where('YEAR(tanggal_publikasi)', date('Y'))
                                               ->countAllResults(),

            'artikelTerbaru'  => $artikelModel->select('artikel.*, kategori.nama_kategori')
                ->join('kategori', 'kategori.id = artikel.kategori_id')
                ->orderBy('artikel.tanggal_publikasi', 'DESC')
                ->findAll(5),
        ];

        return view('admin/dashboard', $data);
    }
}