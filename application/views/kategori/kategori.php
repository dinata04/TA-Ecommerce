<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Kategori</h1>

          </div>
          
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                <button type="button" onclick="kategori('tambah','')" class="btn btn-primary" data-toggle="modal" data-target="#kategori"><i class="fa fa-plus"></i> Tambah</a>
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
                   <th>NAMA KATEGORI</th>
                   <th>GAMBAR KATEGORI</th>
                   <th>POIN KATEGORI</th>
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
          
          <div class="modal fade" role="dialog" id="kategori">
           <div class="modal-dialog">
           <div class="modal-content">
           <form action="<?= base_url(); ?>Kategori/actKategori" method="POST" enctype="multipart/form-data">
           <div class="modal-header">
           Form Kategori
           </div>
           <div class="modal-body">
           <div class="form-group">
           Nama Kategori : 
           <input type="hidden" class="form-control" name="type">
           <input type="text" class="form-control" name="nama">
           </div>
           <div class="form-group">
           Gambar Kategori : 
           <input type="file" class="form-control" name="gambar">
           </div>
           <div class="form-group">
            Poin Kategori :
            <input type="text" class="form-control" name="poin">
           </div>
           </div>
           <div class="modal-footer">
           <input type="submit" class="mybtn">
           </div>
           </form>
           </div>
           </div>
          </div>

        </div>
        <!-- /.container-fluid -->