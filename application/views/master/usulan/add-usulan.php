
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usulan
        <small>Master</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">master</a></li>
        <li class="active">Usulan</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <form method="POST" action="<?= base_url('master/Usulan/store') ?>" id="upload-create" enctype="multipart/form-data">

      <div class="row">
        <div class="col-xs-8">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-header">
              <h5 class="box-title">
                  Tambah Usulan
              </h5>
            </div>
            <div class="box-body">
                <div class="show_error"></div><div class="form-group">
                      <label for="form-jenis">Jenis</label>
                      <input type="text" class="form-control" id="form-jenis" placeholder="Masukan Jenis" name="dt[jenis]">
                  </div><div class="form-group">
                      <label for="form-subjenis">Subjenis</label>
                      <input type="text" class="form-control" id="form-subjenis" placeholder="Masukan Subjenis" name="dt[subjenis]">
                  </div><div class="form-group">
                      <label for="form-persyaratan">Persyaratan</label>
                      <input type="text" class="form-control" id="form-persyaratan" placeholder="Masukan Persyaratan" name="dt[persyaratan]">
                  </div><div class="form-group">
                      <label for="form-nama_satker">Nama Satker</label>
                      <input type="text" class="form-control" id="form-nama_satker" placeholder="Masukan Nama Satker" name="dt[nama_satker]">
                  </div><div class="form-group">
                      <label for="form-nilai_usulan">Nilai Usulan</label>
                      <input type="text" class="form-control" id="form-nilai_usulan" placeholder="Masukan Nilai Usulan" name="dt[nilai_usulan]">
                  </div><div class="form-group">
                      <label for="form-posisi">Posisi</label>
                      <input type="text" class="form-control" id="form-posisi" placeholder="Masukan Posisi" name="dt[posisi]">
                  </div><div class="form-group">
                      <label for="form-created_by">Created By</label>
                      <input type="text" class="form-control" id="form-created_by" placeholder="Masukan Created By" name="dt[created_by]">
                  </div><div class="form-group">
                      <label for="form-file">File</label>
                      <input type="file" class="form-control" id="form-file" placeholder="Masukan File" name="file">
                  </div></div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-send" ><i class="fa fa-save"></i> Save</button>
                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
      $("#upload-create").submit(function(){
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
                    $(".btn-send").addClass("disabled").html("<i class='la la-spinner la-spin'></i>  Processing...").attr('disabled',true);
                    form.find(".show_error").slideUp().html("");
                },
                success: function(response, textStatus, xhr) {
                    // alert(mydata);
                   var str = response;
                    if (str.indexOf("success") != -1){
                        form.find(".show_error").hide().html(response).slideDown("fast");
                        setTimeout(function(){ 
                           window.location.href = "<?= base_url('master/Usulan') ?>";
                        }, 1000);
                        $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);


                    }else{
                        form.find(".show_error").hide().html(response).slideDown("fast");
                        $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
                        
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                  console.log(xhr);
                    $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
                    form.find(".show_error").hide().html(xhr).slideDown("fast");

                }
            });
            return false;
    
        });
  </script>