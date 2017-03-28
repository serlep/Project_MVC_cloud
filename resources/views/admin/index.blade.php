@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-striped table-bordered">
	<caption>list of 10 last user</caption>
	<thead>
		<tr>
            <td><strong>ID</strong></td>
            <td><strong>username</strong></td>
            <td><strong>firstname</strong></td>
            <td><strong>lastname</strong></td>
            <td><strong>birthdate</strong></td>
            <td><strong>email</strong></td>
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
  		</tr>
                    
       @endforeach
	
</table>
<br/>
<table class="table table-striped table-bordered">
<caption>list of 10 last user upload</caption>
	<thead>
		<tr>
            <td><strong>ID</strong></td>
            <td><strong>user_id</strong></td>
            <td><strong>filename</strong></td>
            <td><strong>filepath</strong></td>
            <td><strong>size</strong></td>
            <td><strong>created_at</strong></td>
            <td><strong>updated_at</strong></td>
        </tr>
	</thead>
	@foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->user_id }}</td>
            <td>{{ $post->filename }}</td>
            <td>{{ $post->filepath }}</td>
            <td>{{ $post->size}}</td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
  		</tr>
                    
       @endforeach

</table>
</div>
@endsection