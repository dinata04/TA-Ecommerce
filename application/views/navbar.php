<?php
if(!$this->session->userdata("id")){
redirect("Auth/login");
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Nabillah Store</title>
  
  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" integrity="sha256-piqEf7Ap7CMps8krDQsSOTZgF+MU/0MPyPW2enj5I40=" crossorigin="anonymous" />
  <!--<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/Sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?= base_url(); ?>assets/Sbadmin/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/data.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Nabillah Store</div>
      </a>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      
      <!-- Nav Item - Data Login -->
      <li class="nav-item akun">
      <a class="nav-link" href="<?= base_url(); ?>Akun">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Akun</span></a>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      
      <!-- Nav Item - Data Login -->
      <li class="nav-item iklan">
        <a class="nav-link" href="<?= base_url(); ?>Iklan">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Iklan</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      
      <!-- Nav Item - Pelajaran -->
      <li class="nav-item kategori">
      <a class="nav-link" href="<?= base_url(); ?>Kategori">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Kategori</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      
      <!-- Nav Item - Pelajaran -->
      <li class="nav-item kategori">
      <a class="nav-link" href="<?= base_url(); ?>Event">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Event</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      
      <!-- Nav Item - Pelajaran -->
      <li class="nav-item produk">
      <a class="nav-link" href="<?= base_url(); ?>Produk">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Produk</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      
      <!-- Nav Item - Pelajaran -->
      <li class="nav-item reward">
      <a class="nav-link" href="<?= base_url(); ?>Reward">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Reward</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      
      <!-- Nav Item - Pelajaran -->
      <li class="nav-item give">
      <a class="nav-link" href="<?= base_url(); ?>Give_Reward">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Give Reward</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      
      <!-- Nav Item - Pelajaran -->
      <li class="nav-item transaksi">
      <a class="nav-link" href="<?= base_url(); ?>Transaksi">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Transaksi</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      
      <!-- Nav Item - Pelajaran -->
      <li class="nav-item profile">
      <a class="nav-link" href="<?= base_url(); ?>Profile">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Profile</span></a>
      </li>
      
      <hr class="sidebar-divider">
     
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="<?= base_url(); ?>assets/ic_logo.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->