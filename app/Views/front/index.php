<?= $this->extend('layout/template_front'); ?>
<?= $this->section('content'); ?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="jumbotron text-center">
    <br><br>
    <?php foreach ($profil as $p) : ?>
        <img src="<?= base_url('/admin/img') . '/' . $p['user_image']; ?>" width="200" class="img-thumbnail rounded-circle b-shadow-a mt-5" alt="">
        <h1 class="display-4 text-white"><?= $p['fullname']; ?></h1>
        <p class="lead text-white"><?= $p['tagline']; ?></p>

        <div class="socials">
            <ul>
                <li><a href="<?= $p['facebook']; ?>"><span class="ico-circle"><i class="bi bi-facebook"></i></span></a></li>
                <li><a href="<?= $p['instagram']; ?>"><span class="ico-circle"><i class="bi bi-instagram"></i></span></a></li>
                <li><a href="<?= $p['github']; ?>"><span class="ico-circle"><i class="bi bi-github"></i></span></a></li>
                <li><a href="<?= $p['linked']; ?>"><span class="ico-circle"><i class="bi bi-linkedin"></i></span></a></li>
            </ul>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f3f4f5" fill-opacity="1" d="M0,128L30,117.3C60,107,120,85,180,106.7C240,128,300,192,360,213.3C420,235,480,213,540,218.7C600,224,660,256,720,272C780,288,840,288,900,250.7C960,213,1020,139,1080,144C1140,149,1200,235,1260,250.7C1320,267,1380,213,1410,186.7L1440,160L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
        </svg>
    <?php endforeach; ?>

</section>


<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about-mf pt-5 route">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- <div class="box-shadow-full"> -->
                    <div class="row justify-content-center">

                        <div class="col-md-12" data-aos="fade-up" data-aos-duration="3000">
                            <div class="about-me pt-4 pt-md-0">
                                <div class="title-box text-center">
                                    <h3 class="title-a">
                                        About Me
                                    </h3>

                                    <div class="line-mf"></div>
                                </div>
                                <p class="lead justify-content-center">
                                    <?= $p['description']; ?>
                                </p>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0078ff" fill-opacity="1" d="M0,256L48,261.3C96,267,192,277,288,250.7C384,224,480,160,576,160C672,160,768,224,864,250.7C960,277,1056,267,1152,261.3C1248,256,1344,256,1392,256L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </section>
    <!--End About Section-->


    <!-- ======= Portfolio Section ======= -->
    <section id="work" class="jumbotron text-center">
        <div class="container ">
            <div class="row" data-aos="zoom-in-up" data-aos-duration="3000">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a  text-white">
                            Portfolio
                        </h3>
                        <p class="subtitle-a  text-white">
                            Portofolio seputar pekerjaan dan project.
                        </p>
                        <div class="line-mf"></div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="zoom-in-up" data-aos-duration="3000">
                <?php foreach ($portofolio as $pr) : ?>
                    <div class="col-md-4">
                        <div class="work-box">
                            <a href="<?= base_url('/admin/img/portofolio') . '/' . $pr['image']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                <div class="work-img">
                                    <img src="<?= base_url('/admin/img/portofolio') . '/' . $pr['image']; ?>" alt="" class="img-fluid">
                                </div>
                            </a>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title"><?= $pr['title']; ?></h2>
                                        <div class="w-more">
                                            <i class="bi bi-calendar"></i> <?= date('d F Y', strtotime($pr['created_at'])); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="w-like">
                                            <a href="/pages/portofoliodetail/<?= $pr['slug']; ?>"> <span class="bi bi-plus-circle"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


            </div>
        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <!-- End Testimonials Section -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog-mf sect-pt4 route">
        <div class="container">
            <div class="row" data-aos="zoom-in-up" data-aos-duration="3000">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a">
                            Blog
                        </h3>
                        <p class="subtitle-a">
                            Tulisan atau Blog sederhana seputar IT dan lainya.
                        </p>
                        <div class="line-mf"></div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="zoom-in-up" data-aos-duration="3000">
                <?php foreach ($blog as $b) : ?>
                    <div class="col-md-4 mb-3">
                        <div class="card card-blog">
                            <div class="card-img">
                                <a href="/pages/readblog/<?= $b['slug']; ?>"><img src="<?= base_url('/admin/img/blog') . '/' . $b['image']; ?>" alt="" class="img-fluid"></a>
                            </div>
                            <div class="card-body">
                                <div class="card-category-box">
                                    <div class="card-category">
                                        <h6 class="category"><?= $b['category']; ?></h6>
                                    </div>
                                </div>
                                <h3 class="card-title"><a href="/pages/readblog/<?= $b['slug']; ?>"><?= $b['title']; ?></a></h3>
                                <p class="card-description">
                                    <?= substr($b['blog'], 0, 250); ?>
                                </p>
                            </div>
                            <div class="card-footer" style="font-size: 12px;">
                                <div class="post-author">
                                    <a href="#">
                                        <img src="<?= base_url('/admin/img/default.svg'); ?>" alt="" class="avatar rounded-circle">
                                        <span class="author"><?= $b['fullname']; ?></span>
                                    </a>
                                </div>
                                <div class="post-date">
                                    <i class="bi bi-calendar"></i> <?= $b['tgl']; ?> | <span class="bi bi-clock"></span> <?= $b['jam']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0062d3" fill-opacity="1" d="M0,256L48,261.3C96,267,192,277,288,250.7C384,224,480,160,576,160C672,160,768,224,864,250.7C960,277,1056,267,1152,261.3C1248,256,1344,256,1392,256L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </section><!-- End Blog Section -->



</main><!-- End #main -->

<?= $this->endSection(); ?>