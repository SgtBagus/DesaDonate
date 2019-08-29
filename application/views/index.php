<?php 
print_r(count($listgalang));
?>
<div class="cover">
  <div class="div-center">
    <h1 style="color:white; font-size: 44px; font-weight: bold; text-shadow: 2px 2px 4px #000000;" align="center">
      AYO BANGUN DESA<br>
    </h1>
    <br>
    <div class="col-md-6 col-sm-6 col-xs-12 " align="center">
      <a href="<?= base_url('penggalangan') ?>">
        <button type="button" class="btn btn-block btn-primary btn-lg round cover_button"><i class="fa fa-credit-card"></i> Mulai Donasi</button>
      </a>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12" align="center">
      <button type="button" class="btn btn-block btn-success btn-lg round cover_button"><i class="fa fa-whatsapp"></i> WhatsApp</button>
    </div>
  </div>
</div>
<div class="content-wrapper">
  <div class="container"> 
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-6 mb-md-0 mb-5">
          <div class="small-box bg-purple round">
            <div class="inner">
              <h4>Jumlah Desa Terdaftar</h4>
              <h2><b><?= $total_desa[0]['jumlah'] ?></b></h2> 
            </div>
            <div class="icon">
              <i class="fa fa-home"></i>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-md-0 mb-5">
          <div class="small-box bg-green round">
            <div class="inner">
              <h4>Jumlah Galang Dana</h4>
              <h2><b><?= $total_galang[0]['jumlah'] ?></b></h2>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-md-0 mb-5">
          <div class="small-box bg-blue round">
            <div class="inner">
              <h4>#OrangBaik Tergabung</h4>
              <h2><b><?= $donatur[0]['jumlah']?></b></h2>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-md-0 mb-5">
          <div class="small-box bg-orange round">
            <div class="inner">
              <h4>Total Dana Terkumpul</h4>
              <h2><b>Rp. <?= number_format($donasi,0,',','.'); ?>,-</b></h2>
            </div>
            <div class="icon">
              <i class="fa fa-credit-card"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid round">
            <div class="row box-body">
              <div class="col-md-6" align="center">
                <img src="https://i2.wp.com/www.churchworksmedia.com/wp-content/uploads/2018/11/Give-donate-vector.png?fit=432%2C375&ssl=1" width="150px" height="150px">
                <br>
                <blockquote style="border-left:none">
                  <p>No one is useless in this world who lightens the burdens of another.</p>
                  <small>Charles Dickens</small>
                  <a href="<?= base_url('penggalangan') ?>">
                    <button type="button" class="btn btn-primary btn-lg round"><i class="fa fa-credit-card"></i> Mulai Donasi</button>
                  </a>
                </blockquote>
              </div>
              <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <?php 
                    for($i = 0; $i < count($listgalang); $i++){ $no = '1'; ?>
                      <li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>" class="" id="li-carousel-<?= $no ?>"></li>
                    <?php $no++; } ?>
                  </ol>
                  <div class="carousel-inner">
                    <?php 
                    foreach($listgalang as $row){ $no = '1'; ?>
                    <div class="item" style="height: 310px" id="carousel-<?= $no ?>">
                      <a href="<?= base_url('penggalangan/view/'.$row['idGalang'])?>">
                        <img src="<?= $admin_url.$row['file_dir'] ?>" alt="<?= $i ?> slide" style="height: 100%; width: 100%" class="sidebar_mobile">
                        <div class="carousel-caption">
                          <?= $row['deskripsi'] ?>
                        </div>
                      </a>
                    </div>
                    <?php $no++;
                  } ?>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row" align="center">
      <h1><i class="fa fa-archive"></i> Galang Dana Desa </h1>
      <small>Halo #OrangBaik, Siap memberi bantuan ?</small>
    </div>
    <br>
    <div class="row">
      <?php foreach($listgalang as $row){ ?>
        <a href="<?= base_url('penggalangan') ?>/view/<?= $row['idGalang'] ?>" class="a_black">
          <div class="col-md-6 col-12 mb-md-0 mb-5">
            <div class="box box-solid round">
              <div class="box-body">
                <img src="<?= $admin_url.$row['file_dir'] ?>" alt="Second slide" style="height: 230px; width: 100%">
                <h3 align="center">
                  <?= strlen($row["tittleGalang"]) > 25 ? substr($row["tittleGalang"],0,25)."..." : $row["tittleGalang"] ?> 
                </h3>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                    <h4><i class="fa fa-globe"></i> <?= $row['desa_value'] ?></h4>  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                    <h4><i class="fa fa-list-ul"></i> <?= $row['kategori'] ?> </h4>  
                  </div>
                </div>
                <?php
                $target = $row['targetDonasi'];
                $terkumpul = $row['donasion'] + $row['donasioff'];
                  // var_dump($terkumpul);
                $persen = ($terkumpul/$target)*100;

                ?>
                <div class="progress-xs" style="margin-bottom: 10px">
                  <div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?= $persen.'%' ?>">
                    <span class="sr-only">20% Complete</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                    <i class="fa fa-credit-card"></i> Terkumpul
                    <br>
                    <b>Rp <?= number_format($terkumpul,0,',','.'); ?>,-</b>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                    <i class="fa fa-credit-card"></i> Target Donasi
                    <br>
                    <b>Rp <?= number_format($row['targetDonasi'],0,',','.'); ?>,-</b>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                    <i class="fa fa-heart"></i> Terpakai :  
                    <br>
                    <b>Rp <?= number_format($row['terpakai'],0,',','.'); ?>,-</b>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                    <i class="fa fa-cog"></i> Status :
                    <br>
                    <?php
                    if($row['publish'] == 'Masih Dibuka'){
                      ?>
                      <small class="label pull-right bg-green btn-md round"> 
                        Masih Dibuka
                      </small>
                      <?php
                    } else {
                      ?>
                      <small class="label pull-right bg-red btn-md round"> 
                        Sudah Ditutup
                      </small>
                      <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      <?php } ?>
    </div>
    <div class="row" align="center">
      <a href="<?= base_url('penggalangan') ?>">
        <button type="button" class="btn btn-primary btn-lg round">
          <i class="fa fa-search"></i> Lihat Semua Penggalangan
        </button>
      </a>
    </div>
  </section>
</div>
</div>
<div class="cover">
  <div class="div-center">
    <h1 style="color:white; font-size: 44px; font-weight: bold; text-shadow: 2px 2px 4px #000000;" align="center">
      LOREM IPSUM<br>
      <small style="color: white; font-size: 25px; ">Lorem ipsum dolor sit amet</small>
    </h1>
    <br>
    <div class="col-md-6 col-sm-6 col-xs-12 " align="center">
      <a href="<?= base_url('penggalangan') ?>">
        <button type="button" class="btn btn-block btn-primary btn-lg round cover_button"><i class="fa fa-credit-card"></i> Mulai Donasi</button>
      </a>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12" align="center">
      <button type="button" class="btn btn-block btn-success btn-lg round cover_button"><i class="fa fa-whatsapp"></i> WhatsApp</button>
    </div>
  </div>
</div>
<div class="content-wrapper">
  <div class="container"> 
    <section class="content">
      <div class="row" align="center">
        <h1><i class="fa fa-newspaper-o"></i> Apa Kabar Desa</h1>
        <small>Silakan Memilih untuk Membaca Detail Kabar Berita Terkini</small>
      </div>
      <br>
      <div class="row">
        <?php foreach($listberita as $row){ ?>
          <a href="<?= base_url('news') ?>/view/<?= $row['id'] ?>" class="a_black">
            <div class="col-md-6 col-12 mb-md-0 mb-5">
              <div class="box box-solid round">
                <div class="box-body">
                  <img src="<?= $admin_url.$row['dir'] ?>" alt="Second slide" style="height: 230px; width: 100%">
                  <h3 align="center"><?= $row['judulberita'] ?></h3>
                  <p style="text-indent: 15px;"><?= $row['isiBerita'] ?>...</p>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                      <i class="fa fa-eye"></i> <?= $row['views'] ?>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                      <i class="fa fa-globe"></i> <?= $row['namadesa'] ?>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <small class="label pull-left bg-blue btn-md round"> 
                        <i class="fa fa-user"></i> <b><?= $row['name'] ?></b>
                      </small>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                      <small class="label pull-right bg-yellow btn-md round"> 
                        <i class="fa fa-calendar"></i> <b><?= $row['tanggal'] ?></b>
                      </small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        <?php } ?>
      </div>
      <div class="row" align="center">
        <a href="<?= base_url('news') ?>">
          <button type="button" class="btn btn-primary btn-lg round">
            <i class="fa fa-search"></i> Lihat Semua Berita
          </button>
        </a>
      </div>
    </section>
  </div>
</div>
<div class="cover">
  <div class="div-center">
    <h1 style="color:white; font-size: 44px; font-weight: bold; text-shadow: 2px 2px 4px #000000;" align="center">
      LOREM IPSUM<br>
      <small style="color: white; font-size: 25px; ">Lorem ipsum dolor sit amet</small>
    </h1>
    <br>
    <div class="col-md-6 col-sm-6 col-xs-12 " align="center">
      <a href="<?= base_url('penggalangan') ?>">
        <button type="button" class="btn btn-block btn-primary btn-lg round cover_button"><i class="fa fa-credit-card"></i> Mulai Donasi</button>
      </a>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12" align="center">
      <button type="button" class="btn btn-block btn-success btn-lg round cover_button"><i class="fa fa-whatsapp"></i> WhatsApp</button>
    </div>
  </div>
</div>
<div class="content-wrapper">
  <div class="container"> 
    <section class="content">
      <div class="row" align="center">
        <h1><i class="fa fa-camera-retro"></i> Aku dan Ceritaku</h1>
        <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>
      </div>
      <br>
      <div class="row">
        <?php foreach($listcerita as $row){ ?>
          <a href="<?= base_url('cerita') ?>/view/<?= $row['id'] ?>" class="a_black">
            <div class="col-md-4 col-12 mb-md-0 mb-5">
              <div class="box box-solid round">
                <div class="box-body">
                  <img src="<?= $admin_url.$row['dir'] ?>" alt="Second slide" style="height: 230px; width: 100%">
                  <h3 align="center">
                    <?= strlen($row["judulCerita"]) > 20 ? substr($row["judulCerita"], 0, 20)."..." : $row["judulCerita"] ?>    
                  </h3>
                  <p style="text-indent: 15px;"><?= $row['isiCerita'] ?>... "Klik untuk baca lebih lanjut."</p>
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
        <?php } ?>
      </div>
      <div class="row" align="center">
        <a href="<?= base_url('story') ?>">
          <button type="button" class="btn btn-primary btn-lg round">
            <i class="fa fa-search"></i> Lihat Semua Aku dan Cerita
          </button>
        </a>
      </div>
    </section>
  </div>
</div> 
<script type="text/javascript">
  $(document).ready(function () {
    $("#carousel-1").addClass("active");
    $("#li-carousel-1").addClass("active");
  });
</script>