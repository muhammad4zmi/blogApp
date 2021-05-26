<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <p class="h6 mb-4 text-gray-700 text-left" style="font-size: 12px;">
        <i class="fas fa-home"></i>

        <?php foreach ($profil as $k) : ?>
            <?= $k['blog_name']; ?> / <a href="/admin/dashboard" class="text-gray-700">Admin</a> / <a href="dasboard" class="text-gray-700"><?= $title; ?> </a>
    </p>
<?php endforeach; ?>
</p>


<div class="row">
    <!-- Data Nilai -->
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" style="font-size: 12px;">SETTING PROFIL</h6>
            </div>

            <div class="card-body">
                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>">
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>

                <?php endif; ?>
                <?php foreach ($profil as $k) : ?>
                    <form action="/profil/update/<?= $k['id']; ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class=" col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_aplikasi" style="font-size: 12px;">Blog Name</label>
                                        <input type="hidden" name="profil" value="<?= $k['site_logo']; ?>">
                                        <input type="hidden" name="user_id" value="<?= user()->id; ?>">
                                        <input type="hidden" name="id_profil" value="<?= $k['id']; ?>">
                                        <input type="hidden" name="profil" value="<?= $k['site_logo']; ?>">
                                        <input type="text" class="form-control <?= ($validation->hasError('blog_name')) ? 'is-invalid' : ''; ?>" name="blog_name" autofocus value="<?= (old('blog_name')) ? old('blog_name') : $k['blog_name']; ?>" style="font-size: 12px;" placeholder="Name Blog">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('blog_name'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="facebook" style="font-size: 12px;">Facebook</label>
                                                <input type="text" class="form-control" id="nama_aplikasi" name="facebook" style="font-size: 12px;" value="<?= $k['facebook']; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('facebook'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="instagram" style="font-size: 12px;">Instagram</label>
                                                <input type="text" class="form-control" style="font-size: 12px;" value="<?= $k['instagram']; ?>" name="instagram">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('instagram'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- </div> -->
                                        <!-- <div class="form-group row"> -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tahun" style="font-size: 12px;">Github</label>
                                                <input type="text" name="github" class="form-control form-control" id="tahun" placeholder="Akun Github" style="font-size: 12px;" value="<?= $k['github']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tahun" style="font-size: 12px;">Linked</label>
                                                <input type="text" name="linked" class="form-control form-control" id="tahun" placeholder="Akun Linked" style="font-size: 12px;" value="<?= $k['linked']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tahun" style="font-size: 12px;">Tagline</label>
                                        <textarea name="tagline" id="alamat" class="form-control" style="font-size: 12px;"><?= $k['tagline']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="keywords" style="font-size: 12px;">Keywords</label>
                                        <textarea name="keywords" id="alamat" class="form-control" style="font-size: 12px;"><?= $k['keywords']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" style="font-size: 12px;">Description</label>
                                        <textarea name="description" id="editor" class="form-control" style="font-size: 12px;"><?= $k['description']; ?></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2" style="font-size: 12px;">Site Logo</div>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <img src=" <?= base_url('/admin/img/logo') . '/' . $k['site_logo']; ?>"" class=" img-thumbnail img-preview">
                                                </div>
                                                <div class="col-sm-9">

                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" onchange="previewProfil()">
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('image'); ?>

                                                        </div>
                                                        <label class="custom-file-label" style="font-size: 14px;"><?= $k['site_logo']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-end">
                                        <div class="col-sm-12">
                                            <a href="dashboard.php" class="btn btn-sm btn-danger" name="kembali">
                                                <i class="fas fa-arrow-left"></i>
                                                Back</a>
                                            <button type="submit" name="btn_simpan" value="simpan_datasetting" class="btn btn-sm btn-success">
                                                <i class="fas fa-save"></i>
                                                Save Data </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</div>


<!-- </form> -->
<!-- </div>
  </div> -->


<?= $this->endSection(); ?>