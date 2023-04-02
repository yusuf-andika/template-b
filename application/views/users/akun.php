<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800"><b>Pengaturan Akun</b></h1>
    <p class="mb-4">Pada halaman ini anda dapat mengelola hak ases user yang akan masuk kedalam sistem.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#M_Add_User" type="button">
                <i class="fas fa-fw fa-plus"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort" width="20">NO.</th>
                            <th>AKSI</th>
                            <th>NAMA</th>
                            <th>USERNAME</th>
                            <th>LEVEL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $u) {
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td width="150">
                                <button type="button" data-toggle="modal" data-target="#M_Edit_User" id="btn-edit"
                                    class="btn btn-primary" data-id="<?= $u->id; ?>"
                                    data-username="<?= $u->username; ?>" data-password="<?= $u->password; ?>"
                                    data-nama="<?= $u->nama; ?>">
                                    <i class="fas fa-fw fa-edit"></i>
                                </button>

                                <a href="delete-users/<?= $u->id ?>" class="btn btn-danger btn-hapus">
                                    <i class="fas fa-fw fa-trash"></i>
                                </a>
                            </td>
                            <td><?php echo $u->nama ?></td>
                            <td><?php echo $u->username ?></td>
                            <td><?php echo $u->level ?></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="M_Add_User" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Tambah Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white;">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?= base_url('add-users'); ?>">
                    <label>Username : </label>
                    <div class="form-group">
                        <input type="text" placeholder="Username" name="username" class="form-control"
                            autocomplete="username" required>
                    </div>
                    <label>Password : </label>
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="password" class="form-control"
                            autocomplete="current-password" required>
                    </div>

                    <label>Nama lengkap : </label>
                    <div class="form-group">
                        <input type="text" placeholder="Nama Lengkap" name="nama" class="form-control" required>
                    </div>

                    <label>Level login : </label>
                    <div class="form-group">
                        <input type="text" value="Administrator" name="level" class="form-control" readonly>
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

<div class="modal fade" id="M_Edit_User" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Perbarui Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white;">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?= base_url('update-users'); ?>">
                    <input type="hidden" placeholder="Username" name="id" id="id-akun" class="form-control">
                    <label>Username : </label>
                    <div class="form-group">
                        <input type="text" placeholder="Username" name="username" class="form-control"
                            id="username-akun" required>
                    </div>
                    <label>Nama lengkap : </label>
                    <div class="form-group">
                        <input type="text" placeholder="Nama Lengkap" name="nama" class="form-control" id="nama-akun"
                            required>
                    </div>

                    <label>Level login : </label>
                    <div class="form-group">
                        <input type="text" value="Administrator" name="level" class="form-control" readonly>
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
    $('.modal-body #id-akun').val($(this).data('id'));
    $('.modal-body #username-akun').val($(this).data('username'));
    $('.modal-body #password-akun').val($(this).data('password'));
    $('.modal-body #nama-akun').val($(this).data('nama'));
});
</script>