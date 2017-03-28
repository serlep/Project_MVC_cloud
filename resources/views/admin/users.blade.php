@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-striped table-bordered">
	<caption>list of users</caption>
	<thead>
		<tr>
            <td><strong>ID</strong></td>
            <td><strong>username</strong></td>
            <td><strong>firstname</strong></td>
            <td><strong>lastname</strong></td>
            <td><strong>birthdate</strong></td>
            <td><strong>email</strong></td>
            <td><strong>action</strong></td>
        </tr>
	</thead>
	@foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->birthdate}}</td>
            <td>{{ $user->email }}</td>
            <td><a href="{{ url('/block') }}">
                                    Block
                </a>|<a href="{{ url('/unblock') }}">
                                    UnBlock
                </a></td>
  		</tr>
                    
       @endforeach
	
</table>
{{ $users->links()}}

@endsection