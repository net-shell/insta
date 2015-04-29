@extends('layouts/master')

@section('title', 'Authenticate')

@section('body')
<div class="row" style="max-width: 400px">
	<h1>{{ trans('app.login') }}</h1>
	<form method="post">
		<label>
			{{ trans('app.email') }}
			<input type="text" name="email" value="{{ old('email') }}" />
		</label>
		<label>
			{{ trans('app.password') }}
			<input type="password" name="password" />
		</label>
		<input type="submit" class="button" value="{{ trans('app.login') }}" />
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
</div>
@stop