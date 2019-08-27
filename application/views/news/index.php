<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <div class="row" align="center">
        <h1><i class="fa fa-newspaper-o"></i> Apa Kabar Desa</h1>
        <small>Silakan Memilih untuk Membaca Detail Kabar Berita Terkini</small>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box box-solid round">
            <div class="box-body">
              <form action="<?= base_url("news") ?>" method="post">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <h3>Pilih Kategori Berita</h3>
                      <select class="form-control select2" style="width: 100%;" name="idKategori">
                        <option value=" " selected="">Semua Kategori</option>
                        <?php foreach($kategori as $row){
                          $text="";
                            if($row['idKategori']==$this->session->userdata('idKategori')){
                              $text = "selected";
                            }

                            echo "<option value=".$row['idKategori']." ".$text." >".$row['value']."</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <h3>Pilih Desa</h3>
                      <select class="form-control select2" style="width: 100%;" name="idDesa">
                        <option value=" " selected="">Semua Desa</option>
                        <?php foreach($desa as $row){
                          $text="";
                            if($row['idDesa']==$this->session->userdata('idDesa')){
                              $text = "selected";
                            }

                            echo "<option value=".$row['idDesa']." ".$text." >".$row['value']."</option>";
                          }
                        ?>
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
      <div class="row">
      <ul id="myList">
        <?php foreach($listberita as $row){ ?>
          <li>  
            <div class="col-md-4 col-6 mb-md-0 mb-5">
              <a href="<?= base_url('news') ?>/view/<?= $row['id'] ?>" class="a_black">
                <div class="box box-solid round">
                  <div class="box-body">
                    <img src="<?= $admin_url.$row['dir'] ?>" alt="Second slide" style="height: 180px; width: 100%">
                    <h3 align="center">How Do I Be A Missionary?</h3>
                    <p style="text-indent: 15px;">The Missionary Church, in obedience to Jesus Christ his Lord, is devoted to being holy people of God worldwide as well as to building His Church by around the world evangelism, discipleship and reproduction of expanding churches. Sample HTML Template is one of Mobirise's best templates.</p>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                        <i class="fa fa-calendar"></i> Dibuat :  <b>23-03-2019</b>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </li>
        <?php } ?>
      </ul>
      </div>
      <div class="row" align="center">
        <button type="button" id="loadMore" class="btn btn-primary btn-lg round">
          <i class="fa fa-search"></i> Tampilkan Lebih Banyak
        </button>
        <button type="button" id="showLess" class="btn btn-danger btn-lg round">
          <i class="fa fa-search"></i> Tampilkan Lebih Sedikit
        </button>
      </div>
    </section>
  </div>
</div>