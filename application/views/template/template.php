<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Top Navigation</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css">

      .cover {
        width: 100%;
        height: 500px;
        max-height: 100%;
        margin: 0;
        padding: 0;
        background-image: url("https://i.imgur.com/LBNoA1W.png");
        background-size: 100% 100%;
        /*background-attachment: fixed;*/
        background-repeat: no-repeat;
        position: relative;
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
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="<?= base_url()?>assets/index2.html" class="navbar-brand"><b>Admin</b>LTE</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Pencarian">
                </div>
              </form>
            </div>
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <li><a href="#"><i class="fa fa-money"></i> Donasi</a></li>
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?= base_url()?>/assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                    <span class="hidden-xs">Alexander Pierce</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="user-header">
                      <img src="<?= base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      <p>
                        Alexander Pierce - Web Developer
                        <small>Member since Nov. 2012</small>
                      </p>
                    </li>
                    <li class="user-body">
                      <button type="button" class="btn btn-block btn-primary btn-sm">Dashboard</button>
                      <button type="button" class="btn btn-block btn-danger btn-sm">Keluar</button>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <?=$contents?>
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
          </div>
          <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
          reserved.
        </div>
      </footer>
    </div>
    <script src="<?= base_url()?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url()?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url()?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?= base_url()?>/assets/dist/js/adminlte.min.js"></script>
    <script src="<?= base_url()?>/assets/dist/js/demo.js"></script>
  </body>
</html>
