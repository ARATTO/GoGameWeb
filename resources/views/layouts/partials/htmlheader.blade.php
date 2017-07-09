<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ asset('/gogame/images/GGLogo.png') }}">
    <title> {{ trans('gogamessage.GoGame') }} - @yield('htmlheader_title', 'Your title here') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <!-- <link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" /> -->
    <link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/skins/_all-skins.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
          
          //MOTTO
          Para cambiar de Tema 
          1 __ Agregar el link del tema CSS "_all-skins" o direccion especifica del tema seleccionado
          2 __ En App.blade.php cambiar el nombre de la clase por el Nombre del tema seleccionado.
          //MOTTO
    -->
    <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('/css/skins/skin-blue.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Include Date Range Picker Pluging RangosFechas-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/daterangepicker/daterangepicker-bs3.css') }}" />
    <!-- Include lightbox para Imagenes Pop-Up-->
    <link href="{{ asset('/plugins/lightbox2/dist/css/lightbox.css') }}" rel="stylesheet">
    <!-- Include File-Upload Plugin -->
    <link href="{{ asset('/plugins/file-input/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <!-- Include Chosen Plugin -->
    <link href="{{ asset('/plugins/chosen/chosen.css') }}" rel="stylesheet" type="text/css" />
    <!-- Include TimePiker Plugin -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/timepicker/bootstrap-timepicker.min.css') }}"/>
</head>
