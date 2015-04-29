<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ url('css/foundation.min.css') }}" />
	<style>
		body { font-family: 'Ubuntu', sans-serif; background: #f6f6f6; }
		.button { background: #333; text-transform: uppercase; }
		.accordion dd>a { padding: 0; margin-top: 2px; }
		.accordion dd>a>div { padding: 1rem; }
		.accordion dd>a, .accordion dd>a:hover { background: #ccc; opacity: 0.8; transition: opacity .3s; }
		.accordion dd>a:hover { opacity: 1; }
		.accordion a.active, .accordion a.active:hover { background: #111; color: #fff; }
		.accordion .content { background: #aaa; }
		
		h1, h2, h3 { text-transform: uppercase; }
		header { padding-top: 1rem; text-transform: uppercase; }
		header, header a, header li, header i { color: #ccc; }

		.details { background: #fff; padding-bottom: 5rem; }
	</style>
	@yield('head')
</head>
<body>
	<header style="background: #111;">
		<div class="row">
			<div class="small-6 columns">
				<ul class="inline-list">
					<li>insta</li>
					<li><a href="#">Navigation</a></li>
				</ul>
			</div>
			<div class="small-6 columns text-right">
				@if(Auth::check())
				{{ Auth::user()->email }}
				@else
				<a href="/auth/login">{{ trans('app.login') }}</a>
				@endif
			</div>
		</div>
	</header>
	
	<section style="padding: 3rem 1rem;">
		@yield('body')
	</section>

	<script src="{{ url('js/jquery.min.js') }}"></script>
	<script src="{{ url('js/fastclick.min.js') }}"></script>
	<script src="{{ url('js/foundation.min.js') }}"></script>
	@yield('scripts')
</body>
</html>