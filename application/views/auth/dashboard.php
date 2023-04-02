<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><b>Dashboard</b></h1>
        <?php date_default_timezone_set('Asia/Jakarta'); ?>
        <h5 style="font-weight: bold;" id="jam"></h5>
    </div>

    <div class="row">
        
        <?php
        $user = $this->db->query("SELECT * from user ");
        $user = $user->num_rows();
        ?>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-6 col-xl-3 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user ?> dosir</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Toeic Application</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort" width="20">NO.</th>
                            <th>WAKTU</th>
                            <th>EMAIL</th>
                            <th>NAMA</th>
                            <th>JUDUL</th>
                            <th>ISI PESAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script type="text/javascript">
    window.onload = function() {
        jam();
    }

    function jam() {
        var e = document.getElementById('jam'),
            d = new Date();
        Y = d.getFullYear();
        m = d.getMonth();
        t = d.getDate();
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        e.innerHTML = h + ':' + m + ':' + s + ' WIB';

        setTimeout('jam()', 1000);
    }

    function set(e) {
        e = e < 10 ? '0' + e : e;
        return e;
    }
    </script>
</div>