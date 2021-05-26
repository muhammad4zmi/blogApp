<?php

use App\Models\ProfilModel;

$konfigurasi  = new ProfilModel();
$site         = $konfigurasi->listing();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="<?php echo $site['description']; ?>" name="description">
    <meta content="<?php echo $site['keywords']; ?>" name="keywords">
    <meta name="author" content="Muhammad Azmi">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('admin/img/logo/' . $site['site_logo']) ?>" rel="icon">
    <link href="<?php echo base_url('admin/img/logo/' . $site['site_logo']) ?>" rel="apple-touch-icon">
    <link href="<?= base_url(); ?>/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/admin/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/admin/css/style2.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/admin/css/alertify.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <link href="<?= base_url(); ?>/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('templates/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('templates/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?= $this->renderSection('page-content'); ?>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?= $this->include('templates/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/admin/vendor/jquery/jquery.js"></script>
    <script src="<?= base_url(); ?>/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/admin/vendor/bootstrap/js/bootstrap.js"></script>

    <!-- Essential javascripts for application to work-->
    <script src="<?= base_url(); ?>/admin/js/style/js/jquery-3.2.1.min.js"></script>
    <!-- <script src="<?= base_url(); ?>/admin/js/style/js/jquery-3.4.1.min.js"></script> -->

    <script src="<?= base_url(); ?>/admin/js/style/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>/admin/js/style/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/admin/js/style/js/main.js"></script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="js/style/js/plugins/pace.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>/admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/admin/js/demo/datatables-demo.js"></script>
    <script src="<?= base_url(); ?>/admin/js/alertify.min.js"></script>

    <!-- js datepicker -->
    <script src="<?= base_url(); ?>/admin/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="<?= base_url(); ?>/admin/js/myscript.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script> -->
    <script>
        // ClassicEditor
        //     .create(document.querySelector('#editor'))
        //     .then(editor => {
        //         console.log(editor);
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        function previewProfil() {
            const image = document.querySelector('#image');
            const imageLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');
            imageLabel.textContent = image.files[0].name;

            const fileImage = new FileReader();
            fileImage.readAsDataURL(image.files[0]);

            fileImage.onload = function(e) {
                imgPreview.src = e.target.result;
            }


        }
    </script>
    <script>
        $(document).ready(function() {

            // get Edit Product
            $('.btn-edit').on('click', function() {
                // get data from button edit
                const kode = $(this).data('kode');
                const prodi = $(this).data('prodi');
                // const price = $(this).data('price');
                // const category = $(this).data('category_id');
                // Set data to Form Edit
                $('.kode').val(kode);
                $('.prodi').val(prodi);
                // $('.product_price').val(price);
                // $('.product_category').val(category).trigger('change');
                // Call Modal Edit
                $('#editModal').modal('show');
            });

            // get Delete Product
            $('.btn-delete').on('click', function() {
                // get data from button edit
                const kode = $(this).data('kode');
                // Set data to Form Edit
                $('.prodiID').val(kode);
                // Call Modal Edit
                $('#deleteModal').modal('show');
            });

        });
    </script>

</body>

</html>