   <!-- Content Header (Page header) -->
   <div class="content-header">
   	<div class="container-fluid">
   		<div class="row mb-2">
   			<div class="col-sm-6">
   				<h1 class="m-0">Users</h1>
   			</div><!-- /.col -->
   			<div class="col-sm-6">
   				<ol class="breadcrumb float-sm-right">
   					<li class="breadcrumb-item"><a href="#">Home</a></li>
   					<li class="breadcrumb-item active">Users</li>
   				</ol>
   			</div><!-- /.col -->
   		</div><!-- /.row -->
   	</div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
   	<div class="container-fluid">
   		<div class="row">
   			<div class="col-lg-12">

   				<div class="card card-outline card-info">
   					<div class="card-header">
						 <a class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="fas fa-plus"></span> Add Users</a>
   					</div>
   					<div class="card-body table-responsive">
   						<table id="datatable" class="table">
   							<thead>
   								<tr>
   									<th>#</th>
   									<th>Username</th>
   									<th>Nama Lengkap</th>
   									<th style="text-align:center;">Aksi</th>
   								</tr>
   							</thead>
   							<tbody>
   								<?php 
								
								$no = 1;
								foreach ($data->result_array() as $i):
											$id = $i['id'];
											$username = $i['username'];
											$nama_lengkap = $i['nama_lengkap'];
										?>
   									<tr>
   										<td><?php echo $no++; ?></td>
   										<td><?php echo $username; ?></td>
   										<td><?php echo $nama_lengkap; ?></td>

   										<td style="text-align:right;">
   											<a class="btn btn-success" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>"><i class="fas fa-edit"></i></a>
   											<a class="btn btn-warning" href="<?php echo base_url() . 'users/reset_password/' . $id; ?>"><i class="fas fa-key"></i></a>
   											<a class="btn btn-danger hapus-user" data-id="<?php echo $id;?>"><i class="fas fa-trash"></i></a>
   										</td>
   									</tr>

   								<?php endforeach; ?>
   							</tbody>
   						</table>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->

   <!--Modal Add Pengguna-->
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   	<div class="modal-dialog" role="document">
   		<div class="modal-content">
   			<div class="modal-header">
   				<h4 class="modal-title" id="myModalLabel">Add Users</h4>
   				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
   			</div>
   			<form class="form-horizontal" action="<?php echo base_url() . 'users/create' ?>" method="post" enctype="multipart/form-data">
   				<div class="modal-body">

   					<div class="form-group">
   						<label class="col-sm-12 control-label">Nama Lengkap</label>
   						<div class="col-sm-12">
   							<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
   						</div>
   					</div>
   					<div class="form-group">
   						<label class="col-sm-12 control-label">Username</label>
   						<div class="col-sm-12">
   							<input type="text" name="username" class="form-control" placeholder="Username" required>
   						</div>
   					</div>
   					<div class="form-group">
   						<label for="inputPassword" class="col-sm-12 control-label">Password</label>
   						<div class="col-sm-12">
   							<input type="password" name="xpassword" class="form-control" placeholder="Password" required>
   						</div>
   					</div>
   					<div class="form-group">
   						<label for="inputPassword2" class="col-sm-12 control-label">Ulangi Password</label>
   						<div class="col-sm-12">
   							<input type="password" name="xpassword2" class="form-control" placeholder="Ulangi Password" required>
   						</div>
   					</div>

   				</div>
   				<div class="modal-footer">
   					<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
   					<button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
   				</div>
   			</form>
   		</div>
   	</div>
   </div>
   <?php foreach ($data->result_array() as $i) :
	
	$id = $i['id'];
	$username = $i['username'];
	$nama_lengkap = $i['nama_lengkap'];
		?>

   	<!--Modal Edit Pengguna-->
   	<div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   		<div class="modal-dialog" role="document">
   			<div class="modal-content">
   				<div class="modal-header">
   					<h4 class="modal-title" id="myModalLabel">Edit Users</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
   				
   				</div>
   				<form class="form-horizontal" action="<?php echo base_url() . 'users/update' ?>" method="post" enctype="multipart/form-data">
   					<div class="modal-body">
   						<div class="form-group">
   							<label class="col-sm-4 control-label">Nama</label>
   							<div class="col-sm-12">
   								<input type="hidden" name="id" value="<?php echo $id; ?>" />
   								<input type="text" name="nama_lengkap" class="form-control" value="<?php echo $nama_lengkap; ?>" placeholder="Nama Lengkap" required>
   							</div>
   						</div>
   						<div class="form-group">
   							<label class="col-sm-4 control-label">Username</label>
   							<div class="col-sm-12">
   								<input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Username" required>
   							</div>
   						</div>
   						<div class="form-group">
   							<label class="col-sm-4 control-label">Password</label>
   							<div class="col-sm-12">
   								<input type="password" name="xpassword" class="form-control" placeholder="Password">
   							</div>
   						</div>
   						<div class="form-group">
   							<label class="col-sm-4 control-label">Ulangi Password</label>
   							<div class="col-sm-12">
   								<input type="password" name="xpassword2" class="form-control" placeholder="Ulangi Password">
   							</div>
   						</div>


   					</div>
   					<div class="modal-footer">
   						<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
   						<button type="submit" class="btn btn-primary btn-flat">Update</button>
   					</div>
   				</form>
   			</div>
   		</div>
   	</div>
   <?php endforeach; ?>

	<!--Modal Reset Password-->
	<div class="modal fade" id="ModalResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Reset Password</h4> 
												 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                      
                    </div>

                    <div class="modal-body">

                            <table>
                                <tr>
                                    <th style="width:120px;">Username</th>
                                    <th>:</th>
                                    <th><?php echo $this->session->flashdata('uname');?></th>
                                </tr>
                                <tr>
                                    <th style="width:120px;">Password Baru</th>
                                    <th>:</th>
                                    <th><?php echo $this->session->flashdata('upass');?></th>
                                </tr>
                            </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

<script>
	// fungsi untuk hapus data
          //pilih selector dari table id datatable dengan class .hapus-mahasiswa
          $('#datatable').on('click','.hapus-user', function () {
            var id =  $(this).data('id');
            Swal.fire({
                title: 'Konfirmasi',
                text: "Anda ingin menghapus data ini?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Tidak',
                reverseButtons: false
              }).then((result) => {
                if (result.value) {
                  $.ajax({
                    url:"<?=base_url('users/delete')?>",  
                    method:"post",
                    beforeSend :function () {
                    Swal.fire({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                          swal.showLoading()
                        }
                      })      
                    },    
                    data:{id:id},
                    success:function(data){
                      Swal.fire(
                        'Hapus',
                        'Berhasil Terhapus',
                        'success'
                      )
					  .then(function(){ 
						location.reload();
						});
                    }
                  })
              } else if (result.dismiss === swal.DismissReason.cancel) {
                  Swal.fire(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                  )
                }
              })
            });
</script>
