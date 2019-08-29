<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <section class="content-header">
        <ol class="breadcrumb" style="background: #f3f3f3;">
          <li><a href="<?= base_url() ?>"><b>AYO! BANGUN DESA</b></a></li>
          <li class="active"><i class="fa fa-camera-retro"></i> Aku Dan Ceritaku</li>
        </ol>
      </section>
      <div class="row" align="center">
        <h1><i class="fa fa-camera-retro"></i> Aku Dan Ceritaku</h1>
        <small>Silakan Memilih Cerita Orang Orang Terkini</small>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid round">
            <div class="box-body">
              <form action="<?= base_url("story") ?>" method="post">
                <div class="row">
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="form-group">
                      <h4>Cari Cerita Milik : </h4>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" name="username" placeholder="Masukan Nama Pengguna">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="form-group">
                      <h4>Urutkan Berdasarkan : </h4>
                      <select class="form-control select2" name="idKategori">
                        <option value="" selected="">Paling Baru</option>
                        <option value="likes">Paling Disukai</option>
                        <option value="views">Views Paling Banyak</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-block btn-primary btn-lg"><i class="fa fa-search"></i> Cari</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="myList">
        <li>  
          <div class="col-md-4 col-6 mb-md-0 mb-5">
            <a href="<?= base_url('story') ?>/view/1" class="a_black">
              <div class="box box-solid round">
                <div class="box-body">
                  <img src="https://images.pexels.com/photos/259780/pexels-photo-259780.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="Second slide" style="height: 230px; width: 100%">
                  <h3 align="center">
                    JUDUL CERITA
                  </h3>
                  <p style="text-indent: 15px;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...
                  </p>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                      <i class="fa fa-eye"></i> 34
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                      <small class="label pull-right bg-blue btn-md round"> 
                        <i class="fa fa-user"></i> <b>Erica Hartman</b>
                      </small>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                      <small class="label pull-right bg-yellow btn-md round"> 
                      <i class="fa fa-calendar"> </i> <b>19-02-1956</b>
                      </small>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </li>
        <li>  
          <div class="col-md-4 col-6 mb-md-0 mb-5">
            <a href="<?= base_url('story') ?>/view/1" class="a_black">
              <div class="box box-solid round">
                <div class="box-body">
                  <img src="https://images.pexels.com/photos/259780/pexels-photo-259780.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="Second slide" style="height: 230px; width: 100%">
                  <h3 align="center">
                    JUDUL CERITA
                  </h3>
                  <p style="text-indent: 15px;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...
                  </p>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                      <i class="fa fa-eye"></i> 34
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                      <small class="label pull-right bg-blue btn-md round"> 
                        <i class="fa fa-user"></i> <b>Erica Hartman</b>
                      </small>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                      <small class="label pull-right bg-yellow btn-md round"> 
                      <i class="fa fa-calendar"> </i> <b>19-02-1956</b>
                      </small>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </li>
        <li>  
          <div class="col-md-4 col-6 mb-md-0 mb-5">
            <a href="<?= base_url('story') ?>/view/1" class="a_black">
              <div class="box box-solid round">
                <div class="box-body">
                  <img src="https://images.pexels.com/photos/259780/pexels-photo-259780.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="Second slide" style="height: 230px; width: 100%">
                  <h3 align="center">
                    JUDUL CERITA
                  </h3>
                  <p style="text-indent: 15px;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...
                  </p>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                      <i class="fa fa-eye"></i> 34
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                      <small class="label pull-right bg-blue btn-md round"> 
                        <i class="fa fa-user"></i> <b>Erica Hartman</b>
                      </small>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                      <small class="label pull-right bg-yellow btn-md round"> 
                      <i class="fa fa-calendar"> </i> <b>19-02-1956</b>
                      </small>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </li>
        <li>  
          <div class="col-md-4 col-6 mb-md-0 mb-5">
            <a href="<?= base_url('story') ?>/view/1" class="a_black">
              <div class="box box-solid round">
                <div class="box-body">
                  <img src="https://images.pexels.com/photos/259780/pexels-photo-259780.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="Second slide" style="height: 230px; width: 100%">
                  <h3 align="center">
                    JUDUL CERITA
                  </h3>
                  <p style="text-indent: 15px;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...
                  </p>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                      <i class="fa fa-eye"></i> 34
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                      <small class="label pull-right bg-blue btn-md round"> 
                        <i class="fa fa-user"></i> <b>Erica Hartman</b>
                      </small>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                      <small class="label pull-right bg-yellow btn-md round"> 
                      <i class="fa fa-calendar"> </i> <b>19-02-1956</b>
                      </small>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </li>
      </div>
      <div class="row" align="center">
        <button type="button" id="loadMore" class="btn btn-primary btn-lg round">
          <i class="fa fa-search"></i> Tampilkan Lebih Banyak
        </button>
      </div>
    </section>
  </div>
</div>