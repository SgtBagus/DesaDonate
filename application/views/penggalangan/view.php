<?php 
// var_dump($donaturwaktu);
// die();
foreach($listgalang as $row){

  ?>
  <div class="content-wrapper">
    <div class="container">
      <section class="content">
        <div class="row">
          <div class="col-md-8">
            <h1>
              <b><?= $row['tittleGalang'] ?></b>
            </h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <img src="<?= $admin_url.$row['file_dir'] ?>" alt="Second slide" style="height: 390px; width: 100%" class="round">
            <br>
            <p style="text-indent: 10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="col-md-4">            
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                <h4><i class="fa fa-globe"></i> <?= $row['desa_value'] ?></h4>  
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                <h4><i class="fa fa-list-ul"></i> <?= $row['kategori'] ?> </h4>  
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 div_status">
                <?php
                if($row['status'] == 'ENABLE'){
                  echo '<div class="alert alert-success alert-dismissible round status-alert" align="center">
                  <i class="fa fa-check-circle"></i> <b>Masih Dibuka</b>
                  </div>';
                } 
                ?>
              </div>
            </div>
            <div class="box box-solid round">
              <div class="box-body">
                <div align="center">
                  <h3><i class="fa fa-credit-card"></i> Total Donasi</h3>
                </div>
                <h2><b>Rp <?= number_format($row['terkumpul'],0,',','.'); ?>,-</b></h2>
                <?php
                $target = $row['targetDonasi'];
                $terkumpul = $row['terkumpul'];

                $persen = ($terkumpul/$target)*100;

                ?>
                <div class="progress-xs" style="margin-bottom: 10px">
                  <div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?= $persen.'%' ?>">
                    <span class="sr-only"> <?= $persen.'%' ?></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                    <b><?= round($persen, 2).' %' ?></b> Tercapai
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                    <b>Rp <?= number_format($row['targetDonasi'],0,',','.'); ?>,-</b>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-block btn-primary btn-lg round" data-toggle="modal" data-target="#modal-donate">
              <i class="fa fa-credit-card"></i> Donasi Sekarang
            </button>
            <br>
            Penggalangan dana dimulai <b><?= $row['dibuat'] ?></b> oleh:
            <a href="<?= base_url('/profil') ?>/asdsd" class="a_black">
              <div class="box box-solid round">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-4" align="center">
                      <img src="<?= base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="80px" height="80px">
                    </div>
                    <div class="col-md-8">
                      <h4><b><?= $row['namaPenggalang'] ?> </b><i class="fa fa-check-circle" style="color:blue"></i></h4>
                      <small>Member since <?= $row['userdibuat'] ?></small>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="box box-solid round">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <p>
                      <?= $row['deskripsiGalang'] ?>
                    </p>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <h4>Donatur (13) :</h4>
                    <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_donatur_1" data-toggle="tab" aria-expanded="false">Waktu</a></li>
                        <li class=""><a href="#tab_donatur_2" data-toggle="tab" aria-expanded="false">Update</a></li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="tab_donatur_1">
                          <div class="row">
                            <div class="col-md-12">
                              <?php foreach($donaturwaktu as $row){ ?>
                                <a href="<?= base_url('/profil') ?>/ <?= $row['id'] ?>" class="a_black">
                                  <div class="row">
                                    <div class="col-md-4" align="center">
                                      <img src="<?= base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="80px" height="80px">
                                    </div>
                                    <div class="col-md-8">
                                      <h3><b>Rp <?= number_format($row['nominalDonasi'],0,',','.'); ?>,-</b></h3>
                                      <h5><b><?= $row['namaUser'] ?></b></h5>
                                    </div>
                                  </div>
                                </a>
                              <?php } ?>
                              <br>
                              <div class="row">
                                <button type="submit" class="btn btn-block btn-primary btn-lg round"><i class="fa fa-search"></i> Tampilkan lebih Banyak</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab_donatur_2">
                          <table id="datatable-update" class="table table-bordered table-striped" >
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Dana Terpakai</th>
                                <th>Pemberita</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $no = 1;
                              foreach($updategalang as $row){?>
                                <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= $row['tglupdate'] ?></td>
                                  <td><?= $row['deskripsiUpdate'] ?></td>
                                  <td><?= $row['nominalterpakai'] ?></td>
                                  <td><?= $row['name'] ?></td>
                                </tr>
                              <?php } ?>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" align="center">
          <div class="col-md-12">
            <button type="submit" class="btn btn-block btn-primary btn-lg round" data-toggle="modal" data-target="#modal-donate">
              <i class="fa fa-credit-card"></i> Donasi Sekarang
            </button>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<?php } ?>

<div class="modal modal-default fade" id="modal-donate" style="display: none;">
  <div class="modal-dialog round">
    <div class="modal-content round">
      <div class="modal-header top-round bg-green">
        <h4 class="modal-title" align="center"><i class="fa fa-credit-card"></i> Donasi Sekarang</h4>
      </div>
      <div class="modal-body">
        <?php
        if($this->session->userdata('session_sop') == true){
          ?>
          <form action="<?= base_url('penggalangan')?>/donate/" method="POST">
            <div class="form-group">
              <label>Nominal Uang</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-credit-card"> Rp. </i>
                </div>
                <input type="text" class="number-separator form-control" placeholder="Masukan Nominal uang..">
              </div>
            </div>
            <div class="form-group">
              <label>Catatan : </label>
              <textarea class="form-control" rows="3" placeholder="Masukan catatan yang ingin disampaikan"></textarea>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" checked>
                  Tampil atas Nama !
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6" align="left">
                <button type="button" class="btn pull-left btn-block btn-md btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
              </div>
              <div class="col-md-6" align="right">
                <button type="submit" class="btn btn-block pull-right btn-md btn-primary"><i class="fa fa-credit-card"></i> Kirim</button>
              </div>
            </div>
          </form>
          <?php
        } else if($this->session->userdata('session_sop') == ""){
          ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
            Mohon untuk Melakukan Login Masuk Terlebih Dahulu !
          </div>
          <h3 align="center"> Masuk Sebagai Donatur</h3>
          <form action="<?= base_url('#')?>/" method="POST">
            <div class="form-group">
              <label>Email</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope"></i>
                </div>
                <input type="email" class="form-control" placeholder="Masukan Email anda">
              </div>
              <span style="text-align: right;"><a href="<?= base_url('login/') ?>lupapassword">Lupa Password?</a></span>
            </div>
            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-block pull-right btn-md btn-primary"><i class="fa fa-sign-in"></i> Masuk</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12" align="center">
                <span>Belum Punya Akun? <a href="<?= base_url('login/') ?>daftar">Daftar</a></span>
              </div>
            </div>
          </form>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>