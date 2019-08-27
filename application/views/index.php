<?php 
print_r(count($listgalang));
// die();
?>
<div class="cover">
  <div class="div-center">
    <h1 style="color:white; text-shadow: 2px 2px 4px #000000;" align="center">
      <b>AYO! BANGUN DESA</b>
      <br>
      <br> 
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 cover_button">
          <a href="<?= base_url('penggalangan') ?>">
            <button type="button" class="btn btn-block btn-primary btn-lg round"><i class="fa fa-credit-card"></i> Mulai Donasi</button>
          </a>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 cover_button">
          <button type="button" class="btn btn-block btn-success btn-lg round"><i class="fa fa-whatsapp"></i> WhatsApp</button>
        </div>
      </div>
    </h1> 
  </div>
</div>
<div class="content-wrapper">
  <div class="container"> 
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-6 mb-md-0 mb-5">
          <div class="small-box bg-purple round">
            <div class="inner">
              <h4>Total Desa Terdaftar</h4>
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
              <h4>Total Galang Dana</h4>
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
              <h2><b>Rp. <?= number_format($donasi[0]['total'],0,',','.'); ?>,-</b></h2>
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
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <?php 
                    for($i = 0; $i < count($listgalang); $i++){ ?>
                      <li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>" class=""></li>
                    <?php } ?>
                  </ol>
                  <div class="carousel-inner">
                    <div class="item  active" style="height: 310px">
                      <img src="<?= $admin_url ?>webfile/ayobangundesa.jpg" style="height: 100%; width: 100%" class="sidebar_mobile">
                      <div class="carousel-caption">
                        Ayo Bangun Desa ! Demi kemajuan desa, kita membangun bersama agar meratanya fasilitas di indonesia.
                      </div>
                    </div>
                    <?php foreach($listgalang as $row){ ?>
                      <div class="item" style="height: 310px">
                        <img src="<?= $admin_url.$row['file_dir'] ?>" alt="<?= $i ?> slide" style="height: 100%; width: 100%" class="sidebar_mobile">
                        <div class="carousel-caption">
                          <?= $row['deskripsi'] ?>
                        </div>
                      </div>
                    <?php } ?>
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
          <a href="<?= base_url('penggalangan') ?>/view/<?= $row['id'] ?>" class="a_black">
            <div class="col-md-6 col-12 mb-md-0 mb-5">
              <div class="box box-solid round">
                <div class="box-body">
                  <img src="<?= $admin_url.$row['file_dir'] ?>" alt="Second slide" style="height: 230px; width: 100%">
                  <h3 align="center"><?= $row['tittleGalang'] ?></h3>
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
                  $terkumpul = $row['terkumpul'];

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
                      <b>Rp <?= number_format($row['terkumpul'],0,',','.'); ?>,-</b>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                      <i class="fa fa-credit-card"></i> Target Donasi
                      <br>
                      <b>Rp <?= number_format($row['targetDonasi'],0,',','.'); ?>,-</b>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                      <i class="fa fa-heart"></i> Terpakai :  
                      <br>
                      <b>Rp. 523.421,-</b>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                      <i class="fa fa-cog"></i> Status :
                      <br>
                      <small class="label pull-right bg-green btn-md round"> 
                        <?php
                        if($row['status'] == 'ENABLE'){
                          echo 'Masih Dibuka';
                        } 
                        ?>
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
    <h1 style="color:white; font-weight: bold; text-shadow: 2px 2px 4px #000000;" align="center">
      LOREM IPSUM<br>
      <small style="color:white; font-weight: bold; text-shadow: 2px 2px 4px #000000;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>
    </h1>
    <br>
    <br>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12 cover_button">
        <a href="<?= base_url('penggalangan') ?>">
          <button type="button" class="btn btn-block btn-primary btn-lg round"><i class="fa fa-credit-card"></i> Mulai Donasi</button>
        </a>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 cover_button">
        <button type="button" class="btn btn-block btn-success btn-lg round"><i class="fa fa-whatsapp"></i> WhatsApp</button>
      </div>
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
        <a href="<?= base_url('news') ?>/view/1" class="a_black">
          <div class="col-md-6 col-12 mb-md-0 mb-5">
            <div class="box box-solid round">
              <div class="box-body">
                <img src="https://cdn.hipwallpaper.com/i/81/44/mweBMY.jpg" alt="Second slide" style="height: 230px; width: 100%">
                <h3 align="center">How Do I Be A Missionary?</h3>
                <p style="text-indent: 15px;">The Missionary Church, in obedience to Jesus Christ his Lord, is devoted to being holy people of God worldwide as well as to building His Church by around the world evangelism, discipleship and reproduction of expanding churches. Sample HTML Template is one of Mobirise's best templates.</p>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                    <i class="fa fa-eye"></i> 45
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                    <i class="fa fa-globe"></i> Malang
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <small class="label bg-blue btn-md round"> 
                      <i class="fa fa-user"></i> <b>Bamabang</b>
                    </small>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                    <small class="label pull-right bg-yellow btn-md round"> 
                      <i class="fa fa-calendar"></i> <b>12-03-2019</b>
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
        <a href="<?= base_url('news') ?>/view/1" class="a_black">
          <div class="col-md-6 col-12 mb-md-0 mb-5">
            <div class="box box-solid round">
              <div class="box-body">
                <img src="https://cdn.hipwallpaper.com/i/81/44/mweBMY.jpg" alt="Second slide" style="height: 230px; width: 100%">
                <h3 align="center">How Do I Be A Missionary?</h3>
                <p style="text-indent: 15px;">The Missionary Church, in obedience to Jesus Christ his Lord, is devoted to being holy people of God worldwide as well as to building His Church by around the world evangelism, discipleship and reproduction of expanding churches. Sample HTML Template is one of Mobirise's best templates.</p>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                    <i class="fa fa-eye"></i> 45
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                    <i class="fa fa-globe"></i> Malang
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <small class="label bg-blue btn-md round"> 
                      <i class="fa fa-user"></i> <b>Bamabang</b>
                    </small>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                    <small class="label pull-right bg-yellow btn-md round"> 
                      <i class="fa fa-calendar"></i> <b>12-03-2019</b>
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
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
    <h1 style="color:white; font-weight: bold; text-shadow: 2px 2px 4px #000000;" align="center">
      LOREM IPSUM<br>
      <small style="color:white; font-weight: bold; text-shadow: 2px 2px 4px #000000;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>
    </h1>
    <br>
    <br>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12 cover_button">
        <a href="<?= base_url('penggalangan') ?>">
          <button type="button" class="btn btn-block btn-primary btn-lg round"><i class="fa fa-credit-card"></i> Mulai Donasi</button>
        </a>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 cover_button">
        <button type="button" class="btn btn-block btn-success btn-lg round"><i class="fa fa-whatsapp"></i> WhatsApp</button>
      </div>
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
        <a href="<?= base_url('story') ?>/view/1" class="a_black">
          <div class="col-md-4 col-12 mb-md-0 mb-5">
            <div class="box box-solid round">
              <div class="box-body">
                <img src="https://cdn.hipwallpaper.com/i/81/44/mweBMY.jpg" alt="Second slide" style="height: 200px; width: 100%">
                <h3 align="center">How Do I Be A Missionary?</h3>
                <p style="text-indent: 15px;">The Missionary Church, in obedience to Jesus Christ his Lord, is devoted to being holy people of God worldwide as well as to building His Church by around the world evangelism.</p>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                    <i class="fa fa-eye"></i> 45
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                    <i class="fa fa-globe"></i> Malang
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <small class="label bg-blue btn-md round"> 
                      <i class="fa fa-user"></i> <b>Bamabang</b>
                    </small>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                    <small class="label pull-right bg-yellow btn-md round"> 
                      <i class="fa fa-calendar"></i> <b>12-03-2019</b>
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
        <a href="<?= base_url('story') ?>/view/1" class="a_black">
          <div class="col-md-4 col-12 mb-md-0 mb-5">
            <div class="box box-solid round">
              <div class="box-body">
                <img src="https://cdn.hipwallpaper.com/i/81/44/mweBMY.jpg" alt="Second slide" style="height: 200px; width: 100%">
                <h3 align="center">How Do I Be A Missionary?</h3>
                <p style="text-indent: 15px;">The Missionary Church, in obedience to Jesus Christ his Lord, is devoted to being holy people of God worldwide as well as to building His Church by around the world evangelism.</p>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                    <i class="fa fa-eye"></i> 45
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                    <i class="fa fa-globe"></i> Malang
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <small class="label bg-blue btn-md round"> 
                      <i class="fa fa-user"></i> <b>Bamabang</b>
                    </small>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                    <small class="label pull-right bg-yellow btn-md round"> 
                      <i class="fa fa-calendar"></i> <b>12-03-2019</b>
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
        <a href="<?= base_url('story') ?>/view/1" class="a_black">
          <div class="col-md-4 col-12 mb-md-0 mb-5">
            <div class="box box-solid round">
              <div class="box-body">
                <img src="https://cdn.hipwallpaper.com/i/81/44/mweBMY.jpg" alt="Second slide" style="height: 200px; width: 100%">
                <h3 align="center">How Do I Be A Missionary?</h3>
                <p style="text-indent: 15px;">The Missionary Church, in obedience to Jesus Christ his Lord, is devoted to being holy people of God worldwide as well as to building His Church by around the world evangelism.</p>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                    <i class="fa fa-eye"></i> 45
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                    <i class="fa fa-globe"></i> Malang
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <small class="label bg-blue btn-md round"> 
                      <i class="fa fa-user"></i> <b>Bamabang</b>
                    </small>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                    <small class="label pull-right bg-yellow btn-md round"> 
                      <i class="fa fa-calendar"></i> <b>12-03-2019</b>
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
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
