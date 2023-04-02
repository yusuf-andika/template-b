<div class="container-fluid">
    
    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800"><b><?=$title?> Test</b></h1>
    <p class="mb-4">Pada halaman ini anda dapat memantau mahasiswa yang telah melaksanakan test pada aplikasi ini.</p>    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort" width="20">NO.</th>
                            <th>AKSI</th>
                            <th>KODE</th>
                            <th>NIM - NAMA</th>
                            <th>KELAS - TGL TEST</th>
                            <th>SKOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($query as $u) {
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td width="50">
                                <a href="view-detail/<?= urlencode(base64_encode($u->kode_test)) ?>" class="btn btn-success">
                                    <i class="fas fa-fw fa-eye"></i>
                                </a>
                            </td>
                            <td width="80"><b><?php echo $u->kode_test ?></b></td>
                            <td><?php echo $u->nim ?> - <?php echo $u->nama ?></td>
                            <td width="180"><b><?php echo $u->kelas ?></b> - <b><?php echo $u->tanggal ?></b></td>
                            <td width="50">
                                <a href="#" class="btn btn-info btn-sm">
                                    <?php echo $u->skor ?>
                                </a>
                            </td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
