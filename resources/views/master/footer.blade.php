<footer class="main-footer">
    <div class="col-sm-12 order-sm-1 py-1 text-center text-sm-start">
        <em><a class="fw-semibold" href="" target="_blank">{{ App\Models\Profilapp::first()->nama }}</a>
        </em> &copy; <?php
        $tgl = date('Y');
        echo $tgl;
        ?>
    </div>
</footer>
