<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Event</h1>

          </div>
          
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kategori"><i class="fa fa-plus"></i> Tambah</button> 
                <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');" href="<?= base_url(); ?>Event/dltEvent" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Event</a>
                </div>
                <div class="card-body">
                <?php if($this->session->flashdata("sukses")){ ?>
                <div class="alert alert-success alert-dismissible">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> <?= $this->session->flashdata("sukses"); ?>
                </div>
                <?php }elseif($this->session->flashdata("gagal")){ ?>
                <div class="alert alert-danger alert-dismissible">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Gagal!</strong> <?= $this->session->flashdata("gagal"); ?>
                </div>
                <?php } ?>
                
                <?php if($event->num_rows()==0){ ?>
                 <center><h5><b>Event Kosong</b></h5></center>
                <?php }else{ ?>
                 <div class="table-responsive">
                  <table class="table table-bordered datatable" cellspacing="0">
                  <tr><center><img src="<?= base_url(); ?>img_event/<?= $event->row()->img; ?>" width="200"></center></tr>
                  <br>
                  <tr><b>Tgl.Berakhirkhir :</b> <?= $event->row()->tgl; ?></tr>
                  <br>
                  <tr><b>Syarat & Ketentuan :</b> <?= $event->row()->sk; ?></tr>
                  <br>
                  <tr><b>Minimal Barang/Transaksi :</b> <?= $event->row()->minimal; ?></tr>
                  <br>
                  <tr><b>Poin :</b> <?= $event->row()->poin; ?></tr>
                  </table>
                 </div>
                <?php } ?>
                </div>
              </div>
            </div>    
          </div>
          
          <div class="modal fade" role="dialog" id="kategori">
           <div class="modal-dialog">
           <div class="modal-content">
           <form action="<?= base_url(); ?>Event/addEvent" method="POST" enctype="multipart/form-data">
           <div class="modal-header">
           Form Event
           </div>
           <div class="modal-body">
           <div class="form-group">
           Gambar Event: 
           <input type="file" class="form-control" name="gambar" accept="image/*">
           </div>
           <div class="form-group">
            Tanggal Berakhir :
            <input type="date" class="form-control" name="tgl">
           </div>
           <div class="form-group">
            Syarat & Ketentuan :
            <textarea class="form-control" name="sk"></textarea>
            <div class="form-group">
            Minimal Barang :
            <input type="text" class="form-control" name="minim">
           </div>
           <div class="form-group">
            Poin :
            <input type="text" class="form-control" name="poin">
           </div>
           </div>
           </div>
           <div class="modal-footer">
           <input type="submit" class="btn btn-primary" value="Tambah">
           </div>
           </form>
           </div>
           </div>
          </div>

        </div>
        <!-- /.container-fluid -->