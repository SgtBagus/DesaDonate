<?php 
// var_dump($google_login_url);
?>
<h3 align="center"> Masuk Sebagai Donatur</h3>
<form action="#" method="POST" id="login_form">
  <div class="form-group">
    <div class="show_error" id="error_input"></div>
    <!-- <label>Email</label> -->
    <div class="row">
      <div class="col-md-12" align="center">
        <a href="<?=$this->google_url?>" class="btn btn-block btn-social btn-login btn-md round">
          <img src="http://transformations-spafitness.com/wp-content/uploads/2013/11/google-logo-icon-PNG-Transparent-Background-1.png">
          <div class="row" align="center">
            Masuk Dengan Google
          </div>
        </a>
      </div>
    </div>
  </div>
</form>
<script type="text/javascript">
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