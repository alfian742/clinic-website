<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TenagaMedisModel;

class TenagaMedis extends BaseController
{
    protected $tenagaMedisModel;

    public function __construct()
    {
        $this->tenagaMedisModel = new TenagaMedisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Medical Personnel Data',
            'tenaga_medis' => $this->tenagaMedisModel->orderBy('nama', 'ASC')->findAll()
        ];

        return view('tenaga-medis/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Medical Personnel',
            'tenaga_medis' => $this->tenagaMedisModel->find($id)
        ];

        if (!$data['tenaga_medis']) {
            return redirect()->to('tenaga-medis')->with('error', '<i class="fas fa-circle-xmark"></i>  Data not found');
        }

        return view('tenaga-medis/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Medical Personnel Data',
        ];

        return view('tenaga-medis/create', $data);
    }

    public function save()
    {
        // Validasi form data yang diterima
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => [
                'rules' => 'required|is_unique[tb_tenaga_medis.id]',
                'errors' => [
                    'required' => 'NIP must be filled in.',
                    'is_unique' => 'NIP already exists.'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Patient name must be filled in.',
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Place of birth must be filled in',
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Date of birth must be filled in',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Gender must be selected.',
                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Religion must be selected.',
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Position must be filled in.',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Address must be filled in.',
                ]
            ],
        ]);

        // Cek apakah data yang diterima valid
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('tenaga-medis/create')->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data yang ingin disimpan dari form
        $dataToSave = [
            'id' => $this->request->getVar('id'),
            'nama' => $this->request->getVar('nama'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'jabatan' => $this->request->getVar('jabatan'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telepon' => $this->request->getVar('no_telepon')
        ];

        // Lakukan penyimpanan data
        $saved = $this->tenagaMedisModel->insert($dataToSave);

        // Periksa apakah penyimpanan berhasil
        if ($saved !== false) {
            return redirect()->to('tenaga-medis')->with('success', '<i class="fas fa-circle-check"></i> Data saved successfully');
        } else {
            return redirect()->to('tenaga-medis/create')->with('error', '<i class="fas fa-circle-xmark"></i> Failed to save data');
        }
    }

    public function delete($id)
    {
        if (empty($id)) {
            return redirect()->to('tenaga-medis')->with('error', '<i class="fas fa-circle-xmark"></i> Data not found');
        }

        // Hapus data dengan ID yang diterima
        $deleted = $this->tenagaMedisModel->where('id', $id)->delete();

        // Periksa apakah penghapusan berhasil
        if ($deleted) {
            return redirect()->to('tenaga-medis')->with('success', '<i class="fas fa-circle-check"></i> Data deleted successfully');
        } else {
            return redirect()->to('tenaga-medis')->with('error', '<i class="fas fa-circle-xmark"></i> Failed to delete data');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Medical Personnel Data',
            'tenaga_medis' => $this->tenagaMedisModel->find($id)
        ];

        if (empty($data['tenaga_medis'])) {
            return redirect()->to('tenaga-medis')->with('error', '<i class="fas fa-circle-xmark"></i> Data not found');
        }

        return view('tenaga-medis/edit', $data);
    }

    public function update($id)
    {
        // Validasi form data yang diterima
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIP must be filled in.',
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Medical Personnel Name must be filled in.',
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Place of birth must be filled in',
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Date of birth must be filled in',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Gender must be selected.',
                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Religion must be selected.',
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Position must be filled in.',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Address must be filled in.',
                ]
            ],
        ]);

        // Cek apakah data yang diterima valid
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('tenaga-medis/edit/' . $id)->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data yang ingin diperbarui dari form
        $dataToUpdate = [
            'nama' => $this->request->getVar('nama'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'jabatan' => $this->request->getVar('jabatan'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telepon' => $this->request->getVar('no_telepon')
        ];

        $updated = $this->tenagaMedisModel->update($id, $dataToUpdate);

        // Periksa apakah update berhasil
        if ($updated !== false) {
            return redirect()->to('tenaga-medis')->with('success', '<i class="fas fa-circle-check"></i> Data updated successfully');
        } else {
            return redirect()->to('tenaga-medis/edit/' . $id)->with('error', '<i class="fas fa-circle-xmark"></i> Failed to update data');
        }
    }
}
