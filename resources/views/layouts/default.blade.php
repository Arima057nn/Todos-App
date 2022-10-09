<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>All Laravel - @yield('title')</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    
    {{-- @include('layouts.menu') --}}
{{--  --}}
    <!-- Begin page content -->
    <!-- Begin page content -->
<div class="container">
    <div class="page-header">
        <h1>Môi trường test Laravel cho website allaravel.com</h1>
    </div>
    <div>
        <!-- Alert with error -->
        {{-- @component('layouts.alert') 

            @slot('class')
                alert-danger
            @endslot

            @slot('title')
                Something is wrong
            @endslot

            @slot('message')
                Test thử message lỗi
            @endslot
            Phần message phụ
        @endcomponent

        <!-- Alert with success -->
        @component('layouts.alert') 

            @slot('class')
                alert-success
            @endslot

            @slot('title')
                Success
            @endslot

            @slot('message')
                Test thử message thành công
            @endslot

            Phần message phụ
        @endcomponent --}}
    </div>
    <p class="lead">
        {{-- @section('sidebar')
            Phần chính trong sidebar.
        @show --}}
        @yield('content')
        {{-- @yield('title') --}}
         @yield('sidebar')
        
    </p>
</div>
    {{-- @include('layouts.footer') --}}
  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>



{{-- <!-- Chúng ta có thể thấy template này chứa các mã html, có thể insert Css,
ngoài ra nó có các lệnh khá lạ @yiekd,@section. @section định nghĩa phần nội dung
còn @yield sử dụng để hiển thị nội dung mà section đem lại. Các view sẽ kế thừa blade
template này bằng các sử dụng lệnh @extend. Tạo ra một view có tên first-blade-example trong  --> --}}