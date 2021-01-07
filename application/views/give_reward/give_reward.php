<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Give Reward</h1>

          </div>
          
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
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
                   <th>NAMA LENGKAP</th>
                   <th>USERNAME</th>
                   <th>NAMA REWARD</th>
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
       </div>
        <!-- /.container-fluid -->