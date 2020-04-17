@extends('layouts.app')
@section('content')
    <a href="Categories/create" class="btn btn-info my-2">add category</a>
<div class="card card-default">
    <div class="card-header">
        cat

    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <th>
                 name:
            </th>
            </thead>
            <tbody>
            @foreach($cat as $ca)
            <tr><td>{{$ca->name}}</td> </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</div>
    @endsection
