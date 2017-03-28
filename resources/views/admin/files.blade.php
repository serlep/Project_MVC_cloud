@extends('layouts.app')

@section('content')
<div class="container">
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
            <td><strong>action</strong></td>
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
            <td><a href="{{ url('admin/'.$post->id) }}">
                                    DELETE
                </a> </td>
  		</tr>
                    
       @endforeach

</table>
{{ $posts->links()}}
</div>
@endsection