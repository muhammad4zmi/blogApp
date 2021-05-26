<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = "profil";
    protected $UseTimestamps = TRUE;
    protected $allowedFields = ['userid', 'facebook', 'instagram', 'github', 'linked', 'tagline', 'blog_name', 'site_logo', 'keywords', 'description'];

    public function getProfil($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function listing()
    {
        $query = $this->asArray()
            ->first();
        return $query;
    }

    public function getDetailprofil()
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->join('profil', 'profil.userid = users.id');
        $query = $builder->get();
        return $query->getResultArray();
        // dd($query);
        // die;
    }
}
