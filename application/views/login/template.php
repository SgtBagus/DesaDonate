<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">

    .cover {
      background: url("https://i.imgur.com/LBNoA1W.png") no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      height: 0%;
    }

    .div-center {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      padding: 2rem;
    }

    .round {
      border-radius: 20px;
    }

  </style>
</head>
<body class="hold-transition login-page cover">
  <div class="login-box">
    <div class="login-logo">
        <img src="<?= base_url('webfile/')?>/login/logo.png">
    </div>
    <?=$contents?>
  </div>
  <script src="<?= base_url() ?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>
</html>
