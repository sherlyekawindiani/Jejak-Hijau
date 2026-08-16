<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Artikel extends BaseController
{
    protected $artikelModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->artikelModel  = new ArtikelModel();
        $this->kategoriModel = new KategoriModel();
    }

    // Halaman "Semua Artikel" dengan pagination CodeIgniter 
    public function index()
    {
        $kategoriId = $this->request->getGet('kategori');

        $builder = $this->artikelModel->queryArtikel($kategoriId ? (int) $kategoriId : null);
        $artikel = $builder->paginate(6, 'artikel'); 

        $data = [
            'title'        => 'Semua Artikel',
            'artikel'      => $artikel,
            'pager'        => $this->artikelModel->pager,
            'kategori'     => $this->kategoriModel->findAll(),
            'kategoriAktif'=> $kategoriId ? (int) $kategoriId : null,
        ];

        return view('artikel/index', $data);
    }

    public function detail($id = null)
    {
        $artikel = $this->artikelModel->getDetail((int) $id);

        if (! $artikel) {
            return redirect()->to(base_url('artikel'))->with('error', 'Artikel tidak ditemukan.');
        }

        $data = [
            'title'   => $artikel['judul'],
            'artikel' => $artikel,
            'terkait' => $this->artikelModel->select('artikel.*, kategori.nama_kategori')
                ->join('kategori', 'kategori.id = artikel.kategori_id')
                ->where('artikel.kategori_id', $artikel['kategori_id'])
                ->where('artikel.id !=', $artikel['id'])
                ->orderBy('artikel.tanggal_publikasi', 'DESC')
                ->findAll(3),
        ];

        return view('artikel/detail', $data);
    }
}
