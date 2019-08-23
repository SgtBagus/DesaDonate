<div class="login-box-body round">
  <h3 class="login-box-msg">Masuk Sebagai Donatur</h3>
  <form action="<?= base_url('login/act_login')?>" method="post">
    <div class="form-group has-feedback">
      <input type="email" class="form-control" name="email" placeholder="Email">
      <span class="fa fa-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <span style="text-align: right;"><a href="<?= base_url('login/') ?>lupapassword">Lupa Password?</a></span>
    </div>
    <div class="row">
      <div class="col-md-12" align="center">
        <button type="submit" class="btn btn-primary btn-block round">Masuk</button>
        <span style="text-align: right;">Belum Punya Akun? <a href="<?= base_url('login/') ?>daftar">Daftar</a></span>
      </div>
    </div>
  </form>
  <br>
</div>