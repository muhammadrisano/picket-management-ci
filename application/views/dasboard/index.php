<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Piket SMAN 4 Padang</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()."assets/bootstrap/";?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatablees -->
    <link href="<?php echo base_url()."assets/datatables/";?>css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url()."assets/admin/";?>css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url()."assets/admin/";?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()."assets/admin/";?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Datapiker bootstrap -->
    <link href="<?php echo base_url()."assets/datapicker/";?>css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
    <!-- punya saya sendiri -->
    <link href="<?php echo base_url()."assets/";?>css/inid.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Sistem Informasi SMAN 4 Padang</a>
            </div>
            <!-- Top Menu Items -->
<!-- ======================== Header =========================== -->
        <?php
        echo $header;
         ?>
<!-- ========================= End Head ========================== -->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<!-- ===================== NAVIGATOR ============================= -->
        <?php
        echo $navigator; 
         ?>
<!-- ======================= END NAVIGATOR ======================= -->
            <!-- /.navbar-collapse -->
        </nav>
<!-- ============================= CONTENT ======================== -->
        <?php
        echo $content; 
         ?> 

<!-- ============================ END CONTENT ====================== -->
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url()."assets/admin/";?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()."assets/bootstrap/";?>js/bootstrap.min.js"></script>
  
    <!-- Morris Charts JavaScript -->
    <!--<script src="<?php echo base_url()."assets/admin/";?>js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url()."assets/admin/";?>js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url()."assets/admin/";?>js/plugins/morris/morris-data.js"></script>
    -->
      <!-- datatables -->
    
    <script src="<?php echo base_url()."assets/datatables/";?>js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()."assets/datatables/";?>js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()."assets/datapicker/";?>js/bootstrap-datepicker.min.js"></script>

         <script type="text/javascript">
          

            var save_method;
            var table;

            function tambah_absen(){
                save_method = 'add';
                $('#form')[0].reset();
                $('#modal_form').modal('show');
            }

            function save(){
                var url;

                if(save_method == 'add'){
                    url = '<?php echo site_url('/manajemen/absen_add');?>';
                }else{
                    url = '<?php echo base_url('/manajemen/absen_edit');?>';
                }
                
                $.ajax({
                    url:url,
                    type:"POST",
                    data:$('#form').serialize(),
                    dataType:'json',
                    success: function(data){
                        $('#pesan').html(data.pesan);
                        if(data.pesan == ''){
                        $('#modal_form').modal('hide');
                        location.reload();
                        }
                    },
                    error: function(jqXHR,textStatus,errorThrown){
                        alert('Error adding / Update data');
                    }
                });
            }

            function editdata(id){
                    save_method = "update";
                    $('#form')[0].reset();

                    // load data dari ajax
                    $.ajax({
                        url:"<?php echo site_url('/manajemen/ajaxeditdata/');?>/"+id,
                        type:"GET",
                        dataType:'json',
                        success:function(data){
                            $('[name="id_absensi"]').val(data.id_absensi);
                            $('[name="nis"]').val(data.nis);
                            $('[name="tanggal"]').val(data.tanggal);
                            $('[name="aist"]').val(data.aist);
                            $('[name="keterangan"]').val(data.keterangan);

                            $('#modal_form').modal('show');

                            $('#modal_title').text('Edit Absensi');


                        },
                        error:function(jqXHR, textStatus,errorThrown){
                            alert('Error Get Data ');
                        }

                    });
                }

                function pilihkelas(){
                    var kelas = $('[name="kelas"]').val();
                    $.ajax({
                        type:"POST",
                        data:'kelas='+kelas,
                        url:"<?php echo site_url('/manajemen/getsiswakelas');?>",
                        dataType:'json',
                        success:function(data){
                            var baris='';
                            for(var i=0;i<data.length;i++){
                                baris += '<tr>'+
                                            '<td>'+''+'</td>'+
                                            '<td>'+data[i].nis+'</td>'+
                                            '<td>'+data[i].nama_lengkap+'</td>'+
                                            '<td>'+''+'</td>'+
                                            '<td>'+''+'</td>'+
                                            '<td>'+''+'</td>'+
                                            '<td>'+''+'</td>'+
                                            '</tr>';
                            }
                            $('#target').html(baris);    
                                      
                        }
                        


                    });
                }

                function deletedata(id){
                if(confirm('Apakah Anda yakin menghapus data ?')){

                    $.ajax({
                        url:"<?php echo site_url('/manajemen/absensi_delete/');?>"+id,
                        type:"POST",
                        dataType:'json',
                        success:function(data){
                            location.reload();
                        }

                    })
                }

            }

            $(document).ready(function(){
                $('#nis').on('keyup',function(){
                    $.ajax({
                        url:"<?php echo site_url('/manajemen/ajaxnisname/');?>"+$('#nis').val(),
                        type:"GET",
                        dataType:'json',
                        success:function(data){
                            var tes = data;
                            if(tes == null){

                            $('[name="nama"]').val('');
                            
                            }else{
                             $('[name="nama"]').val(data.nama_lengkap);
                            }
                        }

                    });
                });
            })

            function deletedata(id){
                if(confirm('Apakah Anda yakin menghapus data ?')){

                    $.ajax({
                        url:"<?php echo site_url('/manajemen/absensi_delete/');?>"+id,
                        type:"POST",
                        dataType:'json',
                        success:function(data){
                            location.reload();
                        }

                    })
                }

            }
              $(document).ready(function(){
                $('#table_id').DataTable();
            })
        </script>
        
        <script type="text/javascript">
         $(function(){
          $(".datepicker").datepicker({
              format: 'yyyy-mm-dd',
              autoclose: true,
              todayHighlight: true,
          });
         });
        </script>
       
</body>

</html>
