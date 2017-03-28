@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="form-group">
			{!! Form::model($post, ['route' => ['post.update', $post->id], 'method'=>'patch']) !!}
			<br/>
			{!! Form::label('filename') !!}
			{!! Form::text('filename', null, array('class'=>'form-control')) !!}
			<br/>
			{!! Form::label('filepath') !!}
			{!! Form::text('filepath', null, array('class'=>'form-control')) !!}
			<br/>
			{!! Form::label('size') !!}
			{!! Form::text('size', null, array('class'=>'form-control')) !!}
			<br/>
			</div>
		<div class="col-md-4 col-md-offset-2">
			<div class="form-group">
				{!! Form::submit('Save Changes !', array('class' => 'btn btn-success btn-lg btn-block')) !!}
			</div>
		</div>

		{!! Form::close() !!}
		<div class="col-md-4 ">
			<div class="form-group">
				{!! Form::open(['route' => ['post.destroy', $post->id], 'method' => 'DELETE']) !!}
				{!! Form::submit('Delete!', array('class' => 'btn btn-danger btn-lg btn-block')) !!}
				{!! Form::close() !!}
			</div>
		</div>          
	</div>
</div>
@endsection