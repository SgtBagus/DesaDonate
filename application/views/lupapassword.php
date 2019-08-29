<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <section class="content-header">
        <ol class="breadcrumb" style="background: #f3f3f3;">
          <li><a href="<?= base_url() ?>"><b>AYO! BANGUN DESA</b></a></li>
          <li class="active"><i class="fa fa-lock"></i> Lupa Password</li>
        </ol>
      </section>
      <div class="row" align="center">
        <h1><i class="fa fa-lock"></i> Lupa Password</h1>
        <small>Masukkan Nomor WhatsApp atau Email Anda yang telah terdaftar. Kami akan mengirimkan petunjuk untuk mengubah password Anda.</small>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid round">
            <div class="box-body">
              <form action="<?= base_url("#") ?>" method="post">
              <div class="form-group">
                <h4>Nomor WhatsApp atau Email</h4>
                <input type="text" class="form-control" placeholder="Masukan Nomor WhatsApp atau Email">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary btn-lg"><i class="fa fa-send"></i> Kirim</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>