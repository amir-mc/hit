@extends('layouts.app')
@section('content')
    <a href="tags/create" class="btn btn-info my-2">add tags</a>
<div class="card card-default">
    <div class="card-header">
        cat

    </div>
    <div class="card-body">
        @if($tag->count()>0)
        <table class="table">
            <thead>
            <th>
                 name:
            </th>
            <th>
                post:
            </th>
            </thead>
            <tbody>
            @foreach($tag as $tags)
            <tr><td>{{$tags->name}}</td>
                <td>{{$tags->post->count()}}</td>

            <td>

                <a href="{{route('tags.edit', $tags->id)}}" class="btn btn-info">edit</a>
                <button id="mod"  class="btn btn-warning" onclick="handeldelete({{$tags->id}})">delete</button>
            </td>
            </tr>
            @endforeach

            </tbody>
        </table>
@else
            <h3 class="text-center">empty</h3>
        <!-- Modal -->
@endif
        <form action="" method="POST" id="de">

            @csrf
            @method('DELETE')

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModallabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">delete cat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        are you sure ??
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
    @endsection



    <script>
        function handeldelete(id) {

            var form = document.getElementById('de')
            form.action='/tags/'+id

            $("#deleteModal").modal('show')
        }
    </script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
