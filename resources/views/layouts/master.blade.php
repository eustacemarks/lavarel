<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container">

    <header class="row">
        @include('includes.header')
    </header>

    <div id="main" class="row">
      <div class="content">
      @if (Session::has('message'))
		<div class="flash alert-info">
			<p>{{ Session::get('message') }}</p>
		</div>
      @endif
      @if ($errors->any())
		<div class='flash alert-danger'>
			@foreach ( $errors->all() as $error )
				<p>{{ $error }}</p>
			@endforeach
		</div>
	  @endif
	  @yield('content')      
      </div>

    </div>

    <footer class="row">
        @include('includes.footer')
    </footer>

</div>
</body>
</html>

      