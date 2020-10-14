
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<br>
	<br>
    <div class="container">

	<form class="form-control col-4 container fluid" action="/user" method= "post">
	@csrf

	   @if($errors->any())
      <ul>
      @foreach($errors->all() as $error)
       <li class="text-danger">{{ $error }}</li>
      @endforeach
      </ul>
      @endif




	<h4>Laravel Form Validation </h4>
	<input type="text" placeholder="Username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" >

	@error('username')
     <span class="text-danger"> {{ $message }} </span>
	@enderror
    
     <br/>
	<input type="text" placeholder="Email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">

	@error('email')
     <span class="text-danger"> {{ $message }} </span>
	@enderror

	<br/>
	<input type="password" placeholder="Password" name="password" class="form-control">

	<br/>
	<input  type="submit" name="submit" class="form-control alert-info">
    </div>
	</form>

</body>
</html>
