<!DOCTYPE html>
<html>
	<head>
		@yield('css')
		 <title>
        @section('title')
        DigiTalas Dashboard
        @show
	    </title>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	    {!! Html::style('/css/bootstrap.min.css') !!}
	    {!! Html::style('/css/tabs.css') !!}

	    {!! Html::script('/js/jquery-1.7.2.min.js') !!}
		{!! Html::script('/js/tabs.js') !!}
		{!! Html::script('/js/bootstrap.js') !!}
		{!! Html::script('/js/bootstrap-datepicker.js') !!}

	</head>

	<body>
		@yield('content')
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		<script>
		  $(function() {
		    $( "#datepicker" ).datepicker();
		  });
		</script>
	</body>

</html>