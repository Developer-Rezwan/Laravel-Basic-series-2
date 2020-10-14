@extends('me.layout.app')
@section('Title', 'My Home page')

@section('content')
<table border>
	<tbody>
		<th>ID</th>
		<th>Username</th>
		<th>Email</th>
	</tbody>
	<tbody>
		@foreach($my_data as $value)
		<tr>
			<td>{{ $value['id'] }}</td>
			<td>{{ $value['name'] }}</td>
			<td>{{ $value['email'] }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop

