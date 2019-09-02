<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <section class="content-header">
        <ol class="breadcrumb" style="background: #f3f3f3;">
          <li><a href="<?= base_url() ?>"><b>AYO! BANGUN DESA</b></a></li>
          <li class="active"><i class="fa fa-camera-retro"></i> Aku Dan Ceritaku</li>
        </ol>
      </section>
      <div class="row" align="center">
        <h1><i class="fa fa-camera-retro"></i> Aku Dan Ceritaku</h1>
        <small>Silakan Memilih Cerita Orang Orang Terkini</small>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
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
        
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid round">
            <div class="box-body">
              <form action="<?= base_url("story") ?>" method="post">
                <div class="row">
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="form-group">
                      <h4>Cari Cerita Milik : </h4>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" name="username" placeholder="Masukan Nama Pengguna">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                      <h4>Urutkan Berdasarkan : </h4>
                      <select class="form-control select2" name="idKategori">
                        <option value="" selected="">Paling Baru</option>
                        <option value="likes">Paling Disukai</option>
                        <option value="views">Views Paling Banyak</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-block btn-primary btn-lg"><i class="fa fa-search"></i> Cari</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="myList">
        <?php foreach($listcerita as $row){ ?>
          <li>  
            <a href="<?= base_url('story') ?>/view/<?= $row['id'] ?>" class="a_black">
              <div class="col-md-4 col-12 mb-md-0 mb-5">
                <div class="box box-solid round">
                  <div class="box-body">
                    <img src="<?= base_url().$row['dir'] ?>" alt="Second slide" style="height: 230px; width: 100%">
                    <h3 align="center">
                      <?= strlen($row["judulCerita"]) > 20 ? substr($row["judulCerita"], 0, 20)."..." : $row["judulCerita"] ?>    
                    </h3>
                    <p style="text-indent: 15px;"><?= $row['sinopsisCerita'] ?>... "Klik untuk baca lebih lanjut."</p>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                        <i class="fa fa-eye"></i> <?= $row['views'] ?>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                        <small class="label pull-right bg-blue btn-md round"> 
                          <i class="fa fa-user"></i> <b><?= $row['namaUser'] ?></b>
                        </small>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                        <i class="fa fa-heart" style="color: red;"> </i> <b><?= $row['likes'] ?></b>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                        <small class="label pull-right bg-yellow btn-md round"> 
                          <i class="fa fa-calendar"> </i> <b><?= $row['tanggal'] ?></b>
                        </small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </li>
        <?php } ?>
      </div>
      <div class="row" align="center">
        <button type="button" id="loadMore" class="btn btn-primary btn-lg round">
          <i class="fa fa-search"></i> Tampilkan Lebih Banyak
        </button>
      </div>
    </section>
  </div>
</div>

<div class="modal modal-default fade" id="modal-story" style="display: none;">
  <div class="modal-dialog round">
    <div class="modal-content round">
      <div class="modal-header top-round bg-green">
        <h4 class="modal-title" align="center"><i class="fa fa-camera-retro"></i> Aku Dan Ceritaku</h4>
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