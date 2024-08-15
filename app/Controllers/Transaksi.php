<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisPelayananModel;
use App\Models\MasterModel;
use App\Models\NamaPelayananModel;
use App\Models\PasienModel;
use App\Models\TenagaMedisModel;

class Transaksi extends BaseController
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
            'title' => 'Transactions List',
            'master' => $query
        ];

        return view('transaksi/index', $data);
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
            return redirect()->to('transaksi')->with('error', '<i class="fas fa-circle-xmark"></i> Data not found');
        }

        return view('transaksi/print', $data);
    }

    public function printReport()
    {
        // Ambil tanggal_awal dan tanggal_akhir dari input pengguna
        $tanggal_awal = $this->request->getPost('tanggal_awal'); // Pastikan Anda memiliki form input dengan nama 'tanggal_awal'
        $tanggal_akhir = $this->request->getPost('tanggal_akhir'); // Pastikan Anda memiliki form input dengan nama 'tanggal_akhir'

        // Buat query atau filter data dari sumber data Anda berdasarkan tanggal
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
            ->where('tb_master.created_at >=', $tanggal_awal)
            ->where('tb_master.created_at <=', $tanggal_akhir)
            ->orderBy('tb_master.created_at', 'ASC')
            ->findAll();

        // Tampilkan laporan dalam format yang sesuai
        $data = [
            'title' => 'Print Report',
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
            'report' => $query
        ];

        return view('transaksi/report', $data);
    }
}
