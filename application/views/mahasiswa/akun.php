<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800"><b>Akun Mahasiswa</b></h1>
    <p class="mb-4">Pada halaman ini anda dapat mengelola hak ases mahasiswa yang akan masuk kedalam sistem dan mengerjakan soal.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#add-modal" type="button">
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
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>KELAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($query as $u) {
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td width="100">
                                <button type="button" data-toggle="modal" data-target="#edit-modal" id="btn-edit"
                                    class="btn btn-primary" data-id="<?= $u->id; ?>"
                                    data-nim="<?= $u->nim; ?>" data-password="<?= $u->password; ?>"
                                    data-nama="<?= $u->nama; ?>"
                                    data-kelas="<?= $u->kelas; ?>">
                                    <i class="fas fa-fw fa-edit"></i>
                                </button>

                                <a href="delete-mahasiswa/<?= $u->id ?>" class="btn btn-danger btn-hapus">
                                    <i class="fas fa-fw fa-trash"></i>
                                </a>
                            </td>
                            <td><?php echo $u->nim ?></td>
                            <td><?php echo $u->nama ?></td>
                            <td><?php echo $u->kelas ?></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form class="form-horizontal" method="post" action="<?= base_url('add-mahasiswa'); ?>">
                    <label>NIM : </label>
                    <div class="form-group">
                        <input type="number" placeholder="Nomor Induk Mahasiswa" name="nim" class="form-control" required>
                    </div>                    
                    <label>Nama lengkap : </label>
                    <div class="form-group">
                        <input type="text" placeholder="Nama lengkap" name="nama" class="form-control"
                            autocomplete="Nama Lengkap" required>
                    </div>
                    <label>Password : </label>
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="password" class="form-control"
                            autocomplete="current-password" required>
                    </div>
                    <label>Kelas : </label>
                    <div class="form-group">
                        <select name="kelas" class="form-control">
                            <option>-- Pilih salah satu --</option>

                            <option>1EA</option>
                            <option>1EB</option>
                            <option>1EC</option>

                            <option>2EA</option>
                            <option>2EB</option>
                            <option>2EC</option>

                            <option>5EA</option>
                            <option>5EB</option>
                            <option>5EC</option>

                            <option>6EA</option>
                            <option>6EB</option>
                            <option>6EC</option>
                        </select>
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

<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form class="form-horizontal" method="post" action="<?= base_url('update-mahasiswa'); ?>">
                    <input type="hidden" name="id" id="id-mahasiswa" class="form-control">
                    <label>NIM : </label>
                    <div class="form-group">
                        <input type="number" placeholder="Nomor Induk Mahasiswa" name="nim" class="form-control" id="nim-mahasiswa" required>
                    </div>                    
                    <label>Nama lengkap : </label>
                    <div class="form-group">
                        <input type="text" placeholder="Nama lengkap" name="nama" class="form-control"
                            autocomplete="Nama Lengkap" id="nama-mahasiswa" required>
                    </div>
                    <label>Kelas : </label>
                    <div class="form-group">
                        <select name="kelas" class="form-control" id="kelas-mahasiswa">
                            <option>-- Pilih salah satu --</option>

                            <option>1EA</option>
                            <option>1EB</option>
                            <option>1EC</option>

                            <option>2EA</option>
                            <option>2EB</option>
                            <option>2EC</option>

                            <option>5EA</option>
                            <option>5EB</option>
                            <option>5EC</option>

                            <option>6EA</option>
                            <option>6EB</option>
                            <option>6EC</option>
                        </select>
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
    $('.modal-body #id-mahasiswa').val($(this).data('id'));
    $('.modal-body #nim-mahasiswa').val($(this).data('nim'));
    $('.modal-body #kelas-mahasiswa').val($(this).data('kelas'));
    $('.modal-body #nama-mahasiswa').val($(this).data('nama'));
});
</script>