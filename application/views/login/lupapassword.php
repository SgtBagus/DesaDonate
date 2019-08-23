<div class="login-box-body round">
  <h3 class="login-box-msg">Lupa Password</h3>
  <form action="<?= base_url() ?>" method="post">
    <span>Masukkan Nomor WhatsApp atau Email Anda yang telah terdaftar. Kami akan mengirimkan petunjuk untuk mengubah password Anda.</span>
    <div class="form-group has-feedback">
      <input type="email" class="form-control" placeholder="Nomor WhatsApp atau Email">
    </div>
    <div class="row">
      <div class="col-md-12" align="center">
        <button type="submit" class="btn btn-primary btn-block round">Kirim</button>
        <span style="text-align: right;">Ingat Password? <a href="<?= base_url('login') ?>">Masuk</a></span>
      </div>
    </div>
  </form>
  <br>
</div>