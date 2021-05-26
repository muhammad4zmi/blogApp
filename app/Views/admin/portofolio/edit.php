<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <div class="row">
        <!-- Data Nilai -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase" style="font-size: 14px;">Edit Portofolio</h6>
                </div>
                <div class="card-body">

                    <form class="user" method="POST" action="/portofolio/update/<?= $portofolio['id_portofolio']; ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class=" col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="font-size: 12px;">Title</label>

                                        <input type="hidden" name="slug" value="<?= $portofolio['slug']; ?>">
                                        <input type="hidden" name="profil" value="<?= $portofolio['image']; ?>">
                                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="judul" name="title" autofocus value="<?= (old('title')) ? old('title') : $portofolio['title']; ?>" style="font-size: 12px;" placeholder="Title Blog">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('title'); ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="informasi" style="font-size: 12px;">Blog</label>

                                        <textarea id="editor" name="description" class="form-control col-md-7 col-xs-12 <?= ($validation->hasError('description')) ? 'is-invalid' : ''; ?>"><?= $portofolio['description']; ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('description'); ?>

                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <label style="font-size: 12px;">Client</label>

                                        <input type="text" class="form-control <?= ($validation->hasError('client')) ? 'is-invalid' : ''; ?>" id="judul" name="client" style="font-size: 12px;" placeholder="Client" value="<?= $portofolio['client']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('client'); ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size: 12px;">URL Project</label>

                                        <input type="text" class="form-control" id="judul" name="url_project" style="font-size: 12px;" placeholder="URL Project" value="<?= $portofolio['project_url']; ?>"">

                                    </div>

                                    <div class=" form-group row">
                                        <div class="col-sm-2" style="font-size: 12px;">Image</div>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <img src=" <?= base_url('/admin/img/portofolio') . '/' . $portofolio['image']; ?>"" class=" img-thumbnail img-preview">
                                                </div>
                                                <div class="col-sm-9">

                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" onchange="previewProfil()">
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('image'); ?>

                                                        </div>
                                                        <label class="custom-file-label" style="font-size: 14px;"><?= $portofolio['image']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <a href="/admin/blog" class="btn btn-sm btn-danger" name="kembali">
                                    <i class="fas fa-arrow-left"></i>
                                    Kembali</a>
                                <button type="submit" value="simpan_datasetting" class="btn btn-sm btn-success">
                                    <i class="fas fa-save"></i>
                                    Update </button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>





<?= $this->endSection(); ?>