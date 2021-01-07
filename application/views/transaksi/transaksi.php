<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>

          </div>
          
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                 <form action="<?= base_url(); ?>Transaksi/laporan" method="POST">
                  <div class="btn-group">
                   <div class="form-group">
                    <input type="month" name="waktu" class="form-control">
                   </div>
                   <div class="form-group">
                   <input type="submit" class="btn btn-primary" value="Cetak">
                   </div>
                  </div>
                 </form>
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
                 <div class="table-responsive">
                  <table class="table table-bordered datatable" cellspacing="0">
                  <thead style="text-align : center">
                  <tr>
                   <th>NO</th>
                   <th>NOTA</th>
                   <th>NAMA LENGKAP</th>
                   <th>USERNAME</th>
                   <th>KOTA</th>
                   <th>TOTAL</th>
                   <th>BUKTI</th>
                   <th>RESI</th>
                   <th>ALAMAT</th>
                   <th>CREATE_AT</th>
                   <th>STATUS</th>
                   <th>AKSI</th>
                  </tr>
                  </thead>
                  
                  <tbody style="text-align : center">
                  </tbody>
                  </table>
                 </div>
                </div>
              </div>
            </div>    
          </div>         
          
          <div class="modal fade" role="dialog" id="transaksi">
           <div class="modal-dialog">
            <div class="modal-content">
             <form action="Transaksi/upResi" method="POST">
             <div class="modal-body">
              <div style="text-align : center;" id="bukti"></div>
              <div style="margin-top : 30px" class="form-group">
               <input type="hidden" name="id_transaksi">
               Resi :
               <input type="text" class="form-control" name="resi" placeholder="Masukkan Resi" required>
              </div>
             </div>
             <div class="modal-footer">
              <input type="submit" class="btn btn-info" value="Submit">
             </div>
             </form>
            </div>
           </div>
          </div>
                     
       </div>