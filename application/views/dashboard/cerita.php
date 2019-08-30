<div class="row">
    <div class="col-md-12">
        <h1>Cerita Saya</h1>
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
                                            <th>Judul Cerita</th>
                                            <th>Sinopsis Cerita</th>
                                            <th>Likes</th>
                                            <th>Views</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($listcerita as $row){ ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['judulCerita'] ?></td>
                                            <td><?= $row['sinopsisCerita'] ?></td>
                                            <td><?= $row['likes'] ?></td>
                                            <td><?= $row['views'] ?></td>
                                            <td>
                                                <a href="<?= base_url('story/view/'.$row['id'])?>"><button class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" align="right">
                                <a href="<?= base_url('dashboard/addstory') ?>">
                                    <button type="button" class="btn btn-block btn-primary btn-md"><i class="fa fa-plus"></i> Buat Cerita</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>