@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <h5 class="card-header"><b> {{ $post->title }} </b></h5>
                <div class="card-body">
                  <p class="card-title" ><b> Title: </b></p> 
                  <p class="card-text">{{ $post->title }}</p>
                  <p class="card-title" ><b> Description: </b></p>
                  <p class="card-text">{{ $post->description }}</p>
                  <p class="card-title" ><b> Created At: </b></p>
                  <p class="card-text">{{ $post->created_at }}</p>
                  <p class="card-text">{{ $post->created_at }}</p>
                  <p class="card-title" ><b> Post Image: </b></p> 
                    @if ($post->img != '')
                    <img src="{{ asset('/storage/img/'.$post->img) }}">
                    @else
                        No image available
                    @endif
                    <p class="card-title" ></p> 
                    @include('/posts/comments')
                
                </div>
              </div>

        </div>
    </div>
</div>
    
@endsection