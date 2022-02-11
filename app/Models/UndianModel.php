<?php

namespace App\Models;

use CodeIgniter\Model;

class UndianModel extends Model
{
    //user undian
    public function getUserUndia()
    {
        return $this->db->table('user_undian')->get()->getResultArray();
    }
    public function addUser($data)
    {
        $this->db->table('user_undian')->insert($data);
        return ['stts' => true, 'msg' => 'Proses berhasil...!'];
    }

    public function deleteUser($id)
    {
        $this->db->table('user_undian')->where(['id' => $id])->delete();
        return ['stts' => true, 'msg' => 'Proses berhasil...!'];
    }



    //hadia undian
    public function getHadiaUndia()
    {
        return $this->db->table('hadiah_undia')->get()->getResultArray();
    }

    public function addHadiah($data)
    {
        $this->db->table('hadiah_undia')->insert($data);
        return ['stts' => true, 'msg' => 'Proses berhasil...!'];
    }

    public function deleteHadiah($id)
    {
        $this->db->table('hadiah_undia')->where(['id' => $id])->delete();
        return ['stts' => true, 'msg' => 'Proses berhasil...!'];
    }


    //logic undian


    public function getUserWin()
    {
        $data = $this->db->table('user_undian')->where(['hadiah' => 0, 'is_active' => 1])->orderBy('id', 'RANDOM')->get()->getRowArray();
        return $data;
    }

    public function terimaHadia($user, $barang)
    {
        $data = $this->db->table('user_undian')->where(['hadiah' => $barang])->get()->getRowArray();
        if ($data) {
            return ['stts' => false, 'msg' => "Barang telah di menangkan oleh {$data['name']}...!"];
        } else {
            $this->db->table('user_undian')->where(['id' => $user])->update(['hadiah' => $barang]);
            return ['stts' => true, 'msg' => 'Barang diterima...!'];
        }
    }

    public function getUserMenang()
    {
        return $this->db->table('user_undian')->select('user_undian.*, hadiah_undia.barang')
            ->join('hadiah_undia', 'user_undian.hadiah = hadiah_undia.id')
            ->get()->getResultArray();
    }

    public function getDevisi()
    {
        return $this->db->table('tblweb_privilege')->get()->getResultArray();
    }

    public function getUserScan()
    {
        $data = $this->db->table('user_undian')->where(['is_active' => 1])->get()->getResultArray();
        return $data;
    }

    public function deleteScanUser($id)
    {
        $this->db->table('user_undian')->where(['id' => $id])->update(['is_active' => 0]);
        return ['stts' => true, 'msg' => 'Proses berhasil...!'];
    }

    public function deleteScanUserAll()
    {
        $this->db->table('user_undian')->update(['is_active' => 0]);
        return ['stts' => true, 'msg' => 'Proses berhasil...!'];
    }

    public function ScanUser($bet)
    {
        $this->db->table('user_undian')->where(['bet_id' => $bet])->update(['is_active' => 1]);
        return ['stts' => true, 'msg' => 'Proses berhasil...!'];
    }

    public function deleteUserAll()
    {
        $this->db->table('user_undian')->truncate();
        return ['stts' => true, 'msg' => 'Proses berhasil...!'];
    }


    public function getSection()
    {
        return $this->db->table('tblweb_section')->get()->getResultArray();
    }
}
