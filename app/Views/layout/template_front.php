<?php

use App\Models\ProfilModel;

$konfigurasi  = new ProfilModel();
$site         = $konfigurasi->listing();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="<?php echo $site['description']; ?>" name="description">
    <meta content="<?php echo $site['keywords']; ?>" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url('admin/img/logo/' . $site['site_logo']) ?>" rel="icon">
    <link href="<?php echo base_url('admin/img/logo/' . $site['site_logo']) ?>" rel="apple-touch-icon">


    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>/assets/css/style.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: DevFolio - v4.0.1
  * Template URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <?= $this->include('layout/header.php'); ?>
    <?= $this->renderSection('content'); ?>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright-box">
                        <!-- <p class="copyright">&copy; Copyright <strong>DevFolio</strong>. All Rights Reserved</p> -->
                        <div class="credits">
                            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
            -->
                            Created with <i class="bi bi-heart-fill text-danger"></i> by <a href="" class="text-white font-weight-bold">Muhammad Azmi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/purecounter/purecounter.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/typed.js/typed.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url(); ?>/assets/js/main.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script id="dsq-count-scr" src="//portofolioku-web-id.disqus.com/count.js" async></script>

    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');
            s.src = 'https://portofolioku-web-id.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <!-- <script type="text/javascript">
        var message = "Function right click is Disabled!";

        function clickIE4() {
            if (event.button == 2) {
                alert(message);
                return false;
            }
        }

        function clickNS4(e) {
            if (document.layers || document.getElementById && !document.all) {
                if (e.which == 2 || e.which == 3) {
                    alert(message);
                    return false;
                }
            }
        }
        if (document.layers) {
            document.captureEvents(Event.MOUSEDOWN);
            document.onmousedown = clickNS4;
        } else if (document.all && !document.getElementById) {
            document.onmousedown = clickIE4;
        }
        document.oncontextmenu = new Function("alert(message);return false");
    </script> -->
    <!--IE=internet explorer 4+ dan NS=netscape 4+0-->
</body>

</html>