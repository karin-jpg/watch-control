<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title }}</title>
	<link rel="stylesheet" href=" {{ asset('css/app.css') }} ">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="{{ route('series.index') }}">Series</a>
			<a href="{{ route('logout') }}">Logout</a>
		</div>
	</nav>
<div class="container">
	<body>
		<h1>{{ $title }}</h1>

		@isset($successMessage)
			<div class="alert alert-success">
				{{ $successMessage }}
			</div>
		@endisset
		@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		{{ $slot }}
	</body>
</div>
</html>
