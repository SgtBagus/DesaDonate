<h3 align="center"> Masukan Detail Cerita Anda</h3>
<form action="<?= base_url('story')?>/create" method="POST">
  <div class="form-group">
    <label>Judul Cerita</label>
    <input type="text" name="dt[judul]" class="form-control" placeholder="Masukan Judul Cerita...">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Foto Profil</label>
    <div class="row">
      <div class="col-md-8" align="center">
        <img src="https://cdn.lifehack.org/wp-content/uploads/2013/04/33.jpg" class="round" alt="User Image" width="350px" height="230px" id="preview_image">
      </div>
      <div class="col-md-4">
        <button type="button" class="btn btn-sm btn-primary" id="btnFile"><i class="fa fa-file"></i> Browser File</button>
        <input type="file" class="file" id="imageFile" style="display: none;" name="dt['gambar_cerita']"/>
        <p class="help-block">Gambar yang diupload disarankan memiliki format PNG, JPG, atau JPEG</p>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label>Deskripsi Singkat Cerita : </label>
    <textarea class="form-control" rows="3" name="dt[deskripsi]" placeholder="Masukan Deskripsi Singkat Cerita !"></textarea>
  </div>
  <!-- <div class="form-group">
    <label>Isi Cerita : </label>
    <textarea id="editor1" name="dt['isiCerita']">
      Masukan Cerita anda disini
    </textarea>
  </div> -->
  <div class="row">
    <div class="col-md-6" align="left">
      <button type="button" class="btn pull-left btn-block btn-md btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
    </div>
    <div class="col-md-6" align="right">
      <button type="submit" class="btn btn-block pull-right btn-md btn-primary"><i class="fa fa-credit-card"></i> Kirim</button>
    </div>
  </div>
</form>