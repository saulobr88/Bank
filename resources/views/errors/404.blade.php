<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <title>Internet Bank - BCC</title>

    <!-- Bootstrap CSS -->    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{ asset('css/elegant-icons-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5shiv.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head>

  <body>
   <div class="page-404">
    <p class="text-404">404</p>

    <h2>Ops</h2>
    <p>Something went wrong or that page doesn’t exist yet. <br><a href="{{ url('/') }}">Return Home</a></p>
  </div>
  
  </body>
</html>
