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
            <br><br>
            <p style="text-indent: 10px;"><?= $row['deskripsiGalang'] ?></p>
          </div>
          <div class="col-md-4">            
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6" align="left">
              <?php if(strlen($row['desa_value']) > 15){ ?>
                          <h5><i class="fa fa-globe"></i> <?= substr($row['desa_value'], 0, 15) ?>...</h5> 
                        <?php } else {
                          ?>
                          <h5><i class="fa fa-globe"></i> <?= $row['desa_value'] ?></h5> 
                        <?php } ?>   
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6" align="right">
              <?php if(strlen($row['kategori']) > 15){ ?>
                          <h5><i class="fa fa-list-ul"></i> <?= substr($row['kategori'], 0, 15) ?>...</h5> 
                        <?php } else {
                          ?>
                          <h5><i class="fa fa-list-ul"></i> <?= $row['kategori'] ?></h5> 
                        <?php } ?> 
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 div_status">
                <?php
                  if($row['publish'] == 'Masih Dibuka'){
                ?>
                  <div class="alert alert-success alert-dismissible round status-alert" align="center">
                    <i class="fa fa-check-circle"></i> <b>Masih Dibuka</b>
                  </div>
                <?php
                  } else {
                ?>
                  <div class="alert alert-danger alert-dismissible round status-alert" align="center">
                    <i class="fa fa-ban"></i> <b>Sudah Ditutup</b>
                  </div>
                <?php
                  }
                ?>
              </div>
            </div>
            <?php
                $target = $row['targetDonasi'];
                $terkumpul = $row['donasion'] + $row['donasioff'];
                // var_dump($terkumpul);
                $persen = ($terkumpul/$target)*100;

                ?>
            <div class="box box-solid round">
              <div class="box-body">
                <div align="center">
                  <h3><i class="fa fa-credit-card"></i> Total Donasi</h3>
                </div>
                <h2><b>Rp <?= number_format($terkumpul,0,',','.'); ?>,-</b></h2>
                
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
            <button type="button" class="btn btn-block btn-primary btn-lg round" data-toggle="modal" data-target="#modal-donate">
              <i class="fa fa-credit-card"></i> Donasi Sekarang
            </button>
            <br>
            Penggalangan dana dimulai <b><?= $row['dibuat'] ?></b> oleh:
            <br><br>
            <a href="<?= base_url('/profil') ?>/asdsd" class="a_black">
              <div class="box box-solid round">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-4" align="center">
                      <img src="<?= base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="80px" height="80px">
                    </div>
                    <div class="col-md-8">
                      <h4><b><?= $row['namaPenggalang'] ?> </b><i class="fa fa-check-circle" style="color:blue"></i></h4>
                      <small><?= $row['desa_value'] ?></small>
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
                      <?= $row['detailGalang'] ?>
                    </p>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <h4>Donatur :</h4>
                    <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_donatur_1" data-toggle="tab" aria-expanded="false">Online</a></li>
                        <li class=""><a href="#tab_donatur_2" data-toggle="tab" aria-expanded="false">Offline</a></li>
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
                                      <h5>
                                        <b>
                                        <?php
                                          if($row['statusDonatur'] == 1){
                                              echo $row['namaUser'];
                                          } 
                                          else{
                                            echo 'Anonim';
                                          }
                                        ?>
                                        </b>
                                      </h5>
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
                          <div class="row">
                            <div class="col-md-12">
                              <?php foreach($donaturoff as $row){ ?>
                                <a href="" class="a_black">
                                  <div class="row">
                                    <div class="col-md-4" align="center">
                                      <img src="<?= base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="80px" height="80px">
                                    </div>
                                    <div class="col-md-8">
                                      <h3><b>Rp <?= number_format($row['nominalDonasi'],0,',','.'); ?>,-</b></h3>
                                      <h5>
                                        <b>
                                        <?php
                                          if($row['statusDonatur'] == 1){
                                              echo $row['namaDonatur'];
                                          } 
                                          else{
                                            echo 'Anonim';
                                          }
                                        ?>
                                        (Offline Donatur)
                                        </b>
                                      </h5>
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
            <button type="button" class="btn btn-block btn-primary btn-lg round" data-toggle="modal" data-target="#modal-donate">
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
          $this->load->view('modals/donate_form');
        } else if($this->session->userdata('session_sop') == ""){
          ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
            Mohon untuk Melakukan Login Masuk Terlebih Dahulu !
          </div>
          <?php $this->load->view('modals/login_form');
        }
        ?>
      </div>
    </div>
  </div>
</div>