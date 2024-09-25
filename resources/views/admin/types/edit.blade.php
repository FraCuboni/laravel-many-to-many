@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2 class="fs-4 text-secondary my-4">
    </h2>
    <div class="row justify-content-center">
        <div class="col">
              
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <h2>Type #{{$type->id}}</h2>
                  <button type="button" class="btn btn-success mb-1">
                    <i class="fa-solid fa-pen"></i>
                    <i class="fa-solid fa-plus"></i>
                  </button>
                </div>
            <form action="{{ route('admin.types.update', $type) }}" method="POST">
            @csrf 
            {{-- Forzo il metod da post a put --}}
            @method('PUT')

                <ul class="list-group list-group-flush">

                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="name"><h5>name</h5></label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{$type->name}}">
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