<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
<div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('pesan') ?>"></div>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800"><b><?=$title?></b></h1>
    <p class="mb-4">Pada halaman ini anda dapat mengelola bank soal listening ini untuk mengelola soal yang masuk kedalam sistem.</p>

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
                            <th>KODE SOAL</th>
                            <th>DESKRIPSI SOAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($ws as $u) {
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td width="100">
                                <button type="button" data-toggle="modal" data-target="#edit-modal" id="btn-edit"
                                    class="btn btn-primary" data-id="<?= $u->id; ?>"
                                    data-kode_soal="<?= $u->kode_soal; ?>" data-deskripsi="<?= $u->deskripsi; ?>"
                                    data-jenis_soal="<?= $u->jenis_soal; ?>" data-deskripsi="<?= $u->deskripsi; ?>"
                                    data-a="<?= $u->a; ?>"
                                    data-b="<?= $u->b; ?>"
                                    data-c="<?= $u->c; ?>"
                                    data-d="<?= $u->d; ?>"
                                    data-e="<?= $u->e; ?>"
                                    data-jawaban="<?= $u->jawaban; ?>"
                                    data-file="<?= $u->file; ?>">
                                    <i class="fas fa-fw fa-edit"></i>
                                </button>

                                <a href="delete-listening/<?= $u->id ?>" class="btn btn-danger btn-hapus">
                                    <i class="fas fa-fw fa-trash"></i>
                                </a>
                            </td>
                            <td><span class="badge badge-success"><?php echo $u->kode_soal ?></span> 
                                <audio controls>
                                    <source src="<?= base_url('assets/uploads/mp3/'.$u->file);?>" type="audio/mpeg">
                                    Browsermu tidak mendukung tag audio, upgrade donk!
                                </audio>
                            </td>
                            <td><?php echo $u->deskripsi ?></td>
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
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Tambah Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white;">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?= base_url('add-listening'); ?>">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><b>Kode / Jenis Soal : </b></label>
                            <div class="form-group">
                            <input type="text" value="LI-<?=$kode?>" name="kode_soal" class="form-control" readonly> <br>
                            <input type="text" value="Listening" name="jenis_soal" class="form-control" readonly>
                                
                            </div>
                        </div>
                        <div class="form-group col-md-9">
                            <label><b>Deskripsi Soal : </b></label>
                            <textarea name="deskripsi" rows="4"class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">                   
                            <label><b>A : </b></label>
                            <div class="form-group">
                                <textarea name="a" rows="5"class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-3">                   
                            <label><b>B : </b></label>
                            <div class="form-group">
                                <textarea name="b" rows="5"class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-3">                   
                            <label><b>C : </b></label>
                            <div class="form-group">
                                <textarea name="c" rows="5"class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-3">                   
                            <label><b>D : </b></label>
                            <div class="form-group">
                                <textarea name="d" rows="5"class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-3">                   
                            <label><b>E : </b></label>
                            <div class="form-group">
                                <textarea name="e" rows="5"class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-3">                   
                            <label><b>Kunci Jawaban : </b></label>
                            <div class="form-group">
                                <select name="jawaban" class="form-control" required>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">                   
                            <label><b>File Pendukung : </b></label>
                            <input type="file" class="form-control" name="file">
                        </div>
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
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Perbarui Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white;">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?= base_url('update-listening'); ?>">
                    <input type="hidden" name="id" id="id-listening" class="form-control">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><b>Kode / Jenis Soal :</b></label>
                            <div class="form-group">
                                <input type="text" id="kode_soal-listening" name="kode_soal" class="form-control" readonly> <br>
                                <input type="text" value="Listening" name="jenis_soal" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-9">
                            <label><b>Deskripsi Soal : </b></label>
                            <textarea name="deskripsi" rows="4" id="deskripsi-listening" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">                   
                            <label><b>A : </b></label>
                            <div class="form-group">
                                <textarea name="a" rows="5" id="a-listening" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-3">                   
                            <label><b>B : </b></label>
                            <div class="form-group">
                                <textarea name="b" rows="5" id="b-listening" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-3">                   
                            <label><b>C : </b></label>
                            <div class="form-group">
                                <textarea name="c" rows="5" id="c-listening" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-3">                   
                            <label><b>D : </b></label>
                            <div class="form-group">
                                <textarea name="d" rows="5" id="d-listening" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-3">                   
                            <label><b>E : </b></label>
                            <div class="form-group">
                                <textarea name="e" rows="5" id="e-listening" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-3">                   
                            <label><b>Kunci Jawaban : </b></label>
                            <div class="form-group">
                                <select name="jawaban" id="jawaban-listening" class="form-control" required>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">                   
                            <label><b>File Pendukung : </b></label>
                            <input type="hidden" id="file-listening" name="old_file" class="form-control" readonly>
                            <input type="file" class="form-control" name="file">
                        </div>
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
    $('.modal-body #id-listening').val($(this).data('id'));
    $('.modal-body #kode_soal-listening').val($(this).data('kode_soal'));
    $('.modal-body #deskripsi-listening').val($(this).data('deskripsi'));
    $('.modal-body #a-listening').val($(this).data('a'));
    $('.modal-body #b-listening').val($(this).data('b'));
    $('.modal-body #c-listening').val($(this).data('c'));
    $('.modal-body #d-listening').val($(this).data('d'));
    $('.modal-body #e-listening').val($(this).data('e'));
    $('.modal-body #jawaban-listening').val($(this).data('jawaban'));
    $('.modal-body #file-listening').val($(this).data('file'));


});
</script>