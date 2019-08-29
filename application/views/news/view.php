<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <h1>
            <b><?= $berita['judulberita'] ?></b>
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <img src="<?= $admin_url.$berita_image['dir'] ?>" alt="Second slide" style="height: 390px; width: 100%" class="round">
        </div>
        <div class="col-md-4">            
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6" align="left">
              <h5>
                <i class="fa fa-globe"></i>

                "Ini Nama Desa Berita 'Belum ada tabel nya'"
                
              </h5> 
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6" align="right">
              <h5>
                <i class="fa fa-list-ul"></i>
                <?= $kategori['value'] ?>
              </h5> 
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="button" class="btn btn-block btn-success round">
                <i class="fa fa-whatsapp"></i> <b> Hubungi Whatsapp</b>
              </button>
            </div>
          </div>
          <br>
          Kabar Desa dilihat sebanyak <b><?= $berita['views'] ?> Orang</b> dan dibuat pada <b><?= date_format(date_create($berita['created_at']), 'd-m-Y'); ?></b> oleh:
          <br><br>
          <a href="<?= base_url('/profil') ?>/asdsd" class="a_black">
            <div class="box box-solid round">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-4" align="center">
                    <img src="<?= base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="80px" height="80px">
                  </div>
                  <div class="col-md-8">
                    <h4><b><?= $user['name'] ?></b></h4>
                    <small><?= $userDesa['value'] ?></small>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid round">
            <div class="box-body">
              <?= $berita['isiBerita'] ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row" align="center">
        <div class="col-md-12">
          <a href="<?=  base_url('news') ?>">
            <button type="button" class="btn btn-block btn-info btn-lg round">
              <i class="fa fa-newspaper-o"></i> Apa Kabar Desa Lainya !
            </button>
          </a>
        </div>
      </div>
    </section>
  </div>
</div>