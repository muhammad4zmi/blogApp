<?= $this->extend('layout/template_front'); ?>
<?= $this->section('content'); ?>

<div class="intro intro-single route bg-image" style="background-image: url(<?= base_url(); ?>/assets/img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container mt-5"><br>
                <h2 class="intro-title mt-5">Blog Details | <?= $subtitle; ?></h2>
                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="">Blog</a>
                    </li>
                    <li class="breadcrumb-item active"><?= $subtitle; ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<main id="main">

    <!-- ======= Blog Single Section ======= -->
    <section class="blog-wrapper sect-pt4" id="blog">
        <div class="container">
            <div class="row">
                <?php foreach ($blog as $b) : ?>
                    <div class="col-md-8">
                        <div class="post-box">
                            <div class="post-thumb">
                                <img src="<?= base_url('/admin/img/blog') . '/' . $b['image']; ?>" class="img-fluid" alt="">
                            </div>
                            <div class="post-meta">
                                <h1 class="article-title"><?= $b['title']; ?></h1>
                                <ul>
                                    <li>
                                        <span class="bi bi-person"></span>
                                        <a href="#"><?= $b['fullname']; ?></a>
                                    </li>
                                    <li>
                                        <span class="bi bi-tag"></span>
                                        <a href="#"><?= $b['category']; ?></a>
                                    </li>
                                    <li>

                                        <i class="bi bi-calendar"></i> <?= $b['tgl']; ?> | <span class="bi bi-clock"></span> <?= $b['jam']; ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-content">
                                <p>
                                    <?= $b['blog']; ?>
                                </p>
                            </div>
                        </div>
                        <div class="box-comments">
                            <div class="title-box-2">
                                <h4 class="title-comments title-left">Comments</h4>
                            </div>
                            <ul class="list-comments">
                                <div id="disqus_thread"></div>
                            </ul>
                        </div>


                    </div>
                <?php endforeach; ?>
                <div class="col-md-4">

                    <div class="widget-sidebar">
                        <h5 class="sidebar-title">Recent Post</h5>
                        <div class="sidebar-content">
                            <ul class="list-sidebar">
                                <?php foreach ($blogs as $list) : ?>
                                    <li>
                                        <a href="/pages/readblog/<?= $list['slug']; ?>"><?= $list['title']; ?>.</a>
                                    </li>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                    </div>

                    <div class="widget-sidebar widget-tags">
                        <h5 class="sidebar-title">Category</h5>
                        <div class="sidebar-content">
                            <ul>
                                <?php foreach ($category as $ct) : ?>
                                    <li>
                                        <a href="#"><?= $ct['category']; ?>.</a>
                                    </li>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Blog Single Section -->

</main><!-- End #main -->

<?= $this->endSection(); ?>