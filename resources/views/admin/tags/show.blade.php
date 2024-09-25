@extends('layouts.app')


@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <h2>tag #{{$tag->id}}</h2>
                  <button type="button" class="btn btn-success mb-1">
                    <i class="fa-solid fa-pen"></i>
                    <i class="fa-solid fa-plus"></i>
                  </button>
                </div>

                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">name</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td scope='row'>{{$tag->name}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
                
