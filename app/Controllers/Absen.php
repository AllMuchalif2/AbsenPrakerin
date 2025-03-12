<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\Absen_model;
use App\Models\Siswa_model;
use App\Models\User_model;

class Absen extends Controller
{
    protected $absensiModel;
    protected $siswaModel;
    protected $userModel;
    protected $session;


    public function __construct()
    {
        $this->absensiModel = new Absen_model();
        $this->siswaModel = new Siswa_model();
        $this->userModel = new User_model();
        $this->session = session();
    }

    public function index()
    {
        $siswaAktif = $this->siswaModel->where('status', 'active')->findAll();

        $tanggal = date('Y-m-d');
        foreach ($siswaAktif as $siswa) {
            $absensiHariIni = $this->absensiModel->where(['id_siswa' => $siswa['id_siswa'], 'tanggal' => $tanggal])->first();
            if (!$absensiHariIni) {
                $data = [
                    'id_siswa' => $siswa['id_siswa'],
                    'tanggal' => $tanggal,
                    'keterangan' => 'Alpa',
                    'waktu' => null
                ];
                $this->absensiModel->insertAbsensi($data);
            }
        }

        return view('absen');
    }
    public function absensi()
    {
        $id_siswa = $this->request->getPost('id_siswa');
        $tanggal = date('Y-m-d');

        $siswa = $this->siswaModel->find($id_siswa);
        if (!$siswa) {
            session()->setFlashdata('error', 'Siswa tidak ditemukan.<br>Periksa kembali NIS');
            return redirect()->to('/');
        }
        if ($siswa['status'] !== 'active') {
            session()->setFlashdata('error', esc($siswa['nama']) . '<br> tidak dapat melakukan absensi karena sudah selesai prakerin.');
            return redirect()->to('/');
        }

        $absensi = $this->absensiModel->where(['id_siswa' => $id_siswa, 'tanggal' => $tanggal])->first();
        if ($absensi && $absensi['keterangan'] === 'Alpa') {
            $this->absensiModel->updateAbsensi($id_siswa, $tanggal);
            session()->setFlashdata('success', 'Absensi berhasil <br><b> ' . esc($siswa['nama']) . '</b>');
        } else {
            session()->setFlashdata('error', esc($siswa['nama']) . '<br> sudah absen untuk hari ini.');
        }

        return redirect()->to('/');
    }


    // Metode untuk melihat data absensi per hari
    public function dashboard()
    {
        $tanggal = date('Y-m-d');
        $data['absensi'] = $this->absensiModel->getAbsensiByDate($tanggal);
        return view('absen/dashboard', $data);
    }

    public function kehadiran()
    {
        $tanggal = $this->request->getGet('tanggal') ?? date('Y-m-d');

        $sudah_absen = $this->absensiModel
            ->select('absen.id_siswa, siswa.nama, siswa.sekolah, absen.waktu')
            ->join('siswa', 'siswa.id_siswa = absen.id_siswa')
            ->where('absen.keterangan', 'Hadir')
            ->where('absen.tanggal', $tanggal)
            ->findAll();

        $belum_absen = $this->siswaModel
            ->select('siswa.id_siswa, siswa.nama, siswa.sekolah')
            ->join('absen', 'absen.id_siswa = siswa.id_siswa', 'left')
            ->where('absen.keterangan', 'Alpa')
            ->where('absen.tanggal', $tanggal)
            ->findAll();

        return view('absen/lihat', [
            'sudah_absen' => $sudah_absen,
            'belum_absen' => $belum_absen,
        ]);
    }

    public function admin()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $tanggal = $this->request->getGet('tanggal') ?? date('Y-m-d');

        $sudah_absen = $this->absensiModel
            ->select('absen.id_siswa, siswa.nama, siswa.sekolah, absen.waktu')
            ->join('siswa', 'siswa.id_siswa = absen.id_siswa')
            ->where('absen.keterangan', 'Hadir')
            ->where('absen.tanggal', $tanggal)
            ->findAll();

        $belum_absen = $this->siswaModel
            ->select('siswa.id_siswa, siswa.nama, siswa.sekolah')
            ->join('absen', 'absen.id_siswa = siswa.id_siswa', 'left')
            ->where('absen.keterangan', 'Alpa')
            ->where('absen.tanggal', $tanggal)
            ->findAll();


        return view('admin_view', [
            'sudah_absen' => $sudah_absen,
            'belum_absen' => $belum_absen,
        ]);
    }

    public function login()
    {
        return view('login');
    }

    public function doLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set(['isLoggedIn' => true, 'username' => $user['username']]);
            return redirect()->to('/admin');
        } else {
            session()->setFlashdata('error', 'Login gagal, cek kembali username & password.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
