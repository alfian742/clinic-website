<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasienModel;

class Pasien extends BaseController
{
    protected $pasienModel;

    public function __construct()
    {
        $this->pasienModel = new PasienModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Patients Data',
            'pasien' => $this->pasienModel->orderBy('nama', 'ASC')->findAll()
        ];

        return view('pasien/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Patient',
            'pasien' => $this->pasienModel->find($id)
        ];

        if (!$data['pasien']) {
            // Handle jika data dengan NIK yang diberikan tidak ditemukan
            return redirect()->to('pasien')->with('error', '<i class="fas fa-circle-xmark"></i> Data not found');
        }

        return view('pasien/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Patient Data',
        ];

        return view('pasien/create', $data);
    }

    public function save()
    {
        // Validasi form data yang diterima
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => [
                'rules' => 'required|is_unique[tb_pasien.id]',
                'errors' => [
                    'required' => 'NIK must be filled in.',
                    'is_unique' => 'NIK already exists.'
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
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Occupation must be filled in.',
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
            return redirect()->to('pasien/create')->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data yang ingin disimpan dari form
        $dataToSave = [
            'id' => $this->request->getVar('id'),
            'nama' => $this->request->getVar('nama'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telepon' => $this->request->getVar('no_telepon')
        ];

        // Lakukan penyimpanan data
        $saved = $this->pasienModel->insert($dataToSave);

        // Periksa apakah penyimpanan berhasil
        if ($saved !== false) {
            return redirect()->to('pasien')->with('success', '<i class="fas fa-circle-check"></i> Data saved successfully');
        } else {
            return redirect()->to('pasien/create')->with('error', '<i class="fas fa-circle-xmark"></i> Failed to save data');
        }
    }

    public function delete($id)
    {
        if (empty($id)) {
            return redirect()->to('pasien')->with('error', '<i class="fas fa-circle-xmark"></i> Data not found');
        }

        // Hapus data dengan ID yang diterima
        $deleted = $this->pasienModel->where('id', $id)->delete();

        // Periksa apakah penghapusan berhasil
        if ($deleted) {
            return redirect()->to('pasien')->with('success', '<i class="fas fa-circle-check"></i> Data deleted successfully');
        } else {
            return redirect()->to('pasien')->with('error', '<i class="fas fa-circle-xmark"></i> Failed to delete data');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Patient Data',
            'pasien' => $this->pasienModel->find($id)
        ];

        if (empty($data['pasien'])) {
            return redirect()->to('pasien')->with('error', '<i class="fas fa-circle-xmark"></i> Data not found');
        }

        return view('pasien/edit', $data);
    }

    public function update($id)
    {
        // Validasi form data yang diterima
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK must be filled in.',
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
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Occupation must be filled in.',
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
            return redirect()->to('pasien/edit/' . $id)->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data yang ingin diperbarui dari form
        $dataToUpdate = [
            'nama' => $this->request->getVar('nama'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telepon' => $this->request->getVar('no_telepon')
        ];

        $updated = $this->pasienModel->update($id, $dataToUpdate);

        // Periksa apakah update berhasil
        if ($updated !== false) {
            return redirect()->to('pasien')->with('success', '<i class="fas fa-circle-check"></i> Data updated successfully');
        } else {
            return redirect()->to('pasien/edit/' . $id)->with('error', '<i class="fas fa-circle-xmark"></i> Failed to update data');
        }
    }
}
