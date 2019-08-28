<h3 align="center"> Masuk Sebagai Donatur</h3>
<form action="<?= base_url('actlogin/login')?>/" method="POST" id="login_form">
  <div class="form-group">
    <div class="show_error" id="error_input"></div>
    <label>Email</label>
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-envelope"></i>
      </div>
      <input type="email" class="form-control" name="email" placeholder="Masukan Email anda">
    </div>
    <span style="text-align: right;"><a href="<?= base_url('lupa_password') ?>">Lupa Password?</a></span>
  </div>
  <div class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-block pull-right btn-md btn-primary"><i class="fa fa-sign-in"></i> Masuk</button>
    </div>
  </div>
  <div class="row">
    <!-- <div class="col-md-12" align="center">
      <span>Belum Punya Akun? <a href="<?= base_url('login/') ?>daftar">Daftar</a></span>
    </div> -->
  </div>
</form>
<script type="text/javascript">
  $("#login_form").submit(function(){
    var mydata = new FormData(this);
    var form = $(this);
    $.ajax({
      type: "POST",
      url: form.attr("action"),
      data: mydata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response, textStatus, xhr) {
        var str = response;
        if (str.indexOf("success") != -1){
          location.reload();
        }else{
          $("#error_input").hide().html(response).slideDown("fast");
        }
      },
    });
    return false;
  });
</script>