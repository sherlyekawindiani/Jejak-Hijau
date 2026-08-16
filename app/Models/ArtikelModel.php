<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table            = 'artikel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul', 'slug', 'kategori_id', 'penulis', 'isi', 'gambar', 'tanggal_publikasi',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'judul'             => 'required|min_length[10]|max_length[200]',
        'kategori_id'       => 'required|is_natural_no_zero',
        'penulis'           => 'required|min_length[3]|max_length[100]',
        'isi'               => 'required',
        'tanggal_publikasi' => 'required|valid_date',
    ];

    protected $validationMessages = [
        'judul' => [
            'required'   => 'Judul artikel wajib diisi.',
            'min_length' => 'Judul minimal 10 karakter.',
        ],
        'kategori_id' => [
            'required'          => 'Kategori wajib dipilih.',
            'is_natural_no_zero' => 'Kategori wajib dipilih.',
        ],
        'penulis' => [
            'required'   => 'Nama penulis wajib diisi.',
            'min_length' => 'Penulis minimal 3 karakter.',
        ],
        'isi' => [
            'required' => 'Isi artikel wajib diisi.',
        ],
        'tanggal_publikasi' => [
            'required'   => 'Tanggal publikasi wajib diisi.',
            'valid_date' => 'Format tanggal tidak valid.',
        ],
    ];

  
    public function getArtikelTerbaru(int $limit = 6)
    {
        return $this->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id = artikel.kategori_id')
            ->orderBy('artikel.tanggal_publikasi', 'DESC')
            ->findAll($limit);
    }

    public function queryArtikel(?int $kategoriId = null)
    {
        $builder = $this->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id = artikel.kategori_id')
            ->orderBy('artikel.tanggal_publikasi', 'DESC');

        if ($kategoriId) {
            $builder->where('artikel.kategori_id', $kategoriId);
        }

        return $builder;
    }

    public function getDetail(int $id)
    {
        return $this->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id = artikel.kategori_id')
            ->find($id);
    }
}
