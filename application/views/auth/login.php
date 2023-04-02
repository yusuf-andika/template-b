<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Toeic Application - State Polytechnic of Sriwijaya</title>
   <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/backend/') ?>polsri.png">
   <!-- Custom fonts for this template-->
   <link href="<?= base_url('assets/backend/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="<?= base_url('assets/backend/') ?>css/sb-admin-2.min.css" rel="stylesheet">
   <link href="<?= base_url('assets/backend/') ?>sweetalert2/package/dist/sweetalert2.min.css">

</head>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>

<body class="bg-gradient-primary">

   <div class="container">

      <!-- Outer Row -->
      <div class="row justify-content-center">

         <div class="col-xl-5 col-lg-6 col-md-8">

            <div class="card o-hidden border-0 shadow-lg my-5">
               <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="p-5">
                           <div class="text-center">
                              <img src="<?= base_url('assets/backend/') ?>polsri.png" width="140"><br><br>
                              <h1 class="h4 text-gray-900 mb-4"><b>TOEIC APPS</b></h1>
                           </div>
                           <form class="user" action="<?php echo base_url('verification'); ?>" method="post">
                                 <div class="form-group">
                                 <input type="text" class="form-control form-control-user" placeholder="Username" name="username" required autofocus autocomplete="username">
                              </div>
                              <div class="form-group">
                                 <input type="password" class="form-control form-control-user" placeholder="Password" name="password" autocomplete="current-password" required>
                              </div>

                              <input class="btn btn-primary btn-user btn-block" type="submit" value="L O G I N"> <br>
                              <small style="padding-bottom: -30px;">
                                 <center>Jl Srijaya Negara Bukit Besar Palembang, Sumatera Selatan. Kode Pos : 30139</center>
                              </small>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

         </div>

      </div>

   </div>

   <!-- Bootstrap core JavaScript-->
   <script src="<?= base_url('assets/backend/') ?>vendor/jquery/jquery.min.js"></script>
   <script src="<?= base_url('assets/backend/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="<?= base_url('assets/backend/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="<?= base_url('assets/backend/') ?>js/sb-admin-2.min.js"></script>
   <script src="<?= base_url('assets/backend/'); ?>sweetalert2/package/dist/sweetalert2.all.js"></script>
   <script type="text/javascript">
      const dataflash = $('.flash-data').data('flashdata');
      if (dataflash) {
         Swal.fire({
            title: 'Failed Verification',
            text: dataflash,
            confirmButtonColor: '#8e44ad',
            icon: 'error'
         });
      }
   </script>

</body>

</html>