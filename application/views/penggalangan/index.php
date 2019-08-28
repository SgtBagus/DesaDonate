<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <div class="row" align="center">
        <h1><i class="fa fa-archive"></i> Galang Dana Desa </h1>
        <small>Halo #OrangBaik, Siap memberi bantuan ?</small>
      </div>
      <br>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12" align="center"> 
          <div class="row">
            <div class="col-md-4">
              <img src="https://i2.wp.com/www.churchworksmedia.com/wp-content/uploads/2018/11/Give-donate-vector.png?fit=432%2C375&ssl=1" width="150px" height="150px">
            </div>
            <div class="col-md-8">
              <blockquote style="border-left:none">
                <p>No one is useless in this world who lightens the burdens of another.</p>
                <small>Charles Dickens</small>
              </blockquote>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="box box-solid round">
            <div class="box-body">
              <form action="<?= base_url("penggalangan") ?>" method="post">
                <div class="form-group">
                  <h3>Pilih Kategori yang Ingin Anda Bantu</h3>
                  <select class="form-control select2" style="width: 100%;" name="idKategori">
                    <option value=" " selected="">Semua Kategori</option>
                    <?php foreach($kategori as $row){
                      $text="";
                      if($row['idKategori']==$this->session->userdata('idKategori')){
                        $text = "selected";
                      }

                      echo "<option value=".$row['idKategori']." ".$text." >".$row['value']."</option>";
                    }
                    ?>
                  </select>
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
        <?php foreach($listgalang as $row){ ?>
          <li>
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
          </li>
        <?php } ?>
      </div>
      <div class="row" align="center">
        <button type="button" id="loadMore" class="btn btn-primary btn-lg round">
          <i class="fa fa-search"></i> Tampilkan Lebih Banyak
        </button>
        <button type="button" id="showLess" class="btn btn-danger btn-lg round">
          <i class="fa fa-search"></i> Tampilkan Lebih Sedikit
        </button>
      </div>
    </section>
  </div>
</div>