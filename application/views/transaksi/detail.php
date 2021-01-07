<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Transaksi</h1>

          </div>
          
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header">
                <a href="<?= base_url(); ?>Transaksi/cetak/<?= $this->uri->segment(3); ?>" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
                </div>
                <div class="card-body">
                <center><h4 style="font-weight : bold; color : black;">Nabillah Store</h4></center>
                 <hr>
                 <div class="nota-header">
                  <div class="nota-header1">
                  <strong>NOTA : </strong><?= $transaksi->nota; ?><br>
                  <strong>NAMA : </strong><?= ucwords($transaksi->nama); ?>
                  </div>
                  <div class="nota-header2">
                  <strong>KOTA : </strong><?= ucwords($transaksi->kota); ?><br>
                  <strong>TGL.PEMBELIAN : </strong><?= $transaksi->create_at; ?>
                  </div>
                 </div>
                 <div class="nota-detail">
                 <strong>Detail Transaksi :</strong>
                 </div>
                 <div class="nota-body">
                 <div class="table-responsive">
                 <table class="table table-bordered" cellspacing="0">
                 <thead style="text-align : center; background-color :#eee;">
                 <tr>
                 <th>NO</th>
                 <th>NAMA BARANG</th>
                 <th>JUMLAH</th>
                 <th>TOTAL</th>
                 </tr>
                 </thead>
                 
                 <tbody style="text-align : center">
                 <?php 
                 $nmr=1;
                 foreach($detail as $data){ ?>
                 <tr>
                 <td><?= $nmr++; ?></td>
                 <td><?= $data->nama; ?></td>
                 <td><?= $data->qty; ?></td>
                 <td><?= number_format($data->total,0,",","."); ?></td>
                 </tr>
                 <?php } ?>
                 <tr>
                 <td colspan="3" style="text-align : right;">Total Pembayaran : </td>
                 <td><?= number_format($transaksi->total,0,",","."); ?></td>
                 </tr>
                 </tbody>
                 </table>
                 </div>
                 </div>
                </div>
              </div>
            </div>    
          </div>         
                     
       </div>