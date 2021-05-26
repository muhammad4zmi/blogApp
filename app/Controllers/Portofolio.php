<?php

namespace App\Controllers;

//use App\Models\CategoryModel;
use App\Models\ProfilModel;
//use App\Models\BlogModel;
use App\Models\PortofolioModel;

class Portofolio extends BaseController
{
    //protected $categoryModel;
    protected $profilModel;
    //protected $blogModel;
    protected $portofolioModel;
    public function __construct()
    {
        $this->users = new \Myth\Auth\Models\UserModel();
        //$this->categoryModel = new CategoryModel();
        $this->profilModel = new ProfilModel();
        // $this->blogModel = new BlogModel();
        $this->portofolioModel = new PortofolioModel();
        $this->db = \Config\Database::connect();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $data = [
            'title' => 'Admin Portofolio',
            'users' => $this->users->findAll(),
            // 'category' => $this->categoryModel->getCategory(),
            'profil' => $this->profilModel->getProfil(),
            //'blog' => $this->blogModel->getBlog(),
            'portofolio' => $this->portofolioModel->getPortofolio(),
            'validation' => \Config\Services::validation()

        ];

        return view('admin/portofolio/index', $data);
    }

    public function delete($id)
    {
        $berkas1 = $this->db->query("SELECT * FROM portofolio  WHERE id_portofolio= $id")->getRowArray();
        // dd($berkas1);
        // die;
        $image = $berkas1['image'];
        if ($berkas1) {
            unlink('admin/img/portofolio/' . $image);
            $this->db->table('portofolio')->delete(array('id_portofolio' => $id));
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to('/admin/portofolio');
        }
    }

    public function create()
    {
        $data = [
            'title' => 'Admin | Form Add Portofolio',
            'users' => $this->users->findAll(),
            'portofolio' => $this->portofolioModel->getPortofolio(),
            'profil' => $this->profilModel->getProfil(),

            'validation' => \Config\Services::validation()
        ];

        return view('admin/portofolio/create', $data);
    }

    public function save()
    {
        //validasi
        if (!$this->validate([

            'title' => [
                'rules' => 'required|is_unique[portofolio.title]|trim',
                'errors' => [
                    'required' => 'Title is required!',
                    'is_unique' => 'Title is aready exist!'
                ]

            ],
            'description' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Description is required!'
                ]
            ],
            'client' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Client is Required!'
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
            return redirect()->to('/admin/portofolio/create')->withInput();
            //return redirect()->to('/admin/informasi/create')->withInput()->with('validation', $validation);
        }
        $fileFoto = $this->request->getFile('image');

        //cek gambar
        // if ($fileFoto->getError() == 4) {
        //     $namaImage = $this->request->getVar('profil');
        // } else {
        //generate nama file random
        $namaImage = $fileFoto->getRandomName();
        //pindah gambar
        $fileFoto->move('admin/img/portofolio', $namaImage);
        //hapus file lama
        //unlink('admin/assets/img/profil/' . $this->request->getVar('profil'));
        //}
        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->portofolioModel->save([

            'userid' => $this->request->getVar('userid'),
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'description'     => $this->request->getVar('description'),
            'client' => $this->request->getVar('client'),
            'project_url' => $this->request->getVar('url_project'),
            'image'   => $namaImage

        ]);
        //$this->db->getWhere('data_ortu', ['id_pendaftar' => $id]);
        // $this->db->getWhere(['id_pendaftar' => $id]);
        // => $query->getWhere(['email' => session('email')])->getRowArray()
        // $this->db->WHERE('id_pendaftar', $id);



        $_SESSION['redirect_url'] = session()->setFlashdata('pesan', 'Blog berhasil disimpan!');
        return redirect()->to('/admin/portofolio/');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Admin Portofolio | Edit Portofolio',
            'users' => $this->users->findAll(),
            'portofolio' => $this->portofolioModel->getPortofolio($slug),
            'profil' => $this->profilModel->getProfil(),

            'validation' => \Config\Services::validation()

        ];

        return view('admin/portofolio/edit', $data);
    }

    public function update($id_portofolio)
    {
        //cek judul
        $infoLama = $this->portofolioModel->getPortofolio($this->request->getVar('slug'));
        if ($infoLama['title'] == $this->request->getVar('title')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[portofolio.title]';
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
            'description' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Description is required!'
                ]
            ],
            'client' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Client is Required!'
                ]

            ],

            'image' => [
                'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png',
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
            return redirect()->to('/admin/portofolio/edit/' . $this->request->getVar('slug'))->withInput();
        }
        $fileFoto = $this->request->getFile('image');

        //cek gambar
        if ($fileFoto->getError() == 4) {
            $namaImage = $this->request->getVar('profil');
        } else {
            //generate nama file random
            $namaImage = $fileFoto->getRandomName();
            //pindah gambar
            $fileFoto->move('admin/img/portofolio', $namaImage);
            //hapus file lama
            //unlink('admin/assets/img/profil/' . $this->request->getVar('profil'));
        }
        $slug = url_title($this->request->getVar('title'), '-', true);
        //$this->portofolioModel->save([
        //$userid = $this->request->getVar('userid');
        $title = $this->request->getVar('title');
        $slug = $slug;
        $description     = $this->request->getVar('description');
        $client = $this->request->getVar('client');
        $project_url = $this->request->getVar('url_project');

        //'image'   => $namaImage

        //]);
        $this->db->query("UPDATE portofolio set slug  = '$slug', 
                                                title='$title', 
                                                description='$description',
                                                client = '$client', 
                                                project_url = '$project_url', 
                                                image = '$namaImage'
                                                
                          WHERE id_portofolio= '$id_portofolio'");



        $_SESSION['redirect_url'] = session()->setFlashdata('pesan', 'Portofolio berhasil diupdate!');
        return redirect()->to('/admin/portofolio/');
    }
}
