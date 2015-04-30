@extends('layouts/master')


@section('title', 'Dashboard')


@section('head')
<link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ url('css/animate.min.css') }}" />
<style>
.ng-enter {
	-webkit-animation: fadeIn .3s;
	-moz-animation: fadeIn .3s;
	-ms-animation: fadeIn .3s;
	animation: fadeIn .3s;
}
.details.ng-leave {
	-webkit-animation: fadeOut .3s;
	-moz-animation: fadeOut .3s;
	-ms-animation: fadeOut .3s;
	animation: fadeOut .3s;
}
</style>
@stop


@section('body')
<div ui-view></div>
@stop


@section('navigation')
<li><a ui-sref="servers" ui-sref-active="active">Servers</a></li>
<li><a ui-sref="operations" ui-sref-active="active">Operations</a></li>
<li><a ui-sref="logs" ui-sref-active="active">Logs</a></li>
@stop

@section('scripts')
<script src="{{ url('js/lodash.min.js') }}"></script>
<script src="{{ url('js/angular.min.js') }}"></script>
<script src="{{ url('js/angular-ui-router.min.js') }}"></script>
<script src="{{ url('js/angular-animate.min.js') }}"></script>
<script src="{{ url('js/restangular.min.js') }}"></script>
<script src="{{ url('js/mm-foundation-tpls-0.6.0.min.js') }}"></script>
<script src="{{ url('js/controllers.js') }}"></script>
<script>jQuery(document).foundation();</script>

<script type="text/ng-template" id="servers.html">@include('partials.servers')</script>
<script type="text/ng-template" id="operations.html">@include('partials.operations')</script>
@stop