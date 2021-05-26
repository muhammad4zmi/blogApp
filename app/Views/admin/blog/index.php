<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<style type="text/css">
    .foto-thumbnail {
        padding: .07rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: .25rem;
        width: 3.3rem;
        height: auto;
    }

    .foto-preview {
        padding: .25rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: .25rem;
        width: 12rem;
        height: 16rem;
    }
</style>
<div class="container-fluid">
    <!-- Page Heading -->
    <p class="h6 mb-4 text-gray-700 text-left" style="font-size: 12px;">
        <i class="fas fa-home"></i>
        <?php foreach ($profil as $k) : ?>
            <?= $k['blog_name']; ?> / <a href="/admin/dasboard" class="text-gray-700">Admin</a> / <a href="dasboard" class="text-gray-700"><?= $title; ?> </a>
    </p>
<?php endforeach; ?>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-uppercase" style="font-size: 14px;">BLOG LIST</h6>
            </div>
            <div class="card-body">



                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>">
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>

                <?php endif; ?>
                <div class="table-responsive">
                    <div class="col-md-12 mb-3" align="right">
                        <a href="blog/create" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i>
                            Add Blog</a>
                    </div>


                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center" style="font-size: 14px;">
                                <!-- <th width="1%"><input type="checkbox" id="pilih_semua"></th> -->
                                <th width="1%">No</th>
                                <th width="5%">Image</th>
                                <th width="20%">Title</th>
                                <!-- <th width="20%">Blog</th> -->

                                <th width="10%">Category</th>
                                <th width="5%">User</th>
                                <th width="8%">Created at</th>

                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($blog as $b) : ?>
                                <tr style="font-size: 12px;">
                                    <td><?= $i++; ?></td>
                                    <td class="center"><img class="foto-thumbnail" src="<?= base_url('/admin/img/blog') . '/' . $b['image']; ?>" alt="Foto Blog"></td>
                                    <td><?= $b['title']; ?></td>
                                    <!-- <td><?= $b['blog']; ?></td> -->
                                    <td><?= $b['category']; ?></td>
                                    <td><?= $b['fullname']; ?></td>
                                    <td><?= $b['created_at']; ?></td>
                                    <td align="center">

                                        <a target="_blank" href="/pages/readblog/<?= $b['slug']; ?>" class="btn btn-info m-1 btn-circle btn-sm" data-placement="top" title="" data-toggle="tooltip" data-original-title="Baca Blog <?= $b['title']; ?>">
                                            <i class="fas fa-eye"></i></a>
                                        <a href="/admin/blog/edit/<?= $b['slug']; ?>" class="btn btn-warning m-1 btn-circle btn-sm" data-placement="top" title="" data-toggle="tooltip" data-original-title="Ubah Informasi <?= $b['title']; ?>">
                                            <i class="fas fa-edit"></i></a>
                                        <a href="/blog/delete/<?= $b['id_blog']; ?>" class="btn btn-danger m-1 btn-circle tombol-hapus btn-sm" data-placement="top" title="" data-toggle="tooltip" data-original-title="Delete Blog <?= $b['title']; ?>">
                                            <i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>


                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>







<!-- End Modal Delete->






<?= $this->endSection(); ?>