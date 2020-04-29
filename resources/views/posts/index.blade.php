@extends('layouts.app')
@section('content')
    <a href="{{route('posts.create')}}" class="btn btn-info my-2">add post</a>
    <div class="card card-default">
        <div class="card-header">
            post

        </div>
        <div class="card-body">
@if($posts->count()>0)
                <table class="table">
                    <thead>
                    <th>
                        image
                    </th>
                    <th>
                        title
                    </th>
                    <th>
                        category
                    </th>
                    </thead>

                    <tbody>



                    @foreach($posts  as $post)

                        <tr>
                            <td>
                                <img src="{{asset($post->image)}}" alt="">

                            </td>
                            <td>  {{$post->title}}</td>
                            <td>

                                <a href="{{route('Categories.edit', $post->category->id)}}">

                                    {{$post->category->name}}

                                </a>



                            </td>
                            <td>
                                @if($post->trashed())
                                    <form action="{{route('post.restore',$post->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                    <button type="submit"  class="btn btn-info">restore</button>
                           </form>
                            </td>
                            @else




                         <td>
                             <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info">   edit</a>

                         </td>
                            @endif
                            <td>
                                <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning">
                                        {{$post->trashed()?'delete':'trash'}}
                                    </button>

                                </form>
                            </td>

                        </tr>
                    @endforeach
@else
    <h3 class="text-center">empty</h3>
@endif
                    </tbody>
                </table>




        </div>
    </div>
@endsection
