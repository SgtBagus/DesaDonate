<div class="content-wrapper" style="min-height: 655px;">
    <div class="container">
      <section class="content">
        <section class="content-header">
          <ol class="breadcrumb" style="background: #f3f3f3;">
            <li><a href="<?=base_url()?>"><b>AYO! BANGUN DESA</b></a></li>
            <li><a href=""><i class="fa fa-archive"></i> Informasi</a></li>
            <li class="active"><?=$data[0]->title?></li>
          </ol>
        </section>
        <br>
        <div class="row">
          <div class="col-md-8">
            <h1>
              <b><?=$data[0]->title?></b>
            </h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="box box-solid round">
              <div class="box-body">
                <div class="nav-tabs-custom">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_detail_1">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-12">
                              <p style="text-align:justify;">
                              <?=$data[0]->content?>
                               </p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <h4 style="margin:0px;padding:0px;">Informasi Lainnya :</h4>
                              <div class="nav-tabs-custom">
                               
                               <br>
                                    <div class="row">
                                        
                                        <?php
                                      
                                          $lainnya = $this->db->query("SELECT * FROM webpage WHERE status='ENABLE' ORDER BY prioritas ASC")->result();

                                        ?>

                                        <?php 
                                          $no = 0; foreach($lainnya as $a){  $no++;
                                        ?>
<div class="col-md-12">
                                        <a href="<?=base_url()?>web/<?=$a->slug?>" class="a_black">
                                   <p>
                                              <?=$a->title?>
                                      </p>        
                                          </a>
                                          </div>   
                                          <?php } ?>
                                       
                                    
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab_detail_2">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="row" align="center">
                            <h3><b>Update Terbaru</b></h3>
                          </div>
                          <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>Deskripsi</th>
                                  <th>Dana Terpakai</th>
                                  <th>Pemberita</th>
                                </tr>
                              </thead>
                              <tbody>
                                                                  <tr>
                                    <td colspan="5" align="center">
                                      <img src="https://icon-library.net/images/no-data-icon/no-data-icon-20.jpg" width="100px" height="100px"><p><b>Tidak Ada Data</b></p><p>
                                      </p></td>
                                    </tr>
                                                                  </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row" align="center">
            <div class="col-md-12">
              <a href = "<?= base_url('penggalangan') ?>" class="btn btn-block btn-primary btn-lg round">
                <i class="fa fa-credit-card"></i> Donasi Sekarang
              </a>
            </div>
          </div>
        </section></div>
      
    </div>