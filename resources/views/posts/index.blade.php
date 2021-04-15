@extends('layouts.app')

@section('content')

<div class="container">

  <!-- Create -->
  
  <div class="d-flex justify-content-center">
    <div class="col-md-5"> 
      <h5 class="card-header"><b> Create </b></h5>
        <div class="card"> 
          <div class="card-body"> 
            <form method="POST" action="/posts">
                @csrf
                
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control" name="title" @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required  autofocus>      
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                    <div class="col-md-6">
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description"></textarea>    
                    </div>
                </div>
                
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>
            </form> 
          </div>          
    </div>    
    </div>  

    <!-- Table  -->

        <div class="col-md-8">
          <h5 class="card-header"><b> List </b></h5>
            <div class="card">      
                <div class="card-body">
                    <table class="table table-striped">

                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $post)
                          <tr>
                            <th scope="row"> {{ $post->id }} </th>
                            <td> {{ $post->title }} </td>
                            <td> {{ $post->description }} </td>
                            <td> <a  href="/posts/{{$post->id}}" class="btn btn-info"> View </a> </td>
                            <td> <a  href="/posts/{{$post->id}}/edit" class="btn btn-success"> Edit </a> </td>
                            <td>    
                              <form method="POST" action=" {{ route('posts.destroy', $post->id)}}">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>             
            </div>
        </div>      

    
@endsection