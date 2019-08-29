<div class="row">
    <div class="col-md-12">
        <h1>Overview</h1>
        <div class="row">
            <div class="col-md-4">        
                <div class="box box-solid round">
                    <div class="box-body">
                    <div class="row">
                        <div class="col-md-4" align="center">
                        <img src="https://img.freepik.com/free-vector/background-with-people-doing-donation_23-2147558145.jpg?size=338&ext=jpg" class="img-circle" alt="User Image" width="75px" height="75px">
                        </div>
                        <div class="col-md-8">
                        <h4><b><?= count($jumlahgalang) ?></b></h4>
                        Penggalangan Dana
                        </div>
                    </div>
                    </div>
                </div>  
            </div>
            <div class="col-md-4">        
                <div class="box box-solid round">
                    <div class="box-body">
                    <div class="row">
                        <div class="col-md-4" align="center">
                        <img src="https://img.freepik.com/free-vector/background-with-people-doing-donation_23-2147558145.jpg?size=338&ext=jpg" class="img-circle" alt="User Image" width="75px" height="75px">
                        </div>
                        <div class="col-md-8">
                        <h4><b><?= $jumlahdonasi[0]['jumlah'] ?></b></h4>
                        Jumlah Donasi
                        </div>
                    </div>
                    </div>
                </div>  
            </div>
            <div class="col-md-4">        
                <div class="box box-solid round">
                    <div class="box-body">
                    <div class="row">
                        <div class="col-md-4" align="center">
                        <img src="https://img.freepik.com/free-vector/money-bag-exchange_23-2147510722.jpg?size=338&ext=jpg" class="img-circle" alt="User Image" width="75px" height="75px">
                        </div>
                        <div class="col-md-8">
                        <h4><b>Rp <?= number_format($totaldonasi[0]['total'],0,',','.'); ?>,-</b></h4>
                        Donasi Tersalurkan
                        </div>
                    </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">        
                <div class="box box-solid round" >
                    <div class="box-body">
                        <div class="row" align="center">
                            <h3><b>Kegiatan Terbaru</b></h3>
                        </div>
                        <table id="datatable" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Penggalangan</th>
                                            <th>Nominal Donasi</th>
                                            <th>Catatan Donasi</th>
                                            <th>Status Pembayaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($donasi as $row){ ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['tittleGalang'] ?></td>
                                            <td>Rp <?= number_format($row['nominalDonasi'],0,',','.'); ?>,-</td>
                                            <td><?= $row['catatanDonasi'] ?></td>
                                            <td><?= $row['statusPembayaran'] ?></td>
                                            <td>
                                                <a href="<?= base_url('penggalangan/view/'.$row['idGalang'])?>"><button class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                                                <a target="_blank" href="<?= base_url('invoice/'.md5($row['idDonasi']))?>"><button class="btn btn-primary btn-xs"><i class="fa fa-print"></i></button></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>