
<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <section class="content-header">
        <ol class="breadcrumb" style="background: #f3f3f3;">
          <li><a href="<?= base_url() ?>"><b>AYO! BANGUN DESA</b></a></li>
          <li class="active"><i class="fa fa-info"></i> <?=$title?> </li>
        </ol>
      </section>
      <div class="row" align="center">
        <h1><i class="fa fa-info"></i> <?=$title?></h1>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid round">
            <div class="box-body">
              <?=$content?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <a href="<?= base_url()?>">            
            <button type="button" class="btn btn-block btn-info btn-lg round">
              <i class="fa fa-home"></i> Kembali Ke Halaman Utama
            </button>
          </a>
        </div>
      </div>
    </section>
  </div>
</div>