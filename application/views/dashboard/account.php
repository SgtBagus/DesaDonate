<div class="row">
    <div class="col-md-12">
        <h1>Akun Saya</h1>
        <div class="row">
            <div class="col-md-12">        
                <div class="box box-solid round" >
                    <div class="box-body">
                        <form action="#">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_accountr" data-toggle="tab" aria-expanded="false">Akun</a></li>
                                    <li class=""><a href="#tab_image" data-toggle="tab" aria-expanded="false">Foto Profil</a></li>
                                    <li class=""><a href="#tab_password" data-toggle="tab" aria-expanded="false">Password</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_accountr">
                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nama Lengkap</label>
                                                        <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Nama Lengkap" value="Alexndra Value">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nomor Whatsapp</label>
                                                        <input type="text" name="useremail" class="form-control" id="useremail" 
                                                        data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" placeholder="Masukan Nomor Whatsapp" value="1231243231">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email</label>
                                                        <input type="text" name="useremail" class="form-control" id="useremail" placeholder="Masukan Email" value="value.alex@gmail.com">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tempat Tinggal</label>
                                                        <textarea name="useraddress" class="form-control" rows="3" placeholder="Masukan Tempat Tinggal">Cecilia Chapman 711-2880 Nulla St. Mankato Mississippi 96522 (257) 563-7401
                                                        </textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Bio</label>
                                                        <textarea name="userbio" class="form-control" rows="3" placeholder="Masukan Bio">Just as a business touts its client successes in the form of case studies, your professional bio should let your own audience know what you've already achieved. What have you done for yourself -- as well as for others -- that makes you a valuable player in your industry?
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
                                                    <img src="<?= base_url()?>/assets/dist/img/user2-160x160.jpg"   class="img-circle" alt="User Image" width="250px" height="250px" id="preview_image">
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
                                    <div class="tab-pane" id="tab_password">
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
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-edit"></i> Ubah Akun</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>