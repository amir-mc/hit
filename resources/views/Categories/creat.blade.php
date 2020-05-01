@extends('layouts.app')
@section('content')

    <div class="card card-default">
        <div class="card-header">
           {{isset($Category)?'edit cat':'creat cat'}}
        </div>

        <div class="card-body">
            @include('partials.error')

            <form action="{{isset($Category)?route('Categories.update',$Category->id) :route('Categories.store')}}" method="post">
                @csrf
                @if(isset($Category))
                @method('PUT')
                @endif
                <div class="form-group">

                    <label for="name">name</label>

                        <input type="text" id="name" class="form-control" name="name" value="{{isset($Category)? $Category->name : ''}}">

                </div>



                <div class="form-group">
                    <button class="btn btn-success">{{isset($Category)?'Update':'submit'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection

