<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Iklan</h1>

          </div>
          
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#iklan"><i class="fa fa-plus"></i> Tambah</a>
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
                   <th>GAMBAR IKLAN</th>
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
          
          <div class="modal fade" role="dialog" id="iklan">
           <div class="modal-dialog">
           <div class="modal-content">
           <form action="<?= base_url(); ?>Iklan/actIklan" method="POST" enctype="multipart/form-data">
           <div class="modal-header">
           Form Iklan
           </div>
           <div class="modal-body">
           <div class="from-group">
           Gambar Iklan : 
           <input type="file" class="form-control" name="gambar">
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