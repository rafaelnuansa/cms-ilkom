   <!-- Content Header (Page header) -->
   <div class="content-header">
   	<div class="container-fluid">
   		<div class="row mb-2">
   			<div class="col-sm-6">
   				<h1 class="m-0">Mahasiswa</h1>
   			</div><!-- /.col -->
   			<div class="col-sm-6">
   				<ol class="breadcrumb float-sm-right">
   					<li class="breadcrumb-item"><a href="#">Home</a></li>
   					<li class="breadcrumb-item active">Mahasiswa</li>
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
						 <a class="btn btn-primary" href="<?php echo base_url('mahasiswa/add');?>"><span class="fas fa-plus"></span> Add Mahasiswa</a>
   					</div>
   					<div class="card-body table-responsive">
   						<table id="datatable" class="table">
   							<thead>
   								<tr>
   									<th>#</th>
   									<th>NIM</th>
   									<th>NAMA</th>
   									<th>PROGRAM STUDI</th>
   									<th></th>
   								</tr>
   							</thead>
   							<tbody>
   								<?php
								$no = 1;
								foreach ($data->result_array() as $i) :
											$id = $i['id_mahasiswa'];
											$nama_mahasiswa = $i['nama_mahasiswa'];
											$nim_mahasiswa = $i['nim_mahasiswa'];
											$kode_prodi = $i['kode_prodi'];
										?>
   									<tr>
   										<td><?php echo $no++; ?></td>
   										<td><?php echo $nim_mahasiswa; ?></td>
   										<td><?php echo $nama_mahasiswa; ?></td>
										<td><?php echo $kode_prodi;?></td>

   										<td style="text-align:right;">
   											<a class="btn btn-dark" href="<?php echo base_url('mahasiswa/detail/'.$id);?>"><i class="fas fa-eye"></i></a>
   											<a class="btn btn-success" href="<?php echo base_url('mahasiswa/edit/'.$id);?>"><i class="fas fa-edit"></i></a>
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
                    url:"<?=base_url('mahasiswa/delete')?>",  
                    method:"POST",
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
