<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <section class="content-header">
        <ol class="breadcrumb" style="background: #f3f3f3;">
          <li><a href="<?= base_url() ?>"><b>AYO! BANGUN DESA</b></a></li>
          <li><a href="<?= base_url('story') ?>"><i class="fa fa-camera-retro"></i> Aku Dan Ceritaku Lainnya</a></li>
          <li class="active">" Edit ("Judul Aku dan Ceritaku")</li>
        </ol>
      </section>
      <br>
      <div class="row">
        <div class="col-md-8">
          <h1>
            <b>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                <input type="text" name="dt['titleStory']" class="story-edit" value="Judul Aku dan Ceritaku" placeholder="Masukan Judul Cerita Anda">
              </div>
            </b>
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <img src="http://prod-upp-image-read.ft.com/4d9ecf66-a3ae-11e9-a282-2df48f366f7d" alt="Second slide" style="height: 390px; width: 100%" class="round" id="preview_image">
          <br><br>
          <i class="fa fa-pencil"></i> Gambar : <button type="button" class="btn btn-sm btn-primary" id="btnFile"><i class="fa fa-file"></i> Browser File</button>
          <input type="file" class="file" id="imageFile" style="display: none;" name="dt['gambar_cerita']"/>
          <p class="help-block">Gambar yang diupload disarankan memiliki format JPG, atau JPEG</p>

          <div class="form-group">
            <label><i class="fa fa-pencil"></i> Deskripsi Singkat Cerita : </label>
            <textarea class="form-control story-edit" rows="5" name="dt[deskripsi]" placeholder="Masukan Deskripsi Singkat Cerita !">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </textarea>
          </div>
        </div>
        <div class="col-md-4">      
          <div class="row">
            <div class="col-md-12">
              <button type="button" class="btn btn-block btn-primary round">
                Publikasikan 
              </button>
            </div>
          </div>      
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6" align="left">
              <h5>
                <i class="fa fa-eye"></i> 45
              </h5> 
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6" align="right">
              <h5>
                <i class="fa fa-heart" style="color: red;"></i> 21
              </h5> 
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="button" class="btn btn-block btn-danger round" disabled>
                <i class="fa fa-heart"></i> <b> Saya Menyukai Cerita ini</b>
              </button>
            </div>
          </div>
          <br>
          Aku dan Ceritaku dibuat pada <b><?= date_format(date_create('1990-01-02'), 'd-m-Y'); ?></b> oleh:
          <br><br>
          <a href="<?= base_url('/profil/'.'1') ?>" class="a_black">
            <div class="box box-solid round">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-4" align="center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Nuclear_symbol.svg/600px-Nuclear_symbol.svg.png" class="img-circle" alt="User Image" width="80px" height="80px">
                  </div>
                  <div class="col-md-8">
                    <h4><b>"User Pembuat"</b></h4>
                    <small>Bergabung pada tanggal <br>
                      <i class="fa fa-calendar"></i> <b><?= date_format(date_create('1985-01-02'), 'd-m-Y'); ?></b></small>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            <div class="row">
              <div class="col-md-12">
                <button type="button" class="btn btn-block btn-success round">
                  <i class="fa fa-whatsapp"></i> <b> Hubungi Pembuat Cerita</b>
                </button>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <button type="button" class="btn btn-block btn-danger round" data-toggle="modal" data-target="#modal-story-delete">
                  <i class="fa fa-trash"></i> <b> Hapus Cerita</b>
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
                <textarea id="editor1" name="dt['isiCerita']">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </textarea>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row" align="center">
        <div class="col-md-6">
          <a href="<?=  base_url('story/view/1') ?>">
            <button type="button" class="btn btn-block btn-danger btn-lg round">
              <i class="fa fa-close"></i> Batalkan perubahan
            </button>
          </a>
        </div>
        <div class="col-md-6">
          <a href="<?=  base_url('story/update') ?>">
            <button type="submit" class="btn btn-block btn-primary btn-lg round">
              <i class="fa fa-save"></i> Simpan Perubahan
            </button>
          </a>
        </div>
      </div>
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