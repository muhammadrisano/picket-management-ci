  <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Kehadiram Siswa<small> SMA Negeri 4 Padang</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Kehadiaran Siswa <h4><?php echo $kelas; ?></h4>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                      
                    </div>
                </div>
                <!-- /.row -->
                <!-- isi content -->

                <div class="row">
                <div class="col-md-3">
                <form action="<?php echo site_url().'/manajemen/kehadiransiswa'?>" id="form" name="manajemen_absensi" class="form-horizontal" method="POST">
                    <div class="form-group">
                      <label class="control-label col-md-3" for="kelas">Kelas</label>
                      <div class="col-md-9">
                          <select name="kelas" class="form-control" onchange="pilihkelas()">
                          <option value="">--Pilih Kelas--</option>
                          <option value="10.MIPA 1">X MIPA 1</option>
                          <option value="10.MIPA 2">X MIPA 2</option>
                          <option value="10.MIPA 3">X MIPA 3</option>
                          <option value="10.MIPA 4">X MIPA 4</option>
                          <option value="10.MIPA 5">X MIPA 5</option>
                          <option value="10.MIPA 6">X MIPA 6</option>
                          <option value="10.MIPA 7">X MIPA 6</option>
                          <option value="10.IIS 1">X IIS 1</option>
                          <option value="10.IIS 2">X IIS 2</option>
                          <option value="10.IIS 3">X IIS 3</option>
                          <option value="11.MIPA 1">XI MIPA 1</option>
                          <option value="11.MIPA 2">XI MIPA 2</option>
                          <option value="11.MIPA 3">XI MIPA 3</option>
                          <option value="11.MIPA 4">XI MIPA 4</option>
                          <option value="11.MIPA 5">XI MIPA 5</option>
                          <option value="11.MIPA 6">XI MIPA 6</option>
                          <option value="11.MIPA 7">XI MIPA 6</option>
                          <option value="11.IIS 1">XI IIS 1</option>
                          <option value="11.IIS 2">XI IIS 2</option>
                          <option value="11.IIS 3">XI IIS 3</option>
                          <option value="12.MIPA 1">XII MIPA 1</option>
                          <option value="12.MIPA 2">XII MIPA 2</option>
                          <option value="12.MIPA 3">XII MIPA 3</option>
                          <option value="12.MIPA 4">XII MIPA 4</option>
                          <option value="12.MIPA 5">XII MIPA 5</option>
                          <option value="12.MIPA 6">XII MIPA 6</option>
                          <option value="12.MIPA 7">XII MIPA 6</option>
                          <option value="12.IIS 1">XII IIS 1</option>
                          <option value="12.IIS 2">XII IIS 2</option>
                          <option value="12.IIS 3">XII IIS 3</option>



                          </select>
                      </div>
                    </div>

                   

                </div>
                <div class="col-md-7"><button type="submit" name="tbl_submit" value="pilih" class="btn btn-success">Pilih</button></div>
                </form>
                <div class="col-md-2"><button class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Cetak</button></div>
                </div>
                <br/>
                <table class="table table-stripped table-bordered" id="table_id">
                    <thead>
                        <tr>
                        <th>NO</th><th>NIS</th><th>NAMA</th><th>ALFA</th><th>IZIN</th><th>SAKIT</th><th>TERLAMBAT</th
                        >
                        </tr>
                    </thead>
                    <tbody id="target">
                        <?php 

                        if($data){
                            $no=1;
                            foreach($data as $d){
                            ?>

                        <tr>
                            <td><?=$no;?></td><td><?=$d['nis'];?></td><td><?=$d['nama_lengkap'];?></td><td>
                            <?php 
                            if($d['alfa']>0){echo "<font color='red'><b>".$d['alfa']."</b></font>";}else{
                                echo '-';
                            }
                            ?>

                            </td><td>
                            <?php 
                            if($d['izin']>0){echo "<font color='red'><b>".$d['izin']."</b></font>";}else{
                                echo '-';
                            }
                            ?>
                            </td><td>
                            <?php 
                            if($d['sakit']>0){echo "<font color='red'><b>".$d['sakit']."</b></font>";}else{
                                echo '-';
                            }
                            ?>
                            </td><td>
                            <?php 
                            if($d['terlambat']>0){echo "<font color='red'><b>".$d['terlambat']."</b></font>";}else{
                                echo '-';
                            }
                            ?>
                            </td>
                        </tr>

                        <?php 
                            $no++;}
                        } ?>
                    </tbody>
                </table>

                <!-- end isi content -->
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>