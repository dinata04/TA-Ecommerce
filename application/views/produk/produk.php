<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Produk</h1>

          </div>
          
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                <button type="button" onclick="produk('tambah','','','','','','','')" class="btn btn-primary" data-toggle="modal" data-target="#produk"><i class="fa fa-plus"></i> Tambah</a>
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
                   <th>KATEGORI PRODUK</th>
                   <th>NAMA PRODUK</th>
                   <th>GAMBAR PRODUK</th>
                   <th>DESKRIPSI PRODUK</th>
                   <th>STOK PRODUK</th>
                   <th>HARGA PRODUK</th>
                   <th>DISKON</th>
                   <th>BOBOT</th>
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
          
          <div class="modal fade" role="dialog" id="produk">
           <div class="modal-dialog">
           <div class="modal-content">
           <form action="<?= base_url(); ?>Produk/actProduk" method="POST" enctype="multipart/form-data">
           <div class="modal-header">
           Form Produk
           </div>
           <div class="modal-body">
           <div class="form-group">
           Kategori Produk : 
           <input type="hidden" class="form-control" name="type">
           <select name="kategori" class="form-control">
            <?php foreach ($kategori as $data) { ?>
            <option value="<?= $data->id_kategori; ?>"><?= $data->nama; ?></option>
            <?php } ?>
            </select>
           </div>
           <div class="form-group">
           Nama Produk : 
           <input type="text" class="form-control" name="nama">
           </div>
           <div class="form-group">
           Gambar Produk : 
           <input type="file" class="form-control" name="gambar">
           </div>
           <div class="form-group">
           Deskripsi Produk : 
           <textarea class="form-control" name="deskripsi"></textarea>
           </div>
           <div class="form-group">
           Stok Produk : 
           <input type="number" class="form-control" name="stok">
           </div>
           <div class="form-group">
           Harga Produk : 
           <input type="number" class="form-control" name="harga">
           </div>
           <div class="form-group">
           Diskon Produk (Optional) : 
           <input type="number" class="form-control" name="diskon">
           </div>
           <div class="form-group">
           Bobot : 
           <input type="number" class="form-control" name="bobot">
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