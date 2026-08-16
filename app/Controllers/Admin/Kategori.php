<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function index()
    {
        $model = new KategoriModel();

        $data = [
            'title'    => 'Kategori',
            'kategori' => $model->orderBy('nama_kategori', 'ASC')->findAll(),
        ];

        return view('admin/kategori/index', $data);
    }

    public function simpan()
    {
        $model = new KategoriModel();

        if (! $this->validate($model->validationRules, $model->validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->insert(['nama_kategori' => $this->request->getPost('nama_kategori')]);

        return redirect()->to(base_url('admin/kategori'))->with('success', 'Kategori berhasil ditambahkan.');
    }

    // METHOD EDIT (MENAMPILKAN DATA KE FORM EDIT)
    public function edit($id)
    {
        $model = new KategoriModel();
        $kategoriEdit = $model->find($id);

        if (! $kategoriEdit) {
            return redirect()->to(base_url('admin/kategori'));
        }

        $data = [
            'title'        => 'Edit Kategori',
            'kategori'     => $model->orderBy('nama_kategori', 'ASC')->findAll(),
            'kategoriEdit' => $kategoriEdit, // Data yang dipanggil ke form
        ];

        return view('admin/kategori/index', $data);
    }

    // METHOD UPDATE (PROSES MENYIMPAN PERUBAHAN)
    public function update($id)
    {
        $model = new KategoriModel();

        if (! $this->validate($model->validationRules, $model->validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()->to(base_url('admin/kategori'))->with('success', 'Kategori berhasil diperbarui.');
    }

    public function hapus($id)
    {
        $model = new KategoriModel();
        $model->delete($id);

        return redirect()->to(base_url('admin/kategori'))->with('success', 'Kategori berhasil dihapus.');
    }
}