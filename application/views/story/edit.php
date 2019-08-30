<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <section class="content-header">
        <ol class="breadcrumb" style="background: #f3f3f3;">
          <li><a href="<?= base_url() ?>"><b>AYO! BANGUN DESA</b></a></li>
          <li><a href="<?= base_url('story') ?>"><i class="fa fa-camera-retro"></i> Aku Dan Ceritaku Lainnya</a></li>
          <li class="active"><?= $cerita['judulCerita'] ?></li>
        </ol>
      </section>
      <br>
      <form action="<?= base_url('story')?>/update" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-8">
            <h1><b>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                <input type="hidden" name="idCerita" class="story-edit" value="<?= $this->uri->segment(3); ?>" placeholder="Masukan Judul Cerita Anda">
                <input type="text" name="dt[judulCerita]" class="story-edit" value="<?= $cerita['judulCerita'] ?>" placeholder="Masukan Judul Cerita Anda">
              </div>
            </b></h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <img src="<?= base_url().$cerita_image['dir'] ?>" alt="Second slide" style="height: 390px; width: 100%" class="round" id="preview_image">
            <br><br>
            <i class="fa fa-pencil"></i> Gambar : <button type="button" class="btn btn-sm btn-primary" id="btnFile"><i class="fa fa-file"></i> Browser File</button>
            <input type="file" class="file" id="imageFile" style="display: none;" name="file"/>
            <p class="help-block">Gambar yang diupload disarankan memiliki format JPG, atau JPEG</p>

            <div class="form-group">
              <label><i class="fa fa-pencil"></i> Deskripsi Singkat Cerita : </label>
              <textarea class="form-control story-edit" rows="5" name="dt[sinopsisCerita]" placeholder="Masukan Deskripsi Singkat Cerita !"><?= $cerita['sinopsisCerita'] ?>
              </textarea>
            </div>
          </div>
          <div class="col-md-4">      
            <div class="row">
              <div class="col-md-12" style="margin-bottom: 10px;"> 
              <?php
                if($cerita['publish'] == 'DISABLE'){
              ?>
              <a href="<?= base_url('story/publish/'.$this->uri->segment(3)); ?>"> 
                <button type="button" class="btn btn-block btn-lg btn-primary round">
                  Publikasikan 
                </button>
              </a>
              <?php
                }else{
              ?>
               <a href="<?= base_url('story/hide/'.$this->uri->segment(3)); ?>"> 
                <button type="button" class="btn btn-block btn-lg btn-danger round">
                  Sembunyikan 
                </button>
              </a>
              <?php } ?>
              </div>
            </div>      
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                <h5>
                  <i class="fa fa-eye"></i> <?= $cerita['views'] ?>
                </h5> 
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                <h5>
                  <i class="fa fa-heart" style="color: red;"></i> 21
                </h5> 
              </div>
            </div>
            <div class="row">
              <div class="col-md-12" style="margin-bottom: 10px;"> 
                <button type="button" class="btn btn-block btn-danger btn-lg round" disabled>
                  <i class="fa fa-heart"></i> Saya Menyukai Cerita ini
                </button>
              </div>
            </div>
            <br>
            <?= $cerita['judulCerita'] ?> <b><?= date_format(date_create($cerita['created_at']), 'd-m-Y'); ?></b> oleh:
            <br><br>
            <a href="<?= base_url('/profil/'.$cerita['idUser']) ?>" class="a_black">
              <div class="box box-solid round">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-4" align="center">
                      <img src="<?= base_url().$user['fotoUser'] ?>" class="img-circle" alt="User Image" width="80px" height="80px">
                    </div>
                    <div class="col-md-8">
                      <h4><b>"User Pembuat"</b></h4>
                      <small>Bergabung pada tanggal <br>
                        <i class="fa fa-calendar"></i> <b><?= date_format(date_create($user['created_at']), 'd-m-Y'); ?></b></small>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              <div class="row">
                <div class="col-md-12" style="margin-bottom: 10px;"> 
                  <button type="button" class="btn btn-block btn-lg btn-success round">
                    <i class="fa fa-whatsapp"></i> Hubungi Pembuat Cerita
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12" style="margin-bottom: 10px;"> 
                  <button type="button" class="btn btn-block btn-danger btn-lg round" data-toggle="modal" data-target="#modal-story-delete">
                    <i class="fa fa-trash"></i> Hapus Cerita
                  </button>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <h3 align="center"><i class="fa fa-pencil"></i> Isi Cerita </h3>
            <div class="col-md-12">
              <div class="box box-solid round">
                <div class="box-body">
                  <textarea id="editor1" name="dt[isiCerita]">
                  <?= $cerita['isiCerita'] ?>
                  </textarea>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row" align="center">
          <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
            <a href="<?=  base_url('story/view/1') ?>">
              <button type="button" class="btn btn-block btn-danger btn-lg round">
                <i class="fa fa-close"></i> Batalkan perubahan
              </button>
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 10px;"> 
              <button type="submit" class="btn btn-block btn-primary btn-lg round">
                <i class="fa fa-save"></i> Simpan Perubahan
              </button>
          </div>
        </div>
      </form>
    </section>
  </div>
</div>

  <div class="modal modal-default fade" id="modal-story-delete" style="display: none;">
    <div class="modal-dialog round">
      <div class="modal-content round">
        <div class="modal-header top-round bg-red">
          <h4 class="modal-title" align="center"><i class="fa fa-trash"></i> Hapus Cerita</h4>
        </div>
        <div class="modal-body">
          <?php
          $this->load->view('modals/delete_form');
          ?>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(function () {
      CKEDITOR.replace('editor1');
    });

    $("#sumbit_form").submit(function(){
      var form = $(this);
      var mydata = new FormData(this);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: mydata,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend : function(){
          $("#save").addClass("disabled").html("Processing...").attr('disabled',true);
          form.find("#show_alert").slideUp().html("");
        },
        success: function(response, textStatus, xhr) {
          var str = response;
          if (str.indexOf("success") != -1){
            form.find("#show_alert").hide().html(response).slideDown("fast");
            setTimeout(function(){ 
           // window.location.href = "<?= base_url('dashboard/story') ?>";
         }, 1000);
            $("#save").removeClass("disabled").html('<i class="fa fa-save"></i> Simpan').attr('disabled',false);
          }else{
            form.find("#show_alert").hide().html(response).slideDown("fast");
            $("#save").removeClass("disabled").html('<i class="fa fa-save"></i> Simpan').attr('disabled',false);
          }
        },
        error: function(xhr, textStatus, errorThrown) {
          console.log(xhr);
          $("$save").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
          form.find("#show_alert").hide().html(xhr).slideDown("fast");
        }
      });

      return false;
    });
  </script>                     