<footer class="main-footer">
    <strong>Copyright &copy; 2023 </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">

    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- DataTables -->


<!-- jQuery -->
<script src="{{ url('/') }}/frontend/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/') }}/frontend/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->

<script src="{{ url('/') }}/frontend/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ url('/') }}/frontend/adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ url('/') }}/frontend/adminlte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ url('/') }}/frontend/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ url('/') }}/frontend/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('/') }}/frontend/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ url('/') }}/frontend/adminlte/plugins/moment/moment.min.js"></script>
<script src="{{ url('/') }}/frontend/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('/') }}/frontend/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->

<!-- overlayScrollbars -->
<script src="{{ url('/') }}/frontend/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/') }}/frontend/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('/') }}/frontend/adminlte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/') }}/frontend/adminlte/dist/js/demo.js"></script>
<script src="{{ url('/') }}/frontend/adminlte/dist/js/myfunctions.js"></script>


<!-- Bootstrap 4 -->

<!-- bs-custom-file-input -->
<script src="{{ url('/') }}/frontend/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


<link rel="stylesheet" href="{{ url('/') }}/frontend/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ url('/') }}/frontend/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<script src="{{ url('/') }}/frontend/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/frontend/adminlte/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="{{ url('/') }}/frontend/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/frontend/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/') }}/frontend/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/vendor/datatables/buttons.server-side.js"></script>
<script src="{{ url('/') }}/frontend/adminlte/jstree/jstree.js"></script>
<script src="{{ url('/') }}/frontend/adminlte/jstree/jstree.wholerow.js"></script>
<script src="{{ url('/') }}/frontend/adminlte/jstree/jstree.checkbox.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ar.min.js"></script>

<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
  </script>

@stack('js')
@stack('css')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  @yield('scripts')

</body>
</html>
