<?= $this->extend('layout/template_front'); ?>
<?= $this->section('content'); ?>
<div class="intro intro-single route bg-image" style="background-image: url(<?= base_url(); ?>/assets/img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container mt-5"><br>
                <h2 class="intro-title mt-5">Portofolio Details | <?= $subtitle; ?></h2>
                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="">Portofolio</a>
                    </li>
                    <li class="breadcrumb-item active"><?= $subtitle; ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<main id="main">

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper-container">
                        <div class="swiper-wrapper align-items-center">


                            <div class="swiper-slide">
                                <img src="<?= base_url('/admin/img/portofolio') . '/' . $portofolio['image']; ?>" alt="">
                            </div>

                            <!-- <div class="swiper-slide">
                                <img src="assets/img/portfolio-details-2.jpg" alt="">
                            </div>

                            <div class="swiper-slide">
                                <img src="assets/img/portfolio-details-3.jpg" alt="">
                            </div> -->


                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Project information</h3>
                        <ul>
                            <!-- <li><strong>Category</strong>: Web design</li> -->
                            <li><strong>Client</strong>: <?= $portofolio['client']; ?></li>
                            <li><strong>Project date</strong>: <?= date('d F Y', strtotime($portofolio['created_at'])); ?></li>
                            <li><strong>Project URL</strong>: <a href="<?= $portofolio['project_url']; ?>" target="_blank"><?= $portofolio['project_url']; ?></a></li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>Description</h2>
                        <p>
                            <?= $portofolio['description']; ?>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
<?= $this->endSection(); ?>