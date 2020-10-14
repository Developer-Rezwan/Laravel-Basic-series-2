<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield("Title","My Laravel Website")</title>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
</head>
<body>
	<header id="header">
	<ul>
		<li class="btn btn-info"><a href="home">Home</a></li>
		<li class="btn btn-info"><a href="about">About</a></li>
	</ul>
	</header><!-- /header -->
    
    @yield("content")
<!-- All page a sidebar show korte chaile yield use na kore section use korte hobe -->
    @section('sidebar')
     <h3>Right Sidebar</h3>
    @show

  <footer style="margin-top: 20px">Copyright &copy 2020</footer>

  <!----------- Jquery script ---------->
  <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}" ></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}" ></script>
  <script src="{{ asset('assets/js/popper.min.js') }}" ></script>
  <script src="{{ asset('assets/js/my-js.js') }}" ></script>
</body>
</html>

