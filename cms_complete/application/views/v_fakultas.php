   <!-- Content Header (Page header) -->
   <div class="content-header">
   	<div class="container-fluid">
   		<div class="row mb-2">
   			<div class="col-sm-6">
   				<h1 class="m-0">Fakultas</h1>
   			</div><!-- /.col -->
   			<div class="col-sm-6">
   				<ol class="breadcrumb float-sm-right">
   					<li class="breadcrumb-item"><a href="#">Home</a></li>
   					<li class="breadcrumb-item active">Fakultas</li>
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
						 <a class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="fas fa-plus"></span> Add Fakultas</a>
   					</div>
   					<div class="card-body table-responsive">
   						<table id="datatable" class="table">
   							<thead>
   								<tr>
   									<th>#</th>
   									<th>Kode Fakultas</th>
   									<th>Nama Fakultas</th>
   									<th style="text-align:center;">Aksi</th>
   								</tr>
   							</thead>
   							<tbody>
   								<?php
								
								$no = 1;
								foreach ($data->result_array() as $i) :
											$id = $i['id'];
											$kode_fakultas = $i['kode_fakultas'];
											$nama_fakultas = $i['nama_fakultas'];
										?>
   									<tr>
   										<td><?php echo $no++; ?></td>
   										<td><?php echo $kode_fakultas; ?></td>
   										<td><?php echo $nama_fakultas; ?></td>

   										<td style="text-align:right;">
											<a class="btn btn-dark" href="<?php echo base_url('fakultas/detail/').$id;?>"><i class="fas fa-eye"></i></a>
   										
   											<a class="btn btn-success" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>"><i class="fas fa-edit"></i></a>
   											<a class="btn btn-danger hapus-fakultas" data-id="<?php echo $id;?>"><i class="fas fa-trash"></i></a>
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
   				<h4 class="modal-title" id="myModalLabel">Add Fakultas</h4>
   				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
   			</div>
   			<form class="form-horizontal" action="<?php echo base_url() . 'fakultas/create' ?>" method="post" enctype="multipart/form-data">
   				<div class="modal-body">

   					<div class="form-group">
   						<label class="col-sm-12 control-label">Kode Fakultas</label>
   						<div class="col-sm-12">
   							<input type="text" name="kode_fakultas" class="form-control" placeholder="Kode Fakultas" required>
   						</div>
   					</div>
   					<div class="form-group">
   						<label class="col-sm-12 control-label">Nama Fakultas</label>
   						<div class="col-sm-12">
   							<input type="text" name="nama_fakultas" class="form-control" placeholder="Nama Fakultas" required>
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
	$kode_fakultas = $i['kode_fakultas'];
	$nama_fakultas = $i['nama_fakultas'];
		?>

   	<!--Modal Edit Pengguna-->
   	<div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   		<div class="modal-dialog" role="document">
   			<div class="modal-content">
   				<div class="modal-header">
   					<h4 class="modal-title" id="myModalLabel">Edit Fakultas</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
   				
   				</div>
   				<form class="form-horizontal" action="<?php echo base_url() . 'fakultas/update' ?>" method="post" enctype="multipart/form-data">
   					<div class="modal-body">
   						<div class="form-group">
   							<label class="col-sm-4 control-label">Kode Fakultas</label>
   							<div class="col-sm-12">
   								<input type="hidden" name="id" value="<?php echo $id; ?>" />
   								<input type="text" name="kode_fakultas" class="form-control" value="<?php echo $kode_fakultas; ?>" placeholder="Kode Fakultas" required>
   							</div>
   						</div>
   						<div class="form-group">
   							<label class="col-sm-4 control-label">Nama Fakultas</label>
   							<div class="col-sm-12">
   								<input type="text" name="nama_fakultas" class="form-control" value="<?php echo $nama_fakultas; ?>" placeholder="Nama Fakultas" required>
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

	<script>
	// fungsi untuk hapus data
          //pilih selector dari table id datatable dengan class .hapus-mahasiswa
          $('#datatable').on('click','.hapus-fakultas', function () {
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
                    url:"<?=base_url('fakultas/delete')?>",  
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
                      ).then(function(){ 
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
