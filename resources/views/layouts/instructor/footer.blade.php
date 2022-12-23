<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="{{asset('admin_asset/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('admin_asset/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('admin_asset/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('admin_asset/vendors/progressbar.js/progressbar.min.js')}}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('admin_asset/js/off-canvas.js')}}"></script>
<script src="{{asset('admin_asset/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin_asset/js/template.js')}}"></script>
<script src="{{asset('admin_asset/js/settings.js')}}"></script>
<script src="{{asset('admin_asset/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('admin_asset/js/dashboard.js')}}"></script>
<script src="{{asset('admin_asset/js/Chart.roundedBarCharts.js')}}"></script>
<!-- End custom js for this page-->
@yield('script')
</body>

</html>