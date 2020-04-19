@extends('layouts.app')
@section('content')
//hit up

    <div class="card card-default">
        <div class="card-header">
            cat creat
        </div>

        <div class="card-body">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="card alert-danger">
                        {{$error}}
                    </div>
                @endforeach
                @endif
            <form action="{{route('Categories.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" id="name" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
