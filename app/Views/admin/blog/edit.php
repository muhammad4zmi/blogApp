<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <div class="row">
        <!-- Data Nilai -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase" style="font-size: 14px;">Edit Blog</h6>
                </div>
                <div class="card-body">

                    <form class="user" method="POST" action="/blog/update/<?= $blog['id_blog']; ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class=" col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="font-size: 12px;">Title</label>
                                        <input type="hidden" name="userid" value="<?= user()->id; ?>">
                                        <input type="hidden" name="slug" value="<?= $blog['slug']; ?>">
                                        <input type="hidden" name="profil" value="<?= $blog['image']; ?>">
                                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="judul" name="title" autofocus value="<?= (old('title')) ? old('title') : $blog['title']; ?>" style="font-size: 12px;" placeholder="Title Blog">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('title'); ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="informasi" style="font-size: 12px;">Blog</label>

                                        <textarea id="editor" name="blog" class="form-control col-md-7 col-xs-12 <?= ($validation->hasError('blog')) ? 'is-invalid' : ''; ?>"><?= $blog['blog']; ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('blog'); ?>

                                        </div>


                                    </div>
                                    <div class="form-group">

                                        <label for="status" style="font-size: 12px;">Select Category
                                        </label>

                                        <select name="category" id="status" class="form-control <?= ($validation->hasError('category')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" autofocus value="<?= old('category'); ?>" style="font-size: 12px;">

                                            <option value="">Select Category</option>
                                            <?php foreach ($category as $p) : ?>
                                                <option value="<?= $p['id_category']; ?>">
                                                    <?= $p['category']; ?> </option>
                                            <?php endforeach; ?>
                                        </select>

                                        <div class="invalid-feedback">
                                            <?= $validation->getError('category'); ?>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2" style="font-size: 12px;">Image</div>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <img src=" <?= base_url('/admin/img/blog') . '/' . $blog['image']; ?>"" class=" img-thumbnail img-preview">
                                                </div>
                                                <div class="col-sm-9">

                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" onchange="previewProfil()">
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('image'); ?>

                                                        </div>
                                                        <label class="custom-file-label" style="font-size: 14px;"><?= $blog['image']; ?></label>
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