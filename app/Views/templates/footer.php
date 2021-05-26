<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <?php foreach ($profil as $k) : ?>
                <span>Copyright &copy; <?= date('Y'); ?> <?= $k['blog_name']; ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</footer>