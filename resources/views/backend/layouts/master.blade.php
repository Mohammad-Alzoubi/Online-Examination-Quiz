<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edmin</title>
    <link type="text/css" href="{{asset('admin/code/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('admin/code/bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('admin/code/css/theme.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('admin/code/images/icons/css/font-awesome.css')}}" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>

<body>

@include('backend.layouts.navbar')

<div class="wrapper">
    <div class="container">
        <div class="row">
            @include('backend.layouts.sidebar')
            @yield('content')
        </div>
    </div>
    <!--/.container-->
</div>

@include('backend.layouts.footer')


<script src="{{asset('admin/code/scripts/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/code/scripts/jquery-ui-1.10.1.custom.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/code/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/code/scripts/flot/jquery.flot.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/code/scripts/flot/jquery.flot.resize.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/code/scripts/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/code/scripts/common.js')}}" type="text/javascript"></script>

</body>

</html>

