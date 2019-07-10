   <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                <div class="fotoprofil">
                <img src="<?php echo base_url('assets/images/foto_profil/').$foto;?>" alt="fotoprofil" class="img-circle">
                </div>

                    <li class="active">
                        <a href="<?=site_url('/manajemen/index'); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-wrench"></i>My Account</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/manajemen/manajemen_absensi'); ?>"><i class="fa fa-fw fa-edit"></i> Manajemen Absensi</a>
                    </li>
                    <!--
                     <li>
                        <a href="<?php //echo base_url().'index.php/userguru/tambahGaleri'; ?>"><i class="fa fa-fw fa-edit"></i> </a>
                    </li>
                    <li>
                        <a href="<?php //echo base_url().'index.php/userguru/tambahInformasiAlumni'; ?>"><i class="fa fa-fw fa-edit"></i> Tambah Informasi Alumni</a>
                    </li>
                    
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    -->
                    <!--
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    -->
                    <!--
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    -->
            
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Akademik <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Jadwal Pelajaran</a>
                            </li>
                            <li>
                                <a href="#">Jadwal Ujian</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?=site_url('/manajemen/kehadiransiswa');?>"><i class="fa fa-fw fa-file"></i>Kehadiran Siswa</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                </ul>
            </div>