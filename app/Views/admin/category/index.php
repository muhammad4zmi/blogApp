<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
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
                <h6 class="m-0 font-weight-bold text-primary text-uppercase" style="font-size: 14px;">BLOG CATEGORY</h6>
            </div>
            <div class="card-body">
                <?php if ($validation->getErrors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors(); ?>
                    </div>
                <?php endif; ?>


                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>">
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>

                <?php endif; ?>
                <div class="table-responsive">
                    <div class="col-md-12 mb-3" align="right">
                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                            <i class="fas fa-plus"></i>
                            Add Category</a>
                    </div>


                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center" style="font-size: 14px;">
                                <!-- <th width="1%"><input type="checkbox" id="pilih_semua"></th> -->
                                <th width="1%">No</th>
                                <!-- <th width="3%">NISN</th> -->

                                <th width="10%">Category</th>
                                <th width="8%">Created at</th>

                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($category as $k) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>



                                    <td><?= $k['category']; ?></td>
                                    <td><?= $k['created_at']; ?></td>

                                    <td align="center">

                                        <a href="#" class="btn btn-warning m-1 btn-circle btn-edit" data-kode="<?= $k['id_category']; ?>" data-prodi="<?= $k['category']; ?>">
                                            <i class="fas fa-edit"></i></a>
                                        <a href="/category/delete/<?= $k['slug']; ?>" class="btn btn-danger m-1 btn-circle tombol-hapus"><i class="fas fa-trash-alt"></i></a>

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


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/category/addcategory" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control <?= ($validation->hasError('category')) ? 'is-invalid' : ''; ?>" name="category" autofocus value="" style="font-size: 12px;" placeholder="Category" data-toggle="tooltip" data-placement="top">
                    </div>




                </div>
                <!-- <div class="modal-body">Apakah Anda keluar dari aplikasi?</div> -->
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">
                        <i class="fas fa-arrow-left"></i>
                        Batal</button>
                    <button type="submit" value="simpan_datasetting" class="btn btn-sm btn-success">
                        <i class="fas fa-save"></i>
                        Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/category/update" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control kode <?= ($validation->hasError('id_category')) ? 'is-invalid' : ''; ?>" name="id_category" autofocus value="" style="font-size: 12px;" placeholder="Kode Prodi" data-toggle="tooltip" data-placement="top" readonly>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control prodi <?= ($validation->hasError('category')) ? 'is-invalid' : ''; ?>" name="category" autofocus value="" style="font-size: 12px;" placeholder="Program Studi">
                    </div>


                </div>
                <!-- <div class="modal-body">Apakah Anda keluar dari aplikasi?</div> -->
                <div class="modal-footer">
                    <input type="hidden" name="id_category" class="kode">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">
                        <i class="fas fa-arrow-left"></i>
                        Batal</button>
                    <button type="submit" value="simpan_datasetting" class="btn btn-sm btn-success">
                        <i class="fas fa-save"></i>
                        Update </button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- End Modal Delete->






<?= $this->endSection(); ?>