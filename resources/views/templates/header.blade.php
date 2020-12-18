@section('headerarea')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/base.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('/js/jquery.searcher.min.js') }}"></script>
<script src="https://kit.fontawesome.com/e0eb09ffcf.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">


<title>@yield('title')</title>
<meta name="description" content="@yield('description')">
@endsection