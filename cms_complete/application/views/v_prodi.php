   <!-- Content Header (Page header) -->
   <div class="content-header">
   	<div class="container-fluid">
   		<div class="row mb-2">
   			<div class="col-sm-6">
   				<h1 class="m-0">Program Studi</h1>
   			</div><!-- /.col -->
   			<div class="col-sm-6">
   				<ol class="breadcrumb float-sm-right">
   					<li class="breadcrumb-item"><a href="#">Home</a></li>
   					<li class="breadcrumb-item active">Prodi</li>
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
						 <a class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="fas fa-plus"></span> Add Prodi</a>
   					</div>
   					<div class="card-body table-responsive">
   						<table id="datatable" class="table">
   							<thead>
   								<tr>
   									<th>#</th>
   									<th>Kode Prodi</th>
   									<th>Nama Prodi</th>
   									<th>Kode Fakultas</th>
   									<th style="text-align:center;">Aksi</th>
   								</tr>
   							</thead>
   							<tbody>
   								<?php
								$no = 1;
								foreach ($data->result_array() as $i) :
											$id = $i['id'];
											$kode_prodi = $i['kode_prodi'];
											$nama_prodi = $i['nama_prodi'];
											$kode_fakultas = $i['kode_fakultas'];
										?>
   									<tr>
   										<td><?php echo $no++; ?></td>
   										<td><?php echo $kode_prodi; ?></td>
   										<td><?php echo $nama_prodi; ?></td>
										<td><?php echo $kode_fakultas;?></td>

   										<td style="text-align:right;">
											<a class="btn btn-dark" href="<?php echo base_url('prodi/detail/').$id;?>"><i class="fas fa-eye"></i></a>
   											<a class="btn btn-success" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>"><i class="fas fa-edit"></i></a>
   											<a class="btn btn-danger hapus-prodi" data-id="<?php echo $id;?>"><i class="fas fa-trash"></i></a>
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
   				<h4 class="modal-title" id="myModalLabel">Add Prodi</h4>
   				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
   			</div>
   			<form class="form-horizontal" action="<?php echo base_url() . 'prodi/create' ?>" method="post" enctype="multipart/form-data">
   				<div class="modal-body">

   					<div class="form-group">
   						<label class="col-sm-12 control-label">Kode Prodi</label>
   						<div class="col-sm-12">
   							<input type="text" name="kode_prodi" class="form-control" placeholder="Kode Prodi" required>
   						</div>
   					</div>
   					<div class="form-group">
   						<label class="col-sm-12 control-label">Nama Prodi</label>
   						<div class="col-sm-12">
   							<input type="text" name="nama_prodi" class="form-control" placeholder="Nama Prodi" required>
   						</div>
   					</div>
   					<div class="form-group">
   						<label class="col-sm-12 control-label">Kode Fakultas</label>
   						<div class="col-sm-12">
						   <select class="form-control" name="kode_fakultas" style="width:100%">
								<?php foreach ($fakultas->result_array() as $row) :
								?>
								
								<option value="<?php echo $row['kode_fakultas'];?>"><?php echo $row['nama_fakultas'];?></option>
								<?php endforeach;?>
							</select>	
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
	$kode_prodi = $i['kode_prodi'];
	$nama_prodi = $i['nama_prodi'];
	$kode_fakultas = $i['kode_fakultas'];
	?>

   	<!--Modal Edit Pengguna-->
   	<div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   		<div class="modal-dialog" role="document">
   			<div class="modal-content">
   				<div class="modal-header">
   					<h4 class="modal-title" id="myModalLabel">Edit Prodi</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
   				
   				</div>
   				<form class="form-horizontal" action="<?php echo base_url() . 'prodi/update' ?>" method="post" enctype="multipart/form-data">
   					<div class="modal-body">
   						<div class="form-group">
   							<label class="col-sm-4 control-label">Kode Prodi</label>
   							<div class="col-sm-12">
   								<input type="hidden" name="id" value="<?php echo $id; ?>" />
   								<input type="text" name="kode_prodi" class="form-control" value="<?php echo $kode_prodi; ?>" placeholder="Kode Prodi" required>
   							</div>
   						</div>
   						<div class="form-group">
   							<label class="col-sm-4 control-label">Nama Prodi</label>
   							<div class="col-sm-12">
   								<input type="text" name="nama_prodi" class="form-control" value="<?php echo $nama_prodi; ?>" placeholder="Nama Prodi" required>
   							</div>
   						</div>
   						<div class="form-group">
   							<label class="col-sm-4 control-label">Fakultas</label>
   							<div class="col-sm-12">
							   <select class="form-control" name="kode_fakultas" style="width:100%">
								<option value="<?php echo $kode_fakultas;?>"> - Tidak di Ubah - </option>
								<?php foreach ($fakultas->result_array() as $row) :
								?>
								
								<option value="<?php echo $row['kode_fakultas'];?>"><?php echo $row['nama_fakultas'];?></option>
								<?php endforeach;?>
								</select>	
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
          $('#datatable').on('click','.hapus-prodi', function () {
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
                    url:"<?=base_url('prodi/delete')?>",  
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
