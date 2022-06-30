    <!-- Content Header (Page header) -->
	<div class="content-header">
   	<div class="container-fluid">
   		<div class="row mb-2">
   			<div class="col-sm-6">
   				<h1 class="m-0">Detail Mahasiswa</h1>
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
   <section class="content">
   	<div class="container-fluid">
   		<div class="row">
   			<div class="col-lg-12">

   				<div class="card card-outline card-info">
   					<div class="card-header">
					Detail Mahasiswa
					</div>
   					<div class="card-body">	
						<table class="table table-bordered">
						<tr>
							<th>Nama Fakultas</th>
							<td><?php echo $fakultas['nama_fakultas'];?></td>
						</tr>
						<tr>
							<th>Nama Prodi</th>
							<td><?php echo $prodi['nama_prodi'];?></td>
						</tr>
						<tr>
							<th>NIM</th>
							<td><?php echo $mahasiswa['nama_mahasiswa'];?></td>
						</tr>
						<tr>
							<th>Tanggal Lahir</th>
							<td><?php echo $mahasiswa['tanggal_lahir'];?></td>
						</tr>
						<tr>
							<th>No. HP</th>
							<td><?php echo $mahasiswa['no_hp'];?></td>
						</tr>
						
						<tr>
							<th>Alamat</th>
							<td><?php echo $mahasiswa['alamat'];?></td>
						</tr>
						<tr>
							<th>Photo</th>
							<td><img style="max-width: 300px;" src="<?php echo base_url('images/mahasiswa/').$mahasiswa['foto'];?>" alt="<?php echo $mahasiswa['foto'];?>"></td>
						</tr>
						</table>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div><!-- /.container-fluid -->
   </section> 

