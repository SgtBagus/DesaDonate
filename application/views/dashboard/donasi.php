<div class="row">
    <div class="col-md-12">
        <h1>Donasi Saya</h1>
        <div class="row">
            <div class="col-md-12">        
                <div class="box box-solid round" >
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">  
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
                                                <a target="_blank" href="<?= base_url('invoice/'.($row['kodeDonasi']))?>"><button class="btn btn-primary btn-xs"><i class="fa fa-print"></i></button></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" align="right">
                                <a href="<?= base_url('penggalangan') ?>">
                                    <button type="button" class="btn btn-block btn-primary btn-md"><i class="fa fa-money"></i> Donasi</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>