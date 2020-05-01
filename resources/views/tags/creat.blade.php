@extends('layouts.app')
@section('content')

    <div class="card card-default">
        <div class="card-header">
           {{isset($tag)?'tag cat':'tag cat'}}
        </div>

        <div class="card-body">
{{--            @if($errors->any())--}}
{{--                @foreach($errors->all() as $error)--}}
{{--                    <div class="card alert-danger">--}}
{{--                        {{$error}}--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--                @endif--}}
            @include('partials.error')

            <form action="{{isset($tag)?route('tags.update',$Category->id) :route('tags.store')}}" method="post">
                @csrf
                @if(isset($tag))
                @method('PUT')
                @endif
                <div class="form-group">

                    <label for="name">name</label>

                        <input type="text" id="name" class="form-control" name="name" value="{{isset($tag)? $tag->name : ''}}">

                </div>



                <div class="form-group">
                    <button class="btn btn-success">{{isset($tag)?'Update':'submit'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection

