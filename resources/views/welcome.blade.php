<!-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        
       
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body> -->
@extends('layouts.app')

@section('content')
<div class="container">
    @if(!empty($posts))
    <div class="row">
       
        @foreach ($posts as $post)
        
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
      
    @endforeach           
    </div>
@endif
{{ $posts->links()}}
</div>
        </div>
@endsection

