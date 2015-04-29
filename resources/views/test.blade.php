<!DOCTYPE html>
<html>
<head>
	<title>Microweber Insta</title>
	<style type="text/css">
	body { font-family: sans-serif; }
	</style>
</head>
<body>
<table width="100%">
<tr>
	<td valign="top">
		<form method="post">
			<div>
				<label>Host</label>
				<input type="text" name="host" value="{{ $host or old('host') }}" />
			</div>
			<div>
				<label>Username</label>
				<input type="text" name="user" value="{{ $user or old('user') }}" />
			</div>
			<div>
				<label>Pass</label>
				<input type="password" name="pass" value="{{ $pass or old('password') }}" />
			</div>
			<div>
				<label>Port</label>
				<input type="text" name="port" value="{{ strlen(old('port')) ? old('port') : 22 }}" />
			</div>
			<input type="submit" />
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</td>
	<td>
		@if(isset($output))
		<div>
			@if(!$output['login'])
			<p style="color: red;">Check your credentials.</p>
			@else
			<h3>OS:</h3>
			<p style="">{{ $output['ver'] }}</p>
			<h3>Home:</h3>
			<p>{{ $output['pwd'] }}</p>
			<h3>Installed software:</h3>
			<select>
				@foreach($output['soft'] as $soft)
				<option>{{ $soft }}</option>
				@endforeach
			</select>
			@endif
		</div>
		@endif
	</td>
</tr>
</table>
</body>
</html>