<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = "blog_category";
    protected $UseTimestamps = TRUE;
    protected $allowedFields = ['category', 'slug'];

    public function getCategory($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getUpdate($id_category = false)
    {
        if ($id_category == false) {
            return $this->findAll();
        }

        return $this->where(['id_category' => $id_category])->first();
    }
    public function updateCategory($data, $id)
    {
        $query = $this->db->table('blog_category')->update($data, array('id_category' => $id));
        return $query;
    }
}
