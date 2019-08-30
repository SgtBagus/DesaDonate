<h3 align="center"> Anda yakin ingin Menghapus ? </h3>
<form action="<?= base_url('story')?>/create" method="POST">
  <p align="center">Mohon untuk mengkonfirmasikan penghapusan dengan menulis ulang judul cerita anda !</p>
  <div class="form-group">
    <label>Judul Cerita</label>
    <input type="text" name="dt[judul]" class="form-control" placeholder="Masukan Judul Cerita...">
  </div>
  <div class="row">
    <div class="col-md-6" align="left">
      <button type="button" class="btn pull-left btn-block btn-md btn-info round" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
    </div>
    <div class="col-md-6" align="right">
      <button type="submit" class="btn btn-block pull-right btn-md btn-danger round"><i class="fa fa-trash"></i> Hapus</button>
    </div>
  </div>
</form>