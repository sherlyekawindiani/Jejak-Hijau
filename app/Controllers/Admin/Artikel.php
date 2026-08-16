<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
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

    public function index()
    {

        $keyword = $this->request->getGet('keyword');


        $builder = $this->artikelModel->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id = artikel.kategori_id');

   
        if ($keyword) {
            $builder->groupStart()
                ->like('artikel.judul', $keyword)
                ->orLike('artikel.penulis', $keyword)
            ->groupEnd();
        }

        $data = [
            'title'   => 'Manajemen Artikel',

            'artikel' => $builder->orderBy('artikel.created_at', 'DESC')->paginate(10, 'artikel'),
            'pager'   => $this->artikelModel->pager,
            'keyword' => $keyword, 
        ];

        return view('admin/artikel/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title'    => 'Tambah Artikel',
            'kategori' => $this->kategoriModel->findAll(),
        ];

        return view('admin/artikel/tambah', $data);
    }

    public function simpan()
    {
        $rules = [
            'judul'             => 'required|min_length[10]|max_length[200]',
            'kategori_id'       => 'required|is_natural_no_zero',
            'penulis'           => 'required|min_length[3]|max_length[100]',
            'isi'               => 'required',
            'tanggal_publikasi' => 'required|valid_date',
            'gambar'            => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]',
        ];

        $messages = [
            'judul' => [
                'required'   => 'Judul artikel wajib diisi.',
                'min_length' => 'Judul minimal 10 karakter.',
            ],
            'kategori_id' => [
                'required'           => 'Kategori wajib dipilih.',
                'is_natural_no_zero' => 'Kategori wajib dipilih.',
            ],
            'penulis' => [
                'required'   => 'Nama penulis wajib diisi.',
                'min_length' => 'Penulis minimal 3 karakter.',
            ],
            'isi' => ['required' => 'Isi artikel wajib diisi.'],
            'tanggal_publikasi' => ['required' => 'Tanggal publikasi wajib diisi.'],
            'gambar' => [
                'uploaded'  => 'Gambar artikel wajib diunggah.',
                'is_image'  => 'File yang diunggah harus berupa gambar.',
                'max_size'  => 'Ukuran gambar maksimal 2 MB.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('gambar');
        $namaGambar = $file->getRandomName();
        $file->move(FCPATH . 'uploads/artikel', $namaGambar);

        $judul = $this->request->getPost('judul');

        $this->artikelModel->insert([
            'judul'             => $judul,
            'slug'              => url_title($judul, '-', true),
            'kategori_id'       => $this->request->getPost('kategori_id'),
            'penulis'           => $this->request->getPost('penulis'),
            'isi'               => $this->request->getPost('isi'),
            'gambar'            => 'uploads/artikel/' . $namaGambar,
            'tanggal_publikasi' => $this->request->getPost('tanggal_publikasi'),
        ]);

        return redirect()->to(base_url('admin/artikel'))->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $artikel = $this->artikelModel->find($id);

        if (! $artikel) {
            return redirect()->to(base_url('admin/artikel'))->with('error', 'Artikel tidak ditemukan.');
        }

        $data = [
            'title'    => 'Edit Artikel',
            'artikel'  => $artikel,
            'kategori' => $this->kategoriModel->findAll(),
        ];

        return view('admin/artikel/edit', $data);
    }

    public function update($id)
    {
        $artikel = $this->artikelModel->find($id);
        if (! $artikel) {
            return redirect()->to(base_url('admin/artikel'))->with('error', 'Artikel tidak ditemukan.');
        }

        $rules = [
            'judul'             => 'required|min_length[10]|max_length[200]',
            'kategori_id'       => 'required|is_natural_no_zero',
            'penulis'           => 'required|min_length[3]|max_length[100]',
            'isi'               => 'required',
            'tanggal_publikasi' => 'required|valid_date',
            'gambar'            => 'is_image[gambar]|max_size[gambar,2048]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $judul = $this->request->getPost('judul');
        $dataUpdate = [
            'judul'             => $judul,
            'slug'              => url_title($judul, '-', true),
            'kategori_id'       => $this->request->getPost('kategori_id'),
            'penulis'           => $this->request->getPost('penulis'),
            'isi'               => $this->request->getPost('isi'),
            'tanggal_publikasi' => $this->request->getPost('tanggal_publikasi'),
        ];

        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $namaGambar = $file->getRandomName();
            $file->move(FCPATH . 'uploads/artikel', $namaGambar);
            $dataUpdate['gambar'] = 'uploads/artikel/' . $namaGambar;

            $gambarLama = FCPATH . $artikel['gambar'];
            if ($artikel['gambar'] && is_file($gambarLama)) {
                unlink($gambarLama);
            }
        }

        $this->artikelModel->update($id, $dataUpdate);

        return redirect()->to(base_url('admin/artikel'))->with('success', 'Artikel berhasil diperbarui.');
    }

    public function hapus($id)
    {
        $artikel = $this->artikelModel->find($id);
        if ($artikel) {
            $gambar = FCPATH . $artikel['gambar'];
            if ($artikel['gambar'] && is_file($gambar)) {
                unlink($gambar);
            }
            $this->artikelModel->delete($id);
        }

        return redirect()->to(base_url('admin/artikel'))->with('success', 'Artikel berhasil dihapus.');
    }
}