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
                <input type="text" name="dt['titleStory']" class="story-edit" value="Judul Aku dan Ceritaku" placeholder="Masukan Juddul Cerita Anda">
              </div>
            </b>
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <img src="http://prod-upp-image-read.ft.com/4d9ecf66-a3ae-11e9-a282-2df48f366f7d" alt="Second slide" style="height: 390px; width: 100%" class="round" id="btnFile">
          <input type="file" class="file" id="imageFile" style="display: none;" name="dt['gambar_cerita']"/>
          
          <span>Klik Gambar untuk mengubah Gambar</span>
        </div>
        <div class="col-md-4">            
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6" align="left">
              <h5>
                <i class="fa fa-eye"></i>45
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
              <button type="button" class="btn btn-block btn-danger round">
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
                <button type="button" class="btn btn-block btn-primary round" data-toggle="modal" data-target="#modal-story">
                  <i class="fa fa-camera-retro"></i> <b> Buat Cerita !</b>
                </button>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
            <div class="box box-solid round">
              <div class="box-body">
                <p>"<b>Bencana Chernobyl</b>", <b>kecelakaan reaktor nuklir Chernobyl</b>, atau hanya "<b>Chernobyl</b>", adalah kecelakaan reaktor <a href="/wiki/Energi_nuklir" title="Energi nuklir">nuklir</a> terburuk dalam sejarah. Pada tanggal <a href="/wiki/26_April" title="26 April">26 April</a> <a href="/wiki/1986" title="1986">1986</a> pukul 01:23:40 pagi (<a href="/wiki/UTC%2B3" class="mw-redirect" title="UTC+3">UTC+3</a>), reaktor nomor empat di <a href="/wiki/Pembangkit_Listrik_Tenaga_Nuklir_Chernobyl" class="mw-redirect" title="Pembangkit Listrik Tenaga Nuklir Chernobyl">Pembangkit Listrik Tenaga Nuklir Chernobyl</a> yang terletak di <a href="/wiki/Uni_Soviet" title="Uni Soviet">Uni Soviet</a> di dekat <a href="/wiki/Pripyat,_Ukraina" title="Pripyat, Ukraina">Pripyat</a> di <a href="/wiki/Ukraina" title="Ukraina">Ukraina</a> meledak. Akibatnya, <a href="/w/index.php?title=Isotop_radioaktif&amp;action=edit&amp;redlink=1" class="new" title="Isotop radioaktif (halaman belum tersedia)">isotop radioaktif</a> dalam jumlah besar tersebar ke atmosfer di seluruh kawasan Uni Soviet bagian barat dan Eropa. Bencana nuklir ini dianggap sebagai kecelakaan nuklir terburuk sepanjang sejarah, dan merupakan satu dari dua kecelakaan yang digolongkan dalam level 7 pada <a href="/wiki/Skala_Kejadian_Nuklir_Internasional" title="Skala Kejadian Nuklir Internasional">Skala Kejadian Nuklir Internasional</a> (kecelakaan yang lainnya adalah <a href="/wiki/Bencana_nuklir_Fukushima_Daiichi" title="Bencana nuklir Fukushima Daiichi">Bencana nuklir Fukushima Daiichi</a>).<sup id="cite_ref-BBCWorse_1-0" class="reference"><a href="#cite_note-BBCWorse-1">[1]</a></sup> Jumlah pekerja yang dilibatkan untuk menanggulangi bencana ini sekitar 500.000 orang, dan menghabiskan dana sebesar 18 miliar rubel dan mempengaruhi ekonomi Uni Soviet.<sup id="cite_ref-2" class="reference"><a href="#cite_note-2">[2]</a></sup> Ribuan penduduk terpaksa diungsikan dari kota ini.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row" align="center">
          <div class="col-md-12">
            <a href="<?=  base_url('story') ?>">
              <button type="button" class="btn btn-block btn-info btn-lg round">
                <i class="fa fa-camera-retro"></i> Aku Dan Ceritaku Lainnya
              </button>
            </a>
          </div>
        </div>
      </section>
    </div>
  </div>


  <div class="modal modal-default fade" id="modal-story" style="display: none;">
    <div class="modal-dialog round">
      <div class="modal-content round">
        <div class="modal-header top-round bg-green">
          <h4 class="modal-title" align="center"><i class="fa fa-credit-card"></i> Donasi Sekarang</h4>
        </div>
        <div class="modal-body">
          <?php
          if($this->session->userdata('session_sop') == true){
            $this->load->view('modals/story_form');
          } else if($this->session->userdata('session_sop') == ""){
            ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
              Mohon untuk Melakukan Login Masuk Terlebih Dahulu !
            </div>
            <?php $this->load->view('modals/login_form');
          }
          ?>
        </div>
      </div>
    </div>
  </div>