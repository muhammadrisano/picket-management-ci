  <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Daftar Hadir Siswa<small> SMA Negeri 4 Padang</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Manajemen Absensi
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
                <button class="btn btn-success" onclick="tambah_absen()"><i class="glyphicon glyphicon-plus"></i>Tambah Absensi</button>
                <br/>
                <br/>
                <table id="table_id" class="table table-stripped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th><th>NIS</th><th>Nama</th><th>AIST</th><th>Tanggal</th><th>Keterangan</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no= 1;
                    foreach($data as $d){ ?>
                        <tr>
                            <td><?=$no;?></td><td><?=$d->nis;?></td><td><?=$d->nama_lengkap;?></td><td><?=$d->aist;?></td><td><?php echo date('j F Y',strtotime("$d->tanggal"));?></td><td><?=$d->keterangan;?></td>
                            <td>
                                <button class="btn btn-warning" onclick="editdata(<?php echo $d->id_absensi;?>)"><i class="glyphicon glyphicon-edit"></i></button>
                                <button class="btn btn-danger" onclick="deletedata(<?php echo $d->id_absensi;?>)"><i class="glyphicon glyphicon-remove-sign"></i></button></td>
                        </tr>
                    <?php 
                    $no++; } ?>
                    </tbody>
                </table>
               
                <!-- end isi content -->
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>

<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Absensi</h4>
      </div>
      <div class="modal-body form">
    <div class="row">
    <div class="col-md-9"><p id="pesan"></p></div><div class="col-md-3"><button class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Cari Manual</button></div>
    </div>
    <br/>
      <form action="#" id="form" name="manajemen_absensi" class="form-horizontal">
          <input type="hidden" value="" name="id_absensi">
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3" for="nis">NIS</label>
              <div class="col-md-9">
                  <input type="text" name="nis" placeholder="Masukan Nis" id="nis" class="form-control">
              </div>
            </div>
          </div>
        
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3" for="nama">Nama Siswa</label>
              <div class="col-md-9">
                  <input type="text" name="nama" placeholder="Otomatis" id="nama" class="form-control" disabled="disabled">
              </div>
            </div>
          </div>
       
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3" for="aist">AIST</label>
              <div class="col-md-9">
                  <select class="form-control" name="aist" id="aist">
                      <option value="">-- PILIH --</option>
                      <option>ALFA</option>
                      <option>IZIN</option>
                      <option>SAKIT</option>
                      <option>TERLAMBAT</option>
                  </select>
              </div>
            </div>
          </div>
              <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3" for="keterangan">Keterangan</label>
              <div class="col-md-9">
                 <textarea name="keterangan" class="form-control" rows="3"></textarea>
              </div>
            </div>
          </div>

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3" for="tanggal">Tanggal <span class="glyphicon glyphicon-th"></span></label>
              <div class="col-md-9">
                  <input type="text" name="tanggal" placeholder="Format: Tahun-Bulan-Tanggal ex: xxxx-xx-xx" id="tanggal" class="form-control datepicker">
              </div>
            </div>
          </div>



      </form>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="save()" class="btn btn-primary">Simpan</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

