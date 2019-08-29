<div class="row">
    <div class="col-md-12">
        <h1>Akun Saya</h1>
        <div class="row">
            <div class="col-md-12">        
                <div class="box box-solid round" >
                    <div class="box-body">
                    <?php foreach($biodata as $row) { ?>
                        <form action="#">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_accountr" data-toggle="tab" aria-expanded="false">Akun</a></li>
                                    <li class=""><a href="#tab_image" data-toggle="tab" aria-expanded="false">Foto Profil</a></li>
                                    <!-- <li class=""><a href="#tab_password" data-toggle="tab" aria-expanded="false">Password</a></li> -->
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_accountr">
                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nama Lengkap</label>
                                                        <input type="text" name="dt[namaUser]" class="form-control" id="username" placeholder="Masukan Nama Lengkap" value="<?= $row['namaUser'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nomor Whatsapp</label>
                                                        <input type="text" name="dt[teleponUser]" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask placeholder="Masukan Nomor Whatsapp" value="<?= $row['teleponUser'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email</label>
                                                        <input type="text" name="dt[emailUser]" class="form-control" id="useremail" placeholder="Masukan Email" value="<?= $row['emailUser'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tempat Tinggal</label>
                                                        <textarea name="dt[alamatUser]" class="form-control" rows="3" placeholder="Masukan Tempat Tinggal"><?= $row['alamatUser'] ?>
                                                        </textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Bio</label>
                                                        <textarea name="dt[desc]" class="form-control" rows="3" placeholder="Masukan Bio"><?= $row['desc'] ?>
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_image">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Foto Profil</label>
                                            <div class="row">
                                                <div class="col-md-5" align="center">
                                                    <img src="<?= $admin_url.$row['fotoUser'] ?>"   class="img-circle" alt="User Image" width="250px" height="250px" id="preview_image">
                                                </div>
                                                <div class="col-md-7">
                                                    <button type="button" class="btn btn-sm btn-primary" id="btnFile"><i class="fa fa-file"></i> Browser File</button>

                                                    <input type="file" class="file" id="imageFile" style="display: none;" name="image_profil"/>

                                                    <!-- <input type="file" id="file"> -->
                                                    <p class="help-block">Foto yang diupload disarankan berukuran 70px x 70px dan memiliki format PNG, JPG, atau JPEG</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="tab-pane" id="tab_password">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password Baru</label>
                                            <input name="newpassword" type="password" class="form-control" id="newpassword" placeholder="Masukan Password Baru">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Konfirmasi Password Baru</label>
                                            <input name="confrimpassword" type="password" class="form-control" id="confrimpassword" placeholder="Masukan Konfirmasi Password Baru">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Konfirmasi Password Lama</label>
                                            <input name="lastpassword" type="password" class="form-control" id="lastpassword" placeholder="Masukan Konfirmasi Password Lama">
                                        </div>
                                    </div> -->
                                </div>
                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-edit"></i> Ubah Akun</button>
                            </div>
                        </form>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>