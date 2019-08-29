<?php 
// var_dump($google_login_url);
?>
<h3 align="center"> Masuk Sebagai Donatur</h3>
<form action="#" method="POST" id="login_form">
  <div class="form-group">
    <div class="show_error" id="error_input"></div>
    <!-- <label>Email</label> -->
    <div class="row">
      <div class="col-md-12">
        <a href="<?=$this->google_url?>"> 
          <button type="button" class="btn btn-block pull-right btn-lg btn-primary" id="login-google"><i class="fa fa-google"></i> Login Menggunakan Google</button>
        </a> 
      </div>
    </div>
  </div>
</form>
<script type="text/javascript">
  $("#login-google").click(function(){
    $.ajax({
      type: "POST",
      url: '<?= base_url() ?>AuthLogin/loginProcess/',
      cache: false,
      contentType: false,
      processData: false,
      success: function(response, textStatus, xhr) {
        var str = response;
        if (str.indexOf("success") != -1){
          location.reload();
        }
      },
    });
    return false;
  });


  // $("#login_form").submit(function(){
  //   var mydata = new FormData(this);
  //   var form = $(this);
  //   $.ajax({
  //     type: "POST",
  //     url: form.attr("action"),
  //     data: mydata,
  //     cache: false,
  //     contentType: false,
  //     processData: false,
  //     success: function(response, textStatus, xhr) {
  //       var str = response;
  //       if (str.indexOf("success") != -1){
  //         location.reload();
  //       }else{
  //         $("#error_input").hide().html(response).slideDown("fast");
  //       }
  //     },
  //   });
  //   return false;
  // });

</script>