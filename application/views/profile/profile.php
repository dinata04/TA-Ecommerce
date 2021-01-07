<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>

          </div>
          
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                 <center>Data Profile</center>               </div>
                 <form action="<?= base_url(); ?>Profile/actAkun" method="POST">
                 <div class="card-body">
                  <div class="form-group">
                   Username :
                   <input type="text" class="form-control" name="username" value="<?= $akun->username; ?>">
                  </div>
 <div class="form-group">
 Password : 
                   <input type="text" class="form-control" name="password" value="<?= $akun->password; ?>">
                  </div>
                   <div class="form-group">
 Kota : 
 <select id="kotaProfile" name="kota" class="form-control">
  <?php foreach($kota->result() as $data){ ?>
  <?php if($akun->kota==$data->id_kota){ ?>
  <option value="<?= $data->id_kota; ?>" selected><?= $data->kota; ?></option>
  <?php }else{ ?>
    <option value="<?= $data->id_kota; ?>"><?= $data->kota; ?></option>

  <?php } ?>
  <?php } ?>
 </select>
                  </div>

                </div>
                <div class="card-footer">
                 <input type="submit" class="btn btn-info" value="Update Profile">
                </div>
                </form>
              </div>
            </div>    
          </div>
                    <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                 <center>Data No.rek</center>               </div>
                 <form action="<?= base_url(); ?>Profile/actRek" method="POST">
                 <div class="card-body">
<div class="form-group">
                   NAMA PEMILIK :
                   <input type="text" class="form-control" name="nama" value="<?= $rek->num_rows()>0? $rek->row()->nama : ""; ?>">
                  </div>
<div class="form-group">
                   Type BANK :
                   <input type="text" class="form-control" name="type" value="<?= $rek->num_rows()>0? $rek->row()->type : ""; ?>">
                  </div>
                  <div class="form-group">
                   No.Rek :
                   <input type="number" class="form-control" name="rek" value="<?= $rek->num_rows()>0? $rek->row()->rek : ""; ?>">
                  </div>
                </div>
                <div class="card-footer">
                 <input type="submit" class="btn btn-info" value="Update No.Rek">
                </div>
                </form>
              </div>
            </div>    
          </div>

        </div>
        <!-- /.container-fluid -->