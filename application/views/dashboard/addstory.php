<div class="row">
    <div class="col-md-12">
        <h1>Buat Cerita</h1>
        <div class="row">
            <div class="col-md-12">        
                <div class="box box-solid round" >
                    <div class="box-body">
                    <?php foreach($biodata as $row) { ?>
                        <form action="<?= base_url('story')?>/create" method="POST" enctype="multipart/form-data">
                            <div class="nav-tabs-custom">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_accountr">
                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <div class="box-body">
                                                <div class="form-group">
                                                <label>Judul Cerita</label>
                                                <input type="text" name="dt[judulCerita]" class="form-control" placeholder="Masukan Judul Cerita...">
                                            </div>
                                            <div class="form-group">
                                                <label>Kategori Cerita</label>
                                                <select class="form-control select2" name="dt[idKategori]">
                                                    <?php
                                                        $master_kategoricreita = $this->mymodel->selectData("master_kategoricreita");
                                                        foreach ($master_kategoricreita as $key => $value) {
                                                    ?>
                                                    <option value="<?= $value['idKategoriC'] ?>"><?= $value['value'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Foto Profil</label>
                                                <div class="row">
                                                <div class="col-md-8" align="center">
                                                    <img src="https://cdn.lifehack.org/wp-content/uploads/2013/04/33.jpg" class="round" alt="User Image" width="350px" height="230px" id="preview_image">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="button" class="btn btn-sm btn-primary" id="btnFile"><i class="fa fa-file"></i> Browser File</button>
                                                    <input type="file" class="file" id="imageFile" style="display: none;" name="file"/>
                                                    <p class="help-block">Gambar yang diupload disarankan memiliki format PNG, JPG, atau JPEG</p>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi Singkat Cerita : </label>
                                                <textarea class="form-control" rows="3" name="dt[sinopsisCerita]" placeholder="Masukan Deskripsi Singkat Cerita !"></textarea>
                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-edit"></i> Tambah</button>
                            </div>
                        </form>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
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
           window.location.href = "<?= base_url('dashboard/story') ?>";
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