<html>
    <head>
        {!! Html::style('css/bootstrap.css') !!}
        {!! Html::style('css/jquery.dataTables.min.css') !!}
        {!! Html::style('css/style.css') !!}

        {!! Html::script('js/jquery.min.js') !!}
        {!! Html::script('js/bootstrap.js') !!}
        {!! Html::script('js/jquery.blockUI.js') !!}
        {!! Html::script('js/jquery.dataTables.min.js') !!}
        {!! Html::script('js/moment.min.js') !!}
        {!! Html::script('js/bootstrap-datetimepicker.js') !!}
        <script>
          var imagesUrl = '{{ asset('img') }}';
        </script>
        {!! Html::script('js/app.js') !!}
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        <div class="header">
      		<div class="header-content">
      			<div class="circular">
      				<img src="{{ asset('img/image.jpg') }}" />
      			</div>
      			<div class="line"></div>
      			<span class="line-span-left">Работа</span>
      			<span class="line-span-right">с картами</span>
      		</div>
      	</div>
      	<div id="sticky-anchor"></div>
      	<div id="sticky">
      		<ul class="nav">
      			<li><a href="/">Генератор карт</a></li>
      			<li><a href="/allcards">Все карты</a></li>
      		</ul>
      	</div>
        <div class="container">
            @yield('content')
        </div>
      	<div class="footer">
      		<p>Only text</p>
      	</div>
    </body>
</html>
