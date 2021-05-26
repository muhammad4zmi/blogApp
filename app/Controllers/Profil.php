<?php

namespace App\Controllers;

use App\Models\ProfilModel;

class Profil extends BaseController
{
    protected $profilModel;
    public function __construct()
    {
        $this->users = new \Myth\Auth\Models\UserModel();
        $this->profilModel = new ProfilModel();
        $this->db = \Config\Database::connect();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $data = [
            'title' => 'Admin Profil',
            'users' => $this->users->findAll(),
            'profil' => $this->profilModel->getProfil(),
            'validation' => \Config\Services::validation()

        ];

        return view('admin/profil/index', $data);
    }


    public function update($id)
    {
        //cek judul
        //cek judul
        // $dataLama = $this->db->query("SELECT * FROM profil WHERE id=$id")->getResultArray(($this->request->getVar('id_profil')));
        // // dd($dataLama);
        // // die;
        // if ($dataLama['blog_name'] == $this->request->getVar('blog_name')) {
        //     $rule_nik = 'required';
        // } else {
        //     $rule_nik = 'required|is_unique[profil.blog_name]';
        // }
        //validasi
        if (!$this->validate([

            'blog_name' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Blog Name is required!'
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
            return redirect()->to('/admin/profil/index/' . $this->request->getVar('blog_name'))->withInput();
        }
        $fileFoto = $this->request->getFile('image');

        //cek gambar
        if ($fileFoto->getError() == 4) {
            $namaImage = $this->request->getVar('profil');
        } else {
            //generate nama file random
            $namaImage = $fileFoto->getRandomName();
            //pindah gambar
            $fileFoto->move('admin/img/logo', $namaImage);
            //hapus file lama
            //unlink('admin/assets/img/profil/' . $this->request->getVar('profil'));
        }

        $this->profilModel->save([
            'id'            => $id,
            'iuserid' => $this->request->getVar('user_id'),
            'blog_name'     => $this->request->getVar('blog_name'),
            'facebook'      => $this->request->getVar('facebook'),
            'instagram'   => $this->request->getVar('instagram'),
            'github'    => $this->request->getVar('github'),
            'linked'  => $this->request->getVar('linked'),
            'tagline'  => $this->request->getVar('tagline'),
            'site_logo' => $namaImage,
            'keywords' => $this->request->getVar('keywords'),
            'description' => $this->request->getVar('description')

        ]);
        //$this->db->getWhere('data_ortu', ['id_pendaftar' => $id]);
        // $this->db->getWhere(['id_pendaftar' => $id]);
        // => $query->getWhere(['email' => session('email')])->getRowArray()
        // $this->db->WHERE('id_pendaftar', $id);



        $_SESSION['redirect_url'] = session()->setFlashdata('pesan', 'Setting Profil berhasil diupdate!');
        return redirect()->to('/admin/profil/index');
    }
}
