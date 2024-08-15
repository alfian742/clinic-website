<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisPelayananModel;
use App\Models\NamaPelayananModel;
use App\Models\PasienModel;
use App\Models\TenagaMedisModel;
use App\Models\MasterModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Master extends BaseController
{
    protected $jenisPelayananModel;
    protected $namaPelayananModel;
    protected $pasienModel;
    protected $tenagaMedisModel;
    protected $masterModel;

    public function __construct()
    {
        $this->jenisPelayananModel  = new JenisPelayananModel();
        $this->namaPelayananModel   = new NamaPelayananModel();
        $this->pasienModel          = new PasienModel();
        $this->tenagaMedisModel     = new TenagaMedisModel();
        $this->masterModel          = new MasterModel();
    }

    public function index()
    {
        $query = $this->masterModel
            ->select('tb_master.id,
                  tb_master.no_bpjs,
                  tb_master.created_at,
                  tb_master.updated_at,
                  tb_pasien.id AS nik,
                  tb_pasien.nama AS nama_pasien,
                  tb_pasien.tempat_lahir AS tempat_lahir_pasien,
                  tb_pasien.tanggal_lahir AS tanggal_lahir_pasien,
                  tb_pasien.jenis_kelamin AS jenis_kelamin_pasien,
                  tb_pasien.agama AS agama_pasien,
                  tb_pasien.pekerjaan,
                  tb_pasien.alamat AS alamat_pasien,
                  tb_pasien.no_telepon AS no_telepon_pasien,
                  tb_tenaga_medis.id AS nip,
                  tb_tenaga_medis.nama AS nama_tenaga_medis,
                  tb_tenaga_medis.tempat_lahir AS tempat_lahir_tenaga_medis,
                  tb_tenaga_medis.tanggal_lahir AS tanggal_lahir_tenaga_medis,
                  tb_tenaga_medis.jenis_kelamin AS jenis_kelamin_tenaga_medis,
                  tb_tenaga_medis.agama AS agama_tenaga_medis,
                  tb_tenaga_medis.jabatan,
                  tb_tenaga_medis.alamat AS alamat_tenaga_medis,
                  tb_tenaga_medis.no_telepon AS no_telepon_tenaga_medis,
                  tb_nama_pelayanan.nama_pelayanan,
                  tb_nama_pelayanan.biaya, 
                  tb_jenis_pelayanan.jenis_pelayanan')
            ->join('tb_pasien', 'tb_pasien.id = tb_master.id_pasien')
            ->join('tb_tenaga_medis', 'tb_tenaga_medis.id = tb_master.id_tenaga_medis')
            ->join('tb_nama_pelayanan', 'tb_nama_pelayanan.id = tb_master.id_nama_pelayanan')
            ->join('tb_jenis_pelayanan', 'tb_jenis_pelayanan.id = tb_master.id_jenis_pelayanan')
            ->orderBy('tb_master.created_at', 'DESC')
            ->findAll();

        $data = [
            'title' => 'Medical Records',
            'master' => $query
        ];

        return view('master/index', $data);
    }

    public function detail($id)
    {
        $query = $this->masterModel
            ->select('tb_master.id,
                  tb_master.no_bpjs,
                  tb_master.created_at,
                  tb_master.updated_at,
                  tb_pasien.id AS nik,
                  tb_pasien.nama AS nama_pasien,
                  tb_pasien.tempat_lahir AS tempat_lahir_pasien,
                  tb_pasien.tanggal_lahir AS tanggal_lahir_pasien,
                  tb_pasien.jenis_kelamin AS jenis_kelamin_pasien,
                  tb_pasien.agama AS agama_pasien,
                  tb_pasien.pekerjaan,
                  tb_pasien.alamat AS alamat_pasien,
                  tb_pasien.no_telepon AS no_telepon_pasien,
                  tb_tenaga_medis.id AS nip,
                  tb_tenaga_medis.nama AS nama_tenaga_medis,
                  tb_tenaga_medis.tempat_lahir AS tempat_lahir_tenaga_medis,
                  tb_tenaga_medis.tanggal_lahir AS tanggal_lahir_tenaga_medis,
                  tb_tenaga_medis.jenis_kelamin AS jenis_kelamin_tenaga_medis,
                  tb_tenaga_medis.agama AS agama_tenaga_medis,
                  tb_tenaga_medis.jabatan,
                  tb_tenaga_medis.alamat AS alamat_tenaga_medis,
                  tb_tenaga_medis.no_telepon AS no_telepon_tenaga_medis,
                  tb_nama_pelayanan.nama_pelayanan,
                  tb_nama_pelayanan.biaya, 
                  tb_jenis_pelayanan.jenis_pelayanan')
            ->join('tb_pasien', 'tb_pasien.id = tb_master.id_pasien')
            ->join('tb_tenaga_medis', 'tb_tenaga_medis.id = tb_master.id_tenaga_medis')
            ->join('tb_nama_pelayanan', 'tb_nama_pelayanan.id = tb_master.id_nama_pelayanan')
            ->join('tb_jenis_pelayanan', 'tb_jenis_pelayanan.id = tb_master.id_jenis_pelayanan')
            ->where('tb_master.id', $id)
            ->first();

        $data = [
            'title' => 'Detail Medical Record',
            'master' => $query
        ];

        if (!$data['master']) {
            // Handle jika data dengan ID yang diberikan tidak ditemukan
            return redirect()->to('master')->with('error', '<i class="fas fa-circle-xmark"></i> Data not found');
        }

        return view('master/detail', $data);
    }

    public function print($id)
    {
        $query = $this->masterModel
            ->select('tb_master.id,
                  tb_master.no_bpjs,
                  tb_master.created_at,
                  tb_master.updated_at,
                  tb_pasien.id AS nik,
                  tb_pasien.nama AS nama_pasien,
                  tb_pasien.tempat_lahir AS tempat_lahir_pasien,
                  tb_pasien.tanggal_lahir AS tanggal_lahir_pasien,
                  tb_pasien.jenis_kelamin AS jenis_kelamin_pasien,
                  tb_pasien.agama AS agama_pasien,
                  tb_pasien.pekerjaan,
                  tb_pasien.alamat AS alamat_pasien,
                  tb_pasien.no_telepon AS no_telepon_pasien,
                  tb_tenaga_medis.id AS nip,
                  tb_tenaga_medis.nama AS nama_tenaga_medis,
                  tb_tenaga_medis.tempat_lahir AS tempat_lahir_tenaga_medis,
                  tb_tenaga_medis.tanggal_lahir AS tanggal_lahir_tenaga_medis,
                  tb_tenaga_medis.jenis_kelamin AS jenis_kelamin_tenaga_medis,
                  tb_tenaga_medis.agama AS agama_tenaga_medis,
                  tb_tenaga_medis.jabatan,
                  tb_tenaga_medis.alamat AS alamat_tenaga_medis,
                  tb_tenaga_medis.no_telepon AS no_telepon_tenaga_medis,
                  tb_nama_pelayanan.nama_pelayanan,
                  tb_nama_pelayanan.biaya, 
                  tb_jenis_pelayanan.jenis_pelayanan')
            ->join('tb_pasien', 'tb_pasien.id = tb_master.id_pasien')
            ->join('tb_tenaga_medis', 'tb_tenaga_medis.id = tb_master.id_tenaga_medis')
            ->join('tb_nama_pelayanan', 'tb_nama_pelayanan.id = tb_master.id_nama_pelayanan')
            ->join('tb_jenis_pelayanan', 'tb_jenis_pelayanan.id = tb_master.id_jenis_pelayanan')
            ->where('tb_master.id', $id)
            ->first();

        $data = [
            'title' => 'Print ' . $id,
            'master' => $query
        ];

        if (!$data['master']) {
            // Handle jika data dengan ID yang diberikan tidak ditemukan
            return redirect()->to('master/detail/' . $id)->with('error', '<i class="fas fa-circle-xmark"></i> Data not found');
        }

        return view('master/print', $data);
    }

    public function generateExcelReport()
    {
        // Define the column headers based on the database columns
        $columnHeaders = [
            'ID',
            'Created',
            'Modified',
            'Service Name',
            'NIK',
            'Patient Name',
            'Place of Birth (Patient)',
            'Date of Birth (Patient)',
            'Gender (Patient)',
            'Religion (Patient)',
            'Occupation (Patient)',
            'Address (Patient)',
            'Phone Number (Patient)',
            'Type of Service',
            'No BPJS',
            'Service Cost',
            'NIP',
            'Medical Staff Name',
            'Place of Birth (Medical Staff)',
            'Date of Birth (Medical Staff)',
            'Gender (Medical Staff)',
            'Religion (Medical Staff)',
            'Position (Medical Staff)',
            'Address (Medical Staff)',
            'Phone Number (Medical Staff)'
        ];

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Create a new worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Set the column headers
        $columnIndex = 'A';
        foreach ($columnHeaders as $header) {
            $worksheet->setCellValue($columnIndex . '1', $header);
            $columnIndex++;
        }

        // Fetch data from the database
        $data = $this->masterModel
            ->select('tb_master.id,
            tb_master.created_at,
            tb_master.updated_at,
            tb_nama_pelayanan.nama_pelayanan,
            tb_pasien.id AS nik,
            tb_pasien.nama AS nama_pasien,
            tb_pasien.tempat_lahir AS tempat_lahir_pasien,
            tb_pasien.tanggal_lahir AS tanggal_lahir_pasien,
            tb_pasien.jenis_kelamin AS jenis_kelamin_pasien,
            tb_pasien.agama AS agama_pasien,
            tb_pasien.pekerjaan,
            tb_pasien.alamat AS alamat_pasien,
            tb_pasien.no_telepon AS no_telepon_pasien,
            tb_jenis_pelayanan.jenis_pelayanan,
            tb_master.no_bpjs,
            tb_nama_pelayanan.biaya, 
            tb_tenaga_medis.id AS nip,
            tb_tenaga_medis.nama AS nama_tenaga_medis,
            tb_tenaga_medis.tempat_lahir AS tempat_lahir_tenaga_medis,
            tb_tenaga_medis.tanggal_lahir AS tanggal_lahir_tenaga_medis,
            tb_tenaga_medis.jenis_kelamin AS jenis_kelamin_tenaga_medis,
            tb_tenaga_medis.agama AS agama_tenaga_medis,
            tb_tenaga_medis.jabatan,
            tb_tenaga_medis.alamat AS alamat_tenaga_medis,
            tb_tenaga_medis.no_telepon AS no_telepon_tenaga_medis')
            ->join('tb_pasien', 'tb_pasien.id = tb_master.id_pasien')
            ->join('tb_tenaga_medis', 'tb_tenaga_medis.id = tb_master.id_tenaga_medis')
            ->join('tb_nama_pelayanan', 'tb_nama_pelayanan.id = tb_master.id_nama_pelayanan')
            ->join('tb_jenis_pelayanan', 'tb_jenis_pelayanan.id = tb_master.id_jenis_pelayanan')
            ->orderBy('tb_master.id', 'ASC')
            ->findAll();

        // Loop through the data and add it to the worksheet
        $row = 2; // Start from the second row
        $i = 1;
        foreach ($data as $item) {
            $columnIndex = 'A';
            foreach ($item as $value) {
                $worksheet->setCellValue($columnIndex . $row, $value);
                $columnIndex++;
            }
            $row++;
        }

        // Create a writer object
        $writer = new Xlsx($spreadsheet);

        // Set the file name
        $dateNow = date("dmY");
        $filename = 'Report_' . $dateNow . '.xlsx';

        // Set headers for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Save the file to output
        $writer->save('php://output');

        // Make sure to stop further script execution to prevent interference with the download
        exit;
    }

    public function create()
    {
        // Generate 5 angka random
        $randomNumber = str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);

        $uniqueID = 'MR' . $randomNumber;

        $data = [
            'title' => 'Add Medical Records',
            'uniqueID' => $uniqueID,
            'jenisPelayanan' => $this->jenisPelayananModel->findAll(),
            'namaPelayanan' => $this->namaPelayananModel->orderBy('nama_pelayanan', 'ASC')->findAll(),
            'pasien' => $this->pasienModel->orderBy('nama', 'ASC')->findAll(),
            'tenagaMedis' => $this->tenagaMedisModel->orderBy('nama', 'ASC')->findAll(),
        ];

        return view('master/create', $data);
    }

    public function save()
    {
        // Validasi form data yang diterima
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => [
                'rules' => 'required|is_unique[tb_master.id]',
                'errors' => [
                    'required' => 'ID must be filled in.',
                    'is_unique' => 'ID already exists.',
                ]
            ],
            'id_pasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Patient name must be filled in.',
                ]
            ],
            'id_tenaga_medis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The name of the medical personnel must be filled in.',
                ]
            ],
            'id_nama_pelayanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'A service name must be selected.',
                ]
            ],
            'id_jenis_pelayanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The service type must be selected.',
                ]
            ],
        ]);

        // Cek apakah data yang diterima valid
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('master/create')->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data yang ingin disimpan dari form
        $dataToSave = [
            'id' => $this->request->getVar('id'),
            'id_pasien' => $this->request->getVar('id_pasien'),
            'id_tenaga_medis' => $this->request->getVar('id_tenaga_medis'),
            'id_nama_pelayanan' => $this->request->getVar('id_nama_pelayanan'),
            'id_jenis_pelayanan' => $this->request->getVar('id_jenis_pelayanan'),
            'no_bpjs' => $this->request->getVar('no_bpjs') ?: '-', // Jika kosong, isi dengan tanda strip "-"
        ];

        // Lakukan penyimpanan data
        $saved = $this->masterModel->insert($dataToSave);

        // Periksa apakah penyimpanan berhasil
        if ($saved !== false) {
            return redirect()->to('master')->with('success', '<i class="fas fa-circle-check"></i> Data saved successfully');
        } else {
            return redirect()->to('master')->with('error', '<i class="fas fa-circle-xmark"></i> Failed to save data');
        }
    }

    public function delete($id)
    {
        if (empty($id)) {
            return redirect()->to('master')->with('error', '<i class="fas fa-circle-xmark"></i> Invalid ID');
        }

        // Hapus data dengan ID yang diterima
        $deleted = $this->masterModel->where('id', $id)->delete();

        // Periksa apakah penghapusan berhasil
        if ($deleted) {
            return redirect()->to('master')->with('success', '<i class="fas fa-circle-check"></i> Data deleted successfully');
        } else {
            return redirect()->to('master')->with('error', '<i class="fas fa-circle-xmark"></i> Failed to delete data');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Medical Records',
            'master' => $this->masterModel->find($id),
            'jenisPelayanan' => $this->jenisPelayananModel->findAll(),
            'namaPelayanan' => $this->namaPelayananModel->orderBy('nama_pelayanan', 'ASC')->findAll(),
            'pasien' => $this->pasienModel->orderBy('nama', 'ASC')->findAll(),
            'tenagaMedis' => $this->tenagaMedisModel->orderBy('nama', 'ASC')->findAll(),
        ];

        if (empty($data['master'])) {
            return redirect()->to('master')->with('error', '<i class="fas fa-circle-xmark"></i> Data not found');
        }

        return view('master/edit', $data);
    }

    public function update($id)
    {
        // Pastikan bahwa $id adalah string (VARCHAR)
        if (empty($id)) {
            return redirect()->to('master')->with('error', 'Invalid ID');
        }

        // Validasi form data yang diterima
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_pasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Patient name must be filled in.',
                ]
            ],
            'id_tenaga_medis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The name of the medical personnel must be filled in.',
                ]
            ],
            'id_nama_pelayanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'A service name must be selected.',
                ]
            ],
            'id_jenis_pelayanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The service type must be selected.',
                ]
            ],
        ]);

        // Cek apakah data yang diterima valid
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('master/edit/' . $id)->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data yang ingin diperbarui dari form
        $dataToUpdate = [
            'id_pasien' => $this->request->getVar('id_pasien'),
            'id_tenaga_medis' => $this->request->getVar('id_tenaga_medis'),
            'id_nama_pelayanan' => $this->request->getVar('id_nama_pelayanan'),
            'id_jenis_pelayanan' => $this->request->getVar('id_jenis_pelayanan'),
            'no_bpjs' => $this->request->getVar('no_bpjs') ?: '-', // Jika kosong, isi dengan tanda strip "-"
        ];

        // Lakukan update data dengan ID yang sesuai
        $updated = $this->masterModel->where('id', $id)->set($dataToUpdate)->update();

        // Periksa apakah update berhasil
        if ($updated) {
            return redirect()->to('master')->with('success', '<i class="fas fa-circle-check"></i> Data updated successfully');
        } else {
            return redirect()->to('master')->with('error', '<i class="fas fa-circle-xmark"></i> Failed to update data');
        }
    }
}
