<h3 align="center"> Masukan Detail Donasi anda !</h3>
<form action="<?= base_url('penggalangan')?>/donate/" method="POST">
  <div class="form-group">
    <label>Nominal Uang</label>
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-credit-card"> Rp. </i>
      </div>
      <input type="text" class="number-separator form-control" placeholder="Masukan Nominal uang..">
    </div>
  </div>
  <div class="form-group">
    <label>Catatan : </label>
    <textarea class="form-control" rows="3" placeholder="Masukan catatan yang ingin disampaikan"></textarea>
  </div>
  <div class="form-group">
    <div class="checkbox">
      <label>
        <input type="checkbox" checked>
        Tampil atas Nama !
      </label>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6" align="left">
      <button type="button" class="btn pull-left btn-block btn-md btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
    </div>
    <div class="col-md-6" align="right">
      <button type="submit" class="btn btn-block pull-right btn-md btn-primary"><i class="fa fa-credit-card"></i> Kirim</button>
    </div>
  </div>
</form>