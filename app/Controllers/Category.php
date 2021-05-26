<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProfilModel;

class Category extends BaseController
{
    protected $categoryModel;
    protected $profilModel;
    public function __construct()
    {
        $this->users = new \Myth\Auth\Models\UserModel();
        $this->categoryModel = new CategoryModel();
        $this->profilModel = new ProfilModel();
        $this->db = \Config\Database::connect();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $data = [
            'title' => 'Admin Blog Category',
            'users' => $this->users->findAll(),
            'category' => $this->categoryModel->getCategory(),
            'profil' => $this->profilModel->getProfil(),
            'validation' => \Config\Services::validation()

        ];

        return view('admin/category/index', $data);
    }

    public function addcategory()
    {
        //validasi
        if (!$this->validate([
            'category' => [
                'rules' => 'required|is_unique[blog_category.category]|trim',
                'errors' => [
                    'required' => 'Category is required!',
                    'is_unique' => 'Category is duplicate!'
                ]
            ]
        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to('/admin/category/' . $this->request->getVar('category'))->withInput();
        }

        $slug = url_title($this->request->getVar('category'), '-', true);
        $this->categoryModel->save([
            'category' => $this->request->getVar('category'),
            'slug' => $slug

        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/admin/category/');
    }
    public function delete($id)
    {
        $this->db->table('blog_category')->delete(array('slug' => $id));
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/category');
    }

    public function update()
    {
        // $infoLama = $this->categoryModel->getUpdate($this->request->getVar(''));
        // if ($infoLama['category'] == $this->request->getVar('category')) {
        //     $rule_prodi = 'required';
        // } else {
        //     $rule_prodi = 'required|is_unique[blog_category.category]';
        // }
        //validasi
        if (!$this->validate([
            'id_category' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Category tidak boleh kosong!'
                ]
            ],
            'category' => [
                'rules' => 'required|trim|is_unique[blog_category.category]',
                'errors' => [
                    'required' => 'Category tidak boleh kosong!',
                    'is_unique' => 'Category sudah ada!'
                ]
            ]
        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to('/admin/category/')->withInput();
        }
        $model = new CategoryModel();
        $id = $this->request->getPost('id_category');
        $slug = url_title($this->request->getVar('category'), '-', true);
        $data = array(
            'category'        => $this->request->getPost('category'),
            'slug' => $slug
        );
        $model->updateCategory($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil di update!');
        return redirect()->to('/admin/category');
    }
}
