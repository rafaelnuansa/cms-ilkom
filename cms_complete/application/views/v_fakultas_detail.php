     <!-- Content Header (Page header) -->
	 <div class="content-header">
   	<div class="container-fluid">
   		<div class="row mb-2">
   			<div class="col-sm-6">
   				<h1 class="m-0">Detail Fakultas</h1>
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
   <section class="content">
   	<div class="container-fluid">
   		<div class="row">
   			<div class="col-lg-12">

   				<div class="card card-outline card-info">
   					<div class="card-header">
					Detail Fakultas
					</div>
   					<div class="card-body">	
						<table class="table table-bordered">
						<tr>
							<th>Kode Fakultas</th>
							<td><?php echo $fakultas['kode_fakultas'];?></td>
						</tr>
						<tr>
							<th>Nama Fakultas</th>
							<td><?php echo $fakultas['nama_fakultas'];?></td>
						</tr>
						</table>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div><!-- /.container-fluid -->
   </section> 

