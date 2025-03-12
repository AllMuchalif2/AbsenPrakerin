<?php

namespace App\Models;

use CodeIgniter\Model;

class Absen_model extends Model
{
    protected $table = 'absen';
    protected $primaryKey = 'id_absen';
    protected $allowedFields = ['id_siswa', 'tanggal', 'keterangan', 'waktu'];

    public function insertAbsensi($data)
    {
        return $this->insert($data); 
    }

    public function updateAbsensi($id_siswa, $tanggal)
    {
        return $this->set('keterangan', 'Hadir')
                    ->set('waktu', date('H:i:s'))
                    ->where(['id_siswa' => $id_siswa, 'tanggal' => $tanggal])
                    ->update();
    }
    public function getAbsensiByDate($tanggal) 
    {
        return $this->select('absen.id_siswa, siswa.nama, siswa.sekolah, absen.waktu')
        ->join('siswa', 'siswa.id_siswa = absen.id_siswa')
        ->where('absen.keterangan', 'Hadir')
        ->where('absen.tanggal', $tanggal)
        ->orderBy('absen.waktu', 'ASC')
        ->findAll();
        
    }
}