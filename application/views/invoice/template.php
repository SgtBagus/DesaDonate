<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ayo Bangun Desa</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/iCheck/all.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="<?= base_url('assets/') ?>/jquery/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="<?= base_url('assets/') ?>custom/css_custom.css">
  <style>
    #myList li{ display:none;
      list-style-type:none;
    }
    #showLess {
      display:none;
    }
  </style>
</head>
<body class="hold-transition skin-green layout-top-nav">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?= base_url()?>" class="navbar-brand"><b>AYO! BANGUN DESA</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <?php
          if($this->session->userdata('session_sop') == true){
          ?>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= base_url().$this->session->userdata('foto') ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->session->userdata('nama') ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?= base_url().$this->session->userdata('foto') ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $this->session->userdata('nama') ?>
                      <small><?php echo $this->session->userdata('email') ?></small>
                    </p>
                  </li>
                  <li class="user-body">
                    <div class="row">
                      <div class="col-md-3">
                        <a href="<?= base_url('profil/'.$this->session->userdata('id')) ?>">
                          <button type="button" class="btn btn-block btn-info"><i class="fa fa-user"></i></button>
                        </a>
                      </div>  
                      <div class="col-md-6">
                        <a href="<?= base_url('dashboard') ?>">
                          <button type="button" class="btn btn-block btn-primary">Dashboard</button>
                        </a>
                      </div>  
                      <div class="col-md-3">
                        <a href="<?= base_url('actlogin/logout') ?>">
                          <button type="button" class="btn btn-block btn-danger"><i class="fa fa-sign-out"></i></button>
                        </a>
                      </div>        
                    </div>
                  </li>
                  <li>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="refresh">
                      <i class="fa fa-refresh"></i>
                    </button>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <?php
        } else if($this->session->userdata('session_sop') == ""){
        ?>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li><a href="#" data-toggle="modal" data-target="#modal-login">Login</a></li>
            <li>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="refresh">
                <i class="fa fa-refresh"></i> 
              </button>
            </li>
          </ul>
        </div>
        <?php
      }
      ?>
    </div>
  </nav> 
</header>
<div class="row" style="height: 45px;background-color: #f3f3f3;"></div>
<?=$contents?>
<div class="modal modal-default fade" id="modal-login" style="display: none;">
  <div class="modal-dialog round">
    <div class="modal-content round">
      <div class="modal-header top-round bg-green">
        <h4 class="modal-title" align="center"><b>Login<b></h4>
        </div>
        <div class="modal-body">
          <?php $this->load->view('modals/login_form') ?>
        </div>
      </div>
    </div>
  </div>
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs"> 
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2019 Made with <span style=color:#e25555>&#10084;</span> in Banyuwangi by <a href="https://www.karyastudio.com/">Karya Studio Teknologi Digital</a> x <a href="https://www.ayokumpul.com/">Komunitas Ayo Kumpul</a>
      </div>
    </footer>
  </div>
  <script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/moment/min/moment.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/ckeditor/ckeditor.js"></script> 
  <script src="<?= base_url('assets/') ?>plugins/iCheck/icheck.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
  <script src="<?= base_url('assets/') ?>custom/number-separator.js"></script>
</body>
</html>