<!--**********************************
        Scripts
    ***********************************-->
<script src="{{ url('public/plugins/common/common.min.js') }}"></script>
<script src="{{ url('public/js/custom.min.js') }}"></script>
<script src="{{ url('public/js/settings.js') }}"></script>
<script src="{{ url('public/js/gleek.js') }}"></script>
<script src="{{ url('public/js/styleSwitcher.js') }}"></script>

@if(Request::segment(1) == 'admin')
<!-- Chartjs -->
<script src="{{ url('public/plugins/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ url('public/js/plugins-init/chartjs-init.js') }}"></script>
@endif
<!-- Circle progress -->
<script src="{{ url('public/plugins/circle-progress/circle-progress.min.js') }}"></script>
{{-- plugins datatable --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="{{ url('public/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
{{-- ./plugins datatable --}}

{{-- plugins form-val --}}
<script src="./plugins/validation/jquery.validate.min.js"></script>
<script src="./plugins/validation/jquery.validate-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
{{-- ./plugins form-val --}}