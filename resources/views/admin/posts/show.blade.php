@extends('layouts.app')


@section('content')
<div class="container">
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

                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">title</th>
                            <th scope="col">text</th>
                            <th scope="col">start date</th>
                            <th scope="col">end date</th>
                            <th scope="col">posts number</th>
                            <th scope="col">collaborators</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td scope='row'>{{$post->title}}</td>
                            <td>{{$post->subject}}</td>
                            <td>{{$post->start_date}}</td>
                            <td>{{$post->end_date}}</td>
                            <td>{{$post->number_of_posts}}</td>
                            <td>{{$post->collaborators}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
                
