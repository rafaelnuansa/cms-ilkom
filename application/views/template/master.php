<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title;?> | FISIPKOM</title>
	<?php $this->load->view('template/stylecss.php');?>
	<?php $this->load->view('template/scriptjs.php');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

	<?php $this->load->view('template/navbar.php');?>
	<?php $this->load->view('template/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<?php echo $_content;?>
  </div>
  <!-- /.content-wrapper -->

	<?php $this->load->view('template/footer.php');?>

</div>
<!-- ./wrapper -->
</body>
</html>
