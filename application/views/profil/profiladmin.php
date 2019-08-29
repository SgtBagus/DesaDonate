<div class="cover">
  <div class="row">
      <div class="div-center" align="center">
      <?php foreach($biodata as $row) { ?>
        <img src="<?= $admin_url.$row['dir'] ?>" class="img-circle" alt="User Image" width="250px" height="250px">
        <h1 style="color:white; font-weight: bold; text-shadow: 2px 2px 4px #000000;" align="center"><?= $row['name'] ?></h1>
        <h3 style="color:white; font-weight: bold; text-shadow: 2px 2px 4px #000000;" align="center"><?= $row['namaDesa'] ?></h3>
        <h5 style="color:white; font-weight: bold; text-shadow: 2px 2px 4px #000000;" align="center"> Terdaftar pada Tanggal <?= $row['tanggal'] ?></h5>
        <p style="color:white; font-weight: bold; text-shadow: 2px 2px 4px #000000;" align="center"> 
        <?= $row['desc'] ?>
        </p>
      <?php } ?>
      </div>
  </div>
</div>
<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <div class="row">
        <div class="col-md-4">        
          <div class="box box-solid round">
            <div class="box-body">
              <div class="row">
                <div class="col-md-4" align="center">
                  <img src="https://img.freepik.com/free-vector/background-with-people-doing-donation_23-2147558145.jpg?size=338&ext=jpg" class="img-circle" alt="User Image" width="75px" height="75px">
                </div>
                <div class="col-md-8">
                  <h4><b><?= $jumlahgalang[0]['jumlah'] ?></b></h4>
                  Penggalangan Dana
                </div>
              </div>
            </div>
          </div>  
        </div>
        <div class="col-md-4">        
          <div class="box box-solid round">
            <div class="box-body">
              <div class="row">
                <div class="col-md-4" align="center">
                  <img src="https://img.freepik.com/free-vector/background-with-people-doing-donation_23-2147558145.jpg?size=338&ext=jpg" class="img-circle" alt="User Image" width="75px" height="75px">
                </div>
                <div class="col-md-8">
                  <h4><b><?= $jumlahdonasi[0]['jumlahdonasion'] + $jumlahdonasi[0]['jumlahdonasioff'] ?></b></h4>
                  Jumlah Donasi
                </div>
              </div>
            </div>
          </div>  
        </div>
        <div class="col-md-4">        
          <div class="box box-solid round">
            <div class="box-body">
              <div class="row">
                <div class="col-md-4" align="center">
                  <img src="https://img.freepik.com/free-vector/money-bag-exchange_23-2147510722.jpg?size=338&ext=jpg" class="img-circle" alt="User Image" width="75px" height="75px">
                </div>
                <div class="col-md-8">
                  <h4><b>Rp <?= number_format($totaldonasi[0]['donasion'] + $totaldonasi[0]['donasioff'],0,',','.'); ?>,-</b></h4>
                  Donasi Tersalurkan
                </div>
              </div>
            </div>
          </div>  
        </div>
      </div>
      <div class="box box-solid round">
        <div class="box-body">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false"><i class="fa fa-money"></i> <b>Penggalanganku</b></a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><i class="fa fa-plus"></i> <b>Berita dari Desaku</b></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">        
                <?php foreach($listgalang as $row) { ?>
                    <a href="<?= base_url('penggalangan') ?>/view/<?= $row['idGalang'] ?>" class="a_black">
                        <div class="col-md-4 col-12 mb-md-0 mb-5">
                            <div class="box box-solid round">
                            <div class="box-body">
                                <img src="<?= $admin_url.$row['file_dir'] ?>" alt="Second slide" style="height: 180px; width: 100%">
                                <h4 align="center">
                                <?= strlen($row["tittleGalang"]) > 25 ? substr($row["tittleGalang"],0,25)."..." : $row["tittleGalang"] ?>
                                </h4>
                                <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                                    <h5>
                                    <i class="fa fa-globe"></i>
                                    <?= strlen($row["desa_value"]) > 15 ? substr($row["desa_value"],0,15)."..." : $row["desa_value"] ?>
                                    </h5> 
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                                    <h5><i class="fa fa-list-ul"></i> <?= $row['kategori'] ?> </h5>  
                                </div>
                                </div>
                                <?php
                                $target = $row['targetDonasi'];
                                $terkumpul = $row['donasion'] + $row['donasioff'];
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
                  <button type="button" class="btn btn-primary btn-lg round">
                    <i class="fa fa-search"></i> Tampilkan Lebih Banyak
                  </button>
                </div>
              </div>
              <div class="tab-pane" id="tab_2">
                <div class="row">
                <?php foreach($listberita as $row) { ?>
                    <div class="col-md-4 col-6 mb-md-0 mb-5">
                    <a href="<?= base_url('news') ?>/view/<?= $row['id'] ?>" class="a_black">
                        <div class="box box-solid round">
                            <div class="box-body">
                            <img src="<?= $admin_url.$row['dir'] ?>" alt="Second slide" style="height: 230px; width: 100%">
                            <h3 align="center"><?= substr($row['judulberita'] , 0,20)?>...</h3>
                            <p style="text-indent: 15px;"><?= $row['isiBerita'] ?>...</p>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                                <i class="fa fa-eye"></i> <?= $row['views'] ?>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                                <i class="fa fa-globe"></i> <?= $row['namadesa'] ?>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                <small class="label bg-blue btn-md round"> 
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
                    </a>
                    </div>
                <?php } ?>
                </div>
                <div class="row" align="center">
                  <button type="button" class="btn btn-primary btn-lg round">
                    <i class="fa fa-search"></i> Tampilkan Lebih Banyak
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>