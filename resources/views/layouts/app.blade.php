@extends('layouts/master')

@section('head')
<link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ url('css/animate.min.css') }}" />
<style>@yield('css')</style>
@stop

@section('scripts')
	<script src="{{ url('js/lodash.min.js') }}"></script>
	<script src="{{ url('js/angular.min.js') }}"></script>
	<script src="{{ url('js/angular-animate.min.js') }}"></script>
	<script src="{{ url('js/restangular.min.js') }}"></script>
	<script src="{{ url('js/mm-foundation-tpls-0.6.0.min.js') }}"></script>
	<script src="{{ url('js/controllers.js') }}"></script>
	<script>jQuery(document).foundation();</script>
@stop

@section('body')
<div ng-app="insta">
	@yield('content')
</div>
@stop