<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>employee</title>

  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('vendors/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('vendors/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('vendors/dist/css/adminlte.min.css')}}">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="{{asset('vendors/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
   
   {{-- yajra data table style --}}
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

{{-- 1.Top menu --}}
@include('layouts.topMenu')

{{-- 2.leftMenu --}}
@include('layouts.leftMenu')

{{-- main content (body) --}}
<div class="content-wrapper">

{{-- 3.main content --}}
<section class="content">
@yield('content2')
</section>

</div>

{{-- 4.Right menu --}}
@include('layouts.rightMenu')

{{-- 5.footer --}}
@include('layouts.footer')

</div>
    <!-- jQuery -->
<script src="{{asset('vendors/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('vendors/dist/js/adminlte.min.js')}}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

{{-- data table plugins --}}
<script src="{{asset('vendors/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('vendors/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('vendors/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('vendors/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

{{-- jquery validation plugins --}}
<script src="{{asset('vendors/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
{{-- yajra datatable  --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


{{-- custom script --}}
@stack('script')
@stack('js')
</body>
</html>
