<?php 
// var_dump($donaturwaktu);
// die();
foreach($listgalang as $row){

?>
<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <h1>
            <b><?= $row['tittleGalang'] ?></b>
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <img src="<?= $admin_url.$row['file_dir'] ?>" alt="Second slide" style="height: 360px; width: 100%" class="round">
          <br>
          <p style="text-indent: 10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="col-md-4">            
          <div class="box box-solid round">
            <div class="box-body">
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
                  <b><?= $persen.'%' ?></b> Tercapai
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                  <b>Rp <?= number_format($row['targetDonasi'],0,',','.'); ?>,-</b>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-block btn-primary btn-lg round"><i class="fa fa-money"></i> Donasi Sekarang</button>
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
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Detail</a></li>
                  <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Update</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="row">
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <p>
                        <?= $row['deskripsiGalang'] ?>
                        </p>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <h4>Donatur (13) Berdasarkan :</h4>
                        <div class="nav-tabs-custom">
                          <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_donatur_1" data-toggle="tab" aria-expanded="false">Waktu</a></li>
                            <li class=""><a href="#tab_donatur_2" data-toggle="tab" aria-expanded="false">Jumlah</a></li>
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
                                        <h5><b><?= $row['namaUser'] ?> </b><i class="fa fa-check-circle" style="color:blue"></i></h5>
                                        <!-- <small>Member since Nov. 2012</small>
                                        <p> The European languages are members of the same family.</p> -->
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
                                  <a href="<?= base_url('/profil') ?>/asdsd" class="a_black">
                                    <div class="row">
                                      <div class="col-md-4" align="center">
                                        <img src="<?= base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="80px" height="80px">
                                      </div>
                                      <div class="col-md-8">
                                        <h3><b>Rp. 130.000,00,-</b></h3>
                                        <h5><b>Alexander Pierce </b><i class="fa fa-check-circle" style="color:blue"></i></h5>
                                        <small>Member since Nov. 2012</small>
                                        <p> The European languages are members of the same family.</p>
                                      </div>
                                    </div>
                                  </a>
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
                  <div class="tab-pane" id="tab_2">
                    <table class="table" border=0>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Dana Terpakai</th>
                        <th>Pemberita</th>
                      </tr>
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
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" align="center">
        <div class="col-md-12">
          <h3>
            Penggalangan dana ini mencurigakan? <a href="">Laporkan</a>
          </h3>
          <button type="submit" class="btn btn-block btn-primary btn-lg round"><i class="fa fa-money"></i> Donasi Sekarang</button>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">      
          <div class="box box-solid round">
            <div class="box-body">
              <div class="col-md-8 col-sm-8 col-xs-12" align="center">
                <h3>Mau buat halaman untuk galang dana online seperti ini?</h3>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="<?= base_url('penggalangan') ?>/create/">   
                <button type="submit" class="btn btn-block btn-primary btn-lg round"><i class="fa fa-plus"></i> Buat Penggalangan</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<?php } ?>