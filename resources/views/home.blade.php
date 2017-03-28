@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <blockquote>
        <p>Drag n drop your File Upload here....</p>
    </blockquote>

    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Add files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
        <input type="hidden" name="_token" value='{{csrf_token()}}'>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    <br>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    
    @endif
</div>
<br>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {

    // Change this to the location of your server-side upload handler:
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });
    var url = 'post',
    uploadButton = $('<button/>')
    .addClass('btn btn-primary')
    .prop('disabled', true)
    .text('Processing...')
    .on('click', function () {
        var $this = $(this),
        data = $this.data();
        $this
        .off('click')
        .text('Abort')
        .on('click', function () {
            $this.remove();
            data.abort();
        });
        data.submit().always(function () {
            $this.remove();
        });
    });
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
                );
        }
    }).prop('disabled', !$.support.fileInput)
    .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>
<div class="container">
    @if(!empty($posts))
    <div class="row">

        @foreach ($posts as $post)
        <a href="{{ url('post', $post->id.'/edit') }}">
           <div class="col-md-6 col-offset-2">
               <div class="panel panel-default">
                   <div class="panel-heading">File {{ $post->id}}</div>
                   <div class="panel-body">
                    <h1 class='row-fluid hideOverflow'>{{ $post->filename }}</h1>
                    <img src="{{ $post->filepath }}" class="img-responsive">
                    <br/>
                    <p class="row-fluid hideOverflow">{{ $post->created_at}}</p>
                </div>
            </div>
        </div>
    </a>
    @endforeach           
</div>
@endif
{{ $posts->links()}}
</div>

@endsection 