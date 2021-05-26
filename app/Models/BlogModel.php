<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = "blog";
    protected $UseTimestamps = TRUE;
    protected $allowedFields = ['id_blog', 'slug', 'title', 'blog', 'image', 'id_category', 'userid'];

    public function getDetailblog($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
    public function getBlog()
    {
        $query1 = "SELECT blog.id_blog, blog.title,blog.blog, blog.slug, blog.image,blog.created_at,
                          blog_category.id_category,blog_category.category,users.id,users.fullname 
                        FROM blog,blog_category,users 
                   WHERE blog.id_category = blog_category.id_category 
                        AND blog.userid = users.id";

        return $this->db->query($query1)->getResultArray();
    }

    public function getFront()
    {
        $query = "SELECT blog.id_blog, blog.title,blog.blog, blog.slug, blog.image,blog.created_at,
                         blog_category.id_category,blog_category.category,users.id,users.fullname,date_format(blog.created_at, '%d %b %Y') as tgl,
            time(blog.created_at) as jam 
                  FROM blog,blog_category,users 
                  WHERE blog.id_category = blog_category.id_category 
                  AND blog.userid = users.id 
                  ORDER BY blog.created_at DESC  LIMIT 6";
        return $this->db->query($query)->getResultArray();
    }

    public function getDetail($slug)
    {
        $query1 = "SELECT blog.id_blog, blog.title,blog.blog, blog.slug, blog.image,blog.created_at, 
                         blog_category.id_category,blog_category.category,users.id,users.fullname,
                         date_format(blog.created_at, '%d %b %Y') as tgl, time(blog.created_at) as jam 
                    FROM blog,blog_category,users 
                        WHERE blog.id_category = blog_category.id_category 
                    AND blog.userid = users.id 
                    AND blog.slug='$slug' 
                 ORDER BY blog.created_at DESC";
        return $this->db->query($query1)->getResultArray();
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
