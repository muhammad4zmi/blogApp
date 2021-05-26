<?php

namespace App\Models;

use CodeIgniter\Model;

class PortofolioModel extends Model
{
    protected $table = "portofolio";
    protected $UseTimestamps = TRUE;
    protected $allowedFields = ['slug', 'title', 'description', 'image', 'project_url', 'client'];

    public function getPortofolio($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
