@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2 class="fs-4 text-secondary my-4">
    </h2>
    <div class="row justify-content-center">
        <div class="col">
              
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <h2>Post #{{$post->id}}</h2>
                  <button type="button" class="btn btn-success mb-1">
                    <i class="fa-solid fa-pen"></i>
                    <i class="fa-solid fa-plus"></i>
                  </button>
                </div>
            <form action="{{ route('admin.posts.update', $post) }}" method="POST">
            @csrf 
            {{-- Forzo il metod da post a put --}}
            @method('PUT')

                <ul class="list-group list-group-flush">

                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="title"><h5>title</h5></label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="title" value="{{$post->title}}">
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="subject"><h5>subject</h5></label>
                            <textarea type="text" class="form-control" id="subject" name="subject" placeholder="subject">{{$post->subject}}</textarea>
                        </div>
                    </li>
                    
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="start_date"><h5>start date</h5></label>
                            <input type="text" class="form-control" id="start_date" name="start_date" placeholder="start_date"  value="{{$post->start_date}}">
                        </div>
                    </li>
                    
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="end_date"><h5>end date</h5></label>
                            <input type="text" class="form-control" id="end_date" name="end_date" placeholder="img end_date"  value="{{$post->end_date}}">                   
                        </div>
                    </li>
                    
                    <li class="list-group-item">
                        <div class="form-group"><h5>number of posts</h5></label>
                            <input type="text" class="form-control" id="number_of_posts" name="number_of_posts" placeholder="number_of_posts"  value="{{$post->number_of_posts}}">
                        </div>
                    </li>
                    
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="collaborators"><h5>collaborators</h5></label>
                            <input type="text" class="form-control" id="collaborators" name="collaborators" placeholder="collaborators"  value="{{$post->collaborators}}">
                        </div>
                    </li>
                    
                    <li class="list-group-item">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Delete</button>
                    </li>

                </ul>

            </form>        
        </div>
    </div>
</div>
@endsection