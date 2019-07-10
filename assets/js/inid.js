
            $(document).ready(function(){
                $('#table_id').DataTable();
            })

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
                        $('#modal_form').modal('hide');
                        location.reload();
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
