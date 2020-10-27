    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!-- 
    <script src="{{ asset('adminBackend/vendors/jquery/dist/jquery.min.js') }}"></script> -->
    <!-- Bootstrap -->
    <script src="{{ asset('adminBackend/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('adminBackend/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('adminBackend/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('adminBackend/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('adminBackend/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('adminBackend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('adminBackend/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('adminBackend/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('adminBackend/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('adminBackend/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('adminBackend/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('adminBackend/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('adminBackend/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('adminBackend/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('adminBackend/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('adminBackend/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('adminBackend/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('adminBackend/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('adminBackend/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('adminBackend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('adminBackend/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('adminBackend') }}../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('adminBackend/build/js/custom.min.js') }}"></script>

    
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


    <!-- start Image upload -->
    <script>
        function previewFile(input){
            var file=$("input[type=file]").get(0).files[0];
            if (file)
            {
                var reader = new FileReader();
                reader.onload = function()
                {
                    $('#previewImg').attr("src",reader.result);
                }                
                reader.readAsDataURL(file);
            }
        }
    </script>

    <!-- Start Yajrabox datatable -->
    <script type="text/javascript">
        $(document).ready( function () {
             $('#myTable').DataTable();
        } );    
    </script>
    