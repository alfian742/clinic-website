<?php

namespace App\Controllers;

use App\Models\JenisPelayananModel;
use App\Models\NamaPelayananModel;
use App\Models\PasienModel;
use App\Models\TenagaMedisModel;
use App\Models\MasterModel;

class Home extends BaseController
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

    // public function index(): string
    // {
    //     return view('welcome_message');
    // }

    public function home()
    {
        // Query untuk mengambil data biaya pelayanan per bulan
        $biayaPerBulan = $this->masterModel
            ->select("DATE_FORMAT(created_at, '%Y-%m') as bulan, SUM(tb_nama_pelayanan.biaya) as total_biaya")
            ->join('tb_nama_pelayanan', 'tb_nama_pelayanan.id = tb_master.id_nama_pelayanan')
            ->groupBy('bulan')
            ->findAll();

        // Membuat array data untuk sumbu horizontal (bulan) dan sumbu vertikal (biaya)
        $bulanLabels = [];
        $biayaData = [];

        foreach ($biayaPerBulan as $data) {
            $bulanLabels[] = $data['bulan'];
            $biayaData[] = (float)$data['total_biaya'];
        }

        // Parameter vertikal
        $parameterVertikal = [5000000, 10000000, 15000000, 20000000];

        // Membuat array data untuk parameter vertikal
        $vertikalLabels = [];

        foreach ($parameterVertikal as $param) {
            $vertikalLabels[] = $param;
        }

        $data = [
            'title' => 'Dashboard',
            'jumlahPasien' => count($this->pasienModel->findAll()),
            'jumlahTenagaMedis' => count($this->tenagaMedisModel->findAll()),
            'jumlahLayanan' => count($this->namaPelayananModel->findAll()),
            'master' => count($this->masterModel->findAll()),
            // 'biayaPelayanan' => $this->masterModel
            //     ->select('tb_nama_pelayanan.biaya, SUM(tb_nama_pelayanan.biaya) AS total_biaya')
            //     ->join('tb_nama_pelayanan', 'tb_nama_pelayanan.id = tb_master.id_nama_pelayanan')
            //     ->first(),
            'biayaPelayanan' => $this->masterModel
                ->select('SUM(tb_nama_pelayanan.biaya) AS total_biaya')
                ->join('tb_nama_pelayanan', 'tb_nama_pelayanan.id = tb_master.id_nama_pelayanan')
                ->first(),
            'jenisPelayanan' => $this->masterModel
                ->select('tb_jenis_pelayanan.jenis_pelayanan, COUNT(tb_master.id) AS jumlah')
                ->join('tb_jenis_pelayanan', 'tb_jenis_pelayanan.id = tb_master.id_jenis_pelayanan')
                ->groupBy('tb_jenis_pelayanan.jenis_pelayanan')
                ->findAll(),
            'bulanLabels' => json_encode($bulanLabels),
            'biayaData' => json_encode($biayaData),
            'vertikalLabels' => json_encode($vertikalLabels)
        ];

        return view('pages/home', $data);
    }
}
