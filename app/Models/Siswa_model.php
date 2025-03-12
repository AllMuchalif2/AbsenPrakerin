<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswa_model extends Model
{

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = ['nama', 'sekolah', 'status'];

    public function getSiswa($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_siswa' => $id]);
        }
    }

    public function insertSiswa($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateSiswa($id, $data)
    {
        return $this->db->table($this->table)->update($data, ['id_siswa' => $id]);
    }

    public function deleteSiswa($id)
    {
        return $this->db->table($this->table)->delete(['id_siswa' => $id]);
    }   
}
?>