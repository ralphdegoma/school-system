<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Student Information System And Acounting System (SIAS)</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="shortcut icon" href="/system/img/SMIicon.ico">
<link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">

@include('admin.csslinks.css_links')


@yield('css_filtered')

</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo">
    
@include('admin.bodywrapper.body_wrapper')


@include('admin.jslinks.js_initial')
@yield('js_filtered')


<script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>

<script>
jQuery(document).ready(function() {    
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
});
$(document).ready(function(){
	$('#billingMenu').click(function(){
        $('#academicsMenu').removeClass('active'); 
    });
    $('#academicsMenu').click(function(){
        $('#billingMenu').removeClass('active'); 
    });
});

</script>


</body>
</html>

