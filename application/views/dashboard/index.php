<?php
if(!($this->session->userdata('session_sop'))){
    header("Location: ".base_url());
}
?>
<div class="content-wrapper">
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h1>Dashboard </h1>
                    <div class="box box-solid round avatar">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12" align="center">
                                <?php foreach($biodata as $row) { ?>
                                    <img src="<?= base_url().$row['fotoUser'] ?>" class="img-circle" alt="User Image" width="100px" height="100px">
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?= base_url('/dashboard/account') ?>/edit/">
                            <button type="submit" class="btn btn-block btn-primary btn-md round"><i class="fa fa-edit"></i> Ubah Profil</button>
                            </a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-solid round">
                                <div class="box-body">
                                    <ul class="list-group list-group-unbordered">
                                        <a href="<?= base_url('dashboard') ?>">
                                            <li class="list-group-item a_black" style="margin-bottom: 5px;" id="overview">
                                                <i class="fa fa-dashboard"></i> Overview
                                            </li>
                                        </a>
                                        <a href="<?= base_url('dashboard/donasi') ?>">
                                            <li class="list-group-item a_black" style="margin-bottom: 5px;" id="donasi">
                                                <i class="fa fa-money"></i> Donasi Saya
                                            </li>
                                        </a>
                                        <a href="<?= base_url('dashboard/cerita') ?>">
                                            <li class="list-group-item a_black" style="margin-bottom: 5px;" id="cerita">
                                                <i class="fa fa-camera  "></i> Cerita Saya
                                            </li>
                                        </a>
                                        <a href="<?= base_url('dashboard/account') ?>">
                                            <li class="list-group-item a_black" style="margin-bottom: 5px;" id="account">
                                                <i class="fa fa-user"></i> Akun Saya
                                            </li>
                                        </a>
                                    </ul>
                                    <a href="<?= base_url('AuthLogin/logout') ?>"><button type="button" class="btn btn-block btn-danger btn-md"><i class="fa fa-sign-out"></i> Logout</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-6 col-xs-12">
                    <?php 
                        if($content == 'overview'){
                            $this->load->view('dashboard/overview');
                        }else if($content == 'penggalangan'){
                            $this->load->view('dashboard/penggalangan');
                        }else if($content == 'donasi'){
                            $this->load->view('dashboard/donasi');
                        }else if($content == 'account'){
                            $this->load->view('dashboard/account');
                        }else if($content == 'cerita'){
                            $this->load->view('dashboard/cerita');
                        }else if($content == 'addstory'){
                            $this->load->view('dashboard/addstory');
                        }else{
                            $this->load->view('errors/html/error_404.php');
                        } 
                    ?>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    $(document).ready(function() {
        if('<?= $content ?>' == 'overview'){
            $("#overview").addClass("active");
        }else if('<?= $content ?>' == 'penggalangan'){
            $("#penggalangan").addClass("active");
        }else if('<?= $content ?>' == 'donasi'){
            $("#donasi").addClass("active");
        }else if('<?= $content ?>' == 'account'){
            $("#account").addClass("active");
        }
    });
</script>