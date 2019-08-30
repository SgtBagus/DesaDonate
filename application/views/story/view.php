<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <section class="content-header">
        <ol class="breadcrumb" style="background: #f3f3f3;">
          <li><a href="<?= base_url() ?>"><b>AYO! BANGUN DESA</b></a></li>
          <li><a href="<?= base_url('story') ?>"><i class="fa fa-camera-retro"></i> Aku Dan Ceritaku Lainnya</a></li>
          <li class="active"><?= $cerita['judulCerita'] ?></li>
        </ol>
      </section>
      <br>
      <div class="row">
        <div class="col-md-8">
          <h1>
            <b><?= $cerita['judulCerita'] ?></b>
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <img src="<?= base_url().$cerita_image['dir'] ?>" alt="Second slide" style="height: 390px; width: 100%" class="round">
          <br><br>
          <?= $cerita['sinopsisCerita'] ?>
        </div> 
        <div class="col-md-4">            
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6" align="left">
              <h5>
                <i class="fa fa-eye"></i> <?= $cerita['views'] ?>
              </h5> 
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6" align="right">
              <h5>
                <i class="fa fa-heart" style="color: red;"></i> 21
              </h5> 
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="button" class="btn btn-block btn-danger round">
                <i class="fa fa-heart"></i> <b> Saya Menyukai Cerita ini</b>
              </button>
            </div>
          </div>
          <br>
          <?= $cerita['judulCerita'] ?> dibuat pada <b><?= date_format(date_create($cerita['created_at']), 'd-m-Y'); ?></b> oleh:
          <br><br>
          <a href="<?= base_url('/profil/'.'1') ?>" class="a_black">
            <div class="box box-solid round">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-4" align="center">
                    <img src="<?= base_url().$user['fotoUser'] ?>" class="img-circle" alt="User Image" width="80px" height="80px">
                  </div>
                  <div class="col-md-8">
                    <h4><b><?= $user['namaUser'] ?></b></h4>
                    <small>Bergabung pada tanggal <br>
                      <i class="fa fa-calendar"></i> <b><?= date_format(date_create($user['created_at']), 'd-m-Y'); ?></b></small>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            <div class="row">
              <div class="col-md-12">
                <button type="button" class="btn btn-block btn-success round">
                  <i class="fa fa-whatsapp"></i> <b> Hubungi Pembuat Cerita</b>
                </button>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                
                  <?php 
                    if($cerita['idUser'] == $this->session->userdata('id')){
                  ?>
                  <a href="<?= base_url('story/edit/'.$cerita['idCerita']) ?>">
                    <button type="button" class="btn btn-block btn-primary round">
                      <i class="fa fa-camera-retro"></i> <b> Edit Cerita !</b>
                    </button>
                  </a>
                    <?php }else{ ?>
                      <?php if($this->session->userdata('session_sop') == ''){ ?>
                        <button type="button" class="btn btn-block btn-primary btn-lg round" data-toggle="modal" data-target="#modal-story">
                          <i class="fa fa-camera-retro"></i> <b> Buat Cerita !</b>
                        </button>
                      <?php }else{ ?>
                      <a href="<?= base_url('dashboard/addstory') ?>">
                        <button type="button" class="btn btn-block btn-primary btn-lg round">
                          <i class="fa fa-camera-retro"></i> <b> Buat Cerita !</b>
                        </button>
                      </a>
                      <?php } ?>
                    <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <h3 align="center"><i class="fa fa-camera-retro"></i> Isi Cerita </h3>
          <div class="col-md-12">
            <div class="box box-solid round">
              <div class="box-body">
              <?= $cerita['isiCerita'] ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row" align="center">
          <div class="col-md-12">
            <a href="<?=  base_url('story') ?>">
              <button type="button" class="btn btn-block btn-info btn-lg round">
                <i class="fa fa-camera-retro"></i> Aku Dan Ceritaku Lainnya
              </button>
            </a>
          </div>
        </div>
      </section>
    </div>
  </div>
  
  <div class="modal modal-default fade" id="modal-story" style="display: none;">
    <div class="modal-dialog round">
      <div class="modal-content round">
        <div class="modal-header top-round bg-green">
          <h4 class="modal-title" align="center"><i class="fa fa-credit-card"></i> Donasi Sekarang</h4>
        </div>
        <div class="modal-body">
          <?php
          if($this->session->userdata('session_sop') == true){
            $this->load->view('modals/story_form');
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