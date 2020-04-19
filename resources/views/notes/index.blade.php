@extends('layouts.app')

{{-- Note section--}}
@section('content')

    <div class="row">
        {{--Note section--}}
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header"> Note Application</div>
{{--                Load Note from DB--}}
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th> Note </th>
                            <th> Quote section</th>
                            <th> Video section</th>
                            <th> Images section</th>
                        </thead>
                        <tbody>


                            @foreach($notes as $note)
                                <tr>
{{--                                    Note--}}
                                    <td>
                                        {{$note->noteContent}}
                                        <br>
                                        <a href="{{ route('note.edit',$note->id ) }}" class="btn btn-info btn-sm">Edit</a>
                                        <a href="" onclick="handleDelete({{$note->id}})" class=" btn btn-danger btn-sm"  >Delete</a>
                                    </td>
{{--                                    Quote--}}
                                    <td>
                                        {{ $note->quote }}
                                    </td>
{{--                                    Link--}}

                                    <td>
                                        <div class="embed-responsive embed-responsive-4by3">
                                            <iframe class="embed-responsive-item" src="{{ $note->link }}"  allowfullscreen  ></iframe>
                                        </div>
                                    </td>
{{--                                    Image--}}

                                    <td> <img src="storage/{{ $note->image }}" width="200px" height="150px" > </td>
                                </tr>
                                @endforeach
                        </tbody>

                    </table>
{{--                    Modal--}}
                    <div class="modal" id="deleteModal" aria-labelledby="deleteModalLabel" aria-hidden="true" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <form action="" method="POST" id="deleteNoteForm">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Note</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure to delete it?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Ok, Delete it</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
{{--                add note btn--}}

                <div class="col text-center">
                    <a href="{{ route('note.create')}}" class="btn btn-success">Add new record </a>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('script')

    <script >

        function handleDelete(id){
            let form = document.getElementById('deleteNoteForm');
            form.action = '/note/'+id;
            console.log("form:"+ form.action);
            $('#deleteModal').modal("show");
            console.log("delete btn work: "+id);

        }

    </script>


    @endsection
