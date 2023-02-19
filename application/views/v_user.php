<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>List User</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
</head>
<body>
<div class="container">
	<!-- Page Heading -->
        <div class="row">
            <h1 class="page-header">Data
                <small>User</small> <?php echo $title ?>
				<div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAddUser"><span class="fa fa-plus"></span> Tambah User</a></div>
            </h1>
        </div>
	<div class="row">
		<div id="reload">
		<table class="table table-striped" id="mydata">
			<thead>
				<tr>
					<th>Username</th>
					<th>Email</th>
					<th>Password</th>
					<th style="text-align: right;">Aksi</th>
				</tr>
			</thead>
			<tbody id="show_data_user">
				
			</tbody>
		</table>
		</div>
	</div>
</div>

		<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAddUser" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah User</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-9">
                            <input name="username" id="username" class="form-control" type="text" placeholder="Kode Barang" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Email</label>
                        <div class="col-xs-9">
                            <input name="email" id="email" class="form-control" type="text" placeholder="Nama Barang" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-9">
                            <input name="password" id="password" class="form-control" type="text" placeholder="Harga" style="width:335px;" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->

        <!-- MODAL EDIT -->
        <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Edit User</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-9">
                            <input name="username" id="username" class="form-control" type="text" placeholder="Kode Barang" style="width:335px;" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Email</label>
                        <div class="col-xs-9">
                            <input name="email" id="email" class="form-control" type="text" placeholder="Nama Barang" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-9">
                            <input name="password" id="password" class="form-control" type="text" placeholder="Harga" style="width:335px;" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL EDIT-->

        <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus User</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="username" id="username" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus user ini?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		tampil_data_user();	//pemanggilan fungsi tampil barang.
		
		$('#mydata').dataTable();
		//fungsi tampil barang
		function tampil_data_user(){
		    $.ajax({
		        type  : 'GET',
		        url   : '<?php echo base_url()?>index.php/usercontroller/data_user',
		        async : true,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
		                  		'<td>'+data[i].username+'</td>'+
		                        '<td>'+data[i].email+'</td>'+
		                        '<td>'+data[i].password+'</td>'+
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].username+'">Edit</a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].username+'">Hapus</a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data_user').html(html);
		        }

		    });
		}

		//GET UPDATE
		$('#show_data_user').on('click','.item_edit',function(){
            var username=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/usercontroller/get_user')?>",
                dataType : "JSON",
                data : {username:username},
                success: function(data){
                	$.each(data,function(username, email, password){
                    	$('#ModalaEdit').modal('show');
            			$('[name="username"]').val(data.username);
            			$('[name="email"]').val(data.email);
            			$('[name="password"]').val(data.password);
            		});
                }
            });
            return false;
        });


		//GET HAPUS
		$('#show_data_user').on('click','.item_hapus',function(){
            var username=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="username"]').val(username);
        });

		//Simpan Barang
		$('#btn_simpan').on('click',function(){
            var username=$('#username').val();
            var email=$('#email').val();
            var password=$('#password').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/usercontroller/simpan_user')?>",
                dataType : "JSON",
                data : {username:username , email:email, password:password},
                success: function(data){
                    $('[name="username"]').val("");
                    $('[name="email"]').val("");
                    $('[name="password"]').val("");
                    $('#ModalaAddUser').modal('hide');
                    tampil_data_user();
                }
            });
            return false;
        });

        //Update Barang
		$('#btn_update').on('click',function(){
            var username=$('#username').val();
            var email=$('#email').val();
            var password=$('#password').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/usercontroller/update_user')?>",
                dataType : "JSON",
                data : {username:username , email:email, password:password},
                success: function(data){
                    $('[name="username"]').val("");
                    $('[name="email"]').val("");
                    $('[name="password"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_user();
                }
            });
            return false;
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var username=$('#username').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/usercontroller/hapus_user')?>",
            dataType : "JSON",
                    data : {username: username},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data_user();
                    }
                });
                return false;
            });

	});

</script>
</body>
</html>
