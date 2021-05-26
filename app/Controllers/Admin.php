<?php

namespace App\Controllers;

use App\Models\ProfilModel;

class Admin extends BaseController
{
    protected $profilModel;
    public function __construct()
    {
        $this->users = new \Myth\Auth\Models\UserModel();
        $this->profilModel = new ProfilModel();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data = [
            'title' => 'Admin Dashboard',
            'users' => $this->users->findAll(),
            'profil' => $this->profilModel->getProfil()

        ];

        return view('admin/dashboard/index', $data);
    }

    public function editprofil()
    {
        $data = [
            'title' => 'Edit Profil',
            'users' => $this->users->findAll(),
            'profil' => $this->profilModel->getProfil(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/editprofil', $data);
    }

    public function edit_profil()
    {

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong!'
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
            return redirect()->to('/admin/editprofil')->withInput();
        }
        $fileFoto = $this->request->getFile('image');

        //cek gambar
        if ($fileFoto->getError() == 4) {
            $namaImage = $this->request->getVar('profil');
        } else {
            //generate nama file random
            $namaImage = $fileFoto->getRandomName();
            //pindah gambar
            $fileFoto->move('admin/img/', $namaImage);
            //hapus file lama
            unlink('admin/img/' . $this->request->getVar('profil'));
        }
        // $this->authModel->save([
        //     'id'            => $id,
        //     'nama'     => $this->request->getVar('nama'),
        //     'image'  => $namaImage

        // ]);
        $email = $this->request->getVar('email');
        $nama = $this->request->getVar('nama');
        $this->db->query("UPDATE users set fullname  = '$nama', user_image = '$namaImage' WHERE email= '$email'");
        //$this->db->query("UPDATE pendaftar set nama ='$nama' WHERE email= '$email'");

        $_SESSION['redirect_url'] = session()->setFlashdata('pesan', 'Profil berhasil di update!');
        return redirect()->to('/admin/editprofil');
    }
}
