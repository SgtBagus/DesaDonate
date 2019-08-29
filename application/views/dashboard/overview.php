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
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bagus</td>
                                    <td>Internet Explorer 4.0</td>
                                    <td>Win 95+</td>
                                    <td> 4</td>
                                    <td>X</td>
                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet Explorer 4.0</td>
                                    <td>Win 95+</td>
                                    <td> 4</td>
                                    <td>X</td>
                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet Explorer 4.0</td>
                                    <td>Win 95+</td>
                                    <td> 4</td>
                                    <td>X</td>
                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet Explorer 4.0</td>
                                    <td>Win 95+</td>
                                    <td> 4</td>
                                    <td>X</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>