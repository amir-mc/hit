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
            <th>

            </th>
            </thead>
            <tbody>
            @foreach($cat as $Category)
            <tr><td>{{$Category->name}}</td>
            <td>

                <a href="{{route('Categories.edit', $Category->id)}}" class="btn btn-info">edit</a>
                <button id="mod"  class="btn btn-warning" onclick="handeldelete({{$Category->id}})">delete</button>
            </td>
            </tr>
            @endforeach

            </tbody>
        </table>
        <!-- Modal -->
        <form action="" method="post" id="DelCatForm">
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
@section('script')

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script>
        function handeldelete(id) {

            var form = document.getElementById('DelCatForm')

            form.action='/Categories/' + id
            console.log('deleting',form)
            //console log is just for test is not important
            

            $("#deleteModal").modal('show')
        }
    </script>
@endsection
