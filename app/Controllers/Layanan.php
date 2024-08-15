<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NamaPelayananModel;

class Layanan extends BaseController
{
    private $namaLayananModel;

    public function __construct()
    {
        $this->namaLayananModel = new NamaPelayananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Medical Services',
            'layanan' => $this->namaLayananModel->orderBy('nama_pelayanan', 'ASC')->findAll()
        ];

        return view('layanan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Medical Service',
        ];

        return view('layanan/create', $data);
    }

    public function save()
    {
        // Validasi form data yang diterima
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_pelayanan' => [
                'rules' => 'required|is_unique[tb_nama_pelayanan.nama_pelayanan]',
                'errors' => [
                    'required' => 'Name of medical service must be filled in.',
                    'is_unique' => 'Name of medical service already exists.',
                ]
            ],
            'biaya' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Cost must be filled in.',
                ]
            ],
        ]);

        // Cek apakah data yang diterima valid
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('layanan/create')->withInput()->with('errors', $validation->getErrors());
        }

        // Jika validasi sukses, simpan data ke dalam database
        $data = [
            'nama_pelayanan' => $this->request->getPost('nama_pelayanan'),
            'biaya' => $this->request->getPost('biaya')
        ];

        // Lakukan penyimpanan data
        $saved = $this->namaLayananModel->insert($data);

        // Periksa apakah penyimpanan berhasil
        if ($saved !== false) {
            return redirect()->to('layanan')->with('success', '<i class="fas fa-circle-check"></i> Data saved successfully');
        } else {
            return redirect()->to('layanan/create')->with('error', '<i class="fas fa-circle-xmark"></i> Failed to save data');
        }
    }

    public function delete($id)
    {
        if (empty($id)) {
            return redirect()->to('layanan')->with('error', '<i class="fas fa-circle-xmark"></i> Data not found');
        }

        // Hapus data dengan ID yang diterima
        $deleted = $this->namaLayananModel->where('id', $id)->delete();

        // Periksa apakah penghapusan berhasil
        if ($deleted) {
            return redirect()->to('layanan')->with('success', '<i class="fas fa-circle-check"></i> Data deleted successfully');
        } else {
            return redirect()->to('layanan')->with('error', '<i class="fas fa-circle-xmark"></i> Failed to delete data');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Medical Service',
            'layanan' => $this->namaLayananModel->find($id)
        ];

        if (empty($data['layanan'])) {
            return redirect()->to('layanan')->with('error', '<i class="fas fa-circle-xmark"></i> Data not found');
        }

        return view('layanan/edit', $data);
    }

    public function update($id)
    {
        $namaPelayananLama = $this->request->getVar('nama_pelayanan');
        $namaPelayananBaru = $this->namaLayananModel->find($id)['nama_pelayanan'];

        if ($namaPelayananLama === $namaPelayananBaru) {
            $namaPelayananRule = 'required';
        } else {
            $namaPelayananRule = 'required|is_unique[tb_nama_pelayanan.nama_pelayanan,id,' . $id . ']';
        }

        // Validasi form data yang diterima
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_pelayanan' => [
                'rules' => $namaPelayananRule,
                'errors' => [
                    'required' => 'Name of medical service must be filled in.',
                    'is_unique' => 'Name of medical service already exists.',
                ]
            ],
            'biaya' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Cost must be filled in.',
                ]
            ],
        ]);

        // Cek apakah data yang diterima valid
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('layanan/edit/' . $id)->withInput()->with('errors', $validation->getErrors());
        }

        // Jika validasi sukses, update data ke dalam database
        $data = [
            'nama_pelayanan' => $this->request->getPost('nama_pelayanan'),
            'biaya' => $this->request->getPost('biaya')
        ];

        $updated = $this->namaLayananModel->update($id, $data);

        // Periksa apakah update berhasil
        if ($updated !== false) {
            return redirect()->to('layanan')->with('success', '<i class="fas fa-circle-check"></i> Data updated successfully');
        } else {
            return redirect()->to('layanan/edit/' . $id)->with('error', '<i class="fas fa-circle-xmark"></i> Failed to update data');
        }
    }
}
