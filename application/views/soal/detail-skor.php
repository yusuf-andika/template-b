<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800"><b><?=$subtitle?></b></h1>
    <p class="mb-4">Pada halaman ini anda dapat memantau mahasiswa yang telah melaksanakan test pada aplikasi ini.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort" width="20">NO.</th>
                            <th>SOAL TEST</th>
                            <th width="50">ANS</th>
                            <th width="50">KET</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($query as $u) {
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td>
                                <?= $u->deskripsi ?>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-success"><?= $u->jawab ?></button>
                            </td>
                            <td>
                                <?php
                                if ($u->jawab == $u->jawaban) {
                                    echo '<button class="btn btn-sm btn-success">
                                            T
                                            </button>';
                                }else{
                                    echo '<button class="btn btn-sm btn-danger">
                                            F
                                            </button>';
                                }
                                ?>
                            </td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
