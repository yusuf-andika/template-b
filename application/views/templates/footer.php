</div>
<!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Funtech Technology 2023</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/backend/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/backend/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/backend/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/backend/') ?>js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="<?= base_url('assets/backend/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/backend/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/backend/') ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/backend/'); ?>sweetalert2/package/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
const dataflash = $('.flash-data').data('flashdata');
if (dataflash) {
    Swal.fire({
        title: 'Berhasil',
        text: 'Toefl-App menyatakan ' + dataflash,
        confirmButtonColor: '#311b92',
        icon: 'success'
    });
}

const dataflash2 = $('.flash-data2').data('flashdata2');
if (dataflash2) {
    Swal.fire({
        title: 'Terjadi kesalahan',
        text: 'Toefl-App menyatakan ' + dataflash2,
        icon: 'error'
    });
}


$('.btn-konfirm').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Yakin Mencetak?',
        text: "File akan ditampilkan dalam bentuk PDF, pilih Save untuk menyimpan file",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#311b92',
        cancelButtonColor: '#95a5a6',
        confirmButtonText: 'Export!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })
});



$('.btn-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data yang telah dihapus tidak dapat dikembalikan kembali.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#311b92',
        cancelButtonColor: '#95a5a6',
        confirmButtonText: 'Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })
});


</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: '#mytextarea'
});
</script>



</body>

<div class="modal fade" id="M_Change_Pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Ubah Password</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white;">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?= base_url('change-password'); ?>">
                    <input type="hidden" ng-hide="true" name="id" id="id-acc" autocomplete="off">
                    <label>Password Lama : </label>
                    <div class="form-group">
                        <input type="password" placeholder="Password Lama" name="pw_lama" class="form-control" required
                            autocomplete="current-password">
                    </div>
                    <hr>
                    <label>Password Baru : </label>
                    <div class="form-group">
                        <input type="password" name="pw_baru" placeholder="Password Baru" class="form-control" required
                            autocomplete="new-password">
                    </div>

                    <label>Ulangi Password Baru : </label>
                    <div class="form-group">
                        <input type="password" name="pw_baru2" placeholder="Ulangi Password Baru" class="form-control"
                            required autocomplete="new-password">
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    <i class="fas fa-fw fa-times"></i>
                </button>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-fw fa-check"></i>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).on('click', '#btn-edit', function() {
    $('.modal-body #id-acc').val($(this).data('id'));
});
</script>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Keluar dari Aplikasi?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white;">×</span>
                </button>
            </div>
            <div class="modal-body">Anda Yakin?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><i
                        class="fas fa-fw fa-times"></i></button>
                <a class="btn btn-primary" href="<?= base_url('logout'); ?>"><i class="fas fa-fw fa-check"></i></a>
            </div>
        </div>
    </div>
</div>

</html>