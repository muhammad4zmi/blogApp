<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProfilModel;
use App\Models\BlogModel;

class Blog extends BaseController
{
    protected $categoryModel;
    protected $profilModel;
    protected $blogModel;
    public function __construct()
    {
        $this->users = new \Myth\Auth\Models\UserModel();
        $this->categoryModel = new CategoryModel();
        $this->profilModel = new ProfilModel();
        $this->blogModel = new BlogModel();
        $this->db = \Config\Database::connect();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $data = [
            'title' => 'Admin Blog',
            'users' => $this->users->findAll(),
            'category' => $this->categoryModel->getCategory(),
            'profil' => $this->profilModel->getProfil(),
            'blog' => $this->blogModel->getBlog(),
            'validation' => \Config\Services::validation()

        ];

        return view('admin/blog/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Admin | Form Add Blog',
            'users' => $this->users->findAll(),
            'category' => $this->categoryModel->getCategory(),
            'profil' => $this->profilModel->getProfil(),
            'blog' => $this->blogModel->getBlog(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/blog/create', $data);
    }

    public function save()
    {
        //validasi
        if (!$this->validate([

            'title' => [
                'rules' => 'required|is_unique[blog.title]|trim',
                'errors' => [
                    'required' => 'Title is required!',
                    'is_unique' => 'Title is aready exist!'
                ]

            ],
            'blog' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Blog Name is required!'
                ]
            ],
            'category' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Category not selected!'
                ]

            ],
            'image' => [
                'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png|uploaded[image]',
                'errors' => [
                    'uploaded' => 'Pilih File terlebih dahulu!',
                    'max_size' => 'ukuran File terlalu besar!',
                    'is_image' => 'Yang anda pilih bukan gambar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!'
                ]
            ]
        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to('/admin/blog/create')->withInput();
            //return redirect()->to('/admin/informasi/create')->withInput()->with('validation', $validation);
        }
        $fileFoto = $this->request->getFile('image');

        //cek gambar
        if ($fileFoto->getError() == 4) {
            $namaImage = $this->request->getVar('profil');
        } else {
            //generate nama file random
            $namaImage = $fileFoto->getRandomName();
            //pindah gambar
            $fileFoto->move('admin/img/blog', $namaImage);
            //hapus file lama
            //unlink('admin/assets/img/profil/' . $this->request->getVar('profil'));
        }
        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->blogModel->save([

            'userid' => $this->request->getVar('userid'),
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'blog'     => $this->request->getVar('blog'),
            'id_category'      => $this->request->getVar('category'),
            'image'   => $namaImage

        ]);
        //$this->db->getWhere('data_ortu', ['id_pendaftar' => $id]);
        // $this->db->getWhere(['id_pendaftar' => $id]);
        // => $query->getWhere(['email' => session('email')])->getRowArray()
        // $this->db->WHERE('id_pendaftar', $id);



        $_SESSION['redirect_url'] = session()->setFlashdata('pesan', 'Blog berhasil disimpan!');
        return redirect()->to('/admin/blog/');
    }


    public function delete($id)
    {
        $berkas1 = $this->db->query("SELECT * FROM blog  WHERE id_blog= $id")->getRowArray();
        // dd($berkas1);
        // die;
        $image = $berkas1['image'];
        if ($berkas1) {
            unlink('admin/img/blog/' . $image);
            $this->db->table('blog')->delete(array('id_blog' => $id));
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to('/admin/blog');
        }
    }
    public function edit($slug)
    {
        $data = [
            'title' => 'Admin Blog | Edit Blog',
            'users' => $this->users->findAll(),
            'category' => $this->categoryModel->getCategory(),
            'profil' => $this->profilModel->getProfil(),
            'blog' => $this->blogModel->getDetailblog($slug),
            'validation' => \Config\Services::validation()

        ];

        return view('admin/blog/edit', $data);
    }

    public function update($id_blog)
    {
        //cek judul
        $infoLama = $this->blogModel->getDetailblog($this->request->getVar('slug'));
        if ($infoLama['title'] == $this->request->getVar('title')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[blog.title]';
        }
        //validasi
        if (!$this->validate([

            'title' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Title is required!',
                    'is_unique' => 'Title is aready exist!'
                ]

            ],
            'blog' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Blog Name is required!'
                ]
            ],
            'category' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Category not selected!'
                ]

            ],
            'image' => [
                'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih File terlebih dahulu!',
                    'max_size' => 'ukuran File terlalu besar!',
                    'is_image' => 'Yang anda pilih bukan gambar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!'
                ]
            ]

        ])) {
            //$validation = \Config\Services::validation();
            //return redirect()->to('/admin/blog/edit/')->withInput();
            //return redirect()->to('/admin/informasi/create')->withInput()->with('validation', $validation);
            return redirect()->to('/admin/blog/edit/' . $this->request->getVar('slug'))->withInput();
        }
        $fileFoto = $this->request->getFile('image');

        //cek gambar
        if ($fileFoto->getError() == 4) {
            $namaImage = $this->request->getVar('profil');
        } else {
            //generate nama file random
            $namaImage = $fileFoto->getRandomName();
            //pindah gambar
            $fileFoto->move('admin/img/blog', $namaImage);
            //hapus file lama
            //unlink('admin/assets/img/profil/' . $this->request->getVar('profil'));
        }
        $slug = url_title($this->request->getVar('title'), '-', true);
        //$this->blogModel->save([
        //'id_blog' => $id_blog,
        $userid = $this->request->getVar('userid');
        $title = $this->request->getVar('title');
        $slug = $slug;
        $blog     = $this->request->getVar('blog');
        $id_category      = $this->request->getVar('category');
        //'image'   => $namaImage

        //]);
        $this->db->query("UPDATE blog set slug  = '$slug', userid='$userid', title='$title', blog='$blog', id_category='$id_category', image = '$namaImage' WHERE id_blog= '$id_blog'");
        //$this->db->getWhere('data_ortu', ['id_pendaftar' => $id]);
        // $this->db->getWhere(['id_pendaftar' => $id]);
        // => $query->getWhere(['email' => session('email')])->getRowArray()
        // $this->db->WHERE('id_pendaftar', $id);



        $_SESSION['redirect_url'] = session()->setFlashdata('pesan', 'Blog berhasil diupdate!');
        return redirect()->to('/admin/blog/');
    }
}
