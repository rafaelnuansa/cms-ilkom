
<!-- jQuery -->
<script src="<?php echo base_url();?>themes/lte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>themes/lte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>themes/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url();?>themes/lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>themes/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>themes/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>themes/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>themes/lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>themes/lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>themes/lte/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url();?>themes/lte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>themes/lte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>themes/lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>themes/lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>themes/lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- daterangepicker -->
<script src="<?php echo base_url();?>themes/lte/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>themes/lte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>themes/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url();?>themes/lte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>themes/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>themes/lte/dist/js/adminlte.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(function () {
    $('#datatable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<?php if ($this->session->flashdata('msgsuccess')): ?>
<script type="text/javascript">
  $(document).ready(function() {
  Swal.fire({
  title: "Done",
  text: "<?php echo $this->session->flashdata('msgsuccess'); ?>",
  timer: 1500,
  showConfirmButton: true,
  type: 'success'
  });
  });
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('msgerror')): ?>
<script type="text/javascript">
  $(document).ready(function() {
  Swal.fire({
  title: "Failed",
  text: "<?php echo $this->session->flashdata('msgerror'); ?>",
  timer: 1500,
  showConfirmButton: true,
  type: 'error'
  });
  });
</script>
<?php endif; ?>


<?php if($this->session->flashdata('msg')=='show-modal'):?>
        <script type="text/javascript">
                $('#ModalResetPassword').modal('show');
        </script>
<?php endif?>




