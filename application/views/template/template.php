<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Advanced form elements</title>
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

    .skin-blue .main-header li.user-header {
      background-color: #6177e2;
    }

    .a_black{
      color: #323439;
    }

    .a_black:hover{
      color: #323439;
    }

    .a_black:active{
      color: #323439;
    }

    .a_black:focus{
      color: #323439;
    }

    .progress-xs{
      background-color: #f3f3f3;
    }

    .avatar{
      background: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGF0592ieHaEF-YdkHjuFkW49zv9Ee_OtA2S1NdIONI5bbnD2FZA");
      background-size: 100% 100%;
    }
    
    .list-group-item{
      border: 0px;
    }

    .list-group-item:hover{    
      color: #fff;
      background-color: #337ab7;
      border-color: #337ab7;
    }
    
    .nav-tabs-custom{
      box-shadow: none;
    }

    .navbar-nav>.user-menu>.dropdown-menu>li.user-header {
        height: 160px;
    }
    
    .navbar-nav>.user-menu>.dropdown-menu>.user-body {
        padding: 5px;
    }

  </style>
</head>
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?= base_url()?>" class="navbar-brand"><b>Admin</b>LTE</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="#"><i class="fa fa-plus"></i> Buat Penggalangan</a></li>
              <li><a href="<?= base_url('penggalangan') ?>"><i class="fa fa-money"></i> Donasi</a></li>
              
            </ul>
          </div>
          <?php
          if($this->session->userdata('session_sop') == true){
          ?>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= base_url()?>/assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->session->userdata('nama') ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?= base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $this->session->userdata('nama') ?>
                      <small><?php echo $this->session->userdata('email') ?></small>
                    </p>
                  </li>
                  <li class="user-body">
                  <div class="row">
                      <div class="col-md-3">
                        <a href="<?= base_url('profil') ?>/asds/">
                          <button type="button" class="btn btn-block btn-info"><i class="fa fa-user"></i></button>
                        </a>
                      </div>  
                      <div class="col-md-6">
                        <a href="<?= base_url('dashboard') ?>">
                          <button type="button" class="btn btn-block btn-primary">Dashboard</button>
                        </a>
                      </div>  
                      <div class="col-md-3">
                        <a href="<?= base_url('login/logout') ?>">
                          <button type="button" class="btn btn-block btn-danger"><i class="fa fa-sign-out"></i></button>
                        </a>
                      </div>        
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <?php
          }
          ?>
          <?php
              if($this->session->userdata('session_sop') == ""){
              ?>
              <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
              <li><a href="<?= base_url('login') ?>">Login</a></li>
              </ul>
              </div>
              <?php
              }
              ?>
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
  <script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
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
  <script src="<?= base_url('assets/') ?>plugins/iCheck/icheck.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>

  <script>
    $(function () {
      $('.select2').select2()
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      $('[data-mask]').inputmask()

      $('#reservation').daterangepicker()
      $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
      $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
      )

      $('#datepicker').datepicker({
        autoclose: true
      })

      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
      })

      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass   : 'iradio_minimal-red'
      })

      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
      })

      $('.my-colorpicker1').colorpicker()
      $('.my-colorpicker2').colorpicker()

      $('.timepicker').timepicker({
        showInputs: false
      })
  
      $('#datatable').DataTable({
        "paging"      : true,
        "lengthChange": false,
        "searching"   : true,
        "ordering"    : true,
        "info"        : false,
        "autoWidth"   : false,
        "scrollY": true,
        "scrollX": true,
        "language": {
          "search": "<b> Pencarian : </b>",
          "zeroRecords": function () {
            return "<img src='https://icon-library.net/images/no-data-icon/no-data-icon-20.jpg' width='100px' height='100px'><p><b>Tidak Ada Data</b><p>";
          },
          "paginate": {
            "previous": "Sebelumnya",
            "next" : "Selanjutnya"
          }
        },
      })
    })

    $("#btnFile").click(function() {
      document.getElementById('imageFile').click();
    });

    $("#imageFile").change(function() {
      imagePreview(this);
    });

    function imagePreview(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#preview_image').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
</body>
</html>