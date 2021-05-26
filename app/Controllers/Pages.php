<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\BlogModel;
use App\Models\CategoryModel;
use App\Models\PortofolioModel;
use App\Models\ProfilModel;

class Pages extends BaseController
{
    protected $blogModel;
    protected $categoryModel;
    protected $portofolioModel;
    protected $profilModel;

    public function __construct()
    {
        $this->blogModel = new BlogModel();
        $this->categoryModel = new CategoryModel();
        $this->portofolioModel = new PortofolioModel();
        $this->profilModel = new ProfilModel();
    }
    public function index()
    {
        $konfigurasi     = $this->profilModel->listing();
        $data = [
            'title' => $konfigurasi['blog_name'],
            'blog' => $this->blogModel->getFront(),
            'category' => $this->categoryModel->getCategory(),
            'profil' => $this->profilModel->getDetailprofil(),
            'portofolio' => $this->portofolioModel->getPortofolio()

        ];

        return view('front/index', $data);
    }

    public function readblog($slug)
    {
        $blog     = $this->blogModel->getDetailblog($slug);
        $konfigurasi     = $this->profilModel->listing();
        $data = [
            'title' => $konfigurasi['blog_name'] . ' | ' . $blog['title'],
            'subtitle' => $blog['title'],
            'blog' => $this->blogModel->getDetail($slug),
            'blogs' => $this->blogModel->getDetailblog(),
            'category' => $this->categoryModel->getCategory(),
            'profil' => $this->profilModel->getDetailprofil(),
            'portofolio' => $this->portofolioModel->getPortofolio()
        ];
        return view('front/blogdetail', $data);
    }

    public function portofoliodetail($slug)
    {
        $portofolio     = $this->portofolioModel->getPortofolio($slug);
        $konfigurasi     = $this->profilModel->listing();
        $data = [
            'title' => $konfigurasi['blog_name'] . ' | ' . $portofolio['title'],
            'subtitle' => $portofolio['title'],
            'profil' => $this->profilModel->getDetailprofil(),
            'portofolio' => $this->portofolioModel->getPortofolio($slug)
        ];
        return view('front/portofolio-detail', $data);
    }
}
