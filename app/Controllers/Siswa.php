<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Siswa_model;

class Siswa extends Controller
{
    protected $siswaModel;
    public function __construct()
    {
        $this->siswaModel = new Siswa_model();
    }

    public function index()
    {
        $data['siswa'] = $this->siswaModel->getSiswa();
        echo view('siswa/index', $data);
    }

    public function create()
    {
        echo view('siswa/create');
    }
    
    public function save()
    {
        $validation = \Config\Services::validation();
        $data = [
            'id_siswa' => $this->request->getPost('id_siswa'),
            'nama' => $this->request->getPost('nama'),
            'sekolah' => $this->request->getPost('sekolah'),
            'status' => $this->request->getPost('status')
        ];

        if ($validation->run($data, 'siswa') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('siswa/create'));
        } else {
            $simpan = $this->siswaModel->insertSiswa($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Siswa Berhasil Ditambah');
                return redirect()->to(base_url('siswa'));
            }
        }
    }

    public function edit($id)
    {
        $data['siswa'] = $this->siswaModel->getSiswa($id)->getRowArray();
        echo view('siswa/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_siswa');
        $validation = \Config\Services::validation();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'sekolah' => $this->request->getPost('sekolah'),
            'status' => $this->request->getPost('status')
        ];

        
        if ($validation->run($data, 'siswa') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('siswa/edit/' . $id));
        } else {
            $ubah = $this->siswaModel->updateSiswa($id, $data);
            if ($ubah) {
                session()->setFlashdata('info', 'Siswa Berhasil Diubah');
                return redirect()->to(base_url('siswa'));
            }
        }
    }

    public function delete($id)
    {
        $hapus = $this->siswaModel->deleteSiswa($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'berhasil menghapus data');
            return redirect()->to(base_url('siswa'));
        }
    }
}